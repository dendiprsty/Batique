@extends('layouts.admin')

@section('content')
<div class="container">
    <h5 class="m-0 font-weight-bold text-white mb-4">
        {{ __('Tambah Kategori') }}
    </h5>
    <div class="card border-0 bg-custom-dark shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control bg-transparent text-white" id="name" type="text" name="name" value="{{ old('name') }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="category_id">Sub-kategori</label>
                            <select name="category_id" id="category_id" class="form-control bg-transparent text-white">
                                <option value="">---</option>
                                @forelse($parent_categories as $parent_category)
                                <option value="{{ $parent_category->id }}" {{ old('category_id') == $parent_category->id ? 'selected' : null }}>
                                    {{ $parent_category->name }}
                                </option>
                                @empty
                                <option value="" disabled>No categories found</option>
                                @endforelse
                            </select>
                            @error('parent_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12">
                        <label for="cover">Gambar Thumbnail Kategori</label>
                        <br>
                        <div class="file-loading border-0">
                            <input type="file" name="cover" id="category-img" class="file-input-overview" data-browse-on-zone-click="true">
                            <span class="form-text text-muted">Image width should be 500px x 500px</span>
                        </div>
                        @error('cover')<span class="text-danger">{{ $message }}</span>@enderror
                        <small>
                            *Jika tidak ada gambar, maka akan menggunakan gambar default
                        </small>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button class="btn btn-primary" type="submit" name="submit">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script-alt')
<script>
    $(function() {
        $("#category-img").fileinput({
            theme: "fas",
            maxFileCount: 1,
            allowedFileTypes: ['image'],
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif', 'webp'],
            showCancel: true,
            showRemove: false,
            showUpload: false,
            overwriteInitial: false
        })
    })
</script>
@endpush