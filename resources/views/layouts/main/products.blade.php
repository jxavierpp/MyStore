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

    <div class="storage" ng-controller="ProductController">
        {{--@yield('table1')--}}

        <table class="table table-striped task-table" >
            <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Inventario</th>
            <th>Categoria</th>
            <th>
                <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add',0)">Agregar</button>
            </th>
            </thead>
            <tr ng-repeat="product in products" ng-show="product.is_active == true">
                <td>@{{ product.product_id }}</td>
                <td>@{{ product.product_name }}</td>
                <td>@{{ product.product_price }}</td>
                <td>@{{ product.product_stock }}</td>
                <td>@{{ product.category_name }}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', product.product_id)">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(product.product_id)">
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
                        <form name="frmProduct" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                           placeholder="product name" value="@{{ product_name }}" ng-model="product.product_name" ng-required="true">
                                    <span ng-show="frmProduct.product_name.$invalid && frmProduct.product_name.$touched">product name field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Product Price</label>
                                <div class="col-sm-9">
                                    <input type=number step=0.01 min="0" class="form-control" id="product_price" name="product_price"
                                           placeholder="product price" value="@{{  product_price }}" ng-model="product.product_price" ng-required="true">
                                    <span ng-show="frmProduct.product_price.$invalid && frmProduct.product_price.$touched">product price field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Product Stock</label>
                                <div class="col-sm-9">
                                    <input type="number" min="0" class="form-control" id="product_stock" name="product_stock"
                                           placeholder="product stock" value="@{{ product_stock }}" ng-model="product.product_stock" ng-required="true">
                                    <span ng-show="frmProduct.product_stock.$invalid && frmProduct.product_stock.$touched">product stock field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Product Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="product_category" name="product_category" ng-model="product.category_fk" ng-required="true">
                                        <option value="" selected="selected">Seleccionar Categoria</option>
                                        <option ng-repeat="product in products" value="@{{ product.category_fk }}" >
                                            @{{ product.category_name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmproduct.$invalid">Save Changes</button>
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