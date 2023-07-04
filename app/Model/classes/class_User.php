<?php

class User{

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Private_Variables ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//

    
        private $user;
        private $password;
        private $role;
        private $name;
        private $lastN;
        private $birthDate;
        private $gender;
        private $company;
        private $email;
        private $phone;
        private $country;
        private $city;
        // private $socialMedia;
        private $picture;
        private $validatedEmail;
        private $registrationDate;
        private $lastLogin;
        private $isActive;
        private $activationToken;
        private $resetPasswordToken;
        private $conn;

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■    Constructor    ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//

        
        public function __construct($conn,$user,$password,$role=1,$name,$lastN,$company="Batch",
        $email,$phone,$city,$country,$birthDate,$gender,
        $picture="",$validatedEmail=0,
        $registrationDate='0000-00-00',$lastLogin="0000-00-00",$isActive=0,
        $activationToken="",$resetPasswordToken="")
        {
            $this->conn=$conn;
            $this->user=$user;
            $this->password=$password;

            if ($role==null){
                $this->role=1;
            }else{
            $this->role=$role;}

            $this->name=$name;
            $this->lastN=$lastN;
            $this->company=$company;
            $this->email=$email;
            $this->phone=$phone;
            $this->country=$country;  
            $this->city=$city;
            $this->birthDate=$birthDate;
            $this->gender=$gender;

            $this->picture=$picture;
            $this->validatedEmail=$validatedEmail;

            if ($registrationDate=='0000-00-00'){
                $this->registrationDate=date('Y-m-d');
            }else{
            $this->registrationDate=$registrationDate;}

            $this->lastLogin=$lastLogin;
            $this->isActive=$isActive;
            $this->activationToken=$activationToken;
            $this->resetPasswordToken=$resetPasswordToken;
        }     

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■      Getters      ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function getUser(){
            return $this->user;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getRole(){
            return $this->role;
        }
        public function getName(){
            return $this->name;
        }
        public function getLastN(){
            return $this->lastN;
        }
        public function getBirthDate(){
            return $this->birthDate;
        }
        public function getGender(){
            return $this->gender;
        }
        public function getCompany(){
            return $this->company;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getPhone(){
            return $this->phone;
        }
        public function getCity(){
            return $this->city;
        }
        public function getCountry(){
            return $this->country;
        }
        public function getPicture(){
            return $this->picture;
        }
        public function getValidatedEmail(){
            return $this->validatedEmail;
        }
        public function getRegistrationDate(){
            return $this->registrationDate;
        }
        public function getLastLogin(){
            return $this->lastLogin;
        }
        public function getIsActive(){
            return $this->isActive;
        }
        public function getActivationToken(){
            return $this->activationToken;
        }
        public function getResetPasswordToken(){
            return $this->resetPasswordToken;
        }
        // public function getSocialMedia(){
        //     return $this->socialMedia;
        // }
        public function getConn(){
            return $this->conn;
        }
        
    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■      Setters      ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//
        

        public function setUser($user){
            $this->user=$user;
        }
        public function setPassword($password){
            $this->password=$password;
        }
        public function setRole($role){
            $this->role=$role;
        }
        public function setName($name){
            $this->name=$name;
        }
        public function setLastN($lastN){
            $this->lastN=$lastN;
        }
        public function setBirthDate($birthDate){
            $this->birthDate=$birthDate;
        }
        public function setGender($gender){
            $this->gender=$gender;
        }
        public function setCompany($company){
            $this->company=$company;
        }
        public function setEmail($email){
            $this->email=$email;
        }
        public function setPhone($phone){
            $this->phone=$phone;
        }
        public function setCity($city){
            $this->city=$city;
        }
        public function setCountry($country){
            $this->country=$country;
        }
        public function setPicture($picture){
            $this->picture=$picture;
        }
        public function setValidatedEmail($validatedEmail){
            $this->validatedEmail=$validatedEmail;
        }
        public function setRegistrationDate($registrationDate){
            $this->registrationDate=$registrationDate;
        }
        public function setLastLogin($lastLogin){
            $this->lastLogin=$lastLogin;
        }
        public function setIsActive($isActive){
            $this->isActive=$isActive;
        }
        public function setActivationToken($activationToken){
            $this->activationToken=$activationToken;
        }
        public function setResetPasswordToken($resetPasswordToken){
            $this->resetPasswordToken=$resetPasswordToken;
        }
        // public function setSocialMedia($index, $socialMedia){
        //     $this->socialMedia[$index]=$socialMedia;
        // }
        public function setConn($conn){
            $this->conn=$conn;
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  Dinamic Methods  ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function insert(){

            $sql = "INSERT INTO users 
            (user, `password`, `role`, `name`, lastName, 
            birthDate, gender, company, email, phone, 
            country, city, picture, validatedEmail, 
            registrationDate, lastLogin, isActive, activationToken, resetPasswordToken)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $prep = $this->conn->prepare($sql);

            $prep->bind_param("ssissssssssssississ",
            $this->user,
            $this->password,
            $this->role,
            $this->name,
            $this->lastN,
            $this->birthDate,
            $this->gender,
            $this->company,
            $this->email,
            $this->phone,
            $this->country,
            $this->city,
            $this->picture,
            $this->validatedEmail,
            $this->registrationDate,
            $this->lastLogin,
            $this->isActive,
            $this->activationToken,
            $this->resetPasswordToken);

            // Ejecutar la consulta
            try {

                if ($prep->execute()) {

                    echo json_encode(["success"=>true,"message"=>"¡Usuario creado satisfactoriamente!"]);
                } else {
                    echo json_encode(["success"=>false,"message"=>"Problema con el servidor."]);
                }

            } catch (error) {
                echo json_encode(["success"=>false,"message"=>$prep->error]);            
            }
              finally{
                // Cerrar la conexión
                $prep->close();
                $this->conn->close();
            }    
        }

        public function edit($id){

            $sql = "UPDATE users SET user = ?, `password` = ?, `role` = ?,
            `name` = ?, lastName = ?, birthDate = ?, 
            gender = ?, company = ?, email = ?, phone = ?,
            country = ?, city = ?, validatedEmail = ?
            WHERE id = ?";

            $prep = $this->conn->prepare($sql);

            $prep->bind_param("ssisssssssssii",
            $this->user,
            $this->password,
            $this->role,
            $this->name,
            $this->lastN,
            $this->birthDate,
            $this->gender,
            $this->company,
            $this->email,
            $this->phone,
            $this->country,
            $this->city,
            $this->validatedEmail,
            $id    
            );

            try{
                if ($prep->execute()) {
                    echo json_encode(["success"=>true,"message"=>"¡Usuario editado exitosamente!"]);
                } else {
                    echo json_encode(["success"=>false,"message"=>"Problema con el servidor."]);
                }
            }catch (error) {
                echo json_encode(["success"=>false,"message"=>$prep->error]);            
            }
            finally{
                // Cerrar la conexión
                $prep->close();
                $this->conn->close();
            }    
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  Static Methods   ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//
        
        public static function showData($conn){

            $sql="SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $json = array();
            
                while ($row=$result->fetch_assoc()){
                    $json[]= $row;
                }

            }else{
                $json['empty']='empty';
            }

            $jsonString=json_encode($json);

            echo $jsonString;
                
            $conn->close();
        }

        public static function returnData($conn){

            $sql="SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $json = array();
            
                while ($row=$result->fetch_assoc()){
                    $json[]= $row;
                }

            }else{
                $json['empty']='empty';
            }
          
            $conn->close();

            return $json;
        }

        public static function delete($conn, $id){
            
            // Consulta INSERT
            $sql = "DELETE from users WHERE id=?";

            // Prepare la consulta
            $prep = $conn->prepare($sql);

            $prep->bind_param("i",$id);

            // Ejecutar la consulta
            try{
                if ($prep->execute()) {
                    echo json_encode(["success"=>true,"message"=>"¡Usuario borrado exitosamente!"]);
                } else {
                    echo json_encode(["success"=>false,"message"=>"Problema con el servidor."]);
                }
            }catch (error) {
                echo json_encode(["success"=>false,"message"=>$prep->error]);            
            }
            finally{
                // Cerrar la conexión
                $prep->close();
                $conn->close();
            }    
        }

        public static function search($conn, $field, $value){

            $sql="SELECT * FROM users WHERE $field LIKE '%$value%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $json = array();
            
                while ($row=$result->fetch_assoc()){
                
                    $json[]= $row;
                }

            }else{
                $json['empty']='empty';
            }

            $jsonString=json_encode($json);

            echo $jsonString;
                
            $conn->close();
            if (isset($row)) {
                return $row;
            }
        }
        
        public static function searchById($conn, $Id){

            $result=User::returnData($conn);

            foreach ($result as $row) {
                if ($row['id']==$Id){
                return $row;
                }       
            }
            if (empty($row)){
                echo '<script type="text/javascript">';
                    echo 'alert("' ."Error. No pudo encontrarse el usuario que desea editar.". '");';
                    echo 'setTimeout(function() {';
                    echo '  window.location.href = "../View/login.php";';
                    echo '}, 500);';  
                    echo '</script>';
                    exit;
            }
        }

        public static function searchByUsername($conn,$Username){

            $result=User::returnData($conn);
            foreach ($result as $user) {
                if ($user['user']==$Username){
                    return $user;
                }   
            }{
                   
            }
            if (empty($row)){
                echo '<script type="text/javascript">';
                    echo 'alert("' ."Error. No pudo encontrarse el usuario.". '");';
                    echo 'setTimeout(function() {';
                    echo '  window.location.href = "../View/CRM/loginNT.php";';
                    echo '}, 500);';  
                    echo '</script>';
                    exit;
            }
        }
}

?>