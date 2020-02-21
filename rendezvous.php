<?php
$title = 'RDV';

$create_status = '';

$getId = $_GET['id'];

require_once 'db.php';
ob_start();

if(!empty($_POST)){

    $req = $pdo->prepare("UPDATE appointments SET dateHour = :dateHour WHERE id = :id");
    // $req->bindParam(':id', $getId );
    $req->execute([
        "id" => $getId,
        "dateHour" => $_POST['date']. ' ' .$_POST['Hour']
    ]);
    $create_status = 'Votre rendez-vous a bien été modifiée';

}

$reponse = $pdo->prepare("SELECT appointments.id AS id, DATE_FORMAT(dateHour, '%Y-%m-%d') AS date, DATE_FORMAT(dateHour, '%H:%i') AS Hour, lastname, firstname FROM appointments JOIN patients ON appointments.idPatients = patients.id WHERE appointments.id = :id");
$reponse->bindParam(':id', $getId );
$reponse->execute();
   
$donnees = $reponse->fetch();


require('view/rdv.php');

$content = ob_get_clean();

require('view/template.php'); ?>