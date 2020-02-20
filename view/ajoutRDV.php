<div class="row">
    <div class="col-sm-12">

        <?php
            if(!empty($create_status)){
                ?>
                <div class="alert alert-success" role="alert">
                    <?= $create_status ?>
                </div>
                <?php
            }
        ?>

        <div class="card bg-dark text-white text-center">
            <div class="card-body">
                <h1 class="card-title">Bienvenue dans ton espace de prise de rendez-vous.</h1>
                    <form method="POST" action="ajout-rendezvous.php">
                        <div class="row">
                            <div class="col">
                                <label for="dateHour">Date du RDV</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="col">
                                <label for="dateHour">Heure du RDV</label>
                                    <input type="time" class="form-control" id="hour" name="Hour" min="09:00" max="16:00" step="1800">
                                    <small>Les heures sont : 9h00-16h00</small><br>
                                    <small>30min par RDV</small>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <select class="custom-select col-6" id="inputGroupSelect01" name="id">
                                    <option selected>Patients...</option>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php
                                        while ($donnees = $reponse->fetch()){
                                    ?>
                                
                                    <option value="<?= $donnees['id']?>"><?= strtoupper($donnees['lastname'])?> <?= $donnees['firstname']?></option>
                            
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>   
                        <button type="submit" class="btn btn-info mt-2">
                            <svg class="bi bi-upload" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 10a.5.5 0 01.5.5V14a1 1 0 001 1h12a1 1 0 001-1v-3.5a.5.5 0 011 0V14a2 2 0 01-2 2H4a2 2 0 01-2-2v-3.5a.5.5 0 01.5-.5zM7 6.854a.5.5 0 00.707 0L10 4.56l2.293 2.293A.5.5 0 1013 6.146L10.354 3.5a.5.5 0 00-.708 0L7 6.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M10 4a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 0110 4z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </form>
            </div>
        </div>
    </div>
</div>