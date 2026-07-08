<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pink City</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Nunito+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style type="text/tailwindcss">
        @theme {
            --color-primary: #8B2635;
            --color-secondary: #1C1208;
            --color-gold: #D4943A;
            --font-playfair: "Playfair Display", serif;
            --font-nunito: "Nunito Sans", sans-serif;
        }
    </style>

</head>

<body x-data="{
    sticky: false,
    mobileOpen: false,
    modal: '{{ session('open_modal', 'login') }}',
    modalOpen: {{ session('open_modal') || $errors->any() ? 'true' : 'false' }},
    searchOpen: false,
    wishlistCount: {{ $wishlistCount ?? 0 }},
    cartCount: {{ $cartCount ?? 0 }},
    acc: { weddingProps: false, homeDecor: false, textiles: false, figurines: false, lamps: false, pottery: false, jewellery: false, festive: false }
}" @open-login-modal.window="modal = 'login'; modalOpen = true"
    @wishlist-updated.window="wishlistCount = $event.detail.count"
    @cart-updated.window="cartCount = $event.detail.count">

    <header id="mainHeader" x-init="window.addEventListener('scroll', () => { sticky = window.scrollY > 10 });
    $watch('modalOpen', val => {
        document.body.style.overflow = (val || mobileOpen || searchOpen) ? 'hidden' : '';
    });
    $watch('mobileOpen', val => {
        document.body.style.overflow = (val || searchOpen || modalOpen) ? 'hidden' : '';
    });
    $watch('searchOpen', val => {
        document.body.style.overflow = (val || mobileOpen || modalOpen) ? 'hidden' : '';
    });"
        :class="sticky ? 'fixed top-0 left-0 w-full z-50 shadow-lg' : 'relative w-full z-50'"
        class="transition-shadow duration-300">

        <!-- 1. Announcement Bar -->
        <div class="bg-primary overflow-hidden py-2">
            <div class="marquee-track flex items-center gap-20 whitespace-nowrap">

                <span class="flex items-center gap-2 text-sm text-white/90 flex-shrink-0">
                    <i class="fa-solid fa-tag text-gold"></i>
                    <strong class="text-gold">Grand Shaadi Utsav Sale</strong> — Up to <strong
                        class="text-gold mx-1">60% OFF</strong> + Free Shipping on orders above <strong
                        class="text-gold mx-1">₹999</strong> — Handcrafted Décor Straight from <strong
                        class="text-gold mx-1">Jaipur's Master Artisans</strong>
                    <i class="fa-solid fa-truck-fast text-gold mx-2"></i>
                    <a href="#" class="underline text-white hover:text-gold font-semibold transition-colors">Shop
                        Now →</a>
                </span>

                <!-- Duplicate for seamless loop -->
                <span class="flex items-center gap-2 text-sm text-white/90 flex-shrink-0">
                    <i class="fa-solid fa-tag text-gold"></i>
                    <strong class="text-gold">Grand Shaadi Utsav Sale</strong> — Up to <strong
                        class="text-gold mx-1">60% OFF</strong> + Free Shipping on orders above <strong
                        class="text-gold mx-1">₹999</strong> — Handcrafted Décor Straight from <strong
                        class="text-gold mx-1">Jaipur's Master Artisans</strong>
                    <i class="fa-solid fa-truck-fast text-gold mx-2"></i>
                    <a href="#" class="underline text-white hover:text-gold font-semibold transition-colors">Shop
                        Now →</a>
                </span>

            </div>
        </div>

        <!-- 2. Middle Bar -->
        <div class="bg-[#faf5ee] border-b border-gray-200">
            <div class="max-w-8xl mx-auto px-2 md:px-4 py-1 md:py-3 flex items-center gap-2 md:gap-4">

                <!-- Mobile: Hamburger -->
                <button @click="mobileOpen = !mobileOpen; searchOpen = false"
                    class="flex sm:hidden text-secondary p-1 flex-shrink-0" aria-label="Toggle menu">
                    <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-1 md:gap-3">
                    <img src="{{ url('assets/images/logo.png') }}" alt="Pink City Logo"
                        class="h-10 md:h-12 w-10 md:w-12  rounded-full object-cover">
                    <div class="flex flex-col leading-tight">
                        <span class="font-[400] text-primary text-[14px] md:text-[20px] tracking-wide">Pink City</span>
                        <span class="text-[8px] md:text-[16px] text-secondary/70 tracking-wide">Handicraft & Wedding
                            Props</span>
                    </div>
                </a>

                <!-- Desktop Search -->
                <div x-data="{
                    query: '{{ request('search') }}',
                    suggestions: [],
                    showDropdown: false,
                    loading: false,
                    searchTimeout: null,
                    fetchSuggestions() {
                        clearTimeout(this.searchTimeout);
                        if (this.query.length < 2) {
                            this.suggestions = [];
                            this.showDropdown = false;
                            return;
                        }
                        this.searchTimeout = setTimeout(() => {
                            this.loading = true;
                            fetch(`{{ route('products.search-suggestions') }}?q=${encodeURIComponent(this.query)}`)
                                .then(res => res.json())
                                .then(data => {
                                    this.suggestions = data;
                                    this.showDropdown = data.length > 0;
                                    this.loading = false;
                                })
                                .catch(() => { this.loading = false; });
                        }, 300);
                    }
                }" class="hidden sm:flex flex-1 max-w-xl mx-auto relative">

                    <form action="{{ url('/products') }}" method="GET"
                        class="flex items-center border border-[#C99F9F] rounded-full overflow-hidden bg-[#FFF2E5] w-full">
                        <input type="text" name="search" x-model="query" @input="fetchSuggestions()"
                            @focus="showDropdown = suggestions.length > 0" @click.outside="showDropdown = false"
                            placeholder="Search for wedding props, handicrafts, home décor…" autocomplete="off"
                            class="rounded-full flex-1 px-4 py-2 text-sm text-secondary placeholder-gray-400 outline-none bg-transparent" />
                        <button type="submit"
                            class="bg-primary hover:bg-primary/90 px-5 py-2.5 transition-colors flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
                            </svg>
                        </button>
                    </form>

                    <!-- Suggestions Dropdown -->
                    <div x-show="showDropdown" x-cloak x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50 max-h-96 overflow-y-auto">

                        <template x-for="item in suggestions" :key="item.url">
                            <a :href="item.url"
                                class="flex items-center gap-3 px-4 py-2.5 hover:bg-[#faf5ee] transition-colors border-b border-gray-50 last:border-0">
                                <img :src="item.image" class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                                <div class="min-w-0 flex-1">
                                    <p class="text-secondary font-semibold truncate" style="font-size:13px;"
                                        x-text="item.title"></p>
                                    <p class="text-secondary/40" style="font-size:11px;" x-text="item.category"></p>
                                </div>
                                <span class="text-primary font-bold flex-shrink-0" style="font-size:13px;"
                                    x-text="'₹' + item.price"></span>
                            </a>
                        </template>

                        <a :href="`{{ url('/products') }}?search=${encodeURIComponent(query)}`"
                            class="block text-center py-2.5 bg-[#faf5ee] text-primary font-semibold hover:bg-primary/10 transition-colors"
                            style="font-size:12px;">
                            See all results for "<span x-text="query"></span>"
                        </a>
                    </div>
                </div>
                <!-- Desktop Actions -->
                <div class="hidden sm:flex items-center gap-5 flex-shrink-0">
                    @guest
                        <a href="#" @click.prevent="modal = 'login'; modalOpen = true"
                            class="flex flex-col items-center text-secondary hover:text-primary transition-colors group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mb-0.5 group-hover:scale-110 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z" />
                            </svg>
                            <span class="text-xs">My Account</span>
                        </a>
                    @else
                        <div x-data="{ userMenu: false }" class="relative">
                            <button @click="userMenu = !userMenu" @click.outside="userMenu = false"
                                class="flex flex-col items-center text-secondary hover:text-primary transition-colors group">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mb-0.5 group-hover:scale-110 transition-transform" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z" />
                                </svg>
                                <span class="text-xs">{{ Str::limit(Auth::user()->name, 10) }}</span>
                            </button>

                            <div x-show="userMenu" x-cloak x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="absolute right-0 top-full mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-100 py-2 z-50">
                                <a href="{{ url('profile') }}"
                                    class="block px-4 py-2 text-sm text-secondary hover:bg-gray-50">My
                                    Profile</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">
                                        <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                    @guest
                        <a href="#" @click.prevent="modal = 'login'; modalOpen = true"
                            class="flex flex-col items-center text-secondary hover:text-primary transition-colors group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mb-0.5 group-hover:scale-110 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 0 1 6.364 0L12 7.636l1.318-1.318a4.5 4.5 0 0 1 6.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 0 1 0-6.364z" />
                            </svg>
                            <span class="text-xs">Wishlist</span>
                        </a>
                    @else
                        <a href="{{ route('wishlist') }}"
                            class="relative flex flex-col items-center text-secondary hover:text-primary transition-colors group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mb-0.5 group-hover:scale-110 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 0 1 6.364 0L12 7.636l1.318-1.318a4.5 4.5 0 0 1 6.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 0 1 0-6.364z" />
                            </svg>
                            <span class="text-xs">Wishlist</span>
                            <span x-show="wishlistCount > 0" x-cloak x-text="wishlistCount"
                                class="absolute -top-1 -right-2 bg-gold text-white text-[9px] rounded-full w-4 h-4 flex items-center justify-center"></span>
                        </a>
                    @endguest
                    @guest
                        <a href="#" @click.prevent="modal = 'login'; modalOpen = true"
                            class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white text-sm font-medium px-4 py-2 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6h13M10 19a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg>
                            Cart
                        </a>
                    @else
                        <a href="{{ route('cart') }}"
                            class="relative flex items-center gap-2 bg-primary hover:bg-primary/90 text-white text-sm font-medium px-4 py-2 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6h13M10 19a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg>
                            Cart
                            <span x-show="cartCount > 0" x-cloak x-text="cartCount"
                                class="absolute -top-1.5 -right-1.5 bg-gold text-white text-[10px] rounded-full w-4 h-4 flex items-center justify-center"></span>
                        </a>
                    @endguest
                </div>

                <!-- Mobile: Search + Wishlist + Cart (RIGHT SIDE) -->
                <div class="flex sm:hidden items-center gap-3 ml-auto flex-shrink-0">

                    <!-- Search Popup Trigger -->
                    <button @click="searchOpen = !searchOpen; mobileOpen = false" class="text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
                        </svg>
                    </button>

                    <!-- Wishlist -->
                    @guest
                        <a href="#" @click.prevent="modal = 'login'; modalOpen = true"
                            class="relative text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 0 1 6.364 0L12 7.636l1.318-1.318a4.5 4.5 0 0 1 6.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 0 1 0-6.364z" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('wishlist') }}" class="relative text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 0 1 6.364 0L12 7.636l1.318-1.318a4.5 4.5 0 0 1 6.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 0 1 0-6.364z" />
                            </svg>
                            <span x-show="wishlistCount > 0" x-cloak x-text="wishlistCount"
                                class="absolute -top-2 -right-2 bg-gold text-white text-[9px] rounded-full w-4 h-4 flex items-center justify-center"></span>
                        </a>
                    @endguest
                    <!-- Cart -->
                    @guest
                        <a href="#" @click.prevent="modal = 'login'; modalOpen = true" class="relative">
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6h13M10 19a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('cart') }}" class="relative">
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6h13M10 19a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </div>
                            <span x-show="cartCount > 0" x-cloak x-text="cartCount"
                                class="absolute -top-1 -right-1 bg-gold text-white text-[10px] rounded-full w-4 h-4 flex items-center justify-center"></span>
                        </a>
                    @endguest
                </div>

            </div>

            <!-- ============================================================
     Mobile Search Popup
     ============================================================ -->
       <div x-show="searchOpen" x-cloak x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
    class="sm:hidden px-4 pb-3"
    x-data="{
        query: '',
        suggestions: [],
        showDropdown: false,
        loading: false,
        searchTimeout: null,
        fetchSuggestions() {
            clearTimeout(this.searchTimeout);
            if (this.query.length < 2) {
                this.suggestions = [];
                this.showDropdown = false;
                return;
            }
            this.searchTimeout = setTimeout(() => {
                fetch(`{{ route('products.search-suggestions') }}?q=${encodeURIComponent(this.query)}`)
                    .then(res => res.json())
                    .then(data => {
                        this.suggestions = data;
                        this.showDropdown = data.length > 0;
                    });
            }, 300);
        }
    }">

    <div class="flex items-center gap-2">
        <form action="{{ url('/products') }}" method="GET"
            class="flex-1 flex items-center border border-[#C99F9F] rounded-full overflow-hidden bg-[#FFF2E5]">
            <input type="text" name="search" x-model="query" @input="fetchSuggestions()"
                placeholder="Search for wedding props…" x-ref="searchInput" autocomplete="off"
                class="flex-1 px-4 py-2.5 text-sm text-secondary placeholder-gray-400 outline-none bg-transparent" />
            <button type="submit" class="bg-primary px-4 py-2.5 flex-shrink-0 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
                </svg>
            </button>
        </form>

        <button type="button" @click="searchOpen = false"
            class="flex-shrink-0 w-9 h-9 rounded-full bg-white border border-gray-200 flex items-center justify-center text-secondary hover:text-primary hover:border-primary transition-colors"
            aria-label="Close search">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Suggestions Dropdown -->
    <div x-show="showDropdown" x-cloak
        class="mt-2 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden max-h-80 overflow-y-auto">
        <template x-for="item in suggestions" :key="item.url">
            <a :href="item.url" class="flex items-center gap-3 px-4 py-2.5 hover:bg-[#faf5ee] transition-colors border-b border-gray-50 last:border-0">
                <img :src="item.image" class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                <div class="min-w-0 flex-1">
                    <p class="text-secondary font-semibold truncate" style="font-size:13px;" x-text="item.title"></p>
                    <p class="text-secondary/40" style="font-size:11px;" x-text="item.category"></p>
                </div>
                <span class="text-primary font-bold flex-shrink-0" style="font-size:13px;" x-text="'₹' + item.price"></span>
            </a>
        </template>
    </div>
</div>

        </div>



        <!-- 3. Desktop Nav -->
        <nav class="hidden lg:block bg-secondary relative z-40">
            <div class="max-w-7xl mx-auto px-4">
                <ul class="flex items-center">

                    <!-- Wedding Props — MEGA MENU (sirf yahi ek) -->
                    <li class="relative group">
                        <a href="#"
                            class="flex items-center gap-1.5 px-4 py-3 text-sm font-semibold bg-primary text-white">
                            Wedding Props
                            <i
                                class="fa-solid fa-chevron-down text-[9px] opacity-70 group-hover:rotate-180 transition-transform"></i>
                        </a>

                        <!-- Mega Menu Panel -->
                        <div
                            class="absolute hidden group-hover:block left-0 top-full w-[920px] max-w-[92vw] bg-white shadow-2xl border-t-4 border-primary rounded-b-xl z-50">
                            <div class="flex">

                                <!-- Left: category groups -->
                                <div class="flex-1 grid grid-cols-3 gap-6 p-6">

                                    @foreach ($headerCategories->chunk(ceil($headerCategories->count() / 3)) as $column)
                                        <div>

                                            @foreach ($column as $category)
                                                <div class="mb-6">

                                                    <p class="flex items-center gap-2 text-primary font-semibold uppercase tracking-wide mb-3"
                                                        style="font-size:12px;">
                                                        <i class="fa-solid fa-box"></i>
                                                        {{ $category->name }}
                                                    </p>

                                                    <ul class="flex flex-col gap-2.5">

                                                        @foreach ($category->products as $product)
                                                            <li>
                                                                <a href="{{ url('product/' . $product->slug) }}"
                                                                    class="text-secondary/70 hover:text-primary transition-colors"
                                                                    style="font-size:13px;">
                                                                    {{ $product->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                        <li>
                                                            <a href="{{ url('products?category=' . $category->slug) }}"
                                                                class="text-primary font-semibold hover:text-gold transition-colors"
                                                                style="font-size:13px;">
                                                                View All →
                                                            </a>
                                                        </li>

                                                    </ul>

                                                </div>
                                            @endforeach

                                        </div>
                                    @endforeach

                                </div>

                                <!-- Right: promo banner -->
                                <a href="#" class="relative w-[260px] flex-shrink-0 overflow-hidden group/img">
                                    <img src="https://images.unsplash.com/photo-1610701596007-11502861dcfa?w=400&q=75"
                                        alt="Wedding Props Sale"
                                        class="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500">
                                    <span
                                        class="absolute inset-0 bg-gradient-to-t from-secondary/80 via-secondary/10 to-transparent flex flex-col justify-end p-4">
                                        <span class="text-gold font-semibold" style="font-size:11px;">Shaadi Utsav
                                            Sale</span>
                                        <span class="text-white font-bold" style="font-size:16px; line-height:1.2;">Up
                                            to 60% OFF</span>
                                        <span class="text-white/80 underline mt-1" style="font-size:11px;">Shop Now
                                            →</span>
                                    </span>
                                </a>

                            </div>
                        </div>
                    </li>

                    <li><a href="{{ url('about') }}"
                            class="block px-4 py-3 text-sm text-white/80 hover:text-white hover:bg-primary/40 transition-colors">About
                            Us</a></li>
                    <li><a href="{{ url('products') }}"
                            class="block px-4 py-3 text-sm text-white/80 hover:text-white hover:bg-primary/40 transition-colors">All
                            Products
                        </a></li>

                    <li><a href="{{ url('blog') }}"
                            class="block px-4 py-3 text-sm text-white/80 hover:text-white hover:bg-primary/40 transition-colors">Blog</a>
                    </li>
                    <li><a href="{{ url('contact') }}"
                            class="block px-4 py-3 text-sm text-white/80 hover:text-white hover:bg-primary/40 transition-colors">Contact
                            Us</a></li>

                </ul>
            </div>
        </nav>

        <!-- 4. Mobile Menu (sirf Wedding Props accordion hai, baaki plain links) -->
        <div x-show="mobileOpen" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="lg:hidden bg-primary max-h-[75vh] overflow-y-auto">

            <!-- Mobile quick links -->
            <div class="flex items-center gap-3 px-4 py-3 border-b border-white/20">
                <a href="#"
                    class="flex items-center gap-1.5 text-white/90 text-sm hover:text-gold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z" />
                    </svg>
                    My Account
                </a>
                <span class="text-white/30">|</span>
                @guest
                    <a href="#" @click.prevent="modal = 'login'; modalOpen = true; mobileOpen = false"
                        class="flex items-center gap-1.5 text-white/90 text-sm hover:text-gold transition-colors">
                        <svg ...>...</svg>
                        Wishlist
                    </a>
                @else
                    <a href="{{ route('wishlist') }}"
                        class="flex items-center gap-1.5 text-white/90 text-sm hover:text-gold transition-colors">
                        <svg ...>...</svg>
                        <span>Wishlist <template x-if="wishlistCount > 0"><span
                                    x-text="'(' + wishlistCount + ')'"></span></template></span>
                    </a>
                @endguest
            </div>

            <!-- Wedding Props — accordion (sirf yahi ek) -->
            <div class="border-b border-white/10">
                <button @click="acc.weddingProps = !acc.weddingProps"
                    class="w-full flex items-center justify-between px-4 py-3.5 text-sm font-medium text-white hover:bg-white/10 transition-colors">
                    Wedding Props
                    <i class="fa-solid fa-chevron-down text-xs transition-transform"
                        :class="acc.weddingProps ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="acc.weddingProps" x-collapse class="bg-primary/90">

                    @foreach ($headerCategories as $category)
                        <div class="py-2">

                            <div class="px-6 text-gold font-semibold">
                                {{ $category->name }}
                            </div>

                            @foreach ($category->products as $product)
                                <a href="{{ url('product/' . $product->slug) }}"
                                    class="block px-8 py-2 text-sm text-white/80 hover:text-gold">
                                    {{ $product->title }}
                                </a>
                            @endforeach

                        </div>
                    @endforeach

                </div>
            </div>





            <div class="border-b border-white/10">
                <a href="{{ url('about') }}"
                    class="block px-4 py-3.5 text-sm font-medium text-white hover:bg-white/10 transition-colors">About
                    Us</a>
            </div>
            <div class="border-b border-white/10">
                <a href="{{ url('products') }}"
                    class="block px-4 py-3.5 text-sm font-medium text-white hover:bg-white/10 transition-colors">All
                    Products
                </a>
            </div>
            <div class="border-b border-white/10">
                <a href="{{ url('blog') }}"
                    class="block px-4 py-3.5 text-sm font-medium text-white hover:bg-white/10 transition-colors">Blog</a>
            </div>
            <div class="border-b border-white/10">
                <a href="{{ url('contact') }}"
                    class="block px-4 py-3.5 text-sm font-medium text-white hover:bg-white/10 transition-colors">Contact
                    Us</a>
            </div>

        </div>
    </header>
