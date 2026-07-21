@extends('dashboard.layout.main')
@section('content')
<section class="bg-[#faf5ee] min-h-screen flex items-center justify-center">
  <div class="text-center">
    <p class="text-secondary font-semibold mb-4">Redirecting to secure payment...</p>
    <i class="fa-solid fa-spinner fa-spin text-primary text-3xl"></i>
  </div>
</section>

<script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
<script>
    const cashfree = Cashfree({
        mode: "{{ $cashfreeEnv === 'production' ? 'production' : 'sandbox' }}"
    });

    const checkoutOptions = {
        paymentSessionId: "{{ $paymentSessionId }}",
        redirectTarget: "_self",
    };

    cashfree.checkout(checkoutOptions);
</script>
@endsection
