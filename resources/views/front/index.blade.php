@extends('front.template.main')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="row">

				<div class="miga-de-pan">
					<ol class="breadcrumb">
						<li><strong>Ultimos Articulos</strong></li>
					</ol>
				</div>

					@foreach($articles as $article)
					<article class="post clearfix">
	                        <a href="{{ route('front.view.article', $article->slug) }}" class="thumb pull-left">
								@foreach($article->images as $image)
	                            <img class="img-thumbnail" src="{{ asset('images/articles/' . $image->name) }}" alt="">
								@endforeach
	                        </a>
	                        <h2 class="post-title">
	                            <a href="{{ route('front.view.article', $article->slug) }}">{{ $article->title }}</a>
	                        </h2>
	                        <p>Publicado <span class="post-fecha">{{ $article->created_at->diffForHumans() }}
							</span> por <span class="post-autor"><strong>{{ $article->user->name }}</strong></span></p>
	                        <p class="post-contenido text-justify">
	                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	                        </p><br>
	                        <div class="contenedor-botones">
								<i class="fa fa-folder-open-o"></i> <a href="{{ route('front.search.category', $article->category->name) }}">{{ $article->category->name }}</a>

							<div class="pull-right">
								<a href="{{ route('front.view.article', $article->slug) }}" class="btn btn-primary">Leer Mas</a>
							</div>

	                        </div>
	                    </article>
						@endforeach
			</div>
			{!! $articles->render() !!}
		</div>

		<div class="col-md-4">
			@include('front.partials.aside')
		</div>
	</div>
@endsection
