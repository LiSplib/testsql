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
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-dark text-white text-center">
                <div class="card-body">
                    <div class="col-12 mt-4">
                        <h4 class="card-title">Voici votre / vos patient : </h4>
                            <div class="list-group col-12">
        <?php
        while($donnees = $reponse->fetch()){
        ?>
                            <a href="profil-patient.php?id=<?= $donnees['id']?>" class="list-group-item list-group-item-action bg-light mt-2 rounded">
                                <div class="text-center">
                                    <h5 class="card-title"><?= $donnees['lastname'].' '.$donnees['firstname']?></h5>
                                </div>
                            </a>
        
        <?php
        }
        ?>
            

                            </div>
                            <a href="liste-patients.php" class="btn btn-secondary mt-2">
                                <svg class="bi bi-house" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9.646 3.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4.5a.5.5 0 01-.5-.5v-4H9v4a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM4.5 9.707V16H8v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V9.707l-5.5-5.5-5.5 5.5z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
                                </svg>
                            </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

<?php
include 'footer.php';