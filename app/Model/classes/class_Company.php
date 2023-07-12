<?php

class Company{

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Private_Variables ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//

        private $conn;
        private $name;
        private $status;
        private $opportunityLevel;
        private $nextAction;
        private $industry;
        private $services;
        private $phone;
        private $email;
        private $website;
        private $socialMedia;
        private $responsable;
        private $phoneResponsable;
        private $emailResponsable;
        private $extraInfoResponsable;
        private $extraInfoCompany;
        private $address;
        private $city;
        private $country;
        private $commentsSales1;
        private $commentsSales2;
        private $openingDate;
        private $lastCheckDate;
        private $closingContactDate;
        private $closingDate;
        private $nextDateForContact;
        private $nextDateForClosing;
        private $isInterested;
        private $salesState;
        private $isClient;
        private $salesmanAdder;
        private $salesmanContacter;
        private $salesmanCloser;
        private $typeOfContract;
        private $companyFiles;

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■    Constructor    ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function __construct(
            $conn,
            $name,
            $status='No iniciado',
            $opportunityLevel='Desconocido',
            $nextAction='Primer contacto',
            $industry,
            $services='N/A',
            $phone,
            $email,
            $website='N/A',
            $socialMedia=array(),
            $responsable='N/A',
            $phoneResponsable='N/A',
            $emailResponsable='N/A',
            $extraInfoResponsable='N/A',
            $extraInfoCompany='N/A',
            $address='N/A',
            $city,
            $country,
            $commentsSales1='N/A',
            $commentsSales2='N/A',
            $openingDate='0000-00-00',
            $lastCheckDate='0000-00-00',
            $closingContactDate='0000-00-00',
            $closingDate='0000-00-00',
            $nextDateForContact='0000-00-00',
            $nextDateForClosing='0000-00-00',
            $isInterested=1,
            $salesState='No contactado',
            $isClient=0,
            $salesmanAdder=0,
            $salesmanContacter=0,
            $salesmanCloser=0,
            $typeOfContract='N/A',
            $companyFiles=array()

        ) {
            $this->conn = $conn;
            $this->name = $name;
            $this->status = $status;
            $this->opportunityLevel = $opportunityLevel;
            $this->nextAction = $nextAction;
            $this->industry = $industry;
            $this->services = $services;
            $this->phone = $phone;
            $this->email = $email;
            $this->website = $website;
            $this->socialMedia = $socialMedia;
            $this->responsable = $responsable;
            $this->phoneResponsable = $phoneResponsable;
            $this->emailResponsable = $emailResponsable;
            $this->extraInfoResponsable = $extraInfoResponsable;
            $this->extraInfoCompany = $extraInfoCompany;
            $this->address = $address;
            $this->city = $city;
            $this->country = $country;
            $this->commentsSales1 = $commentsSales1;
            $this->commentsSales2 = $commentsSales2;

            if ($openingDate=='0000-00-00'){
                $this->openingDate=date('Y-m-d');
            }else{
                $this->openingDate = $openingDate;}
            
            $this->lastCheckDate = $lastCheckDate;
            $this->closingContactDate=$closingContactDate;
            $this->closingDate = $closingDate;
            $this->nextDateForContact = $nextDateForContact;
            $this->nextDateForClosing = $nextDateForClosing;
            $this->isInterested = $isInterested;
            $this->salesState = $salesState;
            $this->isClient = $isClient;

            if ($salesmanAdder==null){
                $this->salesmanAdder=0;
            }else{
                $this->salesmanAdder = $salesmanAdder;}

            $this->salesmanContacter = $salesmanContacter;
            $this->salesmanCloser = $salesmanCloser;
            $this->typeOfContract = $typeOfContract;
            $this->companyFiles = $companyFiles;
        }
    
    

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■      Getters      ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function getName() {
            return $this->name;
        }

        public function getStatus() {
            return $this->status;
        }

        public function getOpportunityLevel() {
            return $this->opportunityLevel;
        }

        public function getNextAction() {
            return $this->nextAction;
        }

        public function getIndustry() {
            return $this->industry;
        }

        public function getServices() {
            return $this->services;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getWebsite() {
            return $this->website;
        }

        public function getSocialMedia() {
            return $this->socialMedia;
        }

        public function getResponsable() {
            return $this->responsable;
        }

        public function getPhoneResponsable() {
            return $this->phoneResponsable;
        }

        public function getEmailResponsable() {
            return $this->emailResponsable;
        }

        public function getExtraInfoResponsable() {
            return $this->extraInfoResponsable;
        }

        public function getExtraInfoCompany() {
            return $this->extraInfoCompany;
        }
        
        public function getAddress() {
            return $this->address;
        }

        public function getCity() {
            return $this->city;
        }

        public function getCountry() {
            return $this->country;
        }

        public function getCommentsSales1() {
            return $this->commentsSales1;
        }

        public function getCommentsSales2() {
            return $this->commentsSales2;
        }

        public function getOpeningDate() {
            return $this->openingDate;
        }

        public function getLastCheckDate() {
            return $this->lastCheckDate;
        }
        
        public function closingContactDate() {
            return $this->closingContactDate;
        }

        public function getClosingDate() {
            return $this->closingDate;
        }

        public function getNextDateForContact() {
            return $this->nextDateForContact;
        }

        public function getNextDateForClosing() {
            return $this->nextDateForClosing;
        }

        public function getIsInterested() {
            return $this->isInterested;
        }

        public function getSalesState() {
            return $this->salesState;
        }

        public function getIsClient() {
            return $this->isClient;
        }

        public function getSalesmanAdder() {
            return $this->salesmanAdder;
        }

        public function getSalesmanContacter() {
            return $this->salesmanContacter;
        }

        public function getSalesmanCloser() {
            return $this->salesmanCloser;
        }

        public function getTypeOfContract() {
            return $this->typeOfContract;
        }

        public function getCompanyFiles() {
            return $this->companyFiles;;
        }


    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■      Setters      ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function setName($name) {
            $this->name = $name;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function setOpportunityLevel($opportunityLevel) {
            $this->opportunityLevel = $opportunityLevel;
        }

        public function setNextAction($nextAction) {
            $this->nextAction = $nextAction;
        }

        public function setIndustry($industry) {
            $this->industry = $industry;
        }

        public function setServices($services) {
            $this->services = $services;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setWebsite($website) {
            $this->website = $website;
        }

        public function setSocialMedia($socialMedia) {
            $this->socialMedia = $socialMedia;
        }

        public function setResponsable($responsable) {
            $this->responsable = $responsable;
        }

        public function setPhoneResponsable($phoneResponsable) {
            $this->phoneResponsable = $phoneResponsable;
        }

        public function setEmailResponsable($emailResponsable) {
            $this->emailResponsable = $emailResponsable;
        }

        public function setExtraInfoResponsable($extraInfoResponsable) {
            $this->extraInfoResponsable = $extraInfoResponsable;
        }

        public function setExtraInfoCompany($extraInfoCompany) {
            $this->extraInfoCompany = $extraInfoCompany;
        }

        public function setAddress($address) {
            $this->address = $address;
        }

        public function setCity($city) {
            $this->city = $city;
        }

        public function setCountry($country) {
            $this->country = $country;
        }

        public function setCommentsSales1($commentsSales1) {
            $this->commentsSales1 = $commentsSales1;
        }

        public function setCommentsSales2($commentsSales2) {
            $this->commentsSales2 = $commentsSales2;
        }

        public function setOpeningDate($openingDate) {
            $this->openingDate = $openingDate;
        }

        public function setLastCheckDate($lastCheckDate) {
            $this->lastCheckDate = $lastCheckDate;
        }

        public function setClosingContactDate($closingContactDate) {
            $this->closingContactDate = $closingContactDate;
        }

        public function setClosingDate($closingDate) {
            $this->closingDate = $closingDate;
        }

        public function setNextDateForContact($nextDateForContact) {
            $this->nextDateForContact = $nextDateForContact;
        }

        public function setNextDateForClosing($nextDateForClosing) {
            $this->nextDateForClosing = $nextDateForClosing;
        }

        public function setIsInterested($isInterested) {
            $this->isInterested = $isInterested;
        }

        public function setSalesState($salesState) {
            $this->salesState = $salesState;
        }

        public function setIsClient($isClient) {
            $this->isClient = $isClient;
        }

        public function setSalesmanAdder($salesmanAdder) {
            $this->salesmanAdder=$salesmanAdder;
        }

        public function setSalesmanContacter($salesmanContacter) {
            $this->salesmanContacter = $salesmanContacter;
        }

        public function setSalesmanCloser($salesmanCloser) {
            $this->salesmanCloser = $salesmanCloser;
        }

        public function setTypeOfContract($typeOfContract) {
            $this->typeOfContract = $typeOfContract;
        }

        public function setCompanyFiles($companyFiles) {
            $this->companyFiles = $companyFiles;
        }
        
    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  Dinamic Methods  ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//
        

        public function insert(){

            // Consulta INSERT
            $sql = "INSERT INTO companies (`name`, `status`, opportunityLevel, 
            nextAction,industry,services,
            phone,email,website,socialMedia,
            responsable,phoneResponsable,emailResponsable,extraInfoResponsable,
            extraInfoCompany,`address`,city,country,
            commentsSales1,commentsSales2,
            openingDate,lastCheckDate,closingContactDate,closingDate,nextDateForContact,nextDateForClosing,
            isInterested,salesState,isClient,
            salesmanAdder,salesmanContacter,salesmanCloser,typeOfContract,companyFiles) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Prepare la consulta
            $prep = $this->conn->prepare($sql);

            // Bind los parámetros
            $prep->bind_param("ssssssssssssssssssssssssssisiiiiss",
            $this->name,
            $this->status,
            $this->opportunityLevel,
            $this->nextAction,
            $this->industry,
            $this->services,
            $this->phone,
            $this->email,
            $this->website,
            $this->socialMedia,
            $this->responsable,
            $this->phoneResponsable,
            $this->emailResponsable,
            $this->extraInfoResponsable,
            $this->extraInfoCompany,
            $this->address,
            $this->city,
            $this->country,
            $this->commentsSales1,
            $this->commentsSales2,
            $this->openingDate,
            $this->lastCheckDate,
            $this->closingContactDate,
            $this->closingDate,
            $this->nextDateForContact,
            $this->nextDateForClosing,
            $this->isInterested,
            $this->salesState,
            $this->isClient,
            $this->salesmanAdder,
            $this->salesmanContacter,
            $this->salesmanCloser,
            $this->typeOfContract,
            $this->companyFiles);

            // Ejecutar la consulta
            try {

                if ($prep->execute()) {

                    echo json_encode(["success"=>true,"message"=>"¡Compañia agregada satisfactoriamente!"]);
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

        public function edit($Id){

            $sql = "UPDATE companies SET `name` = ?, `status` = ?, opportunityLevel = ?,
            nextAction = ?, industry = ?, services = ?, 
            phone = ?, email = ?, website = ?, socialMedia = ?,
            responsable = ?, phoneResponsable = ?, emailResponsable = ?,
            extraInfoResponsable = ?, extraInfoCompany = ?,
            `address` = ?, city = ?, country = ?,
            commentsSales1 = ?, commentsSales2 = ?,
            openingDate = ?, lastCheckDate = ?, closingDate = ?,
            nextDateForContact = ?, nextDateForClosing = ?,
            isInterested = ?, salesState = ?, isClient = ?,
            salesmanContacter = ?, salesmanCloser = ?, typeOfContract = ?
            WHERE id = ?";

            $prep = $this->conn->prepare($sql);

            $prep->bind_param("sssssssssssssssssssssssssisisssi",
                $this->name,
                $this->status,
                $this->opportunityLevel,
                $this->nextAction,
                $this->industry,
                $this->services,
                $this->phone,
                $this->email,
                $this->website,
                $this->socialMedia,
                $this->responsable,
                $this->phoneResponsable,
                $this->emailResponsable,
                $this->extraInfoResponsable,
                $this->extraInfoCompany,
                $this->address,
                $this->city,
                $this->country,
                $this->commentsSales1,
                $this->commentsSales2,
                $this->openingDate,
                $this->lastCheckDate,
                $this->closingDate,
                $this->nextDateForContact,
                $this->nextDateForClosing,
                $this->isInterested,
                $this->salesState,
                $this->isClient,
                $this->salesmanContacter,
                $this->salesmanCloser,
                $this->typeOfContract,
                $Id
            );

            try{
                if ($prep->execute()) {
                    echo json_encode(["success"=>true,"message"=>"¡Editado exitosamente!"]);
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


        public static function delete($conn, $id){
            
            // Consulta INSERT
            $sql = "delete from companies WHERE id=?";

            // Prepare la consulta
            $prep = $conn->prepare($sql);

            $prep->bind_param("i",$id);

            // Ejecutar la consulta
            try{
                if ($prep->execute()) {
                    echo json_encode(["success"=>true,"message"=>"¡Compañia borrada exitosamente!"]);
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

        public static function showData($conn){

            $sql="SELECT * FROM companies";
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

            $sql="SELECT * FROM companies";
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

        // public static function searchById($conn, $Id){

        //     $result=Company::returnData($conn);
        //     while($row=$result->fetch_assoc()){
        //         if ($row['id']==$Id){
        //         $json=json_encode($row);
        //         }       
        //     }
        //     if (empty($row)){
        //         $json=json_encode($row['empty']='empty');
        //     }
        //     echo $json;
        // }

        public static function search($conn, $field, $value){

            $sql="SELECT * FROM companies WHERE $field LIKE '%$value%'";
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


}

?>
