<?php

require_once '../Model/classes/autoload.php';
require_once 'session_validation.php';

//I included the $_GET['id'] in the statement as an OR so the user can also delete registers modifying the variable into the URL

if($_SERVER['REQUEST_METHOD'] === 'DELETE' || $_GET['id']){
    $id=$_REQUEST['id'];
    $lastUpdatedBy=$_SESSION["id"];
    User::delete($conn, $id, $lastUpdatedBy);
}
?>