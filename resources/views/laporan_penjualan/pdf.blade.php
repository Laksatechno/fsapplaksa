<!-- resources/views/laporan_penjualan/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <style>
        /* Add your custom styles for the PDF here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h3>LAPORAN ORDER CUSTOMER : {{ $customer->name }}</h3>
    
    @if (isset($filteredData) && count($filteredData) > 0)
        <!-- Display filtered data -->
        @foreach ($filteredData as $key => $items)
            <div>
                <h4>NO INVOICE : #{{ $items[0]['no_faktur'] }}</h4>
                <p>Tanggal : {{ $items[0]['tanggal'] }}</p>
                <p>Total Harga : {{ $items[0]['total'] }}</p>

                <table>
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item['nama_produk'] }}</td>
                                <td>{{ $item['qty'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @elseif (count($data) > 0)
        <!-- Display original data -->
        @foreach ($data as $key => $items)
            <div>
                <h4>NO INVOICE : #{{ $items[0]['no_faktur'] }}</h4>
                <p>Tanggal : {{ $items[0]['tanggal'] }}</p>
                <p>Total Harga : {{ $items[0]['total'] }}</p>

                <table>
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item['nama_produk'] }}</td>
                                <td>{{ $item['qty'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @else
        <p>Data Kosong</p>
    @endif

</body>
</html>
