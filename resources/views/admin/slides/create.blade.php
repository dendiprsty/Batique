@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4 border-0">
        <div class="card-header border-0 bg-custom-dark py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-light">
                {{ __('Tambah Featured Slide') }}
            </h4>
            <div class="ml-auto">
                <a href="{{ route('admin.slides.index') }}" class="btn btn-primary">
                    <span class="text">
                        {{ __('Kembali') }}
                    </span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title">
                                {{ __('Judul') }}
                            </label>
                            <input class="form-control" id="title" type="text" name="title" value="{{ old('title') }}">
                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="url">
                                {{ __('URL Produk') }}
                            </label>
                            <input class="form-control" id="url" type="text" name="url" value="{{ old('url') }}">
                            @error('url')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="body" class="text-small text-uppercase">
                                {{ __('Deskripsi') }}
                            </label>
                            <textarea name="body" rows="3" class="form-control summernote">{!! old('body') !!}</textarea>
                            @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-12">
                        <label for="cover">
                            {{ __('Gambar') }}
                        </label>
                        <br>
                        <div class="file-loading">
                            <input type="file" name="cover" id="slide-img" class="file-input-overview">
                            <span class="form-text text-muted">
                                {{ __('Ukuran gambar disarankan 500x500px') }}
                            </span>
                        </div>
                        @error('cover')<span class="text-danger">{{ $message }}</span>@enderror
                        <small>
                            <strong>
                                {{ __('Perhatian!') }}
                            </strong>
                            {{ __('Jika Anda mengupload gambar, maka gambar lama akan dihapus dan diganti dengan gambar yang baru.') }}

                        </small>
                    </div>
                </div>
                <div class="form-group pt-4">
                    <button class="btn btn-primary" type="submit" name="submit">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script-alt')
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
            ]
        })

        // file input
        $("#slide-img").fileinput({
            theme: "fas",
            maxFileCount: 1,
            allowedFileTypes: ['image'],
            showCancel: true,
            showRemove: false,
            showUpload: false,
            overwriteInitial: false
        });

    });
</script>
@endpush