
<?php
//////////////////////////////////////CARGA en cache de todo el archivo HTML//////////////////////////////////////
ob_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/Proyecto_panama/public/css/PDFstyles.css">
</head>
</html>

<?php
$url= "../View/show_companies.php";
include $url;
//////////////////////////////////////GET del cache de todo el archivo HTML//////////////////////////////////////
$report=ob_get_clean();

//////////////////////////////////////DOMpdf volcado del HTML al archivo PDF//////////////////////////////////////

require_once '../../vendor/DOMpdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf= new Dompdf();

//option para poder ver imagenes:
$options= $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHTML($report);

//tipo de hoja del archivo:
$dompdf->setPaper('A4', 'landscape');

//render en pantalla:
$dompdf->render();

//render final, attachment setea si se autodescarga o no
$dompdf->stream($fila['nombre'].".pdf", array('Attachment'=> false));

?>







