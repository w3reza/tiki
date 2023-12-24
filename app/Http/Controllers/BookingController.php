<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, $seat_id)
    {
        $seat = Seat::findOrFail($seat_id);

        Booking::create([
            'user_id' => 2,
            'bus_id' => $seat->bus_id,
            'seat_id' => $seat_id,
            'booking_date' => now(),
            'status' => 'Confirmed',
        ]);

        $seat->update([
            'status' => 'Booked',
        ]);

        return redirect()->back()->with('success', 'Booking is created successfully.');
    }
}
