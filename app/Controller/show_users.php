<?php

require_once '../Model/classes/autoload.php';

//I included the $_GET['id'] in the statement as an OR so the user can also delete registers modifying the variable into the URL

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    User::showData($conn);
}
?>