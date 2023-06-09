<?php

class Conn {

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Private_Variables ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        private $host;
        private $user;
        private $password;
        private $dbname;
        private $conn;

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Constructor ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function __construct($host,$user,$password,$dbname) {    
            $this->host=$host;
            $this->user=$user;
            $this->password=$password;
            $this->dbname=$dbname;
            $this->conn= new mysqli($this->host,$this->user,$this->password,$this->dbname);
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Getters ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function getHost(){
            return $this->host;
        }
        public function getUser(){
            return $this->user;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getDbname(){
            return $this->dbname;
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Setters ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function setHost($host){
            $this->host=$host;
        }
        public function setUser($user){
            $this->user=$user;
        }
        public function setPassword($password){
            $this->password=$password;
        }
        public function setDbname($dbname){
            $this->dbname=$dbname;
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Dinamic Methods ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//

        public function prepare($sql) {
            return $this->conn->prepare($sql);
        }

        public function query($sql) {
            return $this->conn->query($sql);
        }

        public function error(){
            if($this->conn->error){
                die("Error al ejecutar la consulta".$this->conn->error);
            }
        }

        public function close() {
            $this->conn->close();
        }

        public function createUsersTable() {

            $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,    
            `user` VARCHAR(50), 
            `password` VARCHAR(100), 
            `role` INT(3), 
            `name` VARCHAR(50), 
            lastName VARCHAR(50), 
            birthDate date, 
            gender VARCHAR(30), 
            company VARCHAR(100), 
            email VARCHAR(100), 
            phone VARCHAR(20), 
            country VARCHAR(50), 
            city VARCHAR(50), 
            socialMedia VARCHAR(50), 
            picture VARCHAR(255), 
            validatedEmail BOOLEAN, 
            registrationDate DATE, 
            lastLogin TIMESTAMP, 
            isActive BOOLEAN, 
            activationToken VARCHAR(100), 
            resetPasswordToken VARCHAR(100)
            )";

            try {
                $this->conn->query($sql);
            } catch(mysqli_sql_exception $e) {
                echo "Error creando la base de datos para los usuarios: " . $e->getMessage();
            } finally{
                 $this->conn->close();
            }
        }

}
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Instance of class Conn ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


$conn = new Conn("127.0.0.1","root","","panama");

?>