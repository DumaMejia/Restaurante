<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    
    
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
      <div style=" margin-top: 50px; ">
        <form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
  
            @csrf
  
            <div class="mb-3"> 
                <label class="form-label">Titulo</label>
                <input class="form-control" style="color: black" type="text" name="titulo" value="{{$data->titulo}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">precio</label>
                <input class="form-control" style="color: black" type="num" name="precio" value="{{$data->precio}}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">descripcion</label>
              <input class="form-control" style="color: black" type="text" name="descripcion" value="{{$data->descripcion}}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">categoria</label>
            <select value="{{$data->categoria}}" class="form-select"  aria-label="Default select example" style="color: black" name="categoria" placeholder="Selecciona la categoria" required id="">
                <option value="Pescados y Mariscos" {{ $data->categoria == 'Pescados y Mariscos' ? 'selected' : '' }}>Pescados y Mariscos</option>
                <option value="Platos Mixtos" {{ $data->categoria == 'Platos Mixtos' ? 'selected' : '' }}>Platos Mixtos</option>
                <option value="Pastas y Ensaladas" {{ $data->categoria == 'Pastas y Ensaladas' ? 'selected' : '' }}>Pastas y Ensaladas</option>
                <option value="Hamburguesas" {{ $data->categoria == 'Hamburguesas' ? 'selected' : '' }}>Hamburguesas</option>
                <option value="Tacos" {{ $data->categoria == 'Tacos' ? 'selected' : '' }}>Tacos</option>
                <option value="Pizzas" {{ $data->categoria == 'Pizzas' ? 'selected' : '' }}>Pizzas</option>
                <option value="Bebidas" {{ $data->categoria == 'Bebidas' ? 'selected' : '' }}>Bebidas</option>
            </select>
          </div>
          <div class="mb-3">
              <label class="form-label">distribucion</label>
              <select value="{{$data->distribucion}}" class="form-select" aria-label="Default select example" style="color: black" name="distribucion" placeholder="Selecciona la categoria" required id="">
                  <option value="No aplica" {{ $data->categoria == 'No aplica' ? 'selected' : '' }}>No aplica</option>
                  <option value="Oferta" {{ $data->categoria == 'Oferta' ? 'selected' : '' }}>Oferta</option>
                  <option value="Limitado" {{ $data->categoria == 'Limitado' ? 'selected' : '' }}>Limitado</option>
                  <option value="Destacado" {{ $data->categoria == 'Destacado' ? 'selected' : '' }}>Destacado</option>
                  <option value="Nuevo" {{ $data->categoria == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
              </select>
          </div>
          <div class="container">
            <div class="mb-3">
              <label class="form-label">Vieja imagen</label>
              <img src="/foodimage/{{$data->imagen}}" alt="" class="img-thumbnail"  width="100" height="100">
            </div>
            <div class="mb-3">
              <label class="form-label">Nueva imagen</label>
              <input type="file" name="imagen">
            </div>
          </div>
          <div class="mb-3">
            <button  class="btn btn-success"  type="submit" value="Guardar">Guardar</button>
          </div>
        </form>
       </div>
    </div>
   
    @include('admin.adminscript')
  </body>
</html>                                         
</x-app-layout>
