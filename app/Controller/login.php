<?php

if($_POST['user_login']){

    $user=$_POST['user_login'];
    $password=$_POST['password_login'];

    require_once '../Model/classes/autoload.php';

    $user_db=User::searchByUsername($conn, $user);

    if(!empty($user_db)){

        if(password_verify($password, $user_db['password'])){
                session_start();
                $_SESSION['id']=$user_db['id'];
                $_SESSION['role']=((int)$user_db['role']);
                $_SESSION['user']=$user_db['user'];
                $_SESSION['name']=$user_db['name'];
                                           
                header('Location:../View/CRM/dashboard.php');

        }else{
            ?>
            
            <html>
                <head>
                    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
                </head>
                <script>
                     
                    Swal.fire({
                        icon: 'success',
                        title: '¡Compañia agregada con éxito!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </html>   

            <?php

            // echo '<script type="text/javascript">';
            // echo 'setTimeout(function() {';
            // echo '  window.location.href = "../View/loginNT.php";';
            // echo '}, 500);';  
            // echo '</script>';
            // exit;
        }

    }else{
        // <html>
        // echo '<script type="text/javascript">';
        // echo 'alert("' ."El usuario no existe.". '");';
        // echo 'setTimeout(function() {';
        // echo '  window.location.href = "../View/login.php";';
        // echo '}, 500);';  
        // echo '</script>';
        // <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        // </html>
        // exit;
    }

}else{
    header('Location:../View/CRM/login.php');
}

?>