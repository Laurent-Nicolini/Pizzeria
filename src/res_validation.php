<?php

if (isset($_POST['nom']) && isset($_POST['res_personnes']) && isset($_POST['res_heure'])){
    $nom = $_POST['nom'];
    $res_date = $_POST['res_date'];
    $res_personnes = intval($_POST['res_personnes']);
    $res_heure = intval($_POST['res_heure']);

    if (isset($_POST['commentaire'])){
        $commentaire = $_POST['commentaire'];
    }
} else {
    header("Location:../contact.php");
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=pizzabon","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
 }

$statement = $pdo->prepare("INSERT INTO reservations (nom, res_date, res_heure, res_personnes, commentaire) 
                            VALUES (:nom, :res_date, :res_heure, :res_personnes, :commentaire) ");
$statement->bindValue(':nom', $nom, PDO::PARAM_STR);
$statement->bindValue(':res_date', $res_date, PDO::PARAM_STR);
$statement->bindValue(':res_personnes', $res_personnes, PDO::PARAM_INT);
$statement->bindValue(':res_heure', $res_heure, PDO::PARAM_INT);
$statement->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);

$statement->execute();

setcookie('res_date',$res_date,time()+3600*24*31,'/');
setcookie('res_heure',$res_heure,time()+3600*24*31,'/');
setcookie('res_personnes',$res_personnes,time()+3600*24*31,'/');

header("Location:../contact.php?validation=ok");

// if($result){
//     $message = 'Bonjour !';
//     $headers = 'From: webmaster@example.com' . "\r\n" .
//     'Reply-To: webmaster@example.com' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();
//     mail(
//         string $to,
//         string "Votre Réservation du $",
//         string $message,
//         array|string $additional_headers = [],
//         string $additional_params = ""
//     ): bool
// }