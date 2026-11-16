<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $companyDetail = Company::with('user')->paginate(5);
    $users = User::all();
    return view('dashboard.companies.index', compact('companyDetail','users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $logo = "";
        $request->validate([
            'company_name'  => 'required', 
            // 'company_email' => 'required|unique:companies,company_email',
            'phone'         => 'required|digits:10',
            'website'       => 'required',
            'address'       => 'required'
        ]);

        $request->validate([
            'logo' => 'nullable|file|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

         if ($request->hasFile('logo')) {

        $file = $request->file('logo');

        // Original file name
        $filename = $file->getClientOriginalName();

        // Upload
        $file->move(
            public_path('logo'),
            $filename
        );

        $logo = $filename;
    }

        $company = Company::first();

if ($company) {
    $company->update([
        'company_name'  => $request->company_name,
        'company_email' => $request->company_email,
        'phone'         => $request->phone,
        'website'       => $request->website,
        'address'       => $request->address,
        'logo'          => $logo,
        'facebook'      => $request->facebook ?? "",
        'instagram'     => $request->instagram ?? "",
        'youtube'       => $request->youtube ?? "",
        'whatsapp'      => $request->whatsapp ?? "",
    ]);
} else {
    Company::create([
        'company_name'  => $request->company_name,
        'company_email' => $request->company_email,
        'phone'         => $request->phone,
        'website'       => $request->website,
        'address'       => $request->address,
        'logo'          => $logo,
        'facebook'      => $request->facebook ?? "",
        'instagram'     => $request->instagram ?? "",
        'youtube'       => $request->youtube ?? "",
        'whatsapp'      => $request->whatsapp ?? "",
    ]);
}
        return back()->with('success','Detail updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        Gate::authorize('isAdmin');

        // dd($company->user_id);
        $allcompany = Company::where('user_id', $company->user_id)->latest()->get();
        $totalCompanies = $allcompany->count();
      
        $user = User::findOrFail($company->user_id);
        return view('dashboard.companies.show', compact('company','user','allcompany','totalCompanies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, Company $company)
{
    $validated = $request->validate([
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'dot_number' => 'nullable|string|max:255',
        'mc_number' => 'nullable|string|max:255',
        'ein_number' => 'nullable|string|max:255',
        'status' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'zipcode' => 'nullable|string|max:20',
        'country' => 'nullable|string|max:255',
    ]);

    $company->update([
        'company_name' => $company->company_name,
        'company_email' => $validated['email'] ?? null,
        'phone' => $validated['phone'] ?? null,
        'address' => $validated['address'] ?? null,
        'dot_number' => $validated['dot_number'] ?? null,
        'mc_number' => $validated['mc_number'] ?? null,
        'ein_number' => $validated['ein_number'] ?? null,
        'status' => $validated['status'] ?? null,
        'city' => $validated['city'] ?? null,
        'state' => $validated['state'] ?? null,
        'zipcode' => $validated['zipcode'] ?? null,
        'country' => $validated['country'] ?? null,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Company updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }

    public function uploadLogo(Request $request)
{
    $request->validate([
        'logo' => 'required|file|mimes:png,jpg,jpeg,svg|max:2048',
    ]);

    $file = $request->file('logo');

    $filename = 'logo.' . $file->getClientOriginalExtension();

    $file->move(public_path('uploads'), $filename);

    return back()->with('success', 'Logo uploaded successfully.');
}
}
