@extends('adminlte::page')

@section('title', 'Tambahkan Produk')

@section('content_header')
    <h1 class="m-0 text-dark">Tambahkan Produk</h1>
@stop

@section('content')
    <form action="{{route('products.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Produk" name="name" value="{{old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputWidth">Panjang</label>
                        <input type="numeric" class="form-control @error('width') is-invalid @enderror" id="exampleInputWidth" placeholder="Panjang barang" name="width" value="{{old('width')}}">
                        @error('width') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputHeight">Tinggi</label>
                        <input type="numeric" class="form-control @error('height') is-invalid @enderror" id="exampleInputHeight" placeholder="Tinggi barang" name="height"  value="{{old('height')}}">
                        @error('height') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputType">Type</label>
                        <input type="text" class="form-control" id="exampleInputType" placeholder="Tipe Produk" name="type" value="{{old('type')}}">
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('products.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop