@extends('layouts.admin')

@section('content')
<div class="container">
    <h5 class="m-0 font-weight-bold text-white mb-4">
        {{ __('Tambah Data Produk') }}
    </h5>
    <div class="card shadow mb-4 rounded border-0">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input class="form-control" id="price" type="number" name="price" value="{{ old('price') }}">
                            @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="quantity">Stok</label>
                            <input class="form-control" id="quantity" type="number" name="quantity" value="{{ old('quantity') }}">
                            @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">- Select category -</option>
                                @forelse($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : null }}>
                                    {{ $category->name }}
                                </option>
                                @empty
                                @endforelse
                            </select>
                            @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tags" class="text-light">Tags</label>
                            <select name="tags[]" id="tags" class="form-control select2 bg-transparent select2-dark" multiple="multiple" required>
                                @forelse($tags as $tag)
                                <option class="bg-transparent" value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('tags')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="weight">Berat (gram)</label>
                            <input type="number" name="weight" value="{{ old('weight') }}" class="form-control">
                            @error('weight')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">- Select Status-</option>
                                <option value="1" {{ old('status') == "1" ? 'selected' : null }}>Active</option>
                                <option value="0" {{ old('status') == "0" ? 'selected' : null }}>Inactive</option>
                            </select>
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description" class="text-small text-uppercase">{{ __('Deskripsi Produk') }}</label>
                            <textarea name="description" rows="3" class="form-control border-1 rounded p-3 summernote">{!! old('description') !!}</textarea>
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="details" class="text-small text-uppercase">{{ __('Detail Produk') }}</label>
                            <textarea name="details" rows="3" class="form-control summernote">{!! old('details') !!}</textarea>
                            @error('details')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="images">{{ __('Gambar Produk') }}</label>
                        <br>
                        <div class="file-loading border-0">
                            <input type="file" name="images[]" id="product-images" class="file-input-overview border-0" multiple="multiple">
                        </div>
                        @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group pt-4">
                    <button class="btn btn-primary" type="submit" name="submit">{{ __('Simpan') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('style-alt')
<link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endpush

@push('script-alt')
<script src="{{ asset('backend/vendor/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
        // summernote
        $('.summernote').summernote({
            tabSize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            theme: 'bs4-dark',
        })

        // upload images
        $("#product-images").fileinput({
            theme: "fas",
            maxFileCount: 5,
            allowedFileTypes: ['image'],
            showCancel: true,
            showRemove: false,
            showUpload: false,
            overwriteInitial: false
        });


        // select2
        function matchStart(params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }

            // Skip if there is no 'children' property
            if (typeof data.children === 'undefined') {
                return null;
            }

            // `data.children` contains the actual options that we are matching against
            var filteredChildren = [];
            $.each(data.children, function(idx, child) {
                if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                    filteredChildren.push(child);
                }
            });

            // If we matched any of the timezone group's children, then set the matched children on the group
            // and return the group object
            if (filteredChildren.length) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.children = filteredChildren;

                // You can return modified objects from here
                // This includes matching the `children` how you want in nested data sets
                return modifiedData;
            }

            // Return `null` if the term should not be displayed
            return null;
        }

        $(".select2").select2({
            tags: true,
            closeOnSelect: false,
            minimumResultsForSearch: Infinity,
            matcher: matchStart
        });
    })
</script>
@endpush