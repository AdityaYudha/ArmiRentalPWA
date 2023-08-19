<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;

class SewaController extends Controller
{

    /**
     * Memasukan data penyewaan kedalam database
     */
    public function insert(Request $request)
    {

        // mengambil data mobil
        $selected_car = Car::find($request->input("car"));

        // menghitung lamanya penyewaan dalam hari
        $mulai = Carbon::createFromFormat('Y-m-d', $request->input('sewa'));
        
        $selesai = Carbon::createFromFormat('Y-m-d', $request->input('pengembalian'));
        $hari = $selesai->diffInDays($mulai);

        // menyimpan data penyewaan
        $booking = new Booking;

        // cek apakah mobil dengan id x pada tanggal y belum di sewa
        if($booking->where("car_id", $request->input("car"))->whereDate("penyewaan", $mulai)->exists())
        {
            $tanggal = $mulai->day . "/" . $mulai->month . "/". $mulai->year;

            $msg = "Pemesanan mobil ". $selected_car->nama_mobil . " pada tanggal ". $tanggal . " tidak tersedia silahkan pesan pada tanggal lain";

            return redirect('/daftar-mobil/'.$request->input("car"))->with("gagal", $msg);

        }else{
            
            // menghitung biaya hari * price sewa
            $biaya = $selected_car->price  * $hari;
    
            $booking->nama_lengkap = $request->input("nama");
            $booking->alamat_lengkap = $request->input("alamat");
            $booking->nomer_wa = $request->input("nohp");
            $booking->penyewaan = $request->input("sewa");
            $booking->pengembalian = $request->input("pengembalian");
            $booking->hari = $hari;
            $booking->biaya = $biaya;
            $booking->terkonfirmasi = FALSE;
            $booking->car()->associate($selected_car);
    
            $booking->save();
    
            return redirect('/daftar-mobil/'.$request->input("car"))->with("success-booking", $request->input("nama"));
        }
    }
}
