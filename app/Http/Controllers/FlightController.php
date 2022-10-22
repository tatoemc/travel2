<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Country;
use App\Models\Company;
use App\Models\Service;
use App\Models\City;
use App\Http\Requests\StoreFlightRequest;
use App\Http\Requests\UpdateFlightRequest;
use Illuminate\Http\Request;
use DB;

class FlightController extends Controller
{
   
    public function index()
    {

        $flights =  Flight::all();
        return view ('flights.index',compact('flights'));
    }

   
    public function create()
    {
        $countries = DB::table('countries')->orderBy('name','ASC')->get();
        $services = Service::all();
        $companies = Company::all();
        return view ('flights.create',compact('countries','companies','services'));
    }

    
    public function store(StoreFlightRequest $request)
    {
        try {
            $validated = $request->validated();
            Flight::create([
                'company_id' => $request->company_id,
                'service_id' => $request->service_id,
                'from' => $request->from,
                'to' => $request->to,
                'date' => $request->date,
                'Attendance' => $request->Attendance,
                'take_off' => $request->take_off,
                'number' => $request->number,
                'cost' => $request->cost,
               
                ]);
    
                session()->flash('Add_flight');
                return redirect('/flights');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function show(Flight $flight)
    {
        return view('flights.show',compact('flight'));
    }

   
    public function edit(Flight $flight)
    {
        $countries = Country::all();
        $companies = Company::all();
        return view ('flights.edit',compact('companies','flight','countries'));
    }

  
    public function update(UpdateFlightRequest $request, Flight $flight)
    {
        try {
            $validated = $request->validated();

            $flight->update([
                'company_id' => $request->company_id,
                'service_id' => $request->service_id,
                'from' => $request->from,
                'to' => $request->to,
                'date' => $request->date,
                'Attendance' => $request->Attendance,
                'take_off' => $request->take_off,
                'number' => $request->number,
                'cost' => $request->cost,
                
                
            ]);
    
                session()->flash('update_flight');
                return redirect('/flights');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

  
    public function destroy(Request $request)
    {
        $flight_id = $request->id;
        $flight = Flight::where('id', $flight_id)->first();
        $flight->delete();

        session()->flash('delete_flight');
        return redirect('/flights');
    }

    public function getLocal()
    {
        $companies = Company::all();
        
        return view ('flights.getLocal',compact('companies'));
    }
    public function getInternational()
    {
        $countries = Country::all();
        $companies = Company::all();
        return view ('flights.getInternational',compact('companies','countries'));
    }
    public function getHaj()
    {
      
        $companies = Company::all();
        return view ('flights.getHaj'.compact('companies'));
    }


}
