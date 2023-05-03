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
</style>

@section('title', 'Toko Batik Online Tegal')
@section('content')
<!-- slides -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($slides as $key => $slide)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <div class="slide-image pb-5" style="background-image: url('{{ Storage::url('images/slides/'. $slide->cover) }}')"></div>
            <div class="carousel-caption d-none d-md-block rounded" style="text-align: center; top: 150px !important;">
                <h1 class="text-light fw-bold" style="font-size: 3rem">{{ $slide->title }}</h1>
                <p class="text-light" style="font-size: 1rem;">
                    {!! $slide->body !!}
                </p>
                <a class="furniture-slider-btn btn-hover btn-primary animated text-white" style="border: 1px solid #fff;" href="{{ $slide->url }}">
                    Belanja Sekarang
                </a>
            </div>
        </div>
        @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- end slides -->

<!-- Promotion Section -->
<div class="promotion wrapper-padding-4 gray-bg pb-80 ms-5">
    <div class="container mt-5">
        <br>
        <div class="row">
            <div class="col-3">
                <div class="single-promotion mb-30" style="margin-left: 100px;">
                    <div class="promotion-img mb-4">
                        <img src="{{ asset('frontend/assets/img/cta/free-shipping.png') }}" alt="" style="width: 50%;">
                    </div>
                    <div class="promotion-text">
                        <h4>Gratis Ongkir</h4>
                        <p>
                            Tanpa minimal pembelian
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="single-promotion mb-30" style="margin-left: 100px;">
                    <div class="promotion-img mb-4">
                        <img src="{{ asset('frontend/assets/img/cta/coupon.png') }}" alt="" style="width: 50%;">
                    </div>
                    <div class="promotion-text">
                        <h4>Promo</h4>
                        <p>
                            Banyak promo menarik
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="single-promotion mb-30" style="margin-left: 100px;">
                    <div class="promotion-img mb-4">
                        <img src="{{ asset('frontend/assets/img/cta/support.png') }}" alt="" style="width: 50%;">
                    </div>
                    <div class="promotion-text">
                        <h4>
                            24/7 Support
                        </h4>
                        <p>
                            Layanan 24 jam
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
    <div class="section-title-furits text-center">
        <h2>
            Kategori Produk
        </h2>
    </div>
    <br>
    <div class="row mt-5">
        @foreach($categories as $category)
        <div class="col-lg-3 mb-5">
            <div class="card category-card">
                <a href="{{ route('shop.index', $category->slug) }}">
                    <img class="img-cover" src="{{ Storage::url('images/categories/'. $category->cover) }}" alt="">
                    <span class="position-absolute category-name" style=" position: absolute;left: 50%;top: 50%;transform: translate(-50%,-50%);background-color: white;padding: .8rem 1rem;border: 3px solid #f0f0f0;">
                        {{ $category->name }}
                    </span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- end categories -->

<!-- products -->
<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
    <div class="container">
        <br>
        <div class="section-title-furits section-title-6 text-center mb-50">
            <h2>Popular Product</h2>
        </div>
        <br>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                @foreach ($products as $product)
                <div class="product-wrapper shadow rounded">
                    <div class="product-img">
                        <a href="{{ route('product.show', $product->slug) }}">
                            @if($product->firstMedia)
                            <img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}" alt="{{ $product->name }}">
                            @else
                            <img src="{{ asset('frontend/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
                            @endif
                        </a>
                        <div class="product-action">
                            <a class="animate-left add-to-fav" title="Wishlist" product-slug="{{ $product->slug }}" href="">
                                <i class="pe-7s-like"></i>
                            </a>
                            <a class="animate-top add-to-card" title="Add To Cart" href="" product-id="{{ $product->id }}" product-slug="{{ $product->slug }}">
                                <i class="pe-7s-cart"></i>
                            </a>
                        </div>
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
    <div class="section-title-furits text-center">
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
</script>