<?php

use PhpOffice\PhpSpreadsheet\SpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



$sheet = new SpreadSheet();

$sheet->getProperties()->setCreator("usuario")->setTitle("Compañias");

$sheet->setActiveSheetIndex(0);
$activeSheet = $sheet->getActiveSheet();

$activeSheet->setCellValue('A1','holu')->setCellValue('B1','alo');

$writer = new Xlsx($sheet);
$writer->save('Compañias.xlsx');


?>