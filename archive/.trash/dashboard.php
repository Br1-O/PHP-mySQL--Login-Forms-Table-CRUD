
<body>

    <div class="info-bar">

    <button name="mostrarUsuarios" onclick="redirectToPage('.php')"> Turnos disponibles </button>

    <button name="form-company" onclick="redirectToPage('.php')"> Pedir Turno</button>

    <button name="mostrarDatos" onclick="redirectToPage('.php')"> Mostrar turnos </button>

    <button name="mostrarDatos" onclick="redirectToPage('.php')"> Atención al cliente </button>

    <button name="form-company" onclick="redirectToPage('form_company.php')"> Insertar Compañia</button>

    <form class="form-logout" action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
        <input type="hidden" name="logout" value="true">
        <input type="submit" class='link closeSesion' value='Cerrar Sesión'>
    </form>

    </div>

    <div id="titulo">
        <h1> · ¡Bienvenido, {{name}} · </h1>
    </div>


</body>
</html>