@extends('admin.template.main')

@section('tilte', 'Listado de tags')

@section('content')
    <a href="{{ route('tags.create') }}" class="btn btn-info">Registrar nuevo Tag</a>
    <!-- BUSCADOR DE TAGS -->
    {!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
    <div class="form-group">
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tag..',]) !!}
    </div>
    {!! Form::close() !!}

    <!-- FIN DEL BUSCADOR -->

    <table class="table table-sriped">
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Accion</th>
      </thead>
      <tbody>
        @foreach($tags as $tag)
            <tr>
              <td>{{ $tag->id }}</td>
              <td>{{ $tag->name }}</td>
              <td>
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>

                <a href="{{ route('tags.destroy', $tag->id) }}" onclick="return confirm('Esta seguro que desea eliminar el usuario?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-center">
      {!! $tags->render() !!}
    </div>
@endsection
