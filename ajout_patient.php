<?php
$title = 'Ajout patient'; ?>


<?php    
require_once 'db.php';
$create_status = '';


if(!empty($_POST)){

    $req = $pdo->prepare("INSERT INTO patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ?");
    $req->execute([$_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']]);
    $create_status = 'Votre patient a bien été créé';
}

ob_start();

require('view/ajoutPatient.php');

$content = ob_get_clean();

require('view/template.php'); ?>