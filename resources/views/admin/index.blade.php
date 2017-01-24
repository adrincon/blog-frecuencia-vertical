@extends('admin.template.main')

@section('title', 'PANEL DE ADMINISTRACION')

@section('content')
<style>
  *{
  margin: 0;
  padding: 0;
  }
  header, .main{
  width: 90%;
  max-width: 1000px;
  margin: 20px auto;
  }
  header nav{
  background: #528FD5;
  overflow: hidden;
  }
  header nav ul{
  list-style:none;
  }

  header nav ul li{
    float: left;
  }

  header nav ul li a{
    padding: 10px 20px;
    display: block;
    color:#fff;
    text-decoration: none;
  }

  header nav ul li a:hover{
    background: #75ACEC;
  }

</style>

<header>
    <div class="logotipo">
      <img src="\blog\public\images\logo\Flama.jpg" width=100 alt="">
    </div>
    <nav>
      <ul>
        @if(Auth::user()->admin())
        <li><a href="{{ route('users.create') }}">Crear Usuario</a></li>
        @endif
        <li><a href="{{ route('categories.create') }}">Crear Categoria</a></li>
        <li><a href="{{ route('articles.create') }}">Crear Articulo</a></li>
        <li><a href="{{ route('images.index') }}">Galeria de Imagenes</a></li>
        <li><a href="{{ route('tags.create') }}">Crear Tags</a></li>
      </ul>
    </nav>
  </header>

  <section class="main">
    <article>
        <h2>Contenido de Relleno</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
          qui officia deserunt mollit anim id est laborum.</p>
      </article>
  </section>


@endsection
