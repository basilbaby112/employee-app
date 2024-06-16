<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $company = Company::create($request->all());

        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $company;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $company_id=$id;
        $company=Company::find($company_id);
        $company->update($request->all());

        return response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company_id=$id;
        $company=Company::find($company_id);
        $company->delete();

        return response()->json(null, 204);
    }
}
