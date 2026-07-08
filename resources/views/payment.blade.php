@extends('dashboard.layout.main')
@section('content')

<section class="bg-[#faf5ee] py-8">
  <div class="max-w-7xl mx-auto px-4 md:px-10">

    @if($amountLeftForFreeShipping > 0)
    <div class="flex items-center gap-3 bg-blue-50 border border-blue-100 rounded-xl px-5 py-3 mb-6">
      <i class="fa-solid fa-truck-fast text-blue-500"></i>
      <div>
        <p class="text-secondary font-semibold" style="font-size:13px;">You're ₹{{ number_format($amountLeftForFreeShipping) }} away from FREE shipping!</p>
        <p class="text-secondary/50" style="font-size:11px;">Free shipping on orders above ₹999</p>
      </div>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

      <div class="lg:col-span-2">
        <h1 class="text-secondary font-bold mb-1" style="font-size:20px;">Payment Options</h1>
        <p class="text-secondary/50 mb-5" style="font-size:13px;">Choose a payment method to complete your order</p>

        <form action="{{ route('payment.place-order') }}" method="POST" id="payment-form">
          @csrf

          <div class="bg-white rounded-xl shadow-sm p-5 mb-5">
            <h2 class="text-secondary font-semibold mb-3" style="font-size:14px;">Apply Coupon</h2>
            <div class="flex items-center gap-3">
              <input type="text" name="coupon_code" placeholder="Enter Coupon Code" class="flex-1 border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
              <button type="button" class="bg-primary hover:bg-primary/90 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors flex-shrink-0" style="font-size:13px;">Apply</button>
            </div>
          </div>

          <div class="bg-white rounded-xl shadow-sm overflow-hidden">

            @foreach([
                'upi' => ['UPI', 'Pay using any UPI app'],
                'card' => ['Credit / Debit Card', 'Visa, Mastercard, Rupay & more'],
                'netbanking' => ['Net Banking', 'Pay using your net banking'],
                'wallets' => ['Wallets', 'Pay using mobile wallets'],
                'cod' => ['Cash on Delivery (COD)', 'Pay when your order is delivered'],
            ] as $value => $label)
            <label class="relative flex items-center justify-between gap-3 px-5 py-4 {{ !$loop->last ? 'border-b border-gray-100' : '' }} cursor-pointer hover:bg-[#faf5ee]/40 transition-colors">
              <input type="radio" name="payment_method" value="{{ $value }}" {{ $value == 'cod' ? 'checked' : '' }} class="peer sr-only">
              <span class="absolute inset-0 border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary/5 rounded-none pointer-events-none"></span>
              <div class="relative flex items-center gap-3">
                <span class="w-4 h-4 rounded-full border-2 border-gray-300 peer-checked:border-primary flex items-center justify-center flex-shrink-0">
                  <span class="w-2 h-2 rounded-full bg-primary opacity-0 peer-checked:opacity-100"></span>
                </span>
                <div>
                  <p class="text-secondary font-semibold" style="font-size:13px;">{{ $label[0] }}</p>
                  <p class="text-secondary/50" style="font-size:11px;">{{ $label[1] }}</p>
                </div>
              </div>
            </label>
            @endforeach

          </div>

          <div class="flex items-center gap-4 mt-6 flex-wrap">
            <a href="{{ route('checkout') }}" class="flex items-center gap-2 border border-gray-200 text-secondary font-semibold px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors" style="font-size:13px;">
              <i class="fa-solid fa-arrow-left text-xs"></i> BACK TO ADDRESS
            </a>
            <button type="submit" class="flex-1 bg-primary hover:bg-primary/90 text-white font-semibold px-6 py-3 rounded-lg transition-colors flex items-center justify-center gap-2" style="font-size:13px; letter-spacing:0.5px;">
              <i class="fa-solid fa-lock text-xs"></i> PAY SECURELY
            </button>
          </div>
        </form>
      </div>

      <!-- ORDER SUMMARY -->
      <div class="bg-white rounded-xl shadow-sm p-5">
        <h2 class="text-secondary font-bold mb-4" style="font-size:15px;">Order Summary</h2>
        <p class="text-secondary/50 mb-4" style="font-size:12px;">{{ $cartItems->sum('quantity') }} Item{{ $cartItems->sum('quantity') > 1 ? 's' : '' }} in Cart</p>

        @foreach($cartItems as $item)
        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-100">
          <img src="{{ $item->product->thumbnail }}" alt="{{ $item->product->title }}" class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
          <div class="min-w-0">
            <p class="text-secondary font-semibold truncate" style="font-size:13px;">{{ $item->product->title }}</p>
            <p class="text-secondary/50" style="font-size:12px;">Qty: {{ $item->quantity }}</p>
            <p class="text-primary font-bold" style="font-size:13px;">₹{{ number_format($item->product->sale_price * $item->quantity) }}</p>
          </div>
        </div>
        @endforeach

        <div class="flex flex-col gap-2.5 mb-4">
          <div class="flex items-center justify-between">
            <span class="text-secondary/60" style="font-size:13px;">Subtotal</span>
            <span class="text-secondary font-semibold" style="font-size:13px;">₹{{ number_format($total) }}</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-secondary/60" style="font-size:13px;">Discount</span>
            <span class="text-green-600 font-semibold" style="font-size:13px;">−₹{{ number_format($discount) }}</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-secondary/60" style="font-size:13px;">Shipping Charges</span>
            <span class="{{ $shippingCharge > 0 ? 'text-secondary' : 'text-green-600' }} font-semibold" style="font-size:13px;">{{ $shippingCharge > 0 ? '₹'.$shippingCharge : 'FREE' }}</span>
          </div>
        </div>

        <hr class="border-gray-200 mb-4">

        <div class="flex items-center justify-between mb-1">
          <span class="text-secondary font-bold" style="font-size:15px;">Total Amount</span>
          <span class="text-primary font-bold" style="font-size:18px;">₹{{ number_format($grandTotal) }}</span>
        </div>
        <p class="text-secondary/40 text-center mt-2" style="font-size:11px;">You Saved ₹{{ number_format($discount) }} on this order</p>
      </div>

    </div>
  </div>
</section>
@endsection
