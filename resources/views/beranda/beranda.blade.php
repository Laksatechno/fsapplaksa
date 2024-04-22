@extends('layouts.master')
@section('content')
@include('layouts.topNav')
<div class="section" id="user-section">
    <div id="user-detail">
        <div class="avatar">
            {{-- <img src="{{ URL::asset('asset/img/sample/avatar/avatar1.jpg')}}" alt="avatar" class="imaged w64 rounded"> --}}
            @if(empty(Auth::user()->foto))
                <img src="{{ URL::asset('asset/img/avatar.png') }}" alt="avatar" class="imaged w32 rounded">
            @else
                <img src="{{ URL::asset('images/'.Auth::user()->foto) }}" alt="avatar" class="imaged w32 rounded">
            @endif

        </div>
        <div id="user-info">
            <h4 id="user-name" >{{ Auth::user()->name }}</h4>
            <span id="user-role">{{ Auth::user()->level }}</span>
        </div>
    </div>
</div>

<div class="card">
    <div class="carousel-container">
        <div class="carousel">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner ">
                        @foreach($sliders as $slider)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <div class="slider-image text-center">
                                    <img src="{{ asset('images/slider/' . $slider->image) }}" alt="Slider Image" style="max-width: autopx;">
                                </div>
                            </div>
                            
                        @endforeach
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" id="menu-section">
    <div class="card">
        <div class="card-body text-center">
            @if(Auth::check())
            @if(auth()->user()->level=="superadmin")

            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">                           
                        <a href="{{ url('menuorder') }}" class="orange" >
                            <ion-icon name="cart-sharp" size="large"></ion-icon>
                    </div>
                    <div class="menu-name">
                        
                        <span class="text-center" >Order</span>
                    </div></a>
                </div>
                {{-- <div class="item-menu ">
                    <a href="{{ url('menuorder') }}" class="black">
                    <button type="button" class="btn btn-icon btn-primary mr-1 mb-1 text-center">
                        <ion-icon name="document-text-outline"></ion-icon>
                    </button>
                
                    <div class="menu-name">
                        <span class="text-center">Order</span>
                    </div></a>
                </div> --}}
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('product') }}" class="primary">
                            <ion-icon name="cube" size="large"></ion-icon>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Produk</span>
                    </div></a>
                </div>
                
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('invoiceppn') }}" class="purple" >
                            <ion-icon name="document-text" size="large"></ion-icon>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Riwayat</span>
                    </div></a>
                </div>

                

                {{-- <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('service-kendaraan') }}" class="danger" >
                            <i class="mdi mdi-wrench" style="font-size: 32px;"></i>
                            
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Service</span><br>
                        <span class="text-center">Kendaraan</span>
                    </div> </a>
                </div> --}}

                {{-- <div class="item">
                    <div class="icon">
                        <a href="" class="orange" style="font-size: 40px;">
                            <ion-icon name="location"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Lokasi
                    </div>
                </div> --}}


                @elseif(auth()->user()->level=="admin")
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('invoiceppn') }}" class="warning" >
                            <ion-icon name="file-tray-stacked-outline " size="large"></ion-icon>
                        
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Stock</span>
                    </div></a>
                </div>
                
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('invoiceppn') }}" class="warning" style="font-size: 40px;">
                            <ion-icon name="document-text"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Histori</span>
                    </div>
                </div>
                
                @elseif(auth()->user()->level=="marketing")
                <div class="list-menu">
                    
                        <div class="item-menu text-center">
                            <div class="menu-icon">                           
                                <a href="{{ url('menuorder') }}" class="orange" >
                                    <ion-icon name="cart-sharp" size="large"></ion-icon>
                            </div>
                            <div class="menu-name">
                                
                                <span class="text-center" >Order</span>
                            </div></a>
                        </div>
                    
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="{{ url('menumyinvoice') }}" class="purple" >
                                <ion-icon name="document-text" size="large"></ion-icon>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">MyInvoice</span>
                        </div></a>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">                           
                            <a href="{{ url('/brosur-user') }}" class="purple" style="font-size: 40px;">
                                <ion-icon name="reader-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center" >Brosur</span>
                        </div>
                    </div>

                @elseif(auth()->user()->level=="gudang")
                <div class="list-menu ">
                    <div class="item-menu text-center">
                        <div class="menu-icon">                           
                            <a href="{{ url('/brosur-user') }}" class="purple" style="font-size: 40px;">
                                <ion-icon name="reader-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center" >Brosur</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">                           
                            <a href="{{ url('/daftar-barang') }}" class="purple" style="font-size: 40px;">
                                <ion-icon name="hammer-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center" >Barang</span>
                        </div>
                    </div>

                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="{{ url('bahanmentah') }}" class="danger" >
                                <i class="mdi mdi-cube-send" style="font-size: 32px;"></i>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Bahan</span><br>
                            <span class="text-center">Baku</span>
                        </div> </a>
                    </div>
                    

                @elseif(auth()->user()->level=="customer")
                <div class="list-menu">
                    <div class="item-menu text-center">
                        <div class="menu-icon"> 
                            <form action="{{ route('invoicecustomer.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="0" name="total" class="form-control" >
                                <!--<select class="form-control" name="ppn" aria-label="Default select example">-->
                                <!--    <option selected>Pilih NON PMI / PMI</option>-->
                                <!--    <option value="11">NON PMI</option>-->
                                <!--    <option value="0">PMI</option>-->
                                <!--  </select><br>-->
                                
                                  
                                {{-- @if (!$invoicecust->isEmpty())  
                                <div class="alert alert-danger" role="alert">
                                    Ada Faktur Belum Selesai!
                                  </div>                             
                                @else
                                    <button class="btn btn-primary btn-lg">Pesan</button>
                                @endif --}}
                                                 
                            {{-- <a href="{{url('customer-order')}}" class="purple" style="font-size: 40px;"> --}}
                                <a class="purple" style="font-size: 40px;">
                                
                                
                            </a>
                        </div>
                        <div class="menu-name">
                            <button class=" purple " style="
                            
                            margin-top: 0px;
                            padding-right: 42px;
                            padding-left: 0px;
                            border-top-width: 0px;
                            border-left-width: 0px;
                            border-right-width: 0px;
                            border-bottom-width: 0px;
                            height: 0px;
                            width: 0px;
                            padding-top: 0px;
                            padding-bottom: 0px;
                            
                            " 
                         ><ion-icon name="cart-sharp" style="font-size: 40px"></ion-icon></button>
                        </div></form> <span class="text-center">Order</span>    
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="{{ url('customer-order') }}" class="purple" style="font-size: 40px;">
                                <ion-icon name="document-text"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Histori</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">                           
                            <a href="{{ url('/sponsor-request/create') }}" class="purple" style="font-size: 40px;">
                                <ion-icon name="archive-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center" >Sponsor</span>
                        </div>
                    </div>
                    
                    <div class="item-menu text-center">
                        <div class="menu-icon">                           
                            <a href="{{ url('/brosur-user') }}" class="purple" style="font-size: 40px;">
                                <ion-icon name="reader-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center" >Brosur</span>
                        </div>
                    </div>
                @endif
                @endif
                
            </div>
        </div>
    
        <div class="card-body text-center">
            @if(Auth::check())
            @if(auth()->user()->level=="superadmin")
            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('menuinvoice') }}" class="purple">
                            <ion-icon name="podium-outline" size="large"></ion-icon>
                        
                    </div>
                    <div class="menu-name">
                        <span class="text-center">All Invoice</span>
                    </div></a>
                </div>

                    <div class="item-menu text-center">
                        <div class="menu-icon">                           
                            <a href="{{ url('/sponsor-request/create') }}" class="purple" >
                                <ion-icon name="archive-outline" size="large"></ion-icon>
                            
                        </div>
                        <div class="menu-name">
                            <span class="text-center" >Sponsor</span>
                        </div></a>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">                           
                            <a href="{{ url('/brochures') }}" class="purple">
                                <ion-icon name="reader-outline" size="large"></ion-icon>
                            
                        </div>
                        <div class="menu-name">
                            <span class="text-center" >Brosur</span>
                        </div></a>
                    </div>

                    
                {{-- <div class="item-menu text-center">
                    <div class="menu-icon">                           
                        <a href="{{ url('/add/nondanppn') }}" class="purple" style="font-size: 40px;">
                            <ion-icon name="list"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center" >Penawaran</span>
                    </div>
                </div>

                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('product') }}" class="purple" style="font-size: 40px;">
                            <ion-icon name="calendar-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Daily Report</span>
                    </div>
                </div>
                
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('invoiceppn') }}" class="purple" style="font-size: 40px;">
                            <ion-icon name="document-text"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Laporan</span>
                    </div>
                </div> --}}



                {{-- @elseif(auth()->user()->level=="admin")
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('invoiceppn') }}" class="warning" style="font-size: 40px;">
                            <ion-icon name="file-tray-stacked-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Stock</span>
                    </div>
                </div>
                
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="{{ url('invoiceppn') }}" class="warning" style="font-size: 40px;">
                            <ion-icon name="document-text"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Histori</span>
                    </div>
                </div> --}}
                
                @elseif(auth()->user()->level=="marketing")
                
                <div class="list-menu">
                    
                    <div class="item-menu text-center">
                        <div class="menu-icon">                           
                            <a href="{{ url('/penawaran') }}" class="purple">
                                <ion-icon name="trending-down-outline" size="large"></ion-icon>
                        </div>
                        <div class="menu-name">
                            <span class="text-center" >Penawaran</span>
                        </div></a>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                                <a href="{{ url('/laporan-barang') }}" class="purple" >
                                    <ion-icon name="cash-outline" size="large"></ion-icon>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Laporan</span><br>
                                <span class="text-center">Barang</span>
                            </div></a>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">                           
                                <a href="{{ url('/sponsor-request/create') }}" class="purple">
                                    <ion-icon name="archive-outline" size="large"></ion-icon>
                                
                            </div>
                            <div class="menu-name">
                                <span class="text-center" >Sponsor</span></br>
                            </div></a>
                        </div>
                        
                @endif
                @endif
                
            </div>
        </div>

        <div class="card-body text-center">
            @if(Auth::check())
            @if(auth()->user()->level=="superadmin")
            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">                           
                        <a href="{{ url('/penawaran') }}" class="purple">
                            <ion-icon name="trending-down-outline" size="large"></ion-icon>
                    </div>
                    <div class="menu-name">
                        <span class="text-center" >Penawaran</span>
                    </div></a>
                </div>


                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="{{ url('pengiriman') }}" class="purple">
                                <i class="mdi mdi-truck-delivery" style="font-size: 32px;"></i>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Pengiriman</span>
                        </div></a>
                    </div>


                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="{{ url('customer') }}" class="purple">
                                <i class="mdi mdi-account-convert" style="font-size: 32px;"></i>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Customer</span>
                        </div></a>
                    </div>
                    <div class="list-menu">
                        <div class="item-menu text-center">
                            <div class="menu-icon">                           
                                <a href="{{ url('/daftar-barang') }}" class="purple">
                                    <i class="mdi mdi-cellphone-cog" style="font-size: 32px;"></i>
                            </div>
                            <div class="menu-name">
                                <span class="text-center" >HB</span>
                            </div></a>
                @endif
                @endif
                
            </div>
        </div>
    </div>

    
    @if (auth()->user()->level=="superadmin")
    
    <div class="row" >

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-sale bg-danger  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Faktur NON PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>
                    @else
                    <h3 class="mt-4">{{ COUNT($invoice) }}</h3>
                    @endif
                    {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-shopping bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Sales NON PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ number_format(Auth::user()->invoice->sum('total')) }}</h3>
                    @else
                    <h3 class="mt-4">{{ number_format($invoice->sum('total')) }}</h3>
                    @endif
                    {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-store bg-primary text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Outlet</h5>
                    </div>
                    <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
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

    <div class="row" style="margin-bottom: 60px;">

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-sale bg-danger  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Faktur PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ COUNT(Auth::user()->invoiceppn) }}</h3>
                    @else
                    <h3 class="mt-4">{{ COUNT($invoiceppn) }}</h3>
                    @endif
                    {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-shopping bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Sales PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ number_format(Auth::user()->invoiceppn->sum('total')) }}</h3>

                    @else
                    <h3 class="mt-4">{{ number_format($invoiceppn->sum('total')) }}</h3>

                    @endif
                    {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-store bg-primary text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Outlet</h5>
                    </div>
                    <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>

                    {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                </div>
            </div>
        </div>
    </div>

    @elseif (auth()->user()->level=="admin")

    <div class="row" style="margin-bottom: 60px;">

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-sale bg-danger  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Faktur NON PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>
                    @else
                    <h3 class="mt-4">{{ COUNT($invoice) }}</h3>
                    @endif
                    {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-shopping bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Sales NON PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ number_format(Auth::user()->invoice->sum('total')) }}</h3>
                    @else
                    <h3 class="mt-4">{{ number_format($invoice->sum('total')) }}</h3>
                    @endif
                    
                    {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-store bg-primary text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Outlet</h5>
                    </div>
                    <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
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

    <div class="row" style="margin-bottom: 60px;">

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-sale bg-danger  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Faktur PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ COUNT(Auth::user()->invoiceppn) }}</h3>

                    @else
                    <h3 class="mt-4">{{ COUNT($invoiceppn) }}</h3>

                    @endif
                    {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-shopping bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Sales PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ number_format(Auth::user()->invoiceppn->sum('total')) }}</h3>

                    @else
                    <h3 class="mt-4">{{ number_format($invoiceppn->sum('total')) }}</h3>

                    @endif
                    {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-store bg-primary text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Outlet</h5>
                    </div>
                    <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>

                    {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                </div>
            </div>
        </div>
    </div>



    @elseif (auth()->user()->level=="marketing")

    <div class="row" style="margin-bottom: 60px;">

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-sale bg-danger  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Faktur NON PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>
                    @else
                    <h3 class="mt-4">{{ COUNT($invoice) }}</h3>

                    @endif
                    {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-shopping bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Sales NON PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ number_format(Auth::user()->invoice->sum('total')) }}</h3>

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
                        <i class="mdi mdi-store bg-primary text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Outlet</h5>
                    </div>
                    <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>

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

    <div class="row" style="margin-bottom: 60px;">

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-sale bg-danger  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Faktur PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ COUNT(Auth::user()->invoiceppn) }}</h3>

                    @else
                    <h3 class="mt-4">{{ COUNT($invoiceppn) }}</h3>
                    @endif
                    {{-- COUNT(Auth::user()->invoice) <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-shopping bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Sales PPN</h5>
                    </div>
                    @if(auth()->user()->level=="marketing")
                    <h3 class="mt-4">{{ number_format(Auth::user()->invoiceppn->sum('total')) }}</h3>
                    @else
                    <h3 class="mt-4">{{ number_format($invoiceppn->sum('total')) }}</h3>
                    @endif
                    {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-store bg-primary text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Outlet</h5>
                    </div>
                    <h3 class="mt-4">{{ $customers->COUNT('id') }}</h3>
                    {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
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
        <!--                    <i class="mdi mdi-sale bg-danger  text-white"></i>-->
        <!--                </div>-->
        <!--                <div>-->
        <!--                    <h5 class="font-16">Total Faktur</h5>-->
        <!--                </div>-->
        <!--                @if(auth()->user()->level=="marketing")-->
        <!--                <h3 class="mt-4">{{ COUNT(Auth::user()->invoice) }}</h3>-->
        <!--                <div class="progress mt-4" style="height: 4px;">-->
        <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
        <!--                </div>-->
        <!--                @elseif(auth()->user()->level=="customer")-->
        <!--                <h3 class="mt-4">{{ COUNT(Auth::user()->invoice_customer) }}</h3>-->
        <!--                <div class="progress mt-4" style="height: 4px;">-->
        <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
        <!--                </div>-->
        <!--                @elseif(auth()->user()->level=="marketingcustomer")-->
        <!--                <h3 class="mt-4">{{ COUNT($invoicecustomer) }}</h3>-->
        <!--                <div class="progress mt-4" style="height: 4px;">-->
        <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
        <!--                </div>-->
        <!--                @else-->
        <!--                <h3 class="mt-4">{{ COUNT($invoice) }}</h3>-->
        <!--                <div class="progress mt-4" style="height: 4px;">-->
        <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
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
        <!--                    <i class="mdi mdi-shopping bg-success text-white"></i>-->
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
