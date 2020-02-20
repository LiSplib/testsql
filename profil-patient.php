<?php
$title = "Fiche Patient";

ob_start();

require_once 'db.php';

if(!empty($_POST)){

    $req = $pdo->prepare("UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = :id");
    // $req->bindParam(':id', $getId );
    $req->execute([
        "id" => $getId,
        "lastname" => $_POST['lastname'], 
        "firstname" => $_POST['firstname'], 
        "birthdate" => $_POST['birthdate'], 
        "phone" => $_POST['phone'], 
        "mail" => $_POST['mail'],
        
        ]);
    die('Votre patient a bien été modifiée');

}

if(isset($_GET['id'])){

    $getId = $_GET['id'];

    $reponse = $pdo->prepare("SELECT patients.id AS patientId, lastname, firstname, DATE_FORMAT(birthdate, '%d/%m/%Y') AS birthdate, phone, mail, dateHour FROM patients LEFT JOIN appointments ON patients.id = appointments.idPatients WHERE patients.id = :id");
    $reponse->bindParam(':id', $getId);
    $reponse->execute();
}
?>
<section>
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h4>Voici les infos du patient : </h4>
                        <div class="list-group">
<?php
$donnees = $reponse->fetch()

?>
            
    <form method="POST" action="profil-patient.php?id=<?= $donnees['patientId']?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="title2">Nom</label>
                    <input type="text" class="form-control" value="<?= strtoupper($donnees['lastname'])?>" name="lastname"></input>
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
    
         

        </div>
        
    </div>
    </div>
</div>
    
</section>
<section class="mt-4">
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h4>Rendez-vous prévus : </h4>
                        <div class="list-group ">
    <?php
        $reponse->closeCursor();
        
require_once 'gestionTemps.php';

        
    ?>
            </div>
            </div>
            </div>
        </div>
    </section>

<?php


$content = ob_get_clean(); 

require('view/template.php'); ?>