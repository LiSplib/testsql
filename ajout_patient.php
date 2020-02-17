<?php
include 'head.php';
    
?>   

<h1>Bienvenue dans ton espace de création de patients.</h1>
<form method="POST" action="ajout_patient.php">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="title2">Nom</label>
                <input type="text" class="form-control" placeholder="Nom" name="lastname">
        </div>
        <div class="form-group col-md-6">
            <label class="title2">Prénom</label>
                <input class="form-control" type="text" placeholder="Prénom" name="firstname"></input>
        </div>
        <div class="form-group col-md-4">
            <label class="title2">Date de naissance</label>
                <input class="form-control" type="date" placeholder="Date de naissance" name="birthdate"></input>
        </div>
        <div class="form-group col-md-4">
            <label class="title2">Numéro de tél</label>
                <input class="form-control" type="tel" placeholder="Num de tél" name="phone"></input>
        </div>
        <div class="form-group col-md-4">
            <label class="title2">Email</label>
                <input class="form-control" type="email" placeholder="Email" name="mail"></input>
        </div>
    </div>
    <button type="submit" class="btn btn-info">Ajouter le patient</button>
</form>



<?php

require_once 'db.php';

if(!empty($_POST)){

    $req = $pdo->prepare("INSERT INTO patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ?");
    $req->execute([$_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']]);
    die('Votre patient a bien été créé');
    header('Location: http://localhost/Exercices-PDO-partie-2/');

}

include 'footer.php';