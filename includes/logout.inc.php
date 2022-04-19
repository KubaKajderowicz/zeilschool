<?php

session_start();
session_unset();
session_destroy();

// No errors -> home Page
header("Location: ../index.php");