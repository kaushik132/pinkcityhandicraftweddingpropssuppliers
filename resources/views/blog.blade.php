@extends('dashboard.layout.main')
@section('content')
    <section class="bg-[#faf5ee] !pt-0">

        <!-- ===== HERO BANNER ===== -->
        <div class="relative overflow-hidden py-14 px-4 text-center">

            <!-- Background Image -->
            <img src="https://images.unsplash.com/photo-1617791160505-6f00504e3519?w=1600&q=60" alt=""
                class="absolute inset-0 w-full h-full object-cover opacity-15 pointer-events-none">

            <div class="relative">
                <h1 class="font-bold text-primary mb-4"
                    style="font-size:34px; line-height:1.25; font-family: 'Playfair Display', serif;">
                    Ideas, Inspiration &amp; Insights<br class="hidden sm:block"> from Pink City
                </h1>
                <p class="text-secondary/60 max-w-xl mx-auto" style="font-size:14px; line-height:1.7;">
                    Discover inspiring stories, home décor ideas, wedding styling tips, artisan craftsmanship, and the
                    latest trends in handcrafted living.
                </p>
            </div>
        </div>

        <!-- ===== MAIN CONTENT ===== -->
        <div class="max-w-7xl mx-auto px-4 md:px-0 pt-10">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

                <!-- ===== LEFT: ARTICLES ===== -->
                <div class="lg:col-span-2">

                    <!-- Header row -->
                    <div class="flex items-center justify-between mb-5 flex-wrap gap-3">
                        <h2 class="text-secondary font-bold" style="font-size:18px;">Latest Articles</h2>
                        <select class="border border-gray-200 rounded-lg px-3 py-2 text-secondary/70 outline-none bg-white"
                            style="font-size:13px;"
                            onchange="window.location.href = this.value ? '{{ url('/blog') }}?category=' + this.value : '{{ url('/blog') }}'">
                            <option value="">Categories</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->slug }}"
                                    {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Articles Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @forelse($blogs as $blog)
                            <article>
                                <a href="{{ route('blog.detail', $blog->slug) }}"
                                    class="relative block rounded-xl overflow-hidden mb-3" style="height:170px;">
                                    <span
                                        class="absolute top-3 left-3 z-10 bg-white text-secondary font-bold rounded-md px-2.5 py-1 text-center leading-tight"
                                        style="font-size:11px;">
                                        {{ $blog->published_at->format('d') }}<br>
                                        <span class="font-normal text-secondary/50"
                                            style="font-size:9px;">{{ $blog->published_at->format('M') }}</span>
                                    </span>
                                    <img src="{{ url('uploads/'.$blog->image) }}" alt="{{ $blog->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                </a>
                                <p class="text-primary font-semibold uppercase tracking-wide mb-1" style="font-size:10px;">
                                    {{ $blog->category->name }}</p>
                                <h3 class="text-secondary font-semibold mb-1.5" style="font-size:15px; line-height:1.4;">
                                    <a href="{{ route('blog.detail', $blog->slug) }}"
                                        class="hover:text-primary transition-colors">{{ $blog->title }}</a>
                                </h3>
                                <p class="text-secondary/50 mb-2" style="font-size:12.5px; line-height:1.6;">
                                    {{ $blog->excerpt }}</p>
                                <a href="{{ route('blog.detail', $blog->slug) }}"
                                    class="inline-flex items-center gap-1.5 text-primary font-semibold hover:text-gold transition-colors"
                                    style="font-size:12px;">Read More <i
                                        class="fa-solid fa-chevron-right text-[9px]"></i></a>
                            </article>
                        @empty
                            <p class="text-secondary/50 col-span-2">Koi blog abhi available nahi hai.</p>
                        @endforelse
                    </div>

                    <!-- Load More button ki jagah pagination -->
                    <div class="mt-8">
                        {{ $blogs->links() }}
                    </div>

                    <!-- Load More -->


                </div>

                <!-- ===== RIGHT: SIDEBAR ===== -->
                <div class="flex flex-col gap-6">

                    <!-- Search Blog -->
                    <div class="bg-white rounded-xl shadow-sm p-5">
                        <h3 class="text-secondary font-bold mb-3" style="font-size:14px;">Search Blog</h3>
                        <form action="{{ route('blog') }}" method="GET"
                            class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search articles..."
                                class="flex-1 px-3.5 py-2.5 outline-none text-secondary bg-[#faf5ee]/30"
                                style="font-size:13px;">
                            <button type="submit" class="bg-primary px-4 py-2.5 flex-shrink-0">
                                <i class="fa-solid fa-magnifying-glass text-white text-xs"></i>
                            </button>
                        </form>
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

                    <div class="bg-primary rounded-xl p-6 text-center">
                        <h3 class="text-white font-bold mb-1.5" style="font-size:15px;">Stay Inspired!</h3>
                        <p class="text-white/80 mb-4" style="font-size:12px; line-height:1.6;">Subscribe to our newsletter
                            for the latest tips and exclusive offers.</p>
                        <form class="flex flex-col gap-2.5">
                            <input type="email" placeholder="Enter your email"
                                class="w-full px-4 py-2.5 rounded-full outline-none text-secondary bg-white"
                                style="font-size:13px;">
                            <button type="submit"
                                class="w-full bg-white text-primary font-semibold py-2.5 rounded-full hover:bg-gold hover:text-white transition-colors"
                                style="font-size:13px;">Subscribe Now</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- footer  -->
@endsection
