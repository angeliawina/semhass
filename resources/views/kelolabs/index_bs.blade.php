@extends('layouts.backend.main')

@section('title', 'Data Banksampah')
@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Banksampah</h6>

            <div class="row">
                <div class="col offset-9">
                    <a href="{{ route('admin.banksampah.formtambah') }}" class="btn btn-primary mb-3">+ Tambah Unit
                        Banksampah</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nama </th>
                            {{-- <th>Alamat</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bank as $banks)
                            <tr>
                                <td>{{ $banks->id }}</td>

                                <td>
                                    <div class="card" style="width: 10rem; heigh: 10rem; margin:10px">
                                        <img class="card-img-top" style="-o-object-fit: cover; width:10rem; height:10rem"
                                            src="{{ asset('storage/' . $banks->foto) }}" alt="Card-image cap">
                                </td>

                                <td>{{ $banks->nama }}</td>
                                {{-- <td>{{ $banks->alamat }}</td> --}}

                                <td>
                                    <a href="{{ route('admin.banksampah.detail', ['id' => $banks->id]) }}"
                                        class="btn btn-info">Detail</a>
                                    <a href="{{ route('admin.banksampah.formubah', ['id' => $banks->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#hapusModal">
                                        Hapus
                                    </button>
                                    <!-- Hapus Modal -->
                                    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="hapusModalLabel">Alert</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Hapus Data ?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('admin.banksampah.hapus', ['id' => $banks->id]) }}">
                                                        <button type="button" class="btn btn-danger">Hapus</button></a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            </div>
            </td>

            {{-- <td><a
                                                    href="{{ route('admin.banksampah.hapus', ['id' => $banks->id]) }}">Hapus</a>
                                            </td> --}}
            </tr>
            @endforeach

            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
