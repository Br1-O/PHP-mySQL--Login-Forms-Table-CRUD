<?php

if($_POST['usuario_login']){

    $usuario=$_POST['usuario_login'];
    $password=$_POST['password_login'];

    require_once '../Model/classes/autoload.php';

    $usuario_db=User::searchByUsername($conn, $usuario);

    if(!empty($usuario_db)){

        if(password_verify($password, $usuario_db['contrasena'])){
            session_start();
            $_SESSION['id']=$usuario_db['id'];
            $_SESSION['usuario']=$usuario_db['usuario'];
            $_SESSION['nombre']=$usuario_db['nombre'];

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