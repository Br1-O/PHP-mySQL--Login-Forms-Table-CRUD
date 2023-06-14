<?php

require_once '../Model/classes/autoload.php';

class ControllerCompany{

    public function __construct($conn, $q)
    {
        switch($q){

        case 'showCompanies':
            ControllerCompany::showCompanies($conn);
            break;
        case 'showCompany':
            ControllerCompany::showCompany($conn);
            break;
        case 'insertCompany':

            if ($_POST['name']) {
                $name=$_POST["name"];
                $status=$_POST["status"];
                $industry=$_POST["industry"];
                $phone=$_POST["phone"];
                $email=$_POST["email"];
                $city=$_POST["city"];
                $country=$_POST["country"];
                $opportunityLevel=$_POST["OpportinyLevel"];
                $nextAction=$_POST["nextAction"];
                $services=$_POST["services"];
                $website=$_POST["website"];
                $socialMedia=$_POST["socialMedia"];
                $responsable=$_POST["responsable"];
                $phoneResponsable=$_POST["phoneResponsable"];
                $emailResponsable=$_POST["emailResponsable"];
                $extraInfoResponsable=$_POST["extraInfoResponsable"];
                $extraInfoCompany=$_POST["extraInfoResponsable"];
                $address=$_POST["address"];
                $commentsSales1=$_POST["commentsSales1"];
                $commentsSales2=$_POST["commentsSales2"];
                $openingDate=$_POST["openingDate"];
                $lastCheckDate=$_POST["lastCheckDate"];
                $closingDate=$_POST["closingDate"];
                $nextDateForContact=$_POST["nextDateForContact"];
                $nextDateForClosing=$_POST["nextDateForClosing"];
                $isInterested=$_POST["isInterested"];
                $salesState=$_POST["salesState"];
                $isClient=$_POST["isClient"];
                $salesmanContacter=$_POST["salesmanContacter"];
                $salesmanCloser=$_POST["salesmanCloser"];
                $typeOfContract=$_POST["typeOfContract"];
                $companyFiles=$_POST["companyFiles"];
            } else {
                header('Location:../View/form_company.html');
            }

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

            ControllerCompany::insertCompany($conn);
            break;
        case 'editCompany':
            ControllerCompany::editCompany($conn);
            break;
        case 'deleteCompany':
            ControllerCompany::deleteCompany($conn);
            break;
        case 'filterCompany':
            ControllerCompany::filterCompany($conn);
            break;
        case 'pdfCompanies':
            ControllerCompany::pdfCompanies($conn);
            break;
        case 'pdfCompany':
            ControllerCompany::pdfCompany($conn);
            break;
        case 'excelCompanies':
            ControllerCompany::excelCompanies($conn);
            break;
        case 'excelCompany':
            ControllerCompany::excelCompany($conn);
            break;
        }
        
    }

    public function showCompanies($conn){
        Company::showData($conn);
    }

    public function showCompany($conn){
        Company::showData($conn);
    }

    public function insertCompany($conn){
        Company::showData($conn);
    }

    public function editCompany($conn){
        Company::showData($conn);
    }

    public function deleteCompany($conn){
        Company::delete($conn);
    }

    public function filterCompany($conn){
        if($_GET['filtro-campo']){
            $results= Company::search($conn, $_GET['filter-field'], $_GET['value']);
            $query=http_build_query(array('data'=>$results));
            header("Location: ../View/show_companies.php?$query");
        }
    }
    public function pdfCompanies($conn){

        // //////////////////////////////////////CARGA en cache de todo el archivo HTML//////////////////////////////////////
        // ob_start();
        // ?>

        // <!DOCTYPE html>
        // <head>
        //     <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/Proyecto_panama/public/css/PDFstyles.css">
        // </head>
        // </html>

        // <?php
        // $url= "../View/show_companies.php";
        // include $url;
        // //////////////////////////////////////GET del cache de todo el archivo HTML//////////////////////////////////////
        // $report=ob_get_clean();

        // //////////////////////////////////////DOMpdf volcado del HTML al archivo PDF//////////////////////////////////////

        // require_once '../../vendor/DOMpdf/autoload.inc.php';
        // use Dompdf\Dompdf;
        // $dompdf= new Dompdf();

        // //option para poder ver imagenes:
        // $options= $dompdf->getOptions();
        // $options->set(array('isRemoteEnabled'=> true));
        // $dompdf->setOptions($options);

        // $dompdf->loadHTML($report);

        // //tipo de hoja del archivo:
        // $dompdf->setPaper('A4', 'landscape');

        // //render en pantalla:
        // $dompdf->render();

        // //render final, attachment setea si se autodescarga o no
        // $dompdf->stream($fila['nombre'].".pdf", array('Attachment'=> false));

    }

    public function pdfCompany($conn){
        Company::showData($conn);
    }

    public function excelCompanies($conn){
        Company::showData($conn);
    }

    public function excelCompany($conn){
        Company::showData($conn);
    }

}

if ($_GET){

    $q=$_GET['q'];    
    $controllerCompany=new ControllerCompany($conn, $q);

}

?>