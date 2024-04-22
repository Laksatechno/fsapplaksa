<!-- resources/views/bahan_mentah/pdf.blade.php -->
<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<head>
 <title>Laporan Gudang GSI</title>
</head>
<body>
 <style type="text/css">
 /* body{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:12px;
            margin:0;
 }
 
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    } */

    body{
        font-family:Arial,Helvetica,sans-serif
    }.container_box{
        position:relative
    }
    .container_box .row h3{
            padding:10px 0;
            line-height:25px;f
            ont-size:20px;
            margin:5px 0 15px;
            text-transform: uppercase;
        }
    .container_box .text-center{
        text-align:center
    }
    .container_box .content_box{
        position:relative
    }
    .container_box .content_box .des_info{
        margin:20px 0;text-align:right}
        .container_box h3{
      font-size:30px;}
    table.customTable{
        width:100%;background-color:#fff;
        border-collapse:collapse;
        border-width:1px
        border-color:#b3b3b3;
        border-style:solid;
        color:#000}
    table.customTable td,table.customTable th{
        border-width:1px;border-color:#b3b3b3;
        border-style:solid;
        padding:5px;
        text-align:left}
    table.customTable thead{
        background-color:#f6f3f8}
    .text-center{
        text-align:center
                }
    .badge-danger,a.badge-danger{
        background:#ff396f!important}
    .badge-success,a.badge-success{
        background:#1dcc70!important}
    .badge-warning,a.badge-warning{
        background:#ffb400!important;
        color:#fff}
    .badge-info,a.badge-info{
        background:#754aed!important}
    .badge{font-size:12px;
        line-height:1em;
        border-radius:100px;
        letter-spacing:0;
        height:22px;
        min-width:22px;
        padding:0 6px;
        display:
        inline-flex;
        align-items:center;
        justify-content:center;
        font-weight:400;
        color:#fff}

 </style>
     <section class="container_box">
        <img align="left" src="{{asset('assets/images/getih.svg')}}" width="150px" height="30px">
        <div class="row">
        <h3 class="text-center">GETIH SURU INDONESIA<br/>LAPORAN BAHAN MENTAH</h3>
        <br/>
        <div class="text-center">
            <div class="content_box">
                <table class="customTable">
                  <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Stok</th>
            </tr>
                </thead>
        <tbody>
            @foreach($bahan_mentahs as $bahan_mentah)
            <tr>
                <td>{{ $bahan_mentah->nama_barang }}</td>
                <td>{{ $bahan_mentah->stok }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</section>

</body>
</html>


