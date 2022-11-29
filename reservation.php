<?php
if (isset($_GET['day']) && isset($_GET['date']) && isset($_GET['month'])){
    $resa_jour = $_GET['day'];
    $resa_date = $_GET['date'];
    $resa_mois = $_GET['month'];
} else {header("Location:contact.php");}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Réservez votre table chez Pizzabon, Restaurant à Bordeaux</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css"/>
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

    <h1 class="text-center mt-3 mb-2">Votre réservation</h1>

    <div class="container">
        <form action="/src/res_validation.php" method="post">
            <label for="res_date">Jour de votre réservation</label>
            <input name="res_date" value='<?="$resa_jour $resa_date $resa_mois";?>' id="res_date" class="form-control text-center bg-light " type="text" placeholder='<?="$resa_jour $resa_date $resa_mois";?>' aria-label="Disabled input example" readonly>
            <div class="form-floating mt-3">
                <input name="nom" type="text" class="form-control" id="floatingInput" placeholder="Dupont Jean" required>
                <label for="floatingInput">Entrez votre nom</label>
            </div>
            <div class="row d-flex form-group mt-3">
                <div class="form-group col-6">
                    <select name="res_personnes" class="form-select" required>
                    <option selected disabled value="">Nombre de personnes</option>
                    <option value="1">1 personne</option>
                    <option value="2">2 personnes</option>
                    <option value="3">3 personnes</option>
                    <option value="4">4 personnes</option>
                    <option value="5">5 personnes</option>
                    <option value="6">6 personnes</option>
                    <option value="7">7 personnes</option>
                    <option value="8">8 personnes</option>
                    <option value="9">9 personnes</option>
                    <option value="10">10 personnes</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <select name="res_heure" class="form-select" required>
                    <option selected disabled value="">Heure d'arrivée au restaurant</option>
                    <option value="19">19h</option>
                    <option value="20">20h</option>
                    <option value="21">21h</option>
                    </select>
                </div>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="commentaire" id="commentaire" cols="" rows="8" placeholder="renseignez vos commentaires ici..."></textarea>
            </div>
            <button class="btn btn-outline-success mt-3" type="submit">Validez votre réservation</button>
        </form>
        <div class="text-end">
            <a type="button" class="btn btn-outline-warning" href="contact.php">Annuler et retourner à la page des réservations</a>
        </div>
    </div>

  </body>
</html>