<?php

if($_POST['usuario_login']){

    $usuario=$_POST['usuario_login'];
    $password=$_POST['password_login'];

    include 'class_User.php';

    $usuario_db=User::searchByUsername($usuario);

    if(!empty($usuario_db)){

        if(password_verify($password, $usuario_db['contrasena'])){
            session_start();
            $_SESSION['id']=$usuario_db['id'];
            $_SESSION['usuario']=$usuario_db['usuario'];
            $_SESSION['nombre']=$usuario_db['nombre'];
            $_SESSION['apellido']=$usuario_db['apellido'];
            $_SESSION['empresa']=$usuario_db['empresa'];
            $_SESSION['email']=$usuario_db['email'];
            $_SESSION['telefono']=$usuario_db['telefono'];
            $_SESSION['localidad']=$usuario_db['localidad'];
            $_SESSION['pais']=$usuario_db['pais'];

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