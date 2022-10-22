<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    public function index()
    { 
         $companys =  Company::all();
        return view ('companys.index',compact('companys'));
    }

  
    public function create()
    {
        
    }

    public function store(StoreCompanyRequest $request)
    {
        try {
            $validated = $request->validated();
            Company::create([
                'name' => $request->name,
                'desc' => $request->desc,
               
                ]);
    
                session()->flash('Add_company');
                return redirect('/companies');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function show(Company $company)
    {
        return view('companys.show',compact('company'));
    }

    public function edit(Company $company)
    {
        return view ('companys.edit',compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try {
            $validated = $request->validated();

            $company->update([
                'name' => $request->name,
                'desc' => $request->desc,
               
            ]);
    
                session()->flash('update_company');
                return redirect('/companies');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

  
    public function destroy(Request $request)
    {
        $company_id = $request->id;
        $company = Company::where('id', $company_id)->first();
        $company->delete();

        session()->flash('delete_company');
        return redirect('/companies');
    }




}
