@extends('layouts.plantilla')
@section("title", "Books | Inicio")
@section('content')
    <div id="carrusel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carrusel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carrusel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carrusel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <figure class="h-100">
                    <picture>
                        <source media="(max-width: 375px)" srcset="{{asset('uploads/thumbnails/carrusel1_sm.jpg')}}">
                        <source media="(max-width: 768px)" srcset="{{asset('uploads/thumbnails/carrusel1_md.jpg')}}">
                        <img src="{{asset('uploads/carrusel1.jpg')}}" class="img-fluid d-block w-100" alt="Imagen del carrusel">
                    </picture>
                </figure>
            <div class="h-100 w-100 position-absolute d-none d-md-grid top-0 start-0 align-items-center justify-content-center">
                <div class="carousel-caption">
                    <h1>¡Bienvenido a Books!</h1>
                    <p>Disfruta de los mejores libros al mejor precio.</p>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <figure class="h-100">
                    <picture>
                        <source media="(max-width: 375px)" srcset="{{asset('uploads/thumbnails/carrusel2_sm.jpg')}}">
                        <source media="(max-width: 768px)" srcset="{{asset('uploads/thumbnails/carrusel2_md.jpg')}}">
                        <img src="{{asset('uploads/carrusel2.jpg')}}" class="img-fluid d-block w-100" alt="Imagen del carrusel">
                    </picture>
                </figure>
            </div>
            <div class="carousel-item">
                <figure class="h-100">
                    <picture>
                        <source media="(max-width: 375px)" srcset="{{asset('uploads/thumbnails/carrusel3_sm.jpg')}}">
                        <source media="(max-width: 768px)" srcset="{{asset('uploads/thumbnails/carrusel3_md.jpg')}}">
                        <img src="{{asset('uploads/carrusel3.jpg')}}" class="img-fluid d-block w-100" alt="Imagen del carrusel">
                    </picture>
                </figure>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carrusel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrusel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <main class="container-xl">
        {{-- LIBROS RECOMENDADOS --}}
        <div class="row mt-5">
            <div class="title__container">
                <h1 class="text-center">Recomendados</h1>
            </div>
            <div class="recomendados__container col-6 col-md-10 m-auto py-3">
                <div class="libros__container mt-3">
                    @foreach ($libros_recomendados as $libro)
                    <div class="card">
                        <figure class="m-0">
                           <a href="{{route('libros.show', $libro)}}"><img src="{{$libro->portada}}" alt="{{$libro->titulo}}" class="img-fluid"></a>  
                        </figure>
                        <div class="libro__info">
                            <h4 class="libro__titulo" title="{{$libro->titulo}}">{{$libro->titulo}}</h4>
                            <p class="libro__autor">{{$libro->autor}}</p>
                            <p class="libro__precio">{{$libro->precio}}€</p>
                            @if ($libro->stock>0)
                            <form action="{{--{{route('add_to_cart', $libro)}}--}}" method="get" class="form-add-to-cart">
                                @csrf
                                @if (Auth::check()) {{-- Si hay una sesión iniciada --}}
                                    <input type="submit" value="Comprar" class="boton" data-id="{{$libro->id}}">
                                 @else
                                    <input type="submit" value="Comprar" class="boton" disabled>
                                @endif
                            </form>
                            @else
                            <span class="btn-delete">Fuera de Stock</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                
                </div> 
                
            </div>
        </div>

        {{-- LIBROS MÁS RECIENTES --}}
        <div class="row mt-5">
            <div class="title__container">
                <h1 class="text-center">Más recientes</h1>
            </div>
            <div class="recomendados__container col-6 col-md-10 m-auto py-3">
                <div class="libros__container mt-3">
                    @foreach ($libros_recientes as $libro)
                    <div class="card">
                        <figure class="m-0">
                            <a href="{{route('libros.show', $libro)}}"><img src="{{$libro->portada}}" alt="{{$libro->titulo}}" class="img-fluid"></a> 
                        </figure>
                        <div class="libro__info">
                            <h4 class="libro__titulo" title="{{$libro->titulo}}">{{$libro->titulo}}</h4>
                            <p class="libro__autor">{{$libro->autor}}</p>
                            <p class="libro__precio">{{$libro->precio}}€</p>
                            @if ($libro->stock>0)
                            <form action="" method="get" class="form-add-to-cart">
                                @csrf
                                @if (Auth::check()) {{-- Si hay una sesión iniciada --}}
                                    <input type="submit" value="Comprar" class="boton" data-id="{{$libro->id}}">
                                 @else
                                    <input type="submit" value="Comprar" class="boton" disabled>
                                @endif
                            </form>
                            @else
                            <span class="btn-delete">Fuera de Stock</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </main>

    {{-- SUSCRIBE SECTION --}}
    <div class="container-fluid">
        <section class="row mt-5">
            <div class="col suscribe__container" style="background-image: url({{asset('uploads/seccion-suscribe.jpg')}});">
                <div class="suscribe__info">
                    <h2 class="suscribe__title">Suscríbete para conocer nuestras últimas noticas</h2>
                    <form action="{{ route('suscribe.newstler') }}" method="POST">
                        @csrf
                        <input type="email" name="email" id="mail" class="form-control" placeholder="Introduce tu email">
                        @error('email')
                        <div id="alert-error" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <i class="bi bi-exclamation-circle"></i> 
                            {{$message}} 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                        <input type="submit" value="Suscribirse">
                    </form>
                </div>
            </div>
        </section>

        {{-- VENTAJAS --}}
        <section class="row py-5">
            <div class="col-10 col-md-9 ventajas__container">
                <div class="ventaja">
                    <i class="bi bi-bag-check"></i>
                    <p>Compra segura</p>
                </div>

                <div class="ventaja">
                    <i class="bi bi-truck"></i>
                    <p>Envío gratis a partir de 15€</p>
                </div>

                <div class="ventaja">
                    <i class="bi bi-shop"></i>
                    <p>Recogida en tienda gratis</p>
                </div>

                <div class="ventaja">
                    <i class="bi bi-arrow-clockwise"></i>
                    <p>Devolución gratis hasta 30 días</p>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
  <script>
        //Definición de rutas
        let url = "{{route('add_to_cart')}}";
        let urlCartContent = "{{route('offcanvas-cart-content')}}";
  </script>
      @vite(['resources/js/cart.js'])
@endsection