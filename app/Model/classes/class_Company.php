<?php

class Company{

    private $conn;

    public function __construct($conn,$name,$services,$responsable,$phone,$website,$comments,$OpeningDate,$ClosingDate){
        $this->name=$name;
        $this->services=$services;
        $this->responsable=$responsable;
        $this->phone=$phone;
        $this->website=$website;
        $this->comments=$comments;
        $this->OpeningDate=$OpeningDate;
        $this->ClosingDate=$ClosingDate;
        $this->$fila;
        $this->conn=$conn;
    }


    public function insert(){

        // Consulta INSERT
        $sql = "INSERT INTO empresas (nombre, servicios, responsable, telefono, pagina, comentarios, fecha_inicio, fecha_cierre) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare la consulta
        $prep = $this->conn->prepare($sql);

        // Bind los parámetros
        $prep->bind_param("ssssssss",$this->name,$this->services,$this->responsable,$this->phone,$this->website,$this->comments,$this->OpeningDate,$this->ClosingDate);

        // Ejecutar la consulta
        if ($prep->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("' ."Registro insertado correctamente.". '");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../View/form_company.php";';
            echo '}, 500);';  
            echo '</script>';
            exit;
        } else {
            echo "Error al insertar el registro: " . $prep->error;
        }
        // Cerrar la conexión
        $prep->close();
        $this->conn->close();

    }

    public static function delete($conn){
        
        if($_GET){

        $id=$_GET['idborrar'];

        // Consulta INSERT
        $sql = "delete from empresas WHERE id=$id";

        // Prepare la consulta
        $prep = $conn->prepare($sql);

        // Ejecutar la consulta
        if ($prep->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("' ."Registro borrado exitosamente.". '");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../View/show_companies.php";';
            echo '}, 500);';  
            echo '</script>';
            exit;
        } else {
            echo "Error al borrar el registro: " . $prep->error;
        }
        // Cerrar la conexión
        $prep->close();
        $conn->close();} else{
            echo '<script type="text/javascript">';
            echo 'alert("' ."Error. No pudo seleccionarse el registro deseado para ser borrado, intentelo nuevamente.". '");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../View/show_companies.php";';
            echo '}, 500);';  
            echo '</script>';
            exit;
        }
    }


    public static function showData($conn){

        $sql="SELECT * FROM empresas";
        $resultado = $conn->query($sql);

        $conn->error();  
        
        $conn->close();

        return $resultado;

    }

    public static function searchById($conn, $Id){

        $resultado=Company::showData($conn);
        while($fila=$resultado->fetch_assoc()){
            if ($fila['id']==$Id){
               return $fila;
            }       
        }
        if (empty($fila)){
            echo '<script type="text/javascript">';
                echo 'alert("' ."Error. No pudo encontrarse el registro que desea editar.". '");';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "../View/show_companies.php";';
                echo '}, 500);';  
                echo '</script>';
                exit;
        }
    }

    public static function searchByName($conn, $name){

        $resultado=Company::showData($conn);
        $stack=array();
        while($fila=$resultado->fetch_assoc()){
            if ($fila['nombre']==$name){
                array_push($stack, $fila);
            }       
        } 
        if (empty($stack)){
            echo '<script type="text/javascript">';
                echo 'alert("' ."Error. No pudo encontrarse el registro.". '");';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "../View/show_companies.php";';
                echo '}, 500);';  
                echo '</script>';
                exit;
        }
       
        return $stack;

    }

    public static function search($conn, $field, $value){

        $resultado=Company::showData($conn);
        $stack=array();
        while($fila=$resultado->fetch_assoc()){
            if ($fila["$field"]==$value){
                array_push($stack, $fila);
            }       
        } 
        if (empty($stack)){
            echo '<script type="text/javascript">';
                echo 'alert("' ."Error. No pudo encontrarse el registro.". '");';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "../View/show_companies.php";';
                echo '}, 500);';  
                echo '</script>';
                exit;
        }
       
        return $stack;

    }

    public static function searchLetter($conn, $field, $value){

        $resultado=Company::showData($conn);

        $stack=array();

        // Consulta INSERT
        $sql = "INSERT INTO empresas (nombre, servicios, responsable, telefono, pagina, comentarios, fecha_inicio, fecha_cierre) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare la consulta
        $prep = $conn->prepare($sql);

        // Bind los parámetros
        $prep->bind_param("ssssssss",$this->name,$this->services,$this->responsable,$this->phone,$this->website,$this->comments,$this->OpeningDate,$this->ClosingDate);

        // Ejecutar la consulta
        if ($prep->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("' ."Registro insertado correctamente.". '");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../View/form_company.php";';
            echo '}, 500);';  
            echo '</script>';
            exit;
        } else {
            echo "Error al insertar el registro: " . $prep->error;
        }
        // Cerrar la conexión
        $prep->close();
        $conn->close();




        while($fila=$resultado->fetch_assoc()){
            if ($fila["$field"]==$value){
                array_push($stack, $fila);
            }       
        } 
        if (empty($stack)){
            echo '<script type="text/javascript">';
                echo 'alert("' ."Error. No pudo encontrarse el registro.". '");';
                echo 'setTimeout(function() {';
                echo '  window.location.href = "../View/show_companies.php";';
                echo '}, 500);';  
                echo '</script>';
                exit;
        }
       
        return $stack;

    }

    public function edit($Id){

        // Consulta INSERT
        $sql = "UPDATE empresas set nombre=?, servicios=?, responsable=?, telefono=?, pagina=?, comentarios=?, fecha_inicio=?, fecha_cierre=? WHERE id=?";

        // Prepare la consulta
        $prep = $this->conn->prepare($sql);

        // Bind los parámetros
        $prep->bind_param("sssssssss",$this->name,$this->services,$this->responsable,$this->phone,$this->website,$this->comments,$this->OpeningDate,$this->ClosingDate,$Id);

        // Ejecutar la consulta
        if ($prep->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("' ."Registro editado exitosamente.". '");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../View/show_companies.php";';
            echo '}, 500);';  
            echo '</script>';
            exit;
        } else {
            echo "Error al editar el registro: " . $prep->error;
            
            echo '<script type="text/javascript">';
            echo 'alert("' ."Error. No pudo editarse el registro, intentelo nuevamente.". '");';
            echo 'setTimeout(function() {';
            echo '  window.location.href = "../View/show_companies.php";';
            echo '}, 500);';  
            echo '</script>';
            exit;
        }

        // Cerrar la conexión
        $prep->close();
        $this->conn->close();
    }

}

?>