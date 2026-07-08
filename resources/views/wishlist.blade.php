@extends('dashboard.layout.main')
@section('content')

<section class="bg-[#faf5ee]">

  <div class="max-w-7xl mx-auto px-4 md:px-0">

    <!-- Page Title -->
    <div class="flex items-center justify-between mb-6 flex-wrap gap-3">
      <h1 class="flex items-center gap-2 text-secondary font-bold" style="font-size:22px;">
        <i class="fa-solid fa-heart text-primary"></i>
        My Wishlist
        <span class="text-secondary/40 font-normal" style="font-size:14px;">({{ $wishlists->count() }} items)</span>
      </h1>
      <a href="{{ url('/products') }}" class="flex items-center gap-2 text-secondary hover:text-primary font-semibold transition-colors" style="font-size:13px;">
        <i class="fa-solid fa-arrow-left text-xs"></i> Continue Shopping
      </a>
    </div>

    @if($wishlists->count() > 0)
    <!-- Wishlist Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

      @foreach($wishlists as $item)
      @php $product = $item->product; @endphp

      <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
        <div class="relative overflow-hidden group" style="height:180px;">
          @if($product->badge)
          <span class="absolute top-3 left-3 z-10 bg-primary text-white font-semibold px-2.5 py-1 rounded" style="font-size:11px;">{{ $product->badge }}</span>
          @endif

          <form action="{{ route('wishlist.remove', $product->id) }}" method="POST" class="absolute top-3 right-3 z-10">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-8 h-8 rounded-full bg-white/90 flex items-center justify-center hover:bg-primary hover:text-white text-primary transition-colors" aria-label="Remove from wishlist">
              <i class="fa-solid fa-xmark text-sm"></i>
            </button>
          </form>

          <a href="{{ route('product.detail', $product->slug) }}">
            <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}" class="absolute inset-0 w-full h-full object-cover {{ $product->stock == 0 ? 'opacity-60' : '' }} group-hover:scale-110 transition-transform duration-500">
          </a>
        </div>
        <div class="p-3">
          <p class="text-gold font-semibold uppercase tracking-wide mb-1" style="font-size:11px;">{{ $product->category->name }}</p>
          <a href="{{ route('product.detail', $product->slug) }}">
            <h3 class="text-secondary font-semibold mb-1.5 hover:text-primary transition-colors line-clamp-2" style="font-size:13px;">{{ $product->title }}</h3>
          </a>
          <div class="flex items-center gap-0.5 mb-2">
            @for($i = 1; $i <= 5; $i++)
              <i class="fa-{{ $i <= floor($product->rating) ? 'solid' : 'regular' }} fa-star text-gold text-xs"></i>
            @endfor
          </div>
          <div class="flex items-center gap-2 mb-3">
            <span class="text-primary font-bold" style="font-size:15px;">₹{{ number_format($product->sale_price) }}</span>
            @if($product->price > $product->sale_price)
            <span class="text-gray-400 line-through" style="font-size:12px;">₹{{ number_format($product->price) }}</span>
            <span class="text-green-600 font-semibold" style="font-size:11px;">{{ $product->discount_percent }}% off</span>
            @endif
          </div>

          @if($product->stock > 0)
          <button onclick="addToCart({{ $product->id }}, this)" class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-2 rounded-full transition-colors flex items-center justify-center gap-1.5" style="font-size:12px;">
            <i class="fa-solid fa-cart-plus text-xs"></i> Add to Cart
          </button>
          @else
          <button disabled class="w-full bg-gray-200 text-gray-400 font-semibold py-2 rounded-full cursor-not-allowed flex items-center justify-center gap-1.5" style="font-size:12px;">
            Notify Me
          </button>
          @endif
        </div>
      </div>
      @endforeach

    </div>
    @else
    <!-- Empty State -->
    <div class="text-center py-20">
      <i class="fa-regular fa-heart text-gray-300 text-5xl mb-4"></i>
      <p class="text-secondary font-semibold mb-1" style="font-size:16px;">Your wishlist is empty</p>
      <p class="text-secondary/50 mb-5" style="font-size:13px;">Save items you love by tapping the heart icon.</p>
      <a href="{{ url('/products') }}" class="inline-block bg-primary text-white px-6 py-2.5 rounded-full font-semibold hover:bg-primary/90 transition-colors" style="font-size:14px;">Start Shopping</a>
    </div>
    @endif

  </div>

</section>

<!-- footer  -->
@endsection
