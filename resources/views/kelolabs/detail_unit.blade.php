@extends('layouts.backend.main')

@section('title', 'Jumlah Unit Terdaftar : ')
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
                            <th>ID</th>
                            <th>Nama Banksampah</th>
                            <th>Alamat</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bank as $banks)
                            <tr>
                                <td>{{ $banks->id }}</td>
                                <td>{{ $banks->nama }}</td>
                                <td>{{ $banks->alamat }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
