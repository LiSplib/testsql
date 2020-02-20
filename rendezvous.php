<?php
include 'head.php';
require_once 'db.php';

$getId = $_GET['id'];

$reponse = $pdo->prepare("SELECT appointments.id AS id, DATE_FORMAT(dateHour, '%Y-%m-%d') AS date, DATE_FORMAT(dateHour, '%H:%i') AS Hour, lastname, firstname FROM appointments JOIN patients ON appointments.idPatients = patients.id WHERE appointments.id = :id");
$reponse->bindParam(':id', $getId );
$reponse->execute();
?>
<section>
   
<?php
$donnees = $reponse->fetch()

    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h4>Voici les infos du rendez-vous : </h4>      
                    <form method="POST" action="rendezvous.php?id=<?= $donnees['id']?>" class="newPosts">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Date Rendez-vous</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?=$donnees['date']?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Heure Rendez-vous</label>
                                <input type="time" class="form-control" id="hour" name="Hour" value="<?=$donnees['Hour']?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="title2">Nom</label>
                                    <input class="form-control" type="text" value="<?= strtoupper($donnees['lastname'])?>" name="lastname"></input>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="title2">Prénom</label>
                                <input class="form-control" type="text" value="<?= $donnees['firstname']?>" name="firstname"></input>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning mr-2">
                                <svg class="bi bi-upload text-white" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 10a.5.5 0 01.5.5V14a1 1 0 001 1h12a1 1 0 001-1v-3.5a.5.5 0 011 0V14a2 2 0 01-2 2H4a2 2 0 01-2-2v-3.5a.5.5 0 01.5-.5zM7 6.854a.5.5 0 00.707 0L10 4.56l2.293 2.293A.5.5 0 1013 6.146L10.354 3.5a.5.5 0 00-.708 0L7 6.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M10 4a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 0110 4z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <a href="liste-rendezvous.php" class="btn btn-secondary">
                                <svg class="bi bi-house" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9.646 3.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4.5a.5.5 0 01-.5-.5v-4H9v4a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM4.5 9.707V16H8v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V9.707l-5.5-5.5-5.5 5.5z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            
<?php

?>
        <!-- </div>
    </div>
     -->
</section>

<?php


if(!empty($_POST)){

    $req = $pdo->prepare("UPDATE appointments SET dateHour = ? WHERE id = :id");
    $req->bindParam(':id', $getId );
    $req->execute([$_POST['date']. ' ' .$_POST['Hour']]);
    die('Votre rendez-vous a bien été modifiée');

}

include 'footer.php';