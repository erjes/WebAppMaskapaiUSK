<?php

namespace App\Http\Controllers;

use App\Models\airline;
use App\Models\customer;
use App\Models\Flight;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class userController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function searchticket(Request $request)
    {
        $departure_city = $request->departure_city;
        $arrival_city = $request->arrival_city;
        $departure_date = $request->departure_date;
        $arrival_date = $request->arrival_date;

        $query = Flight::where('departure_city', $departure_city)
                       ->where('arrival_city', $arrival_city)
                       ->where('departure_date', $departure_date)
                       ->get();
        // $queryname = airline::findorFail($query->id_airline)->get();

        $queryname = [];
        foreach ($query as $flight) {
            $airline = Airline::findOrFail($flight->id_airline);
            $queryname[$flight->id] = $airline->name;
        }

        if ($query) {
        return view('tickets', compact('query','queryname'));
        } else {
            // Handle the case where no flight matches the search criteria
            return view('no-results');
        }
    }

    public function buyticket($id)
    {
    $customer = customer::where('id_user', Auth::id())->get();
    $flight = Flight::where('id_flight', $id)->get();
    $customer_status = customer::where('customer_status', 'PENDING')->where('id_user', Auth::id())->get();
    $pendingamount = $customer_status->count();
    if($customer){
        return view('createtransaction', compact('id','customer','customer_status','flight','pendingamount'));
    }else{
        return view('addcustomer', compact('id'));
    }
    }

    public function addcustomer($id){
        return view('addcustomer',compact('id'));
    }

    public function createcustomer(Request $request, $id){
        customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'id_user' => $request->id_user,
        ]);
        return redirect()->route('buy.ticket',compact('id'));
    }

    public function addctoticket(Request $request){
        $customer = customer::where('id_customer',$request->id_customer)->first();
        if ($customer) {
            $customer->customer_status = 'PENDING';
            $customer->save();
            return redirect()->back();
        } else {
            return redirect()->back()->withError('Customer not found.');
        }
        // $customer = customer::where('id_user', $request->id_user)->get();
    }

    public function removecfromticket(Request $request){
        $customer = customer::where('id_customer',$request->id_customer)->first();
        if ($customer) {
            $customer->customer_status = '';
            $customer->save();
            return redirect()->back();
        } else {
            return redirect()->back()->withError('Customer not found.');
        }
        // $customer = customer::where('id_user', $request->id_user)->get();
    }

    public function createtransaction(Request $request,$id){
        // try{
            $id_user = Auth::id();
            $customer_status = customer::where('customer_status', 'PENDING')->where('id_user',$id_user)->get();
            $count = $customer_status->count();
            transaction::create([
                'id_user' => $id_user,
                'id_flight' => $id,
                'no_booking' => 'BO' . $id_user.$id,
                'total_price' => $request->price * $count,
                'payment_status' => 'PENDING',
                'seat' => $count,
            ]);
            // $flight = Flight::findOrFail($request->id_flight);
            // $flight->seat_availability -= $count;
            // $flight->save();

            return redirect()->route('bookings');
    }
    public function bookings(){
        $booking = transaction::where('id_user', Auth::id())
                              ->where('payment_status', 'PENDING')
                              ->get(); // Fetch pending bookings

        $confirmedbooking = transaction::where('id_user', Auth::id())
                                       ->whereIn('payment_status', ['CONFIRMED', 'PAID', 'DECLINED'])
                                       ->get(); // Fetch confirmed, paid, or declined bookings

        $flightdata = [];
        $flightdataconfirmed = [];
        $customerconfirmed = [];
        $customer = [];

        foreach ($booking as $bookingdata) {
            $id_flight = $bookingdata->id_flight;
            $flight = Flight::where('id_flight', $id_flight)->first();
            if ($flight) {
                $flightdata[] = $flight;
                $customerdata = customer::where('id_customer', $bookingdata->id_customer)->get(); // Assuming there's a direct relation between transaction and customer
                $customerconfirmed[] = $customerdata;
            }
        }

        foreach ($confirmedbooking as $bookingdata) {
            $id_flight = $bookingdata->id_flight;
            $flight = Flight::where('id_flight', $id_flight)->first();
            if ($flight) {
                $flightdataconfirmed[] = $flight;
                $customerdata = customer::where('id_customer', $bookingdata->id_customer)->get(); // Assuming there's a direct relation between transaction and customer
                $customer[] = $customerdata;
            }
        }

        return view('bookings', compact('booking', 'confirmedbooking', 'flightdata', 'flightdataconfirmed', 'customerconfirmed', 'customer'));
    }

    public function payment($id_transaction){
        $transaction = transaction::findOrFail($id_transaction);
        $transaction->payment_status = 'PAID';
        $transaction->save();
        return redirect()->back();
    }
    public function cancelbooking($id_transaction){
        $transaction = transaction::findOrFail($id_transaction);
        $transaction->delete();
        return redirect()->back();
    }
}
