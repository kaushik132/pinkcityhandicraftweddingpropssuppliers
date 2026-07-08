@extends('dashboard.layout.main')
@section('content')

<section class="bg-[#faf5ee] py-8">
  <div class="max-w-4xl mx-auto px-4">

    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 text-secondary hover:text-primary font-semibold mb-5" style="font-size:13px;">
      <i class="fa-solid fa-arrow-left text-xs"></i> Back to My Orders
    </a>

    <div class="bg-white rounded-xl shadow-sm p-6 mb-5">
      <div class="flex items-start justify-between flex-wrap gap-3 mb-4">
        <div>
          <h1 class="text-secondary font-bold" style="font-size:20px;">Order {{ $order->order_number }}</h1>
          <p class="text-secondary/50" style="font-size:13px;">Placed on {{ $order->created_at->format('d M Y, h:i A') }}</p>
        </div>
        @php
          $badgeColors = [
            'placed' => 'bg-blue-50 text-blue-600 border-blue-200',
            'processing' => 'bg-yellow-50 text-yellow-600 border-yellow-200',
            'shipped' => 'bg-blue-50 text-blue-600 border-blue-200',
            'delivered' => 'bg-green-50 text-green-600 border-green-200',
            'cancelled' => 'bg-red-50 text-red-500 border-red-200',
          ];
        @endphp
        <span class="{{ $badgeColors[$order->status] ?? 'bg-gray-50 text-gray-500 border-gray-200' }} border px-3 py-1 rounded-full font-semibold" style="font-size:12px;">{{ ucfirst($order->status) }}</span>
      </div>

      <a href="{{ route('orders.invoice', $order->id) }}" class="inline-flex items-center gap-2 border border-primary text-primary hover:bg-primary hover:text-white font-semibold px-4 py-2 rounded-full transition-colors" style="font-size:13px;">
        <i class="fa-solid fa-download text-xs"></i> Download Invoice
      </a>
    </div>

    <!-- Items -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-5">
      <h2 class="text-secondary font-semibold mb-4" style="font-size:15px;">Items ({{ $order->items->sum('quantity') }})</h2>
      <div class="flex flex-col gap-4">
        @foreach($order->items as $item)
        <div class="flex items-center gap-3 pb-4 border-b border-gray-100 last:border-0 last:pb-0">
          <img src="{{ $item->product_image ?? asset('uploads/images/default.jpg') }}" class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
          <div class="flex-1 min-w-0">
            <p class="text-secondary font-semibold truncate" style="font-size:13px;">{{ $item->product_title }}</p>
            <p class="text-secondary/50" style="font-size:12px;">Qty: {{ $item->quantity }} × ₹{{ number_format($item->price) }}</p>
          </div>
          <p class="text-primary font-bold" style="font-size:14px;">₹{{ number_format($item->total) }}</p>
        </div>
        @endforeach
      </div>
    </div>

    <!-- Price Breakdown -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-5">
      <h2 class="text-secondary font-semibold mb-4" style="font-size:15px;">Price Details</h2>
      <div class="flex flex-col gap-2.5 mb-4">
        <div class="flex items-center justify-between">
          <span class="text-secondary/60" style="font-size:13px;">Subtotal</span>
          <span class="text-secondary font-semibold" style="font-size:13px;">₹{{ number_format($order->subtotal) }}</span>
        </div>
        <div class="flex items-center justify-between">
          <span class="text-secondary/60" style="font-size:13px;">Discount</span>
          <span class="text-green-600 font-semibold" style="font-size:13px;">−₹{{ number_format($order->discount) }}</span>
        </div>
        <div class="flex items-center justify-between">
          <span class="text-secondary/60" style="font-size:13px;">Shipping</span>
          <span class="{{ $order->shipping_charge > 0 ? 'text-secondary' : 'text-green-600' }} font-semibold" style="font-size:13px;">{{ $order->shipping_charge > 0 ? '₹'.$order->shipping_charge : 'FREE' }}</span>
        </div>
      </div>
      <hr class="border-gray-200 mb-4">
      <div class="flex items-center justify-between">
        <span class="text-secondary font-bold" style="font-size:15px;">Total Amount</span>
        <span class="text-primary font-bold" style="font-size:18px;">₹{{ number_format($order->total) }}</span>
      </div>
      <p class="text-secondary/50 mt-2" style="font-size:12px;">Payment Method: <span class="font-semibold text-secondary">{{ strtoupper($order->payment_method) }}</span> — {{ ucfirst($order->payment_status) }}</p>
    </div>

    <!-- Delivery Address -->
    <div class="bg-white rounded-xl shadow-sm p-6">
      <h2 class="text-secondary font-semibold mb-4" style="font-size:15px;">Delivery Address</h2>
      <p class="text-secondary font-semibold mb-1" style="font-size:13px;">{{ $order->full_name }}</p>
      <p class="text-secondary/60" style="font-size:13px; line-height:1.6;">
        {{ $order->address }}{{ $order->landmark ? ', '.$order->landmark : '' }}<br>
        {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}<br>
        Phone: {{ $order->mobile }}
      </p>
    </div>

  </div>
</section>

@endsection
