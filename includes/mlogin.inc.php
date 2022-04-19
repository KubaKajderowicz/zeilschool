<?php

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../classes/db.php';
    include "../classes/login.class.php";
    include "../classes/login.ctrl.class.php";

    $login = new LoginController($email, $password);

    // Sign up Medewerker
    $login->loginMedewerker();

    // No errors -> home Page
    header("Location: ../index.php");
}

