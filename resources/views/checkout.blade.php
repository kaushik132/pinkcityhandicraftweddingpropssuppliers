@extends('dashboard.layout.main')
@section('content')

<section class="bg-[#faf5ee] py-8">
  <div class="max-w-7xl mx-auto px-4 md:px-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

      <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
        <h1 class="text-secondary font-bold mb-1" style="font-size:20px;">Delivery Address</h1>
        <p class="text-secondary/50 mb-5" style="font-size:13px;">Enter the address where you want your order to be delivered</p>

        @if($errors->any())
        <div class="mb-4 text-red-600" style="font-size:12px;">
            @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
        </div>
        @endif

        <form action="{{ route('checkout.save-address') }}" method="POST">
          @csrf

          <div class="grid grid-cols-2 gap-4 mb-6">
            <label class="relative cursor-pointer">
              <input type="radio" name="address_type" value="home" {{ old('address_type', $savedAddress->type ?? 'home') == 'home' ? 'checked' : '' }} class="peer sr-only">
              <div class="border-2 border-gray-200 peer-checked:border-primary peer-checked:bg-primary/5 rounded-xl px-4 py-3 transition-colors">
                <p class="text-secondary font-semibold" style="font-size:14px;">Home</p>
                <p class="text-secondary/50" style="font-size:12px;">Use this address for delivery</p>
              </div>
              <span class="absolute top-3 right-4 w-4 h-4 rounded-full border-2 border-gray-300 peer-checked:border-primary flex items-center justify-center">
                <span class="w-2 h-2 rounded-full bg-primary opacity-0 peer-checked:opacity-100"></span>
              </span>
            </label>

            <label class="relative cursor-pointer">
              <input type="radio" name="address_type" value="work" {{ old('address_type', $savedAddress->type ?? '') == 'work' ? 'checked' : '' }} class="peer sr-only">
              <div class="border-2 border-gray-200 peer-checked:border-primary peer-checked:bg-primary/5 rounded-xl px-4 py-3 transition-colors">
                <p class="text-secondary font-semibold" style="font-size:14px;">Work</p>
                <p class="text-secondary/50" style="font-size:12px;">Use this address for delivery</p>
              </div>
              <span class="absolute top-3 right-4 w-4 h-4 rounded-full border-2 border-gray-300 peer-checked:border-primary flex items-center justify-center">
                <span class="w-2 h-2 rounded-full bg-primary opacity-0 peer-checked:opacity-100"></span>
              </span>
            </label>
          </div>

          <div class="mb-4">
            <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Full Name <span class="text-primary">*</span></label>
            <input type="text" name="full_name" oninput="this.value = this.value.replace(/[^A-Za-z+. ]/g, '').replace(/(\..*?)\..*/g, '$1');" required value="{{ old('full_name', $savedAddress->full_name ?? '') }}" placeholder="Enter your full name" class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
          </div>

          <div class="mb-4">
            <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Mobile Number <span class="text-primary">*</span></label>
            <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-[#faf5ee]/40 focus-within:border-primary transition-colors">
              <select name="country_code" class="border-r border-gray-200 bg-transparent px-3 py-2.5 outline-none text-secondary" style="font-size:13px;">
                <option value="+91" {{ old('country_code', $savedAddress->country_code ?? '+91') == '+91' ? 'selected' : '' }}>🇮🇳 +91</option>
                <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>🇺🇸 +1</option>
                <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>🇬🇧 +44</option>
                <option value="+971" {{ old('country_code') == '+971' ? 'selected' : '' }}>🇦🇪 +971</option>
              </select>
              <input type="text" name="mobile" maxlength="10" oninput="this.value = this.value.replace(/[^0-9+.]/g, '').replace(/(\..*?)\..*/g, '$1');" required value="{{ old('mobile', $savedAddress->mobile ?? '') }}" placeholder="Enter mobile number" class="flex-1 px-3.5 py-2.5 outline-none text-secondary bg-transparent" style="font-size:13px;">
            </div>
          </div>

          <div class="mb-4">
            <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Pincode <span class="text-primary">*</span></label>
            <div class="flex items-center gap-3">
              <input type="text" name="pincode" required value="{{ old('pincode', $savedAddress->pincode ?? '') }}" placeholder="Enter pincode" class="flex-1 border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
              <button type="button" class="border border-primary text-primary font-semibold px-5 py-2.5 rounded-lg hover:bg-primary/5 transition-colors flex-shrink-0" style="font-size:13px;">CHECK</button>
            </div>
          </div>

          <div class="mb-4">
            <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Address (House No., Building, Street) <span class="text-primary">*</span></label>
            <input type="text" name="address" required value="{{ old('address', $savedAddress->address ?? '') }}" placeholder="Enter address" class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
          </div>

          <div class="mb-4">
            <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Area / Landmark (Optional)</label>
            <input type="text" name="landmark" value="{{ old('landmark', $savedAddress->landmark ?? '') }}" placeholder="Enter area or landmark" class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-5">
            <div>
              <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">City <span class="text-primary">*</span></label>
              <input type="text" name="city" required value="{{ old('city', $savedAddress->city ?? '') }}" placeholder="Enter city" class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
            </div>
            <div>
              <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">State <span class="text-primary">*</span></label>
              <select name="state" required class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
                <option value="">Choose option...</option>
                @foreach(['rajasthan'=>'Rajasthan','delhi'=>'Delhi','maharashtra'=>'Maharashtra','gujarat'=>'Gujarat','karnataka'=>'Karnataka'] as $val => $label)
                <option value="{{ $val }}" {{ old('state', $savedAddress->state ?? '') == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mb-6">
            <input type="checkbox" id="save_address" name="save_address" value="1" class="w-4 h-4 accent-primary">
            <label for="save_address" class="text-secondary/70" style="font-size:13px;">Save this address for future use</label>
          </div>

          <div class="flex items-center gap-4 flex-wrap">
            <a href="{{ route('cart') }}" class="flex items-center gap-2 border border-gray-200 text-secondary font-semibold px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors" style="font-size:13px;">
              <i class="fa-solid fa-arrow-left text-xs"></i> BACK TO CART
            </a>
            <button type="submit" class="flex-1 bg-primary hover:bg-primary/90 text-white font-semibold px-6 py-3 rounded-lg transition-colors" style="font-size:13px; letter-spacing:0.5px;">
              CONTINUE TO PAYMENT
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
            <span class="text-secondary font-semibold" style="font-size:13px;">₹{{ number_format($subtotal) }}</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-secondary/60" style="font-size:13px;">Discount</span>
            <span class="text-green-600 font-semibold" style="font-size:13px;">−₹{{ number_format($discount) }}</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-secondary/60" style="font-size:13px;">Shipping Charges</span>
            <span class="text-green-600 font-semibold" style="font-size:13px;">FREE</span>
          </div>
        </div>

        <hr class="border-gray-200 mb-4">

        <div class="flex items-center justify-between mb-1">
          <span class="text-secondary font-bold" style="font-size:15px;">Total Amount</span>
          <span class="text-primary font-bold" style="font-size:18px;">₹{{ number_format($total) }}</span>
        </div>
        <p class="text-secondary/40 text-center mt-2" style="font-size:11px;">You Saved ₹{{ number_format($discount) }} on this order</p>
      </div>

    </div>

    <!-- Why Shop With Us — static rehne do, jaisa hai -->
  </div>
</section>
@endsection
