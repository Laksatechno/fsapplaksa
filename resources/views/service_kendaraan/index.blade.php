@extends('layouts.master')
@section('content')
    @include('layouts.topNavBack')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b class="card-title">Service Kendaraan</b>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/service-kendaraan/new') }}" class="btn btn-primary btn-sm float-right"><i class="mdi mdi-loupe"></i>Pengajuan Service</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {!! session('success') !!}
                                </div>
                            @endif
                            <table class="table table-hover table-bordered" id="kendaraan-table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Pemakai</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Tanggal</th>
                                        <th>Hapus</th>
                                        <th>Print</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($servicekendaraans as $servicekendaraan)
                                        <tr>
                                            <td>{{ $servicekendaraan->nama }}</td>
                                            <td>{{ $servicekendaraan->merk_mobil }}</td>
                                            <td>{{ trans('days.' . $servicekendaraan->tanggal->format('l')) }}, {{ $servicekendaraan->tanggal->format('d') }} {{ trans('months.' . $servicekendaraan->tanggal->format('F')) }} {{ $servicekendaraan->tanggal->format('Y') }}</td>
                                            <td>
                                                <form class="btn-group" action="{{ url('/service-kendaraan/delete/' . $servicekendaraan->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can"></i></button>                                       
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('service_kendaraan.print' , $servicekendaraan->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('service_kendaraan.detail' , $servicekendaraan->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- Akhir perubahan -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
