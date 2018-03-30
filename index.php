<?php
//    verifie si ya des cookies
    if($_COOKIE)
        $pseudo = ($_COOKIE['pseudo']);
    else
        $pseudo = "";

//    Inclusion de parametre de connexion
    include 'connexion.php';
    // Récupération des messages
    $reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC');
    echo '
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
              <div class="container-fluid">
                <h1 class="text-center"> Tp Minichat </h1>
                <hr>
                <div class="row">
                    <div class="col-md-7">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center"><h3>Listes des Posts</h3></div>
                            <ul class="list-group">';
?>
<?php
                                // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
                                while ($donnees = $reponse->fetch()) {
                                    echo '<li class="list-group list-group-item">' . htmlspecialchars($donnees['date_at']) . ' : <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> ' . htmlspecialchars($donnees['message']) . '</li>';
                                }
?>
<?php
    echo '                  </ul>
                        </div>
                    </div>
                <div class="col-md-4 col-md-push-1">
                        <form action="actionIndex.php" method="post" class="form well">
                            <legend class="text-center text-primary"><h3>Poster votre message</h3></legend>
                            <div class="form-group">
                                <label for="pseudo">PSEUDO :</label>
                                <input id="pseudo" name="pseudo" type="text" value="'.$pseudo.'" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">MESSAGE :</label>
                                <textarea id="message" name="message" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control">Envoyer</button>
                            </div>
                        </form>
                </div>
            </div>
        </div
';
$reponse->closeCursor();
?>