<?php

class ShipController extends Ship
{
    private $id;
    private $name;
    

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function submitShip(){
        $this->createShip($this->name);
    }

    public function deleteShip(){
        $this->removeShip($this->name);
    }

    public function editShip($id){
        $this->editShipbyID($id, $this->name);
    }


}