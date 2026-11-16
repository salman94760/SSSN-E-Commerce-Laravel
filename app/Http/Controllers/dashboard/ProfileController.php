<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Company;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('dashboard.profile.edit', compact('user'));
    }


public function update(Request $request)
{
    $user = $request->user();

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users')->ignore($user->id),
        ],
        'company_name' => 'nullable|string|max:255',
        'profile_photo' => 'nullable|image|max:2048',
        'company_logo' => 'nullable|image|max:2048',
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->company_name = $validated['company_name'] ?? null;

    // Update profile photo
    if ($request->hasFile('profile_photo')) {
        $oldPhoto = $user->profile_photo;

        $user->profile_photo = $request
            ->file('profile_photo')
            ->store('profiles', 'public');

        if ($oldPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }
    }

    // Update company logo
    $newLogo = null;
    $oldLogo = $user->company_logo;

    if ($request->hasFile('company_logo')) {
        $newLogo = $request
            ->file('company_logo')
            ->store('company-logos', 'public');

        $user->company_logo = $newLogo;
    }

    $user->save();

    // Update companies table
   
    if ($user->company) {

        $company = $user->company;

        $company->company_name = $validated['company_name'] ?? null;

        if ($newLogo) {
            $company->logo = $newLogo;
        }

        $company->save();

        // Delete old logo after successful update
        if ($newLogo && $oldLogo) {
            Storage::disk('public')->delete($oldLogo);
        }
    }

    return redirect()
        ->route('admin.profile.edit')
        ->with('success', 'Profile updated successfully.');
}

}
