<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

route::get('/',[GameController::class,'index'])->name('game.index'); //main de la tienda

Route::get('/addCarrito',[GameController::class])->name('game.addCarrito'); //carrito añadir

Route::get('/login',[UserController::class,'ViewiniciarSesion'])->name('user.ViewiniciarSesion'); //vista login

Route::get('/registro',[UserController::class,'Viewregistrar'])->name('user.Viewregistrar'); //vista registro

route::get('/{game}',[GameController::class,'show'])->name('game.show'); // ver x vieouego

route::post('/registro',[UserController::class, 'register'])->name('user.register'); //metodo para registrar

route::post('/login',[UserController::class,'iniciarSesion'])->name('user.iniciarSesion'); //metodo iniciar

route::post('/logout',[UserController::class,'cerrarSesion'])->name('user.cerrarSesion'); //metodo cerrar sesion





