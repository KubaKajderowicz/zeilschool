<?php

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];



    include '../classes/db.php';
    include "../classes/contact.class.php";
    include "../classes/contact.ctrl.class.php";

    $contact = new ContactController($name, $email, $subject, $message);

    // Submit Contact
    $contact->submitContact();

    // No errors -> home Page
    header("Location: ../index.php");
}

