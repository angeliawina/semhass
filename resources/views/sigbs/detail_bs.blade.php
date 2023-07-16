@extends('layouts.frontend.main')

@section('content')

    <head>
        <!-- My CSS -->
        <link rel="stylesheet" href="{{ asset('css/css/style.css') }}" />
    </head>

    <section id="detail">
        <div class="container">
            <div class="card-body">
                <div class="row">
                    
                        <img src="{{ asset('storage/' . $bank->foto) }}" height="400px" width="400px">
                    <section id = "nama">
                        <div class="container">
                            <h1>{{ $bank->nama }}</h1>
                            <h6> {{ $bank->alamat }}</h6>
                            <a href="{{ $bank->rute }}">
                                <h6 style="text-align: end">Rute
                                    <i class="fas fa-map fa-1x text-gray-300"></i>
                                </h6>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h5>Data Sampah</h5>
                    </div>
                </div>

                <div class="row align-items-center">
                    @foreach ($sampah as $sph)
                        <div class="col-md-4 mb-4">
                            <div class="card" style="width: 300">

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
                                    <p>{{$sph->harga}}</p>
                                    </div>
                                  
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endsection
</section>
