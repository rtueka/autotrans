<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Ways;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Route;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MainController extends Controller
{
    public function allRoutes(){
        $trip = new Trip();
        $test = new Test();
        $test = $test->find(1)->toArray();
//        $time = date_plus($test);
        return view('rout', ['data' => $trip::all(), 'array' => $test]);
    }

    public function ticket(Request $req){
        $trip_id = $req->input('trip_id');
        $way_id = $req->input('way_id');
        $trip = new Trip();
        $way = new Ways();
        return view('ticket', ['way' => $way::find($way_id), 'trip' => $trip::find($trip_id)]);
    }

    public function buy_ticket(Request $req, $id){
        $ticket = new Ticket();
        $ticket->name = $req->input('name');
        $ticket->surname = $req->input('surname');
        $ticket->patronymic = $req->input('patronymic');
        $ticket->sex = $req->sex;
        $ticket->document_type = $req->document_type;
        $ticket->document_number = $req->document_number;
        $ticket->place = $req->input('place');
        $ticket->tariff = $req->tariff;
        $ticket->trip_id = $id;
        $ticket->user_id = $req->input('user_id');
        $ticket->way_id = $req->input('way_id');
        $ticket->save();

        return redirect()->route('home');
    }

    public function deleteTicket(Request $req){
        $ticket_id = $req->input('ticket_id');
        $ticket = new Ticket();
        $ticket = $ticket::find($ticket_id);
        $ticket->delete();
        return redirect()->route('account');
    }

    public function search(Request $request){
        $from = $request->fromm;
        $to = $request->tto;
        $date = $request->date;

        $ways = Ways::where('fromm', 'LIKE', "%{$from}%")->where('tto', 'LIKE', "%{$to}%")->get();


        return view('search_list', compact('ways'));
    }

    public function admtickets(){
        $ticket = new Ticket();
        return view('admtickets', ['tickets' => $ticket::all()]);
    }

    public function account(){
        if (Auth::check()) {
            $tickets = Ticket::where('user_id', Auth::user()->id)->orderBy('create_time', 'desc')->get();
            return view('account', compact('tickets'));
        } else {
            return redirect()->route('home');
        }
    }

    public function search_mos_sp(Request $request){
        $from = "Москва";
        $to = "Санкт-петербург";
        $date = $request->date;

        $routes_id = Route::where('fromm', 'LIKE', "%{$from}%")->where('tto', 'LIKE', "%{$to}%")->pluck('id');

        $trips = Trip::whereIn('route_id', $routes_id)->where('date_from', 'LIKE', "%{$date}%")->orderBy('date_from')->get();

        return view('search_list', compact('trips'));
    }

    public function pdf(Request $request){
        $id = $request->ticket_id;
        $ticket = new Ticket();
        $pdf = Pdf::loadView('pdfticket', ['ticket' => $ticket::find($id)]);
        return $pdf->stream('ticket.pdf');
    }

    public function topdf(Request $request){
        $id = $request->ticket_id;
        $ticket = new Ticket();
        return view('pdfticket', ['ticket' => $ticket::find($id)]);
    }




}
