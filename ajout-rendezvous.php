<?php
include 'head.php';
require_once 'db.php';    

$reponse = $pdo->query("SELECT * FROM patients");

?>   


<div class="row">
    <div class="col-sm-6">
        <div class="card bg-dark text-white text-center">
            <div class="card-body">
                <h4 class="card-title">Bienvenue dans ton espace de prise de rendez-vous.</h4>
                    <form method="POST" action="ajout-rendezvous.php">
                        <div class="row">
                            <div class="col">
                                <label for="dateHour">Date du RDV</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="col">
                                <label for="dateHour">Heure du RDV</label>
                                    <input type="time" class="form-control" id="hour" name="Hour" min="09:00" max="16:00" step="1800">
                                    <small>Les heures sont : 9h00-16h00</small><br>
                                    <small>30min par RDV</small>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <select class="custom-select col-6" id="inputGroupSelect01" name="id">
                                    <option selected>Patients...</option>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php
                                        while ($donnees = $reponse->fetch()){
                                    ?>
                                
                                    <option value="<?= $donnees['id']?>"><?= strtoupper($donnees['lastname'])?> <?= $donnees['firstname']?></option>
                            
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>   
                        <button type="submit" class="btn btn-info mt-2">Ajouter le RDV</button>
                    </form>
            </div>
        </div>
    </div>
</div>



<?php

require_once 'db.php';

if(!empty($_POST)){

    $req = $pdo->prepare("INSERT INTO appointments SET dateHour = ?, idPatients = ?");
    $req->execute([$_POST['date']. ' ' .$_POST['Hour'], $_POST['id']]);
    die('Votre rendez-vous a bien été créé');
    header('Location: http://localhost/Exercices-PDO-partie-2/');

}

include 'footer.php';