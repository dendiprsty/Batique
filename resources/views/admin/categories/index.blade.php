@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card bg-custom-dark shadow p-4 border-0">
        <div class="card-header border-0 bg-custom-dark py-3 d-flex">
            <h4 class="font-weight-bold text-white">
                {{ __('Kategori Produk') }}
            </h4>
            <div class="ml-auto">
                @can('category_create')
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary shadow">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Tambah Data') }}</span>
                </a>
                @endcan
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-sm" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Sub-kategori</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($category->cover)
                            <img class="rounded-sm" src="{{ Storage::url('images/categories/' . $category->cover) }}" width="50" height="50" alt="{{ $category->name }}">
                            @else
                            <span class="badge badge-primary">
                                Tidak ada gambar
                            </span>
                            @endif
                        </td>
                        <td><a href="{{ route('admin.categories.show', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>{{ $category->products_count }}</td>
                        <td>{{ $category->parent->name ?? '' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-primary m-2 rounded">
                                    Edit
                                </a>
                                <form onclick="return confirm('are you sure !')" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger m-2 rounded" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">No categories found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection