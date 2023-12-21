<?php
require '../vendor/autoload.php'; // If you are using Composer

// Include the PhpSpreadsheet library
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include 'connect.php';


// Create a new spreadsheet
$spreadsheet = new Spreadsheet();

// Set active sheet
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();

// Add a title
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Phone_number');
$sheet->setCellValue('D1', 'Email');

// Fetch data from MySQL
// $servername = "localhost";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_database";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
include 'connect.php';

$sql = "SELECT id, name, phone_number, email FROM landlords";
$result = $con->query($sql);

// Display data in the spreadsheet
$row = 4;
if ($result->num_rows > 0) {
    while ($row_data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $row_data['id']);
        $sheet->setCellValue('B' . $row, $row_data['name']);
        $sheet->setCellValue('C' . $row, $row_data['phone_number']);
        $sheet->setCellValue('D' . $row, $row_data['email']);
        $row++;
    }
} else {
    $sheet->setCellValue('A2', 'No data available');
}

// Save the spreadsheet to a file
$writer = new Xlsx($spreadsheet);
$writer->save('landlords.xlsx');

?>