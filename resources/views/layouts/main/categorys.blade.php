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

    <div class="storage" ng-controller="CategoryController">
        {{--@yield('table1')--}}

        <table class="table table-striped task-table" >
            <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>
                <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add',0)">Agregar</button>
            </th>
            </thead>
            <tr ng-repeat="category in categorys" ng-show="category.is_active == true">
                <td>@{{ category.category_id }}</td>
                <td>@{{ category.category_name }}</td>
                <td>@{{ category.category_description }}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit',category.category_id)">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(category.category_id)">
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
                        <form name="frmCategory" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="category_name" name="category_name"
                                           placeholder="Category Name" value="@{{ category_name }}" ng-model="category.category_name"
                                           ng-required="true">
                                    <span ng-show="frmCategory.category_name.$invalid && frmCategory.category_name.$touched">Category Name field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Category Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="category_description" name="category_description"
                                           placeholder="Category Description" value="@{{  category_description }}" ng-model="category.category_description"
                                           ng-required="true">
                                    <span ng-show="frmCategory.category_description.$invalid && frmCategory.category_description.$touched">Supplier Email field is required</span>
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