<?php
include 'head.php';
require_once 'db.php';


if(isset($_GET['delete'])){
    $getId = $_GET['delete'];

$req = $pdo->prepare("DELETE FROM patients WHERE id = :id");
$req->bindParam(':id', $getId );
    $req->execute();
    // die('Votre rendez-vous a bien été supprimée');
    // header('Location: http://localhost/Exercices-PDO-partie-2/liste-rendezvous.php');
}

if(isset($_GET['form_submit'])){
    $searchName = $_GET['search_name'];
    $reponse = $pdo->query("SELECT * FROM patients WHERE lastname LIKE '$searchName'");
    $donnees = $reponse->fetch();
    ?>
    <h1><?=$donnees['lastname']?></h1>


<?php
}
$reponse = $pdo->query("SELECT * FROM patients");
?>
<section>
    

    <div class="col-12 mt-4">
        <h4>Voici la liste des patients : </h4>
        <!-- <div class="list-group col-lg-6"> -->
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Éditer</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
<?php
while ($donnees = $reponse->fetch())
{
    ?>
        <!-- <a href="profil-patient.php?id=<?= $donnees['id']?>" class="list-group-item list-group-item-action bg-light mt-2 rounded">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?= $donnees['lastname'].' '.$donnees['firstname']?></h5>
                
            </div>
        </a> -->
        <tbody>
            <tr>
                <th scope="row"><?=$donnees['id']?></th>
                <td><?= strtoupper($donnees['lastname'])?></td>
                <td><?= $donnees['firstname']?></td>
                <td><a href="profil-patient.php?id=<?=$donnees['id']?>" name="edit">
                    <svg class="bi bi-person text-warning" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15 16s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002zM5.022 15h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C13.516 12.68 12.289 12 10 12c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002zM10 9a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                    </a></td>
                <td><a href="liste-patients.php?delete=<?=$donnees['id']?>" name="delete">
                    <svg class="bi bi-trash text-danger" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 7.5A.5.5 0 018 8v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V8z"/>
                        <path fill-rule="evenodd" d="M16.5 5a1 1 0 01-1 1H15v9a2 2 0 01-2 2H7a2 2 0 01-2-2V6h-.5a1 1 0 01-1-1V4a1 1 0 011-1H8a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM6.118 6L6 6.059V15a1 1 0 001 1h6a1 1 0 001-1V6.059L13.882 6H6.118zM4.5 5V4h11v1h-11z" clip-rule="evenodd"/>
                    </svg>
                    </a>
                </td>
            </tr>
        
            
<?php
}
?>
          </tbody>
</table>  

        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center pagination-lg">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <svg class="bi bi-chevron-left" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M13.354 3.646a.5.5 0 010 .708L7.707 10l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                    </svg>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><svg class="bi bi-chevron-right" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
                    </svg>
                    </a>
                </li>
            </ul>
        </nav>
    <!-- </div> -->
    
</section>

<?php
include 'footer.php';