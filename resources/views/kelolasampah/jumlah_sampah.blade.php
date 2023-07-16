@extends('layouts.backend.main')

@section('title', 'Jumlah Sampah Terdaftar : ')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">{{ $count }}</h1>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                    <thead>
                        <tr>
                            <th>ID Banksampah</th>
                            <th>ID Sampah</th>
                            <th>Nama Sampah</th>
                            <th>Foto</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sampah as $sph)
                            <tr>
                                <td>{{ $sph->banksampahs_id }}</td>
                                <td>{{ $sph->id }}</td>
                                <td>{{ $sph->nama }}</td>
                                <td>
                                    <div class="card" style="width: 10rem; heigh: 10rem; margin:5px">
                                        <img class="card-img-top" style="-o-object-fit: cover; width:10rem; height:10rem"
                                            src="{{ asset('storage/' . $sph->foto) }}" alt="Card-image cap">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
