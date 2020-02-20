<?php


require_once 'db.php';

$currentDate = new DateTime();
$euDate = $currentDate->modify('+1 hour');

var_dump($currentDate);
$dateToRdv = $pdo->query("SELECT dateHour FROM appointments");

while($donnees = $dateToRdv->fetch()){
    $nextDate = new DateTime($donnees['dateHour']);
    if($nextDate > $euDate){
        $nextRDV = $euDate->diff($nextDate, true);
        echo "Votre prochain RDV est prévu dans : {$nextRDV->days} jours {$nextRDV->h} heures {$nextRDV->i} minutes";
        echo "\n";
    }
    
};


