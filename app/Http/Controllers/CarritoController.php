<?php

namespace App\Http\Controllers;

use App\dtos\DtoGame;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    public function viewCarrito(){
        $carrito = Session()->get('carrito'); //recupero el carrito
        return view('carrito',compact('carrito')); // se lo paso a la vista para el foreach
    }

    public function addCarrito($id) {
        $game = Game::find($id);
        $carrito = Session()->get('carrito');
        $dto = DtoGame::castGame($game);

        $carrito->add($dto);

        session(['carrito' => $carrito]);

        return redirect()->route('carrito.view');

    }

    public function deteleCarrito($id){

        $carrito = Session()->get('carrito');

        //dd($carrito);

        $carrito->deleteItem($id);

        session(['carrito' => $carrito]);

        return redirect()->route('carrito.view');
    }

    public function menosItem($id){
        $carrito = Session()->get('carrito');
        $carrito->menosItem($id);
        session(['carrito' => $carrito]);
        return redirect()->route('carrito.view');
    }

    public function masItem($id){
        $carrito = Session()->get('carrito');
        $carrito->masItem($id);
        session(['carrito' => $carrito]);
        return redirect()->route('carrito.view');
    }

}
