<?php

if (isset($_POST["submit"])) {
    $id = $_POST['submit'];
    $name = $_POST['edited'];

    include '../classes/db.php';
    include "../classes/ship.class.php";
    include "../classes/ship.ctrl.class.php";

    $ship = new ShipController($name);

    // Edit ship
    $ship->editShip($id);

    // No errors -> home Page
    header("Location: ../schiplijst.php");
}

