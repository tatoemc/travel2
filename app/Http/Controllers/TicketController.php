<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Flight;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TicketController extends Controller
{
   
    public function index()
    {
        $tickets =  Ticket::all();
        return view ('tickets.index',compact('tickets'));
    }

   
    public function create()
    {
        return view ('tickets.create');
    }

  
    public function store(StoreTicketRequest $request)
    {
       // dd($request->all());
        try {
            $validated = $request->validated();

            Ticket::create([
                'user_id' => Auth::user()->id,
                'flight_id' => $request->id,
                'services_id' => $request->services_id,
                'cost' => $request->cost,
                'type' => $request->type,
                'tickets_id' => $request->id+$request->service_id,
                'status' => '0',
                'paymentype' => $request->paymentype,
            ]);
    
                session()->flash('add_Ticket');
                return back();
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }

    }

    
    public function show(Ticket $ticket)
    {
        return view('tickets.show',compact('ticket'));
    }

  
    public function edit(Ticket $ticket)
    {
      
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

   
    public function destroy(Request $request)
    {
        $ticket_id = $request->id;
        $ticket = Ticket::where('id', $ticket_id)->first();
        $ticket->delete();

        session()->flash('delete_ticket');
        return redirect('/tickets');
    }

    public function getLocalFlayView()
    {
        
        $flights = Flight::where('service_id','2')->get();
        return view ('tickets.local',compact('flights'));
    }
    public function getInternationalFlayView()
    {
        
        $flights = Flight::where('service_id','3')->get();
        return view ('tickets.international',compact('flights'));
    }
    public function getHajFlayView()
    {
        
        $flights = Flight::where('service_id','4')->get();
        return view ('tickets.local',compact('flights'));
    }
    public function getallFlayView()
    {
        
        $flights =  Flight::where('service_id','1')->get();
        return view ('tickets.allfly',compact('flights'));
    }


}
