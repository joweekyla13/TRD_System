<?php
require_once('TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
    public $employee_number;
    public $employee_firstname;
    public $employee_lastname;
    public $employee_middlename;
    public $employee_position;
    public $employee_date_hired;
    public $employee_section;

    // Load table data from database
    public function LoadData() {
        
        // Get the document number from the POST data
        $employee_number = $_POST['employee_number'];
        $employee_firstname = $_POST['employee_firstname'];
        $employee_lastname = $_POST['employee_lastname'];
        $employee_middlename = $_POST['employee_middlename'];
        $employee_position = $_POST['employee_position'];
        $employee_date_hired = $_POST['employee_date_hired'];
        $employee_section = $_POST['employee_section']; 

    }

    // 1/30/2025
    public function Header() {
        // Only display header on the first page
        if ($this->getPage() == 1) {

            // Set the X and Y position inside the cell
            $this->SetXY(15, 10);  // Adjust the position where the image will go inside the cell

            // Place the image inside the cell
            // $this->Image('./images/pricon_header_logo.png', $this->GetX() + 2, $this->GetY() + 0, 176, 30, '', '', '', false, 300, '', false, false, 0, false, false, false);

            // Then create the cell
            $this->SetFont('helvetica', 'B', 25);
            $this->Cell(267, 20, ' Visual Inspection Skill Matrix', 1, 1, 'L');  // Cell to hold the image (its borders will be drawn)
            
            $this->SetFont('helvetica', 'B', 13);
            $this->Cell(13, 10, 'No', 1, 0, 'C');
            $this->Cell(50, 10, 'NAME', 1, 0, 'C');
            $this->Cell(38, 10, 'E. N.', 1, 0, 'C');
            $this->Cell(36, 10, 'DATE HIRED', 1, 0, 'C');
            $this->Cell(26, 10, 'BGA', 1, 0, 'C');
            $this->Cell(26, 10, 'LGA', 1, 0, 'C');
            $this->Cell(26, 10, 'BGA-FP', 1, 0, 'C');
            $this->Cell(26, 10, 'QFP', 1, 0, 'C');
            $this->Cell(26, 10, 'TSOP', 1, 1, 'C');
            
            $this->SetFont('helvetica', '', 11);
            $this->Cell(13, 25, '1', 1, 0, 'C');
            $this->Cell(50, 25, 'Abucejo, Ella M.', 1, 0, 'C');
            $this->Cell(38, 25, 'F-PMI-1424', 1, 0, 'C');
            $this->Cell(36, 25, '10/05/2022', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 1, 'C');

            $imagePath = './images/level4.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 154.5, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 181, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level2.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 206, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level1.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 232, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level4.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 258.5, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $this->Cell(13, 25, '2', 1, 0, 'C');
            $this->Cell(50, 25, 'Abrigo, Anthony S.', 1, 0, 'C');
            $this->Cell(38, 25, 'F-PMI-1990', 1, 0, 'C');
            $this->Cell(36, 25, '03/02/2024', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 1, 'C');

            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 154.5, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level4.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 181, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 206, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 232, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level1.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 258.5, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $this->Cell(13, 25, '3', 1, 0, 'C');
            $this->Cell(50, 25, 'Aclan, Ronel M.', 1, 0, 'C');
            $this->Cell(38, 25, 'F-PMI-2071', 1, 0, 'C');
            $this->Cell(36, 25, '14/02/2024', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 1, 'C');

            $imagePath = './images/level4.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 154.5, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 181, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level2.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 206, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level2.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 232, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level2.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 258.5, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $this->Cell(13, 25, '4', 1, 0, 'C');
            $this->Cell(50, 25, 'Amican, Norvin B.', 1, 0, 'C');
            $this->Cell(38, 25, 'PR-24-97694', 1, 0, 'C');
            $this->Cell(36, 25, '14/02/2024', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 0, 'C');
            $this->Cell(26, 25, '', 1, 1, 'C');

            $imagePath = './images/level2.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 154.5, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 181, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 206, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 232, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level4.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 258.5, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(23, 25, ' Legend:', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(23, 25, '', 0, 0, 'L');
            $this->Cell(38, 10, ' Level 1 - ', 0, 0, 'C');

            $this->Cell(23, 25, '', 0, 0, 'L');
            $this->Cell(38, 10, ' Level 2 - ', 0, 0, 'C');

            $this->Cell(23, 25, '', 0, 0, 'L');
            $this->Cell(38, 10, ' Level 3 - ', 0, 0, 'C');

            $this->Cell(23, 25, '', 0, 0, 'L');
            $this->Cell(38, 10, ' Level 4 -', 0, 1, 'C');

            $y = $this->GetY();

            $this->SetY($y);
            $this->Cell(46, 15, '', 0, 0, 'L');

            $x = $this->GetX();
            $y = $this->GetY();

            $this->SetFont('helvetica', '', 11);
            $this->MultiCell(38, 15, 'Awareness on the Process', 0, 'C', 0);

            $this->SetXY($x + 61, $y);

            $this->MultiCell(38, 15, 'Knowledgeable on the process', 0, 'C', 0);

            $this->SetXY($x + 122, $y);

            $this->MultiCell(38, 15, 'Can perform with less supervision', 0, 'C', 0);

            $this->SetXY($x + 183, $y);

            $this->MultiCell(38, 15, ' Can mentor co employee', 0, 'C', 0);

            $imagePath = './images/level1.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 40, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level2.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 100, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level3.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 160, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $imagePath = './images/level4.png';
            $imageWidth = 20;
            $imageHeight = 20;
            $this->Image($imagePath, 228, $this->GetY() - 22, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
            
            $this->Rect(15, $y - 10, 267, 25);
            
        }
    }
    
    
}

// Create new PDF document with landscape orientation
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TRD System');
$pdf->SetTitle('Employee\'s Skill Matrix');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Set default header data (empty logo, title changed)
$pdf->SetHeaderData('', 0, '', '');

// Set margins and auto-page break
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->LoadData();
$pdf->AddPage();

//Output PDF
$pdf->Output('skill_card_' . $_POST['employee_number'] . '.pdf', 'I');
?>