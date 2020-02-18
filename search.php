<?php
include 'head.php';
require_once 'db.php';

if(isset($_GET['form_submit'])){
    $searchName = $_GET['search_name'];
    $reponse = $pdo->prepare("SELECT * FROM patients WHERE lastname LIKE LOWER(:searchname)");
    $concat = $searchName.'%';
    $reponse->bindParam(':searchname', $concat);
    $reponse->execute();
 
}

?>
<section>
    <form class="form-inline ml-3">
        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" name="search_name" aria-label="Search">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="form_submit">Rechercher</button>
    </form>

    <div class="col-12 mt-4">
        <p>Voici votre patient : </p>
        <div class="list-group col-lg-6">
<?php
while($donnees = $reponse->fetch()){

    ?>
        <a href="profil-patient.php?id=<?= $donnees['id']?>" class="list-group-item list-group-item-action bg-light mt-2 rounded">
            <div class="text-center">
                <h5 class="mb-1"><?= $donnees['lastname'].' '.$donnees['firstname']?></h5>
            </div>
        </a>
        
            <a href="liste-patients.php" class="btn btn-secondary">Retour</a>
<?php
        }?>
            

        </div>
    </div>
    
</section>

<?php
include 'footer.php';