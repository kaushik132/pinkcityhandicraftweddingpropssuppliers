@extends('dashboard.layout.main')
@section('content')
    <!-- ===== MY ACCOUNT PAGE ===== -->
    <section class="bg-[#faf5ee] min-h-screen py-6 md:py-8" x-data="{ logoutModal: false, activeTab: 'profile' }">
        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- ===== MOBILE TOP TABS (horizontal scroll) ===== -->
            <div class="md:hidden mb-4 bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="flex overflow-x-auto scrollbar-hide border-b border-gray-100">
                    <button @click="activeTab = 'profile'"
                        :class="activeTab === 'profile' ? 'border-b-2 border-primary text-primary bg-primary/5' :
                            'text-secondary/50'"
                        class="flex flex-col items-center gap-1 px-4 py-3 flex-shrink-0 font-semibold transition-colors"
                        style="font-size:12px;">
                        <i class="fa-regular fa-user text-base"></i> Profile
                    </button>
                    <button @click="activeTab = 'orders'"
                        :class="activeTab === 'orders' ? 'border-b-2 border-primary text-primary bg-primary/5' :
                            'text-secondary/50'"
                        class="flex flex-col items-center gap-1 px-4 py-3 flex-shrink-0 font-semibold transition-colors"
                        style="font-size:12px;">
                        <i class="fa-solid fa-box text-base"></i> Orders
                    </button>
                    <button @click="activeTab = 'wishlist'"
                        :class="activeTab === 'wishlist' ? 'border-b-2 border-primary text-primary bg-primary/5' :
                            'text-secondary/50'"
                        class="flex flex-col items-center gap-1 px-4 py-3 flex-shrink-0 font-semibold transition-colors"
                        style="font-size:12px;">
                        <i class="fa-regular fa-heart text-base"></i> Wishlist
                    </button>
                    <button @click="activeTab = 'addresses'"
                        :class="activeTab === 'addresses' ? 'border-b-2 border-primary text-primary bg-primary/5' :
                            'text-secondary/50'"
                        class="flex flex-col items-center gap-1 px-4 py-3 flex-shrink-0 font-semibold transition-colors"
                        style="font-size:12px;">
                        <i class="fa-regular fa-map text-base"></i> Address
                    </button>
                    <button @click="activeTab = 'settings'"
                        :class="activeTab === 'settings' ? 'border-b-2 border-primary text-primary bg-primary/5' :
                            'text-secondary/50'"
                        class="flex flex-col items-center gap-1 px-4 py-3 flex-shrink-0 font-semibold transition-colors"
                        style="font-size:12px;">
                        <i class="fa-solid fa-gear text-base"></i> Settings
                    </button>
                    <button @click="logoutModal = true"
                        class="flex flex-col items-center gap-1 px-4 py-3 flex-shrink-0 font-semibold text-red-400 transition-colors"
                        style="font-size:12px;">
                        <i class="fa-solid fa-arrow-right-from-bracket text-base"></i> Logout
                    </button>
                </div>
            </div>

            <div class="flex gap-6 items-start">

                <!-- ===== SIDEBAR (Desktop only) ===== -->
                <aside class="hidden md:block w-[240px] flex-shrink-0 bg-white shadow-sm p-5">
                    <p class="text-primary font-semibold tracking-widest uppercase mb-5" style="font-size:11px;">My Account
                    </p>
                    <nav class="flex flex-col gap-1">
                        <button @click="activeTab = 'profile'"
                            :class="activeTab === 'profile' ? 'bg-primary/8 text-primary border-l-2 border-primary' :
                                'text-secondary/60 hover:text-secondary hover:bg-gray-50'"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all text-left"
                            style="font-size:14px;">
                            <i class="fa-regular fa-user w-4 text-center"></i> Profile
                        </button>
                        <button @click="activeTab = 'orders'"
                            :class="activeTab === 'orders' ? 'bg-primary/8 text-primary border-l-2 border-primary' :
                                'text-secondary/60 hover:text-secondary hover:bg-gray-50'"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all text-left"
                            style="font-size:14px;">
                            <i class="fa-solid fa-box w-4 text-center"></i> My Orders
                        </button>
                        <button @click="activeTab = 'wishlist'"
                            :class="activeTab === 'wishlist' ? 'bg-primary/8 text-primary border-l-2 border-primary' :
                                'text-secondary/60 hover:text-secondary hover:bg-gray-50'"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all text-left"
                            style="font-size:14px;">
                            <i class="fa-regular fa-heart w-4 text-center"></i> Wishlist
                        </button>
                        <button @click="activeTab = 'addresses'"
                            :class="activeTab === 'addresses' ? 'bg-primary/8 text-primary border-l-2 border-primary' :
                                'text-secondary/60 hover:text-secondary hover:bg-gray-50'"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all text-left"
                            style="font-size:14px;">
                            <i class="fa-regular fa-map w-4 text-center"></i> Saved Addresses
                        </button>
                        <button @click="activeTab = 'settings'"
                            :class="activeTab === 'settings' ? 'bg-primary/8 text-primary border-l-2 border-primary' :
                                'text-secondary/60 hover:text-secondary hover:bg-gray-50'"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all text-left"
                            style="font-size:14px;">
                            <i class="fa-solid fa-gear w-4 text-center"></i> Account Settings
                        </button>
                        <div class="border-t border-gray-100 mt-2 pt-2">
                            <button @click="logoutModal = true"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-500 hover:bg-red-50 transition-all w-full text-left"
                                style="font-size:14px;">
                                <i class="fa-solid fa-arrow-right-from-bracket w-4 text-center"></i> Logout
                            </button>
                        </div>
                    </nav>
                </aside>

                <!-- ===== MAIN CONTENT ===== -->
                <div class="flex-1 min-w-0 bg-white shadow-sm p-4 md:p-6">

                    <!-- ===== PROFILE TAB ===== -->
                    <div x-show="activeTab === 'profile'">
                        <div class="mb-5">
                            <h1 class="text-secondary font-semibold" style="font-size:20px;">Profile</h1>
                            <p class="text-secondary/50" style="font-size:13px;">View and manage your personal profile
                                information.</p>
                        </div>
                        <div class="border border-gray-200 rounded-xl p-4 md:p-6 mb-4">
                            <div class="flex items-center gap-4 mb-5">
                                <div class="relative flex-shrink-0">
                                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-primary flex items-center justify-center text-white font-bold"
                                        style="font-size:22px;">
                                        {{ collect(explode(' ', $user->name))->map(fn($w) => strtoupper($w[0]))->take(2)->implode('') }}
                                    </div>
                                    <button
                                        class="absolute bottom-0 right-0 w-6 h-6 rounded-full bg-gold text-white flex items-center justify-center shadow-md">
                                        <i class="fa-solid fa-camera text-[10px]"></i>
                                    </button>
                                </div>
                                <div>
                                    <p class="text-secondary font-semibold" style="font-size:16px;">{{ $user->name }}</p>
                                    <p class="text-secondary/50" style="font-size:12px;">{{ $user->email }}</p>
                                    <span
                                        class="inline-flex items-center gap-1 bg-green-50 text-green-600 border border-green-200 px-2 py-0.5 rounded-full mt-1"
                                        style="font-size:10px; font-weight:600;">
                                        <i class="fa-solid fa-circle text-[6px]"></i> Active Account
                                    </span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-[#faf5ee] rounded-xl p-3">
                                    <p class="text-secondary/40 mb-1"
                                        style="font-size:10px; font-weight:600; letter-spacing:0.06em;">FULL NAME</p>
                                    <p class="text-secondary font-semibold" style="font-size:13px;">{{ $user->name }}</p>
                                </div>
                                <div class="bg-[#faf5ee] rounded-xl p-3">
                                    <p class="text-secondary/40 mb-1"
                                        style="font-size:10px; font-weight:600; letter-spacing:0.06em;">EMAIL</p>
                                    <p class="text-secondary font-semibold truncate" style="font-size:13px;">
                                        {{ $user->email }}</p>
                                </div>
                                <div class="bg-[#faf5ee] rounded-xl p-3">
                                    <p class="text-secondary/40 mb-1"
                                        style="font-size:10px; font-weight:600; letter-spacing:0.06em;">PHONE</p>
                                    <p class="text-secondary font-semibold" style="font-size:13px;">
                                        {{ $user->mobile_number ?? '—' }}</p>
                                </div>
                                <div class="bg-[#faf5ee] rounded-xl p-3">
                                    <p class="text-secondary/40 mb-1"
                                        style="font-size:10px; font-weight:600; letter-spacing:0.06em;">MEMBER SINCE</p>
                                    <p class="text-secondary font-semibold" style="font-size:13px;">
                                        {{ $user->created_at->format('F Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3 mb-4">
                            <div class="border border-gray-200 rounded-xl p-3 text-center">
                                <p class="text-primary font-bold mb-0.5" style="font-size:22px;">
                                    {{ $stats['total_orders'] }}</p>
                                <p class="text-secondary/50" style="font-size:11px;">Total Orders</p>
                            </div>
                            <div class="border border-gray-200 rounded-xl p-3 text-center">
                                <p class="text-primary font-bold mb-0.5" style="font-size:22px;">
                                    {{ $stats['wishlist_count'] }}</p>
                                <p class="text-secondary/50" style="font-size:11px;">Wishlist</p>
                            </div>
                            <div class="border border-gray-200 rounded-xl p-3 text-center">
                                <p class="text-primary font-bold mb-0.5" style="font-size:22px;">
                                    {{ $stats['address_count'] }}</p>
                                <p class="text-secondary/50" style="font-size:11px;">Addresses</p>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button @click="activeTab = 'settings'"
                                class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white font-semibold px-5 py-2.5 rounded-full transition-colors"
                                style="font-size:13px;">
                                <i class="fa-regular fa-pen-to-square text-xs"></i> Edit Profile
                            </button>
                        </div>
                    </div>

                    <!-- ===== MY ORDERS TAB ===== -->
                    <div x-show="activeTab === 'orders'" x-cloak>
                        <div class="mb-4">
                            <h1 class="text-secondary font-semibold" style="font-size:20px;">My Orders</h1>
                            <p class="text-secondary/50" style="font-size:13px;">Track, view and manage all your orders in
                                one place.</p>
                        </div>

                        @if ($orders->count() > 0)
                            <div class="flex flex-col gap-3">
                                @foreach ($orders as $order)
                                    @php
                                        $badgeColors = [
                                            'placed' => 'bg-blue-50 text-blue-600 border-blue-200',
                                            'processing' => 'bg-yellow-50 text-yellow-600 border-yellow-200',
                                            'shipped' => 'bg-blue-50 text-blue-600 border-blue-200',
                                            'delivered' => 'bg-green-50 text-green-600 border-green-200',
                                            'cancelled' => 'bg-red-50 text-red-500 border-red-200',
                                        ];
                                        $firstItem = $order->items->first();
                                    @endphp
                                    <div class="border border-gray-100 rounded-xl overflow-hidden">
                                        <div class="flex gap-3 p-3">
                                            <img src="{{ $firstItem?->product_image ?? asset('uploads/images/default.jpg') }}"
                                                class="w-20 h-20 md:w-24 md:h-24 rounded-xl object-cover flex-shrink-0">
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-start justify-between gap-1">
                                                    <div class="min-w-0">
                                                        <p class="text-secondary font-semibold" style="font-size:13px;">
                                                            Order {{ $order->order_number }}</p>
                                                        <p class="text-secondary/40" style="font-size:11px;">
                                                            {{ $order->created_at->format('d M, Y') }} •
                                                            {{ $order->items->sum('quantity') }}
                                                            item{{ $order->items->sum('quantity') > 1 ? 's' : '' }}</p>
                                                        <p class="text-secondary/70 truncate" style="font-size:12px;">
                                                            {{ $firstItem?->product_title }}{{ $order->items->count() > 1 ? ' + ' . ($order->items->count() - 1) . ' more' : '' }}
                                                        </p>
                                                        <p class="text-primary font-semibold mt-0.5"
                                                            style="font-size:14px;">₹{{ number_format($order->total) }}
                                                        </p>
                                                    </div>
                                                    <span
                                                        class="flex-shrink-0 {{ $badgeColors[$order->status] ?? 'bg-gray-50 text-gray-500 border-gray-200' }} border px-2 py-0.5 rounded-full font-semibold"
                                                        style="font-size:11px;">{{ ucfirst($order->status) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-t border-gray-100 px-3 py-2.5 flex items-center gap-2">
                                            <a href="{{ route('orders.show', $order->id) }}"
                                                class="border border-primary text-primary hover:bg-primary hover:text-white font-semibold px-3 py-1.5 rounded-full transition-colors"
                                                style="font-size:11px;">View Details</a>
                                            <a href="{{ route('orders.invoice', $order->id) }}"
                                                class="flex items-center gap-1 border border-gray-200 text-secondary hover:border-primary hover:text-primary font-semibold px-3 py-1.5 rounded-full transition-colors"
                                                style="font-size:11px;">
                                                <i class="fa-solid fa-download text-[10px]"></i> Download Invoice
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex items-center justify-center mt-6">
                                {{ $orders->links() }}
                            </div>
                        @else
                            <div class="text-center py-16">
                                <i class="fa-solid fa-box text-gray-300 text-4xl mb-3"></i>
                                <p class="text-secondary font-semibold mb-1" style="font-size:14px;">No orders yet</p>
                                <p class="text-secondary/50 mb-4" style="font-size:12px;">Start shopping to see your
                                    orders here.</p>
                                <a href="{{ url('/products') }}"
                                    class="inline-block bg-primary text-white px-5 py-2 rounded-full font-semibold"
                                    style="font-size:13px;">Shop Now</a>
                            </div>
                        @endif
                    </div>

                    <!-- ===== WISHLIST TAB ===== -->
                    <div x-show="activeTab === 'wishlist'" x-cloak>
                        <div class="flex items-start justify-between mb-4 flex-wrap gap-3">
                            <div>
                                <h1 class="text-secondary font-semibold" style="font-size:20px;">My Wishlist</h1>
                                <p class="text-secondary/50" style="font-size:13px;">{{ $wishlists->count() }} items
                                    saved in your wishlist</p>
                            </div>
                        </div>

                        @if ($wishlists->count() > 0)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6">
                                @foreach ($wishlists as $item)
                                    @php $product = $item->product; @endphp
                                    <div class="bg-[#faf5ee] rounded-xl overflow-hidden">
                                        <div class="relative overflow-hidden group" style="height:130px;">
                                            <form action="{{ route('wishlist.remove', $product->id) }}" method="POST"
                                                class="absolute top-2 right-2 z-10">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-7 h-7 rounded-full bg-white/90 flex items-center justify-center text-primary">
                                                    <i class="fa-solid fa-heart text-xs"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('product.detail', $product->slug) }}">
                                                <img src="{{ $product->thumbnail }}"
                                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            </a>
                                        </div>
                                        <div class="p-2.5">
                                            <p class="text-secondary font-semibold mb-1 line-clamp-2"
                                                style="font-size:12px;">{{ $product->title }}</p>
                                            <p class="text-primary font-bold mb-0.5" style="font-size:14px;">
                                                ₹{{ number_format($product->sale_price) }}</p>
                                            @if ($product->stock > 0)
                                                <p class="text-green-600 mb-2" style="font-size:10px;"><i
                                                        class="fa-solid fa-check text-xs"></i> In Stock</p>
                                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-1.5 rounded-full transition-colors mb-1.5"
                                                        style="font-size:11px;">Move to Cart</button>
                                                </form>
                                            @else
                                                <p class="text-red-500 mb-2" style="font-size:10px;">Out of Stock</p>
                                            @endif
                                            <form action="{{ route('wishlist.remove', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-full flex items-center justify-center gap-1 text-red-500 hover:text-red-600 transition-colors"
                                                    style="font-size:11px;">
                                                    <i class="fa-regular fa-trash-can text-xs"></i> Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-16">
                                <i class="fa-regular fa-heart text-gray-300 text-4xl mb-3"></i>
                                <p class="text-secondary font-semibold mb-1" style="font-size:14px;">Your wishlist is
                                    empty</p>
                                <a href="{{ url('/products') }}"
                                    class="inline-block bg-primary text-white px-5 py-2 rounded-full font-semibold mt-2"
                                    style="font-size:13px;">Shop Now</a>
                            </div>
                        @endif

                        <!-- Trust Bar — static rehne do -->
                    </div>

                    <!-- ===== SAVED ADDRESSES TAB ===== -->
                    <div x-show="activeTab === 'addresses'" x-cloak x-data="{ addModal: false }">
                        <div class="flex items-start justify-between mb-4 flex-wrap gap-3">
                            <div>
                                <h1 class="text-secondary font-semibold" style="font-size:20px;">Saved Addresses</h1>
                                <p class="text-secondary/50" style="font-size:13px;">Manage your delivery addresses.</p>
                            </div>
                            <button @click="addModal = true"
                                class="flex items-center gap-1.5 bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-full transition-colors font-semibold"
                                style="font-size:13px;">
                                <i class="fa-solid fa-plus text-xs"></i> Add New
                            </button>
                        </div>

                        @if ($addresses->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
                                @foreach ($addresses as $addr)
                                    <div class="border border-gray-200 rounded-xl p-4">
                                        <div class="flex items-center gap-2 mb-3">
                                            <i
                                                class="fa-solid fa-{{ $addr->type == 'home' ? 'house' : ($addr->type == 'work' ? 'building' : 'location-dot') }} text-secondary/40"></i>
                                            <p class="text-secondary font-semibold" style="font-size:14px;">
                                                {{ ucfirst($addr->type) }}</p>
                                            @if ($addr->is_default)
                                                <span class="ml-auto bg-primary/10 text-primary px-2 py-0.5 rounded-full"
                                                    style="font-size:10px; font-weight:600;">Default</span>
                                            @endif
                                        </div>
                                        <div class="text-secondary/60 leading-relaxed" style="font-size:12px;">
                                            <p class="text-secondary font-semibold mb-0.5">{{ $addr->full_name }}</p>
                                            <p>{{ $addr->address }}{{ $addr->landmark ? ', ' . $addr->landmark : '' }}</p>
                                            <p>{{ $addr->city }}, {{ $addr->state }} - {{ $addr->pincode }}</p>
                                            <p>Phone: {{ $addr->mobile }}</p>
                                        </div>
                                        <div class="flex items-center gap-3 mt-3">
                                            <button
                                                class="flex items-center gap-1 text-secondary hover:text-primary font-semibold"
                                                style="font-size:12px;"><i
                                                    class="fa-regular fa-pen-to-square text-xs"></i> Edit</button>
                                            <form action="{{ route('addresses.destroy', $addr->id) }}" method="POST"
                                                onsubmit="return confirm('Delete this address?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center gap-1 text-red-500 hover:text-red-600 font-semibold"
                                                    style="font-size:12px;"><i
                                                        class="fa-regular fa-trash-can text-xs"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <i class="fa-regular fa-map text-gray-300 text-4xl mb-3"></i>
                                <p class="text-secondary font-semibold" style="font-size:14px;">No saved addresses yet</p>
                            </div>
                        @endif

                        <div class="flex items-center gap-2 text-secondary/50 bg-gray-50 rounded-xl px-4 py-3"
                            style="font-size:12px;">
                            <i class="fa-solid fa-location-dot text-secondary/30 flex-shrink-0"></i>
                            Tip: You can set any address as default. This address will be selected automatically during
                            checkout.
                        </div>

                        <!-- ===== ADD ADDRESS MODAL ===== -->
                        <div x-show="addModal" x-cloak class="fixed inset-0 z-[999] flex items-center justify-center px-4"
                            style="background:rgba(28,18,8,0.5);" @click.self="addModal = false">
                            <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl">
                                <h3 class="text-secondary font-bold mb-4" style="font-size:18px;">Add New Address</h3>
                                <form action="{{ route('addresses.store') }}" method="POST"
                                    class="flex flex-col gap-3">
                                    @csrf
                                    <select name="label" required
                                        class="border border-gray-200 rounded-lg px-3 py-2 text-secondary"
                                        style="font-size:13px;">
                                        <option value="home">Home</option>
                                        <option value="work">Work</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <input type="text" name="full_name" required placeholder="Full Name"
                                        class="border border-gray-200 rounded-lg px-3 py-2" style="font-size:13px;">
                                    <input type="text" name="mobile" required placeholder="Mobile Number"
                                        class="border border-gray-200 rounded-lg px-3 py-2" style="font-size:13px;">
                                    <input type="text" name="address" required placeholder="Address"
                                        class="border border-gray-200 rounded-lg px-3 py-2" style="font-size:13px;">
                                    <input type="text" name="landmark" placeholder="Landmark (Optional)"
                                        class="border border-gray-200 rounded-lg px-3 py-2" style="font-size:13px;">
                                    <div class="grid grid-cols-2 gap-3">
                                        <input type="text" name="city" required placeholder="City"
                                            class="border border-gray-200 rounded-lg px-3 py-2" style="font-size:13px;">
                                        <input type="text" name="state" required placeholder="State"
                                            class="border border-gray-200 rounded-lg px-3 py-2" style="font-size:13px;">
                                    </div>
                                    <input type="text" name="pincode" required placeholder="Pincode"
                                        class="border border-gray-200 rounded-lg px-3 py-2" style="font-size:13px;">
                                    <label class="flex items-center gap-2" style="font-size:12px;">
                                        <input type="checkbox" name="is_default" value="1" class="accent-primary">
                                        Set as default address
                                    </label>
                                    <div class="flex gap-3 mt-2">
                                        <button type="button" @click="addModal = false"
                                            class="flex-1 border border-gray-200 py-2.5 rounded-full font-semibold"
                                            style="font-size:13px;">Cancel</button>
                                        <button type="submit"
                                            class="flex-1 bg-primary text-white py-2.5 rounded-full font-semibold"
                                            style="font-size:13px;">Save Address</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ACCOUNT SETTINGS TAB ===== -->
                    <div x-show="activeTab === 'settings'" x-cloak>
                        <div class="mb-5">
                            <h1 class="text-secondary font-semibold" style="font-size:20px;">Account Settings</h1>
                            <p class="text-secondary/50" style="font-size:13px;">Manage your personal information,
                                password and notification preferences.</p>
                        </div>

                        @if (session('success'))
                            <div class="mb-4 text-green-600 bg-green-50 border border-green-200 rounded-lg px-4 py-2"
                                style="font-size:13px;">{{ session('success') }}</div>
                        @endif

                        <!-- Personal Info -->
                        <form action="{{ route('profile.update') }}" method="POST"
                            class="border border-gray-200 rounded-xl p-4 mb-4">
                            @csrf
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <i class="fa-regular fa-user text-secondary/40"></i>
                                    <h3 class="text-secondary font-semibold" style="font-size:15px;">Personal Information
                                    </h3>
                                </div>
                                <button type="submit"
                                    class="flex items-center gap-1 border border-gray-200 text-secondary hover:border-primary hover:text-primary px-3 py-1.5 rounded-full transition-colors font-semibold"
                                    style="font-size:12px;">
                                    <i class="fa-regular fa-pen-to-square text-xs"></i> Save
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-secondary font-semibold mb-1" style="font-size:12px;">Full
                                        Name</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-primary bg-gray-50 transition-colors"
                                        style="font-size:13px;">
                                </div>
                                <div>
                                    <label class="block text-secondary font-semibold mb-1" style="font-size:12px;">Email
                                        Address</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-primary bg-gray-50 transition-colors"
                                        style="font-size:13px;">
                                </div>
                                <div>
                                    <label class="block text-secondary font-semibold mb-1" style="font-size:12px;">Phone
                                        Number</label>
                                    <input type="tel" name="mobile_number"
                                        value="{{ old('mobile_number', $user->mobile_number) }}"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-primary bg-gray-50 transition-colors"
                                        style="font-size:13px;">
                                </div>
                            </div>
                            @error('name')
                                <p class="text-red-500 mt-2" style="font-size:12px;">{{ $message }}</p>
                            @enderror
                            @error('email')
                                <p class="text-red-500 mt-2" style="font-size:12px;">{{ $message }}</p>
                            @enderror
                        </form>

                        <!-- Change Password -->
                        <form action="{{ route('profile.password') }}" method="POST"
                            class="border border-gray-200 rounded-xl p-4 mb-4">
                            @csrf
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-lock text-secondary/40"></i>
                                    <h3 class="text-secondary font-semibold" style="font-size:15px;">Change Password</h3>
                                </div>
                                <button type="submit"
                                    class="flex items-center gap-1 bg-primary hover:bg-primary/90 text-white px-3 py-1.5 rounded-full transition-colors font-semibold"
                                    style="font-size:12px;">
                                    <i class="fa-solid fa-lock text-xs"></i> Update
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-secondary font-semibold mb-1" style="font-size:12px;">Current
                                        Password</label>
                                    <input type="password" name="current_password" placeholder="Enter current password"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-primary bg-gray-50 transition-colors"
                                        style="font-size:13px;">
                                </div>
                                <div>
                                    <label class="block text-secondary font-semibold mb-1" style="font-size:12px;">New
                                        Password</label>
                                    <input type="password" name="new_password" placeholder="Enter new password"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-primary bg-gray-50 transition-colors"
                                        style="font-size:13px;">
                                </div>
                                <div>
                                    <label class="block text-secondary font-semibold mb-1" style="font-size:12px;">Confirm
                                        Password</label>
                                    <input type="password" name="new_password_confirmation"
                                        placeholder="Confirm new password"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-primary bg-gray-50 transition-colors"
                                        style="font-size:13px;">
                                </div>
                            </div>
                            @error('current_password')
                                <p class="text-red-500 mt-2" style="font-size:12px;">{{ $message }}</p>
                            @enderror
                        </form>

                        <!-- Notifications — abhi static rehne do (koi backend column nahi banaya) -->

                        <!-- Delete Account -->
                        <div class="border border-red-100 rounded-xl p-4 flex items-center justify-between gap-3 flex-wrap"
                            x-data="{ deleteModal: false }">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-trash-can text-red-400"></i>
                                <div>
                                    <h3 class="text-secondary font-semibold" style="font-size:15px;">Delete Account</h3>
                                    <p class="text-secondary/40" style="font-size:12px;">Permanently delete your account
                                        and all associated data.</p>
                                </div>
                            </div>
                            <button @click="deleteModal = true"
                                class="flex items-center gap-1.5 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full transition-colors font-semibold flex-shrink-0"
                                style="font-size:12px;">
                                <i class="fa-regular fa-trash-can text-xs"></i> Delete Account
                            </button>

                            <div x-show="deleteModal" x-cloak
                                class="fixed inset-0 z-[999] flex items-center justify-center px-4"
                                style="background:rgba(28,18,8,0.5);" @click.self="deleteModal = false">
                                <div class="bg-white rounded-2xl p-6 w-full max-w-sm shadow-2xl">
                                    <h3 class="text-secondary font-bold mb-2" style="font-size:18px;">Confirm Deletion
                                    </h3>
                                    <p class="text-secondary/60 mb-4" style="font-size:13px;">This action cannot be
                                        undone. Enter your password to confirm.</p>
                                    <form action="{{ route('profile.delete') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="password" name="password" required placeholder="Enter your password"
                                            class="w-full border border-gray-200 rounded-lg px-3 py-2.5 mb-4"
                                            style="font-size:13px;">
                                        <div class="flex gap-3">
                                            <button type="button" @click="deleteModal = false"
                                                class="flex-1 border border-gray-200 py-2.5 rounded-full font-semibold"
                                                style="font-size:13px;">Cancel</button>
                                            <button type="submit"
                                                class="flex-1 bg-red-500 text-white py-2.5 rounded-full font-semibold"
                                                style="font-size:13px;">Delete Permanently</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ===== LOGOUT MODAL ===== -->
        <div x-show="logoutModal" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-[999] flex items-center justify-center px-4"
            style="background:rgba(28,18,8,0.5); backdrop-filter:blur(4px);" @click.self="logoutModal = false">
            <div x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                class="bg-white rounded-2xl p-8 w-full max-w-sm text-center shadow-2xl">
                <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-5">
                    <i class="fa-solid fa-arrow-right-from-bracket text-primary text-xl"></i>
                </div>
                <h2 class="font-playfair text-secondary mb-2" style="font-size:24px; font-weight:500;">Logout</h2>
                <p class="text-secondary/60 font-semibold mb-1" style="font-size:15px;">Are you sure you want to sign out?
                </p>
                <p class="text-secondary/40 mb-7" style="font-size:13px;">You will need to log in again to access your
                    orders, wishlist, and account details.</p>
                <div class="flex items-center gap-3">
                    <form method="POST" action="{{ route('logout') }}" class="flex-1">
                        @csrf
                        <button type="button" @click="logoutModal = false"
                            class="flex-1 border border-gray-200 text-secondary hover:border-primary hover:text-primary font-semibold py-3 rounded-full transition-colors w-full"
                            style="font-size:14px;">Cancel</button>
                    </form>
                    <form method="POST" action="{{ route('logout') }}" class="flex-1">
                        @csrf
                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 rounded-full transition-colors"
                            style="font-size:14px;">Logout</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>


    <!-- footer  -->
@endsection
