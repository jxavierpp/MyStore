app.controller('SupplierController', function($scope,$http,API_URL){
    //retrieve Supplier lsit from API
    $http.get(API_URL + "supplier").then(function successCallback(response){
        $scope.suppliers = response.data;
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
                $http.get(API_URL + 'supplier/' + id).then(function successCallback(response){
                    $scope.supplier = response.data;
                    console.log($scope.supplier);
                });
                break;
            default:
                break;
        }

        $('#myModal').modal('show');
        $("#myModal").on("hidden.bs.modal", function(e){
            $("#supplierName").val("");
            $("#supplierEmail").val("");
            $("#supplierPhone").val("");
        });
    }
    //save new supplier and update existing supplier
    $scope.save = function(modalstate, id){
        var url = API_URL + "supplier";
        var metodo = 'POST';
        if(modalstate === 'edit'){
            console.log("editar");
            url += "/" + id;
            metodo = 'PUT';
            console.log($scope.supplier);
        }
        $http({
            method: metodo,
            url: url,
            //data: $.param($scope.supplier)
            params: $scope.supplier,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response){
            console.log(response);
            location.reload();
        }, function errorCallback(response){
            console.log(response);
            alert('An error has occured.');
        });
    }

    //delete supplier record
    $scope.confirmDelete = function(id){
        var isConfirmDelete = confirm("Are you sure you want delete this record?");
        if(isConfirmDelete){
            $http({
                method: 'DELETE',
                url: API_URL + "supplier/" + id
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