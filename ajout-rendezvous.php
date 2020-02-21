<?php
$title = 'Ajout RDV';
require_once 'db.php';

require('controller.php');

// Create on POST req
$create_status = '';

if(!empty($_POST)){
    require_once 'db.php';

    $req = $pdo->prepare("INSERT INTO appointments SET dateHour = ?, idPatients = ?");
    $req->execute([$_POST['date']. ' ' .$_POST['Hour'], $_POST['id']]);
    $create_status = 'Votre rendez-vous a bien été créé';

} 

$reponse = $pdo->query("SELECT * FROM patients");

ob_start();

require('view/ajoutRDV.php');

$content = ob_get_clean(); 

require('view/template.php'); ?>