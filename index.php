<?php
require('./FPDF/fpdf.php');
class INDEX2 extends FPDF
{
    function body($h1, $data, $download, $client)
    {
        $this->SetFont('Arial', '', 20);
        $this->Cell(10, 10, '', 0, 0);
        $this->Cell(190, 20, 'INVOICE', 0, 0, 'L');
        $this->Cell(59, 10, '', 0, 1);
        $this->Image('c:\Users\Admin\Desktop\INVOICE.png', 140, 30, 47, 30, 'PNG');
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Cell(10, 10, '', 0, 0);
        $this->SetFont('Arial', '', 10);
        $this->Cell(190, 20, $client['Address'], 0, 0, 'L');
        $this->SetY(83);
        $this->Setx(20);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(170, 10, 'BILL TO', 0, 0, 'L');
        $this->SetY(90);
        $this->Setx(20);
        $this->SetFont('Arial', '', 10);
        $this->Cell(22, 5, 'Your Client', 0, 0, 'L');
        $this->SetY(95);
        $this->Setx(20);
        $this->Cell(22, 5, '11 Beech Dr', 0, 0, 'L');
        $this->SetY(93);
        $this->Setx(140);
        $this->Cell(20, 5, 'Invoice No.:', 0, 0, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(93);
        $this->Setx(170);
        $this->Cell(20, 5, $client['Invoice_Id'], 0, 0, 'R');
        $this->SetFont('Arial', '', 10);
        $this->SetY(100);
        $this->Setx(20);
        $this->Cell(16, 5, 'Ellington', 0, 0, 'L');
        $this->SetFont('Arial', '', 10);
        $this->SetY(100);
        $this->Setx(140);
        $this->Cell(22, 5, 'Issue date.:', 0, 0, 'L');

        $this->SetFont('Arial', 'B', 10);
        $this->SetY(100);
        $this->Setx(170);
        $this->Cell(20, 5, $client['Issue'], 0, 0, 'R');

        $this->SetFont('Arial', '', 10);
        $this->SetY(108);
        $this->Setx(140);
        $this->Cell(22, 5, 'Due date.:', 0, 0, 'L');
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(108);
        $this->Setx(170);
        $this->Cell(20, 5, $client['Due'], 0, 0, 'R');
        $this->SetY(105);
        $this->Setx(20);
        $this->Cell(22, 5, 'NE 61 5EU', 0, 0, 'L');
        $this->SetY(110);
        $this->Setx(20);
        $this->Cell(27, 5, 'United Kingdom', 0, 0, 'L');



        $count = count($h1);
        // Table column and data
        $this->SetY(130);
        $this->SetX(40);
        $this->SetFont('Arial', 'B', 12);
        $width = [15, 80, 10, 10, 20];  // Ensure this matches the number of columns in $h1
        $this->SetFillColor(242, 242, 242);
        $this->SetTextColor(0, 0, 0);
        $Height = 8;

        for ($i = 0; $i < $count; $i++) {
            $this->Cell($width[$i], $Height, $h1[$i], 0, 0, 'L', true);
        }

        // foreach($h1 as $s){
        //     echo $s;
        // $this->Cell($width[$i],$Height,$s,0,0,'L',true);
        // }

        $this->Ln();
        $y = 145;
        // $y=0;
        $r = null;
        $Amt = null;
        $total = null;
        $v1 = null;
        $v2 = null;
        $header_align = 'C';
        $this->SetY(138);
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(242, 242, 242);
        $this->SetTextColor(0, 0, 0);
        $fill = false;
        foreach ($data as $row) {
            $this->Setx(40);
            $r++;
            $v1 = $row[2];
            $Amt += $row[1] * $row[2];
            $this->Cell($width[0], $Height, $r, 0, 0, 'L', $fill);
            $this->Cell($width[1], $Height, $row[0], 0, 0, 'L', $fill);
            $this->Cell($width[2], $Height, $row[1], 0, 0, 'R', $fill);
            $this->Cell($width[3], $Height, $row[2], 0, 0, 'R', $fill);
            $this->Cell($width[4], $Height, $Amt, 0, 0, 'R', $fill);
            $total += $Amt;
            // $y+=10;
            $this->Ln();
            $this->Setx(40);
            $this->Cell(array_sum($width), 0, '', '0');
            $fill = !$fill;
        }
        $y += count($data) * $Height;
        $this->SetFillColor(198, 144, 53);
        $fill = TRUE;
        $this->SetTextColor(242, 242, 242);
        $this->SetY($y);
        $this->Setx(95);
        $this->Cell(80, 7, 'Total Amount', 0, 0, '', $fill);
        $this->Setx(163);
        $this->Cell($width[3], 7, $total, 0, 0, 'R', $fill);
        if ($download) {
            # code...
            $filename = "nutz.pdf";
            $this->Output('D', $filename, true);
        } else {
            $this->Output();
        }
    }
}

$cols = ["S/No", "Product Name", "Qty", "Rate", "Amount"];
$client = [
    "Invoice_Id" => "042037",
    "Issue" => "20/07/2023",
    "Due" => "03/08/2023",
    "Address" => "Graphic Genius ,36 Terrick Rd,Ellington PE18 2NT, Unite Kingdom",
];
$data = [
    ["Books", "3", 25],
    ["Books", "3", 21],
    ["Books", "3", 33],
    ["Books", "3", 35],
    ["Books", "3", 28],
    ["Books", "3", 28],
    ["Books", "3", 28],
    ["Books", "3", 28],
    ["Books", "3", 28],
    ["Books", "3", 30]
];
$download = 0;

class Make_pdf{
function pdf($cols, $data, $download, $client)
{
    $h1 = $cols;
    $pdf = new INDEX2("P", "mm", "A4");
    $pdf->AddPage();
    $pdf->body($h1, $data, $download, $client);
}
}

$d = new Make_pdf();
$d->pdf($cols, $data, $download, $client);