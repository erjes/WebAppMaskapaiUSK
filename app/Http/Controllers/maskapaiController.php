<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Flight;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class maskapaiController extends Controller
{
    public function index()
    {
        $flight = Flight::where('id_user',Auth::id())->get();
        return view('maskapai.flightreport', compact('flight'));
    }
    public function indexUnvalidated()
    {
        return view('maskapai.unvalidated');
    }
    public function create()
    {
        return view('maskapai.addflight');
    }
    public function indexconfirmtransaction()
    {
        $transaction = transaction::where('payment_status','PAID')->get();
        return view('maskapai.confirmtransaction', compact('transaction'));
    }
    public function confirmtransaction($id_transaction)
    {
        $transaction = transaction::findOrFail($id_transaction);
        $transaction->payment_status = 'CONFIRMED';
        $transaction->save();
        return redirect()->back();
    }
    public function declinetransaction($id_transaction)
    {
        $transaction = transaction::findOrFail($id_transaction);
        $transaction->payment_status = 'DECLINED';
        $transaction->save();
        return redirect()->back();
    }
    public function transactionreport()
    {
        $transaction = transaction::where('payment_status','CONFIRMED')->get();
        return view('maskapai.transactionreport', compact('transaction'));
    }
    public function details(Request $request)
    {
        $transaction = transaction::where($request->id_transaction)->get();
        $transaction = transaction::where($request->id_transaction)->get();
        return view('maskapai.details', compact('flightdata','customerdata'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_flight' => ['required'],
            'departure_city' => ['required'],
            'arrival_city' => ['required'],
            'departure_date' => ['required'],
            'arrival_date' => ['required'],
            'departure_time' => ['required'],
            'arrival_time' => ['required'],
            'departure_time' => ['required'],
            'seat_availability' => ['required'],
            'price' => ['required'],
        ]);

        Flight::create([
            'id_airline' => $request->id_airline,
            'no_flight' => $request->no_flight,
            'departure_city' => $request->departure_city,
            'arrival_city' => $request->arrival_city,
            'departure_date' => $request->departure_date,
            'arrival_date' => $request->arrival_date,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'seat_availability' => $request->seat_availability,
            'price' => $request->price,
            'id_user' => Auth::id(),
        ]);
        return redirect()->route('maskapai.dashboard')->with('status', 'Flight Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataflight = Flight::where('id_flight',$id)->get();
        return view('maskapai.editflight', compact('dataflight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $flight = Flight::findOrFail($request->id_flight);

        $flight->no_flight = $request->input('no_flight');
        $flight->departure_city = $request->input('departure_city');
        $flight->arrival_city = $request->input('arrival_city');
        $flight->departure_date = $request->input('departure_date');
        $flight->departure_time = $request->input('departure_time');
        $flight->arrival_date = $request->input('arrival_date');
        $flight->arrival_time = $request->input('arrival_time');
        $flight->seat_availability = $request->input('seat_availability');
        $flight->price = $request->input('price');

        $flight->save();

        return redirect()->route('maskapai.dashboard')->with('status', 'Airline Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_flight)
    {
        $flight = Flight::findOrFail($id_flight);
        $flight->delete();
        return redirect()->route('maskapai.dashboard')->with('success', 'Airline deleted successfully');
    }

    public function searchflight(Request $request)
    {
        $no_booking = $request->no_booking;


        $transaction = transaction::where('no_booking', $no_booking)->get();

        if ($transaction) {
        return view('maskapai.transactionreport', compact('transaction'));
        } else {
            return view('no-results');
        }
    }
}
