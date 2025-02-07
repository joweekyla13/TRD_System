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
        $select = "SELECT 
        
        fullname, day1, day1_status, day1_reason, date_filed, venue, endorsement_date, endo_date_hired, endo_empno, endo_fullname, endo_pds, endo_title, endo_score, endo_rating, endo_remarks, endorsement_docno, endo_to, endo_attn, endo_subject, endo_hr_memo, endo_tr_ctrlno, endo_date_now, endo_handsOn_result, endo_preparedby, endo_notedby, endo_approvedby,
        
        CASE
        WHEN MIN( day1 ) = MAX( day1 )
        THEN MIN( day1 )
        ELSE CONCAT( MIN( day1 ) , ' - ', MAX( day1 ) )
        END AS day1_range
        FROM `tbl_training_endorsement`
        INNER JOIN tbl_training_request ON tbl_training_endorsement.endo_tr_ctrlno = tbl_training_request.conno
        INNER JOIN tbl_attendance ON tbl_training_endorsement.endo_tr_ctrlno = tbl_attendance.fkconno
        WHERE endorsement_docno = '$docno'
        AND endo_hr_memo = '$hr_memo'
        AND endo_tr_ctrlno = '$tr_conno'
        AND tbl_training_endorsement.logdel = '0'
        GROUP BY endo_fullname;
        ";

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

    public function LoadTrainingData() {
        include 'db_config/db_trds.php';

        $tr_conno = $_POST['hidden_tr_conno'];

        // SQL query to fetch data
        $select = "SELECT fkEmpNo, fullname, day1, day1_status, day1_reason 
        FROM tbl_attendance 
        WHERE fkconno = '$tr_conno'
        AND day1_status = '2'
        AND logdel = '0'
        GROUP BY fullname, day1_reason
        ORDER BY day1 ASC
        ";

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

    // ORIG CODE
    // Colored table with multi-line titles
    // public function ColoredTable($header, $data) {
    //     // Colors, line width, and bold font
    //     $this->SetFillColor(174, 245, 193); // Light Green
    //     $this->SetTextColor(0); // Set text color to black
    //     $this->SetDrawColor(0, 0, 0); // Set border color to navy blue (RGB: 0, 0, 128)
    //     $this->SetLineWidth(0.01);
    //     $this->SetFont('', 'B');

    //     // Define header widths
    //     $w = array(10, 20, 20, 30, 40, 115, 33, 55); // Adjusted the width for readability
    //     $num_headers = count($header);
        
    //     // Print header
    //     // for ($i = 0; $i < $num_headers; ++$i) {
    //     //     $this->Cell($w[$i], 12, $header[$i], 1, 0, 'C', 1); // Use the new height here
    //     // }

    //     for ($i = 0; $i < $num_headers; ++$i) {
    //         if ($header[$i] === 'Theoretical Examination') {
    //             // Draw the custom header with a line in the middle
    //             $this->SetFont('', 'B', 6); // Bold font
    //             $this->MultiCell(
    //                 $w[$i], 
    //                 12, 
    //                 "\nTheoretical Examination
    //                 \n                         Title                                              Score                       Rating                     Remarks        ", // Add line break in header text
    //                 1, 
    //                 'C', 
    //                 2, 
    //                 0
    //             );
        
    //             // Calculate X and Y positions for drawing the horizontal line
    //             $x = $this->GetX() - $w[$i]; // Current X minus column width
    //             $y = $this->GetY() - -6;      // Current Y minus half the cell height
        
    //             // Draw the horizontal line
    //             $this->Line($x, $y, $x + $w[$i], $y); // From start of the column to its end
    //         } else {
    //             $this->Cell($w[$i], 12, $header[$i], 1, 0, 'C', 1); // Standard header
    //         }
    //     }
        

    //     $this->Ln();

    //     // Color and font restoration
    //     $this->SetFillColor(224, 235, 255);
    //     $this->SetTextColor(0);
    //     $this->SetFont('', '', 8); // Bold font

    //     $table_row_counter = 1;

    //     // Print data
    //     $fill = 0;
    //     foreach ($data as $row) {
    //         // Find the maximum height for this row based on the content's length
    //         $cell_heights = array();
    //         foreach (array($row['endo_date_hired'], $row['endo_empno'], $row['endo_fullname'], $row['endo_pds'], $row['endo_title'], $row['endo_remarks']) as $key => $column_value) {
    //             $num_lines = $this->getNumLines($column_value, $w[$key]); // Get the number of lines required for each cell
    //             $cell_heights[] = $num_lines * 6; // 6 is the line height
    //         }
    //         $row_height = max($cell_heights); // Determine the maximum height for the row

    //         $this->SetCellPadding(3); // Increase padding (default is 1)
    //         $this->MultiCell($w[0], $row_height, $table_row_counter . '.', 1, 'C', $fill, 0); // Print the row counter

    //         $this->SetCellPadding(3); // Increase padding (default is 1)
    //         // Print each cell with MultiCell
    //         $this->MultiCell($w[1], $row_height, date('j-M-y', strtotime($row['endo_date_hired'])), 1, 'C', $fill, 0);
    //         $this->MultiCell($w[2], $row_height, $row['endo_empno'], 1, 'C', $fill, 0);
    //         $this->MultiCell($w[3], $row_height, $row['endo_fullname'], 1, 'C', $fill, 0);
    //         $this->MultiCell($w[4], $row_height, $row['endo_pds'], 1, 'C', $fill, 0);
            
    //         // Handle the "Title" column, identify and split by " /"
    //         $title_value = $row['endo_title']; // Get the title values
            
    //         // Check if the title contains " /" (indicating multiple values)
    //         if (strpos($title_value, ' | ') !== false) {
    //             // Split the title by the " /" separator
    //             $title_lines = explode(' | ', $title_value);

    //             $formatted_title = '';
    //             foreach ($title_lines as $index => $title) {
    //                 $formatted_title .= ($index + 1) . '. ' . trim($title) . "\n\n"; // Add index (1., 2., 3.)
    //             }
                
    //         } else {
    //             $formatted_title = '1. ' . $title_value; // Single title case
    //         }

    //         $score_value = $row['endo_score']; // Get the title values
            
    //         // Check if the title contains " /" (indicating multiple values)
    //         if (strpos($score_value, ' | ') !== false) {
    //             // Split the title by the " /" separator
    //             $score_lines = explode(' | ', $score_value);
                
    //             // Join the lines with a newline character for MultiCell
    //             $formatted_score = implode("\n\n", $score_lines);
    //         } else {
    //             // If no " /", just use the title as is
    //             $formatted_score = $score_value;
    //         }

    //         $rating_value = $row['endo_rating']; // Get the title values
            
    //         // Check if the title contains " /" (indicating multiple values)
    //         if (strpos($rating_value, ' | ') !== false) {
    //             // Split the title by the " /" separator
    //             $rating_lines = explode(' | ', $rating_value);
                
    //             // Join the lines with a newline character for MultiCell
    //             $formatted_rating = implode("\n\n", $rating_lines);
    //         } else {
    //             // If no " /", just use the title as is
    //             $formatted_rating = $rating_value;
    //         }

    //         $remarks_value = $row['endo_remarks']; // Get the title values
            
    //         // Check if the title contains " /" (indicating multiple values)
    //         if (strpos($remarks_value, ' | ') !== false) {
    //             // Split the title by the " /" separator
    //             $remarks_lines = explode(' | ', $remarks_value);
                
    //             // Join the lines with a newline character for MultiCell
    //             $formatted_remarks = implode("\n\n", $remarks_lines);
    //         } else {
    //             // If no " /", just use the title as is
    //             $formatted_remarks = $remarks_value;
    //         }
            
    //         // Output the formatted title in the "Title" column
    //         $this->MultiCell($w[7], $row_height, $formatted_title, 1, 'L', $fill, 0);

    //         // Print "Result" column
    //         $this->MultiCell($w[2], $row_height, $formatted_score, 1, 'C', $fill, 0); // '0' for line break at the end of the row

    //         // Print "Rating" column
    //         $this->MultiCell($w[2], $row_height, $formatted_rating, 1, 'C', $fill, 0); // '0' for line break at the end of the row
            
    //         // Print "Remarks" column
    //         $this->MultiCell($w[2], $row_height, $formatted_remarks, 1, 'C', $fill, 0); // '0' for line break at the end of the row

    //         $this->MultiCell($w[6], $row_height, 'Janessa Sulit', 1, 'C', $fill, 1);

    //         $table_row_counter++;
            
    //         // $fill = !$fill; // Alternate row color
    //     }
        
    //     $this->Cell(array_sum($w), 0, '', 'T'); // Closing line
    // }

    // PINAKA GOODS AS OF NOW
    public function ColoredTable($header, $data) {
        // Colors, line width, and bold font
        $this->SetFillColor(174, 245, 193); // Light Green
        $this->SetTextColor(0); // Set text color to black
        $this->SetDrawColor(0, 0, 0); // Set border color to black
        $this->SetLineWidth(0.1);
        $this->SetFont('', 'B');
    
        // Define column widths
        $w = array(10, 20, 20, 30, 48, 108, 33); // Adjust widths for readability
        $num_headers = count($header);
    
        // Print header
        for ($i = 0; $i < $num_headers; ++$i) {
            if ($header[$i] === 'Theoretical Examination') {
                // Draw the custom header with a line in the middle
                $this->SetFont('', 'B', 6); // Bold font
                $this->MultiCell(
                    $w[$i],
                    12,
                    "\nTheoretical Examination
                    \n                                                                                          Score                       Rating                     Remarks        ", // Add line break in header text
                    1, 
                    'C', 
                    2, 
                    0
                );
        
                // Calculate X and Y positions for drawing the horizontal line
                $x = $this->GetX() - $w[$i]; // Current X minus column width
                $y = $this->GetY() - -6;      // Current Y minus half the cell height
        
                // Draw the horizontal line
                $this->Line($x, $y, $x + $w[$i], $y); // From start of the column to its end
            } else {
                $this->Cell($w[$i], 12, $header[$i], 1, 0, 'C', 1); // Standard header
            }
        }
    
        $this->Ln();
    
        // Restore font and colors for table content
        $this->SetFont('', '', 8);
        $this->SetFillColor(224, 235, 255);
        $fill = false;
    
        $row_count = 1;
    
        // Print rows
        foreach ($data as $row) {
            // Split the theoretical examination-related fields by '|'
            $titles = explode(' | ', $row['endo_title']);
            $scores = explode(' | ', $row['endo_score']);
            $ratings = explode(' | ', $row['endo_rating']);
            $remarks = explode(' | ', $row['endo_remarks']);
    
            $cell_heights = array();
            foreach (array($row['endo_date_hired'], $row['endo_empno'], $row['endo_fullname'], $row['endo_pds'], $row['endo_title'], $row['endo_remarks']) as $key => $column_value) {
                $num_lines = $this->getNumLines($column_value, $w[$key]); // Get the number of lines required for each cell
                $cell_heights[] = $num_lines * 6; // 6 is the line height
            }
            $row_height = max($cell_heights);
    
            // Determine the maximum number of sub-rows for the theoretical examination
            $max_rows = max(count($titles), count($scores), count($ratings), count($remarks));
    
            // 1/10/2025
            for ($i = 0; $i < $max_rows; $i++) {
                // Check if a new page is needed
                if ($this->GetY() + 10 > $this->PageBreakTrigger) {
                    $this->AddPage();
                    $this->HeaderTable($header, $w); // Repeat header on a new page
                }
    
                // Print non-theoretical data once and use colspan so that there is no blank sub-rows after
                if ($i === 0) {
                    $this->Cell($w[0], 17, $row_count, 1, 0, 'C', $fill);
                    $this->Cell($w[1], 17, date('j-M-y', strtotime($row['endo_date_hired'])), 1, 0, 'C', $fill);


                    $this->SetCellPadding(3);
                    $this->MultiCell($w[2], 17, $row['endo_empno'], 1, 'C', $fill, 0);

                    $this->Cell($w[3], 17, $row['endo_fullname'], 1, 0, 'C', $fill);
                    $this->SetCellPadding(3);
                    $this->MultiCell($w[4], 17, $row['endo_pds'], 1, 'C', $fill, 0);
                } else {
                    // change this code to remove the blank sub-rows and make the data colspan the entire sub-rows
                    $this->Cell($w[0] + $w[1] + $w[2] + $w[3] + $w[4], 17, '', 1, 0, 'C', $fill); 
                }
    
                // Print theoretical examination columns
                $this->SetCellPadding(3);
                if (isset($titles[$i]) && $titles[$i] !== '') {
                    $this->MultiCell($w[4], 17, $titles[$i], 1, 'C', $fill, 0);
                } else {
                    $this->Cell($w[4], 17, '', 1, 0, 'C', $fill);
                }
    
                $this->SetCellPadding(1);
                $this->Cell($w[2], 17, isset($scores[$i]) ? $scores[$i] : '', 1, 0, 'C', $fill);
                $this->Cell($w[2], 17, isset($ratings[$i]) ? $ratings[$i] : '', 1, 0, 'C', $fill);

                $this->SetCellPadding(3);
                $this->SetFont('', '', 7);
                if (isset($remarks[$i]) && $remarks[$i] !== '') {
                    $this->MultiCell($w[2], 17, $remarks[$i], 1, 'C', $fill, 0);
                } else {
                    $this->Cell($w[2], 17, '', 1, 0, 'C', $fill);
                }

                // Print "Immediate Superior" aligned with non-theoretical data horizontally
                $this->SetCellPadding(1);
                $this->SetFont('', '', 8);
                if ($i === 0) {
                    $this->Cell($w[6], 17, $row['endo_preparedby'], 1, 1, 'C', $fill);
                } else {
                    // change this code to remove the blank sub-rows and make the data colspan the entire sub-rows
                    $this->Cell($w[6], 17, '', 1, 1, 'C', $fill);
                }
            }       
    
            $row_count++;
        }
    
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }    

    
    /**
     * Custom function to print the table header
     */
    private function HeaderTable($header, $w) {
        $this->SetFillColor(174, 245, 193); // Light Green
        $this->SetTextColor(0); // Set text color to black
        $this->SetDrawColor(0, 0, 0); // Set border color to black
        $this->SetLineWidth(0.1);
        $this->SetFont('', 'B');
    
        for ($i = 0; $i < count($header); ++$i) {
            $this->Cell($w[$i], 10, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();

        $this->SetFont('', '');
    }   
    

    // Custom header
    public function Header() {
        // Only display header on the first page
        if ($this->getPage() == 1) {
            // Title
            $this->SetFont('helvetica', 'B', 12);
            $this->Cell(0, 10, 'Memorandum', 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(40, 3, 'Document #', 0, 0, 'L');
            $this->Cell(3, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(75, 3, $this->endorsement_docno, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(40, 3, 'To', 0, 0, 'L');
            $this->Cell(3, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(75, 3, $this->endo_to, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(40, 3, 'Attn', 0, 0, 'L');
            $this->Cell(3, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(75, 3, $this->endo_attn, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(40, 3, 'Subject', 0, 0, 'L');
            $this->Cell(3, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(75, 3, $this->endo_subject, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(40, 3, 'HR Memo #', 0, 0, 'L');
            $this->Cell(3, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(75, 3, $this->endo_hr_memo, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(40, 3, 'Training Request CTRL #', 0, 0, 'L');
            $this->Cell(3, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(75, 3, $this->endo_tr_ctrlno, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(40, 3, 'Date', 0, 0, 'L');
            $this->Cell(3, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(75, 3, $this->endo_date_now, 0, 1, 'L');

            $this->Ln(3); // Add a little space before the line

            // Add a separator line
            $this->SetDrawColor(0, 0, 0); // Set color for the line (black)
            $this->Line($this->GetX(), $this->GetY(), $this->GetX() + 268, $this->GetY()); // Draw line from current X and Y to new X (190 points to the right)

            $this->Ln(3); // Add a little space before the line

            $this->Cell(0, 2, 'Below is the result of technical training conducted to newly hired personnel in compliance to Personnel training and certification system (PQS-I01-008):', 0, 1, 'L');

            $this->Ln(2); // Add a little space before the table

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(50, 5, 'HR Endorsement to Operations TU date: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(80.5, 5, $this->endorsement_date, 0, 1, 'R');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(50, 5, 'Operations Training Unit Training Date: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(106, 5, $this->day1_range, 0, 1, 'R');

            $this->SetFont('helvetica', 'B', 8);
            $this->Cell(50, 5, 'Operations Training Unit endorsement to requestor: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 8);
            $this->Cell(81.5, 5, $this->date_filed, 0, 1, 'R');

            // $this->Cell(0, 5, 'HR Endorsement to Operations TU date:                                               ' . $this->endorsement_date, 0, 1, 'L');

            // $this->Cell(0, 5, 'Operations Training Unit Training Date:                                                  ' . $this->day1_range, 0, 1, 'L');
            // $this->Cell(0, 5, 'Operations Training Unit endorsement to requestor:                              ' . $this->date_filed, 0, 1, 'L');
            
            $this->Ln(10); // Add a little space before the table
        }
    }
}

// Edited 1-13-25
// Create new PDF document with landscape orientation
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TRD System');
$pdf->SetTitle('Training Endorsement');
$pdf->SetSubject('Training Endorsement');
$pdf->SetKeywords('Training Endorsement, Training, Endorsement');

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
    $pdf->endo_date_now = date("F j, Y", strtotime($lastRow['endo_date_now']));

    $originalRange = $lastRow['day1_range']; // e.g., "2025-01-02 - 2025-01-06"
    $dates = explode(' - ', $originalRange); // Split into two parts

    // Format each date
    $startDate = date('F j, Y', strtotime($dates[0])); // e.g., "January 2, 2025"
    $endDate = date('F j, Y', strtotime($dates[1]));   // e.g., "January 6, 2025"

    // Combine the formatted dates
    $formattedRange = $startDate . ' - ' . $endDate;

    $pdf->day1_range = $formattedRange;

    $pdf->date_filed = date("F j, Y", strtotime($lastRow['date_filed']));
    $pdf->endorsement_date = date("F j, Y", strtotime($lastRow['endorsement_date']));

    $pdf->endo_preparedby = $lastRow['endo_preparedby'];
    $pdf->endo_notedby = $lastRow['endo_notedby'];
    $pdf->endo_approvedby = $lastRow['endo_approvedby'];

}

// Set font and add a page
$pdf->SetFont('helvetica', '', 8);
$pdf->AddPage();

// Add space before the table to prevent overlap
$pdf->Ln(44); // Add some space before the table

// Column titles
$header = array('No.', 'Date Hired', 'Emp#', 'Name', 'Pos/Dept/Sec', 'Theoretical Examination', 'Immediate Superior');

// Print colored table
$pdf->ColoredTable($header, $data);

// Print text below the table
$pdf->Ln(10); // Add some space after the table
$pdf->SetFont('helvetica', 'B', 8); // Set font to bold for emphasis
$pdf->Cell(0, 5, 'Below names of operators were not endorsed to production area due to the following reasons:', 0, 1, 'L');

$pdf->Ln(2);

// Load training data from the database
$trainingData = $pdf->LoadTrainingData();

// Set font for displaying the list
$pdf->SetFont('helvetica', '', 8); // Normal font for the list

$row_counter = 1;

// Loop through the training data and display it
foreach ($trainingData as $row) {
    $attendance_status = $row['day1_status'] == '0' ? 'Present' : ($row['day1_status'] == '1' ? 'Absent' : 'Others');
    $entry = $row_counter . '. ' . date("F j, Y", strtotime($row['day1'])) . ' - ' . $row['fullname'] . ' - ' . $row['fkEmpNo'] . ': ' . $row['day1_reason'];

    // Output the entry in the PDF
    $pdf->Cell(0, 5, $entry, 0, 1, 'L');
    $row_counter++;
}

$pdf->Ln(20); // Add some space before the table

$pdf->AddPage();

// ORIGINAL CODE
// // File paths for "Prepared by" and "Checked by" images
// $preparebyEmpNo = $_POST['pdf_hidden_preparedby_empno'];
// $checkedbyEmpNo = $_POST['pdf_hidden_checked_empno'];

// $preparedbyPosition = $_POST['pdf_hidden_preparedby_position'];
// $checkedbyPosition = $_POST['pdf_hidden_checked_position'];

// $approvedbyPosition = $_POST['pdf_hidden_approvedby_position'];
// $approvedbyEmpNo = $_POST['pdf_hidden_approvedby_empno'];

// // $preparedByImagePath = "../ACDCS/e_signatures/{$preparebyEmpNo}.png";
// $preparedByImagePath = "../ACDCS/e_signatures/{$preparebyEmpNo}.png";

// $checkedByImagePath = "../ACDCS/e_signatures/{$checkedbyEmpNo}.png";

// $approvedByImagePath = "../ACDCS/e_signatures/{$approvedbyEmpNo}.png";

// // Add the "Prepared by" and "Checked by" labels
// $pdf->SetFont('helvetica', 'B', 8); // Set font to bold for emphasis                                                                                                                                                                                                 Checked by:', 0, 1, 'L');
// $pdf->Cell(100, 5, 'Prepared by:', 0, 0, 'L');
// $pdf->Cell(125, 5, 'Checked by:', 0, 1, 'R');

// // Set the positions and sizes for the images
// $preparedByImageX = 7; // X position for "Prepared by"
// $checkedByImageX = 210; // X position for "Checked by"
// $imageY = $pdf->GetY(); // Y position for both images
// $imageWidth = 40; // Width of each image
// $imageHeight = 20; // Height of each image

// if (file_exists($preparedByImagePath)) {
//     $pdf->Image($preparedByImagePath, $preparedByImageX, $imageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 1, false, false, false);
// } else {
//     $pdf->SetFont('helvetica', 'I', 10);
//     $pdf->SetXY($preparedByImageX, $imageY); // Set position for placeholder
//     $pdf->Cell(40, 5, 'Signature image not found.', 0, 0, 'L');
// }
// if (file_exists($checkedByImagePath)) {
//     $pdf->Image($checkedByImagePath, $checkedByImageX, $imageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 1, false, false, false);
// } else {
//     $pdf->SetFont('helvetica', 'I', 10);
//     $pdf->SetXY($checkedByImageX, $imageY); // Set position for placeholder
//     $pdf->Cell(40, 5, 'Signature image not found.', 0, 0, 'L');
// }

// // Add placeholder text if images are missing
// $pdf->Ln($imageHeight + 1); // Add some space
// $pdf->SetFont('helvetica', 'B', 8); // Reset font
// $pdf->Cell(100, 5, $lastRow['endo_preparedby'], 0, 0, 'L');
// $pdf->Cell(123, 5, $lastRow['endo_notedby'], 0, 1, 'R');

// $pdf->Ln(0.5);
// // Add names under the signatures
// $pdf->SetFont('helvetica', 'B', 8);
// $pdf->Cell(100, 5, $preparedbyPosition, 0, 0, 'L');
// $pdf->Cell(127.5, 5, $checkedbyPosition, 0, 1, 'R');

// 1/22/2025
// // Define positions and dimensions for images
// $preparedByImageX = 7; // X position for "Prepared by"
// $checkedByImageX = 210; // X position for "Checked by"
// $imageWidth = 40; // Width of each image
// $imageHeight = 20; // Height of each image

// // Estimate the total height needed for this block (including labels and images)
// $totalBlockHeight = $imageHeight + 10; // Image height + some buffer for labels

// // Check if there's enough space for the entire block on the current page
// if ($pdf->GetY() + $totalBlockHeight > $pdf->getPageHeight() - $pdf->getBreakMargin()) {
//     $pdf->AddPage(); // Add a new page if needed
// }

// // Add labels and signatures
// $pdf->SetFont('helvetica', 'B', 8);
// $pdf->Cell(100, 5, 'Prepared by:', 0, 0, 'L');
// $pdf->Cell(125, 5, 'Checked by:', 0, 1, 'R');

// // Add images or placeholder messages for signatures
// $imageY = $pdf->GetY(); // Get current Y position for images

// if (file_exists($preparedByImagePath)) {
//     $pdf->Image($preparedByImagePath, $preparedByImageX, $imageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 1, false, false, false);
// } else {
//     $pdf->SetFont('helvetica', 'I', 10);
//     $pdf->SetXY($preparedByImageX, $imageY); // Set position for placeholder
//     $pdf->Cell(40, 5, 'Signature image not found.', 0, 0, 'L');
// }

// if (file_exists($checkedByImagePath)) {
//     $pdf->Image($checkedByImagePath, $checkedByImageX, $imageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 1, false, false, false);
// } else {
//     $pdf->SetFont('helvetica', 'I', 10);
//     $pdf->SetXY($checkedByImageX, $imageY); // Set position for placeholder
//     $pdf->Cell(40, 5, 'Signature image not found.', 0, 0, 'L');
// }

// // Move cursor down to account for image height
// $pdf->Ln(15);

// // Add names under the signatures
// $pdf->SetFont('helvetica', 'B', 8);
// $pdf->Cell(100, 5, $lastRow['endo_preparedby'], 0, 0, 'L');
// $pdf->Cell(123, 5, $lastRow['endo_notedby'], 0, 1, 'R');


// $pdf->Ln(0.5);
// // Add names under the signatures
// $pdf->SetFont('helvetica', 'B', 8);
// $pdf->Cell(100, 5, $preparedbyPosition, 0, 0, 'L');
// $pdf->Cell(127.5, 5, $checkedbyPosition, 0, 1, 'R');

// 1/31/2025
// File paths for "Prepared by" and "Checked by" images

// $preparebyEmpNo = $_POST['pdf_hidden_preparedby_empno'];
// $preparedbyPosition = $_POST['pdf_hidden_preparedby_position'];
// $preparedByImagePath = "../ACDCS/e_signatures/{$preparebyEmpNo}.png";

// $checkedbyEmpNo = $_POST['pdf_hidden_checked_empno'];
// $checkedbyPosition = $_POST['pdf_hidden_checked_position'];
// $checkedByImagePath = "../ACDCS/e_signatures/{$checkedbyEmpNo}.png";

// $approvedbyPosition = $_POST['pdf_hidden_approvedby_position'];
// $approvedbyEmpNo = $_POST['pdf_hidden_approvedby_empno'];
// $approvedByImagePath = "../ACDCS/e_signatures/{$approvedbyEmpNo}.png";

// // Set font for labels
// $pdf->SetFont('helvetica', 'B', 8);

// $pdf->SetX(40);
// // Display "Prepared by"
// $pdf->Cell(100, 5, 'Prepared by:', 0, 1, 'L');

// $imageX = 30; // X position for images
// $imageWidth = 40;
// $imageHeight = 20;

// $imageY = $pdf->GetY(); // Current Y position

// // Display "Prepared by" image
// if (file_exists($preparedByImagePath)) {
//     $pdf->Image($preparedByImagePath, $imageX, $imageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
// } else {
//     $pdf->SetFont('helvetica', 'I', 10);
//     $pdf->SetXY($imageX, $imageY);
//     $pdf->Cell($imageWidth, 5, 'Signature image not found.', 0, 1, 'L');
// }

// $pdf->Ln($imageHeight + 1); // Move below the image

// // Display "Prepared by" Name
// $pdf->SetFont('helvetica', 'B', 8);
// $pdf->SetX(40);
// $pdf->Cell(100, 5, $lastRow['endo_preparedby'], 0, 1, 'L');

// // Display "Prepared by" Position
// $pdf->SetFont('helvetica', 'B', 8);
// $pdf->SetX(40);
// $pdf->Cell(100, 5, $preparedbyPosition, 0, 1, 'L');

// $pdf->Ln(15); // Add some space before "Checked by"
// $pdf->SetFont('helvetica', 'B', 8); // Set font to bold for emphasis
// $pdf->SetX(40);
// $pdf->Cell(0, 5, 'Checked by:', 0, 1, 'L');

// // Split the "Checked by" values (multiple employees possible)
// $checkedByEmpNos = explode(' / ', $checkedbyEmpNo); // Employee numbers
// $checkedByPositions = explode(' / ', $checkedbyPosition); // Positions
// $checkedByNames = explode(', ', $lastRow['endo_notedby']); // Names from database

// // Define starting positions for images
// $checkedByImageX = 30; // Initial X position
// $checkedByImageY = $pdf->GetY(); // Get the current Y position
// $imageSpacing = 200; // Adjust horizontal spacing
// $imageWidth = 40; 
// $imageHeight = 20; 

// // Loop through each "Checked by" employee and display images
// foreach ($checkedByEmpNos as $index => $checkedByEmpNo) {
//     $imagePath = "../ACDCS/e_signatures/{$checkedByEmpNo}.png"; // Construct full path

//     if (file_exists($imagePath)) {
//         $pdf->Image($imagePath, $checkedByImageX, $checkedByImageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
//     } else {
//         $pdf->SetFont('helvetica', 'I', 10);
//         $pdf->SetXY($checkedByImageX, $checkedByImageY + ($imageHeight / 2) - 2); 
//         $pdf->Write(5, 'Signature image not found.');
//     }

//     // Adjust X position for the next image
//     $checkedByImageX += $imageSpacing;

//     // Wrap to next line if needed
//     if ($checkedByImageX + $imageWidth > $pdf->getPageWidth() - PDF_MARGIN_RIGHT) {
//         $checkedByImageX = 30; // Reset X position
//         $checkedByImageY += $imageHeight + 10; // Move to next row
//     }
// }

// // Move cursor below images
// $pdf->Ln($imageHeight + 1);

// // Display "Checked by" Names in one line with horizontal spacing
// $pdf->SetFont('helvetica', 'B', 8);
// $pdf->SetX(40);
// $pdf->Cell(0, 5, implode('   ', array_map('trim', $checkedByNames)), 0, 1, 'L');

// // Display "Checked by" Positions in one line with horizontal spacing
// $pdf->SetX(40);
// $pdf->Cell(0, 5, implode('   ', array_map('trim', $checkedByPositions)), 0, 1, 'L');

// $pdf->Ln(15); // Add some space
// $pdf->SetFont('helvetica', 'B', 8); // Set font to bold for emphasis
// $pdf->SetX(40);
// $pdf->Cell(0, 5, 'Approved by:', 0, 1, 'L');

// // Split the approved by image paths by " / "
// $approvedByImagePaths = explode(' / ', $approvedbyEmpNo);

// // Define the X position for the first image
// $approvedByImageX = 30; // Initial X position
// $approvedByImageY = $pdf->GetY(); // Get the current Y position
// $imageSpacing = 200; // Adjust this value to control the horizontal spacing
// $imageWidth = 40; // Width of each image
// $imageHeight = 20; // Height of each image

// // Loop through each image path
// foreach ($approvedByImagePaths as $approvedByEmpNo) {
//     $imagePath = "../ACDCS/e_signatures/{$approvedByEmpNo}.png"; // Construct the full path

//     if (file_exists($imagePath)) {
//         // Add the image to the PDF
//         $pdf->Image($imagePath, $approvedByImageX, $approvedByImageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
//     } else {
//         // Add placeholder text if the image doesn't exist (no box)
//         $pdf->SetFont('helvetica', 'I', 10);
//         $pdf->SetXY($approvedByImageX, $approvedByImageY + ($imageHeight / 2) - 2); // Center the text vertically
//         $pdf->Write(5, 'Signature image not found.');
//     }

//     // Adjust the X position for the next image
//     $approvedByImageX += $imageSpacing;

//     // Check if the next image would exceed the page width
//     if ($approvedByImageX + $imageWidth > $pdf->getPageWidth() - PDF_MARGIN_RIGHT) {
//         // Move to the next line
//         $approvedByImageX = 7; // Reset X position
//         $approvedByImageY += $imageHeight + 10; // Adjust Y position for the next row of images
//     }
// }

// // Add names under the signatures
// $pdf->SetFont('helvetica', 'B', 8);

// // Check if 'endo_approvedby' has multiple values separated by commas
// $pdf->SetX(40);
// $approvedByArray = explode(',', $lastRow['endo_approvedby']); // Split by commas
// $approvedByPositionArray = explode('/', $approvedbyPosition); // Split by commas

// // Add a title for the "Approved by" section
// $pdf->Ln(20); // Add some space

// // Prepare a string with horizontal spacing between names
// $approvedByLine = '';
// foreach ($approvedByArray as $approver) {
//     $approver = trim($approver); // Remove any extra spaces around names
//     $approvedByLine .= $approver . '                                                                                                                                                                                                                                       '; // Add extra spaces between names
// }

// $approvedByPositionLine = '';
// foreach ($approvedByPositionArray as $approverPosition){
//     $approverPosition = trim($approverPosition);
//     $approvedByPositionLine .= $approverPosition . '                                                                                                                                                                                                                                 '; // Add extra spaces between names
// }

// // Display the names in one line with horizontal spacing
// $pdf->SetX(40);
// $pdf->Cell(0, 5, $approvedByLine, 0, 1, 'L'); // Output the line with names
// $pdf->SetX(40);
// $pdf->Cell(0, 5, $approvedByPositionLine, 0, 1, 'L'); // Output the line with names

// // Initialize an array to keep track of which images have been added
// // $addedImages = [];

// foreach ($data as $row) {
//     // Split the "endo_handsOn_result" field into individual image URLs
//     $images = explode(' -|- ', $row['endo_handsOn_result']);

//     // Loop through each image and add it to the PDF only if it hasn't been added already
//     foreach ($images as $image) {
//         if (!empty($image) && !in_array($image, $addedImages)) {
//             // Ensure the image path is valid (check if the path exists, or use a relative path)
//             $imagePath = $image; // Use the image path directly from the database field

//             // Check if the image exists
//             if (file_exists($imagePath)) {
//                 // Add the image to the PDF
//                 $pdf->AddPage();

//                 // Adjust the image size to fit the page (100% width and height)
//                 $pdf->Image(
//                     $imagePath, // Path to the image
//                     16,         // X-coordinate
//                     20,         // Y-coordinate
//                     500,        // Width
//                     297,        // Height
//                     '',         // Type
//                     '',         // Link
//                     'T',        // Align
//                     false,      // Resize
//                     300,        // DPI
//                     '',         // Border
//                     false,      // Fitbox
//                     false,      // Hidden
//                     0,          // Fitonpage
//                     false,      // Alt
//                     false,      // Fitheight
//                     false       // Opacity
//                 );
//             } else {
//                 // Handle the case where the image doesn't exist
//                 $pdf->AddPage();
//                 $pdf->Text(10, 10, "Image not found: " . $imagePath);
//             }

//             // Mark this image as added by storing it in the $addedImages array
//             $addedImages[] = $image;
//         }
//     }
// }

// // Output the PDF
// $pdf->Output('Training_Endorsement.pdf', 'I');


$preparebyEmpNo = $_POST['pdf_hidden_preparedby_empno'];
$preparedbyPosition = $_POST['pdf_hidden_preparedby_position'];
$preparedByImagePath = "../ACDCS/e_signatures/{$preparebyEmpNo}.png";

$checkedbyEmpNo = $_POST['pdf_hidden_checked_empno'];
$checkedbyPosition = $_POST['pdf_hidden_checked_position'];
$checkedByImagePath = "../ACDCS/e_signatures/{$checkedbyEmpNo}.png";

$approvedbyPosition = $_POST['pdf_hidden_approvedby_position'];
$approvedbyEmpNo = $_POST['pdf_hidden_approvedby_empno'];
$approvedByImagePath = "../ACDCS/e_signatures/{$approvedbyEmpNo}.png";

// Set font for labels
$pdf->SetFont('helvetica', 'B', 8);

$pdf->SetX(40);
// Display "Prepared by"
$pdf->Cell(100, 5, 'Prepared by:', 0, 1, 'L');

$imageX = 30; // X position for images
$imageWidth = 40;
$imageHeight = 20;

$imageY = $pdf->GetY(); // Current Y position

// Display "Prepared by" image
if (file_exists($preparedByImagePath)) {
    $pdf->Image($preparedByImagePath, $imageX, $imageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
} else {
    $pdf->SetFont('helvetica', 'I', 10);
    $pdf->SetXY($imageX, $imageY);
    $pdf->Cell($imageWidth, 5, 'Signature image not found.', 0, 1, 'L');
}

$pdf->Ln($imageHeight + 1); // Move below the image

// Display "Prepared by" Name
$pdf->SetFont('helvetica', 'B', 8);
$pdf->SetX(40);
$pdf->Cell(100, 5, $lastRow['endo_preparedby'], 0, 1, 'L');

// Display "Prepared by" Position
$pdf->SetFont('helvetica', 'B', 8);
$pdf->SetX(40);
$pdf->Cell(100, 5, $preparedbyPosition, 0, 1, 'L');

$pdf->Ln(15); // Add some space before "Checked by"
$pdf->SetFont('helvetica', 'B', 8); // Set font to bold for emphasis
$pdf->SetX(40);
$pdf->Cell(0, 5, 'Checked by:', 0, 1, 'L');

// Split the "Checked by" values (multiple employees possible)
$checkedByEmpNos = explode(' / ', $checkedbyEmpNo); // Employee numbers
$checkedByPositions = explode(' / ', $checkedbyPosition); // Positions
$checkedByNames = explode(', ', $lastRow['endo_notedby']); // Names from database

// Define starting positions for images
$checkedByImageX = 30; // Initial X position
$checkedByImageY = $pdf->GetY(); // Get the current Y position
$imageSpacing = 200; // Adjust horizontal spacing
$imageWidth = 40; 
$imageHeight = 20; 

// Loop through each "Checked by" employee and display images
foreach ($checkedByEmpNos as $index => $checkedByEmpNo) {
    $imagePath = "../ACDCS/e_signatures/{$checkedByEmpNo}.png"; // Construct full path

    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, $checkedByImageX, $checkedByImageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
    } else {
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->SetXY($checkedByImageX, $checkedByImageY + ($imageHeight / 2) - 2); 
        $pdf->Write(5, 'Signature image not found.');
    }

    // Adjust X position for the next image
    $checkedByImageX += $imageSpacing;

    // Wrap to next line if needed
    if ($checkedByImageX + $imageWidth > $pdf->getPageWidth() - PDF_MARGIN_RIGHT) {
        $checkedByImageX = 30; // Reset X position
        $checkedByImageY += $imageHeight + 10; // Move to next row
    }
}

// Move cursor below images
$pdf->Ln($imageHeight + 1);

// Display "Checked by" Names with spacing
$pdf->SetFont('helvetica', 'B', 8);
$pdf->SetX(40);

// Prepare names with spacing similar to image spacing
$checkedByNamesLine = '';
foreach ($checkedByNames as $name) {
    $name = trim($name); // Remove any extra spaces
    $checkedByNamesLine .= $name . str_repeat(' ', 225); // Add the same horizontal spacing
}

// Display the names in one line with horizontal spacing
$pdf->Cell(0, 5, $checkedByNamesLine, 0, 1, 'L');

// Display "Checked by" Positions with spacing
$pdf->SetX(40);

// Prepare positions with spacing similar to image spacing
$checkedByPositionsLine = '';
foreach ($checkedByPositions as $position) {
    $position = trim($position); // Remove any extra spaces
    $checkedByPositionsLine .= $position . str_repeat(' ', 228); // Add the same horizontal spacing
}

// Display the positions in one line with horizontal spacing
$pdf->Cell(0, 5, $checkedByPositionsLine, 0, 1, 'L');

$pdf->Ln(15); // Add some space
$pdf->SetFont('helvetica', 'B', 8); // Set font to bold for emphasis
$pdf->SetX(40);
$pdf->Cell(0, 5, 'Approved by:', 0, 1, 'L');

// Split the approved by image paths by " / "
$approvedByImagePaths = explode(' / ', $approvedbyEmpNo);

// Define the X position for the first image
$approvedByImageX = 30; // Initial X position
$approvedByImageY = $pdf->GetY(); // Get the current Y position
$imageSpacing = 200; // Adjust this value to control the horizontal spacing
$imageWidth = 40; // Width of each image
$imageHeight = 20; // Height of each image

// Loop through each image path
foreach ($approvedByImagePaths as $approvedByEmpNo) {
    $imagePath = "../ACDCS/e_signatures/{$approvedByEmpNo}.png"; // Construct the full path

    if (file_exists($imagePath)) {
        // Add the image to the PDF
        $pdf->Image($imagePath, $approvedByImageX, $approvedByImageY, $imageWidth, $imageHeight, 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
    } else {
        // Add placeholder text if the image doesn't exist (no box)
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->SetXY($approvedByImageX, $approvedByImageY + ($imageHeight / 2) - 2); // Center the text vertically
        $pdf->Write(5, 'Signature image not found.');
    }

    // Adjust the X position for the next image
    $approvedByImageX += $imageSpacing;

    // Check if the next image would exceed the page width
    if ($approvedByImageX + $imageWidth > $pdf->getPageWidth() - PDF_MARGIN_RIGHT) {
        // Move to the next line
        $approvedByImageX = 7; // Reset X position
        $approvedByImageY += $imageHeight + 10; // Adjust Y position for the next row of images
    }
}

// Add names under the signatures
$pdf->SetFont('helvetica', 'B', 8);

// Check if 'endo_approvedby' has multiple values separated by commas
$pdf->SetX(40);
$approvedByArray = explode(',', $lastRow['endo_approvedby']); // Split by commas
$approvedByPositionArray = explode('/', $approvedbyPosition); // Split by commas

// Add a title for the "Approved by" section
$pdf->Ln(20); // Add some space

// Prepare a string with horizontal spacing between names
$approvedByLine = '';
foreach ($approvedByArray as $approver) {
    $approver = trim($approver); // Remove any extra spaces around names
    $approvedByLine .= $approver . '                                                                                                                                                                                                                                   '; // Add extra spaces between names
}

$approvedByPositionLine = '';
foreach ($approvedByPositionArray as $approverPosition){
    $approverPosition = trim($approverPosition);
    $approvedByPositionLine .= $approverPosition . '                                                                                                                                                                                                                            '; // Add extra spaces between names
}

// Display the names in one line with horizontal spacing
$pdf->SetX(40);
$pdf->Cell(0, 5, $approvedByLine, 0, 1, 'L'); // Output the line with names
$pdf->SetX(40);
$pdf->Cell(0, 5, $approvedByPositionLine, 0, 1, 'L'); // Output the line with names

// Initialize an array to keep track of which images have been added
// $addedImages = [];

foreach ($data as $row) {
    // Split the "endo_handsOn_result" field into individual image URLs
    $images = explode(' -|- ', $row['endo_handsOn_result']);

    // Loop through each image and add it to the PDF only if it hasn't been added already
    foreach ($images as $image) {
        if (!empty($image) && !in_array($image, $addedImages)) {
            // Ensure the image path is valid (check if the path exists, or use a relative path)
            $imagePath = $image; // Use the image path directly from the database field

            // Check if the image exists
            if (file_exists($imagePath)) {
                // Add the image to the PDF
                $pdf->AddPage();

                // Adjust the image size to fit the page (100% width and height)
                $pdf->Image(
                    $imagePath, // Path to the image
                    16,         // X-coordinate
                    20,         // Y-coordinate
                    500,        // Width
                    297,        // Height
                    '',         // Type
                    '',         // Link
                    'T',        // Align
                    false,      // Resize
                    300,        // DPI
                    '',         // Border
                    false,      // Fitbox
                    false,      // Hidden
                    0,          // Fitonpage
                    false,      // Alt
                    false,      // Fitheight
                    false       // Opacity
                );
            } else {
                // Handle the case where the image doesn't exist
                $pdf->AddPage();
                $pdf->Text(10, 10, "Image not found: " . $imagePath);
            }

            // Mark this image as added by storing it in the $addedImages array
            $addedImages[] = $image;
        }
    }
}

// Output the PDF
$pdf->Output('Training_Endorsement.pdf', 'I');


?>