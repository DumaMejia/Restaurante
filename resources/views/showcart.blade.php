<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <link rel="stylesheet" href="admin/assets/css/style.css">
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
                            <li class="scroll-to-section"><a href="/home" class="active">Home</a></li>
                            
                           	
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
    
    
    <div  id="top" align="center" >
        <table id="tablaProductos" class="table table-striped" style="max-width: 500px ">
            <tr>
                <th style="">Platillo</th>
                <th style="">Cantidad</th>
                <th style=""></th>
                <th style="">Precio</th>
                <th style="">Precio Total</th>
                <th style="">Accion</th>
            </tr>
    <form action="{{url('/orderconfirm')}}" method="POST" >
                
        @csrf

            <?php 
                $total = 0;
                
            ?>
            @foreach ($data as $data)
                <?php
                    $precio = 0;
                    $cantidad = 0;
                    $totalP = 0;
                    $precio = $data->precio;
                    $cantidad = $data->cantidad;
                    $totalP = $precio * $cantidad;
                    $total += $totalP;
                    

                ?>
                <tr>
                    <td>
                        <input type="text" name="platillo[]" value="{{$data->food_id}}" hidden="">
                        {{$data->titulo}}
                    </td>
                    
                    <td>
                        <input  type="text" name="cantidad[]" value="{{$data->cantidad}}" hidden="">
                        {{$data->cantidad}}
                    </td>
                    <td>
                        <img src="/foodimage/{{$data->imagen}}" width="200" height="200">
                    </td>
                    <td>
                        <input type="text" name="precio[]" value="{{$data->precio}}" hidden="">
                        ${{$data->precio}}
                    </td>
                    <td>
                        <input type="text" name="preciot[]" value="${{ $totalP }}" hidden="">
                        ${{ $totalP }}
                    </td>
                    <td>
                        <a href="{{url('/remove',$data->id)}}" class="btn btn-warning">Remover</a>
                    </td>
                </tr>
                 
            @endforeach
        </table>
        <div>
            <p >Total a pagar: ${{ $total }}</p>
            <input type="hidden" name="total" value="${{ $total }}" id="inputTotal">
        </div>
        <div align="center" id="appear" class="mb-3">
            <div class="container">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img  src="/assets/images/pedido.png" alt="Icono de pedido" class="icono-pedido" style="width: 20px; height: 16px; margin-right: 5px;">
                    Pedir a domicilio
                </button>
                
                
                <!-- Modal INFORMACION DE CONTACTO-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informacion de Contacto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="mb-3">
                                    <label class="form-label" for="formGroupExampleInput" class="form-label">Nombre</label>
                                    <input class="form-control" value="{{ $usuario }}" type="text" name="nombre" placeholder="Nombre" hidden="">
                                    <span class="form-control">{{ $usuario }}</span>
                                </div>
                    
                                <div class="mb-3">
                                    <label class="form-label" for="formGroupExampleInput"  class="form-label">Telefono</label>
                                    <input required class="form-control" type="tel" id="phone" placeholder="Teléfono (+503)" required pattern="[0-9]{8}" name="telefono" title="Por favor ingresa un número de teléfono válido de El Salvador (+503) de 8 dígitos">
                                </div>
                    
                                <div class="mb-3">
                                    <label class="form-label" for="formGroupExampleInput" class="form-label">Direccion</label>
                                    <input required id="address" class="form-control" type="text" name="direccion" placeholder="Direccion Valida">
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="submitButton" disabled class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Siguiente</button>
                        
                    </div>
                </div>
            </div>
                </div> 
                <!-- Modal FORMA DE PAGO -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="tablaProductos" class="table table-striped" style="max-width: 500px ">
                                <tr>
                                    <th style="">Platillo</th>
                                    <th style="">Cantidad</th>
                                    <th style=""></th>
                                    <th style="">Precio</th>
                                    <th style="">Precio Total</th>
                                    
                                </tr>

                                <?php 
                                    $total1 = 0;
                                    
                                ?>
                                @foreach ($data3 as $data3)
                                    <?php
                                        $precio1 = 0;
                                        $cantidad1 = 0;
                                        $totalP1 = 0;
                                        $precio1 = $data3->precio;
                                        $cantidad1 = $data3->cantidad;
                                        $totalP1 = $precio1 * $cantidad1;
                                        $total1 += $totalP1;
                                        

                                    ?>
                                    <tr>
                                        <td>
                                            <input type="text"  value="{{$data3->food_id}}" hidden="">
                                            {{$data3->titulo}}
                                        </td>
                                        
                                        <td>
                                            <input  type="text"  value="{{$data3->cantidad}}" hidden="">
                                            {{$data3->cantidad}}
                                        </td>
                                        <td>
                                            <img src="/foodimage/{{$data3->imagen}}" width="200" height="200">
                                        </td>
                                        <td>
                                            <input type="text"  value="{{$data3->precio}}" hidden="">
                                            ${{$data3->precio}}
                                        </td>
                                        <td>
                                            <input type="text"  value="${{ $totalP1 }}" hidden="">
                                            ${{ $totalP1 }}
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </table>
                            Total a pagar: ${{ $total }}
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-success" type="Submit" value="Confirmar Order">
    </form>
                        </div>
                    </div>
                    </div>
                </div>      
            </div>
        </div>
   
    </div>
    
    

    <!-- ***** Header Area End ***** -->
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
        document.getElementById('enviarFormulario').addEventListener('click', function(event) {
            event.preventDefault(); // Previene el comportamiento predeterminado del enlace
            document.getElementById('miFormulario').submit(); // Envía el formulario
        });

        document.addEventListener("DOMContentLoaded", function() {
            const phoneInput = document.getElementById("phone");
            const addressInput = document.getElementById("address");
            const submitButton = document.getElementById("submitButton");

            phoneInput.addEventListener("input", validateForm);
            addressInput.addEventListener("input", validateForm);

            function validateForm() {
                if (phoneInput.validity.valid && addressInput.validity.valid) {
                submitButton.removeAttribute("disabled");
                } else {
                submitButton.setAttribute("disabled", "disabled");
                }
            }
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