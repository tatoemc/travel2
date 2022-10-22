<?php

namespace App\Http\Controllers;

use App\Models\Servicestype;
use App\Http\Requests\StoreServicestypeRequest;
use App\Http\Requests\UpdateServicestypeRequest;
use Illuminate\Http\Request;

class ServicestypeController extends Controller
{
    
    public function index()
    {
        $servicesTypes =  ServicesType::all();
        return view ('servicesTypes.index',compact('servicesTypes'));
    }

    public function create()
    {
        //
    }
    public function store(StoreServicestypeRequest $request)
    {
        try {
            $validated = $request->validated();
            ServicesType::create([
                'name' => $request->name,
                'desc' => $request->desc,
               
                ]);
    
                session()->flash('Add_company');
                return redirect('/servicestypes');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }

    }

    public function show(Servicestype $servicestype)
    {
        //
    }

    public function edit(Servicestype $servicestype)
    {
        
        return view ('servicesTypes.edit',compact('servicestype'));
    }

    public function update(UpdateServicestypeRequest $request, Servicestype $servicestype)
    {
        try {
            $validated = $request->validated();

            $servicestype->update([
                'name' => $request->name,
                'desc' => $request->desc,
               
            ]);
    
                session()->flash('update_company');
                return redirect('/servicestypes');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function destroy(Request $request)
    {
        $servicesType_id = $request->id;
        $servicesType = ServicesType::where('id', $servicesType_id)->first();
        $servicesType->delete();

        session()->flash('delete_servicesType');
        return redirect('/servicestypes');
    }

}
