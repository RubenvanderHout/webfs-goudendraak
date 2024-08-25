<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
         @page {
            size: 8.5cm 10cm; /* Custom page size */
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            width: 8.5cm;
            height: 10cm;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-table {
            width: 100%;
            border-collapse: collapse;
        }
        .receipt-table th, .receipt-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .receipt-table th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        img {
            width: 100px; /* Adjust as needed */
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="receipt-header">
        <img src="{{ public_path('img/dragon-small.png') }}" alt="De gouden draak">
        <p>Tafel: {{ $table->id }}</p>
        <p>Datum: {{ \Carbon\Carbon::now()->toFormattedDateString() }}</p>
    </div>

    <table class="receipt-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Dish</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($orders as $order)
                @foreach($order->Order_Dish as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->dish->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->dish->price, 2) }}</td>
                        <td>${{ number_format($item->quantity * $item->dish->price, 2) }}</td>
                    </tr>
                    @php
                        $grandTotal += $item->quantity * $item->dish->price;
                    @endphp
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="total">Grand Total:</td>
                <td>${{ number_format($grandTotal, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>