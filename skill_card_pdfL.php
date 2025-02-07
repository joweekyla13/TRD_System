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
            $this->Image('./images/pricon_header_logo.png', $this->GetX() + 2, $this->GetY() + 0, 176, 30, '', '', '', false, 300, '', false, false, 0, false, false, false);

            // Then create the cell
            $this->Cell(180, 30, '', 1, 1, 'C');  // Cell to hold the image (its borders will be drawn)
            
            // Title
            $this->SetFont('helvetica', '', 20);
            $this->Cell(180, 20, 'PERSONNEL SKILL CARD', 1, 1, 'C');

            $this->SetFillColor(0, 255, 255);
            $this->SetFont('helvetica', '', 20);
            $this->Cell(180, 20, 'TEST SOLUTION', 1, 1, 'C', true);

            // level beside name
            $imagePath = './images/level4.png';
            $imageWidth = 47;
            $imageHeight = 30;
            $this->Image($imagePath, 103, $this->GetY() + 10, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $this->Rect(103, $this->GetY(), 47, 50);

            // Image beside level
            $imagePath = './images/images.png';
            $imageWidth = 40;
            $imageHeight = 30;
            $this->Image($imagePath, 152.5, $this->GetY() + 10, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $this->Rect(150, $this->GetY(), 45, 50);

            $this->SetFont('helvetica', '', 13);
            $this->Cell(35, 10, '  Name ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 13);
            $this->SetFont('helvetica', 'B', 13);
            $this->Cell(53, 10, 'NOMIL ARENA', 1, 1, 'C');

            $this->SetFont('helvetica', '', 13);
            $this->Cell(35, 10, '  Position ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 13);
            $this->SetFont('helvetica', '', 13);
            $this->Cell(53, 10, 'OPERATOR', 1, 1, 'C');

            $this->SetFont('helvetica', '', 13);
            $this->Cell(35, 10, '  Date Hired ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 13);
            $this->SetFont('helvetica', '', 13);
            $this->Cell(53, 10, 'JANUARY 20, 2022', 1, 1, 'C');

            $this->SetFont('helvetica', '', 13);
            $this->Cell(35, 10, '  Section ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 13);
            $this->SetFont('helvetica', '', 13);
            $this->Cell(53, 10, 'PRODUCTION', 1, 1, 'C');

            $this->SetFont('helvetica', '', 13);
            $this->Cell(35, 10, '  Date Certified ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 13);
            $this->SetFont('helvetica', '', 13);
            $this->Cell(53, 10, 'OCTOBER 2024', 1, 1, 'C');

            $this->SetFont('helvetica', '', 13);
            $this->Cell(35, 10, '  Validity Period ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 13);
            $this->SetFont('helvetica', '', 13);
            $this->Cell(53, 10, 'OCTOBER 2025', 1, 0, 'C');

            $this->SetFont('helvetica', '', 13);
            $this->Cell(47, 10, 'TOTAL RATINGS:', 1, 0, 'C');
            $this->SetFont('helvetica', '', 13);
            $this->Cell(45, 10, '14 PTS', 1, 1, 'C');
            
            $this->SetFont('helvetica', 'B', 25);
            $this->Cell(85, 30, 'BGA-FP ', 1, 0, 'C');

            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(95, 10, 'STATION ASSIGNED ', 1, 1, 'C');

            $this->SetFont('helvetica', '', 10);
            $this->Cell(85, 20, '', 0, 0, 'C');

            // Save the X position for the first MultiCell
            $x = $this->GetX();
            $y = $this->GetY(); // Get current Y position

            $this->SetCellPadding(3);
            $this->MultiCell(24, 20, 'ASSEMBLY PROCESS', 1, 'C');
            $this->SetXY($x + 24, $y); // Move cursor to the right

            $this->MultiCell(24, 20, 'VISUAL INSPECTION', 1, 'C');
            $this->SetXY($x + 48, $y); // Move cursor further right

            $this->MultiCell(23, 20, 'PARTS PREP.', 1, 'C');
            $this->SetXY($x + 71, $y); // Move cursor further right

            $this->MultiCell(24, 20, 'MACHINE OPERATIONS', 1, 'C');

            $this->SetCellPadding(0);

            $imagePath = './images/pricon_skill_card_image.png';
            $imageWidth = 30;
            $imageHeight = 30;

            // Save X and Y position for alignment
            $x = $this->GetX();
            $y = $this->GetY();

            // Create a bordered cell for the image and text (80 height)
            $this->Cell(40, 90, '', 1, 0, 'C'); // Empty cell for structure

            // Manually place the image inside the cell
            $this->Image($imagePath, $x + 5, $y + 5, $imageWidth, $imageHeight);

            // Move cursor to the next position inside the 80-height cell
            $this->SetXY($x, $y + 32); 

            // Add Level & Date info inside the same 80-height cell
            $this->SetFont('helvetica', 'B', 13);
            $this->MultiCell(40, 20, "\n\nLevel 1\n\nDate Certified:\nDec-24\n\nValid Until:\nJun-25", 0, 'C');

            // Move cursor to the next section
            $this->SetXY($x + 40, $y);

            $x = $this->GetX();
            $y = $this->GetY();

            // AUTO INSERT TYPE beside the 80-height cell
            $this->MultiCell(45, 45, "\n\nAUTO \nINSERT TYPE", 1, 'C', 0);

            $this->SetXY($x + 45, $y);

            // $this->SetFillColor(0, 255, 255);
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(11, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 1, 'C', true);

            $this->Cell(85, 20, '', 0, 0, 'C');
            
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(11, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 0, 'C', true);
            $this->Cell(12, 22.5, '', 1, 1, 'C', true);

            $this->Cell(40, 80, '', 0, 0, 'C');

            $x = $this->GetX();
            $y = $this->GetY();

            $this->MultiCell(45, 45, "\n\nMANUAL INSERT TYPE", 1, 'C', 0);

            $this->SetXY($x + 45, $y);

            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(11, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 1, 'C');

            $this->Cell(85, 20, '', 0, 0, 'C');
            
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(11, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 0, 'C');
            $this->Cell(12, 22.5, '', 1, 1, 'C');

            // BACK PAGE
            $this->AddPage();

            $this->SetXY(15, 10);

            // Place the image inside the cell
            $this->Image('./images/pricon_logo_2.png', $this->GetX() + 2, $this->GetY() + 5, 75, 20, '', '', '', false, 300, '', false, false, 0, false, false, false);

            // Then create the cell
            $this->Cell(78, 30, '', 1, 0, 'C');
            $this->SetFont('helvetica', 'B', 15);
            $this->MultiCell(103, 30, "\nCOMPETENCY SKILLS \nASSESSMENT", 1, 'C');
            
            $this->SetFont('helvetica', '', 13);
            $this->MultiCell(51, 20, "\nFUNCTIONAL COMPETENCIES", 1, 0, true, 0);
            $this->MultiCell(27, 20, "\nTARGET RATING", 1, 'C', true, 0);

            $this->Cell(103, 10, "REFERENCE", 1, 1, 'C');
            $this->Cell(78, 10, "", 0, 0, 'C');
            $this->Cell(103, 10, "RATINGS", 1, 1, 'C', true);

            $x = $this->GetX();
            $y = $this->GetY();

            $this->MultiCell(51, 40, "\n\nASSEMBLY \nPROCESS", 1, 'C', 0);

            $this->SetXY($x + 51, $y);

            $this->MultiCell(27, 40, "\n\n4", 1, 'C', 0);

            $this->SetXY($x + 78, $y);
            $this->Cell(25.5, 10, '1', 0, 0, 'C');
            $this->Cell(26, 10, '2', 0, 0, 'C');
            $this->Cell(26, 10, '3', 0, 0, 'C');
            $this->Cell(25.5, 10, '4', 0, 1, 'C');

            $this->Cell(81, 20, '', 0, 0, 'C');

            $this->Cell(10, 10, '', 1, 0, 'C', true);
            $this->Cell(10, 10, '', 1, 0, 'C');
            $this->Cell(5.5, 10, '', 0, 0, 'C');

            $this->Rect(93, $y, 26, 40);
            
            $this->Cell(10, 10, '', 1, 0, 'C', true);
            $this->Cell(10, 10, '', 1, 0, 'C', true);
            $this->Cell(6, 10, '', 0, 0, 'C');

            $this->Rect(119, $y, 26, 40);
            
            $this->Cell(10, 10, '', 1, 0, 'C', true);
            $this->Cell(10, 10, '', 1, 0, 'C', true);
            $this->Cell(6, 10, '', 0, 0, 'C');

            $this->Rect(145, $y, 25, 40);

            $this->Cell(10, 10, '', 1, 0, 'C', true);
            $this->Cell(10, 10, '', 1, 1, 'C', true);

            $this->Rect(170, $y, 26, 40);

            $this->Cell(81, 20, '', 0, 0, 'C');

            $this->Cell(10, 10, '', 1, 0, 'C');
            $this->Cell(10, 10, '', 1, 0, 'C');
            $this->Cell(5.5, 10, '', 0, 0, 'C');
            
            $this->Cell(10, 10, '', 1, 0, 'C');
            $this->Cell(10, 10, '', 1, 0, 'C');
            $this->Cell(6, 10, '', 0, 0, 'C');
            
            $this->Cell(10, 10, '', 1, 0, 'C');
            $this->Cell(10, 10, '', 1, 0, 'C', true);
            $this->Cell(6, 10, '', 0, 0, 'C');
            
            $this->Cell(10, 10, '', 1, 0, 'C', true);
            $this->Cell(10, 10, '', 1, 1, 'C', true);

            $this->Cell(181, 10, '', 0, 1, 'C');

            $x = $this->GetX();
            $y = $this->GetY();

            $this->MultiCell(51, 40, "\n\nVISUAL \nINSPECTION", 1, 'C', 0);

            $this->SetXY($x + 51, $y);

            $this->MultiCell(27, 40, "\n\n4", 1, 'C', 0);

            $this->SetY($y);

            $this->SetXY($x + 78, $y);
            
            $this->SetCellPadding(3);

            $this->MultiCell(26, 60, "\n\nCertified (at least 1 series / product)", 1, 'C', 0);

            $this->SetXY($x + 104, $y);
            $this->MultiCell(26, 60, "\n\nCertified (at least 2~3 series / product)", 1, 'C', 0);

            $this->SetXY($x + 130, $y);
            $this->MultiCell(25, 60, "\n\nCertified (at least 4~6 series / product)", 1, 'C', 0);

            $this->SetXY($x + 155, $y);
            $this->MultiCell(26, 60, "\n\nCertified (more than 6 series / product)", 1, 'C', 0);

            $this->SetY($y + 40);
            $x = $this->GetX();
            $y = $this->GetY();

            $this->MultiCell(51, 40, "\n\nPARTS PREPARATION \n(OFFLINE ACTIVITY)", 1, 'C', 0);

            $this->SetXY($x + 51, $y);

            $this->MultiCell(27, 40, "\n\n4", 1, 'C', 0);

            $this->SetXY($x + 78, $y + 20);

            $this->Cell(103, 20, 'PERFORMANCE LEVEL (OVER ALL)', 1, 1, 'C', true);
            
            $x = $this->GetX();
            $y = $this->GetY();

            $this->MultiCell(51, 40, "\n\nMACHINE \nOPERATION", 1, 'C', 0);

            $this->SetXY($x + 51, $y);

            $this->MultiCell(27, 40, "\n\n4", 1, 'C', 0);
            
            $this->SetCellPadding(0);

            $this->SetXY($x + 78, $y);
            $this->Cell(25.5, 10, 'Level 1', 0, 0, 'C');
            $this->Cell(26, 10, 'Level 2', 0, 0, 'C');
            $this->Cell(26, 10, 'Level 3', 0, 0, 'C');
            $this->Cell(25.5, 10, 'Level 4', 0, 1, 'C');

            $this->Cell(181, 20, '', 0, 1, 'C');
            
            $this->Cell(78, 20, '', 0, 0, 'C');
            
            $this->Cell(25.5, 10, '1~8', 0, 0, 'C');
            $this->Cell(26, 10, '9~16', 0, 0, 'C');
            $this->Cell(26, 10, '17~24', 0, 0, 'C');
            $this->Cell(25.5, 10, '25~32', 0, 1, 'C');

            $imagePath = './images/level1_violet.png';
            $imageWidth = 15;
            $imageHeight = 15;
            $this->Image($imagePath, 98, $this->GetY() - 30, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $this->Rect(93, $y, 26, 40);

            $imagePath = './images/level2_yellow.png';
            $imageWidth = 15;
            $imageHeight = 15;
            $this->Image($imagePath, 123, $this->GetY() - 30, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $this->Rect(119, $y, 26, 40);

            $imagePath = './images/level3_blue.png';
            $imageWidth = 15;
            $imageHeight = 15;
            $this->Image($imagePath, 151, $this->GetY() - 30, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $this->Rect(145, $y, 25, 40);

            $imagePath = './images/level4_green.png';
            $imageWidth = 15;
            $imageHeight = 15;
            $this->Image($imagePath, 177, $this->GetY() - 30, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $this->Rect(170, $y, 26, 40);

            $this->Cell(181, 10, 'APPROVED BY:', 1, 1, 'C', true);
            
            $this->Cell(181, 10, '', 0, 1, 'C');
            $this->Cell(181, 10, '', 0, 1, 'C');
            $this->Cell(90.5, 10, 'LQC Sr. Manager', 0, 0, 'C');
            $this->Cell(90.5, 10, 'QMD Gen. Manager', 0, 0, 'C');

            $this->Rect(15, $y + 40, 181, 40);
        }
    }
    
    
}

// Create new PDF document with landscape orientation
$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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