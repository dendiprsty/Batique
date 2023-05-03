@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="m-0 font-weight-bold text-light mb-4">
        {{ __('Edit Kategori')}}
    </h4>
    <div class="card shadow mb-4 bg-custom-dark border-0">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input class="form-control" id="name" type="text" name="name" value="{{ old('name', $category->name) }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="category_id">Sub-kategori</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">---</option>
                                @forelse($parent_categories as $parent_category)
                                <option value="{{ $parent_category->id }}" {{ old('category_id', $category->category_id) == $parent_category->id ? 'selected' : null }}>
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
                        <label for="cover">Gambar Thumbnail Lama</label><br>
                        @if($category->cover)
                        <img class="mb-4 rounded" src="{{ Storage::url('images/categories/' . $category->cover) }}" alt="{{ $category->name }}" width="100" height="100">
                        @else
                        <img class="mb-4 rounded" src="{{ asset('img/no-img.png') }}" alt="{{ $category->name }}" width="60" height="60">
                        @endif
                        <br>
                        <div class="file-loading">
                            <input type="file" name="cover" id="category-img" class="file-input-overview">
                            <span class="form-text text-muted">Image width should be 500px x 500px</span>
                        </div>
                        @error('cover')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button class="btn btn-primary" type="submit" name="submit">{{ __('Update') }}</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
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
            showCancel: true,
            showRemove: false,
            showUpload: false,
            overwriteInitial: false
        })
    })
</script>
@endpush