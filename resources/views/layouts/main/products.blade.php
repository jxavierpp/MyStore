<!DOCTYPE html>
<html lang="es" ng-app="supplierApp">
<head>
    <title>My Store</title>
    @include('partials.header')
</head>
<body>
    <nav class="navbar navbar-default">
        @include('layouts.main.includes.nav')
    </nav>

    <div class="storage" ng-controller="SupplierController">
        {{--@yield('table1')--}}

        <table class="table table-striped task-table" >
            <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>
                <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add',0)">Agregar</button>
            </th>
            </thead>
            <tr ng-repeat="supplier in suppliers" ng-show="supplier.is_active == true">
                <td>@{{ supplier.supplier_id }}</td>
                <td>@{{ supplier.supplier_name }}</td>
                <td>@{{ supplier.supplier_email }}</td>
                <td>@{{ supplier.supplier_phone }}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit',supplier.supplier_id)">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(supplier.supplier_id)">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
        </table>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledBy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel" >@{{ form_tittle }}</h4>
                    </div>
                    <div class="modal-body">
                        <form name="frmSupplier" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Supplier Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="supplier_name" name="supplier_name"
                                           placeholder="Supplier Name" value="@{{ supplier_name }}" ng-model="supplier.supplier_name"
                                           ng-required="true">
                                    <span ng-show="frmSupplier.supplier_name.$invalid && frmSupplier.supplier_name.$touched">Supplier Name field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Supplier Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="supplier_email" name="supplier_email"
                                           placeholder="Supplier Email" value="@{{  supplier_email }}" ng-model="supplier.supplier_email"
                                           ng-required="true">
                                    <span ng-show="frmSupplier.supplier_email.$invalid && frmSupplier.supplier_email.$touched">Supplier Email field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Supplier Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="supplier_phone" name="supplier_phone"
                                           placeholder="Supplier Phone" value="@{{ supplier_phone }}" ng-model="supplier.supplier_phone"
                                           ng-required="true">
                                    <span ng-show="frmSupplier.supplier_phone.$invalid && frmSupplier.supplier_phone.$touched">Supplier Contact field is required</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmSupplier.$invalid">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        @include('layouts.main.includes.footer')
    </footer>
</body>
</html>