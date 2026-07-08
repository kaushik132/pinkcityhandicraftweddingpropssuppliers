@extends('dashboard.layout.main')
@section('content')

<section class="bg-[#faf5ee] !pt-0">

  <!-- ===== HERO ===== -->
  <div class="relative overflow-hidden py-14 px-4 text-center">
    <img src="https://images.unsplash.com/photo-1610701596007-11502861dcfa?w=1600&q=60" alt="" class="absolute inset-0 w-full h-full object-cover opacity-10 pointer-events-none">
    <div class="relative">
      <p class="text-primary font-semibold uppercase tracking-wide mb-2" style="font-size:12px; letter-spacing:1.5px;">Get in Touch</p>
      <h1 class="font-bold text-secondary mb-4" style="font-size:32px; line-height:1.25; font-family:'Playfair Display', serif;">
        We'd Love to Hear From You
      </h1>
      <p class="text-secondary/60 max-w-xl mx-auto" style="font-size:14px; line-height:1.7;">
        Questions about an order, bulk wedding décor needs, or just want to say hello? Our team in Jaipur is here to help.
      </p>
    </div>
  </div>

  <!-- ===== MAIN CONTENT ===== -->
  <div class="max-w-7xl mx-auto px-4 md:px-10 pb-14 pt-6">

    <!-- Quick Contact Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-10">

      <div class="bg-white rounded-xl shadow-sm p-5 flex items-start gap-3.5">
        <div class="w-11 h-11 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
          <i class="fa-solid fa-location-dot text-primary"></i>
        </div>
        <div>
          <p class="text-secondary font-semibold mb-1" style="font-size:13.5px;">Visit Our Studio</p>
          <p class="text-secondary/60" style="font-size:12.5px; line-height:1.6;">14, Chandpole Bazaar, Jaipur, Rajasthan 302001, India</p>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-5 flex items-start gap-3.5">
        <div class="w-11 h-11 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
          <i class="fa-solid fa-phone text-primary"></i>
        </div>
        <div>
          <p class="text-secondary font-semibold mb-1" style="font-size:13.5px;">Call Us</p>
          <p class="text-secondary/60" style="font-size:12.5px; line-height:1.6;">+91 98765 43210<br>Mon–Sat, 10 AM – 7 PM</p>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-5 flex items-start gap-3.5">
        <div class="w-11 h-11 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
          <i class="fa-solid fa-envelope text-primary"></i>
        </div>
        <div>
          <p class="text-secondary font-semibold mb-1" style="font-size:13.5px;">Email Us</p>
          <p class="text-secondary/60" style="font-size:12.5px; line-height:1.6;">hello@pinkcity.com<br>We reply within 24 hours</p>
        </div>
      </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-start">

      <!-- ===== LEFT: CONTACT FORM ===== -->
      <div class="lg:col-span-3 bg-white rounded-xl shadow-sm p-6 md:p-8">
        <h2 class="text-secondary font-bold mb-1" style="font-size:20px;">Send Us a Message</h2>
        <p class="text-secondary/50 mb-6" style="font-size:13px;">Fill the form below and our team will get back to you shortly.</p>

        <form action="{{route('contact.submit')}}" method="POST">
            @csrf




          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            <div>
              <label for="c_name" class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Full Name <span class="text-primary">*</span></label>
              <input type="text" id="c_name" name="name"  value="{{old('name')}}" placeholder="Enter your full name" class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
              <span class="text-red-500 text-sm mt-1 block">@error('name') {{ $message }} @enderror</span>
            </div>
            <div>
              <label for="c_email" class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Email Address <span class="text-primary">*</span></label>
              <input type="email" id="c_email" name="email" value="{{old('email')}}"  placeholder="Enter your email" class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
                            <span class="text-red-500 text-sm mt-1 block">@error('email') {{ $message }} @enderror</span>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            <div>
              <label for="c_phone" class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Phone Number</label>
              <input type="text" maxlength="10" id="c_phone" name="phone" value="{{old('phone')}}" placeholder="Enter your phone number" class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
                            <span class="text-red-500 text-sm mt-1 block">@error('phone') {{ $message }} @enderror</span>
            </div>
            <div>
              <label for="c_subject" class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Subject <span class="text-primary">*</span></label>
              <select id="c_subject" name="subject"  class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40" style="font-size:13px;">
                <option value="">Choose a topic...</option>
                <option value="order">Order Enquiry</option>
                <option value="bulk">Bulk / Wedding Order</option>
                <option value="custom">Custom Handicraft Request</option>
                <option value="support">Customer Support</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>

          <div class="mb-5">
            <label for="c_message" class="text-secondary font-semibold block mb-1.5" style="font-size:13px;">Your Message <span class="text-primary">*</span></label>
            <textarea id="c_message" name="message" rows="5"   placeholder="Tell us how we can help..." class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 outline-none focus:border-primary transition-colors text-secondary bg-[#faf5ee]/40 resize-none" style="font-size:13px;"></textarea>
            <span class="text-red-500 text-sm mt-1 block">@error('message') {{ $message }} @enderror</span>
          </div>

          <button type="submit" class="bg-primary hover:bg-primary/90 text-white font-semibold px-8 py-3 rounded-full transition-colors flex items-center gap-2" style="font-size:13px; letter-spacing:0.5px;">
            <i class="fa-solid fa-paper-plane text-xs"></i> SEND MESSAGE
          </button>

        </form>
      </div>

      <!-- ===== RIGHT: MAP + SOCIAL + HOURS ===== -->
      <div class="lg:col-span-2 flex flex-col gap-6">

        <!-- Map -->
        <div class="rounded-xl overflow-hidden shadow-sm" style="height:220px;">
          <iframe
            src="https://www.google.com/maps?q=Chandpole%20Bazaar%20Jaipur&output=embed"
            width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Pink City Studio Location">
          </iframe>
        </div>

        <!-- Working Hours -->
        <div class="bg-white rounded-xl shadow-sm p-5">
          <h3 class="text-secondary font-bold mb-4 flex items-center gap-2" style="font-size:14px;">
            <i class="fa-regular fa-clock text-primary"></i> Working Hours
          </h3>
          <div class="flex flex-col gap-2.5">
            <div class="flex items-center justify-between">
              <span class="text-secondary/60" style="font-size:13px;">Monday – Saturday</span>
              <span class="text-secondary font-semibold" style="font-size:13px;">10:00 AM – 7:00 PM</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-secondary/60" style="font-size:13px;">Sunday</span>
              <span class="text-secondary font-semibold" style="font-size:13px;">Closed</span>
            </div>
          </div>
        </div>

        <!-- Social -->
        <div class="bg-primary rounded-xl p-6 text-center">
          <h3 class="text-white font-bold mb-1.5" style="font-size:15px;">Follow Our Journey</h3>
          <p class="text-white/80 mb-4" style="font-size:12px; line-height:1.6;">See our latest handcrafted pieces and behind-the-scenes artisan stories.</p>
          <div class="flex items-center justify-center gap-3">
            <a href="#" class="w-9 h-9 rounded-full bg-white text-primary flex items-center justify-center hover:bg-gold hover:text-white transition-colors"><i class="fa-brands fa-facebook-f text-sm"></i></a>
            <a href="#" class="w-9 h-9 rounded-full bg-white text-primary flex items-center justify-center hover:bg-gold hover:text-white transition-colors"><i class="fa-brands fa-instagram text-sm"></i></a>
            <a href="#" class="w-9 h-9 rounded-full bg-white text-primary flex items-center justify-center hover:bg-gold hover:text-white transition-colors"><i class="fa-brands fa-pinterest-p text-sm"></i></a>
            <a href="#" class="w-9 h-9 rounded-full bg-white text-primary flex items-center justify-center hover:bg-gold hover:text-white transition-colors"><i class="fa-brands fa-whatsapp text-sm"></i></a>
          </div>
        </div>

      </div>

    </div>
  </div>

</section>

<!-- footer  -->
@endsection
