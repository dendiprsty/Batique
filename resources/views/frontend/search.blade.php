@extends('layouts.frontend')
@section('content')
@if (count($products) > 0)
<div class="popular-product-area wrapper-padding-3 pb-115">
  <div class="container-fluid">
    <br>
    <div class="section-title-furits section-title-6 text-center mb-50">
      <h2>Hasil Pencarian</h2>
    </div>
    <br>
    <div class="product-style">
      <div class="popular-product-active owl-carousel">
        @foreach ($products as $product)
        <div class="product-wrapper card border-1 pb-3 shadow-sm">
          <div class="product-img m-2">
            <a href="{{ route('product.show', $product->slug) }}">
              @if($product->firstMedia)
              <img class="rounded" src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}" alt="{{ $product->name }}">
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

  <!-- Pagination -->
  <div class="pagination">

  </div>
  <!-- Akhir -->
  @else
  <div class="container text-center my-5">
    <p class="text-dark">Tidak ditemukan produk untuk "{{ request('q') }}".</p>
  </div>
  @endif
</div>

@endsection