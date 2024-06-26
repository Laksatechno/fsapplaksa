@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Laksa</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                        
                                    </ol>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        @if (auth()->user()->level=="superadmin")
    
                        <div class="row">
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Faktur NON PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ COUNT($invoice) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Sales NON PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ number_format(Auth::user()->invoice->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ number_format($invoice->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Outlet</h5>
                                        </div>
                                        <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                                    </div>
                                </div>
                            </div>

                            
    
                            {{-- <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-buffer bg-danger text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Add to Card</h5>
                                        </div>
                                        <h3 class="mt-4">86%</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p>
                                    </div>
                                </div>
                            </div> --}}
    
                        </div>

                        <div class="row">
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Faktur PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ COUNT(Auth::user()->invoiceppn) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ COUNT($invoiceppn) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Sales PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ number_format(Auth::user()->invoiceppn->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ number_format($invoiceppn->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Outlet</h5>
                                        </div>
                                        <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @elseif (auth()->user()->level=="admin")

                        <div class="row">
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Faktur NON PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ COUNT($invoice) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Sales NON PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ number_format(Auth::user()->invoice->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ number_format($invoice->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Outlet</h5>
                                        </div>
                                        <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                                    </div>
                                </div>
                            </div>

                            
    
                            {{-- <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-buffer bg-danger text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Add to Card</h5>
                                        </div>
                                        <h3 class="mt-4">86%</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p>
                                    </div>
                                </div>
                            </div> --}}
    
                        </div>

                        <div class="row">
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Faktur PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ COUNT(Auth::user()->invoiceppn) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ COUNT($invoiceppn) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Sales PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ number_format(Auth::user()->invoiceppn->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ number_format($invoiceppn->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Outlet</h5>
                                        </div>
                                        <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>



                        @elseif (auth()->user()->level=="marketing")

                        <div class="row">
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Faktur NON PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ COUNT($invoice) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Sales NON PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ number_format(Auth::user()->invoice->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ number_format($invoice->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Outlet</h5>
                                        </div>
                                        <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                                    </div>
                                </div>
                            </div>

                            
    
                            {{-- <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-buffer bg-danger text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Add to Card</h5>
                                        </div>
                                        <h3 class="mt-4">86%</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p>
                                    </div>
                                </div>
                            </div> --}}
    
                        </div>

                        <div class="row">
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Faktur PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ COUNT(Auth::user()->invoiceppn) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ COUNT($invoiceppn) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Sales PPN</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ number_format(Auth::user()->invoiceppn->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ number_format($invoiceppn->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Outlet</h5>
                                        </div>
                                        <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @elseif (auth()->user()->level=="customer")

                        <div class="row">
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Faktur</h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @elseif(auth()->user()->level=="customer")
                                        <h3 class="mt-4">{{ COUNT(Auth::user()->invoice_customer) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ COUNT($invoice) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6 col-xl-4">
                                <div class="card">
                                    <div class="card-heading p-4">
                                        <div class="mini-stat-icon float-right">
                                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-16">Total Transaksi </h5>
                                        </div>
                                        @if(auth()->user()->level=="marketing")
                                        <h3 class="mt-4">{{ number_format(Auth::user()->invoice->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @elseif(auth()->user()->level=="customer")
                                        <h3 class="mt-4">{{ number_format(Auth::user()->invoice_customer->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @else
                                        <h3 class="mt-4">{{ number_format($invoice->sum('total')) }}</h3>
                                        <div class="progress mt-4" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                        {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif (auth()->user()->level=="marketingcustomer")

                        <div class="row">
                            <div class="row">
                            <div class="container">
                                <div class="jumbotron">
                                  <h1 class="hd1">Selamat Datang!</h1>
                                  <p class="lead hd1">Jadikanlah wilayahmu seperti rumahmu dan buat senyaman mungkin tanpa melupakan tujuanmu!</p>
                                  <hr class="my-4">
                                  <p class="hd1">PT Laksa Medika Internusa</p>
                                  <p class="lead">
                                    <a class="btn btn-success btn-lg" href="{{ url('daily-report-marketing') }}" role="button">Daily Report</a>
                                    <a class="btn btn-info btn-lg" href="{{ url('/laporan-barang')}}" role="button">Laporan Barang</a>
                                  </p>
                                </div>
                                
                                </div>
    
                        <!--    <div class="col-sm-6 col-xl-4">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-heading p-4">-->
                        <!--                <div class="mini-stat-icon float-right">-->
                        <!--                    <i class="mdi mdi-cube-outline bg-primary  text-white"></i>-->
                        <!--                </div>-->
                        <!--                <div>-->
                        <!--                    <h5 class="font-16">Total Faktur</h5>-->
                        <!--                </div>-->
                        <!--                @if(auth()->user()->level=="marketing")-->
                        <!--                <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>-->
                        <!--                <div class="progress mt-4" style="height: 4px;">-->
                        <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--                </div>-->
                        <!--                @elseif(auth()->user()->level=="customer")-->
                        <!--                <h3 class="mt-4">{{ COUNT(Auth::user()->invoice_customer) }}</h3>-->
                        <!--                <div class="progress mt-4" style="height: 4px;">-->
                        <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--                </div>-->
                        <!--                @elseif(auth()->user()->level=="marketingcustomer")-->
                        <!--                <h3 class="mt-4">{{ COUNT($invoicecustomer) }}</h3>-->
                        <!--                <div class="progress mt-4" style="height: 4px;">-->
                        <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--                </div>-->
                        <!--                @else-->
                        <!--                <h3 class="mt-4">{{ COUNT($invoice) }}</h3>-->
                        <!--                <div class="progress mt-4" style="height: 4px;">-->
                        <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--                </div>-->
                        <!--                @endif-->
                        <!--                {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
    
                        <!--    <div class="col-sm-6 col-xl-4">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-heading p-4">-->
                        <!--                <div class="mini-stat-icon float-right">-->
                        <!--                    <i class="mdi mdi-briefcase-check bg-success text-white"></i>-->
                        <!--                </div>-->
                        <!--                <div>-->
                        <!--                    <h5 class="font-16">Total Transaksi </h5>-->
                        <!--                </div>-->
                        <!--                @if(auth()->user()->level=="marketing")-->
                        <!--                <h3 class="mt-4">{{ number_format(Auth::user()->invoice->sum('total')) }}</h3>-->
                        <!--                <div class="progress mt-4" style="height: 4px;">-->
                        <!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--                </div>-->
                        <!--                @elseif(auth()->user()->level=="customer")-->
                        <!--                <h3 class="mt-4">{{ number_format(Auth::user()->invoice_customer->sum('total')) }}</h3>-->
                        <!--                <div class="progress mt-4" style="height: 4px;">-->
                        <!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--                </div>-->
                        <!--                @elseif(auth()->user()->level=="marketingcustomer")-->
                        <!--                <h3 class="mt-4">{{ number_format($invoicecustomer->sum('total')) }}</h3>-->
                        <!--                <div class="progress mt-4" style="height: 4px;">-->
                        <!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--                </div>-->
                        <!--                @else-->
                        <!--                <h3 class="mt-4">{{ number_format($invoice->sum('total')) }}</h3>-->
                        <!--                <div class="progress mt-4" style="height: 4px;">-->
                        <!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--                </div>-->
                        <!--                @endif-->
                        <!--                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        @endif
    
                        {{-- <div class="row">
                            <div class="col-xl-8">
                                <div class="card m-b-30">
                                    <div class="card-body">
    
                                        <h4 class="mt-0 header-title mb-4">Area Chart</h4>
    
                                        <div id="morris-area-example" class="morris-charts morris-chart-height"></div>
    
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
    
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-4">Donut Chart</h4>
    
                                        <div id="morris-donut-example" class="morris-charts morris-chart-height"></div>
    
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div> --}}
                        <!-- end row -->
    
                        {{-- <div class="row">
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-4">Friends Suggestions</h4>
                                        <div class="friends-suggestions">
                                            <a href="#" class="friends-suggestions-list">
                                                <div class="border-bottom position-relative">
                                                    <div class="float-left mb-0 mr-3">
                                                        <img src="assets/images/user-2.jpg" alt="" class="rounded-circle thumb-md">
                                                    </div>
                                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                                        <i class="mdi mdi-plus"></i>
                                                    </div>
    
                                                    <div class="desc">
                                                        <h5 class="font-14 mb-1 pt-2">Ralph Ramirez</h5>
                                                        <p class="text-muted">3 Friend suggest</p>
                                                    </div>
                                                </div>
                                            </a>
    
                                            <a href="#" class="friends-suggestions-list">
                                                <div class="border-bottom position-relative">
                                                    <div class="float-left mb-0 mr-3">
                                                        <img src="assets/images/user-3.jpg" alt="" class="rounded-circle thumb-md">
                                                    </div>
                                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                                        <i class="mdi mdi-plus"></i>
                                                    </div>
    
                                                    <div class="desc">
                                                        <h5 class="font-14 mb-1 pt-2">Patrick Beeler</h5>
                                                        <p class="text-muted">17 Friend suggest</p>
                                                    </div>
                                                </div>
                                            </a>
    
                                            <a href="#" class="friends-suggestions-list">
                                                <div class="border-bottom position-relative">
                                                    <div class="float-left mb-0 mr-3">
                                                        <img src="assets/images/user-4.jpg" alt="" class="rounded-circle thumb-md">
                                                    </div>
                                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                                        <i class="mdi mdi-plus"></i>
                                                    </div>
    
                                                    <div class="desc">
                                                        <h5 class="font-14 mb-1 pt-2">Victor Zamora</h5>
                                                        <p class="text-muted">12 Friend suggest</p>
                                                    </div>
                                                </div>
                                            </a>
    
                                            <a href="#" class="friends-suggestions-list">
                                                <div class="border-bottom position-relative">
                                                    <div class="float-left mb-0 mr-3">
                                                        <img src="assets/images/user-5.jpg" alt="" class="rounded-circle thumb-md">
                                                    </div>
                                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                                        <i class="mdi mdi-plus"></i>
                                                    </div>
    
                                                    <div class="desc">
                                                        <h5 class="font-14 mb-1 pt-2">Bryan Lacy</h5>
                                                        <p class="text-muted">18 Friend suggest</p>
                                                    </div>
                                                </div>
                                            </a>
    
                                            <a href="#" class="friends-suggestions-list">
                                                <div class="position-relative">
                                                    <div class="float-left mb-0 mr-3">
                                                        <img src="assets/images/user-6.jpg" alt="" class="rounded-circle thumb-md">
                                                    </div>
                                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                                        <i class="mdi mdi-plus"></i>
                                                    </div>
    
                                                    <div class="desc">
                                                        <h5 class="font-14 mb-1 pt-2">James Sorrells</h5>
                                                        <p class="text-muted mb-1">6 Friend suggest</p>
                                                    </div>
                                                </div>
                                            </a>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-4">Sales Analytics</h4>
                                        <div id="morris-line-example" class="morris-chart" style="height: 360px"></div>
    
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
    
                                        <h4 class="mt-0 header-title mb-4">Recent Activity</h4>
                                        <ol class="activity-feed mb-0">
                                            <li class="feed-item">
                                                <div class="feed-item-list">
                                                    <p class="text-muted mb-1">Now</p>
                                                    <p class="font-15 mt-0 mb-0">Jassa magna Jassa, risus posted a new article: <b class="text-primary">Forget UX Rowland</b></p>
                                                </div>
                                            </li>
                                            <li class="feed-item">
                                                <p class="text-muted mb-1">Yesterday</p>
                                                <p class="font-15 mt-0 mb-0">Jassa posted a new article: <b class="text-primary">Designer Alex</b></p>
                                            </li>
                                            <li class="feed-item">
                                                <p class="text-muted mb-1">2:30PM</p>
                                                <p class="font-15 mt-0 mb-0">Jassa, Jassa, Jassa Commented <b class="text-primary"> Developer Moreno</b></p>
                                            </li>
                                            <li class="feed-item pb-1">
                                                <p class="text-muted mb-1">12:48 PM</p>
                                                <p class="font-15 mt-0 mb-2">Jassa, Jassa Commented <b class="text-primary">UX Murphy</b></p>
                                            </li>
    
                                        </ol>
    
                                    </div>
                                </div>
                            </div>
                        </div> --}}
    
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection