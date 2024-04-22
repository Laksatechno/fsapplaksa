@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
<div class="container">
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <b class="card-title">Riwayat Sponsor</b>
                        </div>
                    </div>
                </div>
<!-- resources/views/sponsor_request/index.blade.php -->

<!-- resources/views/sponsor_request/history.blade.php -->
<div class="table-responsive">
<table class="table table-hover table-bordered" id="sponsor-table" class="table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Jenis Sponsor</th>
            <th>Jumlah Rupiah</th>
            <th>Waktu Kegiatan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->jenis_sponsor }}</td>
                <td>Rp.{{ $request->jumlah_rupiah }}</td>
                <td>
                @if ($request->waktu_kegiatan)
                {{ \Carbon\Carbon::parse($request->waktu_kegiatan)->locale('id_ID')->isoFormat('dddd, D MMM YYYY') }}
            @else
                N/A
            @endif</td>
                <td><a href="{{ route('sponsor-request.edit', $request) }}"> {{ $request->status }} <i class="mdi mdi-pencil"></i></a></td>
                {{-- <td>{{ $request->$id }}</td> --}}
                {{-- <td>{{ $request->user ? $request->user->name : 'User Tidak Diketahui' }}</td> --}}
                <td>
                    <form action="{{ route('sponsor-request.destroy', $request) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can"></i></button>
                    </form>                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@if(session('status'))
    <p>{{ session('status') }}</p>
@endif
</div>
</div>
</div>
</div>
</div>
@endsection 