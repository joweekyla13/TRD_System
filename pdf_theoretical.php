<?php
require_once('TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
    public $exam_no;
    public $exam_name;
    public $score;
    public $rating;
    public $emp_no;
    public $emp_name;
    public $date_hired;
    public $position;
    public $exam_date;
    public $exam_take;
    public $exam_instructions;

    public $points_earned;
    public $points;
    public $q_num;
    public $question;
    public $desc;
    public $image;
    public $choices;
    public $user_answer;
    public $answer;


    // Load table data from database
    public function LoadData() {
        include 'db_config/db_trds.php';
        
        // Get the document number from the POST data
        $exam_no = $_POST['pdf_exam_no'];
        $emp_no = $_POST['pdf_emp_no'];
        $date_hired = $_POST['pdf_date_hired'];
        $exam_date = $_POST['pdf_exam_date'];
        $exam_take = $_POST['pdf_exam_take'];

        // SQL query to fetch data
        $select = "SELECT 
            result_exam_pkid, 
            result_exam_purpose, 
            result_exam_position, 
            result_exam_passing_score, 
            result_emp_no, 
            result_emp_name, 
            result_date_hired, 
            result_position, 
            result_exam_date, 
            result_exam_take, 
            result_q_num, 
            result_q_type, 
            result_q_image, 
            result_q_desc, 
            result_q_question, 
            result_q_choices, 
            result_q_points, 
            result_q_answer, 
            result_qc_answer, 
            result_qc_points, 
            result_qc_score, 
            result_qc_total, 
            result_exam_status, 
            result_isChecked,
        exam_remarks,
            GROUP_CONCAT(DISTINCT result_q_question ORDER BY result_q_question SEPARATOR ', ') AS all_questions,
            GROUP_CONCAT(DISTINCT result_q_choices ORDER BY result_q_choices SEPARATOR ', ') AS all_choices,
            GROUP_CONCAT(DISTINCT result_q_answer ORDER BY result_q_answer SEPARATOR ', ') AS all_answers,
            GROUP_CONCAT(DISTINCT result_qc_answer ORDER BY result_qc_answer SEPARATOR ', ') AS user_answers
        FROM tbl_exam_records 
        INNER JOIN tbl_exams 
            ON tbl_exam_records.result_exam_pkid = tbl_exams.pkid
        WHERE 
            result_emp_no = '$emp_no'
            AND result_exam_pkid = '$exam_no'
            AND result_exam_take = '$exam_take'
            AND result_isChecked = '1'
            AND tbl_exam_records.logdel = '0'
        GROUP BY 
            result_exam_pkid, result_exam_purpose, result_exam_position, result_exam_passing_score, 
            result_emp_no, result_emp_name, result_date_hired, result_position, result_exam_date, 
            result_exam_take, result_q_num, result_q_type, result_q_image, result_q_desc, result_q_question, 
            result_q_choices, result_q_points, result_q_answer, result_qc_answer, result_qc_points, 
            result_qc_score, result_qc_total, result_exam_status, result_isChecked";

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

    // Custom header
    public function Header() {
        // Only display header on the first page
        if ($this->getPage() == 1) {
            // Centered Title
            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(0, 10, 'Theoretical Exam Result', 0, 1, 'C'); // 'C' for center alignment
    
            $this->Ln(5); // Add spacing after the title
    
            // Display Score and Rating
            $this->SetFont('helvetica', 'B', 8); // Bold for labels
            $this->Cell(90, 5, 'Score:', 0, 0, 'R'); // Label for Score
            $this->Cell(35, 5, 'Passing Score:', 0, 0, 'R'); // Label for Passing Score
            $this->Cell(30, 5, 'Percentage:', 0, 0, 'R'); // Label for Percentage
            $this->Cell(20, 5, 'Rating:', 0, 1, 'R'); // Label for Rating
    
            // Display values for Score and Rating with bigger font size
            $this->SetFont('helvetica', 'B', 12); // Bigger font for values
            $this->Cell(91, 8, $this->score, 0, 0, 'R'); // Value for Score

            $this->SetFont('helvetica', 'B', 12); // Bigger font for values
            $this->Cell(27, 8, $this->passing_score, 0, 0, 'R');

            $this->SetFont('helvetica', 'B', 12); // Bigger font for values
            $this->Cell(33, 8, $this->percentage, 0, 0, 'R'); // Value for Score
    
            // Conditional coloring for Rating
            if (strtoupper($this->rating) === '       PASSED        ') {
                $this->SetTextColor(0, 128, 0); // Green for PASSED
            } elseif (strtoupper($this->rating) === 'FAILED / DISQUALIFIED') {
                $this->SetTextColor(255, 0, 0); // Red for FAILED
            } elseif (strtoupper($this->rating) === '    CONDITIONAL') {
                $this->SetTextColor(255, 191, 0);
            }
            
            $this->SetCellPadding(1);
            // $this->Cell(40, 8, $this->rating, 0, 1, 'R');
            $this->MultiCell(37, 8, $this->rating, 0, 'C', 0); // Value for Rating
            $this->SetTextColor(0, 0, 0); // Reset to black for other text
    
            // Add spacing before Exam Name
            // $this->Ln(3);
    
            // Display Exam Name below Score and Rating
            $this->SetFont('helvetica', 'B', 10);
            $this->Cell(40, 5, 'Exam Name:', 0, 0, 'L');
            $this->SetFont('helvetica', '', 10);
            $this->Cell(75, 5, $this->exam_name, 0, 1, 'L'); 

            $this->SetFont('helvetica', 'B', 10);
            $this->Cell(40, 5, 'Date of Examination: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 10);
            $this->Cell(75, 5, $this->exam_date, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 10);
            $this->Cell(40, 5, 'Examination Take: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 10);
            $this->Cell(75, 5, $this->exam_take, 0, 1, 'L');
    
            // Additional details below
            $this->SetFont('helvetica', 'B', 10);
            $this->Cell(40, 5, 'Employee Number: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 10);
            $this->Cell(75, 5, $this->emp_no, 0, 1, 'L');
            
            $this->SetFont('helvetica', 'B', 10);
            $this->Cell(40, 5, 'Employee Name: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 10);
            $this->Cell(75, 5, $this->emp_name, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 10);
            $this->Cell(40, 5, 'Date Hired: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 10);
            $this->Cell(75, 5, $this->date_hired, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 10);
            $this->Cell(40, 5, 'Position: ', 0, 0, 'L');
            $this->SetFont('helvetica', '', 10);
            $this->Cell(75, 5, $this->position, 0, 1, 'L');

            // Separator line
            $this->Ln(3);
            $this->SetDrawColor(0, 0, 0); // Black line
            $this->Line($this->GetX(), $this->GetY(), $this->GetX() + 190, $this->GetY()); // Draw line

            $this->Ln(3);

            $this->SetFont('helvetica', 'I', 10);
            $this->MultiCell(185, 5, 'Please take note that options/choices with [x] are the selected answer of the employee and the correct answers were shown below. In addition questions without Correct Answer means that it was an Essay type of question. Thank you! ', 0, 'L');
    
            // Separator line
            $this->Ln(3);
            $this->SetDrawColor(0, 0, 0); // Black line
            $this->Line($this->GetX(), $this->GetY(), $this->GetX() + 190, $this->GetY()); // Draw line
    
            $this->Ln(3);

            $this->SetFont('helvetica', 'B', 10);
            $this->Cell(25, 5, 'Instructions: ', 0, 1, 'L');

            $this->Ln(2);

            $this->SetFont('helvetica', '', 10);
            $this->MultiCell(185, 5, $this->exam_instructions, 0, 'L');

            $this->Ln(5);
        }
    }     
}

// Create new PDF document with landscape orientation
$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TRD System');
$pdf->SetTitle('Theoretical Examination Result');
$pdf->SetSubject('Theoretical Examination Result');
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
    // $pdf->exam_name = str_replace(' for ', 'Examination', $lastRow['result_exam_purpose']);
    $pdf->exam_name = str_replace('/', '', $lastRow['result_exam_purpose']) . ' for ' . $lastRow['result_exam_position'] . ' Examination ';
    $pdf->score = str_replace('/', '', $lastRow['result_qc_score']) . '/' . $lastRow['result_qc_total'];
    $pdf->passing_score = $lastRow['result_exam_passing_score'];
    $percent = $lastRow['result_qc_score'] / $lastRow['result_qc_total'] * 100;
    $pdf->percentage = round($percent) . '%';

    if($lastRow['result_exam_take'] == '1') {
        if($percent == 100) {
            $pdf->rating = '       PASSED        ';
        } elseif ($percent >= 70 && $percent <= 99) {
            $pdf->rating = '    CONDITIONAL';
        } else {
            $pdf->rating = 'FAILED / DISQUALIFIED';
        }
    } elseif ($lastRow['result_exam_take'] == '2') {
        if($percent == 100) {
            $pdf->rating = '       PASSED        ';
        } elseif ($percent >= 90 && $percent <= 99) {
            $pdf->rating = '    CONDITIONAL';
        } else {
            $pdf->rating = 'FAILED / DISQUALIFIED';
        }
    } elseif ($lastRow['result_exam_take'] == '3') {
        if($percent == 100) {
            $pdf->rating = '       PASSED        ';
        } else {
            $pdf->rating = 'FAILED / DISQUALIFIED';
        }
    }
    // $pdf->rating = $lastRow['result_qc_score'] >= $lastRow['result_exam_passing_score'] ? 'PASSED' : 'FAILED';

    $pdf->emp_no = $lastRow['result_emp_no'];
    $pdf->emp_name = $lastRow['result_emp_name'];
    $pdf->date_hired = $lastRow['result_date_hired'];
    $pdf->position = $lastRow['result_position'];
    $pdf->exam_date = $lastRow['result_exam_date'];
    // $exam_take = $lastRow['result_exam_take'];

    if($lastRow['result_exam_take'] == '1') {
        $pdf->exam_take = '1st Take';
    } elseif ($lastRow['result_exam_take'] == '2') {
        $pdf->exam_take = '2nd Take';
    } elseif ($lastRow['result_exam_take'] == '3') {
        $pdf->exam_take = '3rd Take';
    }
    $pdf->exam_instructions = $lastRow['exam_remarks'];

    // $pdf->user_answer = explode(', ', $lastRow['all_answers']);
}

// Set font and add a page
$pdf->SetFont('helvetica', '', 8);
$pdf->AddPage();

$pdf->Ln(100); // Add some space before the questions

// 12/16/2024
if (!empty($data)) {
    foreach ($data as $key => $row) {

        // Split questions
        $all_question = explode(', ', $row['all_questions']);
        // Split choices and user answers
        $all_choices = explode(', ', $row['all_choices']);
        $user_answers = explode(', ', $row['user_answers']);
        $all_answer = explode(', ', $row['all_answers']);

        if ($row['result_q_type'] == 'CHOICES') {

            // 12/16/2024
            $pdf->SetFont('helvetica', 'B', 10);

            // Align result_q_num and result_q_question horizontally
            $pdf->Cell(10, 5, $row['result_q_num'] . '.', 0, 0, 'L');

            // Set font for the question and display result_q_question
            // $pdf->SetFont('helvetica', '', 10);
            // $pdf->Multicell(175, 5, $row['result_q_question'], 0, 'L');

            // // Set result_qc_points color (green if not 0, red if 0)
            // if ($row['result_qc_points'] != 0) {
            //     $pdf->SetTextColor(0, 128, 0); // Green color
            // } else {
            //     $pdf->SetTextColor(255, 0, 0); // Red color
            // }

            // // Display result_qc_points
            // $pdf->Cell(55, 5, $row['result_qc_points'], 0, 0, 'R');

            // 1/13/2025
            $pdf->SetFont('helvetica', '', 10);

            // Save the current Y position (top of the row)
            $currentY = $pdf->GetY();
            $currentX = $pdf->GetX(); // Save the starting X position

            // Calculate the height of the MultiCell
            $multicellHeight = $pdf->getStringHeight(160, $row['result_q_question']);

            // Output the question using MultiCell
            $pdf->MultiCell(175, 5, $row['result_q_question'], 0, 'L');

            // Reset the Y position to the top of the row for the points
            $pdf->SetXY(175, $currentY); // Adjust 185 to place the Cell at the desired right alignment

            // Set result_qc_points color (green if not 0, red if 0)
            if ($row['result_qc_points'] != 0) {
                $pdf->SetTextColor(0, 128, 0); // Green color
            } else {
                $pdf->SetTextColor(255, 0, 0); // Red color
            }

            // Output the points
            $pdf->Cell(25, 5, $row['result_qc_points'], 0, 0, 'R');

            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(2, 5, '/', 0, 0, 'R');

            // Set result_q_points color to primary (blue for example)
            $pdf->SetTextColor(0, 0, 255); // Blue color

            // Display result_q_points
            $pdf->Cell(3, 5, $row['result_q_points'], 0, 0, 'R');

            // Reset text color to black for future text
            $pdf->SetTextColor(0, 0, 0);

            // Add '*' after result_q_points
            $pdf->Cell(2, 5, '*', 0, 1, 'R');

            // Reset the Y position for the next row
            $pdf->SetY($currentY + $multicellHeight);

            // Reset text color to black for future text
            $pdf->SetTextColor(0, 0, 0);

            $pdf->Ln(3);

            if ($row['result_q_image'] != 'uploads/no_image.png') {
                $image_path = $row['result_q_image']; // e.g., 'uploads/cat.jpg'
                if (file_exists($image_path)) {
                    $width = 30;
                    $height = 30;

                    // Calculate X position to center the image
                    $pageWidth = $pdf->GetPageWidth();
                    $centerX = ($pageWidth - $width) / 2;

                    // Add the image
                    $pdf->Image($image_path, $centerX, $pdf->GetY(), $width, $height);

                    // Move the cursor down after the image
                    $pdf->Ln($height / 2);

                    // $pdf->Image($row['result_q_image'], $pdf->GetX(), $pdf->GetY(), 48, 48);
                    // // Move cursor position to the right of the image
                    // $pdf->SetX($pdf->GetX() + 50);

                    $pdf->Ln(27);

                } else {
                    // Display a placeholder if the image doesn't exist
                    $pdf->Cell(0, 10, 'Image not found: ' . $image_path, 0, 1, 'C');
                }
            }

            foreach ($all_choices as $choice) {
                $is_checked = in_array($choice, $user_answers) ? '[x]' : '[ ]';
                    
                    // Write choice with indicator
                    $pdf->SetFont('helvetica', '', 10);
                    $pdf->Cell(5, 5, '', 0, 0, 'L');
                    $pdf->Cell(10, 5, $is_checked, 0, 0, 'L');
                    $pdf->Cell(0, 5, $choice, 0, 1, 'L');
            }

            $pdf->Ln(3);
    
            // Display correct answer
            $pdf->SetFont('helvetica', 'B', 10);
            $pdf->Cell(30, 7, 'Correct Answer:', 0, 0, 'L');
            $pdf->SetFont('helvetica', '', 10);
            $pdf->Cell(100, 7, $row['result_q_answer'], 0, 1, 'L');
            
            $pdf->Ln(5);

            // FOR TEXT TYPE OF QUESTIONS
        } else if ($row['result_q_type'] == 'TEXT') {
            // Display question number and question
            // $pdf->SetFont('helvetica', 'B', 10);
            // $pdf->Cell(5, 5, $row['result_q_num'] . '.', 0, 0, 'L');
            // $pdf->SetFont('helvetica', '', 10);
            // $pdf->MultiCell(175, 4, $row['result_q_question'], 0, 'L');

            // $pdf->Ln(3);

            
            // 12/16/2024
            $pdf->SetFont('helvetica', 'B', 10);

            // Align result_q_num and result_q_question horizontally
            $pdf->Cell(10, 5, $row['result_q_num'] . '.', 0, 0, 'L');

            $pdf->SetFont('helvetica', '', 10);

            // Save the current Y position (top of the row)
            $currentY = $pdf->GetY();
            $currentX = $pdf->GetX(); // Save the starting X position

            // Calculate the height of the MultiCell
            $multicellHeight = $pdf->getStringHeight(160, $row['result_q_question']);

            // Output the question using MultiCell
            $pdf->MultiCell(175, 5, $row['result_q_question'], 0, 'L');

            // Reset the Y position to the top of the row for the points
            $pdf->SetXY(175, $currentY); // Adjust 185 to place the Cell at the desired right alignment

            // Set result_qc_points color (green if not 0, red if 0)
            if ($row['result_qc_points'] != 0) {
                $pdf->SetTextColor(0, 128, 0); // Green color
            } else {
                $pdf->SetTextColor(255, 0, 0); // Red color
            }

            // Output the points
            $pdf->Cell(25, 5, $row['result_qc_points'], 0, 0, 'R');

            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(2, 5, '/', 0, 0, 'R');

            // Set result_q_points color to primary (blue for example)
            $pdf->SetTextColor(0, 0, 255); // Blue color

            // Display result_q_points
            $pdf->Cell(3, 5, $row['result_q_points'], 0, 0, 'R');

            // Reset text color to black for future text
            $pdf->SetTextColor(0, 0, 0);

            // Add '*' after result_q_points
            $pdf->Cell(2, 5, '*', 0, 1, 'R');

            // Reset the Y position for the next row
            $pdf->SetY($currentY + $multicellHeight);

            // Reset text color to black for future text
            $pdf->SetTextColor(0, 0, 0);

            $pdf->Ln(3);

            if ($row['result_q_image'] != 'uploads/no_image.png') {
                $image_path = $row['result_q_image']; // e.g., 'uploads/cat.jpg'
                if (file_exists($image_path)) {
                    $width = 50;
                    $height = 50;

                    // Calculate X position to center the image
                    $pageWidth = $pdf->GetPageWidth();
                    $centerX = ($pageWidth - $width) / 2;

                    // Add the image
                    $pdf->Image($image_path, $centerX, $pdf->GetY(), $width, $height);

                    // Move the cursor down after the image
                    $pdf->Ln($height / 2);

                    // $pdf->Image($row['result_q_image'], $pdf->GetX(), $pdf->GetY(), 48, 48);
                    // // Move cursor position to the right of the image
                    // $pdf->SetX($pdf->GetX() + 50);

                    $pdf->Ln(27);

                } else {
                    // Display a placeholder if the image doesn't exist
                    $pdf->Cell(0, 10, 'Image not found: ' . $image_path, 0, 1, 'C');
                }
            }

            
            // Display choices with indicators
            foreach ($all_choices as $choice) {
                $pdf->SetFont('helvetica', 'IB', 10);
                $pdf->Cell(5, 5, '', 0, 0, 'L');
                $pdf->Cell(17, 5, 'Answer :', 0, 0, 'L');
                $pdf->SetFont('helvetica', 'U', 10);
            
                // Align the answer text to start at the same horizontal position as "Answer :"
                $currentX = $pdf->GetX();
                $currentY = $pdf->GetY();
                $pdf->SetXY($currentX, $currentY);
            
                $pdf->MultiCell(175, 5, $row['result_qc_answer'], 0, 'L');
            }

            $pdf->Ln(3);

            if($row['result_q_answer'] != 'N/A') {
                // Display correct answer
                $pdf->SetFont('helvetica', 'B', 10);
                $pdf->Cell(30, 7, 'Correct Answer:', 0, 0, 'L');
                $pdf->SetFont('helvetica', '', 10);
                $pdf->Cell(100, 7, $row['result_q_answer'], 0, 1, 'L');
                
                $pdf->Ln(5);
            } else {
                $pdf->Ln(5);
            }

            // FOR GRID TYPE OF QUESTIONS
        } else if ($row['result_q_type'] == 'GRID') {
            // Display question number and question
            // $pdf->SetFont('helvetica', 'B', 10);
            // $pdf->Cell(5, 5, $row['result_q_num'] . '.', 0, 0, 'L');
            // $pdf->SetFont('helvetica', '', 10);
            // $pdf->MultiCell(175, 4, $row['result_q_desc'], 0, 'L');

            // $pdf->Ln(3);

            
            // 12/16/2024
            $pdf->SetFont('helvetica', 'B', 10);

            // Align result_q_num and result_q_question horizontally
            $pdf->Cell(10, 5, $row['result_q_num'] . '.', 0, 0, 'L');

            // Set font for the question and display result_q_desc
            $pdf->SetFont('helvetica', '', 10);

            // Save the current Y position (top of the row)
            $currentY = $pdf->GetY();
            $currentX = $pdf->GetX(); // Save the starting X position

            // Calculate the height of the MultiCell
            $multicellHeight = $pdf->getStringHeight(160, $row['result_q_desc']);

            // Output the question using MultiCell
            $pdf->MultiCell(175, 5, $row['result_q_desc'], 0, 'L');

            // Reset the Y position to the top of the row for the points
            $pdf->SetXY(175, $currentY); // Adjust 185 to place the Cell at the desired right alignment

            // Set result_qc_points color (green if not 0, red if 0)
            if ($row['result_qc_points'] != 0) {
                $pdf->SetTextColor(0, 128, 0); // Green color
            } else {
                $pdf->SetTextColor(255, 0, 0); // Red color
            }

            // Output the points
            $pdf->Cell(25, 5, $row['result_qc_points'], 0, 0, 'R');

            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(2, 5, '/', 0, 0, 'R');

            // Set result_q_points color to primary (blue for example)
            $pdf->SetTextColor(0, 0, 255); // Blue color

            // Display result_q_points
            $pdf->Cell(3, 5, $row['result_q_points'], 0, 0, 'R');

            // Reset text color to black for future text
            $pdf->SetTextColor(0, 0, 0);

            // Add '*' after result_q_points
            $pdf->Cell(2, 5, '*', 0, 1, 'R');

            // Reset the Y position for the next row
            $pdf->SetY($currentY + $multicellHeight);

            // Reset text color to black for future text
            $pdf->SetTextColor(0, 0, 0);

            $pdf->Ln(3);

            if ($row['result_q_image'] != 'uploads/no_image.png') {
                $image_path = $row['result_q_image']; // e.g., 'uploads/cat.jpg'
                if (file_exists($image_path)) {
                    $width = 50;
                    $height = 50;

                    // Calculate X position to center the image
                    $pageWidth = $pdf->GetPageWidth();
                    $centerX = ($pageWidth - $width) / 2;

                    // Add the image
                    $pdf->Image($image_path, $centerX, $pdf->GetY(), $width, $height);

                    // Move the cursor down after the image
                    $pdf->Ln($height / 2);

                    // $pdf->Image($row['result_q_image'], $pdf->GetX(), $pdf->GetY(), 48, 48);
                    // // Move cursor position to the right of the image
                    // $pdf->SetX($pdf->GetX() + 50);

                    $pdf->Ln(27);

                } else {
                    // Display a placeholder if the image doesn't exist
                    $pdf->Cell(0, 10, 'Image not found: ' . $image_path, 0, 1, 'C');
                }
            }
        
            $pdf->Ln(2);
        
            $pdf->SetFont('helvetica', 'B', 8);  // Set font size to 8 for better fitting

            // Dynamically adjust the width of the question column based on the longest question
            $max_question_length = max(array_map('strlen', $all_question));  // Find the length of the longest question
            $questionColumnWidth = max(20, $max_question_length * 2);  // Set a minimum width of 40, and multiply by 2 for better fitting

            // Calculate the remaining width for the choices columns
            $total_width = 190;  // Total available width
            $remaining_width = $total_width - $questionColumnWidth;  // Subtract the question column width from total available width
            $choiceColumnWidth = max($remaining_width / count($all_choices), 15);  // Dynamically adjust width for choices, ensure a minimum of 15

            // Calculate total table width
            $table_width = $questionColumnWidth + (count($all_choices) * $choiceColumnWidth);

            // Center the table: X position = (page width - table width) / 2
            $page_width = 210;  // Standard A4 width in mm (for PDF)
            $centered_x = ($page_width - $table_width) / 2;

            // Set X position to center the table
            $pdf->SetX($centered_x);

            // Add the header row
            $pdf->Cell($questionColumnWidth, 7, 'QUESTIONS', 1, 0, 'C');
            foreach ($all_choices as $choice) {
                $pdf->Cell($choiceColumnWidth, 7, $choice, 1, 0, 'C');
            }
            $pdf->Ln();

            // Map user answers and correct answers
            $user_answers_map = array_combine($all_question, $user_answers);
            $correct_answers_map = array_combine($all_question, $all_answer);

            // Displaying questions and user answers
            foreach ($all_question as $question) {
                $pdf->SetX($centered_x);  // Set X position for each row to be centered
                $pdf->SetFont('helvetica', '', 8);  // Smaller font size for question rows
                $pdf->Cell($questionColumnWidth, 7, $question, 1, 0, 'L');
                
                foreach ($all_choices as $choice) {
                    $is_checked = ($user_answers_map[$question] === $choice) ? '[x]' : '[ ]';
                    $pdf->Cell($choiceColumnWidth, 7, $is_checked, 1, 0, 'C');
                }
                $pdf->Ln();
            }

            // Insert a line break between sections
            $pdf->Ln(3);

            // Correct Answer Section
            $pdf->SetFont('helvetica', 'B', 10);
            $pdf->Cell(30, 7, 'Correct Answer:', 0, 0, 'L');
            $pdf->Ln();

            $pdf->SetFont('helvetica', 'B', 8);

            $pdf->SetX($centered_x);  // Set X position for the correct answer section

            // Displaying correct answers
            $pdf->Cell($questionColumnWidth, 5, 'QUESTIONS', 1, 0, 'C');
            foreach ($all_choices as $choice) {
                $pdf->Cell($choiceColumnWidth, 5, $choice, 1, 0, 'C');
            }
            $pdf->Ln();

            foreach ($all_question as $question) {
                $pdf->SetX($centered_x);  // Set X position for each row to be centered
                $pdf->SetFont('helvetica', '', 8);
                $pdf->Cell($questionColumnWidth, 7, $question, 1, 0, 'L');
                
                foreach ($all_choices as $choice) {
                    $is_checked = ($correct_answers_map[$question] === $choice) ? '[x]' : '[ ]';
                    $pdf->Cell($choiceColumnWidth, 7, $is_checked, 1, 0, 'C');
                }
                $pdf->Ln();
            }

        $pdf->Ln(5);

        }
    }
} else {
    // $pdf->Cell(0, 10, 'No data available for this exam.', 0, 1, 'C');
    $pdf->Ln(5);
}


//Output PDF
// Generate filename with emp_no as part of the name
$filename = $pdf->emp_no . '_Theoretical_Exam_Result_' . '.pdf';

// Output the PDF (download or save it to a file)
$pdf->Output($filename, 'I');

// $pdf->Output($this->emp_no . '_theoretical_exam_result.pdf', 'I');
?>