<!-- ***** Menu Area Starts ***** -->
<section class="section" id="offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <h6>Promociones</h6>
                    <h2>Aprovecha las ofertas que tenemos para ti</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="tabs">
                    <div class="col-lg-12">
                        <section class='tabs-content'>
                            <article id='tabs-1'>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="left-list">
                                                @foreach ($limi as $limi)
                                                    <form id="enviarCart" action="{{url('/addcart',$limi->id)}}" method="POST">

                                                    @csrf

                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="/foodimage/{{$limi->imagen}}" alt="" width="300px" height="100px">
                                                                <h4>{{$limi->titulo}}</h4>
                                                                <p>{{$limi->descripcion}}</p>
                                                                <div class="price">
                                                                    <h6>{{$limi->precio}}</h6>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $limi->id }}">Agregar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="modal{{ $limi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">{{$limi->titulo}}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="/foodimage/{{$limi->imagen }}" alt="{{ $limi->titulo }}" class="img-fluid" >
                                                                        <p>{{ $limi->descripcion }}</p>
                                                                        <p>Precio: ${{ $limi->precio }}</p>
                                                                        <label for="cantidad">Cantidad:</label>
                                                                        <input type="number" id="cantidad{{ $limi->id }}" name="quantity" value="1" min="1">
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                        <input class="btn btn-success" type="Submit" value="Confirmar">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="right-list">
                                                @foreach ($ofer as $ofer)
                                                <form id="enviarCart" action="{{url('/addcart',$ofer->id)}}" method="POST">

                                                    @csrf

                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="/foodimage/{{$ofer->imagen}}"  alt="" width="300px" height="100px">
                                                            <h4>{{$ofer->titulo}}</h4>
                                                            <p>{{$ofer->descripcion}}</p>
                                                            <div class="price">
                                                                <h6>{{$ofer->precio}}</h6>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $ofer->id }}">Agregar</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="modal{{ $ofer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{$ofer->titulo}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="/foodimage/{{$ofer->imagen }}" alt="{{ $ofer->titulo }}" class="img-fluid" >
                                                                <p>{{ $ofer->descripcion }}</p>
                                                                <p>Precio: ${{ $ofer->precio }}</p>
                                                                <label for="cantidad">Cantidad:</label>
                                                                <input type="number" id="cantidad{{ $ofer->id }}" name="quantity" value="1" min="1">
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <input class="btn btn-success" type="Submit" value="Confirmar">
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>   
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>