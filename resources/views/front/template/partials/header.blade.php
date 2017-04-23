<header>
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                        <span class="sr-only">Desplegar / Ocultar Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ route('front.index') }}" class="navbar-brand">Frecuencia Vertical</a>
                </div>
                <!-- Inicia Menu -->
                <div class="collaps navbar-collapse" id="navegacion-fm">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('front.index') }}">Inicio</a></li>
                        <li><a href="https://www.facebook.com/frecuencia.vertical/">Facebook</a></li>
						<li><a href="{{ route('login') }}" >Ingresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
	<!-- Aqui va el Jumbotron -->

<section class="jumbotron">
	<div class="container">
		<div class="row">
        <a href="{{ route('front.index') }}"><h1><img align="left" src="{{ asset('images\logo\01.png') }}" alt="" height="120px">Blog Frecuencia Vertical</h1></a>

        <div class="hidden-xs">
            <p>Todo sobre Escalada Deportiva</p>
        </div>

        </div>
	</div>
</section>
