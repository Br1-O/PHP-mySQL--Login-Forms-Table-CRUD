<?php
require_once '../Model/classes/autoload.php';
require_once 'session_validation.php';


// Get the raw PUT data
$putData = file_get_contents('php://input');

if ($putData) {

    try{

        $data = json_decode($putData, true);

        $id = $data['id'];
        $name = $data['name'];
        $status = $data['status'];
        $opportunityLevel = $data['opportunityLevel'];
        $nextAction = $data['nextAction'];
        $industry = $data['industry'];
        $services = $data['services'];
        $phone = $data['phone'];
        $email = $data['email'];
        $website = $data['website'];
        $socialMedia = $data['socialMedia'];
        $responsable = $data['responsable'];
        $phoneResponsable = $data['phoneResponsable'];
        $emailResponsable = $data['emailResponsable'];
        $extraInfoResponsable = $data['extraInfoResponsable'];
        $extraInfoCompany = $data['extraInfoCompany'];
        $address = $data['address'];
        $city = $data['city'];
        $country = $data['country'];
        $commentsSales1 = $data['commentsSales1'];
        $commentsSales2 = $data['commentsSales2'];
        $openingDate = $data['openingDate'];
        $lastCheckDate = $data['lastCheckDate'];
        $closingContactDate = $data['closingContactDate'];
        $closingDate = $data['closingDate'];
        $nextDateForContact = $data['nextDateForContact'];
        $nextDateForClosing = $data['nextDateForClosing'];
        $isInterested = $data['isInterested'];
        $salesState = $data['salesState'];
        $isClient = $data['isClient'];
        $salesmanAdder= $data['salesmanAdder'];
        $salesmanContacter = $data['salesmanContacter'];
        $salesmanCloser = $data['salesmanCloser'];
        $typeOfContract = $data['typeOfContract'];
        $companyFiles = array();
        $lastUpdatedBy = $_SESSION['id'];

        $company = new Company(
            $conn,
            $name,
            $status,
            $opportunityLevel,
            $nextAction,
            $industry,
            $services,
            $phone,
            $email,
            $website,
            $socialMedia,
            $responsable,
            $phoneResponsable,
            $emailResponsable,
            $extraInfoResponsable,
            $extraInfoCompany,
            $address,
            $city,
            $country,
            $commentsSales1,
            $commentsSales2,
            $openingDate,
            $lastCheckDate,
            $closingContactDate,
            $closingDate,
            $nextDateForContact,
            $nextDateForClosing,
            $isInterested,
            $salesState,
            $isClient,
            $salesmanAdder,
            $salesmanContacter,
            $salesmanCloser,
            $typeOfContract,
            $companyFiles,
            $lastUpdatedBy
        );
        
        $company->edit($id);

        unset($company,$putData,$data);

    }catch(Exception $e){
        echo '¡Error! Error: ',  $e->getMessage(), "\n";
    }
    
}else{
    echo 'Error. Se necesita el id de la empresa y los datos a modificarse. Intente nuevamente.';
}

?>