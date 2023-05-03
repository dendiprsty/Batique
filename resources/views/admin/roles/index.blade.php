@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <!-- Content Row -->
    <div class="card bg-custom-dark shadow p-4 border-0">
        <div class="card-header border-0 bg-custom-dark py-3 d-flex">
            <h4 class="font-weight-bold text-white">
                {{ __('Roles') }}
            </h4>
            <div class="ml-auto">
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary shadow">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('Tambah Data') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->title }}</td>
                            <td>
                                <!-- Tampilkan 5 saja -->
                                @foreach($role->permissions->take(3) as $permission)
                                <span>{{ $permission->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form onclick="return alert('are you sure ? ')" class="d-inline" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
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