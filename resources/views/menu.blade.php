<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    

    <title>Fuego y Brasa</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS de Bootstrap (popper.js incluido) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    
    <!--Stylesheet-->
    <link rel="stylesheet" href="/Grid Food Menu/style.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/home" class="logo">
                            <img src="assets/images/fyb.png" align="klassy cafe html template" width="100" height="100">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section">
                                <li>
                                    @auth
                                        <a href="/home" class="active">Home</a>
                                    @endauth
                                </li>
                                <li>
                                    @guest
                                        <a href="/" class="active">Home</a>
                                    @endguest
                                </li>
                                
                            </li>
                            
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            
                            
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            
                            <li class="scroll-to-section">
                                <li>
                                    @auth
                                        <a href="{{url('/showcart',Auth::user()->id)}}">
                                        carrito[{{$count}}]
                                    </a>
                                    @endauth
                                </li>
                                <li>
                                    @guest
                                        <a href="/">Cart[0]</a>
                                    @endguest
                                </li>
                            </li>
                            <li class="scroll-to-section">
                                @if (Route::has('login'))
                                    
                                        @auth
                                        <li class="submenu">
                                            <a>{{ Auth::user()->name }}</a>
                                            <ul>
                                                <li><a href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">{{ __('Profile') }}</a></li>
                                                <li>
                                                    <form id="miFormulario" method="POST" action="{{ route('logout') }}" x-data>
                                                        @csrf
                                    
                                                        <a id="enviarFormulario" href="{{ route('logout') }}">
                                                            {{ __('Log Out') }}
                                                        </a>
                                                    </form>
                                                </li>
                                                <li><a href="{{route('pedidos',Auth::user()->id)}}">Mis Ordenes</a></li>
                                            </ul>
                                        </li>
                                        @else
                                            <li><a href="{{ route('login') }}">Log in</a></li>

                                            @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                            @endif
                                        @endauth
                                  
                                @endif
                            </li>  
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    
    <body>
        <section class="section" id="offers">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="tabs">
                            <div class="col-lg-12">
                                <div class="heading-tabs">
                                    <div class="row">
                                        <div class="col-lg-12 offset-lg-0">
                                            <form id="filtrar" action="{{url('/filtrar')}}" action="GET">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="submit" name="filtro" value="" class="btn btn-danger">Todos</button>
                                                    <button type="submit" name="filtro" value="Pescados y Mariscos" class="btn btn-danger">Pescados y Mariscos</button>
                                                    <button type="submit" name="filtro" value="Platos Mixtos" class="btn btn-danger">Platillos Mixtos</button>
                                                    <button type="submit" name="filtro" value="Pastas y Ensaladas" class="btn btn-danger">Pastas y Ensaladas</button>
                                                    <button type="submit" name="filtro" value="Hamburguesas" class="btn btn-danger">Hamburguesas</button>
                                                    <button type="submit" name="filtro" value="Tacos" class="btn btn-danger">Tacos</button>
                                                    <button type="submit" name="filtro" value="Pizzas" class="btn btn-danger">Pizzas</button>
                                                    <button type="submit" name="filtro" value="Bebidas" class="btn btn-danger">Bebidas</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="heading">
            <h3> MENU</h3>
        </div>
        <div class="menu">

            @foreach ($data as $data)
                <form action="{{url('/addcart',$data->id)}}" method="POST">

                    @csrf

                    <div class="food-items">
                        <img src="/foodimage/{{$data->imagen}}" width="100px" height="350px">
                        <div class="details">
                            <div class="details-sub">
                                <h5>{{$data->titulo}}</h5>
                                <h5 class="price"> {{$data->precio}} </h5>
                            </div>
                            <p>{{$data->descripcion}}</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $data->id }}">Agregar al carrito</button>
                            
                        </div>
                        <div class="modal fade" id="modal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg"> <!-- Tamaño grande -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $data->titulo }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6"> <!-- Columna para la imagen -->
                                                <img src="/foodimage/{{ $data->imagen }}" alt="{{ $data->titulo }}" class="img-fluid">
                                            </div>
                                            <div class="col-md-6"> <!-- Columna para la información -->
                                                <p>{{ $data->descripcion }}</p>
                                                <p>Precio: ${{ $data->precio }}</p>
                                                <div class="mb-3"> <!-- Espacio entre los elementos -->
                                                    <label for="cantidad" class="form-label">Cantidad:</label>
                                                    <input type="number" id="cantidad{{ $data->id }}" name="quantity" value="1" class="form-control" min="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input class="btn btn-success" type="submit" value="Confirmar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                </form>
            @endforeach

        </div>
    </body>

    <!-- ***** Footer Start ***** -->
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/fyb2.png" alt="" width="200" height="150"width="150" height="150"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Fuego & Brasa Co.
                        
                        <br>Design: El Equipo mas dotado</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script type="text/javascript">
        $("#order").click(
            function()
                {
                    $("#appear").show();
                }
        );

        $("#close").click(
            function()
                {
                    $("#appear").hide();
                }
         );
    </script>
    <script>
        document.getElementById('enviarFormulario').addEventListener('click', function(event) {
            event.preventDefault(); // Previene el comportamiento predeterminado del enlace
            document.getElementById('miFormulario').submit(); // Envía el formulario
        });
        
    </script>
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>
@include('sweetalert::alert')