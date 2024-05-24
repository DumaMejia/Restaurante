<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\food;

use App\Models\order;

use Illuminate\Support\Facades\Auth;

class Admincontroller extends Controller
{
    public function user()
    {
        $data = User::all();
        return view("admin.users",compact("data"));
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()-> back();
    }

    public function foodmenu()
    {
        $data =food::all();
        return view("admin.foodmenu",compact("data"));
        
    }

    public function deletemenu($id)
    {
        $data=food::find($id);
        $data->delete();
        return redirect()->back(); 
    }

    public function updatemenu($id)
    {
        $data=food::find($id);
        return view("admin.updateview",compact("data"));
    }

    public function update(Request $request , $id)
    {
        $data=food::find($id);
        
        $imagen=$request->imagen;
        if($imagen!=null){
            $imagename =time().'.'.$imagen->getClientOriginalExtension();
            $request->imagen->move('foodimage', $imagename);
            $data->imagen=$imagename;
        }
        else{
            $data->titulo=$request->titulo;
            $data->precio=$request->precio;
            $data->descripcion=$request->descripcion;
            $data->categoria=$request->categoria;
            $data->distribucion=$request->distribucion;
        }

            $data->save();
            return view('admin.adminhome');
    }

    public function subir(Request $request)
    {
        $data = new food;
        $imagen=$request->imagen;
        $imagename =time().'.'.$imagen->getClientOriginalExtension();
            $request->imagen->move('foodimage', $imagename);
            $data->imagen=$imagename;
            $data->titulo=$request->titulo;
            $data->precio=$request->precio;
            $data->descripcion=$request->descripcion;
            $data->categoria=$request->categoria;
            $data->distribucion=$request->distribucion;

            $data->save();
            return redirect()->back();

        
    }

    public function orders(Request $request)
    {
        $data = order::with('detalles.food')
            ->get()
            ->reverse();
        return view('admin.orders',compact('data'));
    }

    public function estado(Request $request, $id)
    {
        $data=order::find($id);
        $data->estado=$request->estado;
        $data->save();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = order::where('nombre', 'LIKE','%'.$search.'%')->orWhere('platillo', 'LIKE','%'.$search.'%')->get();
        return view('admin.orders',compact('data'));
    }
}   
