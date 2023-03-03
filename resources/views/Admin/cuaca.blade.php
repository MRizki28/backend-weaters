@extends('Base.template')
@section('main-content')
    <!-- Button trigger modal -->
    <div class="col-lg-12 stretch-card">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <button type="button" class="btn btn-primary " data-bs-toggle="modal" id="addButton"
                    data-bs-target="#exampleModal">
                    Tambah Data
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control text-white" name="provinsi" id="provinsi"
                                aria-describedby="emailHelp" placeholder="Input Here..">
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input type="text" class="form-control text-white" name="kota" id="kota"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <select name="keterangan" id="keterangan" class="form-control text-white">
                                <option>Hujan Ringan</option>
                                <option>Hujan Deras</option>
                                <option>Cerah</option>
                                <option>Sedikit Berawan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="suhu">suhu °C</label>
                            <input type="number" name="suhu" id="suhu" class="form-control text-white"
                                placeholder="Input Here" step="any">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control text-white"
                                placeholder="Input Here">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    {{-- tabel --}}
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Cuaca</h4>
                <p class="card-description"> Isi Sesuai Data</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Keterangan</th>
                                <th>Suhu</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($cuaca as $c)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $c->provinsi }}</td>
                                    <td>{{ $c->kota }}</td>
                                    <td>{{ $c->keterangan }}</td>
                                    <td>{{ number_format($c->suhu) }} °C</td>
                                    <td>{{ $c->tanggal }}</td>
                                    <td>


                                        {{-- <a href="/bazar-edit/{{ $d->id }}" class="btn btn-primary"><i
                                                        class="fa fa-edit"></i></a> --}}
                                        <button class="btn btn-danger btn-edit" data-toggle="modal"
                                            data-target="#modal-edit" data-id="{{ $c->id }}">Edit</button>

                                        {{-- <a href="{{ route('deleteData', ['id' => $c->id]) }}"
                                            class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Script Edit -->
    <!-- Script Edit -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('addButton').click(function() {
            $.ajax({
                url: 'http://localhost:8000/cuaca',
                type: 'POST',
                dataType: 'json',
                data: {
                    'provinsi': $('#provinsi').val(),
                    'kota': $('#kota').val(),
                    'keterangan': $('#keterangan').val(),
                    'suhu': $('#suhu').val(),
                    'tanggal': $('#tanggal').val()
                },
                success: function(data) {
                    console.log(data);
                    // window.location.href = "/tambah/cuaca";
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        $('#addModal').on('hidden.bs.modal', function() {
            $('#addFrom')[0].reset();
        });
    </script>
@endsection
