<!-- resources/views/bahan_mentah/index.blade.php -->

@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Daftar Bahan Mentah</h2>
            </div>
            <div class="card-body">
                <a href="{{ route('bahanmentah.create') }}" class="btn btn-success mb-2">Tambah Bahan Mentah</a>
                <a href="{{ url('/bahanmentah-print') }}" class="btn btn-primary mb-2" target="_blank">Cetak PDF</a>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                <table class="table table-hover table-bordered" id="barangmentah" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bahan_mentahs as $bahan_mentah)
                            <tr>
                                <td>{{ $bahan_mentah->nama_barang }}</td>
                                <td>{{ $bahan_mentah->stok }}</td>
                                <td><a href="{{ route('bahanmentah.edit', $bahan_mentah->id) }}" class="btn btn-primary btn-sm"><span class="mdi mdi-pencil-box mdi-24px"></span></a></td>
                                <td>
                                    
                                    <form action="{{ route('bahanmentah.destroy', $bahan_mentah->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><span class="mdi mdi-delete-circle mdi-24px"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Add DataTables.js JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

@endsection



