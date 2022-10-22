<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index()
    {
        $services =  Service::all();
        return view ('services.index',compact('services'));
    }
   
    public function store(StoreServiceRequest $request)
    {
        try {
            $validated = $request->validated();
            Service::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'cost' => $request->cost,
               
                ]);
    
                session()->flash('Add_company');
                return redirect('/services');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function show(Service $service)
    {
        //
    }

    
    public function edit(Service $service)
    {
        //
    }

   
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    
    public function destroy(Request $request)
    {
        $service_id = $request->id;
        $service = Service::where('id', $service_id)->first();
        $service->delete();

        session()->flash('delete_service');
        return redirect('/services');
    }
}
