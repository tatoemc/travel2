<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Flight;
use App\Models\Country;
use App\Models\Company;
use App\Models\Service;
use App\Models\Payment;

class ReportsController extends Controller
{
    
    public function index()
    {
        $payments = Payment::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as sum')
        )->groupBy('created_at')->get();

        $flights = Flight::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(id) as sum')
        )->groupBy('created_at')->get();


        return view('reports.index', compact('payments','flights') );
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
