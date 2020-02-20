<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patients</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <a class="navbar-brand"><img style="width: 150px; height: 150px;" src="img/pepe.gif"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav mr-auto d-flex justify-content-center" style="font-size: 1.5em;">
                <a class="nav-item nav-link" href="index.php">Accueil</a>
                <a class="nav-item nav-link" href="ajout_patient.php">Creation patient</a>
                <a class="nav-item nav-link" href="liste-patients.php">Liste des patients</a>
                <a class="nav-item nav-link" href="ajout-rendezvous.php">RDV</a>
                <a class="nav-item nav-link" href="liste-rendezvous.php">Liste des rendez-vous</a>
            </div>
            <form class="form-inline my-2 my-lg-0" action="search.php">
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" name="search_name" aria-label="Search">
                    <button class="btn btn-info my-2 my-sm-0" type="submit" name="form_submit">Rechercher</button>
                </form>
        </div>
    </nav>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
           