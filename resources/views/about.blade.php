@extends('dashboard.layout.main')
@section('content')



<section class="bg-[#faf5ee] !pt-0">

  <!-- ===== HERO ===== -->
  <div class="relative overflow-hidden py-16 px-4 text-center">
    <img src="https://images.unsplash.com/photo-1617791160505-6f00504e3519?w=1600&q=60" alt="" class="absolute inset-0 w-full h-full object-cover opacity-10 pointer-events-none">
    <div class="relative">
      <p class="text-primary font-semibold uppercase tracking-wide mb-2" style="font-size:12px; letter-spacing:1.5px;">Our Story</p>
      <h1 class="font-bold text-secondary mb-4" style="font-size:34px; line-height:1.25; font-family:'Playfair Display', serif;">
        Crafted in Jaipur, Cherished Everywhere
      </h1>
      <p class="text-secondary/60 max-w-2xl mx-auto" style="font-size:14px; line-height:1.7;">
        Pink City was born from a love for Rajasthan's timeless craftsmanship — bringing handcrafted décor, wedding props, and heirloom pieces from our artisans' workshops straight to your home.
      </p>
    </div>
  </div>

  <!-- ===== OUR STORY ===== -->
  <div class="max-w-7xl mx-auto px-4 md:px-10 py-4">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16">

      <div class="relative">
        <img src="https://images.unsplash.com/photo-1582034986517-30d163aa1da9?w=600&q=75" alt="Artisan at work" class="w-full rounded-2xl" style="height:380px; object-fit:cover;">
        <div class="absolute -bottom-6 -right-6 bg-white rounded-xl shadow-lg p-4 hidden sm:flex items-center gap-3" style="width:220px;">
          <div class="w-11 h-11 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-award text-primary"></i>
          </div>
          <div>
            <p class="text-secondary font-bold" style="font-size:16px; line-height:1;">15+ Years</p>
            <p class="text-secondary/50" style="font-size:11px;">of Artisan Partnership</p>
          </div>
        </div>
      </div>

      <div>
        <p class="text-primary font-semibold uppercase tracking-wide mb-2" style="font-size:12px; letter-spacing:1px;">How It All Began</p>
        <h2 class="text-secondary font-bold mb-4" style="font-size:26px; line-height:1.3; font-family:'Playfair Display', serif;">
          A Tribute to Rajasthan's Timeless Artistry
        </h2>
        <p class="text-secondary/60 mb-3" style="font-size:14px; line-height:1.8;">
          Pink City started in 2009 in the narrow lanes of Chandpole Bazaar, where our founders grew up watching master artisans breathe life into clay, brass, and fabric. What began as a small family workshop has grown into a bridge between Jaipur's finest craftspeople and homes across the world.
        </p>
        <p class="text-secondary/60 mb-5" style="font-size:14px; line-height:1.8;">
          Every piece we sell — from hand-painted blue pottery to intricately carved wedding props — is sourced directly from artisan families, ensuring fair wages and keeping centuries-old traditions alive.
        </p>
        <a href="#" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white font-semibold px-6 py-3 rounded-full transition-colors" style="font-size:13px;">
          Explore Our Collection <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
      </div>

    </div>
  </div>

  <!-- ===== STATS BAR ===== -->
  <div class="bg-primary py-10">
    <div class="max-w-7xl mx-auto px-4 md:px-10 grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">

      <div>
        <p class="text-gold font-bold" style="font-size:30px; font-family:'Playfair Display', serif;">15+</p>
        <p class="text-white/80" style="font-size:12.5px;">Years of Craftsmanship</p>
      </div>
      <div>
        <p class="text-gold font-bold" style="font-size:30px; font-family:'Playfair Display', serif;">120+</p>
        <p class="text-white/80" style="font-size:12.5px;">Artisan Partners</p>
      </div>
      <div>
        <p class="text-gold font-bold" style="font-size:30px; font-family:'Playfair Display', serif;">25,000+</p>
        <p class="text-white/80" style="font-size:12.5px;">Happy Customers</p>
      </div>
      <div>
        <p class="text-gold font-bold" style="font-size:30px; font-family:'Playfair Display', serif;">500+</p>
        <p class="text-white/80" style="font-size:12.5px;">Handcrafted Products</p>
      </div>

    </div>
  </div>

  <!-- ===== OUR VALUES ===== -->
  <div class="max-w-7xl mx-auto px-4 md:px-10 py-16">

    <div class="text-center mb-10">
      <p class="text-primary font-semibold uppercase tracking-wide mb-2" style="font-size:12px; letter-spacing:1px;">What We Stand For</p>
      <h2 class="text-secondary font-bold" style="font-size:26px; font-family:'Playfair Display', serif;">Our Values</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

      <div class="bg-white rounded-xl shadow-sm p-6 text-center">
        <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-4">
          <i class="fa-solid fa-hand-holding-heart text-primary text-lg"></i>
        </div>
        <h3 class="text-secondary font-semibold mb-2" style="font-size:15px;">Authentic Craftsmanship</h3>
        <p class="text-secondary/60" style="font-size:12.5px; line-height:1.7;">Every product is handmade by skilled artisans using traditional techniques passed down for generations.</p>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 text-center">
        <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-4">
          <i class="fa-solid fa-scale-balanced text-primary text-lg"></i>
        </div>
        <h3 class="text-secondary font-semibold mb-2" style="font-size:15px;">Fair Trade</h3>
        <p class="text-secondary/60" style="font-size:12.5px; line-height:1.7;">We partner directly with artisan families, ensuring fair wages and sustainable livelihoods.</p>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 text-center">
        <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-4">
          <i class="fa-solid fa-leaf text-primary text-lg"></i>
        </div>
        <h3 class="text-secondary font-semibold mb-2" style="font-size:15px;">Sustainable Materials</h3>
        <p class="text-secondary/60" style="font-size:12.5px; line-height:1.7;">Natural clay, brass, wood and fabric — sourced responsibly with minimal environmental impact.</p>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 text-center">
        <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center mx-auto mb-4">
          <i class="fa-solid fa-truck-fast text-primary text-lg"></i>
        </div>
        <h3 class="text-secondary font-semibold mb-2" style="font-size:15px;">Reliable Delivery</h3>
        <p class="text-secondary/60" style="font-size:12.5px; line-height:1.7;">Secure packaging and Pan-India delivery, so your heirloom pieces arrive safely, every time.</p>
      </div>

    </div>
  </div>

  <!-- ===== MEET THE ARTISANS ===== -->
  <div class="max-w-7xl mx-auto px-4 md:px-10 pb-16">

    <div class="text-center mb-10">
      <p class="text-primary font-semibold uppercase tracking-wide mb-2" style="font-size:12px; letter-spacing:1px;">The Hands Behind the Craft</p>
      <h2 class="text-secondary font-bold" style="font-size:26px; font-family:'Playfair Display', serif;">Meet Our Artisans</h2>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6">

      <div class="text-center">
        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?w=250&q=75" alt="Ramesh Kumavat" class="w-full rounded-xl mb-3" style="height:200px; object-fit:cover;">
        <p class="text-secondary font-semibold" style="font-size:14px;">Ramesh Kumavat</p>
        <p class="text-primary" style="font-size:12px;">Blue Pottery Master</p>
      </div>

      <div class="text-center">
        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=250&q=75" alt="Meera Devi" class="w-full rounded-xl mb-3" style="height:200px; object-fit:cover;">
        <p class="text-secondary font-semibold" style="font-size:14px;">Meera Devi</p>
        <p class="text-primary" style="font-size:12px;">Textile & Bandhani Artist</p>
      </div>

      <div class="text-center">
        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=250&q=75" alt="Suresh Sharma" class="w-full rounded-xl mb-3" style="height:200px; object-fit:cover;">
        <p class="text-secondary font-semibold" style="font-size:14px;">Suresh Sharma</p>
        <p class="text-primary" style="font-size:12px;">Brass & Metal Craftsman</p>
      </div>

      <div class="text-center">
        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=250&q=75" alt="Kavita Rathore" class="w-full rounded-xl mb-3" style="height:200px; object-fit:cover;">
        <p class="text-secondary font-semibold" style="font-size:14px;">Kavita Rathore</p>
        <p class="text-primary" style="font-size:12px;">Puppet & Folk Art Maker</p>
      </div>

    </div>
  </div>

  <!-- ===== CTA BANNER ===== -->
  <div class="max-w-7xl mx-auto px-4 md:px-10 pb-16">
    <div class="relative rounded-2xl overflow-hidden text-center py-14 px-6">
      <img src="https://images.unsplash.com/photo-1610701596007-11502861dcfa?w=1600&q=60" alt="" class="absolute inset-0 w-full h-full object-cover">
      <div class="absolute inset-0 bg-secondary/70"></div>
      <div class="relative">
        <h2 class="text-white font-bold mb-3" style="font-size:24px; font-family:'Playfair Display', serif;">Bring Home a Piece of Rajasthan's Heritage</h2>
        <p class="text-white/80 max-w-lg mx-auto mb-6" style="font-size:13.5px; line-height:1.7;">Explore our full collection of handcrafted décor, wedding props, and artisan treasures.</p>
        <a href="#" class="inline-block bg-primary hover:bg-primary/90 text-white font-semibold px-8 py-3 rounded-full transition-colors" style="font-size:13px; letter-spacing:0.5px;">SHOP THE COLLECTION</a>
      </div>
    </div>
  </div>

</section>

<!-- footer  -->
@endsection
