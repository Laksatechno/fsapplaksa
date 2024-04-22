<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengirimans = Pengiriman::orderBy('created_at', 'desc')->get();

        return view('pengiriman.index', compact('pengirimans'));
    }


    public function updateStatus($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
    
        // Lakukan logika penyimpanan status sampai di sini
        $pengiriman->status = 'Barang Sampai Ditujuan';
        $pengiriman->save();
    
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}

