<?php

if (isset($_POST["submit"])) {
    $id = $_POST['submit'];

    include '../classes/db.php';
    include "../classes/ship.class.php";
    include "../classes/ship.ctrl.class.php";

    $ship = new ShipController($id);

    // Delete ship
    $ship->deleteShip();

    // No errors -> home Page
    header("Location: ../schiplijst.php");
}

