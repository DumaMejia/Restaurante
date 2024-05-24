<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        // Vaciar el carrito del usuario que está cerrando sesión
        $user_id = Auth::id();
        cart::where('user_id', $user_id)->delete();

        // Cerrar la sesión del usuario
        Auth::logout();

        // Redireccionar a la página de inicio u otra página
        return redirect('/');
    }
}
