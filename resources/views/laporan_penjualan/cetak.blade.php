<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:12px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:0px;
            padding:0px;
            width:700px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:15px;
            margin-bottom:5px;
            text-align:center;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:700px;
        }
        td, tr, th{
            padding:5px;
            border:1px solid #333;
            width:100px;
        }
        th{
            background-color: #fff;
        }
        h4, p{
            margin:0px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <table>
            <caption style="text-align: left;">
                <div style="float: left;">
                    <img align="left" src="{{ asset('assets/images/ptlmi.jpg') }}" alt="" style="width: 150px; height: 40px;"><br>
                </div>
                <div style="text-align: center;">
                    <b>LAPORAN PENJUALAN GUNGGUNG</b>
                    <p style="font-size: 10;">{{ Carbon\Carbon::parse($dari)->isoFormat('D MMMM Y') }} - {{ Carbon\Carbon::parse($sampai)->isoFormat('D MMMM Y')}}</p>
                </div>
            </caption>
            
            <thead>
                <tr>
                    <th colspan="1">No Invoice</strong></th>
                    <th colspan="2">Nama Customer</th>
                    <th colspan="2">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $inv)
                <tr>
                    <td colspan="1">{{ $inv->no_faktur_2023 }}</td>
                    <td colspan="2">{{ $inv->customer->name }}</td>
                    <td colspan="2" align="left">Rp. {{ number_format($inv->total) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
             <tr>
                    <td colspan="1"></td>
                    <td colspan="2"><b>Total</b></td>
                    <td colspan="2" align="left"><b>Rp. {{ number_format($total_pemasukan) }}</b></td>
             </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>















