<?php

require_once '../Model/classes/autoload.php';


$input=file_get_contents("php://input");

    if($input){
    
        $decode=json_decode($input,true);

        $name=$decode["name"];
        $status=$decode["status"];
        $industry=$decode["industry"];
        $phone=$decode["phone"];
        $email=$decode["email"];
        $city=$decode["city"];
        $country=$decode["country"];
        $opportunityLevel=$decode["opportunityLevel"];
        $nextAction=$decode["nextAction"];
        $services=$decode["services"];
        $website=$decode["website"];
        $socialMedia=$decode["socialMedia"];
        $responsable=$decode["responsable"];
        $phoneResponsable=$decode["phoneResponsable"];
        $emailResponsable=$decode["emailResponsable"];
        $extraInfoResponsable=$decode["extraInfoResponsable"];
        $extraInfoCompany=$decode["extraInfoResponsable"];
        $address=$decode["address"];
        $commentsSales1=$decode["commentsSales1"];
        $commentsSales2=$decode["commentsSales2"];
        $openingDate=$decode["openingDate"];
        $lastCheckDate=$decode["lastCheckDate"];
        $closingDate=$decode["closingDate"];
        $nextDateForContact=$decode["nextDateForContact"];
        $nextDateForClosing=$decode["nextDateForClosing"];
        $isInterested=$decode["isInterested"];
        $salesState=$decode["salesState"];
        $isClient=$decode["isClient"];
        $salesmanContacter=$decode["salesmanContacter"];
        $salesmanCloser=$decode["salesmanCloser"];
        $typeOfContract=$decode["typeOfContract"];
        $companyFiles=$decode["companyFiles"];
    
        //////////////////////////////////////////////////////////////////////////////////////

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
            $closingDate,
            $nextDateForContact,
            $nextDateForClosing,
            $isInterested,
            $salesState,
            $isClient,
            $salesmanContacter,
            $salesmanCloser,
            $typeOfContract,
            $companyFiles
        );
        $company->insert();
    } 



    ?>
