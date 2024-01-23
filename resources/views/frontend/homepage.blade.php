@extends('layouts.frontend')

<style>
    .slide-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        filter: blur(5px);
    }

    .btn-warning {
        color: #fff;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        color: #fff;
        background-color: #ffa000;
        border-color: #ffa000;
    }

    .btn-warning:focus,
    .btn-warning.focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
    }

    .btn-warning.disabled,
    .btn-warning:disabled {
        color: #fff;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:not(:disabled):not(.disabled):active,
    .btn-warning:not(:disabled):not(.disabled).active,
    .show>.btn-warning.dropdown-toggle {
        color: #fff;
        background-color: #ff9800;
        border-color: #ff9800;
    }

    .btn-warning:not(:disabled):not(.disabled):active:focus,
    .btn-warning:not(:disabled):not(.disabled).active:focus,
    .show>.btn-warning.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5), 0 0 0 0.2rem rgba(255, 152, 0, 0.5);
    }

    .nav-pills .active {
        color: #fff;
        background-color: #ff9800;
        border-color: #ff9800;
    }

    .col-2 {
        width: 20% !important;
    }

    .card-kategori {
        position: relative;
        overflow: hidden;
    }

    .card-kategori img {
        transition: transform 0.5s;
    }

    .card-kategori:hover img {
        transform: scale(1.0);
    }

    .category-name {
        background-color: rgba(0, 0, 0, 0.47);
        color: #fff;
        font-size: 1rem;
        padding: 0.5rem 1rem;
        opacity: 0;
        transition: opacity 0.5s;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1;
    }

    .card-kategori:hover .category-name {
        opacity: 1;
    }
</style>

@section('title', 'Toko Batik Online Tegal')
@section('content')

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="margin-top: 200px;">
    <div class="carousel-inner px-5 pt-2">
        <div class="carousel-item active">
            <img src="{{ asset('frontend/assets/img/slider/slide1.webp') }}" class="d-block w-100 rounded-4" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/assets/img/slider/slide3.webp') }}" class="d-block w-100 rounded-4" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/assets/img/slider/slide2.webp') }}" class="d-block w-100 rounded-4" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Promotion Section -->
<div class="promotion">
    <div class="container mt-5 pl-5">
        <br>
        <div class="row text-center">
            <div class="col-2">
                <div class="single-promotion mb-30">
                    <div class="promotion-img mb-4">
                        <img src="{{ asset('frontend/assets/img/cta/free-shipping.png') }}" alt="" style="width: 30%;" data-aos="fade-down">
                    </div>
                    <div class="promotion-text">
                        <h4>Gratis Ongkir</h4>
                        <p>
                            Tanpa minimal pembelian
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="single-promotion mb-30">
                    <div class="promotion-img mb-4">
                        <img src="{{ asset('frontend/assets/img/cta/coupon.png') }}" alt="" style="width: 30%;" data-aos="fade-down">
                    </div>
                    <div class="promotion-text">
                        <h4>Promo</h4>
                        <p>
                            Banyak promo menarik
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="single-promotion mb-30">
                    <div class="promotion-img mb-4">
                        <img src="{{ asset('frontend/assets/img/cta/branded.png') }}" alt="" style="width: 30%;" data-aos="fade-down">
                    </div>
                    <div class="promotion-text">
                        <h4>
                            Top Brand
                        </h4>
                        <p>
                            Barang Berkualitas
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="single-promotion mb-30">
                    <div class="promotion-img mb-4">
                        <img src="{{ asset('frontend/assets/img/cta/local.png') }}" alt="" style="width: 30%;" data-aos="fade-down">
                    </div>
                    <div class="promotion-text">
                        <h4>
                            100% Lokal
                        </h4>
                        <p>
                            Support produk lokal
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="single-promotion mb-30">
                    <div class="promotion-img mb-4">
                        <img src="{{ asset('frontend/assets/img/cta/support.png') }}" alt="" style="width: 30%;" data-aos="fade-down">
                    </div>
                    <div class="promotion-text">
                        <h4>
                            Layanan
                        </h4>
                        <p>
                            Bantuan 24 jam
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Promotion Section -->

<!-- categories -->
<div class="container mt-5">
    <div class="section-title-furits">
        <h2>
            Kategori Pilihan
        </h2>
    </div>
    <br>
    <div class="row mt-5">
        @foreach($categories as $category)
        <div class="col-lg-3 mb-5">
            <div class="card border-0 card-kategori">
                <a href="{{ route('shop.index', $category->slug) }}">
                    <img class="img-cover" src="{{ Storage::url('images/categories/'. $category->cover) }}" alt="">
                    <span class="position-absolute category-name rounded">
                        {{ $category->name }}
                    </span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Card Kategori Warna-Warni -->
    <div class="row">
        <div class="col 2">
            <a href="/shop/aksesoris">
                <div class="card p-3 text-center fw-bold text-white border-0 shadow-sm" style="background-image: linear-gradient( 109.6deg,  rgba(61,131,97,1) 11.2%, rgba(28,103,88,1) 91.1% );">Aksesoris</div>
            </a>
        </div>
        <div class="col 2">
            <a href="/shop/batik-formal">
                <div class="card p-3 text-center fw-bold text-white border-0 shadow-sm" style="background-image: radial-gradient( circle 815px at 23.4% -21.8%,  rgba(9,29,85,1) 0.2%, rgba(0,0,0,1) 100.2% );">Batik Formal</div>
            </a>
        </div>
        <div class="col 2">
            <a href="/shop/batik-couple">
                <div class="card p-3 text-center fw-bold text-white border-0 shadow-sm" style="background-image: radial-gradient( circle 897px at 9% 80.3%,  rgba(55,60,245,1) 0%, rgba(234,161,15,0.90) 100.2% );">Batik Couple</div>
            </a>
        </div>
        <div class="col 2">
            <a href="/shop/kebaya">
                <div class="card p-3 text-center fw-bold text-white border-0 shadow-sm" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(14,174,87,1) 0%, rgba(12,116,117,1) 90% );">Kebaya</div>
            </a>
        </div>
        <div class="col 2">
            <a href="/shop/kain-batik">
                <div class="card p-3 text-center fw-bold text-white border-0 shadow-sm" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(237,3,32,0.87) 20.8%, rgba(242,121,1,0.84) 74.4% );">Kain Batik</div>
            </a>
        </div>
        <div class="col 2">
            <a href="/shop/handicraft">
                <div class="card p-3 text-center fw-bold text-white border-0 shadow-sm" style="background-image: radial-gradient( circle 325px at 19.2% 64.8%,  rgba(254,62,101,1) 9.7%, rgba(166,24,146,1) 91.3% );">Handicraft</div>
            </a>
        </div>
    </div>
</div>
<!-- end categories -->

<!-- products -->
<div class="popular-product-area wrapper-padding-3 pt-2 pb-4">
    <div class="container">
        <br>
        <div class="section-title-furits section-title-6 text-left mb-50">
            <h2>
                Produk Terbaru
            </h2>
        </div>
        <br>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                @foreach ($products as $product)
                <div class="product-wrapper shadow-sm rounded">
                    <div class="product-img">
                        <a href="{{ route('product.show', $product->slug) }}">
                            @if($product->firstMedia)
                            <img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}" alt="{{ $product->name }}">
                            @else
                            <img src="{{ asset('frontend/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
                            @endif
                        </a>
                        <!-- <div class="product-action">
                            <a class="animate-left add-to-fav" title="Wishlist" product-slug="{{ $product->slug }}" href="">
                                <i class="pe-7s-like"></i>
                            </a>
                            <a class="animate-top add-to-card" title="Add To Cart" href="" product-id="{{ $product->id }}" product-slug="{{ $product->slug }}">
                                <i class="pe-7s-cart"></i>
                            </a>
                        </div> -->
                    </div>
                    <div class="funiture-product-content text-center">
                        <h4><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                        <span>Rp.{{ number_format($product->price) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end products -->

<!-- Brands -->
<div class="container">
    <div class="section-title-furits">
        <h2>
            Brand Popular
        </h2>
    </div>
    <br><br><br>
    <ul class="logogrid">
        <li class="logogrid__item">
            <img src="{{ asset('frontend/assets/img/brands/erigo.png') }}" class="logogrid__img" alt="ERIGO">
        </li>
        <li class="logogrid__item">
            <img src="{{ asset('frontend/assets/img/brands/danar.png') }}" class="logogrid__img" alt="danar" style="width: 500px">
        </li>
        <li class="logogrid__item">
            <img src="{{ asset('frontend/assets/img/brands/batikkeris.png') }}" class="logogrid__img" alt="batikkeris" style="width: 500px">
        </li>
        <li class="logogrid__item">
            <img src="{{ asset('frontend/assets/img/brands/semar.png') }}" class="logogrid__img" alt="batisemar">
        </li>
        <li class="logogrid__item">
            <img src="{{ asset('frontend/assets/img/brands/alleira.png') }}" class="logogrid__img" alt="alleira" style="width: 800px">
        </li>
    </ul>

</div>
<!-- End Brands -->

<!-- Line Dotted -->
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="line-dotted" style="width: 100%; height: 1px; border-top: 1px dotted #000;"></div>
        </div>
    </div>
    <h4 class="mt-3">
        <p class="fw-bold">
            Belanja Batik Mudah dan Aman di Batique
        </p>
    </h4>
    <p class="text-justify text-dark">
        Batique merupakan salah satu situs penjualan batik online di Indonesia yang memiliki perkembangan yang pesat. Tujuan Batique adalah untuk memudahkan masyarakat Indonesia dalam membeli dan menjual produk-produk batik secara online.Dengan Batique, kamu bisa menikmati proses pembelian produk batik yang lebih mudah, cepat, dan efisien. Selain itu, para penjual juga dapat memanfaatkan platform Batique untuk menjual produk batik mereka secara online.
        Untuk kamu yang ingin memulai bisnis dan jualan online di bidang batik, Batique menyediakan komunitas khusus untuk para penjual. Komunitas ini membantu para penjual untuk memperluas bisnis mereka dan belajar dari pengalaman penjual lainnya di Batique.Dengan adanya Batique, kita bisa lebih mudah mendapatkan produk-produk batik yang berkualitas tinggi dan mendukung perkembangan industri batik di Indonesia.
    </p>
</div>

@endsection

<script>
    var navTabs = document.querySelectorAll('.nav-link');
    for (var i = 0; i < navTabs.length; i++) {
        navTabs[i].addEventListener('click', function() {
            var current = document.getElementsByClassName('active');
            current[0].className = current[0].className.replace(' active', '');
            this.className += ' active';
        });
    }

    const cards = document.querySelectorAll('.card-kategori');

    cards.forEach((card) => {
        card.addEventListener('mouseover', () => {
            card.classList.add('border-2', 'border-primary', 'shadow-lg');
        });

        card.addEventListener('mouseout', () => {
            card.classList.remove('border-2', 'border-primary', 'shadow-lg');
        });
    });
</script>

<script>
    $('#owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        nav: true,
        items: 2,
    })
</script>