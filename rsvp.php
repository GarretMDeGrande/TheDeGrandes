<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the RSVP data from the form
    $name = $_POST["name"];

    // Load or create the Excel file
    $excelFile = "rsvp.xlsx";
    $spreadsheet = new Spreadsheet();
    if (file_exists($excelFile)) {
        $spreadsheet = IOFactory::load($excelFile);
    } else {
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', 'RSVP Names');
    }

    // Add RSVP name to the Excel file
    $sheet = $spreadsheet->getActiveSheet();
    $lastRow = $sheet->getHighestRow() + 1;
    $sheet->setCellValue("A$lastRow", $name);

    // Save the Excel file
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save($excelFile);
}

session_start(); // Start a session to store the entered name

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rsvp"])) {
    // Retrieve the name from the form
    $name = $_POST["name"];

    // Store the name in a session variable
    $_SESSION["rsvp_name"] = $name;
}

// Redirect to a different page where you want to display the name
header("Location: popup.php");
?>