<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

$spreadsheet = new Spreadsheet();

// ADD DATA TO SPECIFIC CELL
$spreadsheet->getActiveSheet()->setCellValue('A1', 'Hello World !');

// Create Excel file and sve in your directory
$writer = new Xlsx($spreadsheet);
$writer->save('export.xlsx');
echo "File Exported Successfully";

// Add data to file from Array
$arrayData = [
    ['Aneh', 'Amit', 'Ajay', 'Sanjeev'],
    ['Q1',   12,   15,   21],
    ['Q2',   56,   73,   86],
];
$spreadsheet->getActiveSheet()
    ->fromArray(
        $arrayData,  // The data to set
        NULL,        // Array values with this value will not be set
        'A1'         // Top left coordinate of the worksheet range where
    );

// Create Excel file and sve in your directory
$writer = new Xlsx($spreadsheet);
$writer->save('array_export.xlsx');
echo "\nArray Exported Successfully";
