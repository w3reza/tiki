<?php

namespace App\Http\Controllers\backend;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seat;

class SeatController extends Controller
{
    public function store($busId)
    {
        $bus = Bus::findOrFail($busId);

        $capacity = $bus->capacity;
        $existingSeatsCount = Seat::where('bus_id', $busId)->count();

    if ($existingSeatsCount >= $capacity) {
        return redirect()->route('seats.index', ['busId' => $busId])->with('success', 'Seats are already inserted and capacity is fulfilled.');
    }


        $seatData = [];
        $rows = range('a', 'z');
        $count = 1;

        foreach ($rows as $row) {
            for ($i = 1; $i <= min($capacity - $count + 1, 4); $i++) {
                $seatData[] = [
                    'bus_id' => $busId,
                    'seat_number' => $row . $i,
                    'status' => 'Available',

                ];
            }
            $count += 4;
        }


        Seat::insert($seatData);

        return redirect()->route('seats.index', ['busId' => $busId])->with('success', 'Seats are inserted successfully.');
    }

    public function index($busId)
    {
        $seats = Seat::where('bus_id', $busId)->with('bus')->get();
        return view('backend.pages.seats.index', ['busId' => $busId, 'seats' => $seats]);
    }
}
