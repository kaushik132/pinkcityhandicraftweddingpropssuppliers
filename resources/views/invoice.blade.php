<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; color: #1C1208; }
        .header { display: flex; justify-content: space-between; margin-bottom: 30px; border-bottom: 2px solid #8B2635; padding-bottom: 15px; }
        .logo { font-size: 22px; font-weight: bold; color: #8B2635; }
        .invoice-title { font-size: 18px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #8B2635; color: white; padding: 8px; text-align: left; font-size: 12px; }
        td { padding: 8px; border-bottom: 1px solid #eee; font-size: 12px; }
        .totals { margin-top: 20px; width: 300px; margin-left: auto; }
        .totals div { display: flex; justify-content: space-between; padding: 4px 0; }
        .total-row { font-weight: bold; font-size: 15px; border-top: 2px solid #8B2635; padding-top: 8px; margin-top: 8px; }
        .address-box { margin-top: 25px; padding: 12px; background: #faf5ee; border-radius: 6px; }
    </style>
</head>
<body>

    <div class="header">
        <div>
            <div class="logo">Pink City</div>
            <p>Handicraft &amp; Wedding Props</p>
            <p>Johari Bazaar, Jaipur, Rajasthan — 302003</p>
        </div>
        <div style="text-align: right;">
            <div class="invoice-title">INVOICE</div>
            <p>Order: {{ $order->order_number }}</p>
            <p>Date: {{ $order->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product_title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price) }}</td>
                <td>{{ number_format($item->total) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <div><span>Subtotal</span><span> {{ number_format($order->subtotal) }}</span></div>
        <div><span>Discount</span><span> {{ number_format($order->discount) }}</span></div>
        <div><span>Shipping</span><span> {{ $order->shipping_charge > 0 ? '₹'.$order->shipping_charge : 'FREE' }}</span></div>
        <div class="total-row"><span>Total</span><span> {{ number_format($order->total) }}</span></div>
    </div>

    <div class="address-box">
        <strong>Delivery Address</strong><br>
        {{ $order->full_name }}<br>
        {{ $order->address }}{{ $order->landmark ? ', '.$order->landmark : '' }}<br>
        {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}<br>
        Phone: {{ $order->mobile }}
    </div>

    <p style="margin-top: 30px; text-align: center; color: #999; font-size: 11px;">Thank you for shopping with Pink City — Authentic Handicrafts from Jaipur, Rajasthan.</p>

</body>
</html>
