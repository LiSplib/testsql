<?php
include 'head.php';
require_once 'db.php';

$reponse = $pdo->query("SELECT appointments.id AS id, dateHour, lastname, firstname  FROM appointments JOIN patients ON appointments.idPatients = patients.id");
?>
<section>
    <div class="col-4">
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
    <button class="btn btn-danger">Supprimer</button>
    </div>
            
<?php
}
?>
        </div>
    </div>
    
</section>

<?php
include 'footer.php';