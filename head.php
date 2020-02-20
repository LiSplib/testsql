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
                    <button class="btn btn-info my-2 my-sm-0" type="submit" name="form_submit">
                        <svg class="bi bi-search" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.442 12.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M8.5 14a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM15 8.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </form>
        </div>
    </nav>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
           