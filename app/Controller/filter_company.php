<?php

require_once '../Model/classes/autoload.php';

// $input=file_get_contents("php://input");

// print_r($input);
// var_dump($input);

    // $results= 
    Company::search($conn, $_GET['searchField'], $_GET['value']);
    // $query=http_build_query(array('data'=>$results));
    // header("Location: ../View/show_companies.php?$query");


?>