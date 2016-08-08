<li>
    <a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Estadisticas</a>
</li>
<li>
    <a href="{{ url('/invoice') }}">Factura</a>
</li>
<li>
    <a href="#">Clientes<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="{{ url('/client') }}"><small> Todos los clientes </small></a>
        </li>
        <li>
            <a href="{{ url('/client/create') }}"><small> Anadir nuevo</small></a>
        </li>
    </ul>
</li>

<li>
    <a href="#">Presupuestos<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="{{ url('/budget') }}"><small> Todos los presupuestos</small></a>
        </li>
        <li>
            <a href="{{ url('/budget/create') }}"><small> Crear nuevo</small></a>
        </li>
    </ul>
</li>

<li>
    <a href="#">Productos<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="{{ url('/product') }}"><small> Todos los productos</small></a>
        </li>
        <li>
            <a href="{{ url('/product/create') }}"><small> Anadir nuevo</small></a>
        </li>
    </ul>
</li>
