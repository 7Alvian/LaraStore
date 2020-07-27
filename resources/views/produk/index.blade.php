@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <h3 class="mt-3 align-content-center">Data Barang</h3>
    <a href="{{url('/produk/create')}}" class="btn btn-success mb-2">Tambah Data<i class="fa fa-plus ml-1" aria-hidden="true"></i></a>

    @if (session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <form action="{{ url()->current() }}" class="form-inline" method="GET">
            <div class="form-group ml-2 mb-2">
                {{ @csrf_field() }}
                <input name="keyword" type="text" class="form-control" placeholder="Cari">
                <input type="submit" class="btn btn-md btn-secondary ml-2">
                {{-- <i class="fas fa-search"></i> --}}
            </div>
        </form>
    </div>

    <div class="box-body table-responsive">
      <table id="tabel" class="table table-special table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Stok Barang</th>
            <th>Harga Barang</th>
            <th colspan="2">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach($produk as $produk1)
                <tr>
                    <td>{{$produk1->id}}</td>
                    <td>{{$produk1->nama_barang}}</td>
                    <td>{{$produk1->stok_barang}}</td>
                    <td>{{$produk1->harga_barang}}</td>
                    <td><a class="btn btn-warning" href="{{ url("/produk/{$produk1->id}/edit") }}"><i class="fas fa-edit"></i></a></td>
                    <td>
                    <form action="{{ url("produk/{$produk1->id}") }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end mr-3 mt-3">
        {{$produk->links()}}
    </div>
</div>
</div>
@endsection

