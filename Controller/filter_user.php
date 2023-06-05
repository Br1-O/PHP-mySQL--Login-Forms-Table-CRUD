<?php

include 'class_User.php';

if($_GET['filtro-campo']){
    $results= User::search($_GET['filtro-campo'], $_GET['valor']);
    $query=http_build_query(array('data_user'=>$results));
    header("Location: ../View/show_users.php?$query");
}

?>