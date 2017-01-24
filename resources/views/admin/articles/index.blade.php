@extends('admin.template.main')

@section('title', 'Listado de articulos')

@section('content')
  <a href="{{ route('articles.create') }}" class="btn btn-info">Registrar nuevo Articulo</a>
  <!-- BUSCADOR DE TAGS -->
  {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
  <div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar Articulo..',]) !!}
  </div>
  {!! Form::close() !!}

  <!-- FIN DEL BUSCADOR -->
  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th>Titulo</th>
      <th>Categoria</th>
      <th>Accion</th>
    </thead>
    <tbody>
      @foreach($articles as $article)
        <tr>
          <td>{{ $article->id }}</td>
          <td>{{ $article->title }}</td>
          <td>{{ $article->category->name }}</td>
          <td>{{ $article->user->name }}</td>
          <td>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>

            <a href="{{ route('articles.destroy', $article->id) }}" onclick="return confirm('Esta seguro que desea eliminar el usuario?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
          </td>
      @endforeach
        </tr>
    </tbody>
  </table>
  <div class="text-center">
    {!! $articles->render() !!}
  </div>
@endsection
