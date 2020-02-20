<?php


require_once 'db.php';

$currentDate = new DateTime();
$euDate = $currentDate->modify('+1 hour');

$dateToRdv = $pdo->prepare("SELECT patients.id AS patientId, appointments.id AS id, lastname, firstname, birthdate, phone, mail, dateHour FROM patients JOIN appointments ON patients.id = appointments.idPatients WHERE patients.id = :id");
$dateToRdv->bindParam(':id', $getId);
$dateToRdv->execute();

while($donnees = $dateToRdv->fetch()){
    $nextDate = new DateTime($donnees['dateHour']);
    if($nextDate > $euDate){
        $nextRDV = $euDate->diff($nextDate, true);?>
        <a href="rendezvous.php?id=<?= $donnees['id']?>" class="list-group-item list-group-item-action bg-light mt-2 rounded">
        <?="Votre prochain RDV est dans : {$nextRDV->days} jours {$nextRDV->h} heures {$nextRDV->i} minutes";
        echo "\n";?>
        </a>
    <?php
    }
    
};


