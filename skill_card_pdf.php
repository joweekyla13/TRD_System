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

    // Custom header (JOWEE FIRST GAWA)
    // public function Header() {
    //     // Only display header on the first page
    //     if ($this->getPage() == 1) {

    //         $this->Image('./images/pricon_header_logo.png', 10, 10, 190, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
            
    //         $this->Ln(20);

    //         $this->Line(10, $this->GetY(), 200, $this->GetY());
            
    //         // Title
    //         $this->SetFont('helvetica', '', 15);
    //         $this->Cell(0, 10, 'PERSONNEL SKILL CARD', 0, 1, 'C'); // 'C' for center alignment

    //         $this->Line(10, $this->GetY(), 200, $this->GetY());

    //         $this->SetFont('helvetica', '', 15);
    //         $this->Cell(0, 10, 'TEST SOLUTION', 0, 1, 'C'); // 'C' for center alignment

    //         $this->Line(10, $this->GetY(), 200, $this->GetY());
    
    //         $this->Ln(5);

    //         // level beside name
    //         $imagePath = './images/level4.png'; // Change to your actual image path
    //         $imageWidth = 50;  // Set image width
    //         $imageHeight = 40; // Set image height (adjustable based on Validity Period height)
    //         $this->Image($imagePath, 100, $this->GetY(), $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

    //         // Image beside level
    //         $imagePath = './images/images.png'; // Change to your actual image path
    //         $imageWidth = 50;  // Set image width
    //         $imageHeight = 40; // Set image height (adjustable based on Validity Period height)
    //         $this->Image($imagePath, 150, $this->GetY(), $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

    //         // $this->SetFont('helvetica', 'B', 11);
    //         // $this->Cell(50, 3, 'Employee Number ', 0, 0, 'L');
    //         // $this->SetFont('helvetica', 'B', 11);
    //         // $this->Cell(15, 3, ':', 0, 0, 'L');
    //         // $this->SetFont('helvetica', 'B', 11);
    //         // $this->Cell(75, 3, $this->employee_number, 0, 1, 'L');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(30, 3, 'Name ', 0, 0, 'L');
    //         $this->SetFont('helvetica', 'B', 11);
    //         $this->Cell(15, 3, ':', 0, 0, 'L');
    //         $this->SetFont('helvetica', 'B', 11);
    //         // $this->Cell(75, 3, $this->employee_firstname . ' ' . $this->employee_middlename . ' ' . $this->employee_lastname, 0, 1, 'L');
    //         $this->Cell(75, 3, 'NOMIL ARENA', 0, 1, 'L');

    //         $this->Ln(3);

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(30, 3, 'Position ', 0, 0, 'L');
    //         $this->SetFont('helvetica', 'B', 11);
    //         $this->Cell(15, 3, ':', 0, 0, 'L');
    //         $this->SetFont('helvetica', '', 11);
    //         // $this->Cell(75, 3, $this->employee_position, 0, 1, 'L');
    //         $this->Cell(75, 3, 'OPERATOR', 0, 1, 'L');

    //         $this->Ln(3);

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(30, 3, 'Date Hired ', 0, 0, 'L');
    //         $this->SetFont('helvetica', 'B', 11);
    //         $this->Cell(15, 3, ':', 0, 0, 'L');
    //         $this->SetFont('helvetica', '', 11);
    //         // $this->Cell(75, 3, $this->employee_date_hired, 0, 1, 'L');
    //         $this->Cell(75, 3, 'JANUARY 20, 2022', 0, 1, 'L');

    //         $this->Ln(3);

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(30, 3, 'Section ', 0, 0, 'L');
    //         $this->SetFont('helvetica', 'B', 11);
    //         $this->Cell(15, 3, ':', 0, 0, 'L');
    //         $this->SetFont('helvetica', '', 11);
    //         // $this->Cell(75, 3, $this->employee_section, 0, 1, 'L');
    //         $this->Cell(75, 3, 'PRODUCTION', 0, 1, 'L');

    //         $this->Ln(3);

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(30, 3, 'Date Certified ', 0, 0, 'L');
    //         $this->SetFont('helvetica', 'B', 11);
    //         $this->Cell(15, 3, ':', 0, 0, 'L');
    //         $this->SetFont('helvetica', '', 11);
    //         // $this->Cell(75, 3, $this->employee_section, 0, 1, 'L');
    //         $this->Cell(75, 3, 'OCTOBER 2024', 0, 1, 'L');

    //         $this->Ln(3);

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(30, 3, 'Validity Period ', 0, 0, 'L');
    //         $this->SetFont('helvetica', 'B', 11);
    //         $this->Cell(15, 3, ':', 0, 0, 'L');
    //         $this->SetFont('helvetica', '', 11);
    //         // $this->Cell(75, 3, $this->employee_section, 0, 1, 'L');
    //         $this->Cell(50, 3, 'OCTOBER 2025', 0, 0, 'L');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(58, 3, 'TOTAL RATINGS ', 0, 0, 'L');
    //         $this->SetFont('helvetica', '', 11);
    //         // $this->Cell(75, 3, $this->employee_section, 0, 1, 'L');
    //         $this->Cell(75, 3, '14 PTS', 0, 1, 'L');

    //         $this->Ln(5);

    //         $this->Line(10, $this->GetY(), 200, $this->GetY());

    //         $this->Ln(5);

    //         $this->SetFont('helvetica', 'B', 11);
    //         $this->Cell(155, 3, 'STATION ASSIGNED ', 0, 1, 'R');

    //         $this->Ln(5);
            
    //         $this->SetFont('helvetica', 'B', 25);
    //         $this->Cell(50, 3, 'BGA-FP ', 0, 0, 'R');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(59, 3, 'ASSEMBLY ', 0, 0, 'R');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(23, 3, 'VISUAL ', 0, 0, 'R');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(23, 3, 'PARTS ', 0, 0, 'R');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(25, 3, 'MACHINE ', 0, 1, 'R');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(108, 3, 'PROCESS ', 0, 0, 'R');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(29, 3, 'INSPECTION ', 0, 0, 'R');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(19, 3, 'PREP. ', 0, 0, 'R');

    //         $this->SetFont('helvetica', '', 11);
    //         $this->Cell(30, 3, 'OPERATIONS ', 0, 1, 'R');
    //     }
    // }

    // 1/30/2025
    public function Header() {
        // Only display header on the first page
        if ($this->getPage() == 1) {

            // $this->Image('./images/pricon_header_logo.png', 10, 10, 190, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
            
            // $this->Ln(20);

            
            // $this->Cell(188, 20, '', 1, 1, 'C');

            // Set the X and Y position inside the cell
            $this->SetXY(15, 10);  // Adjust the position where the image will go inside the cell

            // Place the image inside the cell
            $this->Image('./images/pricon_header_logo.png', $this->GetX() + 2, $this->GetY() + 0, 184, 20, '', '', '', false, 300, '', false, false, 0, false, false, false);

            // Then create the cell
            $this->Cell(188, 20, '', 1, 1, 'C');  // Cell to hold the image (its borders will be drawn)
            
            // Title
            $this->SetFont('helvetica', '', 15);
            $this->Cell(188, 10, 'PERSONNEL SKILL CARD', 1, 1, 'C');

            $this->SetFillColor(0, 255, 255);
            $this->SetFont('helvetica', '', 15);
            $this->Cell(188, 10, 'TEST SOLUTION', 1, 1, 'C', true);

            // level beside name
            $imagePath = './images/level4.png';
            $imageWidth = 50;
            $imageHeight = 35;
            $this->Image($imagePath, 105, $this->GetY(), $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $this->Rect(108, $this->GetY(), $imageWidth, 34);

            // Image beside level
            $imagePath = './images/images.png';
            $imageWidth = 50;
            $imageHeight = 35;
            $this->Image($imagePath, 151, $this->GetY(), $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $this->Rect(153, $this->GetY(), 50, 34);

            $this->SetFont('helvetica', '', 15);
            $this->Cell(40, 3, '  Name ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 15);
            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(53, 3, 'NOMIL ARENA', 1, 1, 'C');

            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, ' ', 1, 0, 'C');
            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, '', 1, 1, 'C');

            $this->SetFont('helvetica', '', 15);
            $this->Cell(40, 3, '  Position ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 15);
            $this->SetFont('helvetica', '', 15);
            $this->Cell(53, 3, 'OPERATOR', 1, 1, 'C');

            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, ' ', 1, 0, 'C');
            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, '', 1, 1, 'C');

            $this->SetFont('helvetica', '', 15);
            $this->Cell(40, 3, '  Date Hired ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 15);
            $this->SetFont('helvetica', '', 15);
            $this->Cell(53, 3, 'JANUARY 20, 2022', 1, 1, 'C');

            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, ' ', 1, 0, 'C');
            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, '', 1, 1, 'C');

            $this->SetFont('helvetica', '', 15);
            $this->Cell(40, 3, '  Section ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 15);
            $this->SetFont('helvetica', '', 15);
            $this->Cell(53, 3, 'PRODUCTION', 1, 1, 'C');

            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, ' ', 1, 0, 'C');
            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, '', 1, 1, 'C');

            $this->SetFont('helvetica', '', 15);
            $this->Cell(40, 3, '  Date Certified ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 15);
            $this->SetFont('helvetica', '', 15);
            $this->Cell(53, 3, 'OCTOBER 2024', 1, 1, 'C');

            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, ' ', 1, 0, 'C');
            // $this->SetFont('helvetica', '', 15);
            // $this->Cell(45, 3, '', 1, 1, 'C');

            $this->SetFont('helvetica', '', 15);
            $this->Cell(40, 3, '  Validity Period ', 1, 0, 'L');
            $this->SetFont('helvetica', 'B', 15);
            $this->SetFont('helvetica', '', 15);
            $this->Cell(53, 3, 'OCTOBER 2025', 1, 0, 'C');

            $this->SetFont('helvetica', '', 15);
            $this->Cell(45, 3, 'TOTAL RATINGS:', 1, 0, 'C');
            $this->SetFont('helvetica', '', 15);
            $this->Cell(50, 3, '14 PTS', 1, 1, 'C');

            // $this->Ln(5);

            // $this->Line(10, $this->GetY(), 200, $this->GetY());

            // $this->Ln(5);
            
            $this->SetFont('helvetica', 'B', 25);
            $this->Cell(93, 30, 'BGA-FP ', 1, 0, 'C');

            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(95, 10, 'STATION ASSIGNED ', 1, 1, 'C');

            $this->SetFont('helvetica', '', 10);
            $this->Cell(93, 20, '', 0, 0, 'C');
            // $this->MultiCell(24, 10, 'ASSEMBLY PROCESS', 1, 'C');
            // $this->MultiCell(24, 10, 'VISUAL INSPECTION', 1, 'C');
            // $this->MultiCell(23, 10, 'PARTS PREP.', 1, 'C');
            // $this->MultiCell(24, 10, 'MACHINE OPERATIONS', 1, 'C');

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

            // level beside name
            // $imagePath = './images/pricon_skill_card_image.png';
            // $imageWidth = 30;
            // $imageHeight = 30;
            // $this->Image($imagePath, 20, $this->GetY(), $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);

            // $this->SetFont('helvetica', 'B', 15);
            // $this->Cell(40, 40, 'Level 1', 1, 0, 'C');
            // $this->MultiCell(53, 40, 'AUTO INSERT TYPE', 1, 'C');
            
            // $this->Cell(40, 10, 'Date Certified:', 1, 0, 'C');
            // $this->MultiCell(53, 40, 'MANUAL INSERT TYPE', 1, 'C');

            // $this->Cell(40, 10, 'Dec-24', 1, 1, 'C');
            // $this->Cell(40, 10, 'Valid Until:', 1, 1, 'C');
            // $this->Cell(40, 10, 'Jun-25', 1, 1, 'C');

            $imagePath = './images/pricon_skill_card_image.png';
            $imageWidth = 30;
            $imageHeight = 30;

            // Save X and Y position for alignment
            $x = $this->GetX();
            $y = $this->GetY();

            // Create a bordered cell for the image and text (80 height)
            $this->Cell(40, 80, '', 1, 0, 'C'); // Empty cell for structure

            // Manually place the image inside the cell
            $this->Image($imagePath, $x + 5, $y + 5, $imageWidth, $imageHeight);

            // Move cursor to the next position inside the 80-height cell
            $this->SetXY($x, $y + 32); 

            // Add Level & Date info inside the same 80-height cell
            $this->SetFont('helvetica', 'B', 13);
            $this->MultiCell(40, 20, "Level 1\n\nDate Certified:\nDec-24\n\nValid Until:\nJun-25", 0, 'C');

            // Move cursor to the next section
            $this->SetXY($x + 40, $y);

            // AUTO INSERT TYPE beside the 80-height cell
            $this->Cell(53, 40, 'AUTO INSERT TYPE', 1, 0, 'C');
            // $this->SetFillColor(0, 255, 255);
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(11, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 1, 'C', true);

            $this->Cell(93, 20, '', 0, 0, 'C');
            
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(11, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 0, 'C', true);
            $this->Cell(12, 20, '', 1, 1, 'C', true);

            $this->Cell(40, 80, '', 0, 0, 'C');

            $this->Cell(53, 40, 'MANUAL INSERT TYPE', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(11, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 1, 'C');

            $this->Cell(93, 20, '', 0, 0, 'C');
            
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(11, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 0, 'C');
            $this->Cell(12, 20, '', 1, 1, 'C');

            // BACK PAGE
            $this->AddPage();

            $this->SetXY(15, 10);

            // Place the image inside the cell
            $this->Image('./images/pricon_logo_2.png', $this->GetX() + 2, $this->GetY() + 5, 81, 20, '', '', '', false, 300, '', false, false, 0, false, false, false);

            // Then create the cell
            $this->Cell(84, 30, '', 1, 0, 'C');
            $this->SetFont('helvetica', 'B', 15);
            $this->SetCellPadding();
            $this->MultiCell(104, 30, "COMPETENCY SKILLS \nASSESSMENT", 1, 'C');
            
            $this->SetFont('helvetica', '', 13);
            // $this->MultiCell(55, 20, "FUNCTIONAL \nCOMPETENCIES", 1, 'C');
            $this->Cell(55, 20, 'FUNCTIONAL \nCOMPETENCIES', 1, 0, 'C', true);

            // $x = $this->GetX();
            // $y = $this->GetY(); // Get current Y position

            // $this->SetCellPadding(3);
            // $this->MultiCell(55, 20, "TARGET \nRATING", 1, 'C');
            // $this->SetXY($x + 24, $y);

            // $this->SetCellPadding(4);
            $this->Cell(29, 20, 'TARGET \nRATING', 1, 0, 'C', true);

            $this->Cell(104, 10, "REFERENCE", 1, 1, 'C');
            $this->Cell(84, 10, "", 0, 0, 'C');
            $this->Cell(104, 10, "RATINGS", 1, 1, 'C', true);

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