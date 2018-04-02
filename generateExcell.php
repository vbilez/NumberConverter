<?php

require 'vendor/autoload.php';
require 'numberconverter_way2.php';
use NumberClases\NumberConv as Nc;
$nc=new Nc();
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$i=1;
while ($i <= 1000) {
	$sheet->setCellValue('A'.$i, $i);	
	$sheet->setCellValue('B'.$i, $nc->num_to_words($i));
	$i++;
}
$sheet->getColumnDimension('B')->setAutoSize(true);


$writer = new Xlsx($spreadsheet);
$writer->save('Output.xlsx');