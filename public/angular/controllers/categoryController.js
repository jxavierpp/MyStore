app.controller('CategoryController', function($scope, $http, API_URL){
    //retrieve category list from API
    $http.get(API_URL + "category").then(function successCallback(response){
        $scope.categorys = response.data;
        console.log(response.data);
    }, function errorCallback(){
        console.log("Ocurrio un error");
    });
    //show modal form
    $scope.toggle = function(modalstate, id){
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
                $http.get(API_URL + 'category/' + id).then(function successCallback(response){
                    $scope.category = response.data;
                    console.log($scope.category);
                });
                break;
            default:
                break;
        }

        $('#myModal').modal('show');
        $("#myModal").on("hidden.bs.modal", function(e){
            $("#category_name").val("");
            $("#category_description").val("");
        });
    }
    //save new category and update existing category
    $scope.save = function(modalstate, id){
        var url = API_URL + "category";
        if(modalstate === 'edit'){
            url += "/" + id;
        }
        $http({
            method: "POST",
            url: url,
            //data: $.param($scope.category)
            params: $scope.category,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response){
            console.log(response);
            location.reload();
        }, function errorCallback(response){
            console.log(response);
            alert('An error has occured.');
        });
    }

    //delete category record
    $scope.confirmDelete = function(id){
        var isConfirmDelete = confirm("Are you sure you want delete this record?");
        if(isConfirmDelete){
            $http({
                method: 'DELETE',
                url: API_URL + "category/" + id
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