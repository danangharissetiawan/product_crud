@extends('adminlte::page')

@section('title', 'Daftar Produk')

@section('content_header')
    <h1 class="m-0 text-dark">Daftar Produk</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('products.create')}}" class="btn btn-primary mb-2">
                        Tambahkan Produk
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nom</th>
                            <th>width</th>
                            <th>height</th>
                            <th>type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->width}}</td>
                                    <td>{{$product->height}}</td>
                                    <td>{{$product->type}}</td>
                                    <td>
                                        <a href="{{route('products.edit', $product)}}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{route('products.destroy', $product)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus data ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush