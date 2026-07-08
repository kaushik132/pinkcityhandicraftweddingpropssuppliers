@extends('dashboard.layout.main')
@section('content')
    <!-- Breadcrumb -->
    <!-- Breadcrumb -->
    <section class="bg-[#FEF0E1] !py-5">
        <div class="max-w-7xl mx-auto">
            <nav class="flex items-center gap-2 text-secondary/50" style="font-size:13px;">
                <a href="#" class="hover:text-primary transition-colors">Home</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="text-secondary font-semibold">All Product</span>
            </nav>
        </div>
    </section>

    <section x-data="{
        mobileFilter: false,
        viewMode: 'grid',
        activeCategories: []
    }" class="bg-[#faf5ee]">



        <!-- Mobile Filter Bar -->
        <div class="lg:hidden sticky top-0 z-30 bg-[#faf5ee] border-b border-gray-200 px-4 py-2.5">
            <div class="flex items-center gap-2 overflow-x-auto pc-filter-scroll">
                <button @click="mobileFilter = true"
                    class="flex items-center gap-1.5 flex-shrink-0 border border-primary text-primary px-3 py-1.5 rounded-full font-semibold"
                    style="font-size:13px;">
                    <i class="fa-solid fa-sliders text-xs"></i> Filters
                </button>
                <template x-for="cat in activeCategories" :key="cat">
                    <span class="flex items-center gap-1 flex-shrink-0 bg-primary text-white px-3 py-1.5 rounded-full"
                        style="font-size:12px;">
                        <span x-text="cat"></span>
                        <button @click="activeCategories = activeCategories.filter(c => c !== cat)"><i
                                class="fa-solid fa-xmark text-[10px]"></i></button>
                    </span>
                </template>
                <template x-if="activeCategories.length === 0">
                    <span class="text-secondary/40 flex-shrink-0" style="font-size:13px;">No filters applied</span>
                </template>
            </div>
        </div>

        <!-- Main Layout -->
        <div class="max-w-7xl mx-auto px-4 md:px-0 flex gap-6">

            <!-- SIDEBAR FILTERS (Desktop) -->
            <aside class="hidden lg:block w-[230px] flex-shrink-0">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-secondary font-semibold flex items-center gap-2" style="font-size:18px;">
                        <i class="fa-solid fa-sliders text-primary text-sm"></i> Filters
                    </h2>
                    <button @click="activeCategories = []" class="text-primary hover:text-gold transition-colors"
                        style="font-size:13px;"><a href="{{ url('products') }}">Clear All</a></button>
                </div>

                <!-- Categories -->
                <div class="mb-6">
                    <h3 class="text-secondary font-semibold mb-3" style="font-size:14px;">Categories</h3>
                    <div class="flex flex-col gap-2">
                        @foreach ($categories as $cat)
                            <a href="{{ url('/products') }}?category={{ $cat->slug }}"
                                class="flex items-center gap-3 p-2.5 rounded-xl border {{ request('category') == $cat->slug ? 'border-primary bg-primary/5' : 'border-gray-200 hover:border-primary/40' }} transition-all text-left">
                                <div class="w-10 h-10 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ url('uploads/' . $cat->image) }}" alt="{{ $cat->name }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-secondary font-semibold truncate" style="font-size:13px;">
                                        {{ $cat->name }}</p>
                                    <p class="text-secondary/40" style="font-size:11px;">{{ $cat->products_count }} Products
                                    </p>
                                </div>
                                <i class="fa-solid fa-chevron-right text-secondary/30 text-xs flex-shrink-0"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Price Range -->
                <div class="mb-6">
                    <h3 class="text-secondary font-semibold mb-3" style="font-size:14px;">Price Range</h3>
                    @php
                        $priceRanges = [
                            '0-999' => '₹0 - ₹999',
                            '1000-1999' => '₹1,000 - ₹1,999',
                            '2000-3499' => '₹2,000 - ₹3,499',
                            '3500-5000' => '₹3,500 - ₹5,000',
                        ];
                    @endphp
                    <div class="flex flex-col gap-2 mb-4">
                        @foreach ($priceRanges as $value => $label)
                            <a href="{{ url('/products') }}?price={{ $value }}{{ request('category') ? '&category=' . request('category') : '' }}"
                                class="flex items-center justify-between px-3 py-2 rounded-lg border {{ request('price') == $value ? 'border-primary bg-primary text-white' : 'border-gray-200 bg-white text-secondary hover:border-primary' }} transition-all"
                                style="font-size:13px;">
                                <span>{{ $label }}</span>
                                @if (request('price') == $value)
                                    <i class="fa-solid fa-check text-xs"></i>
                                @endif
                            </a>
                        @endforeach
                        <a href="{{ url('/products') }}"
                            class="flex items-center justify-between px-3 py-2 rounded-lg border {{ !request('price') ? 'border-primary bg-primary text-white' : 'border-gray-200 bg-white text-secondary' }} transition-all"
                            style="font-size:13px;">
                            <span>All Prices</span>
                            @if (!request('price'))
                                <i class="fa-solid fa-check text-xs"></i>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Minimum Rating -->
                <div class="mb-6">
                    <h3 class="text-secondary font-semibold mb-3" style="font-size:14px;">Minimum Rating</h3>
                    <div class="flex flex-col gap-2">
                        <button
                            class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 hover:border-primary/40 transition-all"
                            style="font-size:13px;">
                            <div class="flex items-center gap-0.5">
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-regular fa-star text-gold text-xs"></i>
                            </div>
                            <span class="text-secondary/60">4.5 & above</span>
                        </button>
                        <button
                            class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 hover:border-primary/40 transition-all"
                            style="font-size:13px;">
                            <div class="flex items-center gap-0.5">
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-regular fa-star text-gold text-xs"></i>
                            </div>
                            <span class="text-secondary/60">4 & above</span>
                        </button>
                        <button
                            class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 hover:border-primary/40 transition-all"
                            style="font-size:13px;">
                            <div class="flex items-center gap-0.5">
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-solid fa-star text-gold text-xs"></i>
                                <i class="fa-regular fa-star text-gold text-xs"></i>
                                <i class="fa-regular fa-star text-gold text-xs"></i>
                            </div>
                            <span class="text-secondary/60">3.5 & above</span>
                        </button>
                    </div>
                </div>
            </aside>

            <!-- PRODUCTS AREA -->
            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between mb-5 flex-wrap gap-3">
                    <div>
                        <h1 class="text-secondary font-semibold" style="font-size:22px;">All Products</h1>
                        <p class="text-secondary/50" style="font-size:13px;">{{ $products->total() }} products found</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <select onchange="window.location.href = '{{ url('/products') }}?sort=' + this.value"
                            class="border border-gray-200 rounded-lg px-3 py-2 text-secondary outline-none bg-white"
                            style="font-size:13px;">
                            <option value="popular" {{ request('sort', 'popular') == 'popular' ? 'selected' : '' }}>Most
                                popular</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to
                                High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High
                                to Low</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First
                            </option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Top Rated</option>
                        </select>
                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <button @click="viewMode = 'grid'"
                                :class="viewMode === 'grid' ? 'bg-primary text-white' :
                                    'text-secondary/50 hover:text-secondary'"
                                class="px-3 py-2 transition-colors">
                                <i class="fa-solid fa-grip text-sm"></i>
                            </button>
                            <button @click="viewMode = 'list'"
                                :class="viewMode === 'list' ? 'bg-primary text-white' :
                                    'text-secondary/50 hover:text-secondary'"
                                class="px-3 py-2 transition-colors">
                                <i class="fa-solid fa-list text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT GRID  -->
                <div
                    :class="viewMode === 'grid' ? 'grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4' :
                        'flex flex-col gap-4'">
                    @forelse($products as $product)
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="relative h-44 md:h-56 overflow-hidden group">
                                @if ($product->product_badge)
                                    <span
                                        class="absolute top-3 left-3 z-10 bg-primary text-white font-semibold px-2.5 py-1 rounded"
                                        style="font-size:11px;">{{ $product->product_badge }}</span>
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
                                <p class="text-gold font-semibold uppercase tracking-wide mb-1" style="font-size:11px;">
                                    {{ $product->category->name }}</p>
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
                    @empty
                        <p class="text-secondary/50 col-span-full">No Product's found in this Fillter</p>
                    @endforelse
                </div>

                <div class="mt-8">{{ $products->links() }}</div>
            </div>
        </div>

        <!-- MOBILE FILTER DRAWER -->
        <div x-show="mobileFilter" x-cloak class="fixed inset-0 z-50 flex">
            <div class="flex-1 bg-black/50" @click="mobileFilter = false"></div>
            <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                class="w-[300px] bg-[#faf5ee] h-full overflow-y-auto flex flex-col">

                <div
                    class="flex items-center justify-between px-5 py-4 border-b border-gray-200 sticky top-0 bg-[#faf5ee] z-10">
                    <h2 class="text-secondary font-semibold" style="font-size:18px;"><i
                            class="fa-solid fa-sliders text-primary mr-2 text-sm"></i>Filters</h2>
                    <button @click="mobileFilter = false"
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-secondary transition-colors">
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>
                </div>

                <div class="px-5 py-4 flex-1">

                    <div class="mb-6">
                        <h3 class="text-secondary font-semibold mb-3" style="font-size:14px;">Categories</h3>
                        <div class="flex flex-col gap-2">
                            @foreach ($categories as $cat)
                                <a href="{{ url('/products') }}?category={{ $cat->slug }}"
                                    class="flex items-center gap-3 p-2.5 rounded-xl border {{ request('category') == $cat->slug ? 'border-primary bg-primary/5' : 'border-gray-200 hover:border-primary/40' }} transition-all text-left">
                                    <div class="w-10 h-10 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="{{ url('uploads/' . $cat->image) }}" alt="{{ $cat->name }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-secondary font-semibold truncate" style="font-size:13px;">
                                            {{ $cat->name }}</p>
                                        <p class="text-secondary/40" style="font-size:11px;">{{ $cat->products_count }}
                                            Products</p>
                                    </div>
                                    <i class="fa-solid fa-chevron-right text-secondary/30 text-xs flex-shrink-0"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-secondary font-semibold mb-3" style="font-size:14px;">Price Range</h3>

                        @php
                            $priceRanges = [
                                '0-999' => '₹0 - ₹999',
                                '1000-1999' => '₹1,000 - ₹1,999',
                                '2000-3499' => '₹2,000 - ₹3,499',
                                '3500-5000' => '₹3,500 - ₹5,000',
                            ];
                        @endphp

                        <div class="flex flex-col gap-2">
                            @foreach ($priceRanges as $value => $label)
                                <a href="{{ url('/products') }}?price={{ $value }}{{ request('category') ? '&category=' . request('category') : '' }}"
                                    class="flex items-center justify-between px-3 py-2 rounded-lg border {{ request('price') == $value ? 'border-primary bg-primary text-white' : 'border-gray-200 bg-white text-secondary hover:border-primary' }} transition-all"
                                    style="font-size:13px;">
                                    <span>{{ $label }}</span>

                                    @if (request('price') == $value)
                                        <i class="fa-solid fa-check text-xs"></i>
                                    @endif
                                </a>
                            @endforeach

                            <a href="{{ url('/products') }}{{ request('category') ? '?category=' . request('category') : '' }}"
                                class="flex items-center justify-between px-3 py-2 rounded-lg border {{ !request('price') ? 'border-primary bg-primary text-white' : 'border-gray-200 bg-white text-secondary hover:border-primary' }} transition-all"
                                style="font-size:13px;">
                                <span>All Prices</span>

                                @if (!request('price'))
                                    <i class="fa-solid fa-check text-xs"></i>
                                @endif
                            </a>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-secondary font-semibold mb-3" style="font-size:14px;">Minimum Rating</h3>
                        <div class="flex flex-col gap-2">
                            <button
                                class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 transition-all"
                                style="font-size:13px;">
                                <div class="flex items-center gap-0.5">
                                    <i class="fa-solid fa-star text-gold text-xs"></i>
                                    <i class="fa-solid fa-star text-gold text-xs"></i>
                                    <i class="fa-solid fa-star text-gold text-xs"></i>
                                    <i class="fa-solid fa-star text-gold text-xs"></i>
                                    <i class="fa-regular fa-star text-gold text-xs"></i>
                                </div>
                                <span class="text-secondary/60">4.5 & above</span>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="px-5 py-4 border-t border-gray-200 flex gap-3 sticky bottom-0 bg-[#faf5ee]">
                    <button @click="activeCategories = []"
                        class="flex-1 border border-primary text-primary font-semibold py-2.5 rounded-full transition-colors hover:bg-primary/5"
                        style="font-size:14px;"><a href="{{ url('products') }}">Clear All</a></button>
                    <button @click="mobileFilter = false"
                        class="flex-1 bg-primary text-white font-semibold py-2.5 rounded-full transition-colors hover:bg-primary/90"
                        style="font-size:14px;">Apply Filters</button>
                </div>
            </div>
        </div>

    </section>


    <!-- footer  -->
@endsection
