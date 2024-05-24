<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get("/",[HomeController::class,"index"]);
Route::get("/home",[HomeController::class,"redirect"]);
Route::get("/users",[AdminController::class,"user"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);
Route::get("/foodmenu",[AdminController::class,"foodmenu"]);
Route::get("/deletemenu/{id}",[AdminController::class,"deletemenu"]);
Route::get("/updatemenu/{id}",[AdminController::class,"updatemenu"]);
Route::post("/update/{id}",[AdminController::class,"update"]);
Route::post("/subirmenu",[AdminController::class,"subir"]);
Route::post("/addcart/{id}",[HomeController::class,"addcart"]);
Route::get("/showcart/{id}",[HomeController::class,"showcart"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);
Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);
Route::get("/orders",[AdminController::class,"orders"]);
Route::get("/search",[AdminController::class,"search"]);
Route::get("/menu",[HomeController::class,"menu"]);
Route::get("/filtrar",[HomeController::class,"filtrar"]);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get("/MisPedidos/{id}",[HomeController::class,"pedidos"])->name('pedidos');
Route::post('/procesar-pago', 'PagoController@procesarPago')->name('procesar_pago');
Route::post("/estado/{id}",[AdminController::class,"estado"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get("/home",[HomeController::class,"redirect"])->name('home');
});
