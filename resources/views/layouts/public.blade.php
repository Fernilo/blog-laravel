<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		@livewireStyles
		<script src="{{ asset('js/blog.js') }}" defer></script>

		<link rel="stylesheet" href="{{ asset('css/public.css') }}">
		<title>Blog laravel!</title>
	</head>
	<body>
		<nav class="navbar navbar-dark navbar-expand-lg navbar-light" style="background-color: #ff0000">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Blog</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse " id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link text-dark {{ (Route::currentRouteName() == 'post.index')? 'active' : ''  }}" href="{{ route('post.index') }}">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Categorías
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								@foreach ($categorias as $categoria)
									<li><a class="dropdown-item" href="{{ route('post.categoria',$categoria )}}">{{ $categoria->nombre }}</a></li>
								@endforeach
							</ul>
						</li>

						@can('admin.home.index')
							<li class="nav-item">
								<a class="nav-link text-dark" href="{{ route('admin.home.index') }}">
								| Admin
								</a>
							</li> 
						@endcan
					
						@auth
						<li class="nav-item">
							<form method="POST" action="{{ route('logout') }}">
								@csrf
				
								<button class="nav-link text-dark logout-button"  type="submit">
									{{ __('| Log Out') }}
								</button >
							</form>
						</li> 
						@else
						<li class="nav-item">
							<a class="nav-link text-dark" href="{{ route('admin.home.index') }}">
							| Login
							</a>
						</li> 
						@endif
					
					</ul>
					<form class="d-flex">
						<input class="form-control me-2" name="texto" id="texto" type="search" placeholder="Buscar" aria-label="Search">
					</form>
				</div>
			</div>
		</nav>
		<div style="position:absolute;right:0px;max-width:600px;background-color: #ff0000;z-index:100000" class="text-decoration-none" id="resultados"></div>

		<div class="container">
			@yield('contenidoPrincipal')
		</div>

		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		@livewireScripts
		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		-->
	</body>
</html>