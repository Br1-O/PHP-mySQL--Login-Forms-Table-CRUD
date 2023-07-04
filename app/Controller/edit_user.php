<?php
require_once '../Model/classes/autoload.php';
require_once 'session_validation.php';


// Get the raw PUT data
$putData = file_get_contents('php://input');

if ($putData) {

    try{

        $data = json_decode($putData, true);

        $id = $data['id'];
        $userName = $data['user'];
        $password = $data['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = $data['role'];
        $name = $data['name'];
        $lastN = $data['lastN'];
        $birthDate = $data['birthDate'];
        $gender = $data['gender'];
        $company = $data['company'];
        $email = $data['email'];
        $phone = $data['phone'];
        $country = $data['country'];
        $city = $data['city'];
        $validatedEmail = $data['validatedEmail'];

        $user = new User(
            $conn,
            $userName,
            $hashed_password,
            $role,
            $name,
            $lastN,
            $company,
            $email,
            $phone,
            $city,
            $country,
            $birthDate, 
            $gender,
            "", //poner campo foto luego en el edit
            $validatedEmail
        );
        
        $user->edit($id);

        unset($user,$putData,$data);

    }catch(Exception $e){
        echo '¡Error! Error: ',  $e->getMessage(), "\n";
    }
    
}else{
    echo 'Error. Se necesita el id del usuario y los datos a modificarse. Intente nuevamente.';
}

?>