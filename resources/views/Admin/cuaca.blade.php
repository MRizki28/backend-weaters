@extends('Base.template')
@section('main-content')

<!-- Button trigger modal -->
<div class="col-lg-12 stretch-card">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

  <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Data
  </button>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('tambahData.cuaca') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class=" form-group">
              <label for="provinsi">Provinsi</label>
              <input type="text" class="form-control text-white" name="provinsi" aria-describedby="emailHelp"
                  placeholder="Input Here.." >
          </div>
          <div class="form-group">
              <label for="kota">Kota</label>
              <input type="text" class="form-control text-white" name="kota" placeholder="Input Here">
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
              <input type="number" name="suhu" id="suhu" class="form-control text-white" placeholder="Input Here" step="any">
            </div>
            <div class="form-group">
              <label for="tanggal">tanggal</label>
              <input type="date" name="tanggal" id="tanggal" class="form-control text-white" placeholder="Input Here">
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
                <th> # </th>
                <th> First name </th>
                <th> Product </th>
                <th> Amount </th>
                <th> Deadline </th>
              </tr>
            </thead>
            <tbody>
               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection