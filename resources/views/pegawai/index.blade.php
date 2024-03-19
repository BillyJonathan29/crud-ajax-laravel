@extends('layouts.menu.index')

@section('content')
<main class="container">


    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
              <a href='' class="btn btn-primary tombol-tambah">+ Tambah Data</a>
            </div>
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-5">Nama</th>
                        <th class="col-md-3">image</th>
                        <th class="col-md-4">Email</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
            </table>

      </div>
      <!-- AKHIR DATA -->
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Form</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
       <!-- START FORM -->
            <div class="alert alert-danger d-none"></div>
            <div class="alert alert-success d-none"></div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name='image' id="image">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' id="email">
                </div>
            </div>


    <!-- AKHIR FORM -->
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary tombol-simpan">Simpan</button>
    </div>
  </div>
</div>
</div>


@endsection


@section('script')
@include('pegawai.script')

@endsection
