<?php

namespace App\Http\Controllers;

use App\Models\Haj;
use App\Http\Requests\StoreHajRequest;
use App\Http\Requests\UpdateHajRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HajController extends Controller
{
    
    public function index()
    {
        $Hajs =  Haj::where('type', '0')->get();
    
        return view ('hajs.index',compact('Hajs'));
    }

    public function create()
    { 
        $companies = Company::all();
        return view ('hajs.create',compact('companies'));
    }

    public function store(StoreHajRequest $request)
    {
        //dd($request->all());

        try {
           
            if ($request->type == 1) 
            {
                Haj::create([
                    'user_id' => Auth::user()->id,
                    'company_id' => $request->company_id,
                    'service_id' => $request->service_id,
                    'name' => $request->name,
                    'date' => $request->date,
                    
                    'take_off' => $request->take_off,
                    'number' => $request->number,
                    'cost' => $request->cost,
                    'type' => $request->type,
                   
                    ]);
            }
            else
            {
                Haj::create([
                    'company_id' => $request->company_id,
                    'service_id' => $request->service_id,
                    'name' => $request->name,
                    'date' => $request->date,
                    
                    'take_off' => $request->take_off,
                    'number' => $request->number,
                    'cost' => $request->cost,
                   
                    ]);
            }
    
                session()->flash('Add_hajs');
                return redirect('/hajs');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function show(Haj $haj)
    {
        //
    }

    public function edit(Haj $haj)
    {
        //
    }

    public function update(UpdateHajRequest $request, Haj $haj)
    {
        //
    }

    public function destroy(Request $request)
    {
        $haj_id = $request->id;
        $haj = Haj::where('id', $haj_id)->first();
        $haj->delete();

        session()->flash('delete_haj');
        return redirect('/hajs');
    }

    public function getallhajView()
    {
        
        $hajs =  Haj::where('type', '1')->get();
        return view ('hajs.allhaj',compact('hajs'));
    }



    
}
