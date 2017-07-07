@extends('layouts.main.index')
@section('table')
    <table class="table table-striped task-table">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </thead>
        @foreach ($categorias as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->description }}</td>
            </tr>
        @endforeach
    </table>
@endsection