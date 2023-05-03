@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4 bg-custom-dark border-0 py-4">
        <div class="card-header py-3 d-flex bg-custom-dark">
            <h4 class="m-0 font-weight-bold text-light">
                {{ $product->name }}
            </h4>
            <div class="ml-auto">
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
                    <span class="text">
                        <i class="fa fa-arrow-left"></i>
                        Kembali
                    </span>
                </a>
            </div>
        </div>
        <div class="px-4">
            <div class="row">
                <div class="col-5">
                    @if($product->firstMedia)
                    <img class="rounded" src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}" width="100%" height="auto" alt="{{ $product->name }}">
                    @else
                    <span class="badge badge-danger">no image</span>
                    @endif
                </div>
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Stock</th>
                            <td>{{ $product->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>Rp.{{ number_format($product->price) }}</td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>{{ $product->weight }} (gram)</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $product->category ? $product->category->name : NULL }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($product->status == "1")
                                <span class="badge badge-success">Tersedia</span>
                                @else
                                <span class="badge badge-danger">Habis</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Deskripsi
                            </th>
                            <td>
                                {!! $product->description !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const table = document.querySelector('.table');
    table.removeAttribute('id');
</script>
@endsection