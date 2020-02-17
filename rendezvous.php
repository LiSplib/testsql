<?php
include 'head.php';
require_once 'db.php';

$getId = $_GET['id'];

$reponse = $pdo->query("SELECT appointments.id AS id, dateHour, lastname, firstname FROM appointments JOIN patients ON appointments.idPatients = patients.id WHERE appointments.id = '$getId'");
?>
<section>
    <div>
        <p>Voici les infos du rendez-vous : </p>
            <div class="list-group">
<?php
$donnees = $reponse->fetch()

    ?>
            
    <form method="POST" action="rendezvous.php?id=<?= $donnees['id']?>" class="newPosts">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>RDV</label>
                <input type="date" class="form-control" id="date" name="date">
                <input type="time" class="form-control" id="hour" name="Hour">
            </div>
            <div class="form-group col-md-4">
                <label class="title2">Nom</label>
                    <input class="form-control" type="text" placeholder="<?= $donnees['lastname']?>" name="lastname"></input>
            </div>
            <div class="form-group col-md-4">
                <label class="title2">Prénom</label>
                    <input class="form-control" type="text" placeholder="<?= $donnees['firstname']?>" name="firstname"></input>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Mofifier le rendez-vous</button>
        <a href="liste-rendezvous.php" class="btn btn-secondary">Retour</a>
    </form>
            
<?php

?>
        </div>
    </div>
    
</section>

<?php


if(!empty($_POST)){

    $req = $pdo->prepare("UPDATE appointments SET appointments SET dateHour = ?, idPatients = ? WHERE appointments.id = '$getId'");
    $req->execute([$_POST['date']. ' ' .$_POST['Hour'], $_POST['id']]);
    die('Votre rendez-vous a bien été modifiée');

}

include 'footer.php';