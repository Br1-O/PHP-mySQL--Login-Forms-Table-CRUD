<?php

// error_reporting(0);

session_start();

if(!$_SESSION['id']){
    header('Location:loginNT.php');
}

if($_GET['logout']==true){
    session_destroy();
    header('Location:loginNT.php');
}

?>