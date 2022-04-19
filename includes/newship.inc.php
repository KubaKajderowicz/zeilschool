<?php

if (isset($_POST["submit"])) {
    $name = $_POST['name'];

    include '../classes/db.php';
    include "../classes/ship.class.php";
    include "../classes/ship.ctrl.class.php";

    $ship = new ShipController($name);

    // Sign up User
    $ship->submitShip();

    // No errors -> home Page
    header("Location: ../schiplijst.php");
}

