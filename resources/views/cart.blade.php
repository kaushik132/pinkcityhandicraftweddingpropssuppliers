@extends('dashboard.layout.main')
@section('content')

    <section class="bg-[#faf5ee] py-8">

        <div class="max-w-7xl mx-auto px-4 md:px-10">

            <h1 class="flex items-center gap-2 text-secondary font-bold mb-6" style="font-size:22px;">
                <i class="fa-solid fa-cart-shopping text-secondary"></i>
                Shopping Cart
                <span id="cart-title-count" class="text-secondary/40 font-normal"
                    style="font-size:14px;">({{ $cartItems->sum('quantity') }} items)</span>
            </h1>

            @if ($cartItems->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

                    <!-- ===== LEFT: CART TABLE ===== -->
                    <div class="lg:col-span-2 bg-white overflow-hidden shadow-sm">

                        <div class="bg-primary text-white grid grid-cols-[2fr_1fr_1fr_1fr] gap-2 px-5 py-3">
                            <span class="font-semibold" style="font-size:13px;">Product</span>
                            <span class="font-semibold text-center" style="font-size:13px;">Price</span>
                            <span class="font-semibold text-center" style="font-size:13px;">Quantity</span>
                            <span class="font-semibold text-right" style="font-size:13px;">Total</span>
                        </div>

                        @foreach ($cartItems as $item)
                            @php $product = $item->product; @endphp
                            <div class="grid grid-cols-[2fr_1fr_1fr_1fr] gap-2 items-center px-5 py-4 border-b border-gray-100"
                                id="cart-row-{{ $item->id }}">
                                <div class="flex items-center gap-3 min-w-0">
                                    <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}"
                                        class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
                                    <div class="min-w-0">
                                        <p class="text-secondary font-semibold truncate" style="font-size:13px;">
                                            {{ $product->title }}</p>
                                        @if ($product->stock <= 5)
                                            <p class="text-primary" style="font-size:11px;">Only {{ $product->stock }} Left
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="text-primary font-bold" style="font-size:14px;">
                                        ₹{{ number_format($product->sale_price) }}</p>
                                    @if ($product->price > $product->sale_price)
                                        <p class="text-gray-400 line-through" style="font-size:11px;">
                                            ₹{{ number_format($product->price) }}</p>
                                        <p class="text-green-600 font-semibold" style="font-size:10px;">
                                            {{ $product->discount_percent }}% off</p>
                                    @endif
                                </div>
                                <div class="flex justify-center">
                                    <div
                                        class="flex items-center border border-gray-200 rounded-full overflow-hidden bg-white">
                                        <button onclick="updateQty({{ $item->id }}, 'decrement')"
                                            class="w-7 h-7 flex items-center justify-center text-secondary hover:text-primary transition-colors">
                                            <i class="fa-solid fa-minus text-[10px]"></i>
                                        </button>
                                        <span class="qty-value w-6 text-center text-secondary font-semibold"
                                            style="font-size:12px;">{{ $item->quantity }}</span>
                                        <button onclick="updateQty({{ $item->id }}, 'increment')"
                                            class="w-7 h-7 flex items-center justify-center text-secondary hover:text-primary transition-colors">
                                            <i class="fa-solid fa-plus text-[10px]"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end gap-3">
                                    <span class="item-total text-secondary font-bold"
                                        style="font-size:14px;">₹{{ number_format($item->total) }}</span>
                                    <button onclick="removeCartItem({{ $item->id }})"
                                        class="text-secondary/40 hover:text-primary transition-colors">
                                        <i class="fa-solid fa-trash-can text-sm"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        <div class="flex items-center justify-between px-5 py-4 border-t border-gray-100 flex-wrap gap-3">
                            <a href="{{ url('/products') }}"
                                class="flex items-center gap-2 text-secondary hover:text-primary font-semibold transition-colors"
                                style="font-size:13px;">
                                <i class="fa-solid fa-arrow-left text-xs"></i> Continue Shopping
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST"
                                onsubmit="return confirm('Clear entire cart?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center gap-2 border border-gray-200 hover:border-primary hover:text-primary text-secondary font-semibold px-4 py-2 rounded-lg transition-colors"
                                    style="font-size:13px;">
                                    <i class="fa-solid fa-trash-can text-xs"></i> Clear Cart
                                </button>
                            </form>
                        </div>

                    </div>

                    <!-- ===== RIGHT: PRICE DETAILS ===== -->
                    <div class="bg-white shadow-sm p-5">
                        <h2 class="text-secondary font-bold mb-4" style="font-size:16px;">Price Details</h2>

                        <div class="flex flex-col gap-3 mb-4">
                            <div class="flex items-center justify-between">
                                <span class="text-secondary/60" style="font-size:13px;">Subtotal (<span
                                        id="cart-item-count">{{ $cartItems->sum('quantity') }}</span> items)</span>
                                <span id="cart-subtotal" class="text-secondary font-semibold"
                                    style="font-size:13px;">₹{{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-secondary/60" style="font-size:13px;">Discount</span>
                                <span id="cart-discount" class="text-green-600 font-semibold"
                                    style="font-size:13px;">−₹{{ number_format($discount) }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-secondary/60" style="font-size:13px;">Shipping Charges</span>
                                <span class="text-green-600 font-semibold" style="font-size:13px;">FREE</span>
                            </div>
                        </div>

                        <hr class="border-gray-200 mb-4">

                        <div class="flex items-center justify-between mb-5">
                            <span class="text-secondary font-bold" style="font-size:15px;">Total Amount</span>
                            <span id="cart-total" class="text-primary font-bold"
                                style="font-size:18px;">₹{{ number_format($total) }}</span>
                        </div>

                        <a href="{{ url('/checkout') }}"
                            class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 rounded-lg transition-colors mb-2 flex items-center justify-center"
                            style="font-size:13px; letter-spacing:0.5px;">
                            PROCEED TO CHECKOUT
                        </a>
                        <p class="text-secondary/40 text-center mb-4" style="font-size:11px;">We accept all major payment
                            methods</p>

                        <div class="bg-gold/10 border border-gold/30 rounded-lg px-4 py-3 flex items-center gap-2.5">
                            <i class="fa-solid fa-truck-fast text-gold"></i>
                            <div>
                                <p class="text-secondary font-semibold" style="font-size:12px;">Free Shipping</p>
                                <p class="text-secondary/50" style="font-size:11px;">Great! You have free shipping</p>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="text-center py-20">
                    <i class="fa-solid fa-cart-shopping text-gray-300 text-5xl mb-4"></i>
                    <p class="text-secondary font-semibold mb-1" style="font-size:16px;">Your cart is empty</p>
                    <p class="text-secondary/50 mb-5" style="font-size:13px;">Add items to get started.</p>
                    <a href="{{ url('/products') }}"
                        class="inline-block bg-primary text-white px-6 py-2.5 rounded-full font-semibold hover:bg-primary/90 transition-colors"
                        style="font-size:14px;">Start Shopping</a>
                </div>
            @endif

        </div>

    </section>

    <script>
        function updateQty(id, action) {
            fetch(`/cart/${action}/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                })
                .then(res => res.json())
                .then(data => {
                    if (data.removed) {
                        document.getElementById(`cart-row-${id}`).remove();
                    } else {
                        const row = document.getElementById(`cart-row-${id}`);
                        row.querySelector('.qty-value').textContent = data.quantity;
                        row.querySelector('.item-total').textContent = '₹' + data.item_total.toLocaleString('en-IN');
                    }

                    updatePriceSummary(data);
                    window.dispatchEvent(new CustomEvent('cart-updated', {
                        detail: {
                            count: data.count
                        }
                    }));

                    if (data.count === 0) location.reload();
                })
                .catch(err => console.error('Cart error:', err));
        }

        function removeCartItem(id) {
            if (!confirm('Remove this item from cart?')) return;

            fetch(`/cart/remove/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById(`cart-row-${id}`).remove();
                    updatePriceSummary(data);
                    window.dispatchEvent(new CustomEvent('cart-updated', {
                        detail: {
                            count: data.count
                        }
                    }));
                    if (data.count === 0) location.reload();
                })
                .catch(err => console.error('Cart error:', err));
        }

        function updatePriceSummary(data) {
            document.getElementById('cart-subtotal').textContent = '₹' + data.subtotal.toLocaleString('en-IN');
            document.getElementById('cart-discount').textContent = '−₹' + data.discount.toLocaleString('en-IN');
            document.getElementById('cart-total').textContent = '₹' + data.total.toLocaleString('en-IN');
            document.getElementById('cart-item-count').textContent = data.count;
            document.getElementById('cart-title-count').textContent = `(${data.count} items)`;
        }
    </script>

    <!-- footer  -->
@endsection
