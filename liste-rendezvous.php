<?php
include 'head.php';
require_once 'db.php';
if(isset($_GET['delete'])){
    $getId = $_GET['delete'];

$req = $pdo->prepare("DELETE FROM appointments WHERE id = :id");
$req->bindParam(':id', $getId );
    $req->execute();
    // die('Votre rendez-vous a bien été supprimée');
    // header('Location: http://localhost/Exercices-PDO-partie-2/liste-rendezvous.php');
}


$reponse = $pdo->prepare("SELECT appointments.id AS id, DATE_FORMAT(dateHour, '%d/%m/%Y à %Hh%imin') AS dateHour, lastname, firstname  FROM appointments JOIN patients ON appointments.idPatients = patients.id");
$reponse->execute();
?>
<section>
    <div class="col-3">
        <p>Voici la liste des rendez-vous : </p>
            <div class="list-group">
<?php
while ($donnees = $reponse->fetch())
{
    ?>
            
    <a href="rendezvous.php?id=<?= $donnees['id']?>" class="list-group-item list-group-item-action bg-light mt-2 rounded">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $donnees['lastname']?></h5>
        </div>
        <p class="mb-1"><?= $donnees['dateHour']?></p>
    </a>
    <div class="col-2">
    <a href="liste-rendezvous.php?delete=<?=$donnees['id']?>" name="delete"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="52" height="52"
viewBox="0 0 226 226"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,226v-226h226v226z" fill="none"></path><g fill="#e74c3c"><path d="M95.61538,-0.27163c-7.26622,0 -14.39663,1.42609 -19.55769,6.51923c-5.16106,5.09315 -6.79087,12.32542 -6.79087,19.82933h-34.4976c-4.78756,0 -8.69231,3.90475 -8.69231,8.69231h-8.69231v17.38462h191.23077v-17.38462h-8.69231c0,-4.78756 -3.90475,-8.69231 -8.69231,-8.69231h-34.4976c0,-7.5039 -1.62981,-14.73617 -6.79087,-19.82933c-5.16106,-5.09314 -12.29146,-6.51923 -19.55769,-6.51923zM95.61538,17.65625h34.76923c4.75361,0 6.2476,1.12049 6.79087,1.62981c0.54327,0.50932 1.62981,1.93539 1.62981,6.79087h-51.61058c0,-4.85547 1.08654,-6.28155 1.62981,-6.79087c0.54327,-0.50932 2.03726,-1.62981 6.79087,-1.62981zM34.76923,60.84615v139.07692c0,14.36268 11.71424,26.07692 26.07692,26.07692h104.30769c14.36268,0 26.07692,-11.71424 26.07692,-26.07692v-139.07692zM69.53846,86.92308h17.38462v104.30769h-17.38462zM104.30769,86.92308h17.38462v104.30769h-17.38462zM139.07692,86.92308h17.38462v104.30769h-17.38462z"></path></g></g></svg></a>
    </div>
            
<?php
}
$reponse->closeCursor();


?>
        </div>
    </div>
    
</section>

<?php

include 'footer.php';