@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4 border-0 py-4">
        <div class="card-header py-3 d-flex bg-custom-dark bg-transparent">
            <h4 class="font-weight-bold text-white">
                {{ __('Tags Produk') }}
            </h4>
            <div class="ml-auto">
                @can('tag_create')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTagModal">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Tambah Data') }}</span>
                </button>

                <div class="modal fade" id="createTagModal" tabindex="-1" role="dialog" aria-labelledby="createTagModalLabel" aria-hidden="true">
                    <div class="modal-dialog bg-custom-dark" role="document">
                        <div class="modal-content bg-custom-dark">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createTagModalLabel">{{ __('Tambahkan Tag Baru') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.tags.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">{{ __('Nama') }}</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Batal') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
        <div class="table-responsive p-4">
            <table class="table border-0" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Product count</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('admin.tags.show', $tag->id) }}">
                                {{ $tag->name }}
                            </a>
                        </td>
                        <td>{{ $tag->products_count }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <form onclick="return confirm('are you sure !')" action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger ml-2 rounded" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">
                            <h4 class="font-weight-bold">Data tidak tersedia</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection