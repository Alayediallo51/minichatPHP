<?php
//creation du cookie pour le pseudo
setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);

include 'connexion.php';
$date = date('Y-m-d H:i:s');
// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare("INSERT INTO `minichat`( `pseudo`, `message`,date_at) VALUES (:pseudo,:message,:date)");
$req->execute(array(
    'pseudo'=> $_POST['pseudo'],
    'message'=> $_POST['message'],
    'date'=>$date
));
echo $date;
// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>