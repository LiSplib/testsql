<?php
include 'head.php';
require_once 'db.php';

$getId = $_GET['id'];

$reponse = $pdo->prepare("SELECT patients.id AS patientId, lastname, firstname, DATE_FORMAT(birthdate, '%d/%m/%Y') AS birthdate, phone, mail, dateHour FROM patients JOIN appointments ON patients.id = appointments.idPatients WHERE patients.id = :id");
$reponse->bindParam(':id', $getId);
$reponse->execute();
?>
<section>
    <div>
        <p>Voici les infos du patient : </p>
            <div class="list-group">
<?php
$donnees = $reponse->fetch()
?>
            
    <form method="POST" action="profil-patient.php?id=<?= $donnees['patientId']?>">
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
    <div class="col-3 mt-2">
        <p>Voici la liste des rendez-vous : </p>
            <div class="list-group">
    <?php
        $reponse->closeCursor();
        $reponse = $pdo->prepare("SELECT patients.id AS patientId, appointments.id AS id, lastname, firstname, birthdate, phone, mail, DATE_FORMAT(dateHour, '%d/%m/%Y à %Hh%imin') AS dateHour FROM patients JOIN appointments ON patients.id = appointments.idPatients WHERE patients.id = :id");
        $reponse->bindParam(':id', $getId);
        $reponse->execute();
        while ($donnees = $reponse->fetch())
        {
    ?>
    
                <a href="rendezvous.php?id=<?= $donnees['id']?>" class="list-group-item list-group-item-action bg-light mt-2 rounded">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?= $donnees['lastname']?></h5>
                    </div>
                    <p class="mb-1 text-center"><?= $donnees['dateHour']?></p>
                </a>
                <?php
        }
                ?>
            </div>
    </div>
         

        </div>
    </div>
       
    
</section>


<?php


if(!empty($_POST)){

    $req = $pdo->prepare("UPDATE patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ? WHERE id = :id");
    $req->bindParam(':id', $getId );
    $req->execute([$_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']]);
    die('Votre patient a bien été modifiée');

}

include 'footer.php';