@extends('dashboard.layout.main')
@section('content')
<section class="bg-[#faf5ee] min-h-screen flex items-center justify-center">
  <div class="text-center max-w-md mx-auto">

    <div class="w-24 h-24 rounded-full bg-green-500 flex items-center justify-center mx-auto mb-6 shadow-lg">
      <i class="fa-solid fa-check text-white text-4xl"></i>
    </div>

    <h2 class="font-playfair text-secondary mb-3" style="font-size:32px; font-weight:500;">
      Order Placed! <i class="fa-solid fa-gifts text-gold"></i>
    </h2>

    <p class="text-secondary/60 leading-relaxed mb-2" style="font-size:15px;">
      Thank you {{ $order->full_name }}! Your handcrafted treasures are being prepared with love by our artisans.
    </p>

    <p class="text-secondary/40 mb-8" style="font-size:12px;">
      Order Number: <span class="font-semibold text-secondary">{{ $order->order_number }}</span> &middot;
      Total: <span class="font-semibold text-secondary">₹{{ number_format($order->total) }}</span>
    </p>

    <div class="flex items-center justify-center gap-4 flex-wrap">
      {{-- <a href="#" class="bg-primary hover:bg-primary/90 text-white font-semibold px-8 py-3 rounded-full transition-colors" style="font-size:14px;">
        Tracking Order
      </a> --}}
      <a href="{{ url('/products') }}" class="border border-primary text-primary hover:bg-primary hover:text-white font-semibold px-8 py-3 rounded-full transition-colors" style="font-size:14px;">
        Continue Shopping
      </a>
    </div>

  </div>
</section>
@endsection
