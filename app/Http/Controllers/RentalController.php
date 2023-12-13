<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->is_admin) {
            $rentals = Rental::where('user_id', auth()->user()->id)->latest()->get();

            return view('web.rental', compact('rentals'));
        }

        $rentals = Rental::latest('created_at')->get();

        return view('rental.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'game_id' => $request->game,
        ];

        Rental::create($data);

        return redirect()->back()->with('success', 'Request sent.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental $rental)
    {
        if($request->status === 'Returned') {
            $data = [
                'status' => $request->status,
                'return_date' => Carbon::now(),
            ];
        } else {
            $data = [
                'status' => $request->status,
            ];
        }

        if($request->status === 'Returned') {
            $fiveDays = Carbon::now()->addDays(5)->endOfDay();

            // Untuk demo 
            $now = Carbon::parse('2023-12-19 00:00:00');

            $data['penalty'] = $now > $fiveDays ? $now->addDay()->diffInDays($fiveDays) * 5000 : null;
        }

        Rental::where('id', $rental->id)->update($data);

        return redirect()->back()->with('success', 'Request succesfully approved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
