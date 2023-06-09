<?php

if($_POST['usuario_login']){

    $user=$_POST['usuario_login'];
    $password=$_POST['password_login'];

    require_once '../Model/classes/autoload.php';

    $user_db=User::searchByUsername($conn, $user);

    if(!empty($user_db)){

        if(password_verify($password, $user_db['password'])){
            session_start();
            $_SESSION['id']=$user_db['id'];
            $_SESSION['user']=$user_db['user'];
            $_SESSION['name']=$user_db['name'];

            header('Location:../View/form_company.php');

        }else{
            echo '<script type="text/javascript">';
            echo 'alert("' ."Contraseña Invalida.". '");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../View/login.php";';
            echo '}, 500);';  
            echo '</script>';
            exit;
        }

    }else{
        echo '<script type="text/javascript">';
        echo 'alert("' ."El usuario no existe.". '");';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "../View/login.php";';
        echo '}, 500);';  
        echo '</script>';
        exit;
    }

}else{
    header('Location:../View/login.php');
}

?>