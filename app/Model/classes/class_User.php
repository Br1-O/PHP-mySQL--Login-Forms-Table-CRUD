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

            // echo '<script type="text/javascript">';
            // echo 'alert("' ."Usuario creado correctamente.". '");';
            // echo 'setTimeout(function() {';
            // echo '  window.location.href = "../View/login.html";';
            // echo '}, 500);';  
            // echo '</script>'
            //exit;
            echo "¡Usuario creado correctamente!";
        } else {
            echo "Error al insertar el registro: " . $prep->error;
        } 
        $prep->close();
        $conn->close();
    }
    
    public static function showData(){

        include "class_Conn.php";

        $sql="SELECT * FROM usuarios";
        $resultado = $conn->query($sql);

        $conn->error(); 

        $conn->close();
        return $resultado;
       
    }

    
    public static function searchById($Id){

        $resultado=User::showData();
        while($fila=$resultado->fetch_assoc()){
            if ($fila['id']==$Id){
               return $fila;
            }       
        }
        if (empty($fila)){
            echo '<script type="text/javascript">';
                echo 'alert("' ."Error. No pudo encontrarse el usuario que desea editar.". '");';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "../View/login.php";';
                echo '}, 500);';  
                echo '</script>';
                exit;
        }
    }

    public static function searchByUsername($Username){

        $resultado=User::showData();
        while($fila=$resultado->fetch_assoc()){
            if ($fila['usuario']==$Username){
               return $fila;
            }       
        }
        if (empty($fila)){
            echo '<script type="text/javascript">';
                echo 'alert("' ."Error. No pudo encontrarse el usuario.". '");';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "../View/login.php";';
                echo '}, 500);';  
                echo '</script>';
                exit;
        }
    }

    public static function search($field, $value){

        $resultado=User::showData();
        $stack=array();
        while($fila=$resultado->fetch_assoc()){
            if ($fila["$field"]==$value){
                array_push($stack, $fila);
            }       
        } 
        if (empty($stack)){
            echo '<script type="text/javascript">';
                echo 'alert("' ."Error. No pudo encontrarse el usuario.". '");';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "../View/login.php";';
                echo '}, 500);';  
                echo '</script>';
                exit;
        }
       
        return $stack;

    }


}

?>