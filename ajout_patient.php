<?php

$title = 'Ajout patient'; 

require_once 'controller.php';

$create_status = '';

addPatient();

ob_start();

require('view/ajoutPatient.php');

$content = ob_get_clean();

require('view/template.php'); ?>