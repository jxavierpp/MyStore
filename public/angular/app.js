var app = angular.module('supplierApp',[])
    .constant('API_URL','http://mystore.dev/api/');

app.constant("CSRF_TOKEN", '{{ csrf_token() }}');
