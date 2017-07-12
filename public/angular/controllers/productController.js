app.controller('ProductController', function($scope, $http, API_URL) {
    //retrieve product list from API
    $http.get(API_URL + "product").then(function successCallback(response){
        $scope.products = response.data;
        console.log(response.data);
    }, function errorCallback(){
        console.log("Ocurrio un error");
    });
    //show modal form
    $scope.toggle = function(modalstate,id){
        $scope.modalstate = modalstate;
        switch(modalstate){
            case 'add':
                $scope.form_tittle = "Agregar Proveedor";
                console.log("agregar");
                break;
            case 'edit':
                $scope.form_tittle = "Editar Proveedor";
                console.log("editar");
                $scope.id = id;
                $http.get(API_URL + 'product/' + id).then(function successCallback(response){
                    $scope.product = response.data;
                    console.log($scope.product);
                });
                break;
            default:
                break;
        }

        $('#myModal').modal('show');
        $("#myModal").on("hidden.bs.modal", function(e){
            $("#product_name").val("");
            $("#product_email").val("");
            $("#product_phone").val("");
        });
    }
    //save new product and update existing product
    $scope.save = function(modalstate, id){
        var url = API_URL + "product";
        var metodo = 'POST';
        if(modalstate === 'edit'){
            console.log("editar");
            url += "/" + id;
            metodo = 'PUT';
            console.log($scope.product);
        }
        $http({
            method: metodo,
            url: url,
            //data: $.param($scope.product)
            params: $scope.product,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response){
            console.log(response);
            location.reload();
        }, function errorCallback(response){
            console.log(response);
            alert('An error has occured.');
        });
    }

    //delete product record
    $scope.confirmDelete = function(id){
        var isConfirmDelete = confirm("Are you sure you want delete this record?");
        if(isConfirmDelete){
            $http({
                method: 'DELETE',
                url: API_URL + "product/" + id
            }).then(function successCallback(response){
                console.log(response.data);
                location.reload();
            }, function errorCallback() {
                //console.log(response.data);
                alert("Unable to delete");
            });
        }else{
            return false;
        }
    }
});