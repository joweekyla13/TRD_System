<?php
require_once('TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
    public $endorsement_docno;
    public $endo_hr_memo;
    public $endo_tr_ctrlno;
    public $endo_to;
    public $endo_attn;
    public $endo_subject;
    public $endo_date_now;
    public $day1_range;
    public $date_filed;
    public $endorsement_date;

    // Load table data from database
    public function LoadData() {
        include 'db_config/db_trds.php';
        
        // Get the document number from the POST data
        $docno = $_POST['hidden_docno'];
        $tr_conno = $_POST['hidden_tr_conno'];
        $hr_memo = $_POST['hidden_hr_memo'];

        // SQL query to fetch data
        $select = "SELECT date_filed, venue, endorsement_date, endo_date_hired, endo_empno, endo_fullname, endo_pds, endo_title, endo_remarks, endorsement_docno, endo_to, endo_attn, endo_subject, endo_hr_memo, endo_tr_ctrlno, endo_date_now, 
                CONCAT(MIN(day1), ' - ', MAX(day1)) AS day1_range, 
                day1_status, day1_reason
                FROM tbl_training_endorsement 
                INNER JOIN tbl_training_request ON tbl_training_endorsement.endo_tr_ctrlno = tbl_training_request.conno
                INNER JOIN tbl_attendance ON tbl_training_endorsement.endo_tr_ctrlno = tbl_attendance.fkconno
                WHERE endo_hr_memo = '$hr_memo'
                AND endo_tr_ctrlno = '$tr_conno'
                AND fkconno = '$tr_conno'
                AND tbl_training_endorsement.logdel = '0'
                GROUP BY endo_fullname";

        $query = mysqli_query($conn, $select);
          
        $data = array(); // Initialize an empty array to store the fetched data
        
        // Check if the query executed successfully and returned rows
        if (mysqli_num_rows($query) > 0) {
            // Fetch each row and store it in the $data array
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row; // Add each row to the $data array
            }
        }
        
        return $data; // Return the fetched data
    }

    // Colored table with multi-line titles
    public function ColoredTable($header, $data) {
        // Colors, line width, and bold font
        $this->SetFillColor(173, 216, 230); // Set fill color to light blue (RGB: 173, 216, 230)
        $this->SetTextColor(0); // Set text color to black
        $this->SetDrawColor(0, 0, 128); // Set border color to navy blue (RGB: 0, 0, 128)
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');

        // Define header widths
        $w = array(20, 15, 40, 60, 40, 50); // Adjusted the width for readability
        $num_headers = count($header);
        
        // Print header
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        // Print data
        $fill = 0;
        foreach ($data as $row) {
            // Find the maximum height for this row based on the content's length
            $cell_heights = array();
            foreach (array($row['endo_date_hired'], $row['endo_empno'], $row['endo_fullname'], $row['endo_pds'], $row['endo_title'], $row['endo_remarks']) as $key => $column_value) {
                $num_lines = $this->getNumLines($column_value, $w[$key]); // Get the number of lines required for each cell
                $cell_heights[] = $num_lines * 6; // 6 is the line height
            }
            $row_height = max($cell_heights); // Determine the maximum height for the row

            // Print each cell with MultiCell
            $this->MultiCell($w[0], $row_height, $row['endo_date_hired'], 1, 'L', $fill, 0);
            $this->MultiCell($w[1], $row_height, $row['endo_empno'], 1, 'L', $fill, 0);
            $this->MultiCell($w[2], $row_height, $row['endo_fullname'], 1, 'L', $fill, 0);
            $this->MultiCell($w[3], $row_height, $row['endo_pds'], 1, 'L', $fill, 0);
            
            // Handle the "Title" column, identify and split by " /"
            $title_value = $row['endo_title']; // Get the title values
            
            // Check if the title contains " /" (indicating multiple values)
            if (strpos($title_value, '/ ') !== false) {
                // Split the title by the " /" separator
                $title_lines = explode('/ ', $title_value);
                
                // Join the lines with a newline character for MultiCell
                $formatted_title = implode("\n\n", $title_lines);
            } else {
                // If no " /", just use the title as is
                $formatted_title = $title_value;
            }

            $remarks_value = $row['endo_remarks']; // Get the title values
            
            // Check if the title contains " /" (indicating multiple values)
            if (strpos($remarks_value, '/ ') !== false) {
                // Split the title by the " /" separator
                $remarks_lines = explode('/ ', $remarks_value);
                
                // Join the lines with a newline character for MultiCell
                $formatted_remarks = implode("\n\n", $remarks_lines);
            } else {
                // If no " /", just use the title as is
                $formatted_remarks = $remarks_value;
            }
            
            // Output the formatted title in the "Title" column
            $this->MultiCell($w[4], $row_height, $formatted_title, 1, 'L', $fill, 0);
            
            // Print "Remarks" column
            $this->MultiCell($w[5], $row_height, $formatted_remarks, 1, 'L', $fill, 1); // '1' for line break at the end of the row
            
            $fill = !$fill; // Alternate row color
        }
        
        $this->Cell(array_sum($w), 0, '', 'T'); // Closing line
    }

    // Custom header
    public function Header() {
        // Only display header on the first page
        if ($this->getPage() == 1) {
            // Title
            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(0, 10, 'Memorandum Form', 0, 1, 'L');

            $this->SetFont('helvetica', '', 8);
            $this->Cell(0, 5, 'Document #                           : ' . $this->endorsement_docno, 0, 1, 'L');
            $this->Cell(0, 3, 'To                                          : ' . $this->endo_to, 0, 1, 'L');
            $this->Cell(0, 3, 'Attn                                        : ' . $this->endo_attn, 0, 1, 'L');
            $this->Cell(0, 3, 'Subject                                  : ' . $this->endo_subject, 0, 1, 'L');
            $this->Cell(0, 3, 'HR Memo #                           : ' . $this->endo_hr_memo, 0, 1, 'L');
            $this->Cell(0, 3, 'Training Request CTRL#      : ' . $this->endo_tr_ctrlno, 0, 1, 'L');
            $this->Cell(0, 3, 'Date                                       : ' . $this->endo_date_now, 0, 1, 'L');
            $this->Ln(3); // Add a little space before the line

            // Add a separator line
            $this->SetDrawColor(0, 0, 0); // Set color for the line (black)
            $this->Line($this->GetX(), $this->GetY(), $this->GetX() + 190, $this->GetY()); // Draw line from current X and Y to new X (190 points to the right)

            $this->Ln(3); // Add a little space before the line

            $this->Cell(0, 2, 'Below is the result of technical training conducted to newly hired personnel in compliance to Personnel training and certification system (PQS-I01-008):', 0, 1, 'L');

            $this->Ln(2); // Add a little space before the table

            $this->Cell(0, 5, 'HR Endorsement to Operations TU date:                                               ' . $this->endorsement_date, 0, 1, 'L');
            $this->Cell(0, 5, 'Operations Training Unit Training Date:                                                  ' . $this->day1_range, 0, 1, 'L');
            $this->Cell(0, 5, 'Operations Training Unit endorsement to requestor:                              ' . $this->date_filed, 0, 1, 'L');
            $this->Ln(10); // Add a little space before the table
        }
    }
}

// Create new PDF document with landscape orientation
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
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

// Load data from database
$data = $pdf->LoadData();

if (!empty($data)) {
    $lastRow = end($data); // Get the last row to get the values
    $pdf->endorsement_docno = $lastRow['endorsement_docno'];
    $pdf->endo_hr_memo = $lastRow['endo_hr_memo'];
    $pdf->endo_tr_ctrlno = $lastRow['endo_tr_ctrlno'];
    $pdf->endo_to = str_replace(',', ' /', $lastRow['endo_to']);
    $pdf->endo_attn = str_replace(',', ' /', $lastRow['endo_attn']);
    $pdf->endo_subject = $lastRow['endo_subject'];
    $pdf->endo_date_now = $lastRow['endo_date_now'];
    $pdf->day1_range = $lastRow['day1_range'];
    $pdf->date_filed = $lastRow['date_filed'];
    $pdf->endorsement_date = $lastRow['endorsement_date'];
}

// Set font and add a page
$pdf->SetFont('helvetica', '', 8);
$pdf->AddPage();

// Add space before the table to prevent overlap
$pdf->Ln(44); // Add some space before the table

// Column titles
$header = array('Date Hired', 'Emp#', 'Name', 'Pos/Dept/Sec', 'Title', 'Remarks');

// Print colored table
$pdf->ColoredTable($header, $data);

//Output PDF
$pdf->Output('pdf.pdf', 'I');
?>