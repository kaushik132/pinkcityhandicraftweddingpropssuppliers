@extends('dashboard.layout.main')
@section('content')
    <section class="bg-[#faf5ee]">

        <div class="max-w-7xl mx-auto px-4 md:px-0">

            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-secondary/50 flex-wrap mb-5" style="font-size:13px;">
                <a href="#" class="text-primary hover:text-gold transition-colors">Home</a>
                <i class="fa-solid fa-chevron-right text-gray-300 text-[10px]"></i>
                <a href="#" class="text-secondary/50 hover:text-primary transition-colors">Blog</a>
                <i class="fa-solid fa-chevron-right text-gray-300 text-[10px]"></i>
                <a href="#" class="text-primary hover:text-gold transition-colors">{{ $blog->category->name }}</a>
                <i class="fa-solid fa-chevron-right text-gray-300 text-[10px]"></i>
                <span class="text-secondary font-semibold">{{ \Illuminate\Support\Str::limit($blog->title, 30) }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

                <!-- ===== LEFT: ARTICLE ===== -->
                <div class="lg:col-span-2">

                    <p class="text-primary font-semibold uppercase tracking-wide mb-2" style="font-size:11px;">
                        {{ $blog->category->name }}</p>
                    <h1 class="text-secondary font-bold mb-3"
                        style="font-size:26px; line-height:1.3; font-family:'Playfair Display', serif;">
                        {{ $blog->title }}
                    </h1>

                    <!-- Meta row -->
                    <div class="flex items-center justify-between flex-wrap gap-3 mb-5">
                        <div class="flex items-center gap-4 text-secondary/50 flex-wrap" style="font-size:12.5px;">
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar text-primary"></i>
                                {{ $blog->published_at->format('d M Y') }}</span>
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-user text-primary"></i> By Pink
                                City Team</span>
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-primary"></i>
                                {{ $blog->read_time }}</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <span class="text-secondary/50" style="font-size:12px;">Share:</span>
                            <a href="#"
                                class="w-7 h-7 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"><i
                                    class="fa-brands fa-facebook-f text-xs"></i></a>
                            <a href="#"
                                class="w-7 h-7 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"><i
                                    class="fa-brands fa-instagram text-xs"></i></a>
                            <a href="#"
                                class="w-7 h-7 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"><i
                                    class="fa-brands fa-pinterest-p text-xs"></i></a>
                            <a href="#"
                                class="w-7 h-7 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"><i
                                    class="fa-brands fa-whatsapp text-xs"></i></a>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <img src="{{ url('uploads/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full rounded-xl mb-6"
                        style="height:340px; object-fit:cover;">

                    <!-- Article Body -->
                    <div class="flex flex-col gap-4" style="font-size:14.5px; line-height:1.8; color:#1C1208B3;">

                        {!! $blog->content !!}

                    </div>

                    <!-- Continue Reading -->


                </div>

                <!-- ===== RIGHT: SIDEBAR ===== -->
                <div class="flex flex-col gap-6">

                    <!-- About the Author -->
                    <div class="bg-[#FFF2E5] rounded-xl p-6 text-center">
                        <p class="text-primary font-semibold uppercase tracking-wide mb-3" style="font-size:11px;">About the
                            Author</p>
                        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?w=150&q=75"
                            alt="Pink City Team"
                            class="w-16 h-16 rounded-full object-cover mx-auto mb-3 border-2 border-white">
                        <h3 class="text-secondary font-bold mb-1.5" style="font-size:15px;">Pink City Team</h3>
                        <p class="text-secondary/60 mb-4" style="font-size:12px; line-height:1.6;">We are a team of
                            passionate artisans and storytellers who love sharing ideas on décor, handicrafts and festive
                            celebrations.</p>
                        <div class="flex items-center justify-center gap-2.5">
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-white text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"><i
                                    class="fa-brands fa-facebook-f text-xs"></i></a>
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-white text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"><i
                                    class="fa-brands fa-instagram text-xs"></i></a>
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-white text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"><i
                                    class="fa-brands fa-pinterest-p text-xs"></i></a>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-xl shadow-sm p-5">
                        <h3 class="text-secondary font-bold mb-4" style="font-size:14px;">Categories</h3>
                        <div class="flex flex-col gap-3">
                            @foreach ($categories as $cat)
                                <a href="{{ url('/blog') }}?category={{ $cat->slug }}"
                                    class="flex items-center justify-between text-secondary/70 hover:text-primary transition-colors"
                                    style="font-size:13px;">
                                    <span class="flex items-center gap-2"><i
                                            class="{{ $cat->icon }} text-primary/60 w-3.5"></i>
                                        {{ $cat->name }}</span>
                                    <span class="text-secondary/40">({{ $cat->blogs_count }})</span>
                                </a>
                            @endforeach

                        </div>
                    </div>

                    <!-- Popular Posts -->
                    <div class="bg-white rounded-xl shadow-sm p-5">
                        <h3 class="text-secondary font-bold mb-4" style="font-size:14px;">Popular Posts</h3>
                        <div class="flex flex-col gap-4">

                            @foreach ($popularPosts as $post)
                                <a href="{{ route('blog.detail', $post->slug) }}" class="flex items-center gap-3 group">
                                   <img src="{{url('uploads/'.$post->image)  }}" alt="{{ $post->title }}"
                                        class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                                    <div class="min-w-0">
                                        <p class="text-secondary font-semibold group-hover:text-primary transition-colors line-clamp-2"
                                            style="font-size:12px; line-height:1.4;">{{ $post->title }}</p>
                                        <p class="text-secondary/40 mt-0.5" style="font-size:11px;">
                                            {{ $post->published_at->format('d M Y') }}</p>
                                    </div>
                                </a>
                            @endforeach



                        </div>
                    </div>

                    <!-- Promo Banner -->
                    <div class="bg-[#FBE4E9] rounded-xl p-6 text-center">
                        <p class="text-primary font-semibold" style="font-size:13px;">Grand Shaadi Utsav Sale</p>
                        <p class="text-secondary font-bold mb-3" style="font-size:20px;">Up to 60% OFF</p>
                        <div class="flex items-center justify-center gap-3 mb-4">
                            <i class="fa-solid fa-gift text-gold" style="font-size:18px;"></i>
                            <i class="fa-solid fa-tag text-gold" style="font-size:18px;"></i>
                            <i class="fa-solid fa-sparkles text-gold" style="font-size:18px;"></i>
                        </div>
                        <a href="#"
                            class="inline-block bg-primary hover:bg-primary/90 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors"
                            style="font-size:13px;">Shop Now</a>
                    </div>

                </div>

            </div>
        </div>

    </section>
@endsection
