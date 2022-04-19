<?php

session_start();

if (isset($_POST["submit"])) {
    $courseID = $_POST['submit'];
    $userID = $_SESSION['userid'];
   


    include '../classes/db.php';
    include "../classes/assigncourse.class.php";
    include "../classes/assigncourse.ctrl.class.php";

    $assign = new AssignCourseController($courseID, $userID);

    // Submit assign
    $assign->submitAssign();

    // No errors -> home Page
    header("Location: ../index.php");
}

