@extends('layouts.main')
@section('konten')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        @if($role == 'admin')
            <a href="{{ url('/products/create')}}"><button class="btn btn-success btn-sm" >Tambah data</button></a>
        @endif
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
            {{-- @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong>{{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
@endif --}}
          <table class="table table-striped projects">
              <thead>
                  <tr>
                    <th style="width: 5%">
                        No
                    </th>
                    <th style="width: 13%">
                        Kode Produk
                    </th>
                    <th style="width: 15%;">
                        Nama Produk
                    </th>
                    <th style="width: 15%">
                        Kategori
                    </th>
                    <th style="width: 10%;">
                        Harga
                    </th>
                    <th style="width: 10%">
                        stok
                    </th>
                    <th style="width: 15%;">
                        deskripsi
                    </th>
                    @if ($role == 'admin')
                    <th style="width: 15%">
                    Aksi
                    </th>
                    @endif
                  </tr>
              </thead>
              <tbody>
            </tr>
            @foreach($product as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->product_code }}</td>
                <td>{{ $p->product_name }}</td>
                <td>{{ optional($p->category)->category_name }}</td>
                <td>{{ $p->price }}</td>
                <td>{{ $p->stock }}</td>
                <td>{{ $p->description }}</td>
                @if ($role == 'admin')
                <td>
                    <a href="{{ url('product/'. $p->id) }}"><button class='btn btn-primary btn-sm' >Update</button></a>
                    <form onsubmit= 'return deleteData()' action="{{ url('product/'. $p->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class='btn btn-danger btn-sm'>Delete</button></a>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <script>
    function deleteData(){
        pesan = confirm('Apakah anda yakin akan menghapus data ini?');
        if (pesan) return true;
        else return false;
    }
  </script>

@endsection
