<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

route::get('/',[GameController::class,'index'])->name('game.index');

route::get('/{game}',[GameController::class,'show'])->name('game.show');

Route::get('/addCarrito',[GameController::class])->name('game.addCarrito');



