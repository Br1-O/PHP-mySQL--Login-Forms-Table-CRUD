<?php

if (isset($_GET)) {
    if($_GET['page']==1){
        header("Location:../View/form_company.html");
    }

    if($_GET['page']==2){
        header("Location:../login.html");
        
    }

    if($_GET['page']==3){
        header("Location:../login.html");
        
    }

    if($_GET['page']==4){
        header("Location: ../Controller/show_companies.php");
        
    }

    
    if($_GET['page']==5){
        header("Location: ../Controller/show_users.php");
        
    }

    if($_GET['page']==6){
        echo "Esta es la página 6.";
        
    }

    if($_GET['page']==7){
        echo "Esta es la página 7.";
        
    }

    if($_GET['page']==8){
        echo "Esta es la página 8.";
        
    }

    
    if($_GET['page']==9){
        echo "Esta es la página 9.";
        
    }

    if($_GET['page']==10){
        echo "Esta es la página 10.";
        
    }
}

?>