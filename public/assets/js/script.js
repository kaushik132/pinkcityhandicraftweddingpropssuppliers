AOS.init({
  duration: 800,
  once: true,
});

// hero slider js

const heroSwiper = new Swiper('.hero-swiper', {
  loop: true,
  speed: 900,
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
  },
  effect: 'fade',
  fadeEffect: { crossFade: true },
  pagination: {
    el: '.hero-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.hero-next',
    prevEl: '.hero-prev',
  },
});

// categroy slider js

const categorySwiper = new Swiper('.category-swiper', {
  slidesPerView: 2,
  spaceBetween: 16,
  loop: true,
  speed: 600,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.category-next',
    prevEl: '.category-prev',
  },
  breakpoints: {
    640: { slidesPerView: 3, spaceBetween: 16 },
    1024: { slidesPerView: 6, spaceBetween: 16 },
  },
});


// BEST SELLING JS SLIDER


const productSwiper = new Swiper('.product-swiper', {
  slidesPerView: 2,
  spaceBetween: 16,
  loop: true,
  speed: 600,
  autoplay: {
    delay: 3200,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.product-next',
    prevEl: '.product-prev',
  },
  pagination: {
    el: '.product-pagination',
    clickable: true,
  },
  breakpoints: {
    640: { slidesPerView: 3, spaceBetween: 16 },
    1024: { slidesPerView: 4, spaceBetween: 24 },
  },
});


// testomonials slider js

  const testimonialSwiper = new Swiper('.testimonial-swiper', {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    speed: 700,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.testimonial-pagination',
      clickable: true,
    },
    breakpoints: {
      640:  { slidesPerView: 2, spaceBetween: 20 },
      1024: { slidesPerView: 3, spaceBetween: 24 },
    },
  });


/* Countdown Timer */
(function () {
  const hoursEl = document.getElementById('flash-hours');
  const minsEl  = document.getElementById('flash-mins');
  const secsEl  = document.getElementById('flash-secs');

  // Ye elements is page pe nahi hain to countdown skip — koi error nahi aayega
  if (!hoursEl || !minsEl || !secsEl) return;

  const now = new Date();
  const midnight = new Date();
  midnight.setHours(23, 59, 59, 0);
  let diff = Math.floor((midnight - now) / 1000);

  function pad(n) { return String(n).padStart(2, '0'); }

  function tick() {
    if (diff <= 0) { diff = 0; }
    const h = Math.floor(diff / 3600);
    const m = Math.floor((diff % 3600) / 60);
    const s = diff % 60;
    hoursEl.textContent = pad(h);
    minsEl.textContent  = pad(m);
    secsEl.textContent  = pad(s);
    if (diff > 0) { diff--; setTimeout(tick, 1000); }
  }
  tick();
})();

  /* Flash Swiper */
  const flashSwiper = new Swiper('.flash-swiper', {
    slidesPerView: 2,
    spaceBetween: 16,
    loop: true,
    speed: 600,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.flash-next',
      prevEl: '.flash-prev',
    },
    pagination: {
      el: '.flash-pagination',
      clickable: true,
    },
    breakpoints: {
      640:  { slidesPerView: 3, spaceBetween: 16 },
      1024: { slidesPerView: 4, spaceBetween: 20 },
    },
  });





  // product detail page js


const relatedSwiper = new Swiper('.related-swiper', {
  slidesPerView: 2,
  spaceBetween: 16,
  loop: true,
  speed: 600,
  autoplay: {
    delay: 3200,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: { slidesPerView: 3, spaceBetween: 16 },
    1024: { slidesPerView: 4, spaceBetween: 24 },
  },
});

function toggleWishlist(btn, productId) {
    fetch(`/wishlist/toggle/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
    })
    .then(res => {
         console.log('Status:', res.status);
        if (res.status === 401) {
            window.dispatchEvent(new CustomEvent('open-login-modal'));
            return null;
        }
        return res.json();
    })
    .then(data => {
          console.log('Data:', data);
        if (!data) return;

        const icon = btn.querySelector('i');
        if (data.status === 'added') {
            icon.classList.remove('fa-regular');
            icon.classList.add('fa-solid', 'text-primary');
            btn.dataset.wishlisted = '1';
        } else {
            icon.classList.remove('fa-solid', 'text-primary');
            icon.classList.add('fa-regular');
            btn.dataset.wishlisted = '0';
        }

        // Header count ko live update karo
        window.dispatchEvent(new CustomEvent('wishlist-updated', {
            detail: { count: data.count }
        }));
    })
    .catch(err => console.error('Wishlist error:', err));
}


function addToCart(productId, btn) {
    const originalText = btn.textContent;
    btn.textContent = 'Adding...';
    btn.disabled = true;

    fetch(`/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
    })
    .then(res => {
        if (res.status === 401) {
            window.dispatchEvent(new CustomEvent('open-login-modal'));
            return null;
        }
        return res.json();
    })
    .then(data => {
        if (!data) return;
        window.dispatchEvent(new CustomEvent('cart-updated', { detail: { count: data.count } }));
        btn.textContent = 'Added ✓';
        setTimeout(() => { btn.textContent = originalText; btn.disabled = false; }, 1500);
    })
    .catch(err => {
        console.error('Cart error:', err);
        btn.textContent = originalText;
        btn.disabled = false;
    });
}


