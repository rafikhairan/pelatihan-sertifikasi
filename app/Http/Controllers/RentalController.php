<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rental;
use Barryvdh\DomPDF\Facade\Pdf;
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

            $fiveDays = Carbon::parse($rental->created_at)->addDays(5)->endOfDay();

            // Untuk real case ketika project sudah digunakan
            $now = Carbon::now();
            
            // Untuk demo ketika mengembalikan lebih dari 5 hari, tinggal disesuaikan dari tanggal rental dibuat +6 hari
            // $now = Carbon::parse('2023-12-23 00:00:00');

            $data['penalty'] = $now > $fiveDays ? $now->addDay()->diffInDays($fiveDays) * 5000 : null;
        } else {
            $data = [
                'status' => $request->status,
            ];
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

    public function printPdf() 
    {
        $rentals = Rental::all();

        $pdf = Pdf::loadView('pdf.rentals', [
            'rentals' => $rentals
        ]);
        
        return $pdf->download('rentals.pdf');
    }
}
