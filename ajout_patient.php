<?php
include 'head.php';
    
?>   
<div class="row">
    <div class="col-sm-6">
        <div class="card bg-dark text-white text-center">
            <div class="card-body">
                <h1 class="card-title">Bienvenue dans ton espace de création de patients.</h1>
                <form method="POST" enctype="multipart/form-data" action="ajout_patient.php">
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
                    <button type="submit" class="btn btn-info">
                        <svg class="bi bi-upload" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 10a.5.5 0 01.5.5V14a1 1 0 001 1h12a1 1 0 001-1v-3.5a.5.5 0 011 0V14a2 2 0 01-2 2H4a2 2 0 01-2-2v-3.5a.5.5 0 01.5-.5zM7 6.854a.5.5 0 00.707 0L10 4.56l2.293 2.293A.5.5 0 1013 6.146L10.354 3.5a.5.5 0 00-.708 0L7 6.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M10 4a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 0110 4z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php

require_once 'db.php';

if(!empty($_POST)){

    $req = $pdo->prepare("INSERT INTO patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ?");
    $req->execute([$_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']]);
    die('Votre patient a bien été créé');
    header('Location: http://localhost/Exercices-PDO-partie-2/');

}

include 'footer.php';