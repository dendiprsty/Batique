@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100">
            {{ __('Tambah Data') }}
        </h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> {{ __('Kembali') }}
        </a>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Content Row -->
    <div class="card shadow border-0">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <!-- Nama Depan -->
                            <label for="first_name">{{ __('Nama Depan') }}</label>
                            <input type="text" class="form-control" id="first_name" placeholder="{{ __('') }}" name="first_name" value="{{ old('first_name') }}" required />
                        </div>
                        <div class="col-6">
                            <!-- Nama Belakang -->
                            <label for="last_name">{{ __('Nama Belakang') }}</label>
                            <input type="text" class="form-control" id="last_name" placeholder="{{ __('') }}" name="last_name" value="{{ old('last_name') }}" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">{{ __('Username') }}</label>
                    <input type="text" class="form-control" id="username" placeholder="{{ __('') }}" name="username" value="{{ old('username') }}" required />
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" class="form-control" id="email" placeholder="{{ __('Email Aktif') }}" name="email" value="{{ old('email') }}" />
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="text" class="form-control" id="password" placeholder="{{ __('*****') }}" name="password" value="{{ old('password') }}" required />
                </div>
                <div class="form-group">
                    <label for="roles">{{ __('Role') }}</label>
                    <select name="roles[]" id="roles" class="form-control select2 bg-transparent" required>
                        @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($role) && $role->roles->contains($id)) ? 'selected' : '' }}>
                            {{ ucfirst($roles) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Simpan Data') }}</button>
            </form>
        </div>
    </div>


    <!-- Content Row -->

</div>
@endsection