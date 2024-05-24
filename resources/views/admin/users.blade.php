<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.navbar')
        <div  style="position: relative; top: 60px; right: -150px ">
            <table class="table table-dark table-striped">
                <thead class="bg-dark text-white">
                    <tr>
                        <th >Nombre</th>
                        <th >Email</th>
                        <th >Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @if ($item->usertype == "0")
                            <a href="{{url('/deleteuser',$item->id)}}" class="btn btn-danger">Eliminar</a>
                            @else
                            <span class="text-muted">No permitido</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    @include('admin.adminscript')
  </body>
</html>                                         
</x-app-layout>