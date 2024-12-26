<?php
require('./FPDF/fpdf.php');
$pdf = new FPDF('P', 'mm', "A4");
$pdf->AddPage();
$pdf->SetFont('Arial', '', 20);
$pdf->Cell(10, 10, '', 0, 0);
$pdf->Cell(190, 20, 'INVOICE', 0, 0, 'L');
$pdf->Cell(59, 10, '', 0, 1);
$pdf->Image('c:\Users\Admin\Desktop\INVOICE.png', 140, 30, 47, 30, 'PNG');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10, 10, '', 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 20, 'Graphic Genius ,36 Terrick Rd,Ellington PE18 2NT, Unite Kingdom', 0, 0, 'L');
$pdf->SetY(83);
$pdf->Setx(20);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(170, 10, 'BILL TO', 0, 0, 'L');
$pdf->SetY(90);
$pdf->Setx(20);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(22, 5, 'Your Client', 0, 0, 'L');
$pdf->SetY(95);
$pdf->Setx(20);
$pdf->Cell(22, 5, '11 Beech Dr', 0, 0, 'L');
$pdf->SetY(93);
$pdf->Setx(140);
$pdf->Cell(20, 5, 'Invoice No.:', 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY(93);
$pdf->Setx(170);
$pdf->Cell(20, 5, '042037', 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->SetY(100);
$pdf->Setx(20);
$pdf->Cell(16, 5, 'Ellington', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->SetY(100);
$pdf->Setx(140);
$pdf->Cell(22, 5, 'Issue date.:', 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY(100);
$pdf->Setx(170);
$pdf->Cell(20, 5, '20/07/2023', 0, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->SetY(108);
$pdf->Setx(140);
$pdf->Cell(22, 5, 'Due date.:', 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY(108);
$pdf->Setx(170);
$pdf->Cell(20, 5, '03/08/2023', 0, 0, 'R');

$pdf->SetY(105);
$pdf->Setx(20);
$pdf->Cell(22, 5, 'NE 61 5EU', 0, 0, 'L');
$pdf->SetY(110);
$pdf->Setx(20);
$pdf->Cell(27, 5, 'United Kingdom', 0, 0, 'L');

//Table Header
$header=["no","Product Name","Qty","Amount"];
//Table Rows
$data=[
  ["Books","3",25],
  ["Books","3",21],
  ["Books","3",33],
  ["Books","3",35],
  ["Books","3",28],
  ["Books","3",28],
  ["Books","3",28],
  ["Books","3",28],
  ["Books","3",28],
  ["Books","3",30],
];

//table colum and data
$pdf->SetY(130);
$pdf->Setx(20);
$pdf->SetFont('Arial','B',12);
$width=[10,80,10,30];
$Height=[7];
for($i=0;$i<count($header);$i++){
  $pdf->Cell($width[$i],$Height[0],$header[$i],1);
}

$pdf->Ln();
$y=145;
$r=null;
$header_align='C';
$pdf->SetY(137);
$pdf->SetFont('Arial','',12);
$total=null;
      foreach($data as $row){
$pdf->Setx(20);
$r++;
        $pdf->Cell($width[0],$Height[0],$r,1,0);
        $pdf->Cell($width[1],$Height[0],$row[0],1,0);
        $pdf->Cell($width[2],$Height[0],$row[1],1,0);
        $pdf->Cell($width[3],$Height[0],$row[2],1,0);
        $total+=$row[2];
        $y+=10;
        $pdf->Ln();
      }
$pdf->SetY($y);
$pdf->Setx(80);
$pdf->Cell($width[1],7,'Total Amount',1,0);
$pdf->Cell($width[3],7,$total,1,0);
$pdf->Output();