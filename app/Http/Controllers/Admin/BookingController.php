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
     * mengambil data pembokingan yang telah dikonfirmasi admin
     */
    public function confirmed(){

        // ambil data booking
        $bookings = Booking::with('car')->where("terkonfirmasi", TRUE)->get();

        // set title
        $title = "Booking Terkonfirmasi";

        $konfirmasi = TRUE;

        return view('admin.bookings.index', compact('bookings', "title", "konfirmasi"));
    }

    /**
     * Mengambil data pembokingan yang masih menunggu konfirmasi
     */
    public function waiting()
    {
        // ambil data booking
        $bookings = Booking::with('car')->where("terkonfirmasi", FALSE)->get();

        // set title
        $title = "Booking Menunggu Terkonfirmasi";

        $konfirmasi = FALSE;

        return view('admin.bookings.index', compact('bookings', "title", "konfirmasi"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // cak dari halaman mana request datang
        $origin = $request->input("halaman");

        $now = Carbon::createFromFormat('Y-m-d', $request->input('now'));
        $next = Carbon::createFromFormat('Y-m-d', $request->input('next'));

        $bookings = [];

        $title = "";

        $konfirmasi = FALSE;

        if($origin == "konfirmasi"){

            // 
            $bookings = Booking::with('car')
            ->whereBetween("penyewaan", [$now, $next])
            ->where("terkonfirmasi", TRUE)
            ->get();

            $title = "Booking Terkonfirmasi";
            $konfirmasi = TRUE;

        }else{

            $bookings = Booking::with('car')
            ->whereBetween("penyewaan", [$now, $next])
            ->where("terkonfirmasi", FALSE)
            ->get();

            $title = "Booking Menunggu Terkonfirmasi";
            $konfirmasi = FALSE;
        }

        return view('admin.bookings.index', compact('bookings', 'title', 'konfirmasi'));
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
     * Membatalkan konfirmasi pesanan
     */
    public function batalkan_konfirmasi($id)
    {
        $booking = Booking::find($id);
        $booking->terkonfirmasi = FALSE;
        $booking->save();

        // menampilkan alert
        toastr()->success('Data berhasil diupdate');

        return redirect()->to("/admin/bookings/confirmed");
    }

    /**
     * mengkonfirmasi pesanan
     */
    public function konfirmasi_pesanan($id)
    {
        $booking = Booking::find($id);
        $booking->terkonfirmasi = TRUE;
        $booking->save();

        // menampilkan alert
        toastr()->success('Data berhasil diupdate');

        return redirect()->to("/admin/bookings/waiting");
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
