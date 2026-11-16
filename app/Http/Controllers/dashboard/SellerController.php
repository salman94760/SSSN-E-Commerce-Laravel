<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\UserFormRequest;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use App\Models\user_info;

class SellerController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',User::class);
        $query = User::with('userInfo');
        $query->where('role', '=','seller');
        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }


        if ($request->filled('type')) {
            $query->where('role', $request->type);
        }
        $users = $query->paginate(5)->withQueryString();
       
        return view('dashboard.sellers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',User::class);
        return view('dashboard.sellers.create');
    }

    public function store(Request $request)
    {
    abort_unless(
        auth()->check() && auth()->user()->role === 'admin',
        403
    );

    $validated = $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email',
    'phone' => 'required|string|max:20',
    'password' => 'required|string|min:8|confirmed',

    'address' => 'nullable|string|max:1000',
    'zipcode' => 'nullable|string|max:20',
    'landmark' => 'nullable|string|max:255',

    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    // Companies optional
    'companies' => 'sometimes|array|min:1',

    // Validate only when companies exist
    'companies.*.company_name' => 'required|string|max:255',
    'companies.*.logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
]);

    $uploadedFiles = [];

    try {
        DB::transaction(function () use (
            $request,
            $validated,
            &$uploadedFiles
        ) {

            // 1. Upload seller profile image
            $photo = '';

            if ($request->hasFile('image')) {
                $photo = $request->file('image')
                    ->store('seller-profiles', 'public');

                $uploadedFiles[] = $photo;
            }

            // 2. Create seller
            $seller = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'seller',
                'profile_photo' => $photo,
                'avatar' => $photo,
            ]);

            // 3. Create seller information
            user_info::create([
                'user_id' => $seller->id,
                'password_hint' => $validated['password'],
                'address' => $validated['address'] ?? null,
                'phone' => $validated['phone'],
                'zipcode' => $validated['zipcode'] ?? null,
                'landmark' => $validated['landmark'] ?? null,
            ]);

            // 4. Create multiple companies
            foreach ($validated['companies'] as $index => $company) {

                $companyLogo = '';

                if ($request->hasFile("companies.$index.logo")) {
                    $companyLogo = $request
                        ->file("companies.$index.logo")
                        ->store('company-logos', 'public');

                    $uploadedFiles[] = $companyLogo;
                }

                Company::create([
                    'company_name' => $company['company_name'],
                    'logo' => $companyLogo,
                    'user_id' => $seller->id,
                ]);
            }
        });

    } catch (Throwable $e) {

        // Clean up uploaded files if DB transaction fails
        foreach ($uploadedFiles as $path) {
            Storage::disk('public')->delete($path);
        }

        report($e);

        return back()
            ->withInput()
            ->withErrors([
                'seller' => 'Seller could not be created. Please try again.',
            ]);
    }

    return redirect()
        ->route('sellers.index')
        ->with('success', 'Seller and companies created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('isAdmin');

        $customers = Company::where('user_id', $id)->latest()->get();
        $totalCustomers = $customers->count();
        $user = User::findOrFail($id);
        return view('dashboard.sellers.show', compact('user','customers','totalCustomers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        Gate::authorize('isAdmin');
        $user = User::findOrFail($id);
        $companyRows = Company::where('user_id',$id)->get();
        // dd($companyRows);
        return view('dashboard.sellers.edit', compact('user','companyRows'));
    }


public function update(Request $request, User $seller)
{
    abort_unless(
        auth()->check() && auth()->user()->role === 'admin',
        403
    );

    abort_unless($seller->role === 'seller', 404);

    $validated = $request->validate([
        'name' => 'required|string|max:255',

        'email' => [
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($seller->id),
        ],

        'phone' => 'required|string|max:20',

        // Password optional during update
        'password' => 'nullable|string|min:8|confirmed',

        'address' => 'nullable|string|max:1000',
        'zipcode' => 'nullable|string|max:20',
        'landmark' => 'nullable|string|max:255',

        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        // Companies optional
        'companies' => 'sometimes|array',

        'companies.*.id' => 'nullable|integer|distinct',
        'companies.*.company_name' => 'required|string|max:255',
        'companies.*.logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Existing company IDs must belong to this seller
    $companyIds = collect($validated['companies'] ?? [])
        ->pluck('id')
        ->filter()
        ->map(fn ($id) => (int) $id);

    $ownedCompanyCount = Company::where('user_id', $seller->id)
        ->whereIn('id', $companyIds)
        ->count();

    abort_unless(
        $companyIds->count() === $ownedCompanyCount,
        403
    );

    $uploadedFiles = [];
    $oldFiles = [];

    try {
        DB::transaction(function () use (
            $request,
            $validated,
            $seller,
            &$uploadedFiles,
            &$oldFiles
        ) {
            // 1. Update seller
            $seller->name = $validated['name'];
            $seller->email = $validated['email'];

            if (!empty($validated['password'])) {
                $seller->password = Hash::make($validated['password']);
            }

            // 2. Update profile image
            if ($request->hasFile('image')) {
                $photo = $request->file('image')
                    ->store('seller-profiles', 'public');

                $uploadedFiles[] = $photo;

                if ($seller->profile_photo) {
                    $oldFiles[] = $seller->profile_photo;
                }

                $seller->profile_photo = $photo;
                $seller->avatar = $photo;
            }

            $seller->save();

            // 3. Update seller info
            user_info::updateOrCreate(
                ['user_id' => $seller->id],
                [
                    'address' => $validated['address'] ?? null,
                    'phone' => $validated['phone'],
                    'zipcode' => $validated['zipcode'] ?? null,
                    'landmark' => $validated['landmark'] ?? null,
                ]
            );

            // 4. Update existing / add new companies
            if (array_key_exists('companies', $validated)) {

                $keepCompanyIds = [];

                foreach ($validated['companies'] as $index => $companyData) {

                    if (!empty($companyData['id'])) {
                        $company = Company::where('user_id', $seller->id)
                            ->findOrFail($companyData['id']);
                    } else {
                        $company = new Company();
                        $company->user_id = $seller->id;
                    }

                    $company->company_name = $companyData['company_name'];

                    if ($request->hasFile("companies.$index.logo")) {
                        $newLogo = $request
                            ->file("companies.$index.logo")
                            ->store('company-logos', 'public');

                        $uploadedFiles[] = $newLogo;

                        if ($company->logo) {
                            $oldFiles[] = $company->logo;
                        }

                        $company->logo = $newLogo;
                    }

                    $company->save();
                    $keepCompanyIds[] = $company->id;
                }

                // Companies removed from edit form
                $removedCompanies = Company::where('user_id', $seller->id)
                    ->whereNotIn('id', $keepCompanyIds)
                    ->get();

                foreach ($removedCompanies as $company) {

                    // Prevent deleting a company with products.
                    if ($company->products()->exists()) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            'companies' => "Company {$company->company_name} has products. Remove or transfer its products first.",
                        ]);
                    }

                    if ($company->logo) {
                        $oldFiles[] = $company->logo;
                    }

                    $company->delete();
                }
            }
        });

    } catch (\Illuminate\Validation\ValidationException $e) {

        foreach ($uploadedFiles as $path) {
            Storage::disk('public')->delete($path);
        }

        throw $e;

    } catch (Throwable $e) {

        foreach ($uploadedFiles as $path) {
            Storage::disk('public')->delete($path);
        }

        report($e);

        return back()
            ->withInput()
            ->withErrors([
                'seller' => 'Seller could not be updated. Please try again.',
            ]);
    }

    // Delete old images only after successful DB commit
    foreach (array_unique($oldFiles) as $path) {
        Storage::disk('public')->delete($path);
    }

    return redirect()
        ->route('sellers.index')
        ->with('success', 'Seller updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('isAdmin');
        $this->users::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}
