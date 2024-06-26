@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td width="30%">Customer</td>
                                        <td>:</td>
                                        <td>{{ $invoice->customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $invoice->customer->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. HP</td>
                                        <td>:</td>
                                        <td>{{ $invoice->customer->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ $invoice->customer->email }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td width="20%">Dari</td>
                                        <td>:</td>
                                        <td>PT Laksa Medika Internusa</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat </td>
                                        <td>:</td>
                                        <td>Pelem Lor No.50 Bantul Yogyakarta</td>
                                    </tr>
                                    <tr>
                                        <td>No. Hp</td>
                                        <td>:</td>
                                        <td> 0274-4436047</td>
                                    </tr>
                                    <tr>
                                        <td>Tenggat</td>
                                        <td>:</td>
                                        <td> {{ date('Y-m-d H:i:s', time() + (60*60*24*30)) }}</td>
                                    </tr>
                                 
                                        
                            
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Product</td>
                                            <td>Jumlah</td>
                                            <td>Harga</td>
                                            <td>Diskon</td>
                                            <td>Subtotal</td>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @foreach ($invoice->detail as $detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ optional(optional($detail->product_detail)->product)->title }}</td>
                                            <td>{{ $detail->qty }}</td>
                                            <td>Rp {{ number_format($detail->price) }}</td>
                                            <td>Rp {{ number_format($detail->diskon) }}</td>
                                            <td>Rp {{ $detail->subtotal }}</td>
                                            <td> <form></form>
                                                <form action="{{ route('invoice.delete_product', ['id' => $detail->id]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->
                                    
                                    <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                    <tfoot>
                                    </tfoot>
                                    <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Formulir di sebelah kiri -->
                            <div class="col-md-6 mb-4 mr-2">
                                <form action="{{ route('invoice.update', ['id' => $invoice->id]) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <br/>
                                        <label for="">Produk</label>
                                        <input type="hidden" name="_method" value="PUT" class="form-control">
                                        <select name="product_detail_id" id="product_ajax" class="form-control">
                                            <option value="">Pilih Produk</option>
                                            @foreach ($details as $detail)
                                                @if($detail->customer_id == $invoice->customer_id)
                                                    <option value="{{ $detail->id }}"> {{ $detail->product->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Menambahka pilihan tanggalan untuk tenggat tempo darri orderan user  -->


                                    <div class="form-group">
                                        <label for="tenggat">Tenggat</label>
                                        <div class="col-md-6">
                                            <select name="tenggat" id="tenggat" class="form-control">
                                                <option value="">Pilih Tenggat</option>
                                                <option value="{{ \Carbon\Carbon::now()->addMonth()->format('Y-m-d') }}">1 Bulan Kemudian</option>
                                                <option value="{{ \Carbon\Carbon::now()->addMonths(2)->format('Y-m-d') }}">2 Bulan Kemudian</option>
                                            </select>
                                        </div>                
                                    </div>
                                    
                                    
                                    {{-- <div class="form-group">
                                        <input type="radio" id="tenggat1" name="tenggat" value="{{ date('Y-m-d', time() + (60*60*24*60)) }}" />
                                        <label for="tenggat1">1 Bulan</label>
                                  
                                        <input type="radio" id="tenggat2" name="tenggat" value="{{ date('Y-m-d', time() + (60*60*24*60)) }}" />
                                        <label for="tenggat2">2 Bulan</label>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <div id="qtyProduct"></div>
                                        <input type="number" id="qty" name="qty" class="form-control" placeholder="Isi Jumlah Produk">                        
                                    </div>
                                    {{-- <div class="form-group">
                                        <input type="hidden" value="{{ date('Y-m-d H:i:s', time() + (60*60*24*31)) }}" name="tenggat" class="form-control" >
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="">Diskon %</label>
                                        <input type="text" name="diskon" class="form-control" placeholder="Misal: 100000" value="0">
                                        <span>Isi dengan angka</span>
                                    </div>
                                    {{-- <div class="form-group">
                                        <input type="hidden" value="{{ date('Y-m-d H:i:s', time()) }}" name="tanggal" class="form-control" >
                                    </div> --}}
                                    <div class="form-group">
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Tambah</button>
                                    </div>
                                </form>
                                <a href="/home" class="btn btn-success btn-block">Selesai</a>
                            </div>
                        
                            <!-- Kartu (Card) di sebelah kanan -->
                            <div class="col-md-4 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Sub Total</h5>
                                        <p class="card-text">Rp {{ number_format($invoice->total) }}</p>
                                        <h5 class="card-title">Tax</h5>
                                        <p class="card-text">0% (Rp {{ number_format($invoice->tax) }})</p>
                                        <h5 class="card-title">Total Harga</h5>
                                        <p class="card-text">Rp {{ number_format($invoice->total_price) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- MENAMPILKAN TOTAL & TAX -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#product_ajax').change(function() {
            let id = $(this).children("option:selected").val()
            console.log(id)
            if (id != 0) {
                $.ajax({
                    url: '/api/product/' + id,
                    type: 'get',
                    dataType: 'html'
                }).done(function(data) {
                    json = JSON.parse(data)
                    console.log(json)
                    qty = json['product']['stock']
                    $('#qtyProduct').html("Stok saat ini : " + qty);
                    $('#qty').attr('max', qty);
                    $('#qty').attr('min', 1);
                })
            }
        
        })
        </script>
@endsection





















{{-- @extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td width="30%">Customer</td>
                                        <td>:</td>
                                        <td>{{ $invoice->customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td>{{ $invoice->customer->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>:</td>
                                        <td>{{ $invoice->customer->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ $invoice->customer->email }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td width="20%">Dari</td>
                                        <td>:</td>
                                        <td>PT Laksa Medika Internusa</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td>Pelem Lor No.50 Bantul Yogyakarta</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>:</td>
                                        <td> 0274-4436047</td>
                                    </tr>
                                    <tr>
                                        <td>Tenggat</td>
                                        <td>:</td>
                                        <td> {{ date('Y-m-d H:i:s', time() + (60*60*24*30)) }}</td>
                                    </tr>
                                 
                                        
                            
                                </table>
                            </div>
                            <div class="col-md-12 mt-3">
                                <form action="{{ route('invoice.update', ['id' => $invoice->id]) }}" method="post">
                                @csrf
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Product</td>
                                            <td>Quantity</td>
                                            <td>Price</td>
                                            <td>Diskon</td>
                                            <td>Subtotal</td>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @foreach ($invoice->detail as $detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $detail->product_detail->product->title }}</td>
                                            <td>{{ $detail->qty }}</td>
                                            <td>Rp {{ number_format($detail->price) }}</td>
                                            <td>Rp {{ number_format($detail->diskon) }}</td>
                                            <td>Rp {{ $detail->subtotal }}</td>
                                            <td> <form></form>
                                                <form action="{{ route('invoice.delete_product', ['id' => $detail->id]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->
                                    
                                    <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="hidden" name="_method" value="PUT" class="form-control">
                                                <select name="product_detail_id" class="form-control">
                                                    <option value="">Select Product</option>
                                                    @foreach ($details as $detail)
                                                    @if($detail->customer_id == $invoice->customer_id)
                                                    <option value="{{ $detail->id }}"> {{ $detail->product->title}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                  
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="qty" class="form-control">
                                            </td>
                                            <td>
                                                <input type="hidden" value="{{ date('Y-m-d H:i:s', time() + (60*60*24*31)) }}" name="tenggat" class="form-control" ></td>
                                            </td>
                                            <td>
                                                <input type="text" name="diskon" class="form-control" placeholder="Miss: 100000">
                                            </td>
                                            <td>
                                                <input type="hidden" value="{{ date('Y-m-d H:i:s', time()) }}" name="tanggal" class="form-control" ></td>
                                            </td>
                                            <td>
                                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" class="form-control" ></td>
                                            </td>
                                            <td colspan="3">
                                                <button class="btn btn-primary btn-sm">ADD</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                </table>
                                </form>
                            </div>
                            
                            <!-- MENAMPILKAN TOTAL & TAX -->
                            <div class="col-md-4 offset-md-8">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($invoice->total) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>:</td>
                                        <td>0% (Rp {{ number_format($invoice->tax) }})</td>
                                    </tr>
                                    <tr>
                                        <td>Total Price</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($invoice->total_price) }}</td>
                                    </tr>
                                </table>
                            </div>
                            <!-- MENAMPILKAN TOTAL & TAX -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}