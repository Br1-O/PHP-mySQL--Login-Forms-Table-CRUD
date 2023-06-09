<?php

require_once '../Model/classes/autoload.php';

if($_GET['filter-field']){
    $results= User::search($conn, $_GET['filter-field'], $_GET['value']);
    $query=http_build_query(array('data_user'=>$results));
    header("Location: ../View/show_users.php?$query");
}

?>