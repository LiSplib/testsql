<?php

    function addPatient(){       

        if(!empty($_POST)){
            require_once 'db.php';

            $req = $pdo->prepare("INSERT INTO patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ?");
            $req->execute([$_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']]);
            $create_status = 'Votre patient a bien été créé';
        }
    }

    function addRdv(){

               
    }

