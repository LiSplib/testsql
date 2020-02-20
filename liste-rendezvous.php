<?php
include 'head.php';
require_once 'db.php';

if(isset($_GET['delete'])){
    $getId = $_GET['delete'];

$req = $pdo->prepare("DELETE FROM appointments WHERE id = :id");
$req->bindParam(':id', $getId );
    $req->execute();
}

$currentDate = new DateTime();
$euDate = $currentDate->modify('+1 hour');
$euDateFormat = $euDate->format('Y-m-d H:m:s');

$reponse = $pdo->prepare("SELECT appointments.id AS id, DATE_FORMAT(dateHour, '%d/%m/%Y à %Hh%imin') AS dateHour, lastname, firstname  FROM appointments JOIN patients ON appointments.idPatients = patients.id WHERE dateHour > :euDate");
$reponse->bindParam(':euDate', $euDateFormat);
$reponse->execute();
?>
<section>
        <h4>Voici la liste des rendez-vous : </h4>
            <div class="table-responsive">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date du RDV</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
<?php
while ($donnees = $reponse->fetch())
{
    ?>
      <tbody>
    <tr>
        <th scope="row"><?= $donnees['id']?></th>
        <td><?= strtoupper($donnees['lastname'])?></td>
        <td><?= $donnees['dateHour']?></td>
        <td>
            <a href="rendezvous.php?id=<?=$donnees['id']?>" name="update">
                <svg class="bi bi-calendar text-warning" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 2H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2zM3 5.857C3 5.384 3.448 5 4 5h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H4c-.552 0-1-.384-1-.857V5.857z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8.5 9a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                </svg>
            </a>
        </td>
        <td><a href="liste-rendezvous.php?delete=<?=$donnees['id']?>" name="delete">
            <svg class="bi bi-trash text-danger" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5 7.5A.5.5 0 018 8v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V8z"/>
                <path fill-rule="evenodd" d="M16.5 5a1 1 0 01-1 1H15v9a2 2 0 01-2 2H7a2 2 0 01-2-2V6h-.5a1 1 0 01-1-1V4a1 1 0 011-1H8a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM6.118 6L6 6.059V15a1 1 0 001 1h6a1 1 0 001-1V6.059L13.882 6H6.118zM4.5 5V4h11v1h-11z" clip-rule="evenodd"/>
            </svg>
            </a>
        </td>
    </tr>      
    
<?php
}
$reponse->closeCursor();


?>
        </tbody>
    </table>
        </div>
    
</section>

<?php

include 'footer.php';