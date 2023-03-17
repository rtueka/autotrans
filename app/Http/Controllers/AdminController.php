<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trip;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    public function toPanel(){
        if (Auth::check() and Auth::user()->role_id == 2){
            return view('admin.adminpanel');
        } else {
            return view('home');
        }
    }

    public function admintrips(){
        $trip = new Trip();
        return view('admin.trips', ['trips' => $trip::all()]);
    }

    public function add_trip(){
        $bus = new Bus();
        $route = new Route();
        $driver = new Driver();

        return view('admin.add_trip', [
            'buses' => $bus::all(),
            'routes' => $route::all(),
            'drivers' => $driver::all()
        ]);
    }

    public function do_add_trip(Request $req){
        $trip = new Trip();
        $trip->date_from = $req->input('date_from');
        $trip->date_to = $req->input('date_to');
        $trip->bus_id = $req->bus;
        $trip->route_id = $req->route;
        $trip->driver_id = $req->driver;
        $trip->price = $req->input('price');
        $trip->save();

        return redirect()->route('add_trip');
    }


    public function drivers(){
        $driver = new Driver();
        return view('admin.drivers', [
            'drivers' => $driver::all()
        ]);
    }

    public function adminTripSearch(Request $request){

        if ($request->id){
            $id = $request->id;
            return view('admin.trips', ['trips' => Trip::where('id', '=', $id)->get()]);
        } else {

        $from = $request->fromm;
        $to = $request->tto;
        $date = $request->date;

        $routes_id = Route::where('fromm', 'LIKE', "%{$from}%")->where('tto', 'LIKE', "%{$to}%")->pluck('id');

        $trips = Trip::whereIn('route_id', $routes_id)->where('date_from', 'LIKE', "%{$date}%")->orderBy('date_from')->get();

        return view('admin.trips', compact('trips'));
        }

    }

    public function add_driver() {
        return view('admin.add_driver');
    }

    public function auto() {
        $bus = new Bus();
        return view('admin.buses', [
            'buses' => $bus::all()
        ]);
    }

    public function list(Request $req){
        $id = $req->input('trip_id');
        $tickets = Ticket::where('trip_id', "{$id}")->get();
        $trip = Trip::find($id);
        $pdf = Pdf::loadView('admin.list', ['tickets' => $tickets, 'trip' => $trip]);
        return $pdf->stream('ticket.pdf');
    }





}
