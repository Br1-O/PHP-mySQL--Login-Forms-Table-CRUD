<?php

session_start();

if(!$_SESSION['id']){
    header('Location:../Batch/Index.php?auth=false');
}

if(isset($_GET['logout']) && $_GET['logout']==true){
    session_destroy();
    header('Location:../Batch/Index.php');
}

?>