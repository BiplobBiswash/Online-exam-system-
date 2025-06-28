<?php
require('fpdf/fpdf.php');
include 'db.php';
session_start();

$username = $_SESSION['username'];
$query = $conn->query("SELECT * FROM results WHERE username='$username' ORDER BY submitted_at DESC LIMIT 1");
$data = $query->fetch_assoc();

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,'Exam Result Report',0,1,'C');
        $this->Ln(10);
    }
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,"Student: " . $username,0,1);
$pdf->Cell(0,10,"Score: " . $data['score'] . " out of " . $data['total'],0,1);
$pdf->Cell(0,10,"Date: " . $data['submitted_at'],0,1);
$pdf->Output();
?>