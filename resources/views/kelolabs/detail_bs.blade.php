@extends('layouts.backend.main')

@section('content')
    <div class="container-fluid">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Bank Sampah</h1>
        <div class="row">
            <div class="col-lg-12">
                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->

                    <!-- Card Body -->
                    <div class="card-body">
                        Nama: {{ $bank->nama }} <br />
                        Alamat: {{ $bank->alamat }}<br />
                        <a href="{{ $bank->rute }}">
                            <h6 style="text-align: end">Rute
                                <i class="fas fa-map fa-1x text-gray-300"></i>
                            </h6>
                        </a>
                        <img src="{{ asset('storage/' . $bank->foto) }}" height="400px" width="400px">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
