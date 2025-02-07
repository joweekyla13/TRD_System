<?php
require_once('TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
    public $docno;
    public $classification;
    public $reason;
    public $memo_to;
    public $memo_from;
    public $subject;
    public $date_now;
    public $department;
    public $section;

    // Load table data from database
    public function LoadData() {
        include 'db_config/db_trds.php';
        
        // Get the document number from the POST data
        $docno = $_POST['pdf_hidden_docno'];
        $empNo = $_POST['pdf_hidden_empno'];

        // SQL query to fetch data
        $select = "
        
        SELECT *
        FROM tbl_memo
        INNER JOIN tbl_user ON tbl_memo.preparedby = tbl_user.EmpName
        WHERE docno = '$docno'
        AND tbl_memo.empNo = '$empNo'
        AND tbl_memo.logdel = '0'
        AND tbl_user.logdel = '0'
        
        
        
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

    public function ColoredTable($header1, $header2, $header3, $header4, $header5, $data) {
        // Colors, line width, and bold font
        $this->SetFillColor(255, 255, 255); // White
        $this->SetTextColor(0); // Black text
        $this->SetDrawColor(0, 0, 0); // Black borders
        $this->SetLineWidth(0.01);
        $this->SetFont('', '', 10);
        
        // Table 1 (Employee Data)
        $w1 = array(55, 30, 40, 55); // Column widths for first table
        $num_headers1 = count($header1);
        
        // Define the header row height (adjust this value as needed)
        $header_row_height = 10; // You can adjust this to change header height

        // Print the first table header with dynamic height
        foreach ($header1 as $i => $header) {
            // You can adjust header row height dynamically based on content here
            $this->Cell($w1[$i], $header_row_height, $header, 1, 0, 'C', 1);
        }
        $this->Ln();
        
        // Restore color and font for table rows
        $this->SetFillColor(224, 235, 255); // Light gray for alternating rows
        $this->SetTextColor(0);
        
        $fill = 0;
        
        // Print the first table rows (Emp# , Full Name, Date Hired, Pos/Dept/Sec)
        foreach ($data as $row) {
            $row_height = 0;
            
            // Calculate the required row height based on content
            $row_content = array(
                $row['empNo'],
                $row['fullname'],
                $row['date_hired'],
                $row['pds']
            );
            
            foreach ($row_content as $key => $column_value) {
                $num_lines = $this->getNumLines($column_value, $w1[$key]);
                $cell_height = $num_lines * 7;
                if ($cell_height > $row_height) {
                    $row_height = $cell_height;
                }
            }
            
            // Print cells for the first table
            $this->SetCellPadding(3); // Increase padding (default is 1)
            $this->MultiCell($w1[0], $row_height, $row['fullname'], 1, 'C', $fill, 0);
            $this->MultiCell($w1[1], $row_height, $row['empNo'], 1, 'C', $fill, 0);
            $this->MultiCell($w1[2], $row_height, date("F j, Y", strtotime($row['date_hired'])), 1, 'C', $fill, 0);

            $this->SetCellPadding(1); // Increase padding (default is 1)
            $this->MultiCell($w1[3], $row_height, $row['pds'], 1, 'C', $fill, 1);
            
            $fill = !$fill; // Alternate row color
        }
        
        // Closing line for the first table
        $this->Cell(array_sum($w1), 0, '', 'T');

        // Add a space between tables
        $this->Ln(0.5);

// __________________________________________________________________________________________________________________

    
        // Table 3 (Memo-related Info, if any)
        // Column widths for the third table (Custom memo fields like 'Classification' etc.)
        $w3 = array(85, 40, 55);
        $num_headers3 = count($header3);
        
        // Define header height for table 3
        $header_row_height_3 = 3; // Adjust this to change header height for table 3

        // Print the third table header with dynamic height
        $this->SetFillColor(34, 139, 34); // Forest Green
        $this->SetTextColor(255, 255, 255); // White font color
        $this->SetFont('', '', 8);
        foreach ($header3 as $i => $header) {
            $this->Cell($w3[$i], $header_row_height_3, $header, 1, 0, 'C', 1);
        }
        $this->Ln();
        
        // Print rows for the third table (You can add rows related to memo here)
        $fill = 0;

        // Inside the loop for Table 3, modify how you handle the 'fromto' values
        $this->SetFont('', '', 10);
        $this->SetTextColor(0, 0, 0);
        foreach ($data as $row) {
        // Initialize an array to store all 'fromto' dates

        // Calculate the required row height based on content
        $row_height = 0;
        $row_content = array(
            $row['venue'],
            $row['endorsementDate'],
            '(%)'
        );
        
        foreach ($row_content as $key => $column_value) {
            $num_lines = $this->getNumLines($column_value, $w3[$key]);
            $cell_height = $num_lines * 4;
            if ($cell_height > $row_height) {
                $row_height = $cell_height;
            }
        }

        // Print the cells for this row
        $this->SetCellPadding(5); // Increase padding (default is 1)
        $this->MultiCell($w3[0], $row_height, $row['venue'], 1, 'C', $fill, 0);
        $this->MultiCell($w3[1], $row_height, date("F j, Y", strtotime($row['endorsementDate'])), 1, 'C', $fill, 0);
        $this->MultiCell($w3[2], $row_height, '(%)', 1, 'C', $fill, 1);

        $fill = !$fill; // Alternate row color
    }

        
        // Closing line for the third table
        $this->Cell(array_sum($w3), 0, '', 'T');

                
        // Add a space between tables
        $this->Ln(.5);

// __________________________________________________________________________________________________________________

    // WORKING NAAAA (DONT TOUCH THIS!)
    // foreach ($data as $row) {
    //     // Split the titles and remarks
    //     $titles = explode(" | ", $row['title']);
    //     $remarks = explode(" | ", $row['remarks']);
    
    //     // Handle "General Knowledge" rows
    //     if (strpos($row['title'], "General Knowledge") !== false) {
    //         echo "Header 2"; // Table for General Knowledge
    //         $w2 = array(125, 55);
    //         $num_headers2 = count($header2);
    
    //         // Print the second table header
    //         $this->SetFillColor(154, 205, 50); // Olive Green
    //         $this->SetTextColor(0, 0, 0); // Black font color
    //         $this->SetFont('', 'B', 10);
    //         foreach ($header2 as $i => $header) {
    //             $this->Cell($w2[$i], 7, $header, 1, 0, 'C', 1);
    //         }
    //         $this->Ln();
    
    //         // Print rows for General Knowledge table
    //         $fill = 0;
    //         $this->SetFont('', '', 10);
    //         $row_height = 0;
    
    //         // Iterate through the titles and remarks
    //         foreach ($titles as $index => $title) {
    //             if (strpos($title, "General Knowledge") !== false) {
    //                 // Calculate row height based on content
    //                 $row_content = array($title, $remarks[$index]);
    
    //                 foreach ($row_content as $key => $column_value) {
    //                     $num_lines = $this->getNumLines($column_value, $w2[$key]);
    //                     $cell_height = $num_lines * 50;
    //                     if ($cell_height > $row_height) {
    //                         $row_height = $cell_height;
    //                     }
    //                 }
    
    //                 // Process and format the row data for General Knowledge
    //                 $formatted_title = $this->formatTitle($title);
    //                 $formatted_remarks = $this->formatRemarks($remarks[$index]);
    
    //                 // Print cells for General Knowledge
    //                 $this->MultiCell($w2[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
    //                 $this->MultiCell($w2[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
    
    //                 $fill = !$fill; // Alternate row colors
    //             }
    //         }
    
    //         // Closing line for General Knowledge Table
    //         $this->Cell(array_sum($w2), 0, '', 'T');
    //         $this->Ln(0.5);
    //     }
    
    //     // Handle "Basic Job Knowledge" rows
    //     if (strpos($row['title'], "Basic Job Knowledge") !== false) {
    //         echo "Header 4"; // Table for Basic Job Knowledge
    //         $w4 = array(125, 55);
    //         $num_headers4 = count($header4);
    
    //         // Print the table header for Basic Job Knowledge
    //         $this->SetFillColor(154, 205, 50);
    //         $this->SetFont('', 'B', 10);
    //         foreach ($header4 as $i => $header) {
    //             $this->Cell($w4[$i], 7, $header, 1, 0, 'C', 1);
    //         }
    //         $this->Ln();
    
    //         // Print rows for Basic Job Knowledge table
    //         $fill = 0;
    //         $this->SetFont('', '', 10);
    //         $row_height = 0;
    
    //         // Iterate through the titles and remarks
    //         foreach ($titles as $index => $title) {
    //             if (strpos($title, "Basic Job Knowledge") !== false) {
    //                 // Calculate row height based on content
    //                 $row_content = array($title, $remarks[$index]);
    
    //                 foreach ($row_content as $key => $column_value) {
    //                     $num_lines = $this->getNumLines($column_value, $w4[$key]);
    //                     $cell_height = $num_lines * 50;
    //                     if ($cell_height > $row_height) {
    //                         $row_height = $cell_height;
    //                     }
    //                 }
    
    //                 // Process and format the row data for Basic Job Knowledge
    //                 $formatted_title = $this->formatTitle($title);
    //                 $formatted_remarks = $this->formatRemarks($remarks[$index]);
    
    //                 // Print cells for Basic Job Knowledge
    //                 $this->MultiCell($w4[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
    //                 $this->MultiCell($w4[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
    
    //                 $fill = !$fill; // Alternate row colors
    //             }
    //         }
    
    //         // Closing line for Basic Job Knowledge Table
    //         $this->Cell(array_sum($w4), 0, '', 'T');
    //         $this->Ln(0.5);
    //     }
    // }  

    // WORKING NAAAA (DITO LANG GAGALAW)
    foreach ($data as $row) {
        // Split the titles and remarks
        $titles = explode(" | ", $row['title']);
        $remarks = explode(" | ", $row['remarks']);
    
        // Handle "General Knowledge" rows
        if (strpos($row['title'], "General Knowledge") !== false) {
            echo "Header 2"; // Table for General Knowledge
            $w2 = array(125, 55);
            $num_headers2 = count($header2);
    
            // Print the second table header
            $this->SetFillColor(154, 205, 50); // Olive Green
            $this->SetTextColor(0, 0, 0); // Black font color
            $this->SetFont('', 'B', 10);
            foreach ($header2 as $i => $header) {
                $this->Cell($w2[$i], 7, $header, 1, 0, 'C', 1);
            }
            $this->Ln();
    
            // Print rows for General Knowledge table
            $fill = 0;
            $this->SetFont('', '', 10);
            $row_height = 0;

            // Handle "General Knowledge" and "Basic Job Knowledge" rows
            foreach ($titles as $index => $title) {
                // Determine the table type based on the title
                if (strpos($title, "General Knowledge") !== false) {
                    // Set column widths for the table
                    $w = array(125, 55);
        
                    // Print table rows
                    $fill = 0;
                    $this->SetFont('', '', 10);
                    $row_height = 20; // Set row height to 20
        
                    // Format title and remarks for display
                    $formatted_title = "Part" . ($index + 1) . "\n" . trim($title);
                    $formatted_remarks = isset($remarks[$index]) ? trim($remarks[$index]) : '';
        
                    // Print cells
                    $this->SetFillColor(255, 255, 255); // White background for rows
                    $this->MultiCell($w[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
                    $this->MultiCell($w[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
        
                    // Alternate row color
                    $fill = !$fill;
                }
            }
    
            // Closing line for General Knowledge Table
            $this->Cell(array_sum($w2), 0, '', 'T');
            $this->Ln(0.5);
        }
    
        // Handle "Basic Job Knowledge" rows
        if (strpos($row['title'], "Basic Job Knowledge") !== false) {
            echo "Header 4"; // Table for Basic Job Knowledge
            $w4 = array(125, 55);
            $num_headers4 = count($header4);
    
            // Print the table header for Basic Job Knowledge
            $this->SetFillColor(154, 205, 50);
            $this->SetFont('', 'B', 10);
            foreach ($header4 as $i => $header) {
                $this->Cell($w4[$i], 7, $header, 1, 0, 'C', 1);
            }
            $this->Ln();
    
            // Print rows for Basic Job Knowledge table
            $fill = 0;
            $this->SetFont('', '', 10);
            $row_height = 0;
    
            // Iterate through the titles and remarks
            foreach ($titles as $index => $title) {
                // Determine the table type based on the title
                if (strpos($title, "Basic Job Knowledge") !== false) {
                    // Set column widths for the table
                    $w = array(125, 55);
        
                    // Print table rows
                    $fill = 0;
                    $this->SetFont('', '', 10);
                    $row_height = 20; // Set row height to 20
        
                    // Format title and remarks for display
                    $formatted_title = "Part" . ($index + 1) . "\n" . trim($title);
                    $formatted_remarks = isset($remarks[$index]) ? trim($remarks[$index]) : '';
        
                    // Print cells
                    $this->SetFillColor(255, 255, 255); // White background for rows
                    $this->MultiCell($w[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
                    $this->MultiCell($w[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
        
                    // Alternate row color
                    $fill = !$fill;
                }
            }
    
            // Closing line for Basic Job Knowledge Table
            $this->Cell(array_sum($w4), 0, '', 'T');
            $this->Ln(0.5);
        }

        if (strpos($row['title'], "8-Hour Safety Mandatory Training") !== false) {
            echo "Header 5"; // Table for General Knowledge
            $w5 = array(125, 55);
            $num_headers5 = count($header5);
    
            // Print the second table header
            $this->SetFillColor(154, 205, 50); // Olive Green
            $this->SetTextColor(0, 0, 0); // Black font color
            $this->SetFont('', 'B', 10);
            foreach ($header5 as $i => $header) {
                $this->Cell($w5[$i], 7, $header, 1, 0, 'C', 1);
            }
            $this->Ln();
    
            // Print rows for BBS table
            $fill = 0;
            $this->SetFont('', '', 10);
            $row_height = 0;

            // Handle "BBS" and "Basic Job Knowledge" rows
            foreach ($titles as $index => $title) {
                // Determine the table type based on the title
                if (strpos($title, "8-Hour Safety Mandatory Training") !== false) {
                    // Set column widths for the table
                    $w = array(125, 55);
        
                    // Print table rows
                    $fill = 0;
                    $this->SetFont('', '', 10);
                    $row_height = 20; // Set row height to 20
        
                    // Format title and remarks for display
                    $formatted_title = "Part" . ($index + 1) . "\n" . trim($title);
                    $formatted_remarks = isset($remarks[$index]) ? trim($remarks[$index]) : '';
        
                    // Print cells
                    $this->SetFillColor(255, 255, 255); // White background for rows
                    $this->MultiCell($w[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
                    $this->MultiCell($w[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
        
                    // Alternate row color
                    $fill = !$fill;
                }
            }
    
            // Closing line for BBS Table
            $this->Cell(array_sum($w5), 0, '', 'T');
            $this->Ln(0.5);
        }
    }  

    // ORIG CODE 
    // if (stripos($row['title'], 'General Knowledge') !== false) {

    //     echo "Header 2";
    //     Table 2 (Title, Remarks)
    //     Column widths for the second table (Title and Remarks)
    //     $w2 = array(125, 55);
    //     $num_headers2 = count($header2);
        
    //     // Print the second table header
    //     $this->SetFillColor(154, 205, 50); // Olive Green
    //     $this->SetTextColor(0, 0, 0); // White font color
    //     $this->SetFont('', 'B', 10);
    //     foreach ($header2 as $i => $header) {
    //         $this->Cell($w2[$i], 7, $header, 1, 0, 'C', 1); // Adjust index for second header
    //     }
    //     $this->Ln();
        
    //     // Print rows for the second table
    //     $fill = 0;
    //     $this->SetFont('', '', 10);
    //     foreach ($data as $row) {
    //         $row_height = 0;
            
    //         // Calculate the row height based on content
    //         $row_content = array(
    //             $row['title'],
    //             $row['remarks']
    //         );
            
    //         foreach ($row_content as $key => $column_value) {
    //             $num_lines = $this->getNumLines($column_value, $w2[$key]);
    //             $cell_height = $num_lines * 50;
    //             if ($cell_height > $row_height) {
    //                 $row_height = $cell_height;
    //             }
    //         }
            
    //         // Process and format "Title" and "Remarks"
    //         $this->SetCellPadding(2); // Increase padding (default is 1)
    //         $formatted_title = $this->formatTitle($row['title']);
    //         $formatted_remarks = $this->formatRemarks($row['remarks']);
            
    //         // Print cells for the second table
    //         $this->MultiCell($w2[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
    //         $this->MultiCell($w2[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
            
    //         $fill = !$fill; // Alternate row color
    //     }
        
    //     // Closing line for the second table
    //     $this->Cell(array_sum($w2), 0, '', 'T');

    //     $this->Ln(0.5);

    //     echo "Header 2";
    //     // Table 4 (Title, Remarks)
    //     $w4 = array(125, 55);
    //     $num_headers4 = count($header4);
        
    //     // Print the second table header
    //     $this->SetFillColor(154, 205, 50);        
    //     $this->SetFont('', 'B', 10);
    //     foreach ($header4 as $i => $header) {
    //         $this->Cell($w4[$i], 7, $header, 1, 0, 'C', 1); // Adjust index for second header
    //     }
    //     $this->Ln();
        
    //     // Print rows for the second table
    //     $fill = 0;
    //     $this->SetFont('', '', 10);
    //     foreach ($data as $row) {
    //         $row_height = 0;
            
    //         // Calculate the row height based on content
    //         $row_content = array(
    //             $row['title'],
    //             $row['remarks']
    //         );
            
    //         foreach ($row_content as $key => $column_value) {
    //             $num_lines = $this->getNumLines($column_value, $w4[$key]);
    //             $cell_height = $num_lines * 20;
    //             if ($cell_height > $row_height) {
    //                 $row_height = $cell_height;
    //             }
    //         }
            
    //         // Process and format "Title" and "Remarks"
    //         $formatted_title = $this->formatTitle($row['title']);
    //         $formatted_remarks = $this->formatRemarks($row['remarks']);
            
    //         // Print cells for the second table
    //         $this->MultiCell($w4[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
    //         $this->MultiCell($w4[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
            
    //         $fill = !$fill; // Alternate row color
    //     }
        
    //     // Closing line for the second table
    //     $this->Cell(array_sum($w4), 0, '', 'T');
    //     $this->Ln(.5);

    // } 
    // elseif (stripos($row['title'], 'Basic Job Knowledge') !== false) {

    //     // echo "Header 2";
    //     // Table 4 (Title, Remarks)
    //     $w4 = array(125, 55);
    //     $num_headers4 = count($header4);
        
    //     // Print the second table header
    //     $this->SetFillColor(154, 205, 50);        
    //     $this->SetFont('', 'B', 10);
    //     foreach ($header4 as $i => $header) {
    //         $this->Cell($w4[$i], 7, $header, 1, 0, 'C', 1); // Adjust index for second header
    //     }
    //     $this->Ln();
        
    //     // Print rows for the second table
    //     $fill = 0;
    //     $this->SetFont('', '', 10);
    //     foreach ($data as $row) {
    //         $row_height = 0;
            
    //         // Calculate the row height based on content
    //         $row_content = array(
    //             $row['title'],
    //             $row['remarks']
    //         );
            
    //         foreach ($row_content as $key => $column_value) {
    //             $num_lines = $this->getNumLines($column_value, $w4[$key]);
    //             $cell_height = $num_lines * 20;
    //             if ($cell_height > $row_height) {
    //                 $row_height = $cell_height;
    //             }
    //         }
            
    //         // Process and format "Title" and "Remarks"
    //         $formatted_title = $this->formatTitle($row['title']);
    //         $formatted_remarks = $this->formatRemarks($row['remarks']);
            
    //         // Print cells for the second table
    //         $this->MultiCell($w4[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
    //         $this->MultiCell($w4[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
            
    //         $fill = !$fill; // Alternate row color
    //     }
        
    //     // Closing line for the second table
    //     $this->Cell(array_sum($w4), 0, '', 'T');
    //     $this->Ln(.5);

    // } else {
        
    //     $w2 = array(125, 55);
    //     $num_headers2 = count($header2);
        
    //     // Print the second table header
    //     $this->SetFillColor(154, 205, 50); // Olive Green
    //     $this->SetTextColor(0, 0, 0); // White font color
    //     $this->SetFont('', 'B', 10);
    //     foreach ($header2 as $i => $header) {
    //         $this->Cell($w2[$i], 7, $header, 1, 0, 'C', 1); // Adjust index for second header
    //     }
    //     $this->Ln();
        
    //     // Print rows for the second table
    //     $fill = 0;
    //     $this->SetFont('', '', 10);
    //     foreach ($data as $row) {
    //         $row_height = 0;
            
    //         // Calculate the row height based on content
    //         $row_content = array(
    //             $row['title'],
    //             $row['remarks']
    //         );
            
    //         foreach ($row_content as $key => $column_value) {
    //             $num_lines = $this->getNumLines($column_value, $w2[$key]);
    //             $cell_height = $num_lines * 20;
    //             if ($cell_height > $row_height) {
    //                 $row_height = $cell_height;
    //             }
    //         }
            
    //         // Process and format "Title" and "Remarks"
    //         $this->SetCellPadding(2); // Increase padding (default is 1)
    //         $formatted_title = $this->formatTitle($row['title']);
    //         $formatted_remarks = $this->formatRemarks($row['remarks']);
            
    //         // Print cells for the second table
    //         $this->MultiCell($w2[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
    //         $this->MultiCell($w2[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
            
    //         $fill = !$fill; // Alternate row color
    //     }
        
    //     // Closing line for the second table
    //     $this->Cell(array_sum($w2), 0, '', 'T');

    //     $this->Ln(0.5);

    //     // ___________________________________________________________________________________________________________________________________

    //     $w4 = array(125, 55);
    //     $num_headers4 = count($header4);
        
    //     // Print the second table header
    //     $this->SetFillColor(154, 205, 50);        
    //     $this->SetFont('', 'B', 10);
    //     foreach ($header4 as $i => $header) {
    //         $this->Cell($w4[$i], 7, $header, 1, 0, 'C', 1); // Adjust index for second header
    //     }
    //     $this->Ln();
        
    //     // Print rows for the second table
    //     $fill = 0;
    //     $this->SetFont('', '', 10);
    //     foreach ($data as $row) {
    //         $row_height = 0;
            
    //         // Calculate the row height based on content
    //         $row_content = array(
    //             $row['title'],
    //             $row['remarks']
    //         );
            
    //         foreach ($row_content as $key => $column_value) {
    //             $num_lines = $this->getNumLines($column_value, $w4[$key]);
    //             $cell_height = $num_lines * 20;
    //             if ($cell_height > $row_height) {
    //                 $row_height = $cell_height;
    //             }
    //         }
            
    //         // Process and format "Title" and "Remarks"
    //         $formatted_title = $this->formatTitle($row['title']);
    //         $formatted_remarks = $this->formatRemarks($row['remarks']);
            
    //         // Print cells for the second table
    //         $this->MultiCell($w4[0], $row_height, $formatted_title, 1, 'L', $fill, 0);
    //         $this->MultiCell($w4[1], $row_height, $formatted_remarks, 1, 'C', $fill, 1);
            
    //         $fill = !$fill; // Alternate row color
    //     }
        
    //     // Closing line for the second table
    //     $this->Cell(array_sum($w4), 0, '', 'T');
    // }

// __________________________________________________________________________________________________________________
        
    }
    
    // Format Title Field
    public function formatTitle($title_value) {
        if (strpos($title_value, ' | ') !== false) {
            $title_lines = explode(' | ', $title_value);
            $formatted_title = '';
            foreach ($title_lines as $index => $title) {
                $formatted_title .= 'Part' . ($index + 1) . "\n" . trim($title) . "\n\n"; // Add index (1., 2., 3.)
            }
        } else {
            $formatted_title = '1. ' . $title_value; // Single title case
        }
        return $formatted_title;
    }

    // Format Remarks Field
    public function formatRemarks($remarks_value) {
        if (strpos($remarks_value, ' | ') !== false) {
            $remarks_lines = explode(' | ', $remarks_value);
            $formatted_remarks = implode("\n\n", $remarks_lines);
        } else {
            $formatted_remarks = $remarks_value;
        }
        return $formatted_remarks;
    }

        

    // Custom header
    public function Header() {
        // Only display header on the first page
        if ($this->getPage() == 1) {
            // Title
            $this->SetFont('helvetica', 'B', 13);
            $this->Cell(0, 10, 'Memorandum', 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(20, 3, 'Doc. No.', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(15, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(75, 3, $this->docno, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(20, 3, 'To ', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(15, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(75, 3, $this->memo_to, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(20, 3, 'From ', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(15, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(75, 3, $this->memo_from, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(20, 3, 'Subject ', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(15, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(75, 3, $this->subject, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(20, 3, 'Section ', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(15, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(75, 3, $this->section, 0, 1, 'L');

            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(20, 3, 'Date ', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(15, 3, ':', 0, 0, 'L');
            $this->SetFont('helvetica', 'B', 11);
            $this->Cell(75, 3, $this->date_now, 0, 1, 'L');

            $this->Ln(5); // Add a little space before the line

            // Add a thick double separator line
            $this->SetDrawColor(0, 0, 0); // Set color for the lines (black)
            $this->SetLineWidth(0.8); // Set the thickness of the lines

            // Draw the first line
            $this->Line($this->GetX(), $this->GetY(), $this->GetX() + 180, $this->GetY());

            // Move down slightly and draw the second line
            $lineSpacing = 2; // Spacing between the two lines
            $this->Line($this->GetX(), $this->GetY() + $lineSpacing, $this->GetX() + 180, $this->GetY() + $lineSpacing);


            $this->Ln(6);

            $this->SetFont('helvetica', '', 11);
            $this->Cell(40, 3, 'Please be informed of below newly hired employee with training details/ result', 0, 0, 'L');

            $this->Ln(5);

        }
    }
}

// Create new PDF document with landscape orientation
$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TRD System');
$pdf->SetTitle('HR MEMORANDUM');
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
    $pdf->docno = $lastRow['docno'];
    $pdf->classification = $lastRow['classification'];
    $pdf->reason = $lastRow['reason'];
    $pdf->memo_to = str_replace(',', ' /', $lastRow['memo_to']);
    $pdf->memo_from = $lastRow['memo_from'];
    $pdf->subject = $lastRow['subject'];
    $pdf->date_now = date("F j, Y", strtotime($lastRow['date_now']));
    $pdf->department = $lastRow['department'];
    $pdf->section = $lastRow['section'];
    $pdf->position = $lastRow['position'];
}

// Set font and add a page
$pdf->SetFont('helvetica', '', 8);
$pdf->AddPage();

// Add space before the table to prevent overlap
$pdf->Ln(37); // Add some space before the table

// Column titles for each table
$header1 = array('Name', 'E.N.', 'Date Hired', 'Pos/Dept/Sec');
$header2 = array('GENERAL KNOWLEDGE', ' ');
$header3 = array('Training Venue', 'Endorsement Date', 'Theoretical Exam Results');
$header4 = array('BASIC JOB KNOWLEDGE', ' ');
$header5 = array('BBS', ' ');

// Print the tables with separate headers
$pdf->ColoredTable($header1, $header2, $header3, $header4, $header5, $data);


// Display "Date filed" and its value
$pdf->Ln(20); // Add some space
// $pdf->Cell(5, 5, '', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12); // Set font to bold for emphasis
$pdf->Cell(80, 5, 'For your information and reference.', 0, 0, 'L');

$pdf->Ln(12); // Add some space
// $pdf->Cell(5, 5, '', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12); // Set font to bold for emphasis
$pdf->Cell(80, 5, 'Prepared by:', 0, 0, 'L');

// Display "Prepared by" and its value
// $pdf->Ln(10); // Add some space
$pdf->SetFont('helvetica', '', 12); // Set font to bold for emphasis
$pdf->Cell(0, 5, 'Noted by:', 0, 1, 'L');

$pdf->Ln(16); // Add some space

// Add the date_filed value below
// $pdf->Cell(5, 5, '', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12); // Reset font to normal
$pdf->Cell(80, 5, $lastRow['preparedby'], 0, 0, 'L');

// Add the preparedby value below
$pdf->SetFont('helvetica', '', 12); // Reset font to normal
$pdf->Cell(0, 5, $lastRow['notedby'], 0, 1, 'L');


// $pdf->Cell(5, 5, '', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12); // Set font to bold for emphasis
$pdf->Cell(80, 5, $lastRow['position'], 0, 0, 'L');
// Display "Prepared by" and its value
// $pdf->Ln(10); // Add some space
$pdf->SetFont('helvetica', '', 12); // Set font to bold for emphasis
$pdf->Cell(0, 5, 'Sr. Supervisor', 0, 1, 'L');



// Add the date_filed value below
// $pdf->Cell(5, 5, '', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12); // Reset font to normal
$pdf->Cell(80, 5, 'HRS-Recruitment and Training', 0, 0, 'L');

// Add the preparedby value below
$pdf->SetFont('helvetica', '', 12); // Reset font to normal
$pdf->Cell(0, 5, 'HRS-Recruitment and Training', 0, 1, 'L');


//Output PDF
$pdf->Output('pdf.pdf', 'I');
?>