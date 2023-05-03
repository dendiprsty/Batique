@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-custom-dark shadow p-4 border-0">
                    <h2 class="ml-3 text-white">
                        {{ __('Laporan Keuangan') }}
                    </h2>

                    <div class="card-body">

                        <form action="" class="mb-1">
                            <div class="form-row">
                                <div class="form-group col-lg-3 mb-2">
                                    <input type="text" class="form-control datepicker bg-dark text-white" readonly="" value="{{ !empty(request()->input('start')) ? request()->input('start') : '' }}" name="start" placeholder="from">
                                </div>

                                <div class="form-group col-lg-3 mb-2">
                                    <input type="text" class="form-control datepicker bg-dark text-white" readonly="" value="{{ !empty(request()->input('end')) ? request()->input('end') : '' }}" name="end" placeholder="to">
                                </div>

                                <div class="form-group col-lg-3 mb-2">
                                    <select name="export" class="form-control bg-dark text-white">
                                        <option value="xlsx">
                                            Excel
                                        </option>
                                        <option value="pdf">
                                            PDF
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 mb-2">
                                    <button type="submit" class="btn btn-primary">
                                        <!-- Export -->
                                        {{ __('Export') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="dataTable">
                                <thead>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Jumlah Order
                                    </th>
                                    <th>
                                        Pendapatan Kotor
                                    </th>
                                    <th>
                                        Pajak
                                    </th>
                                    <th>
                                        Ongkos Kirim
                                    </th>
                                    <th>
                                        Pendapatan Bersih
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $totalOrders = 0;
                                    $totalGrossRevenue = 0;
                                    $totalTaxesAmount = 0;
                                    $totalShippingAmount = 0;
                                    $totalNetRevenue = 0;
                                    @endphp
                                    @forelse ($revenues as $revenue)
                                    <tr>
                                        <td>{{ $revenue->date }}</td>
                                        <td>
                                            <a href="{{ url('admin/orders?start='. $revenue->date .'&end='. $revenue->date . '&status=completed') }}">{{ $revenue->num_of_orders }}</a>
                                        </td>
                                        <td>{{ $revenue->gross_revenue }}</td>
                                        <td>{{ $revenue->taxes_amount }}</td>
                                        <td>{{ $revenue->shipping_amount }}</td>
                                        <td>{{ $revenue->net_revenue }}</td>
                                    </tr>

                                    @php
                                    $totalOrders += $revenue->num_of_orders;
                                    $totalGrossRevenue += $revenue->gross_revenue;
                                    $totalTaxesAmount += $revenue->taxes_amount;
                                    $totalShippingAmount += $revenue->shipping_amount;
                                    $totalNetRevenue += $revenue->net_revenue;
                                    @endphp
                                    @empty
                                    <tr>
                                        <td colspan="6">No records found</td>
                                    </tr>
                                    @endforelse

                                    @if ($revenues)
                                    <tr>
                                        <td>Total</td>
                                        <td><strong>{{ $totalOrders }}</strong></td>
                                        <td><strong>{{ $totalGrossRevenue }}</strong></td>
                                        <td><strong>{{ $totalTaxesAmount }}</strong></td>
                                        <td><strong>{{ $totalShippingAmount }}</strong></td>
                                        <td><strong>{{ $totalNetRevenue }}</strong></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script-alt')
<script src="{{ asset('backend/plugins/bootstrap-datepicker.min.js') }}"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
@endpush