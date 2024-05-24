<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.navbar')
        <div class="container" style="position: relative; top: 90px; display: flex; justify-content:space-around">
            <form action="{{url('/subirmenu')}}" method="post" enctype="multipart/form-data" >

                @csrf

                <div class="mb-3"> 
                    <label class="form-label">Titulo</label>
                    <input class="form-control" style="color: white" type="text" name="titulo"  placeholder="Escribe un titulo" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">precio</label>
                    <input class="form-control" style="color: white" type="num" name="precio" placeholder="Escribe un precio" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen</label>
                    <input type="file"  name="imagen"  required>
                </div>
                <div class="mb-3">
                    <label class="form-label">descripcion</label>
                    <input class="form-control" style="color: white" type="text" name="descripcion" placeholder="Escribe una descripcion" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">categoria</label>
                    <select class="form-select" aria-label="Default select example" style="color: black" name="categoria" placeholder="Selecciona la categoria" required id="">
                        <option value="Pescados y Mariscos">Pescados y Mariscos</option>
                        <option value="Platos Mixtos">Platos Mixtos</option>
                        <option value="Pastas y Ensaladas">Pastas y Ensaladas</option>
                        <option value="Hamburguesas">Hamburguesas</option>
                        <option value="Tacos">Tacos</option>
                        <option value="Pizzas">Pizzas</option>
                        <option value="Bebidas">Bebidas</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">distribucion</label>
                    <select class="form-select" aria-label="Default select example" style="color: black" name="distribucion" placeholder="Selecciona la categoria" required id="">
                        <option value="No aplica">No aplica</option>
                        <option value="Oferta">Oferta</option>
                        <option value="Limitado">Limitado</option>
                        <option value="Destacado">Destacado</option>
                        <option value="Nuevo">Nuevo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" value="save" class="btn btn-success">Guardar</button>
                </div>
            </form>

            <div class="tabla-container">
                <table  class="table table-dark table-striped">
                    <tr>
                        <th >Titulo</th>
                        <th >Precio</th>
                        <th >descripcion</th>
                        <th >Categoria</th>
                        <th >distribucion</th>
                        <th >Imagen</th>
                        <th >Accion</th>
                        <th >Accion</th>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->titulo}}</td>
                        <td>{{$data->precio}}</td>
                        <td>{{$data->descripcion}}</td>
                        <td>{{$data->categoria}}</td>
                        <td>{{$data->distribucion}}</td>
                        <td><img src="/foodimage/{{$data->imagen}}" width="200" height="200"></td>
                        <td><a class="btn btn-danger" href="{{url('/deletemenu',$data->id)}}">Borrar</a></td>
                        <td><a class="btn btn-success" href="{{url('/updatemenu',$data->id)}}">Cambiar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
    @include('admin.adminscript')
  </body>
</html>                                         
</x-app-layout>
