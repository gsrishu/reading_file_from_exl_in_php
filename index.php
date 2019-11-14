 <?php
    include './PhpReader/index.php';  
   use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("PHP_Task.xlsx");

$worksheet = $spreadsheet->getActiveSheet();



echo '<table>' . PHP_EOL;
foreach ($worksheet->getRowIterator() as $row) {
    echo '<tr>' . PHP_EOL;
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE); 
    foreach ($cellIterator as $cell) {
		  $temp =  $cell->getValue();
		  $temp = str_replace("with", " ", $temp);
		  $temp = str_replace("With", " ", $temp);
		  $temp = str_replace("bank", " ", $temp);
		  $temp = str_replace("Bank", " ", $temp);
		  $temp = str_replace("BANK", " ", $temp);
		  $temp = str_replace("flash", " ", $temp);
		  $temp = str_replace("Flash", " ", $temp);
		  $temp = str_replace(" GB", "GB", $temp);		   
        echo '<td>' .
             $temp .
             '</td>' . PHP_EOL;
    }
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;


?>