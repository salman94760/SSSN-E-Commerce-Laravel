<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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

        if ($request->hasFile('profile_photo')) {
            $oldPhoto = $user->profile_photo;

            $user->profile_photo = $request
                ->file('profile_photo')
                ->store('profiles', 'public');

            if ($oldPhoto) {
                Storage::disk('public')->delete($oldPhoto);
            }
        }

        if ($request->hasFile('company_logo')) {
            $oldLogo = $user->company_logo;

            $user->company_logo = $request
                ->file('company_logo')
                ->store('company-logos', 'public');

            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
        }

        $user->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
}
