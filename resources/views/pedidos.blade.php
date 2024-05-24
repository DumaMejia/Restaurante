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
                            <li class="scroll-to-section"><a href="{{url('/home')}}" class="active">Home</a></li>
                           	
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
                                                <li><a href="">Mis Ordenes</a></li>
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
    <div  id="top" align="center" style="position: relative; top: 50px; ">
        <div class="container mt-5">
            <!-- Pestañas de Pedidos Efectuados y Pendientes -->
            <ul class="nav nav-tabs" id="tablero-pedidos" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pedidos-efectuados-tab" data-bs-toggle="tab" data-bs-target="#pedidos-efectuados" type="button" role="tab" aria-controls="pedidos-efectuados" aria-selected="true">Pedidos Pendientes</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pedidos-pendientes-tab" data-bs-toggle="tab" data-bs-target="#pedidos-pendientes" type="button" role="tab" aria-controls="pedidos-pendientes" aria-selected="false">Pedidos Efectuados</button>
              </li>
            </ul>
          
            <!-- Contenido de las Pestañas -->
            <div class="tab-content mt-3">
              <!-- Tabla de Pedidos Efectuados -->
              <div class="tab-pane fade show active" id="pedidos-efectuados" role="tabpanel" aria-labelledby="pedidos-efectuados-tab">
                <h2 class="mb-3">Pedidos Pendientes</h2>
                <table class="table">
                    <tr>
                        <th style=""># de pedido</th>
                        <th style="">A Nombre de </th>
                        <th style="">Telefono</th>
                        <th style="">Direccion</th>
                        <th style="">Total</th>
                        <th style="">Emitido:</th>
                        <th style="">Estado</th>
                        <th style="">Accion</th>
                    </tr>
                    @php $contador1 = 1 @endphp
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$contador1}}</td>
                        <td>{{ $usuario }}</td>
                        <td>{{$data->telefono}}</td>
                        <td>{{$data->direccion}}</td>
                        <td>{{$data->total}}</td>
                        <td>{{$data->created_at}}</td>
                        <td class="estado {{ strtolower(str_replace(' ', '-', $data->estado)) }}">{{$data->estado}}</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProductosEntregados{{ $data->id }}"> 
                            Ver Productos
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalProductosEntregados{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Productos Pendientes</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <!-- Tabla de Productos Pendientes -->
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Precio Unitario</th>
                                            <th scope="col">Precio Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Aquí debes agregar dinámicamente los productos Pendientes -->
                                        @php $contador = 1 @endphp
                                        @foreach ($data->detalles as $detalles)
                                        <tr>
                                            <th scope="row">{{$contador}}</th>
                                            <td>{{$detalles->food->titulo}}</td>
                                            <td>{{$detalles->cantidad}}</td>
                                            <td>{{$detalles->p_unitario}}</td>
                                            <td>{{$detalles->p_total}}</td>
                                        </tr>
                                        @php $contador++ @endphp  
                                        @endforeach
                                        <!-- Puedes agregar más filas según sea necesario -->
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
              
                        </td>
                    </tr>
                    @php $contador1++ @endphp
                    @endforeach
                </table>
              </div>
             
                  
          
              <!-- Tabla de Pedidos Efectuados -->
              <div class="tab-pane fade" id="pedidos-pendientes" role="tabpanel" aria-labelledby="pedidos-pendientes-tab">
                <h2 class="mb-3">Pedidos Efectuados</h2>
                <table class="table">
                    <tr>
                        <th style=""># de pedido</th>
                        <th style="">A Nombre de </th>
                        <th style="">Telefono</th>
                        <th style="">Direccion</th>
                        <th style="">Total</th>
                        <th style="">Entregado a las:</th>
                        <th style="">Estado</th>
                        <th style="">Accion</th>
                    </tr>
                    @foreach ($data1 as $data1)
                    <tr>
                        <td>{{$data1->id}}</td>
                        <td>{{ $usuario }}</td>
                        <td>{{$data1->telefono}}</td>
                        <td>{{$data1->direccion}}</td>
                        <td>{{$data1->total}}</td>
                        <td>{{$data1->updated_at}}</td>
                        <td class="estado {{ strtolower(str_replace(' ', '-', $data1->estado)) }}">{{$data1->estado}}</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProductosPendientes{{ $data1->id }}">
                            Ver Productos
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalProductosPendientes{{ $data1->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Productos Entregados</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <!-- Tabla de Productos Entregados -->
                                    <table class="table">
                                        <thead>
                                        
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Precio Unitario</th>
                                            <th scope="col">Precio Total</th>
                                        </tr>
                                        
                                        </thead>
                                        <tbody>
                                        <!-- Aquí debes agregar dinámicamente los productos entregados -->
                                        @php $contador2 = 1 @endphp
                                        @foreach ($data1->detalles as $detalles)
                                        <tr>
                                            <th scope="row">{{$contador2}}</th>
                                            <td>{{$detalles->food->titulo}}</td>
                                            <td>{{$detalles->cantidad}}</td>
                                            <td>{{$detalles->p_unitario}}</td>
                                            <td>{{$detalles->p_total}}</td>
                                        </tr>
                                        @php $contador2++ @endphp  
                                        @endforeach
                                        <!-- Puedes agregar más filas según sea necesario -->
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
              </div>
            </div>
          </div>
    </div>
    
   
    <!-- ***** Footer Start ***** -->
    <footer style="position: fixed; bottom: 0; width: 100%;">
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
    <script>
        // Agregar evento de clic a las pestañas para mostrar/ocultar las tablas
        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
          tab.addEventListener('click', () => {
            const tabPaneId = tab.getAttribute('data-bs-target');
            const tabPane = document.querySelector(tabPaneId);
      
            // Ocultar todas las tablas de pedidos
            document.querySelectorAll('.tab-pane').forEach(tp => {
              tp.classList.remove('active', 'show');
            });
      
            // Mostrar la tabla correspondiente a la pestaña seleccionada
            tabPane.classList.add('active', 'show');
          });
        });
    </script>
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

    </script>
  </body>
</html>