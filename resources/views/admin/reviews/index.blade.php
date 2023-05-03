@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4 border-0">
        <div class="card-header border-0 bg-custom-dark py-3 d-flex">
            <h4 class="m-0 font-weight-bold text-light">
                {{ __('Reviews') }}
            </h4>
        </div>
        <div class="table-responsive px-4 pb-4">
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Produk</th>
                        <th>Status</th>
                        <th>
                            Dibuat pada
                        </th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $review)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('admin.reviews.show', $review->id) }}">
                                {{ $review->user_id ? $review->user->name : $review->name }}
                            </a><br>
                            <small>{{ $review->email }}</small><br>
                        </td>
                        <td>{{ $review->content }}</td>
                        <td><span class="badge badge-success">{{ $review->rating }}</span></td>
                        <td>{{ $review->product->name }}</td>
                        <td>{{ $review->status }}</td>
                        <td>{{ $review->created_at ? $review->created_at->format('Y-m-d') : '' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form onclick="return confirm('are you sure !')" action="{{ route('admin.reviews.destroy', $review) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection