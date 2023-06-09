activation_token VARCHAR(255),
reset_password_token VARCHAR(255)


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="functions.js"></script>
    <title> Login </title>

</head>

<body>
  <div class="container">
    <div class="form-container">

      <form id="register-form" action="../Controller/insert_user.php" method="POST">

        <h2>· Cree su cuenta · </h2>

        <label for="usuario">» Usuario:</label>
        <input type="text" name="usuario" pattern="[0-9A-Za-Z-_]+" maxlength="20" placeholder="Ingrese un nombre de usuario" required>
        <label for="contraseña">» Contraseña:</label>
        <input type="password" name="contraseña" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Ingrese una contraseña" required>
        <label for="password2">» Repita su contraseña:</label>
        <input type="password" name="contraseña2" pattern="[0-9A-Za-Z-_]+" maxlength="25" placeholder="Repita la contraseña" required>

        <label for="rol">» Rol:</label>
        <input type="text" name="rol"  pattern="[0-9]" maxlength="5" placeholder="Ingrese el rol" required>

        <label for="nombre">» Nombre:</label>
        <input type="text" name="nombre"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese el nombre" required>
        <label for="apellido">» Apellido:</label>
        <input type="text" name="apellido"  pattern="[A-Za-Z-_]+" maxlength="50" placeholder="Ingrese el apellido" required>
        <label for="empresa">» Empresa:</label>
        <input type="text" name="empresa" pattern="[0-9A-Za-Z-_]+" maxlength="50"  placeholder="Ingrese la empresa a la que pertenece" required>
        <label for="email">» Email:</label>
        <input type="text" name="email" maxlength="100"  placeholder="Ingrese el email" required>
        <label for="email">» Repita su email:</label>
        <input type="text" name="email2" maxlength="100" placeholder="Repita el email" required>
        <label for="telefono">» Telefono:</label>
        <input type="text" name="telefono"  pattern="[0-9+-]+" maxlength="20" placeholder="Ingrese el telefono" required>
        <label for="localidad">» Localidad:</label>
        <input type="text" name="localidad" pattern="[A-Za-Z]+" maxlength="20"  placeholder="Ingrese la ciudad" required>
        <label for="pais">» País:</label>
        <input type="text" name="pais"  pattern="[A-Za-Z]+" maxlength="20" placeholder="Ingrese el pais" required>
  
        <button type="submit">Registrarse</button>
    </div>
  </div>

</body>

</html>