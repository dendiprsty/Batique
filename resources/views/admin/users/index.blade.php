@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-100">{{ __('Pengguna') }}</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary  shadow-sm">{{ __('Tambah Data')}} <i class="fa fa-plus"> </i></a>
    </div>

    <!-- Content Row -->
    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Roles') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <!-- Merge First and Last Name -->
                                {{ $user->first_name }} {{ $user->last_name }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $key => $role)
                                <!-- Jika role admin warna biru -->
                                @if($role->title == 'admin')
                                <span class="badge badge-primary">
                                    {{ $role->title }}
                                </span>
                                <!-- Jika role author warna hijau -->
                                @elseif($role->title == 'user')
                                <span class="badge badge-secondary">
                                    {{ $role->title }}
                                </span>
                                @else
                                <span class="badge badge-warning">
                                    {{ $role->title }}
                                </span>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary btn-sm">
                                    Edit
                                </a>
                                <form onclick="return alert('are you sure ? ')" class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
@endsection