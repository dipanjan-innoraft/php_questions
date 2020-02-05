<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();

$inputFileType = 'Xlsx';

// Give the location of the excel file to be read
$inputFileName = './input_file.xlsx';

/**  Create a new Reader of the type defined in $inputFileType  **/
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell data  **/
$reader->setReadDataOnly(true);

$worksheetData = $reader->listWorksheetInfo($inputFileName);

foreach ($worksheetData as $worksheet) {
    $sheetName = $worksheet['worksheetName'];

    echo "<h4>$sheetName</h4>";
    /**  Load $inputFileName to a Spreadsheet Object  **/
    $reader->setLoadSheetsOnly($sheetName);
    $spreadsheet = $reader->load($inputFileName);

    $worksheet = $spreadsheet->getActiveSheet();
?>
<table>
<?php
    foreach($worksheet->toArray() as $row) {
        echo('<tr>');
        echo('<td>');
        echo(implode('</td><td>', $row));
        echo('</td>');
        echo('</tr>');
    }
?>
</table>
<style>
    table, td, th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 15px;
    }
    tbody > :first-child {
        font-weight: bold;
        color: red;
    }
</style>
<?php
}
