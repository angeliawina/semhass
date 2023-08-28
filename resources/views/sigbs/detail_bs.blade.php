@extends('layouts.frontend.main2')

@section('content')

    <head>
        <!-- My CSS -->
        <link rel="stylesheet" href="{{ asset('css/css/style.css') }}" />
    </head>

    <section id="detail">
        <div class="container">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('storage/' . $bank->foto) }}" class="rounded-circle" height="300px" width="300px">
                    </div>

                    <div class="col-8" style="padding-top: 4rem">
                        <section id="nama">
                            <div class="container">
                                <h1>{{ $bank->nama }}</h1>
                                <h5> {{ $bank->alamat }}</h5>
                                <a href="{{ $bank->rute }}">
                                    <h4>Rute
                                        <i class="fas fa-map fa-1x text-gray-300"></i>
                                    </h4>
                                </a>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col mb-2">
                        <h3>Data Sampah</h3>
                    </div>
                </div>

                <div class="row align-items-center">
                    @foreach ($sampah as $sph)
                        <div class="col-md-3 mb-3">
                            <div class="card" style="width:100%">

                                {{-- <img class="card-img-top" style="-o-object-fit: cover; width:9rem; height:9rem"
                                    src="{{ asset('storage/' . $sph->foto) }}" alt="sampah">

                                <div class="card-body">
                                    <h6 class="card-title">{{ $sph->nama }} - </h6>
                                    <h6 class="card-title">Rp {{ $sph->harga }} </h6>
                                </div> --}}



                                <img class="card-img-top" style="width:100%; height:250px"
                                    src="{{ asset('storage/' . $sph->foto) }}" alt="banksampah"></a>

                                <div class="card-body">
                                    <h4 class="card-title">{{ $sph->nama }} </h4>
                                    <p>{{ $sph->harga }}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endsection
</section>
