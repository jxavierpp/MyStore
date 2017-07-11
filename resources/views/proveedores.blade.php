@extends('layouts.main.products')
@section('table1')
    <table class="table table-striped task-table" ng-controller="SupplierController">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>
                <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add',0)">Agregar</button>
            </th>
        </thead>
        <tr ng-repeat="supplier in suppliers">
            <td>@{{ $prov.id }}</td>
            <td>@{{ $prov.supplierName }}</td>
            <td>@{{ $prov.supplierEmail }}</td>
            <td>@{{ $prov.supplierPhone }}</td>
            <td>
                <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit',supplier.id)">
                    <span class="glyphicon glyphicon-pencil"></span>
                </button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(supplier.id)">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </td>
        </tr>
    </table>
@endsection