 <!-- ***** Menu Area Starts ***** -->
 <section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Destacados</h6>
                    <h2>Nuestra seleccion de productos de calidad y sabor</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">

                @foreach ($data as $data)
                

                    

                    <div class="item">
                        <div style="background-image: url('/foodimage/{{$data->imagen}}');" class='card'>
                            <div class="price"><h6>{{$data->precio}}</h6></div>
                            <div class='info'>
                            <h1 class='title'>{{$data->titulo}}</h1>
                            <p class='description'>{{$data->descripcion}}</p>
                            <div class="main-text-button">
                                <button type="button" class="btn btn-danger open-modal" data-bs-toggle="modal" data-bs-target="#modals" data-id="{{ $data->id }}"  data-title="{{ $data->titulo }}" data-imagen="{{ $data->imagen }}" data-descripcion="{{ $data->descripcion }}" data-precio="{{ $data->precio }}">Agregar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                
                @endforeach
            </div>
            <form id="formAddCart" action="{{url('/addcart',$data->id)}}" method="POST">

                @csrf

                

                <div class="modal fade" id="modals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Centrado y tamaño grande -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitulo"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6"> <!-- Columna para la imagen -->
                                        <img id="modalImagen" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-6"> <!-- Columna para la información -->
                                        <p id="modalDescripcion"></p>
                                        <p id="modalPrecio"></p>
                                        <div class="mb-3"> <!-- Espacio entre los elementos -->
                                            <label for="cantidad" class="form-label">Cantidad:</label>
                                            <input type="number" id="cantidad{{ $data->id }}" name="quantity" value="1" class="form-control" min="1">
                                            <!-- Campo oculto para enviar el ID de $data en un POST -->
                                            <input type="hidden" id="dataId" name="data_id" value="{{ $data->id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input id="agregarBtn" class="btn btn-success" type="submit" value="Confirmar">
                            </div>
                        </div>
                    </div>
                </div>
                


            </form>
            
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.open-modal').click(function() {
            var id = $(this).data('id');
            var titulo = $(this).data('title');
            var imagen = $(this).data('imagen');
            var descripcion = $(this).data('descripcion');
            var precio = $(this).data('precio');

            $('#modalTitulo').text(titulo);
            $('#modalImagen').attr('src', '/foodimage/' + imagen);
            $('#modalDescripcion').text(descripcion);
            $('#modalPrecio').text('Precio: $' + precio);
            $('#dataId').val(id);
        });
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Agrega un event listener al botón
            document.getElementById('agregarBtn').addEventListener('click', function () {
                // Obtiene el valor del input
                var id = document.getElementById('dataId').value;
                
                // Construye la URL con el ID obtenido
                var url = "{{ url('/addcart') }}/" + id;
                
                // Actualiza el atributo "action" del formulario
                document.getElementById('formAddCart').action = url;
                
                // Envía el formulario
                document.getElementById('formAddCart').submit();
            });
        });
</script>
<!-- ***** Menu Area Ends ***** -->