<?php
include 'head.php';
require_once 'db.php';

$getId = $_GET['id'];

$reponse = $pdo->prepare("SELECT appointments.id AS id, DATE_FORMAT(dateHour, '%Y-%m-%d') AS date, DATE_FORMAT(dateHour, '%H:%i') AS Hour, lastname, firstname FROM appointments JOIN patients ON appointments.idPatients = patients.id WHERE appointments.id = :id");
$reponse->bindParam(':id', $getId );
$reponse->execute();
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
            <div class="form-group col-md-2">
                <label>Date Rendez-vous</label>
                <input type="date" class="form-control" id="date" name="date" value="<?=$donnees['date']?>"/>
            </div>
            <div class="form-group col-md-2">
                <label>Heure Rendez-vous</label>
                <input type="time" class="form-control" id="hour" name="Hour" value="<?=$donnees['Hour']?>"/>
            </div>
            <div class="form-group col-md-4">
                <label class="title2">Nom</label>
                    <input class="form-control" type="text" value="<?= $donnees['lastname']?>" name="lastname"></input>
            </div>
            <div class="form-group col-md-4">
                <label class="title2">Prénom</label>
                <input class="form-control" type="text" value="<?= $donnees['firstname']?>" name="firstname"></input>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Mofifier le rendez-vous</button>
        <a href="liste-rendezvous.php" class="btn btn-outline-secondary">Retour</a>
    </form>
            
<?php

?>
        </div>
    </div>
    
</section>

<?php


if(!empty($_POST)){

    $req = $pdo->prepare("UPDATE appointments SET dateHour = ? WHERE id = :id");
    $req->bindParam(':id', $getId );
    $req->execute([$_POST['date']. ' ' .$_POST['Hour']]);
    die('Votre rendez-vous a bien été modifiée');

}

include 'footer.php';