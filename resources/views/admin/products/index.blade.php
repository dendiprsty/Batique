@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4 border-0">
        <div class="card-header py-3 d-flex bg-custom-dark border-0">
            <h4 class="m-0 font-weight-bold text-light">
                {{ __('Produk') }}
            </h4>
            <div class="ml-auto">
                @can('product_create')
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Tambah Data') }}</span>
                </a>
                @endcan
            </div>
        </div>
        <div class="table-responsive p-4">
            <table class="table border-0" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($product->firstMedia)
                            <img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}" width="60" height="60" alt="{{ $product->name }}">
                            @else
                            <span class="badge badge-danger">no image</span>
                            @endif
                        </td>
                        <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->quantity }}</td>
                        <td>Rp.{{ number_format($product->price) }}</td>
                        <td>{{ $product->weight }} (gram)</td>
                        <td>{{ $product->category ? $product->category->name : NULL }}</td>
                        <td>
                            @if($product->status == "1")
                            <span class="badge badge-success">Tersedia</span>
                            @else
                            <span class="badge badge-danger">Habis</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <!-- show -->
                                <a href="{{ route('admin.products.show', $product) }}" class="btn rounded btn-sm btn-secondary mr-2">
                                    Detail
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn rounded btn-sm btn-primary">
                                    Edit
                                </a>
                                <form onclick="return confirm('are you sure !')" action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm ml-2 rounded btn-danger" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="12">
                            <h4>
                                Data tidak ditemukan
                            </h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection