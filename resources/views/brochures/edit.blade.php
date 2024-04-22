@extends('layouts.master')

@section('content')
    @include('layouts.topNavBack')

    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-6">
                                <b class="card-title">Edit Brosur</b>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('brochures.update', $brochure->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Judul Brosur:</label>
                                <input type="text" name="title" class="form-control" value="{{ $brochure->title }}" required placeholder="Contoh: BloodBag.pdf">
                            </div>

                            <div class="form-group">
                                <label for="file">File:</label>
                                <input type="file" name="file" class="form-control-file">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <span class="mdi mdi-content-save mdi-18px"></span> Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
