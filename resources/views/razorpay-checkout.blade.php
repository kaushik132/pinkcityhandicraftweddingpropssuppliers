@extends('dashboard.layout.main')
@section('content')
<section class="bg-[#faf5ee] min-h-screen flex items-center justify-center">
  <div class="text-center">
    <p class="text-secondary font-semibold mb-4">Redirecting to secure payment...</p>
    <i class="fa-solid fa-spinner fa-spin text-primary text-3xl"></i>
  </div>
</section>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "{{ $razorpayKey }}",
        "amount": "{{ $amount }}",
        "currency": "INR",
        "name": "Pink City",
        "description": "Order #{{ $order->order_number }}",
        "order_id": "{{ $razorpayOrderId }}",
        "handler": function (response) {
            fetch("{{ route('payment.verify') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json",
                },
                body: JSON.stringify({
                    razorpay_payment_id: response.razorpay_payment_id,
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_signature: response.razorpay_signature,
                    order_id: "{{ $order->id }}",
                }),
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alert("Payment verification failed. Please contact support.");
                    window.location.href = "{{ route('payment') }}";
                }
            });
        },
        "prefill": {
            "name": "{{ $order->full_name }}",
            "contact": "{{ $order->mobile }}",
        },
        "theme": { "color": "#8B2635" },
        "modal": {
            "ondismiss": function() {
                window.location.href = "{{ route('payment') }}";
            }
        }
    };
    var rzp = new Razorpay(options);
    rzp.open();
</script>
@endsection
