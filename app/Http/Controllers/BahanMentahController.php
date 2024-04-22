<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanMentah;
use Barryvdh\DomPDF\Facade\Pdf;
class BahanMentahController extends Controller
{
    public function index()
    {
        $bahan_mentahs = BahanMentah::all();
        return view('bahanmentah.index', compact('bahan_mentahs'));
    }

    public function create()
    {
        return view('bahanmentah.create');
    }

    public function store(Request $request)
    {
        // Validasi input

        BahanMentah::create($request->all());

        return redirect()->route('bahanmentah.index')->with('success', 'Bahan mentah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bahan_mentah = BahanMentah::findOrFail($id);
        return view('bahanmentah.edit', compact('bahan_mentah'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input

        $bahan_mentah = BahanMentah::findOrFail($id);
        $bahan_mentah->update($request->all());

        return redirect()->route('bahanmentah.index')->with('success', 'Bahan mentah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $bahan_mentah = BahanMentah::findOrFail($id);
        $bahan_mentah->delete();

        return redirect()->route('bahanmentah.index')->with('success', 'Bahan mentah berhasil dihapus');
    }
    public function printlapbahanmentah()
    {
        $bahan_mentahs = BahanMentah::all();
    
        $pdf = PDF::loadView('bahanmentah.laporanbahanmentah', compact('bahan_mentahs'));
    
        return $pdf->download('bahan_mentah.pdf');
    }
}
