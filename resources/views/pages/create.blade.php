@extends('layouts.main')
@section('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Produk</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div>
        <form method="POST" action="{{ url('product')}}">
            @csrf
        <div class="col-12">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama_produk" name="name"
            value="{{ old('name') }}">
            @error('name')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
        </div>
        <div class="col-12">
            <label for="category" class="form-label">Kategori</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category"
            value="{{ old('category') }}">
            @error('category')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
        </div>
        <div class="col-12">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="harga" name="price"
            value="{{ old('price') }}">
            @error('price')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
        </div>
        <div class="col-12">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stok" name="stock"
            value="{{ old('stock') }}">
            @error('stock')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
            value="{{ old('description') }}">
            @error('description')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
        </div> <br>
        <div class="col-12">
          <a href="{{ url('product') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-success float-right">Simpan</button>
        </div>
      </form>
    </div>


    </section>
    <!-- /.content -->
  </div>
  @endsection
