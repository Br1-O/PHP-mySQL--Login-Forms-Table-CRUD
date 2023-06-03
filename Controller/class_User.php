<?php

class User{
    public function __construct($user,$password,$name,$lastN,$company,$email,$phone,$country,$city){
        $this->user=$user;
        $this->password=$password;
        $this->name=$name;
        $this->lastN=$lastN;
        $this->company=$company;
        $this->email=$email;
        $this->phone=$phone;
        $this->country=$country;
        $this->city=$city;
    }

    public function insert(){

        include "class_Conn.php";

        $sql = "INSERT INTO usuarios (usuario, contrasena, nombre, apellido, empresa, email, telefono, pais, localidad)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $prep = $conn->prepare($sql);

        $prep->bind_param("sssssssss",$this->user,$this->password,$this->name,$this->lastN,$this->company,$this->email,$this->phone,$this->country,$this->city);

        // Ejecutar la consulta
        if ($prep->execute()) {

            echo '<script type="text/javascript">';
            echo 'alert("' ."Usuario creado correctamente.". '");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../View/login.html";';
            echo '}, 500);';  
            echo '</script>';
            exit;
        } else {
            echo "Error al insertar el registro: " . $prep->error;
        } 
        $prep->close();
        $conn->close();
    }
    
    public static function show(){

        include "class_Conn.php";

        $sql="SELECT*FROM usuarios";
        $resultado = $conn->query($sql);

        $conn->error();

        while($fila=$resultado->fetch_assoc()){
            //imprimir datos en cada fila
            echo$fila["usuario"]." - ".$fila["contrasena"]."<br>"."<br>";
            echo$fila["nombre"]." - ".$fila["apellido"]."<br>"."<br>";
            echo$fila["empresa"]."<br>"."<br>";
            echo$fila["email"]."<br>"."<br>";
            echo$fila["telefono"];
            echo$fila["pais"]." - ".$fila["localidad"]."<br>"."<br>"."<br>"."<br>";
        }
        $conn->close();
    }
}

?>