<?php

class Conn {

    public function __construct($host,$user,$password,$dbname) {    
        $this->host=$host;
        $this->user=$user;
        $this->password=$password;
        $this->dbname=$dbname;
        $this->connect();
    }

    public function connect(){
        $this->conn= new mysqli($this->host,$this->user,$this->password,$this->dbname);
        if ($this->conn->connect_error){
            die("Error al conectar en la base de datos.").$this->conn->connect_error;
        }
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function error(){
        if($this->conn->error){
            die("Error al ejecutar la consulta".$this->$conn->error);
        }
    }

    public function close() {
        $this->conn->close();
    }
}

///////////////////////////////////////////////////////////////

$conn = new Conn("127.0.0.1","root","","panama");

?>