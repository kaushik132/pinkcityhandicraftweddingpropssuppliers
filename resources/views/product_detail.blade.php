@extends('dashboard.layout.main')
@section('content')
    <!-- Breadcrumb -->
    <section class="bg-[#FEF0E1] !py-5">
        <div class="max-w-7xl mx-auto">
            <nav class="flex items-center gap-2 flex-wrap" style="font-size:13px;">
                <a href="#" class="text-primary hover:text-gold transition-colors">Home</a>
                <i class="fa-solid fa-chevron-right text-gray-300 text-[10px]"></i>
                <a href="{{ url('/products') }}" class="text-secondary/50 hover:text-primary transition-colors">All
                    Product</a>
                <i class="fa-solid fa-chevron-right text-gray-300 text-[10px]"></i>
                <a href="{{ url('/products') }}?category={{ $product->category->slug }}"
                    class="text-primary hover:text-gold transition-colors">{{ $product->category->name }}</a>
                <i class="fa-solid fa-chevron-right text-gray-300 text-[10px]"></i>
                <span class="text-secondary font-semibold">{{ $product->title }}</span>
            </nav>
        </div>
    </section>
    <section x-data="{
        qty: 1,
        wishlisted: {{ $isWishlisted ? 'true' : 'false' }},
        activeThumb: 0,
        reviewModal: false,
        selectedRating: 0,
        hoverRating: 0,
        reviewForm: { city: '', title: '', review: '' },
        submitting: false,
        activeTab: 'description',
        thumbs: {{ $product->images->pluck('url')->toJson() }},

        toggleWish() {
            fetch(`/wishlist/toggle/{{ $product->id }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                })
                .then(res => {
                    if (res.status === 401) {
                        window.dispatchEvent(new CustomEvent('open-login-modal'));
                        return null;
                    }
                    return res.json();
                })
                .then(data => {
                    if (!data) return;
                    this.wishlisted = data.status === 'added';
                    window.dispatchEvent(new CustomEvent('wishlist-updated', { detail: { count: data.count } }));
                })
                .catch(err => console.error('Wishlist error:', err));
        },

        addToCart(redirectToCheckout = false) {
            fetch(`/cart/add/{{ $product->id }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ quantity: this.qty }),
                })
                .then(res => {
                    if (res.status === 401) {
                        window.dispatchEvent(new CustomEvent('open-login-modal'));
                        return null;
                    }
                    return res.json();
                })
                .then(data => {
                    if (!data) return;
                    window.dispatchEvent(new CustomEvent('cart-updated', { detail: { count: data.count } }));

                    if (redirectToCheckout) {
                        window.location.href = '{{ url('/checkout') }}';
                    }
                })
                .catch(err => console.error('Cart error:', err));
        },

        submitReview() {
            if (this.selectedRating === 0) {
                alert('Please select a rating.');
                return;
            }
            this.submitting = true;
            fetch(`/products/{{ $product->id }}/reviews`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        rating: this.selectedRating,
                        city: this.reviewForm.city,
                        title: this.reviewForm.title,
                        review: this.reviewForm.review,
                    }),
                })
                .then(res => {
                    if (res.status === 401) {
                        this.reviewModal = false;
                        window.dispatchEvent(new CustomEvent('open-login-modal'));
                        this.submitting = false;
                        return null;
                    }
                    return res.json().then(data => ({ status: res.status, body: data }));
                })
                .then(result => {
                    this.submitting = false;
                    if (!result) return;
                    if (result.status === 200 || result.status === 201) {
                        alert(result.body.message);
                        window.location.reload();
                    } else {
                        alert(result.body.message || 'Something went wrong.');
                    }
                })
                .catch(err => {
                    this.submitting = false;
                    console.error('Review error:', err);
                });
        }
    }" class="bg-[#faf5ee]">

        <!-- Back to Products -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 pb-2">
            <a href="#" class="inline-flex items-center gap-2 text-secondary/60 hover:text-primary transition-colors"
                style="font-size:13px;">
                <i class="fa-solid fa-arrow-left text-xs"></i> Back to Products
            </a>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 md:px-0 pb-16 grid grid-cols-1 lg:grid-cols-2 gap-10">

            <!-- ===== LEFT: IMAGE GALLERY ===== -->
            <div>
                <div class="relative rounded-2xl overflow-hidden bg-white" style="height:420px;">
                    <span class="absolute top-4 left-4 z-10 bg-gold text-white font-semibold px-3 py-1 rounded-full"
                        style="font-size:11px;">Popular</span>
                    <button @click="toggleWish()"
                        class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-white/90 flex items-center justify-center hover:bg-gold hover:text-white transition-colors">
                        <i :class="wishlisted ? 'fa-solid text-primary' : 'fa-regular'" class="fa-heart text-sm"></i>
                    </button>
                    <template x-for="(t, i) in thumbs" :key="i">
                        <img :src="t.replace('w=200', 'w=800')" x-show="activeThumb === i"
                            class="absolute inset-0 w-full h-full object-cover">
                    </template>
                </div>

                <!-- Thumbnails -->
                <div class="flex items-center gap-2 mt-4">
                    <button @click="activeThumb = (activeThumb - 1 + thumbs.length) % thumbs.length"
                        class="w-8 h-8 flex-shrink-0 rounded-full border border-gray-200 flex items-center justify-center text-secondary/50 hover:border-primary hover:text-primary transition-colors">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>

                    <div class="flex items-center gap-2 flex-1 overflow-x-auto">
                        <template x-for="(t, i) in thumbs" :key="i">
                            <button @click="activeThumb = i" class="relative flex-shrink-0 rounded-lg overflow-hidden"
                                :class="activeThumb === i ? 'ring-2 ring-primary' : 'ring-1 ring-gray-200'"
                                style="width:60px; height:60px;">
                                <img :src="t" class="w-full h-full object-cover">
                                <span x-show="i === thumbs.length - 1"
                                    class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                    <i class="fa-solid fa-play text-white text-xs"></i>
                                </span>
                            </button>
                        </template>
                    </div>

                    <button @click="activeThumb = (activeThumb + 1) % thumbs.length"
                        class="w-8 h-8 flex-shrink-0 rounded-full border border-gray-200 flex items-center justify-center text-secondary/50 hover:border-primary hover:text-primary transition-colors">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>

            <!-- ===== RIGHT: PRODUCT INFO ===== -->
            <div>

                <!-- Category + SKU -->
                <div class="flex items-center justify-between mb-4">
                    <span class="bg-primary/10 text-primary font-semibold px-3 py-1.5 rounded-full"
                        style="font-size:12px;">{{ $product->category->name }}</span>
                    <div class="flex items-center gap-3">
                        <span class="text-secondary/40" style="font-size:11px;">SKU: {{ $product->sku }}</span>
                        <button class="text-secondary/40 hover:text-primary transition-colors">
                            <i class="fa-solid fa-share-nodes text-sm"></i>
                        </button>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-secondary font-bold mb-3" style="font-size:28px; line-height:1.2;">{{ $product->title }}
                </h1>

                <!-- Rating / Reviews / Stock -->
                <div class="flex items-center gap-3 flex-wrap mb-5">
                    <span class="flex items-center gap-1 bg-green-600 text-white font-semibold px-2.5 py-1 rounded-md"
                        style="font-size:12px;">
                        <i class="fa-solid fa-star text-[10px]"></i> {{ $product->rating }}
                    </span>
                    <span class="text-secondary/60" style="font-size:13px;">{{ $product->reviews_count }} verified
                        reviews</span>
                    <span class="text-secondary/30">•</span>
                    <span class="flex items-center gap-1 text-green-600 font-semibold" style="font-size:13px;">
                        <i class="fa-solid fa-check text-xs"></i> {{ $product->stock }} in stock
                    </span>
                </div>

                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-end gap-3">
                        <span class="text-primary font-bold"
                            style="font-size:32px;">₹{{ number_format($product->sale_price) }}</span>
                        <span class="text-gray-400 line-through mb-1"
                            style="font-size:18px;">₹{{ number_format($product->price) }}</span>
                        <span class="bg-primary text-white font-semibold px-3 py-1 rounded-full mb-1"
                            style="font-size:12px;">{{ $product->discount_percent }}% OFF</span>
                    </div>
                    <p class="text-secondary/50 mt-1" style="font-size:12px;">You Save
                        ₹{{ number_format($product->savings) }} (Inclusive of all taxes)</p>
                </div>

                <hr class="my-5 border-gray-200">

                <!-- Info Grid -->
                <div class="bg-primary/5 rounded-xl p-4 grid grid-cols-2 gap-4 mb-6">
                    @foreach ($product->specs ?? [] as $label => $value)
                        <div class="flex items-start gap-2.5">
                            <i class="fa-solid fa-circle-info text-primary mt-0.5" style="font-size:14px;"></i>
                            <div>
                                <p class="text-secondary/50" style="font-size:11px;">{{ $label }}</p>
                                <p class="text-secondary font-semibold" style="font-size:13px;">{{ $value }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Quantity -->
                <div class="flex items-center gap-4 mb-5">
                    <span class="text-secondary font-semibold" style="font-size:14px;">Quantity:</span>
                    <div class="flex items-center border border-gray-200 rounded-full overflow-hidden bg-white">
                        <button @click="qty = Math.max(1, qty - 1)"
                            class="w-8 h-8 flex items-center justify-center text-secondary hover:text-primary transition-colors">
                            <i class="fa-solid fa-minus text-xs"></i>
                        </button>
                        <span class="w-8 text-center text-secondary font-semibold" style="font-size:14px;"
                            x-text="qty"></span>
                        <button @click="qty = Math.min({{ $product->stock }}, qty + 1)"
                            class="w-8 h-8 flex items-center justify-center text-secondary hover:text-primary transition-colors">
                            <i class="fa-solid fa-plus text-xs"></i>
                        </button>
                    </div>
                    <span class="text-secondary/40" style="font-size:12px;">({{ $product->stock }} available)</span>
                </div>

                <!-- Add to Cart / Buy Now -->
                <div class="flex items-center gap-3 mb-5">
                    <button @click="addToCart(false)"
                        class="flex-1 bg-primary hover:bg-primary/90 text-white font-semibold py-3 rounded-full transition-colors"
                        style="font-size:14px;">Add to cart</button>
                    <button @click="addToCart(true)"
                        class="flex-1 border border-primary text-primary hover:bg-primary/5 font-semibold py-3 rounded-full transition-colors"
                        style="font-size:14px;">Buy Now</button>
                </div>

                <!-- Pincode Check -->
                <div class="flex items-center gap-3 border border-gray-200 rounded-full px-4 py-2.5 bg-white mb-5">
                    <i class="fa-solid fa-location-dot text-primary text-sm"></i>
                    <input type="text" placeholder="Enter pincode to check delivery..."
                        class="flex-1 outline-none text-secondary bg-transparent" style="font-size:13px;">
                    <button class="text-primary font-semibold hover:text-gold transition-colors"
                        style="font-size:13px;">Check</button>
                </div>

                <!-- Trust Badges -->
                <div class="flex items-center gap-5 flex-wrap text-secondary/50" style="font-size:12px;">
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-shield-halved text-primary/60"></i> 100%
                        Authentic Handmade</span>
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-rotate-left text-primary/60"></i> 7-Day
                        Easy Returns</span>
                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-bolt text-primary/60"></i> Fast
                        Dispatch</span>
                </div>

            </div>
        </div>

        <!-- ===== TABS: Description / Product Details / Shipping & Returns ===== -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 pb-16">

            <div class="flex items-stretch border-b border-gray-200 mb-6">
                <button @click="activeTab = 'description'"
                    :class="activeTab === 'description' ? 'text-primary border-primary' :
                        'text-secondary/50 border-transparent hover:text-secondary'"
                    class="flex-1 sm:flex-none text-left sm:text-center px-1 sm:px-6 pb-3 border-b-2 font-semibold transition-colors"
                    style="font-size:14px;">
                    Description
                </button>
                <button @click="activeTab = 'details'"
                    :class="activeTab === 'details' ? 'text-primary border-primary' :
                        'text-secondary/50 border-transparent hover:text-secondary'"
                    class="flex-1 sm:flex-none text-center px-1 sm:px-6 pb-3 border-b-2 font-semibold transition-colors"
                    style="font-size:14px;">
                    Product Details
                </button>
                <button @click="activeTab = 'shipping'"
                    :class="activeTab === 'shipping' ? 'text-primary border-primary' :
                        'text-secondary/50 border-transparent hover:text-secondary'"
                    class="flex-1 sm:flex-none text-right sm:text-center px-1 sm:px-6 pb-3 border-b-2 font-semibold transition-colors"
                    style="font-size:14px;">
                    Shipping & Returns
                </button>
            </div>

            <div x-show="activeTab === 'description'" class="text-secondary/70 space-y-4"
                style="font-size:14px; line-height:1.7;">
                {!! $product->description !!}
            </div>

            <div x-show="activeTab === 'details'" x-cloak class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-3">
                @foreach ($product->specs ?? [] as $label => $value)
                    <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                        <span class="text-secondary/50">{{ $label }}</span>
                        <span class="text-secondary font-semibold">{{ $value }}</span>
                    </div>
                @endforeach
            </div>

            <div x-show="activeTab === 'shipping'" x-cloak class="text-secondary/70"
                style="font-size:14px; line-height:1.7;">
                <div class="space-y-5">
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-truck-fast text-primary mt-1"></i>
                        <div>
                            <p class="text-secondary font-semibold mb-0.5">Dispatch Time</p>
                            <p class="text-secondary/60" style="font-size:13px;">Ships within 3–5 business days, since
                                every piece is hand-packed with care.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-box text-primary mt-1"></i>
                        <div>
                            <p class="text-secondary font-semibold mb-0.5">Delivery Time</p>
                            <p class="text-secondary/60" style="font-size:13px;">5–8 business days across India after
                                dispatch. Enter your pincode above to check exact delivery date.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-shield-halved text-primary mt-1"></i>
                        <div>
                            <p class="text-secondary font-semibold mb-0.5">Secure Packaging</p>
                            <p class="text-secondary/60" style="font-size:13px;">Bubble-wrapped and boxed individually to
                                prevent breakage during transit.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-rotate-left text-primary mt-1"></i>
                        <div>
                            <p class="text-secondary font-semibold mb-0.5">7-Day Easy Returns</p>
                            <p class="text-secondary/60" style="font-size:13px;">Not happy with your order? Request a
                                return within 7 days of delivery for a full refund.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-triangle-exclamation text-primary mt-1"></i>
                        <div>
                            <p class="text-secondary font-semibold mb-0.5">Damaged on Arrival?</p>
                            <p class="text-secondary/60" style="font-size:13px;">Share an unboxing photo/video within 48
                                hours of delivery for a free replacement.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Heading -->
            <div class="flex items-center justify-between mb-6 flex-wrap gap-4">
                <h2 class="text-secondary font-bold" style="font-size:26px;">Reviews</h2>
            </div>

            <button @click="reviewModal = true"
                class="bg-primary hover:bg-primary/90 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors mb-8"
                style="font-size:13px;">
                <i class="fa-solid fa-plus mr-1.5 text-xs"></i> Write a Review
            </button>

            <!-- Customer Reviews Summary -->
            <div class="mb-8">
                <h3 class="text-secondary font-semibold mb-4" style="font-size:15px;">Customer Reviews</h3>

                <div class="flex flex-col sm:flex-row gap-8 sm:gap-12">

                    <!-- Average score -->
                    <div class="flex-shrink-0 text-center sm:text-left">
                        <p class="text-secondary font-bold" style="font-size:44px; line-height:1;">{{ $product->rating }}
                        </p>
                        <div class="flex items-center justify-center sm:justify-start gap-0.5 my-1.5">
                            @for ($i = 1; $i <= 5; $i++)
                                <i
                                    class="fa-{{ $i <= floor($product->rating) ? 'solid' : 'regular' }} fa-star text-gold text-sm"></i>
                            @endfor
                        </div>
                        <p class="text-secondary/50" style="font-size:12px;">Based on {{ $product->reviews_count }}
                            reviews</p>
                    </div>

                    <!-- Bar breakdown -->
                    <div class="flex-1 flex flex-col gap-2 max-w-md">
                        @foreach ($ratingBreakdown as $star => $percent)
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-0.5 flex-shrink-0">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i
                                            class="fa-{{ $i <= $star ? 'solid' : 'regular' }} fa-star text-gold text-[10px]"></i>
                                    @endfor
                                </div>
                                <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-gold rounded-full" style="width:{{ $percent }}%;"></div>
                                </div>
                                <span class="text-secondary/50 w-8 text-right flex-shrink-0"
                                    style="font-size:11px;">{{ $percent }}%</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Review Cards -->
            <div class="flex flex-col">
                @forelse($reviews as $review)
                    @php
                        $colors = ['#C2255C', '#8B2635', '#E4657A', '#D4943A', '#5B7C99'];
                        $bgColor = $colors[$review->user_id % count($colors)];
                    @endphp
                    <div class="flex items-start gap-3 py-5 border-t border-gray-200">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0"
                            style="background:{{ $bgColor }}; font-size:12px;">{{ $review->initials }}</div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-3 flex-wrap">
                                <div>
                                    <p class="text-secondary font-semibold" style="font-size:13px;">
                                        {{ $review->user->name }}</p>
                                    @if ($review->city)
                                        <p class="text-secondary/40" style="font-size:11px;">{{ $review->city }}</p>
                                    @endif
                                </div>
                                <span class="text-secondary/40"
                                    style="font-size:11px;">{{ $review->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="flex items-center gap-0.5 my-1.5">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i
                                        class="fa-{{ $i <= $review->rating ? 'solid' : 'regular' }} fa-star text-gold text-xs"></i>
                                @endfor
                            </div>
                            @if ($review->title)
                                <p class="text-secondary font-semibold mb-0.5" style="font-size:13px;">
                                    {{ $review->title }}</p>
                            @endif
                            <p class="text-secondary/60" style="font-size:13px; line-height:1.6;">{{ $review->review }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="py-10 text-center">
                        <p class="text-secondary/50" style="font-size:14px;">No reviews yet. Be the first to review this
                            product!</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- ===== WRITE A REVIEW — POPUP MODAL ===== -->
        <div x-show="reviewModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">

            <!-- Backdrop -->
            <div x-show="reviewModal" x-transition.opacity @click="reviewModal = false"
                class="absolute inset-0 bg-black/50"></div>

            <!-- Modal Card -->
            <div x-show="reviewModal" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" @click.outside="reviewModal = false"
                class="relative bg-white rounded-2xl w-full max-w-md p-6 shadow-xl">

                <!-- Close -->
                <button @click="reviewModal = false"
                    class="absolute top-4 right-4 w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-secondary transition-colors">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>

                <h3 class="text-secondary font-bold mb-1" style="font-size:19px;">Write a Review</h3>
                <p class="text-secondary/50 mb-5" style="font-size:13px;">Share your experience with this product.</p>

                <form @submit.prevent="submitReview()">

                    <!-- Star Rating Picker -->
                    <div class="mb-4">
                        <label class="text-secondary font-semibold block mb-2" style="font-size:13px;">Your Rating</label>
                        <div class="flex items-center gap-1.5">
                            <template x-for="i in 5" :key="i">
                                <button type="button" @click="selectedRating = i" @mouseenter="hoverRating = i"
                                    @mouseleave="hoverRating = 0">
                                    <i :class="(hoverRating || selectedRating) >= i ? 'fa-solid' : 'fa-regular'"
                                        class="fa-star text-gold text-xl transition-transform hover:scale-110"></i>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="mb-4">
                        <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">City</label>
                        <input type="text" x-model="reviewForm.city" placeholder="e.g. Jaipur"
                            class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary"
                            style="font-size:13px;">
                    </div>

                    <!-- Review Title -->
                    <div class="mb-4">
                        <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Review
                            Title</label>
                        <input type="text" x-model="reviewForm.title" placeholder="Sum up your experience"
                            class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary"
                            style="font-size:13px;">
                    </div>

                    <!-- Review Text -->
                    <div class="mb-5">
                        <label class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Your
                            Review</label>
                        <textarea rows="4" required x-model="reviewForm.review"
                            placeholder="Tell others what you liked or didn't like..."
                            class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary resize-none"
                            style="font-size:13px;"></textarea>
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="button" @click="reviewModal = false"
                            class="flex-1 border border-gray-200 text-secondary font-semibold py-2.5 rounded-full hover:bg-gray-50 transition-colors"
                            style="font-size:13px;">Cancel</button>
                        <button type="submit" :disabled="submitting"
                            class="flex-1 bg-primary hover:bg-primary/90 text-white font-semibold py-2.5 rounded-full transition-colors disabled:opacity-50"
                            style="font-size:13px;">
                            <span x-show="!submitting">Submit Review</span>
                            <span x-show="submitting">Submitting...</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </section>

    <section class="bg-[#faf5ee] ">
        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Heading -->
            <p class="text-primary font-semibold mb-1" style="font-size:13px;">Handpicked</p>
            <h2 class="text-secondary font-bold mb-6" style="font-size:26px;">You may also like</h2>

            <!-- Swiper -->
            <div class="related-swiper overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($relatedProducts as $rp)
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                                <div class="relative h-44 md:h-56 overflow-hidden group">
                                    @if ($rp->badge)
                                        <span
                                            class="absolute top-3 left-3 z-10 bg-primary text-white font-semibold px-2.5 py-1 rounded"
                                            style="font-size:11px;">{{ $rp->badge }}</span>
                                    @endif
                                    <a href="{{ route('product.detail', $rp->slug) }}">
                                        <img src="{{ $rp->thumbnail }}" alt="{{ $rp->title }}"
                                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </a>
                                </div>
                                <div class="p-4">
                                    <p class="text-gold font-semibold uppercase tracking-wide mb-1"
                                        style="font-size:11px;">{{ $rp->category->name }}</p>
                                    <a href="{{ route('product.detail', $rp->slug) }}">
                                        <h3 class="text-secondary font-semibold mb-1.5 hover:text-primary transition-colors"
                                            style="font-size:14px;">{{ $rp->title }}</h3>
                                    </a>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="text-primary font-bold"
                                            style="font-size:16px;">₹{{ number_format($rp->sale_price) }}</span>
                                        <span class="text-gray-400 line-through"
                                            style="font-size:13px;">₹{{ number_format($rp->price) }}</span>
                                        <span class="text-green-600 font-semibold"
                                            style="font-size:11px;">{{ $rp->discount_percent }}% off</span>
                                    </div>
                                    <button onclick="addToCart({{ $rp->id }}, this)"
                                        class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-2.5 rounded-full transition-colors"
                                        style="font-size:13px;">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>


    <!-- footer  -->
@endsection
