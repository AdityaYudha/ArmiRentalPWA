<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // filter
        $now = Carbon::now();
        $next = Carbon::now()->addDays(7);

        // cek metode request
        if($request->method() == "POST") {

            // jika method post ambil data dari user input
            $now = Carbon::createFromFormat('Y-m-d', $request->input('now'));
            $next = Carbon::createFromFormat('Y-m-d', $request->input('next'));
        }
        
        $bookings = Booking::with('car')->whereBetween("penyewaan", [$now, $next])->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek metode request
        $now = Carbon::createFromFormat('Y-m-d', $request->input('now'));
        $next = Carbon::createFromFormat('Y-m-d', $request->input('next'));

        // 
        $bookings = Booking::with('car')->whereBetween("penyewaan", [$now, $next])->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus !',
            'alert-type' => 'danger'
        ]);
    }
}
