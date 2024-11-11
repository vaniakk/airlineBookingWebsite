<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function showBookingForm(Flight $flight) {
        return view('book', ['flight' => $flight]);
    }
    
    //Booking form
    public function booking(Request $request){
        $request->validate([
            'passanger_name'=>'required|string',
            'passanger_phone'=>'required|string|max:14',
            'seat_number'=>'required|string|max:3',],
            [
                'passanger_name.required'=>'nama name wajib diisi',
                'passanger_phone.required'=> 'phone wajib diisi',
                'seat_number.required'=>'seat number wajib diisi',
            ]);
        
        // Membuat objek baru
        $ticket= new Ticket;
        
        $ticket->flight_id = $request->flight_id;
        $ticket->passanger_name=$request->passanger_name;
        $ticket->passanger_phone=$request->passanger_phone;
        $ticket->seat_number=$request->seat_number;

        $ticket->save();

        return redirect('/flights')->with('success', 'Passanger berhasil di input');

    }

    public function showCustomer(Flight $flight)
    {        

        $tickets = Ticket::where('flight_id', $flight->id)->get();
    
        return view('ticket', ['tickets' => $tickets]);
    }

    public function update(Ticket $ticket){

        $ticket->update([
            'is_boarding'=> 1,
            'boarding_time' => now(),
        ]);

        return redirect()
        ->route('ticket.showCustomer',$ticket->flight_id)
        ->with('success', 'boarding berhasil');
    }

    public function delete(Ticket $ticket){
        $ticket->delete();

        return redirect()
        ->route('ticket.showCustomer',$ticket->flight_id)
        ->with('success', 'delete berhasil');
    }



}
