<?php
require_once '../Model/classes/autoload.php';
$conn->createUsersTable()
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>


  <style>
    
    body {
        background: linear-gradient(to bottom, #8d8de3, #a874cd);
        /* background-color: #464546; */
        background-size: cover;
        font-family: Arial, sans-serif;
    }

    h2{
        margin-top: 20%;
        color: #4c2a85;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        display: flex;
        flex-direction: row;
    }

    .form-container form {
        display: none;
        max-width: 500px;
        margin: 20px auto;
        background-color: #d092f250;
        padding: 20px;
        border-radius: 5% 0% 5% 5%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: #ffffff;
    }

    

    .form-container form.visible {
        display: block;
    }

    .form-container form h2 {
        text-align: center;
    }

    .form-container form input[type="text"],
    .form-container form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .form-container form button {
        background-color: #4c2a85;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 20px;
        
    }

    .form-container form button:hover {
        background-color: #693bb2;
    }

    .form-container .toggle-form {
        display:inline-flex;
        justify-content:right;
        align-items:center;
        margin-left: 20px;
       
    }

    .form-container .toggle-form button {
        background-color: #4c2a85;
    }

    .form-container .toggle-form button:hover {
        background-color:  #693bb2;
    }

    .link-empresas {

        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        margin-left: 20px;
        background-color: #4c2a85;
    }

    .link-empresas {
        max-width: 500px;
        position: relative;
        margin-top: 20%;
        margin: 20px auto;
        background-color: #cd97ea50;
        padding: 20px;
        border-radius: 0% 5% 5% 0% ;
    }

    .link {
        background-color: #4c2a85;
        color: #ffffff;
        padding: 15px;
        border-radius: 5%;

    }

    .link:hover {
        background-color: #693bb2;
    }

    input {
        background-color: #d092f250;
        border: none;
        color: rgb(255, 255, 255);
        margin-top: 10px;
  }

  label{
    color: rgb(255, 255, 255);

  }

  ::placeholder { 
  color: rgb(247, 245, 245, 0.7);
  opacity: 1; 
}
  </style>
</head>

<body>
  <div class="container">
    <div class="form-container">

      <form id="login-form" class="visible" action="../Controller/login.php" method="POST">
        <h2>· Ingrese a su cuenta ·</h2>
        <label for="usuario_login">» Usuario:</label>
        <input type="text" name="usuario_login" placeholder="Ingrese su Usuario" required>
        <label for="password_login">» Contraseña:</label>
        <input type="password" name="password_login" placeholder="Ingrese su Contraseña" required>
        <button type="submit">Ingresar</button>
        
        <div class="toggle-form">
          <button type="button" id="register-btn">Registrarse</button>
        </div>
      </form>
        

      <form id="register-form" action="../Controller/insert_user.php" method="POST">

        <h2>· Cree su cuenta · </h2>

        <label for="usuario">» Usuario:</label>
        <input type="text" name="usuario" pattern="[0-9A-Za-Z-_]+" maxlength="20" placeholder="Ingrese un nombre de usuario" required>
        <label for="contraseña">» Contraseña:</label>
        <input type="password" name="contraseña" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Ingrese una contraseña" required>
        <label for="password2">» Repita su contraseña:</label>
        <input type="password" name="password2" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Repita la contraseña" required>
        <label for="nombre">» Nombre:</label>
        <input type="text" name="nombre"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su nombre" required>
        <label for="apellido">» Apellido:</label>
        <input type="text" name="apellido"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su apellido" required>
        <label for="empresa">» Empresa:</label>
        <input type="text" name="empresa" pattern="[0-9A-Za-Z-_]+" maxlength="50"  placeholder="Ingrese la empresa a la que pertenece" required>
        <label for="email">» Email:</label>
        <input type="text" name="email" maxlength="100"  placeholder="Ingrese su email" required>
        <label for="email">» Repita su email:</label>
        <input type="text" name="email" maxlength="100" placeholder="Repita su email" required>
        <label for="telefono">» Telefono:</label>
        <input type="text" name="telefono"  pattern="[0-9+-]+" maxlength="20" placeholder="Ingrese su telefono" required>
        <label for="pais">» País:</label>
        <input type="text" name="pais"  pattern="[A-Za-Z]+" maxlength="20" placeholder="Ingrese su pais" required>
        <label for="localidad">» Localidad:</label>
        <input type="text" name="localidad" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su ciudad" required>
        <label for="localidad">» Ingrese su género:</label>
        <input type="text" name="gender" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su género" required>
        <label for="pais">» Fecha de Nacimiento:</label>
        <input type="date" name="birthDate"  pattern="[0-9-()]+" maxlength="20" placeholder="Ingrese su fecha de nacimiento" required>
 
        <button type="submit">Registrarse</button>
        
        <div class="toggle-form">
          <button type="button" id="login-btn">Ingresar</button>
        </div>
      </form>  
    </div>
  </div>

  <script>
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const loginBtn = document.getElementById('login-btn');
    const registerBtn = document.getElementById('register-btn');

    loginBtn.addEventListener('click', () => {
      loginForm.classList.add('visible');
      registerForm.classList.remove('visible');
    });

    registerBtn.addEventListener('click', () => {
      loginForm.classList.remove('visible');
      registerForm.classList.add('visible');
    });
  </script>

</body>
</html>