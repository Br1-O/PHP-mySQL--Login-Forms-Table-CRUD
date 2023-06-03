<?php

include 'class_Company.php';

if($_GET){

    switch ($_GET['filtro-campo']) {
        case 'nombre':
            $results= Company::searchByName($_GET['valor']);
            $query=http_build_query(array('data'=>$results));
            header("Location: ../View/show_companies.php?$query");
            break;

        case 'nombre':
                # code...
            break;
        
        case 'nombre':
                    # code...
            break;
        
        case 'nombre':
                        # code...
            break;
        
        case 'nombre':
                            # code...
            break;
        
        case 'nombre':
                                # code...
            break;
                            
        
        default:
            # code...
            break;
    }


}


?>