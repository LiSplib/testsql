<?php
include 'head.php';
require_once 'db.php';    

$reponse = $pdo->query("SELECT * FROM patients");

?>   



<h1>Bienvenue dans votre espace de prise de rendez-vous.</h1>
<form method="POST" action="ajout-rendezvous.php">
    <div class="form-row">
        <div class="form-group">
            <label for="dateHour">Date du RDV</label>
            <input type="date" class="form-control" id="date" name="date">
            <input type="time" class="form-control" id="hour" name="Hour" min="09:00" max="16:00" step="1800">
            <small>Les heures d'ouvertures sont : 9h00-16h00</small><br>
            <small>30min par RDV</small>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Patient</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="id">
            <option selected>Patients...</option>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
                while ($donnees = $reponse->fetch()){
            ?>
           
            <option value="<?= $donnees['id']?>"><?= $donnees['lastname']?> <?= $donnees['firstname']?></option>
       
            <?php
            }
            ?>
        </select>
    </div>   
    <button type="submit" class="btn btn-info mt-2">Ajouter le RDV</button>
</form>



<?php

require_once 'db.php';

if(!empty($_POST)){

    $req = $pdo->prepare("INSERT INTO appointments SET dateHour = ?, idPatients = ?");
    $req->execute([$_POST['date']. ' ' .$_POST['Hour'], $_POST['id']]);
    die('Votre rendez-vous a bien été créé');
    header('Location: http://localhost/Exercices-PDO-partie-2/');

}

include 'footer.php';