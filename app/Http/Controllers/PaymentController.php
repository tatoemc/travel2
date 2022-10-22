<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Ticket;
use App\Models\Flight;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    
    public function index()
    {
        $payments =  Payment::all();
      //  dd($payments);
        return view ('payments.index',compact('payments'));
    }

    public function create()
    {
        //dd($request->all());
       
    }
    public function getpayment($id)
    {
       
      try {
            

            //update ticket
         $ticket = Ticket::where('id',$id)->first();
        
         $ticket->update([
            'status' => '1',
           ]);
          //update flight
           $flight = Flight::where('id',$ticket->flight_id)->first();
           //dd($flight);
           $newNumber = $flight->number - 1 ;

         $flight->update([
          'number' => $newNumber,
          ]);
          //insert in payment
          $total = $ticket->cost+$flight->cost;
         Payment::create([
          'ticket_id' => $ticket->id,
          'user_id' => $ticket->user_id,
          'empname' => Auth::user()->name,
          'total' => $total,
           ]);
    
              session()->flash('add_Payment');
                return back();
              }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }


    }

   
    public function store(StorePaymentRequest $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        $payment_id = $request->id;
        $payment = Payment::where('id', $payment_id)->first();
        $payment->delete();

        session()->flash('delete_ticket');
        return redirect('/payments');
    }
    public function userpayments(Request $request)
    {
        $id = Auth::user()->id;
       // dd($id);
        $payments =  Payment::where('user_id', $id)->get();
        
      //  dd($payments);
        return view ('payments.userpayments',compact('payments'));
    }



}
