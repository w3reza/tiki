<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Location;
use Illuminate\Http\Request;

class busController extends Controller
{

/*
|--------------------------------------------------------------------------
| Create Page Of Bus
|--------------------------------------------------------------------------
*/
    public function create()
    {
        $locations = Location::get();
        return view('backend.pages.buses.create', compact('locations'));
    }

/*
|--------------------------------------------------------------------------
| Store Operation Of Bus
|--------------------------------------------------------------------------
*/
    public function store(Request $request)
    {
        /*
        Defualt Validation
        $this->validate($request, [
                    'name' => 'required|max:255',
                    'desctiption' => 'nullable|max:255',
                    'cover_photo' => 'required | mimes:jpg,jpeg,png | max:1000',
                ]   );

        */

        // Validation with Custom Messages
        $rules = [

            'bus_name' => 'required|max:255',
            'bus_number' => 'required|max:255',
            'capacity' => 'required|max:255',
            'type' => 'required|max:255',
            'departure_location' => 'required|max:255',
            'arrival_location' => 'required|max:255',
            'departure_time' => 'required|max:255',
            'arrival_time' => 'required|max:255',
        ];
        $message = [
            'bus_name.required' => 'Bus Name is required',
        ];
        $request->validate($rules, $message);



        //dd($request->all());

        // Store Data
        Bus::create([
            'user_id' => $request->user_id, // 'user_id' => auth()->user()->id, // 'user_id' => auth()->id(), // 'user_id' => auth('admin')->id(), // 'user_id
            'bus_name' => $request->bus_name,
            'bus_number' => $request->bus_number,
            'capacity' => $request->capacity,
            'type' => $request->type,
            'departure_location' => $request->departure_location,
            'arrival_location' => $request->arrival_location,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,

        ]);

        return redirect()
            ->route('bus.index')
            ->with('success', 'Bus Created Successfully');
    }
    public function index()
    {
        $buses = Bus::orderBy('id', 'desc')->get();
        return view('backend.pages.buses.index', compact('buses'));
    }

    public function find(Request $request)
    {

        $buses = Bus::where('departure_location', 'LIKE', '%' . $request->departure_location . '%')
            ->where('arrival_location', 'LIKE', '%' . $request->arrival_location . '%')
            ->where('departure_time', 'LIKE', '%' . $request->departure_time . '%')
            ->get();
        $locations = Location::get();
        return view('backend.pages.buses.find', compact('buses', 'locations'));
    }
}
