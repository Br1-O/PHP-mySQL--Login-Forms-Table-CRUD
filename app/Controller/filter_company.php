<?php

require_once '../Model/classes/autoload.php';

if($_GET['filtro-campo']){
    $results= Company::search($conn, $_GET['filtro-campo'], $_GET['valor']);
    $query=http_build_query(array('data'=>$results));
    header("Location: ../View/show_companies.php?$query");
}

?>