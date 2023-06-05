//START OF SENTENCE:

if($_GET['data']){

//////////////////////////////////////CARGA en cache de todo el archivo HTML//////////////////////////////////////
ob_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/Proyecto_panama/View/PDFstyles.css">
</head>
</html>

<?php

$data=$_GET['data'];
$url= '../View/show_companies.php?data='.$data;
include $url;
//////////////////////////////////////GET del cache de todo el archivo HTML//////////////////////////////////////
$report=ob_get_clean();
}else {