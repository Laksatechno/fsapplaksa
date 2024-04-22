@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
                            <div class="container">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row" style="margin-bottom: 100px">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <b class="card-title">Daftar Brosur</b>
                                                        </div>
                                                        @if ($brochures->count())
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($brochures as $brochure)
                                                                        <div class="col-md-4 mb-4">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">{{ $brochure->title }}</h5>
                                                                                    <a href="{{ route('brochures.download', $brochure->id) }}" class="btn btn-primary btn-block mt-2">Download <span class="mdi mdi-cloud-download mdi-18px"></span></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @else
                                                            <p>No brochures available.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<!-- Add DataTables.js JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

</div>
</div>
</div>
</div>
