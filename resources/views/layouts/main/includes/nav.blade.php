<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"></button>
        <a class="navbar-brand" href="#">My Store</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{ URL::to('proveedores') }}">Proveedores</a></li>
            <li><a href="{{ URL::to('productos') }}">Productos</a></li>
        </ul>
    </div> 

</div>