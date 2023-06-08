<?php

require_once '../Model/classes/autoload.php';

if($_GET['filtro-campo']){
    include 'object_conn.php';
    $results= User::search($conn, $_GET['filtro-campo'], $_GET['valor']);
    $query=http_build_query(array('data_user'=>$results));
    header("Location: ../View/show_users.php?$query");
}

?>