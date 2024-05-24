<?php

namespace App\Http\Controllers;

use App\Models\detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\food;
use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $filtro1 = "Oferta";
        $filtro2 = "Limitado";
        $filtro = "Destacado";
        $data = food::where('distribucion', '=', $filtro)->get();
        $limi = food::where('distribucion', '=', $filtro2)->get();
        $ofer = food::where('distribucion', '=', $filtro1)->get();
        return view("home",compact("data","limi","ofer"));

        
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $filtro = "Destacado";
        $filtro1 = "Oferta";
        $filtro2 = "Limitado";
        $data = food::where('distribucion', '=', $filtro)->get();
        $limi = food::where('distribucion', '=', $filtro2)->get();
        $ofer = food::where('distribucion', '=', $filtro1)->get();

        if($usertype == '1') {
            return view('admin.adminhome');
        }

        else {
            $user_id = Auth::id();
            $count = cart::where('user_id',$user_id)->count();
            return view("home",compact("data","count","limi","ofer"));
        }
    }

    public function addcart(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'quantity' => 'required|numeric|min:1', // Asegura que la cantidad sea un número entero positivo
        ]);

        if(Auth::id()) {
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;
            $cart = new cart;

            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->cantidad = $quantity;
            $cart ->save();
            Alert::success('¡Éxito!', 'Se agrego exitosamente en el carrito');

            return redirect()->back();
            
        }
        else {
            return redirect('/login');
        }

        
    }

    public function showcart(Request $request, $id)
    {
        if(Auth::id()==$id) {
            $count = cart::where('user_id',$id)->count();
            $data = food::where('user_id',$id)->join('carts', 'food.id', '=' , 'carts.food_id')->get();
            $data3 = food::where('user_id',$id)->join('carts', 'food.id', '=' , 'carts.food_id')->get();
            $data2 = cart::select('*')->where('user_id', '=' , $id)->get();
            $usuario = Auth::user()->name;
            return view('showcart',compact('count','data','data2','data3','usuario'));
        }
        else {
            return redirect()->back();
        }
        
    }

    public function pedidos(Request $request, $id)
    {
        
        if(Auth::id()==$id) {

            $count = cart::where('user_id',$id)->count();

            $data = order::with('detalles.food')
            ->where('user_id', $id)
            ->where('estado', 'Pendiente')
            ->orWhere('estado', 'En Camino')
            ->get()
            ->reverse();

            $data1 = order::with('detalles.food')
            ->where('user_id', $id)
            ->where('estado', 'Entregado')
            ->get()
            ->reverse();



            $usuario = Auth::user()->name;
            return view('pedidos',compact('count','data','data1','usuario'));

            

        }
        else {
            return redirect()->back();
        }
        
    }

    public function menu(Request $request)
    {
        
        $data = food::all();
        $user_id = Auth::id();
        $count = cart::where('user_id',$user_id)->count();
        return view('menu',compact('count','data'));

        
        
    }

    public function filtrar(Request $request)
    {
        
        $user_id = Auth::id();
        $filtro = $request->filtro;
    
        $data = food::where('categoria', 'LIKE','%'.$filtro.'%')->get();
        
        $count = cart::where('user_id',$user_id)->count();
        return view('menu',compact('count','data'));

        
        
    }

    public function remove($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    

    public function orderconfirm(Request $request)
    {

        
        $carrito = Cart::where('user_id', auth()->id())->get();
        if ($carrito->isEmpty()) {
            Alert::error('¡Error!', 'No hay productos en el carrito')->showConfirmButton('OK', '#3085d6');
        }else{
            $user = Auth::id();
            $data2= new order;
            $data2->user_id = $user;
            $data2->telefono=$request->telefono;
            $data2->direccion=$request->direccion; 
            $data2->total=$request->total;
            $data2->estado= "Pendiente";
            $data2->save();

            $id_pedido = $data2->id;

            foreach ($request->platillo as $key => $platillo) {
                $data=new detail;
                $data->food_id = $platillo;
                $data->order_id = $id_pedido;
                $data->cantidad = $request->cantidad[$key];
                $data->p_unitario = $request->precio[$key];
                $data->p_total = $request->preciot[$key];
                

                $data->save();
                Alert::success('¡Éxito!', 'El pedido se registro correctamente')->showConfirmButton('OK', '#3085d6');
            }
            cart::where('user_id', $user)->delete();
        }
        
        return redirect()->back();
       

    }
}
