@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card bg-custom-dark shadow border-0">
        <div class="card-header border-0 bg-custom-dark py-3 d-flex">
            <h4 class="font-weight-bold text-white">
                {{ __('Pengiriman') }}
            </h4>
        </div>
        <div class="table-responsive px-4 pb-4">
            <table class="table table-hover table-sm" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>
                            Customer
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Jumlah Barang
                        </th>
                        <th>Berat Total (gram)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($shipments as $shipment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $shipment->order->code }}<br>
                            <span class="badge badge-info" style="font-size: 12px; font-weight: normal"> {{ $shipment->order->order_date }}</span>
                        </td>
                        <td>{{ $shipment->order->customer_full_name }}</td>
                        <td>
                            {{ $shipment->status }}
                            <br>
                            <span class="badge badge-info" style="font-size: 12px; font-weight: normal"> {{ $shipment->shipped_at }}</span>
                        </td>
                        <td>{{ $shipment->total_qty }}</td>
                        <td>{{ $shipment->total_weight }}</td>
                        <td>
                            <div class="">
                                <a href="{{ route('admin.orders.show', $shipment->order->id) }}" class="btn btn-sm btn-primary">
                                    Detail
                                </a>
                                <a href="{{ route('admin.shipments.edit', $shipment->id) }}" class="btn ml-1 btn-sm btn-secondary">
                                    Update
                                </a>
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