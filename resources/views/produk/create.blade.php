@extends('layouts.master')
@section('title', 'Toko Elektronik')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Tambah Barang</h4>
            <br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action=" {{ route('produk.store') }} " method="POST">
                @csrf
                <div class="form-group">
                    <label>Kode Produk <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="id" id="id" />
                </div>
                <div class="form-group">
                    <label>Nama Produk <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_produk" id="nama_produk" />
                </div>
                <div class="form-group">
                    <label>Kategori <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kategori_id" id="kategori_id" />
                </div>
                <div class="form-group">
                    <label>Harga <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="harga" id="harga" />
                </div>
                <div class="form-group">
                    <label>Stok <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="stock" id="stock" />
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk.store') }}" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection