@extends('layouts.menu.index')

@section('content')
<main class="container">


    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
              <a href='' class="btn btn-primary tambah-data">+ Tambah Data</a>
            </div>
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-3">Nama</th>
                        <th class="col-md-3">Produk</th>
                        <th class="col-md-3">Price</th>
                        <th class="col-md-3">Stock</th>
                        <th class="col-md-3">Description</th>
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
                    <select class="form-select form-select-sm" style="width: 100%"  name="nama" id="nama">
                        <option value="" disabled selected></option>
                        @foreach ($pegawai as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="product" class="col-sm-2 col-form-label">Product</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='product' id="product">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='price' id="price">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='stock' id="stock">
                </div>
            </div>
            <div class="mb-3 row">
                    <label for="">Description</label>
                    <div class="col-sm-10 ms-auto">
                        <textarea class="form-control" id="description" name="description" placeholder="Ener decription" cols="10" rows="3"></textarea>
                    </div>

            </div>


    <!-- AKHIR FORM -->
    </div>
    <div class="modal-footer">
      <button type="button"   class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
      <button type="button" id="my-button" class="btn btn-primary tambah-simpan ladda-button" data-style="zoom-in">Simpan</button>
    </div>
  </div>
</div>
</div>

@endsection

@section('script')
@include('product.script')
@endsection
