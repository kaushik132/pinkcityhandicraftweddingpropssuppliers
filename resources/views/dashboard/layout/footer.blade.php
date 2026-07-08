@if (session('success'))
    <div class="fixed top-20 right-4 z-[1000] bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg text-sm">
        {{ session('success') }}
    </div>
@endif
<!-- header x-data mein ye add karo: modal: 'login', modalOpen: false -->
<div x-show="modalOpen" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-[999] flex items-center justify-center px-4"
    style="background:rgba(28,18,8,0.65); backdrop-filter:blur(4px);" @click.self="modalOpen = false">
    <div x-transition:enter="transition ease-out duration-250" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl overflow-hidden w-full max-w-[780px] flex shadow-2xl relative"
        style="min-height:480px;">
        <!-- Close Button -->
        <button @click="modalOpen = false"
            class="absolute top-4 right-4 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-secondary transition-colors">
            <i class="fa-solid fa-xmark text-sm"></i>
        </button>

        <!-- Left Panel (Illustration) -->
        <div class="hidden md:flex w-[45%] bg-[#faf5ee] flex-col items-center justify-center p-8 relative">
            <div class="text-center mb-6">
                <!-- LOGIN LEFT -->
                <div x-show="modal === 'login'">
                    <h3 class="font-playfair text-primary mb-2" style="font-size:26px; font-weight:400;">Grand
                        Shaadi<br>Utsav Sale</h3>
                    <p class="text-secondary/70" style="font-size:13px;">Up to 60% OFF on Wedding Props, Décor<br>&
                        Handcrafted Collections.</p>
                </div>
                <!-- SIGNUP LEFT -->
                <div x-show="modal === 'signup'" x-cloak>
                    <h3 class="font-playfair text-primary mb-2" style="font-size:26px; font-weight:400;">Start Your
                        Shopping<br>Journey</h3>
                    <p class="text-secondary/70" style="font-size:13px;">Create an account and unlock exclusive
                        offers,<br>wishlist, and seamless checkout.</p>
                </div>
                <!-- FORGOT LEFT -->
                <div x-show="modal === 'forgot'" x-cloak>
                    <h3 class="font-playfair text-primary mb-2" style="font-size:26px; font-weight:400;">Reset
                        Your<br>Password</h3>
                    <p class="text-secondary/70" style="font-size:13px;">We'll send you a link to reset<br>your
                        password.</p>
                </div>
            </div>

            <!-- Illustration image -->
            <img src="{{url('assets/images/033add065dcd248767c3f78f919ba8c5516410fd (1).png')}}" alt="Pink City"
                class="w-full h-auto object-contain" onerror="this.style.display='none'">
        </div>

        <!-- Right Panel (Forms) -->
        <div class="flex-1 p-8 flex flex-col justify-center">

            <!-- ===== LOGIN FORM ===== -->
            <div x-show="modal === 'login'">
                <p class="text-secondary/50 mb-1" style="font-size:13px;">Welcome back! <i
                        class="fa-solid fa-star text-gold"></i></p>
                <h2 class="font-playfair text-secondary mb-1" style="font-size:24px; font-weight:500;">Login</h2>
                <p class="text-secondary/50 mb-6" style="font-size:13px;">Please login to continue shopping and explore
                    amazing products.</p>

                @if ($errors->login->any())
                    <div class="mb-4 text-red-600" style="font-size:12px;">
                        @foreach ($errors->login->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-secondary font-semibold mb-1.5" style="font-size:13px;">Email or
                                Mobile Number</label>
                            <input type="text" name="login" value="{{ old('login') }}"
                                placeholder="Enter email or mobile number"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2.5 outline-none focus:border-primary transition-colors bg-gray-50"
                                style="font-size:14px;">
                        </div>
                        <div x-data="{ show: false }">
                            <label class="block text-secondary font-semibold mb-1.5"
                                style="font-size:13px;">Password</label>
                            <div class="relative">
                                <input :type="show ? 'text' : 'password'" name="password"
                                    placeholder="Enter your password"
                                    class="w-full border border-gray-200 rounded-lg px-4 py-2.5 outline-none focus:border-primary transition-colors bg-gray-50 pr-10"
                                    style="font-size:14px;">
                                <button type="button" @click="show = !show"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-secondary">
                                    <i class="fa-regular fa-eye text-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" @click="modal = 'forgot'"
                                class="text-primary hover:text-gold transition-colors" style="font-size:13px;">Forgot
                                Password?</button>
                        </div>
                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 rounded-lg transition-colors"
                            style="font-size:14px;">Login</button>
                    </div>
                </form>

                <div class="flex items-center gap-3 my-4">
                    <div class="flex-1 h-px bg-gray-200"></div>
                    <span class="text-gray-400" style="font-size:13px;">Or</span>
                    <div class="flex-1 h-px bg-gray-200"></div>
                </div>

                <button
                    class="w-full border border-gray-200 hover:border-gray-300 text-secondary font-semibold py-2.5 rounded-lg flex items-center justify-center gap-2 transition-colors"
                    style="font-size:14px;">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5"> Continue with
                    Google
                </button>

                <p class="text-center text-secondary/50 mt-4" style="font-size:13px;">
                    Don't have an account?
                    <button @click="modal = 'signup'"
                        class="text-primary font-semibold hover:text-gold transition-colors">Sign Up</button>
                </p>
            </div>

            <!-- ===== SIGNUP FORM ===== -->
            <div x-show="modal === 'signup'" x-cloak>
                <h2 class="font-playfair text-secondary mb-1" style="font-size:24px; font-weight:500;">Create Account
                </h2>
                <p class="text-secondary/50 mb-6" style="font-size:13px;">Join Pink City and discover handcrafted
                    treasures.</p>

                @if ($errors->signup->any())
                    <div class="mb-4 text-red-600" style="font-size:12px;">
                        @foreach ($errors->signup->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-secondary font-semibold mb-1.5" style="font-size:13px;">Full
                                    Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Enter your name"
                                    class="w-full border border-gray-200 rounded-lg px-4 py-2.5 outline-none focus:border-primary transition-colors bg-gray-50"
                                    style="font-size:14px;">
                            </div>
                            <div>
                                <label class="block text-secondary font-semibold mb-1.5" style="font-size:13px;">Email
                                    Address</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter your email"
                                    class="w-full border border-gray-200 rounded-lg px-4 py-2.5 outline-none focus:border-primary transition-colors bg-gray-50"
                                    style="font-size:14px;">
                            </div>
                        </div>
                        <div>
                            <label class="block text-secondary font-semibold mb-1.5" style="font-size:13px;">Mobile
                                Number</label>
                            <input type="tel" name="mobile_number" value="{{ old('mobile_number') }}"
                                placeholder="Enter your mobile number"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2.5 outline-none focus:border-primary transition-colors bg-gray-50"
                                style="font-size:14px;">
                        </div>
                        <div>
                            <label class="block text-secondary font-semibold mb-1.5"
                                style="font-size:13px;">Password</label>
                            <input type="password" name="password" placeholder="Create a password"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2.5 outline-none focus:border-primary transition-colors bg-gray-50"
                                style="font-size:14px;">
                        </div>
                        <div class="flex items-start gap-2">
                            <input type="checkbox" id="terms" name="terms_accepted" value="1"
                                class="mt-1 accent-primary flex-shrink-0">
                            <label for="terms" class="text-secondary/60" style="font-size:12px;">I agree to the <a
                                    href="#" class="text-primary underline">Terms & Conditions</a> and <a
                                    href="#" class="text-primary underline">Privacy Policy</a></label>
                        </div>
                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 rounded-lg transition-colors"
                            style="font-size:14px;">Create Account</button>
                    </div>
                </form>

                <div class="flex items-center gap-3 my-4">
                    <div class="flex-1 h-px bg-gray-200"></div>
                    <span class="text-gray-400" style="font-size:13px;">Or</span>
                    <div class="flex-1 h-px bg-gray-200"></div>
                </div>

                <button
                    class="w-full border border-gray-200 hover:border-gray-300 text-secondary font-semibold py-2.5 rounded-lg flex items-center justify-center gap-2 transition-colors"
                    style="font-size:14px;">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5"> Continue with
                    Google
                </button>

                <p class="text-center text-secondary/50 mt-4" style="font-size:13px;">
                    Already have an account?
                    <button @click="modal = 'login'"
                        class="text-primary font-semibold hover:text-gold transition-colors">Login</button>
                </p>
            </div>

            <!-- ===== FORGOT PASSWORD FORM ===== -->
            <div x-show="modal === 'forgot'" x-cloak>
                <h2 class="font-playfair text-secondary mb-1" style="font-size:24px; font-weight:500;">Forgot
                    Password?</h2>
                <p class="text-secondary/50 mb-6" style="font-size:13px;">Enter your email and we'll send you a reset
                    link.</p>

                @if ($errors->forgot->any())
                    <div class="mb-4 text-red-600" style="font-size:12px;">
                        @foreach ($errors->forgot->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-4 text-green-600" style="font-size:12px;">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-secondary font-semibold mb-1.5" style="font-size:13px;">Email
                                Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="Enter your email"
                                class="w-full border border-gray-200 rounded-lg px-4 py-2.5 outline-none focus:border-primary transition-colors bg-gray-50"
                                style="font-size:14px;">
                        </div>
                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 rounded-lg transition-colors"
                            style="font-size:14px;">Send Reset Link</button>
                    </div>
                </form>

                <p class="text-center text-secondary/50 mt-6" style="font-size:13px;">
                    Remember your password?
                    <button @click="modal = 'login'"
                        class="text-primary font-semibold hover:text-gold transition-colors">Back to Login</button>
                </p>
            </div>

        </div>
    </div>
</div>



<footer class="bg-[#0C0A09] text-white py-10 font-semibold">

    <!-- Main Footer -->
    <div class="max-w-8xl mx-auto px-4 md:px-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-10">

            <!-- Col 1: Logo + About + Social -->
            <div class="flex flex-col gap-4">
                <a href="#" class="flex items-center gap-3">
                    <img src="{{url('assets/images/logo.png')}}" alt="Pink City Logo"
                        class="h-15 w-15 rounded-full object-cover">
                    <div class="leading-tight">
                        <p class="font-bold text-primary text-xl tracking-wide">Pink <span
                                class="text-gold">City</span></p>
                        <p class="text-sm text-white/50 tracking-widest uppercase">Handicraft & Wedding Props</p>
                    </div>
                </a>
                <p style="font-size:16px;" class="text-white/70 leading-relaxed">
                    Authentic handcrafted products from the artisans of Jaipur, Rajasthan. Bringing the magic of Indian
                    craftsmanship to your home and special celebrations.
                </p>
                <!-- Social -->
                <div class="flex items-center gap-4 mt-1">
                    <a href="#" class="text-white/50 hover:text-gold transition-colors text-xl"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-white/50 hover:text-gold transition-colors text-xl"><i
                            class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="text-white/50 hover:text-gold transition-colors text-xl"><i
                            class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div>
                <h4 style="font-size:20px;" class="font-bold tracking-widest uppercase text-white/50 mb-4">Quick Links
                </h4>
                <ul class="flex flex-col gap-3">
                    <li><a href="{{url('about')}}" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">About</a></li>

                    <li><a href="#" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">Blog</a></li>
                    <li><a href="{{url('contact')}}" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Col 3: Categories -->
            <div>
                <h4 style="font-size:20px;" class="font-bold tracking-widest uppercase text-white/50 mb-4">Categories
                </h4>
                <ul class="flex flex-col gap-3">
                    <li><a href="#" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">Wedding Props</a></li>
                    <li><a href="#" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">Home Décor</a></li>
                    <li><a href="#" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">Textiles & Fabrics</a></li>
                    <li><a href="#" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">Figurines & Idols</a></li>
                    <li><a href="#" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">Lamps & Lanterns</a></li>
                    <li><a href="#" style="font-size:16px;"
                            class="text-white/70 hover:text-gold transition-colors">Pottery & Ceramics</a></li>
                </ul>
            </div>

            <!-- Col 4: Contact + Trust Badges -->
            <div class="flex flex-col gap-5">
                <div>
                    <h4 style="font-size:20px;" class="font-bold tracking-widest uppercase text-white/50 mb-4">Contact
                        Us</h4>
                    <ul class="flex flex-col gap-3">
                        <li class="flex items-start gap-2.5 text-white/70" style="font-size:16px;">
                            <i class="fa-solid fa-location-dot text-gold mt-1 flex-shrink-0"></i>
                            Johari Bazaar, Jaipur, Rajasthan — 302003, India
                        </li>
                        <li class="flex items-center gap-2.5 text-white/70" style="font-size:16px;">
                            <i class="fa-solid fa-phone text-gold flex-shrink-0"></i>
                            +91 98765 43210
                        </li>
                        <li class="flex items-center gap-2.5 text-white/70" style="font-size:16px;">
                            <i class="fa-solid fa-envelope text-gold flex-shrink-0"></i>
                            info@pinkcityhandicraft.com
                        </li>
                    </ul>
                </div>


            </div>
            <!-- Trust Badges -->
            <div>
                <h4 style="font-size:20px;" class="font-bold tracking-widest uppercase text-white/50 mb-3">Trusted &
                    Verified</h4>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-2.5 bg-white/5 border border-white/10 rounded px-3 py-2.5">
                        <i class="fa-solid fa-shield-halved text-gold text-lg flex-shrink-0"></i>
                        <span class="text-white/70" style="font-size:15px;">100% Secure Payments</span>
                    </div>
                    <div class="flex items-center gap-2.5 bg-white/5 border border-white/10 rounded px-3 py-2.5">
                        <i class="fa-solid fa-rotate-left text-gold text-lg flex-shrink-0"></i>
                        <span class="text-white/70" style="font-size:15px;">Easy 7-Day Returns</span>
                    </div>
                    <div class="flex items-center gap-2.5 bg-white/5 border border-white/10 rounded px-3 py-2.5">
                        <i class="fa-solid fa-handshake text-gold text-lg flex-shrink-0"></i>
                        <span class="text-white/70" style="font-size:15px;">Verified Jaipur Artisans</span>
                    </div>
                    <div class="flex items-center gap-2.5 bg-white/5 border border-white/10 rounded px-3 py-2.5">
                        <i class="fa-solid fa-truck text-gold text-lg flex-shrink-0"></i>
                        <span class="text-white/70" style="font-size:15px;">Pan India Delivery</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-white/10 mt-10">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p style="font-size:14px;" class="text-white/40">© 2024 Pink City Handicraft & Wedding Props Suppliers.
                All rights reserved.</p>
            <div class="flex items-center gap-5">
                <a href="{{url('/privacy-policy')}}" style="font-size:14px;"
                    class="text-white/40 hover:text-gold transition-colors">Privacy Policy</a>
                <a href="{{url('/terms-and-conditions')}}" style="font-size:14px;"
                    class="text-white/40 hover:text-gold transition-colors">Terms and Conditions</a>
                <a href="{{url('/shipping-policy')}}" style="font-size:14px;"
                    class="text-white/40 hover:text-gold transition-colors">Shipping Policy</a>
                <a href="{{url('/return-and-refund-policy')}}" style="font-size:14px;"
                    class="text-white/40 hover:text-gold transition-colors">Return and Refund policy</a>
            </div>
        </div>
    </div>

</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="{{url('assets/js/script.js')}}"></script>



</html>
