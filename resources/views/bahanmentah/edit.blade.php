<!-- resources/views/bahan_mentah/edit.blade.php -->

@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <h2>Edit Bahan Mentah</h2>

        <form action="{{ route('bahanmentah.update', $bahan_mentah->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $bahan_mentah->nama_barang }}" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $bahan_mentah->stok }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('bahanmentah.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
