<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.navbar')
        <div class="container">
            <h1>Ordenes de clientes</h1>

            
            
            
                <table class="table table-dark">
                <tr>
                    <td>Nombre</td>
                    <td>Telefono</td>
                    <td>Direccion</td>
                    <td>Total a pagar</td>
                    <td>Estado</td>
                    <th>Estado</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->telefono}}</td>
                    <td>{{$data->direccion}}</td>
                    <td>{{$data->total}}</td>
                    <td class="estado {{ strtolower(str_replace(' ', '-', $data->estado)) }}">{{$data->estado}}</td>
                    <td>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalProductos{{ $data->id }}">Detalles</button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalProductos{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Datos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Tabla de Productos Entregados -->
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item list-group-item-dark">{{$data->user->name}}</li>
                                        <li class="list-group-item list-group-item-dark">{{$data->direccion}}</li>
                                        <li class="list-group-item list-group-item-dark">{{$data->telefono}}</li>
                                    </ol>
                                    <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
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
                                    <form action="{{url('/estado',$data->id)}}" method="POST">

                                        @csrf

                                        <div class="mb-3">
                                            <select  class="form-select text-dark" aria-label="Default select example" name="estado">
                                                <option selected>Estado</option>
                                                <option value="Pendiente" {{ $data->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="En Camino" {{ $data->estado == 'En Camino' ? 'selected' : '' }}>En Camino</option>
                                                <option value="Entregado" {{ $data->estado == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-warning">Modificar Estado</button>
                                        </div>
                                    </form>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                <p>Total a pagar: {{$data->total}}</p>
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
    
    
    
    

    @include('admin.adminscript')
  </body>
</html>                                         
</x-app-layout>
