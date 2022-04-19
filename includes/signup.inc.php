<?php

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['confirmpassword'];

    include '../classes/db.php';
    include "../classes/signup.class.php";
    include "../classes/signup.ctrl.class.php";

    $signup = new SignupController($name, $surname, $email, $password, $passwordconfirm);

    // Sign up User
    $signup->signupUser();

    // No errors -> Login Page
    header("Location: ../login.php");
}

