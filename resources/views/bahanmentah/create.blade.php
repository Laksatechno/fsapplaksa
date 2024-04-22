<!-- resources/views/bahan_mentah/create.blade.php -->

@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <h2>Tambah Bahan Mentah</h2>

        <form action="{{ route('bahanmentah.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('bahanmentah.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
