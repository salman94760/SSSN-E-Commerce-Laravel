<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyDetail = Company::first();
        return view('dashboard.company.index',compact('companyDetail'));
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
        //
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
        //
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
