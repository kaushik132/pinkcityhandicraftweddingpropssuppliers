@extends('dashboard.layout.main')
@section('content')
    <!-- ===== HERO SWIPER SLIDER ===== -->
    <section class="relative" style="padding-top:0; padding-bottom:0;">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="relative w-full h-[480px] md:h-[520px] lg:h-[560px] overflow-hidden bg-secondary">
                        <img src="https://images.unsplash.com/photo-1610701596007-11502861dcfa?w=1600&q=80" alt="Shaadi Utsav"
                            class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/40 to-transparent"></div>

                        <div class="relative z-10 max-w-7xl mx-auto h-full px-5 md:px-10 flex items-center">
                            <div class="max-w-xl">

                                <div class="hero-anim flex items-center gap-3 mb-4" style="--d:0.1s">
                                    <span class="w-8 h-px bg-gold"></span>
                                    <span
                                        class="text-gold text-xs md:text-sm font-semibold tracking-widest uppercase">Weekend
                                        Special Offer</span>
                                </div>

                                <h1 class="hero-anim font-playfair text-white text-4xl md:text-5xl lg:text-6xl leading-tight mb-4"
                                    style="--d:0.25s">
                                    Shaadi Utsav
                                </h1>

                                <p class="hero-anim text-white/80 mb-7" style="font-size:16px;--d:0.4s">
                                    Handcrafted Wedding Props & Décor — Straight from Jaipur's Master Artisans
                                </p>

                                <div class="hero-anim flex flex-wrap items-center gap-3" style="--d:0.55s">
                                    <a href="#"
                                        class="bg-gold hover:bg-gold/90 text-secondary font-semibold px-6 py-3 rounded-full transition-colors text-sm">Shop
                                        the Sale</a>
                                    <a href="#"
                                        class="flex items-center gap-2 border border-white/40 text-white px-6 py-3 rounded-full hover:border-gold hover:text-gold transition-colors text-sm">
                                        <i class="fa-solid fa-tags text-gold"></i> Up to 60% OFF + Free Shipping
                                    </a>
                                </div>

                            </div>
                        </div>

                        <!-- 60% badge -->
                        <div class="hidden lg:flex absolute bottom-10 right-16 z-10 bg-gold text-secondary rounded px-5 py-3 flex-col items-center shadow-xl hero-anim"
                            style="--d:0.7s">
                            <span class="text-2xl font-bold leading-none">60%</span>
                            <span class="text-xs font-semibold">OFF Today</span>
                            <span class="text-[10px]">+ Free Shipping</span>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="relative w-full h-[480px] md:h-[520px] lg:h-[560px] overflow-hidden bg-secondary">
                        <img src="https://images.unsplash.com/photo-1606293459339-aa5a25b7c8f6?w=1600&q=80"
                            alt="Mandap Décor" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/40 to-transparent"></div>

                        <div class="relative z-10 max-w-7xl mx-auto h-full px-5 md:px-10 flex items-center">
                            <div class="max-w-xl">

                                <div class="hero-anim flex items-center gap-3 mb-4" style="--d:0.1s">
                                    <span class="w-8 h-px bg-gold"></span>
                                    <span class="text-gold text-xs md:text-sm font-semibold tracking-widest uppercase">New
                                        Arrival</span>
                                </div>

                                <h1 class="hero-anim font-playfair text-white text-4xl md:text-5xl lg:text-6xl leading-tight mb-4"
                                    style="--d:0.25s">
                                    Mandap Magic
                                </h1>

                                <p class="hero-anim text-white/80 mb-7" style="font-size:16px;--d:0.4s">
                                    Royal Backdrops & Stage Décor Handpicked for Your Big Day
                                </p>

                                <div class="hero-anim flex flex-wrap items-center gap-3" style="--d:0.55s">
                                    <a href="#"
                                        class="bg-gold hover:bg-gold/90 text-secondary font-semibold px-6 py-3 rounded-full transition-colors text-sm">Explore
                                        Collection</a>
                                    <a href="#"
                                        class="flex items-center gap-2 border border-white/40 text-white px-6 py-3 rounded-full hover:border-gold hover:text-gold transition-colors text-sm">
                                        <i class="fa-solid fa-truck-fast text-gold"></i> Free Pan India Delivery
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="hidden lg:flex absolute bottom-10 right-16 z-10 bg-gold text-secondary rounded px-5 py-3 flex-col items-center shadow-xl hero-anim"
                            style="--d:0.7s">
                            <span class="text-2xl font-bold leading-none">New</span>
                            <span class="text-xs font-semibold">Collection</span>
                            <span class="text-[10px]">Handcrafted</span>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="relative w-full h-[480px] md:h-[520px] lg:h-[560px] overflow-hidden bg-secondary">
                        <img src="https://images.unsplash.com/photo-1617791160505-6f00504e3519?w=1600&q=80"
                            alt="Pottery Sale" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/40 to-transparent"></div>

                        <div class="relative z-10 max-w-7xl mx-auto h-full px-5 md:px-10 flex items-center">
                            <div class="max-w-xl">

                                <div class="hero-anim flex items-center gap-3 mb-4" style="--d:0.1s">
                                    <span class="w-8 h-px bg-gold"></span>
                                    <span
                                        class="text-gold text-xs md:text-sm font-semibold tracking-widest uppercase">Limited
                                        Time</span>
                                </div>

                                <h1 class="hero-anim font-playfair text-white text-4xl md:text-5xl lg:text-6xl leading-tight mb-4"
                                    style="--d:0.25s">
                                    Blue Pottery Fest
                                </h1>

                                <p class="hero-anim text-white/80 mb-7" style="font-size:16px;--d:0.4s">
                                    Authentic Jaipur Pottery & Ceramics, Handcrafted with Love
                                </p>

                                <div class="hero-anim flex flex-wrap items-center gap-3" style="--d:0.55s">
                                    <a href="#"
                                        class="bg-gold hover:bg-gold/90 text-secondary font-semibold px-6 py-3 rounded-full transition-colors text-sm">Shop
                                        Pottery</a>
                                    <a href="#"
                                        class="flex items-center gap-2 border border-white/40 text-white px-6 py-3 rounded-full hover:border-gold hover:text-gold transition-colors text-sm">
                                        <i class="fa-solid fa-bolt text-gold"></i> Flash Sale Ends Soon
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="hidden lg:flex absolute bottom-10 right-16 z-10 bg-gold text-secondary rounded px-5 py-3 flex-col items-center shadow-xl hero-anim"
                            style="--d:0.7s">
                            <span class="text-2xl font-bold leading-none">40%</span>
                            <span class="text-xs font-semibold">OFF Today</span>
                            <span class="text-[10px]">Limited Stock</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Pagination -->
            <div class="swiper-pagination hero-pagination"></div>

            <!-- Arrows -->
            <div class="hero-prev hidden md:flex">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="hero-next hidden md:flex">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>
    </section>

    <!-- ===== TRUST BAR ===== -->
    <section class="bg-secondary border-b border-gold/20">
        <div class="max-w-7xl mx-auto px-4 md:px-0">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-4">

                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-truck-fast text-white text-base"></i>
                    </div>
                    <div class="leading-tight">
                        <p class="text-white font-semibold" style="font-size:15px;">Free Shipping</p>
                        <p class="text-white/40" style="font-size:12px;">On orders ₹999+</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-award text-white text-base"></i>
                    </div>
                    <div class="leading-tight">
                        <p class="text-white font-semibold" style="font-size:15px;">100% Handmade</p>
                        <p class="text-white/40" style="font-size:12px;">Artisan Certified</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-rotate-left text-white text-base"></i>
                    </div>
                    <div class="leading-tight">
                        <p class="text-white font-semibold" style="font-size:15px;">Easy Returns</p>
                        <p class="text-white/40" style="font-size:12px;">7-day return policy</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-shield-halved text-white text-base"></i>
                    </div>
                    <div class="leading-tight">
                        <p class="text-white font-semibold" style="font-size:15px;">Secure Payment</p>
                        <p class="text-white/40" style="font-size:12px;">100% Safe & Trusted</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== SHOP BY CATEGORY (SWIPER) ===== -->
    <section class="">
        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Heading -->
            <div class="flex items-end justify-between mb-8">
                <div>
                    <p class="text-primary font-semibold tracking-wide mb-1" style="font-size:14px;">Explore</p>
                    <h2 class="font-playfair text-secondary text-3xl md:text-4xl">Shop By Category</h2>
                </div>
                <a href="{{ url('/products') }}"
                    class="flex items-center gap-1 text-primary font-semibold hover:text-gold transition-colors flex-shrink-0"
                    style="font-size:14px;">
                    View All <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            </div>

            <!-- Swiper -->
            <div class="relative">
                <div class="swiper category-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $cat)
                            <div class="swiper-slide">
                                <a href="{{ url('/products') }}?category={{ $cat->slug }}"
                                    class="relative rounded-xl overflow-hidden h-64 group block">
                                    <img src="{{ url('uploads/' . $cat->image) }}" alt="{{ $cat->name }}"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent">
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <h3 class="text-white font-semibold" style="font-size:16px;">{{ $cat->name }}
                                        </h3>
                                        <p class="text-white/70" style="font-size:12px;">{{ $cat->products_count }}+ Items
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Arrows -->
                <div class="category-prev hidden md:flex"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="category-next hidden md:flex"><i class="fa-solid fa-chevron-right"></i></div>
            </div>

        </div>
    </section>

    <!-- ===== BEST SELLING PRODUCTS ===== -->
    <section class="bg-[#FEF0E1]">
        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Heading -->
            <div class="flex items-end justify-between mb-8">
                <div>
                    <p class="text-primary font-semibold tracking-wide mb-1" style="font-size:14px;">Handpicked</p>
                    <h2 class="font-playfair text-secondary text-3xl md:text-4xl">Best Selling Product</h2>
                </div>
                <a href="{{ url('/products') }}"
                    class="flex items-center gap-1 text-primary font-semibold hover:text-gold transition-colors flex-shrink-0"
                    style="font-size:14px;">
                    View All <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            </div>

            <!-- Swiper -->
            <div class="relative">
                <div class="swiper product-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($bestSelling as $product)
                            <div class="swiper-slide">
                                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="relative h-44 md:h-56 overflow-hidden group">
                                        @if ($product->badge)
                                            <span
                                                class="absolute top-3 left-3 z-10 bg-primary text-white font-semibold px-2.5 py-1 rounded"
                                                style="font-size:11px;">{{ $product->badge }}</span>
                                        @endif
                                        <button onclick="toggleWishlist(this, {{ $product->id }})"
                                            data-wishlisted="{{ in_array($product->id, $wishlistedIds) ? '1' : '0' }}"
                                            class="wishlist-btn absolute top-3 right-3 z-10 w-8 h-8 rounded-full bg-white/90 flex items-center justify-center hover:bg-gold hover:text-white transition-colors">
                                            <i
                                                class="fa-{{ in_array($product->id, $wishlistedIds) ? 'solid text-primary' : 'regular' }} fa-heart text-sm"></i>
                                        </button>
                                        <a href="{{ route('product.detail', $product->slug) }}">
                                            <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}"
                                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <p class="text-gold font-semibold uppercase tracking-wide mb-1"
                                            style="font-size:11px;">{{ $product->category->name }}</p>
                                        <a href="{{ route('product.detail', $product->slug) }}">
                                            <h3 class="text-secondary font-semibold mb-1.5 hover:text-primary transition-colors"
                                                style="font-size:14px;">{{ $product->title }}</h3>
                                        </a>
                                        <div class="flex items-center gap-1 mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fa-{{ $i <= floor($product->rating) ? 'solid' : 'regular' }} fa-star text-gold text-xs"></i>
                                            @endfor
                                        </div>
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="text-primary font-bold"
                                                style="font-size:16px;">₹{{ number_format($product->sale_price) }}</span>
                                            @if ($product->price > $product->sale_price)
                                                <span class="text-gray-400 line-through"
                                                    style="font-size:13px;">₹{{ number_format($product->price) }}</span>
                                                <span class="text-green-600 font-semibold"
                                                    style="font-size:11px;">{{ $product->discount_percent }}% off</span>
                                            @endif
                                        </div>
                                        <button onclick="addToCart({{ $product->id }}, this)"
                                            class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-2.5 rounded-full transition-colors"
                                            style="font-size:13px;">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Arrows -->
                <div class="product-prev hidden md:flex"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="product-next hidden md:flex"><i class="fa-solid fa-chevron-right"></i></div>

                <!-- Pagination (mobile) -->
                <div class="product-pagination md:hidden mt-5"></div>
            </div>
        </div>
    </section>

    <!-- ===== WEDDING HIGHLIGHTS ===== -->
    <section class="overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Heading -->
            <div class="text-center mb-8" data-aos="fade-up">
                <p class="text-primary mb-2" style="font-size:14px;">✦ Curated for Your Special Day ✦</p>
                <h2 class="font-playfair text-secondary" style="font-size:42px; font-weight:400;">Wedding Highlights</h2>
            </div>

            <!-- Top Grid: Big Left + Two Right -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                <!-- Big Left Card -->
                <div class="relative rounded-2xl overflow-hidden h-[320px] md:h-[500px] group cursor-pointer"
                    data-aos="fade-right">
                    <img src="assets/images/ff55ccc18b4679bdd499b7d5f2874d6d2a7180bc (1).jpg" alt="Mandap Decor"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>

                    <!-- Most Popular badge -->
                    <div class="absolute top-4 left-4 bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full"
                        style="font-size:12px; font-weight:500;">Most Popular</div>

                    <!-- Bottom Content -->
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-white mb-1" style="font-size:20px; font-weight:500;">Most Popular Mandap &
                            Ceremony Décor</h3>
                        <p class="text-white/70 mb-4" style="font-size:13px;">Hand-stitched floral arrangements, drapes &
                            traditional props</p>
                        <a href="#"
                            class="inline-flex items-center border border-white text-white px-5 py-2 hover:bg-white hover:text-secondary transition-colors"
                            style="font-size:12px; font-weight:500; letter-spacing:0.08em;">
                            SHOP MANDAP DECOR
                        </a>
                    </div>
                </div>

                <!-- Right: Two Stacked Cards -->
                <div class="flex flex-col gap-4">

                    <!-- Right Top -->
                    <div class="relative rounded-2xl overflow-hidden h-[155px] md:h-[242px] group cursor-pointer"
                        data-aos="fade-left" data-aos-delay="100">
                        <img src="assets/images/34e7fc6111c42ec3621777bd024b9b478e34f412 (1).jpg" alt="Phoolon ki Chaadar"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-black/10 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-5">
                            <h3 class="text-white mb-0.5" style="font-size:18px; font-weight:500;">Phoolon ki Chaadar</h3>
                            <p class="text-white/70" style="font-size:12px;">Marigold & Rose Arrangements</p>
                        </div>
                    </div>

                    <!-- Right Bottom -->
                    <div class="relative rounded-2xl overflow-hidden h-[155px] md:h-[242px] group cursor-pointer"
                        data-aos="fade-left" data-aos-delay="200">
                        <img src="assets/images/1971559d8a33da8c148f1db3d5174509b05fd57f.jpg" alt="Varmala & Garlands"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-black/10 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-5">
                            <h3 class="text-white mb-0.5" style="font-size:18px; font-weight:500;">Varmala & Garlands</h3>
                            <p class="text-white/70" style="font-size:12px;">Marigold & Rose Arrangements</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Bottom Grid: Two Equal Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Bottom Left -->
                <div class="relative rounded-2xl overflow-hidden h-[200px] md:h-[220px] group cursor-pointer"
                    data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1582034986517-30d163aa1da9?w=800&q=80"
                        alt="Complete Wedding Prop Packages"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    <div class="absolute top-4 left-4 bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full"
                        style="font-size:11px; font-weight:500; letter-spacing:0.06em;">WEEKEND SPECIAL</div>
                    <div class="absolute bottom-0 left-0 right-0 p-5">
                        <h3 class="text-white mb-1" style="font-size:20px; font-weight:500;">Complete Wedding Prop
                            Packages</h3>
                        <p class="text-white/70 mb-3" style="font-size:12px;">Hand-stitched floral arrangements, drapes &
                            traditional props</p>
                        <a href="#" class="inline-flex items-center gap-2 text-white"
                            style="font-size:12px; font-weight:500; letter-spacing:0.06em;">
                            EXPLORE PACKAGE <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Bottom Right -->
                <div class="relative rounded-2xl overflow-hidden h-[200px] md:h-[220px] group cursor-pointer"
                    data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?w=800&q=80"
                        alt="Jaipur Folk Art Collection"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    <div class="absolute top-4 left-4 bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full"
                        style="font-size:11px; font-weight:500; letter-spacing:0.06em;">NEW ARRIVAL</div>
                    <div class="absolute bottom-0 left-0 right-0 p-5">
                        <h3 class="text-white mb-1" style="font-size:20px; font-weight:500;">Jaipur Folk Art Collection
                        </h3>
                        <p class="text-white/70 mb-3" style="font-size:12px;">Authentic puppets, block prints &
                            traditional craft gifts</p>
                        <a href="#" class="inline-flex items-center gap-2 text-white"
                            style="font-size:12px; font-weight:500; letter-spacing:0.06em;">
                            SHOP COLLECTION <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ===== CUSTOMER LOVE + STATS ===== -->
    <section class="bg-secondary">
        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Heading -->
            <div class="text-center mb-10" data-aos="fade-up">
                <p class="text-gold font-semibold tracking-widest uppercase mb-2" style="font-size:13px;">Customer Love
                </p>
                <h2 class="font-playfair text-white" style="font-size:38px; font-weight:400;">What Our Customers Say</h2>
            </div>

            <!-- Swiper -->
            <div class="relative" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">

                        <!-- Card 1 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white/5 border border-white/10 rounded-xl p-6 h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-1 mb-4">
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                    </div>
                                    <p class="text-white/75 leading-relaxed" style="font-size:14px;">"Absolutely stunning
                                        quality! Ordered wedding props for my daughter's shaadi and every single piece was
                                        better than expected. The handpainting is exquisite."</p>
                                </div>
                                <div class="flex items-center gap-3 mt-6">
                                    <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-white font-semibold flex-shrink-0"
                                        style="font-size:13px;">PS</div>
                                    <div>
                                        <p class="text-white font-semibold" style="font-size:14px;">Priya Sharma</p>
                                        <p class="text-white/40" style="font-size:12px;">Delhi</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white/5 border border-white/10 rounded-xl p-6 h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-1 mb-4">
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                    </div>
                                    <p class="text-white/75 leading-relaxed" style="font-size:14px;">"Pink City has become
                                        my go-to for all home décor needs. The Rajasthani craft pieces are 100% authentic
                                        and prices are very reasonable."</p>
                                </div>
                                <div class="flex items-center gap-3 mt-6">
                                    <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-white font-semibold flex-shrink-0"
                                        style="font-size:13px;">RG</div>
                                    <div>
                                        <p class="text-white font-semibold" style="font-size:14px;">Ramesh Gupta</p>
                                        <p class="text-white/40" style="font-size:12px;">Mumbai</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white/5 border border-white/10 rounded-xl p-6 h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-1 mb-4">
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                    </div>
                                    <p class="text-white/75 leading-relaxed" style="font-size:14px;">"Fast delivery,
                                        beautiful packaging, and the products look even better in person. The brass Ganesha
                                        figurine I ordered is now the centerpiece of my living room!"</p>
                                </div>
                                <div class="flex items-center gap-3 mt-6">
                                    <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-white font-semibold flex-shrink-0"
                                        style="font-size:13px;">AV</div>
                                    <div>
                                        <p class="text-white font-semibold" style="font-size:14px;">Anita Verma</p>
                                        <p class="text-white/40" style="font-size:12px;">Bangalore</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white/5 border border-white/10 rounded-xl p-6 h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-1 mb-4">
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-regular fa-star text-gold text-sm"></i>
                                    </div>
                                    <p class="text-white/75 leading-relaxed" style="font-size:14px;">"Ordered the entire
                                        mandap decoration set and it was absolutely gorgeous. The team was very helpful with
                                        customization requests. Highly recommend!"</p>
                                </div>
                                <div class="flex items-center gap-3 mt-6">
                                    <div class="w-9 h-9 rounded-full bg-gold flex items-center justify-center text-secondary font-semibold flex-shrink-0"
                                        style="font-size:13px;">SK</div>
                                    <div>
                                        <p class="text-white font-semibold" style="font-size:14px;">Sunita Kapoor</p>
                                        <p class="text-white/40" style="font-size:12px;">Jaipur</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 5 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white/5 border border-white/10 rounded-xl p-6 h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-1 mb-4">
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                        <i class="fa-solid fa-star text-gold text-sm"></i>
                                    </div>
                                    <p class="text-white/75 leading-relaxed" style="font-size:14px;">"Best place for
                                        authentic Rajasthani handicrafts. The blue pottery collection is stunning and the
                                        packaging was very careful. Will order again!"</p>
                                </div>
                                <div class="flex items-center gap-3 mt-6">
                                    <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-white font-semibold flex-shrink-0"
                                        style="font-size:13px;">MJ</div>
                                    <div>
                                        <p class="text-white font-semibold" style="font-size:14px;">Mohit Joshi</p>
                                        <p class="text-white/40" style="font-size:12px;">Pune</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Pagination -->
                <div class="testimonial-pagination mt-8 flex justify-center"></div>
            </div>

            <!-- Divider -->
            <div class="border-t border-white/10 mt-12 mb-10"></div>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center" data-aos="fade-up" data-aos-delay="100">

                <div>
                    <p class="font-playfair text-gold" style="font-size:40px; font-weight:400;">500+</p>
                    <p class="text-white/50 uppercase tracking-widest" style="font-size:11px; font-weight:500;">Master
                        Artisans</p>
                </div>

                <div>
                    <p class="font-playfair text-gold" style="font-size:40px; font-weight:400;">15,000 +</p>
                    <p class="text-white/50 uppercase tracking-widest" style="font-size:11px; font-weight:500;">Products
                        Handcrafted</p>
                </div>

                <div>
                    <p class="font-playfair text-gold" style="font-size:40px; font-weight:400;">12</p>
                    <p class="text-white/50 uppercase tracking-widest" style="font-size:11px; font-weight:500;">Craft
                        Traditions</p>
                </div>

                <div>
                    <p class="font-playfair text-gold" style="font-size:40px; font-weight:400;">28 +</p>
                    <p class="text-white/50 uppercase tracking-widest" style="font-size:11px; font-weight:500;">Years of
                        Legacy</p>
                </div>

            </div>

        </div>
    </section>


    <!-- ===== FLASH SALE ===== -->
    <section class="bg-primary overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Top Bar -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 mb-10">

                <!-- Left: Title -->
                <div data-aos="fade-right">
                    <p class="text-gold font-semibold mb-2" style="font-size:13px;">✦ Limited Time Offer</p>
                    <h2 class="font-playfair text-white leading-tight mb-2" style="font-size:38px; font-weight:400;">Flash
                        Sale —Ends <br>Tonight!</h2>
                    <p class="text-white/60" style="font-size:14px;">Grab handcrafted pieces at never-seen-before prices
                    </p>
                </div>

                <!-- Center: Countdown -->
                <div class="flex items-center gap-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center">
                        <div class="bg-secondary/60 text-white rounded-lg px-4 py-3 min-w-[64px]">
                            <span id="flash-hours" class="font-playfair"
                                style="font-size:32px; font-weight:400; line-height:1;">08</span>
                        </div>
                        <p class="text-white/50 uppercase tracking-widest mt-1" style="font-size:10px;">Hours</p>
                    </div>
                    <span class="text-white/50 font-semibold text-2xl mb-4">:</span>
                    <div class="text-center">
                        <div class="bg-secondary/60 text-white rounded-lg px-4 py-3 min-w-[64px]">
                            <span id="flash-mins" class="font-playfair"
                                style="font-size:32px; font-weight:400; line-height:1;">23</span>
                        </div>
                        <p class="text-white/50 uppercase tracking-widest mt-1" style="font-size:10px;">Mins</p>
                    </div>
                    <span class="text-white/50 font-semibold text-2xl mb-4">:</span>
                    <div class="text-center">
                        <div class="bg-secondary/60 text-white rounded-lg px-4 py-3 min-w-[64px]">
                            <span id="flash-secs" class="font-playfair"
                                style="font-size:32px; font-weight:400; line-height:1;">32</span>
                        </div>
                        <p class="text-white/50 uppercase tracking-widest mt-1" style="font-size:10px;">Secs</p>
                    </div>
                </div>

                <!-- Right: CTA Button -->
                <div data-aos="fade-left" data-aos-delay="150">
                    <a href="#"
                        class="inline-flex items-center gap-2 bg-gold hover:bg-gold/90 text-secondary font-semibold px-8 py-4 transition-colors"
                        style="font-size:14px; letter-spacing:0.06em;">
                        SHOP FLASH SALE —
                    </a>
                </div>

            </div>

            <!-- Product Swiper -->
            <div class="relative" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper flash-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($flashSale as $product)
                            <div class="swiper-slide">
                                <div
                                    class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                                    <div class="relative h-44 md:h-56 overflow-hidden group">
                                        @if ($product->badge)
                                            <span
                                                class="absolute top-3 left-3 z-10 bg-primary text-white font-semibold px-2.5 py-1 rounded"
                                                style="font-size:11px;">{{ $product->badge }}</span>
                                        @endif
                                        <button onclick="toggleWishlist(this, {{ $product->id }})"
                                            data-wishlisted="{{ in_array($product->id, $wishlistedIds) ? '1' : '0' }}"
                                            class="wishlist-btn absolute top-3 right-3 z-10 w-8 h-8 rounded-full bg-white/90 flex items-center justify-center hover:bg-gold hover:text-white transition-colors">
                                            <i
                                                class="fa-{{ in_array($product->id, $wishlistedIds) ? 'solid text-primary' : 'regular' }} fa-heart text-sm"></i>
                                        </button>
                                        <a href="{{ route('product.detail', $product->slug) }}">
                                            <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}"
                                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <p class="text-gold font-semibold uppercase tracking-wide mb-1"
                                            style="font-size:11px;">{{ $product->category->name }}</p>
                                        <a href="{{ route('product.detail', $product->slug) }}">
                                            <h3 class="text-secondary font-semibold mb-1.5 hover:text-primary transition-colors"
                                                style="font-size:14px;">{{ $product->title }}</h3>
                                        </a>
                                        <div class="flex items-center gap-1 mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fa-{{ $i <= floor($product->rating) ? 'solid' : 'regular' }} fa-star text-gold text-xs"></i>
                                            @endfor
                                        </div>
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="text-primary font-bold"
                                                style="font-size:16px;">₹{{ number_format($product->sale_price) }}</span>
                                            <span class="text-gray-400 line-through"
                                                style="font-size:13px;">₹{{ number_format($product->price) }}</span>
                                            <span class="text-green-600 font-semibold"
                                                style="font-size:11px;">{{ $product->discount_percent }}% off</span>
                                        </div>
                                        <button onclick="addToCart({{ $product->id }}, this)"
                                            class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-2.5 rounded-full transition-colors"
                                            style="font-size:13px;">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Arrows -->
                <div class="flash-prev hidden md:flex"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="flash-next hidden md:flex"><i class="fa-solid fa-chevron-right"></i></div>

                <!-- Pagination mobile -->
                <div class="flash-pagination md:hidden mt-6 flex justify-center"></div>
            </div>

        </div>
    </section>


    <!-- ===== MEET OUR ARTISANS ===== -->
    <section class="bg-[#faf5ee]">
        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Heading -->
            <div class="mb-8" data-aos="fade-up">
                <p class="text-primary font-semibold tracking-widest uppercase mb-2" style="font-size:13px;">The Makers
                </p>
                <h2 class="font-playfair text-secondary mb-2" style="font-size:42px; font-weight:400;">Meet Our Artisans
                </h2>
                <p class="text-secondary/60" style="font-size:14px;">Every piece carries the soul of a skilled
                    craftsman<br>from Jaipur's centuries-old workshops</p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Card 1 -->
                <div class="relative rounded-2xl overflow-hidden h-[320px] md:h-[380px] group cursor-pointer"
                    data-aos="fade-up" data-aos-delay="0">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&q=80"
                        alt="Ramji Lal Kumhar"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>

                    <!-- Experience Badge -->
                    <div class="absolute top-4 right-4 bg-gold text-secondary text-center px-3 py-2 rounded"
                        style="font-size:12px; font-weight:600; line-height:1.3;">
                        40+ Years<br>Experience
                    </div>

                    <!-- Bottom Content -->
                    <div class="absolute bottom-0 left-0 right-0 p-5">
                        <p class="text-gold uppercase tracking-widest mb-1" style="font-size:10px; font-weight:500;">Blue
                            Pottery Master</p>
                        <h3 class="text-white" style="font-size:20px; font-weight:400;">Ramji Lal Kumhar</h3>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="relative rounded-2xl overflow-hidden h-[320px] md:h-[380px] group cursor-pointer"
                    data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?w=600&q=80"
                        alt="Ramji Lal Kumhar"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>

                    <div class="absolute top-4 right-4 bg-gold text-secondary text-center px-3 py-2 rounded"
                        style="font-size:12px; font-weight:600; line-height:1.3;">
                        40+ Years<br>Experience
                    </div>

                    <div class="absolute bottom-0 left-0 right-0 p-5">
                        <p class="text-gold uppercase tracking-widest mb-1" style="font-size:10px; font-weight:500;">Blue
                            Pottery Master</p>
                        <h3 class="text-white" style="font-size:20px; font-weight:400;">Ramji Lal Kumhar</h3>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="relative rounded-2xl overflow-hidden h-[320px] md:h-[380px] group cursor-pointer"
                    data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1617791160505-6f00504e3519?w=600&q=80"
                        alt="Ramji Lal Kumhar"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>

                    <div class="absolute top-4 right-4 bg-gold text-secondary text-center px-3 py-2 rounded"
                        style="font-size:12px; font-weight:600; line-height:1.3;">
                        40+ Years<br>Experience
                    </div>

                    <div class="absolute bottom-0 left-0 right-0 p-5">
                        <p class="text-gold uppercase tracking-widest mb-1" style="font-size:10px; font-weight:500;">Blue
                            Pottery Master</p>
                        <h3 class="text-white" style="font-size:20px; font-weight:400;">Ramji Lal Kumhar</h3>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== INSTAGRAM SECTION ===== -->
    <section class="bg-secondary">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Heading -->
            <div class="text-center mb-8" data-aos="fade-up">
                <p class="text-gold font-semibold tracking-widest uppercase mb-2" style="font-size:13px;">
                    @PinkCityHandicraft</p>
                <h2 class="font-playfair text-white mb-2" style="font-size:38px; font-weight:400;">Follow Our Journey on
                    Instagram</h2>
                <p class="text-white/50" style="font-size:14px;">Tag us in your photos for a chance to be featured</p>
            </div>

            <!-- Instagram Grid -->
            <div class="grid grid-cols-3 sm:grid-cols-5 gap-3 mb-8" data-aos="fade-up" data-aos-delay="100">

                <a href="#" class="relative overflow-hidden rounded-lg aspect-square group">
                    <img src="https://images.unsplash.com/photo-1606293459339-aa5a25b7c8f6?w=400&q=80" alt="Instagram"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 flex items-center justify-center">
                        <i
                            class="fa-brands fa-instagram text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </a>

                <a href="#" class="relative overflow-hidden rounded-lg aspect-square group">
                    <img src="https://images.unsplash.com/photo-1610701596007-11502861dcfa?w=400&q=80" alt="Instagram"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 flex items-center justify-center">
                        <i
                            class="fa-brands fa-instagram text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </a>

                <a href="#" class="relative overflow-hidden rounded-lg aspect-square group">
                    <img src="https://images.unsplash.com/photo-1612196808214-b7e239e5d5e1?w=400&q=80" alt="Instagram"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 flex items-center justify-center">
                        <i
                            class="fa-brands fa-instagram text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </a>

                <a href="#" class="relative overflow-hidden rounded-lg aspect-square group">
                    <img src="https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?w=400&q=80" alt="Instagram"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 flex items-center justify-center">
                        <i
                            class="fa-brands fa-instagram text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </a>

                <a href="#" class="relative overflow-hidden rounded-lg aspect-square group">
                    <img src="https://images.unsplash.com/photo-1617791160505-6f00504e3519?w=400&q=80" alt="Instagram"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 flex items-center justify-center">
                        <i
                            class="fa-brands fa-instagram text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </a>

            </div>

            <!-- Follow Button -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <a href="#"
                    class="inline-flex items-center gap-2 border border-gold text-gold hover:bg-gold hover:text-secondary px-8 py-3 transition-colors font-semibold"
                    style="font-size:13px; letter-spacing:0.08em;">
                    FOLLOW @PINKCITYHANDICRAFT
                </a>
            </div>

        </div>
    </section>



    <!-- footer  -->
@endsection
