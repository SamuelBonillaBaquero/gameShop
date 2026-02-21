<?php

namespace App\Service;

use App\dtos\DtoGame;
use App\Models\Game;
use IteratorAggregate;
use Traversable;
use ArrayIterator;

class Carrito implements IteratorAggregate {

    public array $carrito = [];


    public function __construct()
    {
        $this->carrito =  [];
    }

    public function add(DtoGame $dto){
        $this->carrito[] = $dto;
    }

    public function deleteItem($id) {
        for($i=0;$i<count($this->carrito);$i++){

            if($this->carrito[$i]->getId()==$id){
                unset($this->carrito[$i]);
                $this->carrito = array_values($this->carrito); //reordeno el array para que no me exploten los indices
            }
        }
    }

    public function menosItem($id) {
        for($i=0;$i<count($this->carrito);$i++){


            if($this->carrito[$i]->getId()==$id){
                if($this->carrito[$i]->getAmount()-1 < 0){
                    $this->deleteItem($id);
                } else {
                    $this->carrito[$i]->setAmount($this->carrito[$i]->getAmount()-1);
                }
            }



        }
    }

    public function masItem($id) {

        $stock = Game::find($id);

        for($i=0;$i<count($this->carrito);$i++){

            if($this->carrito[$i]->getId()==$id){
               if($this->carrito[$i]->getAmount()+1 > $stock->stock){ //compruebo que nunca sea mayor que el stock
                    break;
               } else {
                 $this->carrito[$i]->setAmount($this->carrito[$i]->getAmount()+1);
               }
            }
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->carrito);
    }
}
