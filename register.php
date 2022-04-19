<?php
session_start();
?>


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Zeilschool De morgenzon</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Zeilschool De Morgenzon</a>
            <button class="navbar-toggler" type= "button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <?php 
                     if(!isset($_SESSION['userid'])){
                         ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Registreren</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inloggen
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="login.php">Cursisten</a></li>
                            <li><a class="dropdown-item" href="mlogin.php">Medewerker</a></li>
                        </ul>
                    </li>
                    <?php   
                     } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="includes/logout.inc.php">uitloggen</a>
                    </li>
                    <?php
                     }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">


        <form action="includes/signup.inc.php" method="POST">
            <div class="mb-3">
                <label for="inputname" class="form-label">Voornaam</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="namehelp">
            </div>
            <div class="mb-3">
                <label for="inputsurname" class="form-label">Achternaam</label>
                <input type="text" class="form-control" id="surname" name="surname" aria-describedby="surenamehelp">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="inputEmail">
                <div id="emailHelp" class="form-text">Wij delen uw email nooit met derden.</div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Wachtwoord</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="inputConfirmPassword" class="form-label">Bevestig Wachtwoord</label>
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Registreer</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>