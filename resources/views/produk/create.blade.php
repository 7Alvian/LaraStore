@extends('layouts.admin')
@section('title','Tambah Data Barang')
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 offset-2">
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
            @endif
            <h3>Tambah Data Barang</h3>
            <form action="{{url('/produk')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input value="{{ old('nama_barang') }}" type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="stok_barang">Stok Barang</label>
                    <input value="{{ old('stok_barang') }}" type="text" name="stok_barang" class="form-control" placeholder="Stok Barang" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input value="{{ old('harga_barang') }}" type="text" name="harga_barang" class="form-control" placeholder="Harga Barang" aria-describedby="helpId">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-warning" href="{{ url("/") }}">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
