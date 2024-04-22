<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penawaran</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 12px;
            margin: 0;
        }
        .container {
            margin: 0 auto;
            padding: 20px; /* Added padding for better spacing */
            width: 700px;
            background-color: #fff;
        }
        table {
            border: 1px solid #333;
            border-collapse: collapse;
            margin: 0 auto;
            width: 100%; /* Make the table width 100% */
        }
        td, th {
            padding: 10px; /* Increased padding for better readability */
            border: 1px solid #333;
            text-align: center;
        }
        th {
            background-color: #f2f2f2; /* Light gray background for table headers */
        }
        h4, p {
            margin: 0;
        }
        
        .page_break { page-break-before: always; }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 50px;
            background-color: #fff;
        }

        footer {
            position: fixed; 
            bottom: 0; 
            left: 0;
            right: 0;
            height: 50px; 
            text-align: center;
            color: #974578;
            background-color: #fff;
        }

        .logo {
            float: left;
            margin-top: 10px; /* Adjusted margin for better alignment */
        }

        .content {
            text-align: center;
            margin-top: 100px;
        }

        .address {
            color: #974578;
            text-align: center;
            margin-top: 20px;
        }

        .date {
            font-size: 14px;
            margin: 10px;
        }

        .customer-info {
            font-size: 12px;
            margin: 10px;
        }

        .greetings {
            font-size: 12px;
            margin: 10px;
            line-height: 20px;
        }

        .product-table {
            margin: 10px;
        }

        .footer-info {
            font-size: 12px;
            margin: 10px;
        }

        .signature {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <header>
        <img class="logo" src="{{ URL::asset('assets/images/logo_ptlmi2.png')}}" width="250px" height="60px">
    </header>

    <div class="container">
        <div class="content">
            <img src="{{ URL::asset('assets/images/icon.png')}}" width="400px" height="400px">
            <h1 style="color: #974578; text-transform: uppercase">{{$penawarans->perihal}}</h1>
            <h3>PT LAKSA MEDIKA INTERNUSA</h3>
        </div>

        <div class="address">
            <h4>PT LAKSA MEDIKA INTERNUSA</h4>
            <h4>Pelem Lor No.50 Baturetno, Banguntapan, Bantul, Yogyakarta</h4>
            <h4>Telepon : 0274-4436047 Email : laksamedikainternusa@gmail.com</h4>
        </div>
    </div>

    <div class="page_break">
        <header>
            <img class="logo" src="{{ URL::asset('assets/images/logo_ptlmi2.png')}}" width="250px" height="60px">
        </header>

        <div class="container">
            <div class="date">
                No. 0{{$penawarans->id}}/LMI-SLS/<?php
                    $array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                    $bulan = $array_bulan[date('n')];
                
                    echo  "$bulan";
                ?>/{{$penawarans->created_at->format('Y') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yogyakarta, {{$penawarans->created_at->format('D, d M Y')}}
            </div>

            <div class="customer-info">
                <p>Kepada Yth.</p>
                <b>{{$penawarans->customer}}</b>
                <p>{{$penawarans->address}}</p>
                <b>Perihal : {{$penawarans->perihal}}</b>
            </div>

            <div class="greetings">
                <p>Dengan Hormat,</p>
                <p>Bersama ini kami <b>PT. LAKSA MEDIKA INTERNUSA,</b> bermaksud mengajukan {{$penawarans->perihal}} di <b>{{$penawarans->customer}}</b>. Daftar penawaran terlampir.</p>
                <p>Dengan kondisi penawaran sebagai berikut :</p>
                @forelse($kondisis as $e=>$row)
                    <p>{{ $e+1 }}. {{ $row->kondisi }}</p>
                @empty
                    <p>Empty Data</p>
                @endforelse
            </div>

            <div class="product-table">
                <h3>Products Pricelist</h3>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                    @foreach ($hargapenawarans as $e=>$hargapenawaran)
                        <tr>
                            <td>{{ $e+1 }}</td>
                            <td>{{ $hargapenawaran->product->title }}</td>
                            <td>{{ $hargapenawaran->qty }}</td>
                            <td>Rp {{ number_format($hargapenawaran->price) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <p>Demikian penawaran harga kami, silakan menghubungi kami bila dirasa ada hal yang kurang jelas ke No HP : {{$penawarans->no_hp}} atau ke No. Telephone (0274) 4436047. Atas perhatian dan kerja samanya kami ucapkan terima kasih.</p>

            <div class="signature">
                <img src="{{ URL::asset('assets/images/ttd_qrcode.png')}}" width="100px" height="50px"><br>
                <b>Yandi Okta Wirawan</b><br>
                <b>PT. Laksa Medika Internusa</b>
            </div>
        </div>

        <footer>
            <b>PELEM LOR  No. 50 BATURETNO, BANGUNTAPAN, BANTUL, DAERAH ISTIMEWA YOGYAKARTA</b>
            <b>TELP / FAX . 0274 - 4436047 EMAIL : Laksamedikainternusa@gmail.com</b>
        </footer>
    </div>
</body>
</html>
