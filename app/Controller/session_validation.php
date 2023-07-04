<?php

session_start();

if(!$_SESSION['id']){
    header('Location:loginNT.php');
}

if(isset($_GET['logout']) && $_GET['logout']==true){
    session_destroy();
    header('Location:loginNT.php');
}

?>