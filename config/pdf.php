<?php
require 'vendor/autoload.php'; // If you are using Composer

use TCPDF as PDF;

// Create a new PDF document
$pdf = new PDF();

// Add a page to the PDF
$pdf->AddPage();

// Set font
$pdf->SetFont('times', 'B', 16);

// Add a title
$pdf->Cell(0, 10, 'Property Data', 0, 1, 'C');

// Fetch data from MySQL (replace with your database connection and query)
// 

include 'connect.php';

$sql = "SELECT name, phone_number FROM landlords";
$result = $conn->query($sql);

// Display data in the PDF
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(0, 10, $row['name'] . ': ' . $row['phone_number'] . ' units', 0, 1);
    }
} else {
    $pdf->Cell(0, 10, 'No data available', 0, 1);
}

// Output the PDF to the browser
$pdf->Output('landlord_data.pdf', 'I');

?>