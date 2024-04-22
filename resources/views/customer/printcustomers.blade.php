<!DOCTYPE html>
<html>
<head>
    <title>Customer List</title>
    <style>
        /* Add any custom styling for your PDF here */
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($customer->address, 50) }}</td>
                    <td>
                        @if($customer->products && count($customer->products) > 0)
                            <ul>
                                @foreach ($customer->products as $product)
                                    <li>{{ $product->title }}
                                        @foreach ($product->details as $detail)
                                            <p>{{ $detail->someDetailField }}</p>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            No products available.
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
