@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Dashboard</h1>
        <p>
            Selamat Datang {{ auth()->user()->username }} di halaman Dahboard
        </p>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-0 border-bottom-primary shadow h-100 py-2" style="background-color: #1e1e2d;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-100">{{ $product_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hotel fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-0 border-bottom-info shadow h-100 py-2" style="background-color: #1e1e2d;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-100">{{ $order }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-0 border-bottom-danger shadow h-100 py-2" style="background-color: #1e1e2d;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Cancel
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-100">{{ $order_cancel }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-window-close fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-0 border-bottom-success shadow h-100 py-2" style="background-color: #1e1e2d;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Terkirim</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-100">{{ $order_success }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4 border-0 shadow" style="background-color: #1e1e2d;">
                <div class="card-header border-0 py-3" style="background-color: #1e1e2d;">
                    <h6 class="m-0 font-weight-bold text-white">Grafik Penjualan</h6>
                </div>
                <div class="card-body">
                    <canvas id="penjualan" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4 border-0 shadow" style="background-color: #1e1e2d;">
                <div class="card-header border-0 border-0 py-3" style="background-color: #1e1e2d;">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Produk</h6>
                </div>
                <div class="card-body">
                    <canvas id="produk" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection