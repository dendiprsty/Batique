@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card bg-custom-dark shadow border-0">
        <div class="card-header border-0 bg-custom-dark py-3 d-flex">
            <h4 class="font-weight-bold text-white">
                {{ __('Pesanan') }}
            </h4>
        </div>
        <div class="table-responsive px-4 pb-4">
            <table class="table table-hover table-sm" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>
                            Total
                        </th>
                        <th>
                            Customer
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Payment Status
                        </th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $order->code }} <br />
                            {{ $order->order_date }}
                        </td>
                        <td>{{ $order->grand_total }}</td>
                        <td>
                            {{ $order->customer_first_name }} {{ $order->customer_last_name }} <br />
                            {{ $order->customer_email }}
                        </td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form onclick="return confirm('are you sure !')" action="{{ route('admin.orders.destroy', $order) }}" method="POST">
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