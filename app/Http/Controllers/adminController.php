<?php

namespace App\Http\Controllers;

use App\Models\airline;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request)
    {
        $maskapai = User::findOrFail($request->id);

        $maskapai->role = 'maskapai';

        $maskapai->save();

        $name = $request->name;

        airline::create([
            'name' => $name,
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'Airline Approved.');
    }

    public function getUnvalidatedAirline(Request $request)
    {
        $unvalidatedAirline = User::where('role', 'unvalidated')->get();
        $validatedAirline = User::where('role', 'maskapai')->get();

        return view('admin.approve', compact('unvalidatedAirline', 'validatedAirline'));
    }

    public function destroy(Request $request)
    {
        $airline = Airline::where('id_airline',$request->id);

        $airline->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Airline deleted successfully');
    }
}
