
<?php
require '../../Controller/session_validation.php';
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
    <script type="text/javascript" src="../../../public/js/functions.js"></script>
    <title> Login </title>

</head>

<body>
  <div class="container">
    <div class="form-container">
    

    <form id="register-form" action="../../Controller/insert_user.php" method="POST">

      <h2>· Cree su cuenta · </h2>

      <label for="user">» Usuario:</label>
      <input type="text" name="user" pattern="[0-9A-Za-Z-_]+" maxlength="20" placeholder="Ingrese un nombre de usuario" required>
      <label for="password">» Contraseña:</label>
      <input type="password" name="password" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Ingrese una contraseña" required>
      <label for="password2">» Repita su contraseña:</label>
      <input type="password" name="password2" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Repita la contraseña" required>

      <label for="role">» Rol:</label>
      <select type="select" name="role" placeholder="Ingrese la posición del usuario" required>
            <option value=999> Admin (User manage) </option>
            <option value=0> Cliente </option>
            <option value=1> Scrum Master </option>
            <option value=2> First Contact - Ventas </option>
            <option value=3> Vendedor - Ventas </option>
      </select>
      
      <label for="name">» Nombre:</label>
      <input type="text" name="name"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su nombre" required>
      <label for="lastN">» Apellido:</label>
      <input type="text" name="lastN"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese su apellido" required>
      <label for="company">» Empresa:</label>
      <input type="text" name="company" pattern="[0-9A-Za-Z-_]+" maxlength="50"  placeholder="Ingrese la empresa a la que pertenece" required>
      <label for="email">» Email:</label>
      <input type="text" name="email" maxlength="100"  placeholder="Ingrese su email" required>
      <label for="email">» Repita su email:</label>
      <input type="text" name="email" maxlength="100" placeholder="Repita su email" required>
      <label for="phone">» Telefono:</label>
      <input type="text" name="phone"  pattern="[0-9+-]+" maxlength="20" placeholder="Ingrese su telefono" required>
      <label for="city">» Localidad:</label>
      <input type="text" name="city" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su ciudad" required>
      <label for="country">» País:</label>
      <input type="text" name="country"  pattern="[A-Za-Z]+" maxlength="20" placeholder="Ingrese su pais" required>
      <label for="gender">» Ingrese su género:</label>
      <input type="text" name="gender" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese su género" required>
      <label for="birthDate">» Fecha de Nacimiento:</label>
      <input type="date" name="birthDate"  pattern="[0-9-()-]+" maxlength="20" placeholder="Ingrese su fecha de nacimiento" required>

      <button type="submit">Registrarse</button>

      </form>  
          </div>
        </div>

      </body>

</html>