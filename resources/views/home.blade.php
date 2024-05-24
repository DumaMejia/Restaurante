<!DOCTYPE html>
<html lang="en">

  <head>

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

     <!-- CSS de Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- JS de Bootstrap (popper.js incluido) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

     
     

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
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Sobre Nosotros</a></li>
                           	
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
                            <li class="scroll-to-section"><a href="{{url('/menu')}}">Menu</a></li>
                            
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
                                        <a href="">Cart[0]</a>
                                    @endguest
                                </li>
                            </li>
                            <li class="scroll-to-section">
                                @if (Route::has('login'))
                                    
                                        @auth
                                        <li class="submenu">
                                            <a>{{ Auth::user()->name }}</a>
                                            <ul>
                                                <li><a href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">{{ __('Perfil') }}</a></li>
                                                <li>
                                                    <form id="miFormulario" method="POST" action="{{ route('logout') }}" x-data>
                                                        @csrf
                                    
                                                        <a id="enviarFormulario" href="{{ route('logout') }}">
                                                            {{ __('Cerrar Sesion') }}
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

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>Fuego & Brasa</h4>
                            <h6>La mejor experiencia</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="{{url('/menu')}}">Ver el menu</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-01.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-02.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-03.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Sobre Nosotros</h6>
                            <h2>Maestros de la parrilla</h2>
                        </div>
                        <p>Somos auténticos maestros en el arte ancestral de la parrilla. <a href="https://templatemo.com/tag/restaurant" target="_blank" rel="sponsored"></a> Cada corte de carne que tocamos con nuestras brasas se convierte en una obra maestra de sabores y texturas. Nuestros chefs dominan el fuego, ajustando tiempo y temperatura con precisión para alcanzar la perfección en cada bocado. Cada parrillada honra la tradición y la innovación culinaria, un equilibrio entre la fidelidad a técnicas clásicas y el deseo de sorprender a nuestros comensales.</p>
                        <div class="row">
                            <div class="col-4">
                                <img src="assets/images/emplatado-final-del-lomo-de-cerdo-a-la-plancha.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/60f9c4c89a68e000121704.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/filete_de_pechuga_a_la_plancha_59314_orig.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                            <img src="assets/images/about-video-bg.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

   @include('food')

   

    @include('promos')
    <!-- ***** Chefs Area Ends ***** --> 
    
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
                        
                        <br>Design: Duma Zelaya</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script>
        document.getElementById('enviarFormulario').addEventListener('click', function(event) {
            event.preventDefault(); // Previene el comportamiento predeterminado del enlace
            document.getElementById('miFormulario').submit(); // Envía el formulario
        });
    </script>

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

        window.onload = function() {
            Swal.fire({
                icon: 'info',
                title: '¡Importante!',
                text: 'La pagina actual es un proyecto universitario, por lo tanto puede presentar errores. Los tiempos de pedido y de actualizacion podrian demorar bastante se recomienda paciencia. Cualquier inconveniente escribir a: dumazelaya.001@gmail.com',
                confirmButtonText: 'OK'
            });
        };

    </script>
  </body>
</html>
@include('sweetalert::alert')