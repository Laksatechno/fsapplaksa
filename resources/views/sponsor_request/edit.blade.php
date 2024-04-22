@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
<div class="container">
    <div class="row" style= "margin-top: 80px; margin-bottom: 80px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">


<!-- resources/views/sponsor_request/edit.blade.php -->
<label for="status">Jenis Sponsor : {{ $sponsorRequest->jenis_sponsor}}</label></br>
<label for="status">Jumlah : {{ $sponsorRequest->jumlah_rupiah}}</label></br>
<label for="status">Waktu Kegiatan : {{ $sponsorRequest->waktu_kegiatan}}</label></br>
<form action="{{ route('sponsor-request.update', $sponsorRequest) }}" method="post">
    @csrf
    @method('put')
    
    <label for="status">Status:</label>
    <select name="status" id="status" required>
        <option value="Setuju" {{ $sponsorRequest->status === 'Setuju' ? 'selected' : '' }}>Setuju</option>
        <option value="Tolak" {{ $sponsorRequest->status === 'Tolak' ? 'selected' : '' }}>Tolak</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection