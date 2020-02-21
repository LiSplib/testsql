<?php
$title = "Fiche Patient";

ob_start();

$create_status = '';

require_once 'db.php';

$getId = $_GET['id'];

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
        $create_status = 'Votre patient a bien été modifiée';

}

if(isset($_GET['id'])){

    

    $reponse = $pdo->prepare("SELECT patients.id AS patientId, lastname, firstname, DATE_FORMAT(birthdate, '%d/%m/%Y') AS birthdate, phone, mail, dateHour FROM patients LEFT JOIN appointments ON patients.id = appointments.idPatients WHERE patients.id = :id");
    $reponse->bindParam(':id', $getId);
    $reponse->execute();
}

$donnees = $reponse->fetch();


$reponse->closeCursor();
        

require('view/patient.php');   
    


$content = ob_get_clean(); 

require('view/template.php'); ?>