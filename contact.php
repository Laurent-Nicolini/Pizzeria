<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page Contact - Pizzabon, Restaurant à Bordeaux</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="public/calendar.css">
  </head>
<body>
    <header class="sticky-top">
        <div class="logo d-flex justify-content-center bg-danger">
            <img class="rounded" src="images/logo_pizzabon.png" width="120px" height="120px" alt="PizzaBon Restaurant italien" title="PizzaBon Restaurant Italien">
        </div>
        <ul class="navbar-nav bg-success d-flex flex-row justify-content-around">
            <li class="nav-item text-white">
            <a class="nav-link active" href="index.html">Accueil</a>
            </li>
            <li class="nav-item text-white">
            <a class="nav-link" href="#">Menu</a>
            </li>
            <li class="nav-item text-white">
            <a class="nav-link" href="contact.php">Contact & Réservation</a>
            </li>
        </ul>
    </header>
    <br>
    <h2 class="text-center">Contact & Réservation</h2>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="contact container col-md-5 col-sm-12">
                <form class="form-floating" action="" method="POST">
                    <div class="form-floating mb-3">
                        <input name="nom" type="text" class="form-control" id="nom" placeholder="John Doe">
                        <label for="nom">Votre nom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="email" placeholder="test@exemple.com">
                        <label for="email">Votre email</label>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="message" id="message" cols="" rows="8" placeholder="Ecrivez votre message..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-success" value="contact">Envoyez votre message</button>
                </form>
            </div>
            <div class="separation d-md-block d-none col-md-1"></div>
            <div class="separation2 d-block d-md-none col-1"></div>
            <div class="reservation container col-md-5 col-sm-12">
                <?php include "public/calendar.php"; ?>
            </div>
        </div>
    </div>
    
</body>
</html>