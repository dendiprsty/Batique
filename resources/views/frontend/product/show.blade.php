@extends('layouts.frontend')
@section('title', $product->name)
@section('content')

<div class="product-details pt-200">

    <!-- Alert to Cart -->
    <div class="container">
        @if(session()->has('message'))
        <div class="alert rounded border-0 shadow-sm alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert" id="alert-message">
            Barang telah ditambahkan ke keranjang
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <!-- Detail Product -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <!-- Product Image -->
                <div class="product-details-img-content">
                    <div class="product-details-tab mr-70">
                        @if($product->media_count)
                        <div class="product-details-large tab-content">
                            @foreach ($product->media as $media)
                            <div class="tab-pane {{ $loop->index == 0 ? 'active' : '' }} show fade" id="pro-details{{ $loop->index }}" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    @if($product->media)
                                    <a href="{{ asset('storage/images/products/' . $media->file_name ) }}">
                                        <img src="{{ asset('storage/images/products/' . $media->file_name ) }}" alt="{{ $product->name }}">
                                    </a>
                                    @else
                                    <img src="{{ asset('img/no-img.png' ) }}" alt="{{ $product->name }}">
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <img src="{{ asset('img/no-img.png' ) }}" alt="{{ $product->name }}">
                        @endif
                    </div>
                </div>
            </div>

            <!-- Product Detail -->
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h3>{{ $product->name }}</h3>
                    <div class="details-price">
                        <span>Rp.{{ number_format($product->price) }}</span>
                    </div>
                    <!-- Detail/Deskripsi Produk -->
                    <div class="mt-2">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Detail</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                <p>{!! $product->details !!}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Products Detail -->
                    <table class="table mt-2">
                        <tr>
                            <td><strong>Stok</strong></td>
                            <td>:</td>
                            <td>
                                @if($product->quantity > 0)
                                <strong>{{ $product->quantity }}</strong>
                                @else
                                <span class="badge bg-danger">Stok Habis</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Rating</strong>
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <span class="score">
                                    <div class="score-wrap">
                                        @if($product->approved_reviews_avg_rating)
                                        @for($i = 0; $i < 5; $i++) <span class="stars-active">
                                            <i class="{{ round($product->approved_reviews_avg_rating) <= $i ? 'far' : 'fas' }} fa-star"></i>
                                </span>
                                @endfor
                                @else
                                @for($i = 0; $i < 5; $i++) <i class="far fa-star"></i>
                                    @endfor
                                    @endif
                                    ({{ $product->approved_reviews_count }})
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Kategori</strong>
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <a href="{{ route('shop.index', $product->category->slug) }}">
                                    {{ $product->category->name }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tags</strong>
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                @if($product->tags->count() > 0)
                                @foreach($product->tags as $tag)
                                <a href="{{ route('shop.tag', $tag->slug) }}">
                                    {{ $tag->name }}
                                </a>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Bagikan Ke</strong>
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank" style="margin-right: 10px;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank" style="margin-right: 10px;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}" target="_blank" style="margin-right: 10px;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode(Request::fullUrl()) }}" target="_blank" style="margin-right: 10px;">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </td>

                        </tr>
                    </table>
                    <!-- End Tabel Products Detail -->

                    <!-- Button Cart -->
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="quickview-plus-minus">
                            <div class="quickview-btn-wishlist rounded me-2">
                                <a class="btn-hover rounded" href="#"><i class="pe-7s-like"></i></a>
                            </div>
                            <div class="cart-plus-minus rounded">
                                <input type="number" name="qty" min="1" value="1" class="cart-plus-minus-box rounded" placeholder="qty">
                            </div>
                            <div class="quickview-btn-cart">
                                <button type="submit" class="submit rounded border-0 contact-btn btn-hover">Tambah ke Keranjang</button>
                            </div>
                        </div>
                    </form>

                    <div class="rating-number mt-4">
                        <div class="quick-view-number">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</div>

<!-- Ulasan -->
<div class="product-description-review-area pb-90">
    <div class="container">
        <div class="line-dotted my-5" style="width: 100%; height: 1px; border-top: 1px dotted #000;"></div>
        <div class="product-description-review text-center">
            <div class="description-review-title nav" role=tablist>
                <a data-bs-toggle="tab" data-bs-target="#pro-review" role="tab" aria-selected="true">Ulasan Pembeli ({{ $product->approved_reviews_count }})</a>
            </div>
            <div class="description-review-text tab-content">
                <div class="tab-pane fade" role="tabpanel">
                    <p>{!! $product->details !!}</p>
                </div>
                <div class="col-12">
                    <livewire:shop.single-product-review-component :product="$product" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popular-product-area wrapper-padding-3 pb-115">
    <div class="container-fluid">
        <br>
        <div class="section-title-furits section-title-6 mb-50">
            <h2>
                <span>Produk Terkait</span>
            </h2>
        </div>
        <br>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                @foreach ($relatedProducts as $product)
                <div class="product-wrapper">
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
@endsection