<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function show($id)
    {
        $company = Company::with('employees')->findOrFail($id);

        return response()->json([
            'id'             => $company->id,
            'name'           => $company->name,
            'email'          => $company->email,
            'website'        => $company->website,
            'logo'           => $company->logo ? asset('storage/' . $company->logo) : null,
            'employee_count' => $company->employee_count,
            'employees'      => $company->employees->map(fn($e) => [
                'id'         => $e->id,
                'first_name' => $e->first_name,
                'last_name'  => $e->last_name,
                'email'      => $e->email,
                'phone'      => $e->phone,
            ]),
        ]);
    }
}