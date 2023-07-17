@extends('layouts.backend.main')

@section('title', 'Data Sampah')
@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> {{ $bank->nama }} </h6>

            <div class="row">
                <div class="col offset-9">
                    <a href="{{ route('admin.kelolasampah.formtambah', ['id' => $bank->id]) }}" class="btn btn-primary mb-3">+
                        Tambah Data Sampah</a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($sampah as $sph)
                            <tr>
                                <td>{{ $sph->id }}</td>
                                <td>
                                    <div class="card" style="width: 10rem; heigh: 10rem; margin:5px">
                                        <img class="card-img-top" style="-o-object-fit: cover; width:10rem; height:10rem"
                                            src="{{ asset('storage/' . $sph->foto) }}" alt="Card-image cap">
                                </td>
                                <td>{{ $sph->nama }}</td>
                                <td>{{ $sph->harga }}</td>

                                <td>
                                    <a href="{{ route('admin.kelolasampah.detail', ['banksampah_id' => $sph->banksampahs_id, 'id' => $sph->id]) }}"
                                        class="btn btn-info">Detail</a>
                                    <a href="{{ route('admin.kelolasampah.formubah', ['banksampah_id' => $sph->banksampahs_id, 'id' => $sph->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('admin.kelolasampah.hapus', ['banksampah_id' => $sph->banksampahs_id, 'id' => $sph->id]) }}"
                                        data-toggle="modal" data-target="#hapusModal{{ $sph->id }}"
                                        class="btn btn-danger">Hapus</a>

                                    <!-- Hapus Modal -->
                                    <div class="modal fade" id="hapusModal{{ $sph->id }}" tabindex="-1"
                                        aria-labelledby="hapusModalLabel" value='{{ $sph->id }}' aria-hidden="true">
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
                                                    <a
                                                        href="{{ route('admin.kelolasampah.hapus', ['banksampah_id' => $sph->banksampahs_id, 'id' => $sph->id]) }}">
                                                        <button type="button" class="btn btn-danger">Hapus</button></a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                            </tr>
            </div>
            @endforeach
            </tbody>
            </table>
        </div>
        </ul>

        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->

            <!-- Card Body -->

            {{-- <a href="{{ route('admin.datasampah') }}" button type="button"
                        class="btn btn-outline-secondary btn-sm">Kembali</button></a> --}}
        </div>
    </div>
@endsection
