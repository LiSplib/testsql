<section>
    <div class="row">
        <div class="col-sm-6">
            <?php
                if(!empty($create_status)){
            ?>
            <div class="alert alert-success" role="alert">
                <?= $create_status ?>
            </div>
            <?php
            }?>
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h4>Voici les infos du patient : </h4>
                        <div class="list-group">
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
                            <div class=" d-flex justify-content-end">

                                <button type="submit" class="btn btn-warning mr-2">
                                    <svg class="bi bi-upload text-white" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.5 10a.5.5 0 01.5.5V14a1 1 0 001 1h12a1 1 0 001-1v-3.5a.5.5 0 011 0V14a2 2 0 01-2 2H4a2 2 0 01-2-2v-3.5a.5.5 0 01.5-.5zM7 6.854a.5.5 0 00.707 0L10 4.56l2.293 2.293A.5.5 0 1013 6.146L10.354 3.5a.5.5 0 00-.708 0L7 6.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M10 4a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 0110 4z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                <a href="liste-patients.php" class="btn btn-secondary">
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
    </div>             
    </section>
    <section class="mt-4">
        <div class="row">
            <div class="col-sm-6">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h4>Rendez-vous prévus : </h4>
                            <div class="list-group ">
                                <?php require_once 'gestionTemps.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>