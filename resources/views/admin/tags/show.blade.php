@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4 border-0">
        <div class="card-header py-3 d-flex  bg-custom-dark border-0">
            <h4 class="m-0 font-weight-bold text-light border-0">
                Deskripsi Tag Produk {{ $tag->name }}
            </h4>
            <div class="ml-auto">
                <a href="{{ route('admin.tags.index') }}" class="btn btn-primary">
                    <span class="text">
                        {{ __('Kembali') }}
                    </span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Tag</th>
                        <th>Slug</th>
                        <th>Jumlah Produk</th>
                        <th>
                            List Produk
                        </th>
                        <th>
                            Dibuat pada
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>
                            <span class="badge badge-primary">
                                {{ $tag->products->count() }}
                            </span>
                        </td>
                        <td>
                            <!-- Tabel List Produk -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Slug</th>
                                        <th>Dibuat pada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tag->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->created_at }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Tidak ada produk yang terkait dengan tag ini
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </td>
                        <td>{{ $tag->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection