@extends('layouts.main.products')
@section('table')
    <table class="table table-striped task-table">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categoria</th>
        </thead>
        @foreach ($productos as $prod)
            <tr>
                <td>{{ $prod->id }}</td>
                <td>{{ $prod->name }}</td>
                <td>{{ $prod->price }}</td>
                <td>{{ $prod->stock }}</td>
                <td>{{ $prod->categories->name }}</td>
            </tr>
        @endforeach
    </table>
@endsection