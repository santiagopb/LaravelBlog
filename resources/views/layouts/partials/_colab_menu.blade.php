<li>
    <a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Escritorio</a>
</li>
<li>
    <a href="#"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Entradas<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="{{ url('/post') }}"><small> Todas las entradas </small></a>
        </li>
        <li>
            <a href="{{ url('/post/create') }}"><small> Anadir nueva</small></a>
        </li>
        <li>
            <a href="{{ url('/category') }}"><small> Categorias</small></a>
        </li>
        <li>
            <a href="{{ url('/tag') }}"><small> Etiquetas</small></a>
        </li>
    </ul>
</li>
<li>
    <a href="{{ url('/media') }}"><i class="fa fa-camera" aria-hidden="true"></i> Medios</a>
<!--    <ul class="nav nav-second-level">
        <li>
            <a href="{{ url('/media') }}"><small> Biblioteca</small></a>
        </li>
        <li>
            <a href="{{ url('/pelicula') }}"><small> Anadir nuevo</small></a>
        </li>
    </ul>-->
</li>

<li>
    <a href="{{ url('/comment')}}"><i class="fa fa-comment" aria-hidden="true"></i> Comentarios</a>
</li>

<li>
    <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Perfil</a>

</li>
