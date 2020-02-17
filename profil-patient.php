<?php
include 'head.php';
require_once 'db.php';

$getId = $_GET['id'];

$reponse = $pdo->query("SELECT * FROM patients WHERE id = '$getId'");
?>
<section>
    <div>
        <p>Voici les infos du patient : </p>
            <div class="list-group">
<?php
$donnees = $reponse->fetch()

    ?>
            
    <form method="POST" action="profil-patient.php?id=<?= $donnees['id']?>" class="newPosts">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="title2">Nom</label>
                    <input type="text" class="form-control" value="<?= $donnees['lastname']?>" name="lastname"></input>
            </div>
            <div class="form-group col-md-6">
                <label class="title2">Prénom</label>
                    <input class="form-control" type="text" value="<?= $donnees['firstname']?>" name="firstname"></input>
            </div>
            <div class="form-group col-md-4">
                <label class="title2">Date de naissance</label>
                    <input class="form-control" type="text" value="<?= $donnees['birthdate']?>" name="birthdate"></input>
            </div>
            <div class="form-group col-md-4">
                <label class="title2">Numéro de tél</label>
                    <input class="form-control" type="tel" value="<?= $donnees['phone']?>" name="phone"></input>
            </div>
            <div class="form-group col-md-4">
                <label class="title2">Email</label>
                    <input class="form-control" type="email" value="<?= $donnees['mail']?>" name="mail"></input>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Mofifier le patient</button>
        <a href="liste-patients.php" class="btn btn-secondary">Retour</a>
    </form>
            
<?php

?>
        </div>
    </div>
    
</section>

<?php


if(!empty($_POST)){

    $req = $pdo->prepare("UPDATE patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ? WHERE id = '$getId'");
    $req->execute([$_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']]);
    die('Votre patient a bien été modifiée');

}

include 'footer.php';