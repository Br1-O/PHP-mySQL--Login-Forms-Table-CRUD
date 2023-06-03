<?php

include 'class_Company.php';

if($_GET['filtro-campo']){
    $results= Company::search($_GET['filtro-campo'], $_GET['valor']);
    $query=http_build_query(array('data'=>$results));
    header("Location: ../View/show_companies.php?$query");
}

?>