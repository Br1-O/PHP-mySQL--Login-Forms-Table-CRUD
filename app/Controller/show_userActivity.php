<?php

require_once '../Model/classes/autoload.php';
require_once 'session_validation.php';

if(isset($_REQUEST['user'])){

    $id=$_REQUEST['user'];

    $sql="SELECT a.`action` AS 'Acción', 
        COALESCE(dc.`name`, c.`name`) AS 'Compañia', 
        COALESCE(du.`user`, u.`user`) AS 'Usuario afectado',
        ua.`date` AS 'Fecha'
        FROM user_activity ua
        LEFT JOIN actions a ON ua.`action`=a.id
        LEFT JOIN deletedCompanies dc ON ua.company_id=dc.idCompany
        LEFT JOIN companies c ON ua.company_id=c.id
        LEFT JOIN deletedUsers du ON ua.receiving_user_id=idUser
        LEFT JOIN users u ON ua.receiving_user_id=u.id
        WHERE ua.`user_id` = $id ORDER BY ua.`date` DESC LIMIT 50;";

    User::showTable($conn,$sql);


    
    
   


};

?>