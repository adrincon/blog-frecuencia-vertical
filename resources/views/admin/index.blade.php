@extends('admin.template.main')

@section('title', 'PANEL DE ADMINISTRACION')

@section('content')
<style>
  .jumbotron{
      color: black;
      padding: 20px 0;
  }

  .jumbotron  h1 img{
      padding-right: 40px;
  }

  .jumbotron a{
      text-decoration: none;
      color: black;
  }

  .jumbotron a:hover{
      color: #ffffff;
  }

</style>

<section class="jumbotron">
   <div class="container">
       <div class="row">
        <a href="{{ route('front.index') }}"><h1><img align="left" src="{{ asset('images\logo\01.png') }}" alt="" height="120px">Blog Frecuencia Vertical</h1></a>
        </div>
   </div>
</section>

<div class="container">
    <div class="btn-group btn-group-lg" role="group" aria-label="...">
        @if(Auth::user()->admin())
          <a class="btn btn-default" href="{{ route('users.create') }}">Crear Usuario</a>
        @endif
        <a class="btn btn-default" href="{{ route('categories.create') }}">Crear Categoria</a>
        <a class="btn btn-default" href="{{ route('articles.create') }}">Crear Articulo</a>
        <a class="btn btn-default" href="{{ route('tags.create') }}">Crear Tag</a>
    </div>
</div>

@endsection
