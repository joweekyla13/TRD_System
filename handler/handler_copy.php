<?php
    function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}

    if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action) { // switch case, in using ajax an action must be set in order to choose the specific function to use

				// ************************ HR MEMORANDUM ************************

				case "add_memo"               		: add_memo(); break;
				case "check_docno"					: check_docno(); break;
				case "edit_user"               		: edit_user(); break;
				case "display_empno"				: display_empno(); break;
				case "get_employee"					: get_employee(); break;
				case "get_trainee"					: get_trainee(); break;
				case "display_general_knowledge"	: display_general_knowledge(); break;
				case "get_to"						: get_to(); break;
				case "get_department"				: get_department(); break;
				case "get_section"					: get_section(); break;
				case "get_last_docno"				: get_last_docno(); break;
				case "get_emp_details"				: get_emp_details(); break;
				case "get_results"					: get_results(); break;
				case "get_training_dates"			: get_training_dates(); break;
				case "get_noted_by"					: get_noted_by(); break;
				case "get_username"					: get_username(); break;
				case "delete_memo"					: delete_memo(); break;
				case "approve_memo"					: approve_memo(); break;
				case "memo_revision"				: memo_revision(); break;
				case "for_checking"					: for_checking(); break;
				case "remove_emp_edit"				: remove_emp_edit(); break;
				case "get_preparedby_email"			: get_preparedby_email(); break;

				// ************************ HR MEMORANDUM APPROVAL ************************

				case "submit_memo_revision_remarks"	: submit_memo_revision_remarks(); break;
				case "disapprove_hr_memo"			: disapprove_hr_memo(); break;

				// ************************ TRAINING REQUEST CODES ************************

				case "display_doc_no"				: display_doc_no(); break;
				case "get_req_emp"					: get_req_emp(); break;
				case "add_training_request"			: add_training_request(); break;
				case "check_conno"					: check_conno(); break;
				case "edit_training_request"		: edit_training_request(); break;
				case "get_trainee_req"				: get_trainee_req(); break;
				case "delete_TR"					: delete_TR(); break;
				case "get_approver"					: get_approver(); break;
				case "get_approver_username"		: get_approver_username(); break;
				case "get_last_conno"				: get_last_conno(); break;
				case "update_memo_status"			: update_memo_status(); break;
				case "tr_remove_emp_edit"			: tr_remove_emp_edit(); break;

				// ************************ TRAINING APPROVAL CODES ************************

				case "conform_req"					: conform_req(); break;
				case "revision_conform_req"			: revision_conform_req(); break;
				case "disapprove_conform_req"		: disapprove_conform_req(); break;

				case "receive_req"					: receive_req(); break;
				case "revision_receive_req"			: revision_receive_req(); break;
				case "disapprove_receive_req"		: disapprove_receive_req(); break;

				case "approve_req"					: approve_req(); break;
				case "revision_approve_req"			: revision_approve_req(); break;
				case "disapprove_approve_req"		: disapprove_approve_req(); break;




				case "submit_day1"					: submit_day1(); break;
				case "submit_day2"					: submit_day2(); break;
				case "submit_day3"					: submit_day3(); break;

				// ************************ TRAINING ENDORSEMENT CODES ************************

				case "get_endo_last_conno"				: get_endo_last_conno(); break;
				case "get_control_no"					: get_control_no(); break;
				case "get_docno_details"				: get_docno_details(); break;
				case "get_tr_docno"						: get_tr_docno(); break;
				case "add_training_endorsement"			: add_training_endorsement(); break;
				case "check_training_endo"				: check_training_endo(); break;
				case "view_training_endo"				: view_training_endo(); break;

				// ************************ TRAINING ATTENDANCE CODES ************************

				case "get_docno"						: get_docno(); break;
				case "submit_attendance"				: submit_attendance(); break;
				case "check_attendance"					: check_attendance(); break;
				case "count_training"					: count_training(); break;
				case "update_attendance"				: update_attendance(); break;
				case "get_trainee_attendance"			: get_trainee_attendance(); break;
				case "get_conno_trainee"				: get_conno_trainee(); break;
				case "get_conno_trainee_table"			: get_conno_trainee_table(); break;
				// case "update_record"          : update_record(); break;

				// ************************ THEORETICAL EXAM CODES ************************

				// ************************ EXAMS HANDLER CODES ************************

				case "add_exam"						: add_exam(); break;
				case "modify_exam"					: modify_exam(); break;
				case "update_passing_score"			: update_passing_score(); break;
				case "delete_exam"					: delete_exam(); break;
				case "add_new_exam"					: add_new_exam(); break;

				case "get_section"					: get_section(); break;

				case "get_purpose"					: get_purpose(); break;
				case "display_position"				: display_position(); break;
				case "get_exam_details"				: get_exam_details(); break;
 
				// ************************ QUESTIONS HANDLER CODES ************************

				case "get_last_qNo"					: get_last_qNo(); break;
				case "display_question_purpose"		: display_question_purpose(); break;
				case "add_question"					: add_question(); break;
				case "delete_question"				: delete_question(); break;
				case "delete_Oquestion"				: delete_Oquestion(); break;
				case "delete_Oexam"					: delete_Oexam(); break;
				case "delete_OexamRecord"			: delete_OexamRecord(); break;
				case "display_exam"					: display_exam(); break;
				case "modify_questions"				: modify_questions(); break;
				case "add_new_question"				: add_new_question(); break;

				// ************************ TAKE EXAM HANDLER CODES ************************

				case "display_emp_details"			: display_emp_details(); break;
				case "check_employee"				: check_employee(); break;
				case "get_take_no"					: get_take_no(); break;
				case "get_emp"						: get_emp(); break;
				case "get_position"					: get_position(); break;
				case "display_remarks"				: display_remarks(); break;
				case "display_questions"			: display_questions(); break;
				case "check_exam_answers"			: check_exam_answers(); break;
				case "getRevNo"						: getRevNo(); break;
				case "submit_exam_result"			: submit_exam_result(); break;
 
				// ************************ EXAM CHECKING HANDLER CODES ************************

				case "delete_exam_record"			: delete_exam_record(); break;
				case "display_record"				: display_record(); break;
				case "fetch_record"					: fetch_record(); break;
				case "view_fetch_record"			: view_fetch_record(); break;
				case "modify_exam_record"			: modify_exam_record(); break;
				case "delete_examinee_record"		: delete_examinee_record(); break;

				// ************************ USER LIST ************************

				case "get_user_module" 				: get_user_module(); break;
				case "get_user_pkid"				: get_user_pkid(); break;
				case "display_users_empno"			: display_users_empno(); break;
				case "display_users_pkid"			: display_users_pkid(); break;
				case "get_employee_user_list"		: get_employee_user_list(); break;
				
				case "add_user_access"				: add_user_access(); break;

				case "add_user_access_if_not_exists": add_user_access_if_not_exists(); break;
				case "add_modify_user_access"		: add_modify_user_access(); break;
				case "remove_modify_user_access"	: remove_modify_user_access(); break;

				case "add_new_user"					: add_new_user(); break;

				case "display_assign_module"		: display_assign_module(); break;
				

				case "check_username"				: check_username(); break;

				// ************************ GLOBAL FUNCTIONS ************************

				case "get_trds_user_email"			: get_trds_user_email(); break;
				case "get_trds_user_info"			: get_trds_user_info(); break;
				case "send_for_approval"			: send_for_approval(); break;
				case "edit_send_for_approval"		: edit_send_for_approval(); break;
				case "send_multiple_emails"			: send_multiple_emails(); break;
				case "edit_send_multiple_emails"	: edit_send_multiple_emails(); break;

			}
		}
	}

	function get_last_docno() {
        require_once('../class/oop_trds.php');  // Ensure the correct path to your DB class
        
        // Query to get the last docno from tbl_memo
        $table  = "tbl_memo";
        $query_result = User_trds::getInstance()->select_query(
            array('docno'),  // Select only the docno field
            $table,
            '',  // No joins
            'ORDER BY pkid DESC LIMIT 1',  // Get the last record based on the primary key or last inserted
            '',  // No ordering
            ''   // No limit (already limited to 1)
        );

        if ($query_result && mysqli_num_rows($query_result) > 0) {
            $row = mysqli_fetch_assoc($query_result);
            $lastDocNo = $row['docno'];

            // Log the last doc number for debugging
            error_log("Last doc number fetched: " . $lastDocNo);

            // Extract the last 3 digits of the document number using regex
            preg_match('/(\d{3})$/', $lastDocNo, $matches);
            $lastCounter = isset($matches[1]) ? intval($matches[1]) : 0;

            // Log the extracted last 3 digits
            error_log("Last 3 digits extracted: " . $lastCounter);

            // Return the last counter as the response
            echo json_encode($lastCounter);
        } else {
            // Log if no records are found
            error_log("No records found, starting with 0.");
            // If no records are found, start from 0
            echo json_encode(0);
        }

        exit;
    }

	function check_docno(){
		require_once('../class/oop_trds.php');

		$array_fields = array('docno');
		$table        = "tbl_memo";
		$joins        = '';
		$sql_where 	  = 'WHERE docno = "' . $_POST['checkDocNum'] . '" AND logdel = 0';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		if(mysqli_num_rows($query_result) > 0){
			$docno = mysqli_fetch_assoc($query_result);
			$data['docno'] = $docno['docno'];
		}
		echo json_encode($data);
	}

	// OLD ADD MEMO
	function add_memo()
	{
		require_once '../class/oop_trds.php';
		$date_time_now = date("Y-m-d H:i:s");
		$return = $_POST;
		$table = "tbl_memo";

		// Collect form fields common to all rows (outside the table data)
		$docno = $return['docno'];
		$classification = $return['classification'];
		$reason = $return['reason'];
		$memo_to = $return['selectedValues'];
		$memo_email_to = $return['selectedOptionsEmail'];
		$memo_from = $return['from'];
		$subject = $return['subject'];
		$date_now = $return['date_now'];
		$department = $return['department'];
		$section = $return['section'];
		// Inedit 12-9-24
		// $preparedby = $return['preparedby'];
		$preparedby = $return['preparedbyName'];
		$notedby = $return['notedby'];
		$username = $return['username'];

		// Collect table rows data (which is an array of employee data)
		$rows = $return['rows']; // Assuming 'rows' contains an array of table row data

		foreach ($rows as $row) {
			// Extract each employee's data
			$empNo = $row['empNo'];
			$fullname = $row['fullname'];
			$date_hired = $row['date_hired'];
			$pds = $row['pds'];
			$fromto = $row['fromto'];
			$venue = $row['venue'];
			$endorsementDate = $row['endorsementDate'];
			$remarks = $row['remarks'];
			$title = $row['title'];

			// Prepare array for insert or update query
			$array_fields = array(
				'docno', 'classification', 'reason', 'memo_to', 'memo_email_to', 'memo_from', 'subject', 'date_now',
				'department', 'section', 'empNo', 'fullname', 'date_hired', 'pds', 'fromto',
				'venue', 'endorsementDate', 'remarks', 'title', 'preparedby', 'notedby', 'username','updated_at'
			);

			$array_values = array(
				$docno, $classification, $reason, $memo_to, $memo_email_to, $memo_from, $subject, $date_now,
				$department, $section, $empNo, $fullname, $date_hired, $pds, $fromto, $venue,
				$endorsementDate, $remarks, $title, $preparedby, $notedby, $username, $date_time_now
			);

			// Insert or update for each row
			$pkid = isset($row['pkid']) ? $row['pkid'] : ''; // Adjust if you have PKID
			if (empty($pkid)) {
				$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
			} else {
				$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
			}
		}

		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function edit_user(){
		require_once('../class/oop.php');
		$created_at = date('Y-m-d H:i:s'); 
		$return 		= $_POST; 
		
		$array_fields = array('*');
		$table        = "tbl_user";                             // Table name
		$joins        = '';
		$sql_where    = 'WHERE pkid = "'.$return['user_id'].'"';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		/**
		 * Fetch data to display
		 */
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row;
		}
		$return['result'] = $data;
		echo json_encode($return);
	}

    // function update_record(){
	// 	require_once('../class/oop.php'); //OOP Path
	// 	$date_time_today = date('Y-m-d H:i:s'); 
	// 	$return = $_POST; 
	// 	$result = "";
	// 	$table        = "tbl_medicines";
	// 	$array_fields = array('med_description','lastupdate','username');
	// 	$array_values = array($return['txt_description_update'], $date_time_today, $return['username']);
	// 	$pkid = $return['txt_pkid'];
	// 	$result = Training::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
	// 	$return["result"] = json_encode($result); //return the the serialize values
	// 	echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	// }

	function display_empno() {
		require_once('../class/oop.php');
		require_once('../class/oop_subcon.php');
	
		$concat_name = "CONCAT_WS(' ', `FirstName`, IF(LENGTH(`MiddleName`) > 0, CONCAT(SUBSTRING(`MiddleName`, 1, 1), '.'), ''), `LastName`) AS FullName";
		$query = "
			SELECT DISTINCT $concat_name, EmpNo
			FROM db_hris.tbl_EmployeeInfo
			WHERE EmpStatus = 1
			UNION ALL
			SELECT DISTINCT $concat_name, EmpNo
			FROM db_subcon.tbl_EmployeeInfo
			WHERE EmpStatus = 1
		";
	
		// Execute the query
		$query_result = User_subcon::getInstance()->custom_query($query);
	
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			// Add each row as an associative array with EmpNo and FullName as keys
			$data[] = array(
				'EmpNo' => $row['EmpNo'],
				'FullName' => $row['FullName']
			);
		}
	
		// Return the JSON-encoded associative array
		echo json_encode($data);
	}	

	// function display_empno() {
	// 	require_once('../class/oop.php');
		
	// 	$array_fields = array('DISTINCT tbl_EmployeeInfo.EmpNo');
	// 	$table        = "tbl_Trainee";
	// 	$joins        = 'INNER JOIN tbl_EmployeeInfo ON tbl_Trainee.fkEmployee = tbl_EmployeeInfo.pkid';
	// 	$sql_where = "WHERE EmpStatus = 1";
	// 	$sql_order    = '';
	// 	$sql_limit    = '';
	// 	$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	// 	$data = array();
	// 	while($row = mysqli_fetch_assoc($query_result)){
	// 		$data[] = $row['EmpNo'];
	// 	}
	
	// 	echo json_encode($data);
	// }

	function display_general_knowledge() {
		require_once('../class/oop.php');
	
		$array_fields = array('DISTINCT tbl_Training.Title');
		$table        = "tbl_Trainee";
		$joins        = "
		INNER JOIN tbl_Training ON tbl_Trainee.fkTraining = tbl_Training.pkid
		INNER JOIN tbl_EmployeeInfo ON tbl_Trainee.fkEmployee = tbl_EmployeeInfo.pkid
		";
		$sql_where    = 'WHERE tbl_EmployeeInfo.EmpNo = "' . $_POST['textEmpNo'] . '"';
		$sql_order    = '';
		$sql_limit    = '';
	
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['Title'];
		}
	
		echo json_encode($data);
	}	

	// ORIGINAL
	function get_results(){
		require_once('../class/oop.php');

		$array_fields = array('DISTINCT tbl_Trainee.Result');
		$table = "tbl_Trainee";
		$joins = "
		INNER JOIN tbl_EmployeeInfo ON tbl_Trainee.fkEmployee = tbl_EmployeeInfo.pkid
		INNER JOIN tbl_Training ON tbl_Trainee.fkTraining = tbl_Training.pkid
		";
		$sql_where    = 'WHERE tbl_EmployeeInfo.EmpNo = "' . $_POST['textEmpNo'] . '" AND tbl_Training.Title = "' . $_POST['textTitle'] . '"';
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = $row['Result'];
		}
		echo json_encode($data);
	}

	// EDITED 12-3-24
	function get_training_dates(){
		require_once('../class/oop.php');
	
		$concat_from_to = "CONCAT_WS(' - ', tbl_Training.`PeriodFrom`, tbl_Training.`PeriodTo`) AS fromto";
		$array_fields = array('DISTINCT tbl_Trainee.Result', $concat_from_to);
		$table = "tbl_Trainee";
		$joins = "
		INNER JOIN tbl_EmployeeInfo ON tbl_Trainee.fkEmployee = tbl_EmployeeInfo.pkid
		INNER JOIN tbl_Training ON tbl_Trainee.fkTraining = tbl_Training.pkid
		";
		$sql_where = 'WHERE tbl_EmployeeInfo.EmpNo = "' . $_POST['textEmpNo'] . '" AND tbl_Training.Title = "' . $_POST['textTitle'] . '"';
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array('Result' => array(), 'fromto' => array());
	
		while($row = mysqli_fetch_assoc($query_result)) {
			$data['Result'][] = $row['Result']; 
			$data['fromto'][] = $row['fromto'];
		}
	
		// Join the arrays into comma-separated strings for the response
		$data['Result'] = implode('/ ', $data['Result']);
		$data['fromto'] = implode('/ ', $data['fromto']);
	
		echo json_encode($data);  // Send the data back to the frontend
	}
	

	function get_emp_details() {
		require_once('../class/oop_trds.php');
	
		$array_fields = array('empNo', 'fullname', 'date_hired', 'pds', 'fromto', 'venue', 'endorsementDate', 'remarks', 'title');
		$table = "tbl_memo";
		$joins = "";
		$sql_where = 'WHERE docno = "' . $_POST['docno'] . '" AND logdel = 0';
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'empNo' => $row['empNo'],
				'fullname' => $row['fullname'],
				'date_hired' => $row['date_hired'],
				'pds' => $row['pds'],
				'fromto' => $row['fromto'],
				'venue' => $row['venue'],
				'endorsementDate' => $row['endorsementDate'],
				'remarks' => $row['remarks'],
				'title' => $row['title']
			);
		}
	
		echo json_encode($data);
	}	

	function remove_emp_edit(){
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('logdel');
		$array_values = array(1);
		$table = "tbl_memo";
	
		$pkid = $return['remove_edit_docno'];
		$empno = $return['remove_edit_emp'];
		$query_result = User_trds::getInstance()->memo_remove_edit_emp_query($table, $array_fields, $array_values, $pkid, $empno);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}
	
	function get_trainee(){
		require_once('../class/oop.php');
		$concat_from_to = "CONCAT_WS(' - ', tbl_Training.`PeriodFrom`, tbl_Training.`PeriodTo`) AS fromto";
		$array_fields = array($concat_from_to, 'tbl_Training.`Venue`, tbl_Trainee.`Remarks`, tbl_Training.`Title`');
		$table = "tbl_Trainee";
		$joins = "
		INNER JOIN tbl_EmployeeInfo ON tbl_Trainee.fkEmployee = tbl_EmployeeInfo.pkid
		INNER JOIN tbl_Training ON tbl_Trainee.fkTraining = tbl_Training.pkid
		";
		$sql_where = 'WHERE tbl_EmployeeInfo.EmpNo = "' . $_POST['textEmpNo'] . '"';
		$sql_order = '';
		$sql_limit = '';
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);		
		$data = array();
		if (mysqli_num_rows($query_result) > 0) {
			$trainee = mysqli_fetch_assoc($query_result);
			$data['Remarks'] = $trainee['Remarks'];
			$data['Venue'] = $trainee['Venue'];
			$data['fromto'] = $trainee['fromto'];
		}
		echo json_encode($data);
	}

	// function get_employee() {
	// 	require_once('../class/oop.php'); // OOP Path
	
	// 	// Concatenate the full name
	// 	$concat_name = "CONCAT_WS(' ', `FirstName`, IF(LENGTH(`MiddleName`) > 0, CONCAT(SUBSTRING(`MiddleName`, 1, 1), '.'), ''), `LastName`) AS FullName";
	// 	$concat_pds = "CONCAT_WS(' / ', tbl_Position.`Position`, tbl_Department.`Department`, tbl_Section.`Section`) AS pds";
	
	// 	// Fields to select from db_hris
	// 	$array_fields = array('tbl_EmployeeInfo.pkid', 'tbl_EmployeeInfo.EmpNo', $concat_name, $concat_pds, 'tbl_EmployeeInfo.DateHired');
		
	// 	// Query to fetch from db_hris
	// 	$query = "
	// 		SELECT DISTINCT $array_fields
	// 		FROM db_hris.tbl_EmployeeInfo
	// 		INNER JOIN db_hris.tbl_Position ON db_hris.tbl_EmployeeInfo.fkPosition = db_hris.tbl_Position.pkid
	// 		INNER JOIN db_hris.tbl_Department ON db_hris.tbl_EmployeeInfo.fkDepartment = db_hris.tbl_Department.pkid
	// 		INNER JOIN db_hris.tbl_Section ON db_hris.tbl_EmployeeInfo.fkSection = db_hris.tbl_Section.pkid
	// 		WHERE EmpStatus = 1 AND db_hris.tbl_EmployeeInfo.EmpNo = '" . $_POST['textEmpNo'] . "'
	// 	";
	
	// 	// Debugging: echo the query to make sure it's correct
	// 	echo $query;
	
	// 	// Execute the query directly using custom_query function
	// 	$query_result = User::getInstance()->custom_query($query);
	
	// 	// Fetch data to display
	// 	$data = array();
	// 	if (mysqli_num_rows($query_result) > 0) {
	// 		$employee = mysqli_fetch_assoc($query_result);
	// 		$data['EmpNo'] = $employee['EmpNo'];
	// 		$data['FullName'] = $employee['FullName'];
	// 		$data['pds'] = $employee['pds'];
	// 		$data['DateHired'] = $employee['DateHired'];
	// 	} else {
	// 		// Debugging: No results found
	// 		echo "No results found for EmpNo: " . $_POST['textEmpNo'];
	// 	}
	
	// 	echo json_encode($data);
	// }
	

	function get_employee() {
		require_once('../class/oop.php');
		require_once('../class/oop_subcon.php');

	
		// Concatenate the full name and position, department, section
		$concat_name = "CONCAT_WS(' ', `FirstName`, IF(LENGTH(`MiddleName`) > 0, CONCAT(SUBSTRING(`MiddleName`, 1, 1), '.'), ''), `LastName`) AS FullName";
		$concat_pds = "CONCAT_WS(' / ', tbl_Position.`Position`, tbl_Department.`Department`, tbl_Section.`Section`) AS pds";
	
		// Get EmpNo from the POST request
		$empNo = $_POST['textEmpNo'];
	
		// Prepare the query to select from both db_hris and db_subcon
		$query = "
			SELECT DISTINCT 
				$concat_name, 
				tbl_EmployeeInfo.EmpNo,
				$concat_pds,
				tbl_EmployeeInfo.DateHired
			FROM db_hris.tbl_EmployeeInfo
			INNER JOIN db_hris.tbl_Position ON db_hris.tbl_EmployeeInfo.fkPosition = db_hris.tbl_Position.pkid
			INNER JOIN db_hris.tbl_Department ON db_hris.tbl_EmployeeInfo.fkDepartment = db_hris.tbl_Department.pkid
			INNER JOIN db_hris.tbl_Section ON db_hris.tbl_EmployeeInfo.fkSection = db_hris.tbl_Section.pkid
			WHERE db_hris.tbl_EmployeeInfo.EmpStatus = 1
			AND db_hris.tbl_EmployeeInfo.EmpNo = '$empNo'
	
			UNION ALL
	
			SELECT DISTINCT 
				$concat_name, 
				tbl_EmployeeInfo.EmpNo,
				$concat_pds,
				tbl_EmployeeInfo.DateHired
			FROM db_subcon.tbl_EmployeeInfo
			INNER JOIN db_hris.tbl_Position ON db_subcon.tbl_EmployeeInfo.fkPosition = db_hris.tbl_Position.pkid
			INNER JOIN db_hris.tbl_Department ON db_subcon.tbl_EmployeeInfo.fkDepartment = db_hris.tbl_Department.pkid
			INNER JOIN db_hris.tbl_Section ON db_subcon.tbl_EmployeeInfo.fkSection = db_hris.tbl_Section.pkid
			WHERE db_subcon.tbl_EmployeeInfo.EmpStatus = 1
			AND db_subcon.tbl_EmployeeInfo.EmpNo = '$empNo'
		";
	
		// Execute the query using the custom_query function
		$query_result = User_subcon::getInstance()->custom_query($query);
	
		// Fetch data to display
		$data = array();
		if (mysqli_num_rows($query_result) > 0) {
			$employee = mysqli_fetch_assoc($query_result);
			$data['EmpNo'] = $employee['EmpNo'];
			$data['FullName'] = $employee['FullName'];
			$data['pds'] = $employee['pds'];
			$data['DateHired'] = $employee['DateHired'];
		} else {
			// No results found
			$data['error'] = "No results found for EmpNo: " . $empNo;
		}
	
		// Return the data as JSON
		echo json_encode($data);
	}

	function get_department(){
		require_once('../class/oop.php');

		$array_fields = array('DISTINCT Department');
		$table        = "tbl_Department";
		$joins        = '';
		$sql_where 	  = 'WHERE isActive = 1';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['Department'];
		}
	
		echo json_encode($data);
	}

	function get_section(){
		require_once('../class/oop.php');

		$array_fields = array('DISTINCT Section');
		$table        = "vw_DivDeptSec";
		$joins        = '';
		$sql_where 	  = '';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['Section'];
		}
	
		echo json_encode($data);
	}

	// function get_to() {
	// 	require_once('../class/oop_acl.php');

	// 	$concat_name_to = "CONCAT_WS(' ', `FN`, `LN`) AS fullname";
	// 	$array_fields = array($concat_name_to);
	// 	$table        = "tbl_useraccnt";
	// 	$joins        = '';
	// 	$sql_where 	  = 'WHERE isEnable = 0';
	// 	$sql_order    = '';
	// 	$sql_limit    = '';
	// 	$query_result = User_acl::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	// 	$data = array();
	// 	while($row = mysqli_fetch_assoc($query_result)){
	// 		$data[] = $row['fullname'];
	// 	}
	
	// 	echo json_encode($data);
	// }

	function get_to() {
		require_once('../class/oop_trds.php');

		$array_fields = array('EmpName');
		$table        = "tbl_user";
		$joins        = '';
		$sql_where 	  = 'WHERE logdel = 0';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['EmpName'];
		}
	
		echo json_encode($data);
	}

	function get_noted_by() {
		require_once('../class/oop.php');

		$array_fields = array('emp_name');
		$table        = "vw_employee";
		$joins        = '';
		$sql_where 	  = "WHERE Section = 'HRS' and EmpNo = '6088' ";
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['emp_name'];
		}
	
		echo json_encode($data);
	}

	function get_username(){
		require_once('../class/oop.php');

		$array_fields = array('username','email_add');
		$table        = "vw_employee";
		$joins        = '';
		$sql_where 	  = 'WHERE emp_name = "' . $_POST['textNotedBy'] . '"';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['username'];
			$data[] = $row['email_add'];
		}

		echo json_encode($data);

	}

	function delete_memo() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('logdel');
		$array_values = array(1);
		$table = "tbl_memo";
	
		$pkid = $return['docno'];
		$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function approve_memo() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$array_fields = array('status','updated_at');
		$array_values = array(1,$date_time_now);
		$table = "tbl_memo";
	
		$pkid = $return['approve_docno'];
		$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function memo_revision(){
		require_once '../class/oop_trds.php';
		$return = $_POST;

		$pkid = $return['revise_docno'];
		$revision = $return['disapprove_reason'];

		$array_fields = array(
			'classification',
			'reason',
			'memo_to',
			'subject',
			'department',
			'section',
			'notedby',
			'status',
			'revision',
		);
		$array_values = array(
			$return['classification_view'],
			$return['reason_view'],
			$return['selectedEditValues'],
			$return['subject_view'],
			$return['department_view'],
			$return['section_view'],
			$return['notedby_view'],
			2,
			$revision,
		);
		$table = "tbl_memo";

		$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function for_checking(){
		require_once '../class/oop_trds.php';
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$pkid = $return['revise_docno'];

		$array_fields = array(
			'classification',
			'reason',
			'memo_to',
			'memo_email_to',
			'subject',
			'department',
			'section',
			'notedby',
			'status',
			'revision',
			'updated_at'
		);
		$array_values = array(
			$return['classification_view'],
			$return['reason_view'],
			$return['selectedEditValues'],
			$return['selectedEditEmails'],
			$return['subject_view'],
			$return['department_view'],
			$return['section_view'],
			$return['notedby_view'],
			0,
			'N/A',
			$date_time_now
		);
		$table = "tbl_memo";

		$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function get_preparedby_email(){
		require_once('../class/oop_rapid.php');
		$array_fields = array('*');
		$table        = "tbl_useraccounts";
		$joins        = '';
		$sql_where 	  = "WHERE username = '" . $_POST['prepared_by'] . "' AND logdel = 0";
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_rapid::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['email_add'];
		}
	
		echo json_encode($data);
	}

	// _______________________________________________________________ HR MEMORANDUM APPROVAL ___________________________________________________________________________________


	function submit_memo_revision_remarks(){
		require_once('../class/oop_trds.php');
	
		$date_time_now = date("Y-m-d H:i:s");
		$return = $_POST;
		$revision_remarks = $return['HR_rev_rem'];
		$array_fields = array(
			'status', 
			'revision',
			'updated_at'
		);
		$array_values = array(	
			2, 
			$revision_remarks,
			$date_time_now
		);
		$table = "tbl_memo";
		$pkid = $return['HR_conno'];
		$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}
	// EDITED 12-3-24
	function disapprove_hr_memo() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$disapprove_reason = $return['memo_disapprove_reason'];
		$array_fields = array(
			'status', 
			'revision', 
			'updated_at'
		);
		$array_values = array(
			3, 
			$disapprove_reason,
			$date_time_now
		);
		$table = "tbl_memo";
	
		$pkid = $return['disapprove_conno'];
		$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}	
	

	// _______________________________________________________________ REQUEST HANDLER CODES ___________________________________________________________________________________

	function display_doc_no() {
		require_once('../class/oop_trds.php');
		$array_fields = array('DISTINCT docno');
		$table        = "tbl_memo";
		$joins        = '';
		$sql_where 	  = "WHERE logdel = 0 AND status = 1";
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_trds::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['docno'];
		}
	
		echo json_encode($data);
	}

	function get_req_emp() {
		require_once('../class/oop_trds.php');
	
		$array_fields = array('empNo', 'fullname', 'date_hired', 'pds', 'fromto', 'venue', 'endorsementDate', 'remarks', 'title');
		$table = "tbl_memo";
		$joins = "";
		$sql_where = 'WHERE docno = "' . $_POST['req_docno'] . '" AND logdel = 0';
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'empNo' => $row['empNo'],
				'fullname' => $row['fullname'],
				'date_hired' => $row['date_hired'],
				'pds' => $row['pds'],
				'fromto' => $row['fromto'],
				'venue' => $row['venue'],
				'endorsementDate' => $row['endorsementDate'],
				'remarks' => $row['remarks'],
				'title' => $row['title']
			);
		}
	
		echo json_encode($data);
	}

	function update_memo_status(){
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('status');
		$array_values = array(4);
		$table = "tbl_memo";
	
		$pkid = $return['docno'];
		$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
		
	}

	function check_conno(){
		require_once('../class/oop_trds.php');
	
		$array_fields = array('conno', 'fkdocno');
		$table        = "tbl_training_request";
		$joins        = '';
		$sql_where    = 'WHERE (conno = "' . $_POST['checkConNum'] . '" OR fkdocno = "' . $_POST['checkDocNum'] . '") AND logdel = 0';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		if (mysqli_num_rows($query_result) > 0) {
			while ($row = mysqli_fetch_assoc($query_result)) {
				if ($row['conno'] == $_POST['checkConNum']) {
					$data['conno'] = $row['conno'];
				}
				if ($row['fkdocno'] == $_POST['checkDocNum']) {
					$data['fkdocno'] = $row['fkdocno'];
				}
			}
		}
	
		echo json_encode($data);
	}	

	function add_training_request(){
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$table  = "tbl_training_request";

		$TRconno = $return['conno'];
		$TRfkdocno = $return['hidden_docno'];
		$TRcurrent_date = $return['current_date'];
		$TRdepartment = $return['department'];
		$TRsection = $return['section'];
		$TRjob_function = $return['job_function'];
		$TRarea_line = $return['area_line'];
		$TRreason = $return['reason'];
		// Edited 12-9-24
		// $TRrequestor = $return['requestor'];
		$TRrequestor = $return['requestorname'];
		$TRapprover = $return['approver'];
		$TRemail = $return['email'];
		$TRapprover_username = $return['approver_username'];
		
		$rows = $return['rows'];

		foreach($rows as $row){

			$fkdate_hired = $row['fkdate_hired'];
			$fkEmpNo = $row['fkEmpNo'];
			$fkfullname = $row['fkfullname'];
			$fkpds = $row['fkpds'];
			$fktitle = $row['fktitle'];
			$fkremarks = $row['fkremarks'];
			$training_dates = $row['training_dates'];
			$fromStationProd = $row['from_station_prod'];
			$toStationProd = $row['to_station_prod'];
			$venue = $row['venue'];
			$endorsement_date = $row['endorsement_date'];

			$array_fields = array(
				'conno',
				'fkdocno',
				'date_filed',
				'department',
				'section',
				'job_function',
				'area_line',
				'reason',
				'fkEmpNo',
				'fkfullname',
				'fkdate_hired',
				'fkpds',
				'fktitle',
				'fkremarks',
				'training_dates',
				'from_station_prod',
				'to_station_prod',
				'requestor',
				'approver',
				'email',
				'approver_username',
				'updated_at',

				// Edited 12-10-24
				'venue',
				'endorsement_date'
			);
	
			$array_values = array(
				$TRconno,
				$TRfkdocno,
				$TRcurrent_date,
				$TRdepartment,
				$TRsection,
				$TRjob_function,
				$TRarea_line,
				$TRreason,
				$fkEmpNo,
				$fkfullname,
				$fkdate_hired,
				$fkpds,
				$fktitle,
				$fkremarks,
				$training_dates,
				$fromStationProd,
				$toStationProd,
				$TRrequestor,
				$TRapprover,
				$TRemail,
				$TRapprover_username,
				$date_time_now,

				// Edited 12-10-24
				$venue,
				$endorsement_date
			);
			
	
			$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);

		}

		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function edit_training_request(){
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$table  = "tbl_training_request";

		$pkid = $return['edit_conno'];
		// $TREcurrent_date = $return['edit_current_date'];
		$TREdepartment = $return['edit_department'];
		$TREsection = $return['edit_section'];
		$TREjob_function = $return['edit_job_function'];
		$TREarea_line = $return['edit_area_line'];
		$TREreason = $return['edit_reason'];
		$TRErequestor = $return['edit_requestor'];
		$TREapprover = $return['edit_approver'];
		$TREemail = $return['edit_email'];

		
		$rows = $return['rows'];

		// foreach($rows as $row){

		// 	$fkEmpNo = $row['fkEmpNo'];
		// 	$fromStationProd = $row['from_station_prod'];
		// 	$toStationProd = $row['to_station_prod'];

			$array_fields = array(
				'department',
				'section',
				'job_function',
				'area_line',
				'reason',
				// 'fkEmpNo',
				// 'from_station_prod',
				// 'to_station_prod',
				'requestor',
				'approver',
				'email',
				'isConformed',
				'isReceived',
				'isHeadApproval',
				'updated_at'
			);
	
			$array_values = array(
				$TREdepartment,
				$TREsection,
				$TREjob_function,
				$TREarea_line,
				$TREreason,
				// $fkEmpNo,
				// $fromStationProd,
				// $toStationProd,
				$TRErequestor,
				$TREapprover,
				$TREemail,
				0,
				0,
				0,
				$date_time_now
			);
	
			$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);

		//  }

		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function get_trainee_req(){
		require_once('../class/oop_trds.php');

		$array_fields = array('fkEmpNo','fkdate_hired','fkfullname','fkpds','from_station_prod','to_station_prod');
		$table = "tbl_training_request";
		$joins = '';
		$sql_where = 'WHERE conno = "' . $_POST['TR_conno'] . '" AND logdel = 0';
		$sql_order = '';
		$sql_limit = '';

		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);

		$data = array();
		
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'fkEmpNo' => $row['fkEmpNo'],
				'fkdate_hired' => $row['fkdate_hired'],
				'fkfullname' => $row['fkfullname'],
				'fkpds' => $row['fkpds'],
				'from_station_prod' => $row['from_station_prod'],
				'to_station_prod' => $row['to_station_prod']
			);
		}

		echo json_encode($data);
	}

	// function get_trainee_req(){
	// 	require_once('../class/oop_trds.php');

	// 	$array_fields = array('DISTINCT tbl_training_request.fkEmpNo', 'tbl_memo.date_hired', 'tbl_memo.fullname', 'tbl_memo.pds', 'tbl_training_request.from_station_prod', 'tbl_training_request.to_station_prod');
	// 	$table = "tbl_training_request";
	// 	$joins = "
	// 	INNER JOIN tbl_memo ON tbl_training_request.fkEmpNo = tbl_memo.empNo
	// 	";
	// 	$sql_where = 'WHERE tbl_training_request.conno = "' . $_POST['TR_conno'] . '" AND tbl_training_request.logdel = 0';
	// 	$sql_order = '';
	// 	$sql_limit = '';

	// 	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);

	// 	$data = array();
		
	// 	while($row = mysqli_fetch_assoc($query_result)) {
	// 		$data[] = array(
	// 			'fkEmpNo' => $row['fkEmpNo'],
	// 			'date_hired' => $row['date_hired'],
	// 			'fullname' => $row['fullname'],
	// 			'pds' => $row['pds'],
	// 			'from_station_prod' => $row['from_station_prod'],
	// 			'to_station_prod' => $row['to_station_prod']
	// 		);
	// 	}

	// 	echo json_encode($data);
	// }

	// function get_trainee_req(){
	// 	require_once('../class/oop_trds.php');

	// 	$array_fields = array('DISTINCT tbl_training_request.fkEmpNo', 'tbl_memo.date_hired', 'tbl_memo.fullname', 'tbl_memo.pds', 'tbl_training_request.from_station_prod', 'tbl_training_request.to_station_prod');
	// 	$table = "tbl_training_request";
	// 	$joins = "
	// 	INNER JOIN tbl_memo ON tbl_training_request.fkEmpNo = tbl_memo.empNo
	// 	";
	// 	$sql_where = 'WHERE tbl_training_request.conno = "' . $_POST['TR_conno'] . '" AND tbl_training_request.logdel = 0';
	// 	$sql_order = '';
	// 	$sql_limit = '';

	// 	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);

	// 	$data = array();
		
	// 	while($row = mysqli_fetch_assoc($query_result)) {
	// 		$data[] = array(
	// 			'fkEmpNo' => $row['fkEmpNo'],
	// 			'date_hired' => $row['date_hired'],
	// 			'fullname' => $row['fullname'],
	// 			'pds' => $row['pds'],
	// 			'from_station_prod' => $row['from_station_prod'],
	// 			'to_station_prod' => $row['to_station_prod']
	// 		);
	// 	}

	// 	echo json_encode($data);
	// }

	function delete_TR() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('logdel');
		$array_values = array(1);
		$table = "tbl_training_request";
	
		$pkid = $return['conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	// function get_approver() {
	// 	require_once('../class/oop.php');

	// 	$concat_approver_name = "CONCAT_WS(' ', `FirstName`, IF(LENGTH(`MiddleName`) > 0, CONCAT(SUBSTRING(`MiddleName`, 1, 1), '.'), ''), `LastName`) AS FullName";
	// 	// $concat_approver_name = "CONCAT_WS(' ', `FirstName`, `LastName`) AS FullName";
	// 	$array_fields = array($concat_approver_name);
	// 	$table        = "tbl_EmployeeInfo";
	// 	$joins        = '';
	// 	$sql_where = 'WHERE SalaryType IN (3, 4) AND EmpStatus = 1';
	// 	$sql_order    = '';
	// 	$sql_limit    = '';
	// 	$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	// 	$data = array();
	// 	while($row = mysqli_fetch_assoc($query_result)){
	// 		$data[] = $row['FullName'];
	// 	}
	
	// 	echo json_encode($data);
	// }

	function get_approver(){
		// require_once('../class/oop_trds.php');
		require_once('../class/oop.php');

		// $array_fields = array('Distinct EmpName');
		// $table        = "tbl_user";
		// $joins        = 'INNER JOIN tbl_assignmodule ON tbl_user.pkid = tbl_assignmodule.user_id';
		// $sql_where 	  = 'WHERE tbl_assignmodule.module_id = 4 AND tbl_assignmodule.logdel = 0';

		$array_fields = array('Distinct FullName');
		$table        = "vw_Approver";
		$joins        = '';
		$sql_where 	  = 'WHERE EmpStatus = 1 and username = "'.$_POST['requestor'].'" ';

		$sql_order    = '';
		$sql_limit    = '';
		// $query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			// $data[] = $row['EmpName'];
			$data[] = $row['FullName'];
		}
	
		echo json_encode($data);
	}

	function get_approver_username(){
		// require_once('../class/oop_trds.php');
		require_once('../class/oop.php');

		// $array_fields = array('Distinct username, email');
		// $table        = "tbl_user";
		// $joins        = 'INNER JOIN tbl_assignmodule ON tbl_user.pkid = tbl_assignmodule.user_id';
		// $sql_where 	  = 'WHERE tbl_user.EmpName = "' . $_POST['approverName'] . '"';

		$array_fields = array('Distinct approver_username');
		$table        = "vw_Approver";
		$joins        = '';
		$sql_where 	  = 'WHERE FullName = "' . $_POST['approverName'] . '"';

		$sql_order    = '';
		$sql_limit    = '';
		// $query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			// $data[] = $row['username'];
			// $data[] = $row['email'];
			$data[] = $row['approver_username'];
			$data[] = $row['approver_username'].'@pricon.ph';
		}
	
		echo json_encode($data);
	}

	function get_last_conno() {
		require_once('../class/oop_trds.php');  // Ensure the correct path to your DB class
	
		// Query to get the last control number from tbl_training_request
		$table  = "tbl_training_request";
		$query_result = User_trds::getInstance()->select_query(
			array('conno'),  // Select only the conno field
			$table,
			'',  // No joins
			'ORDER BY pkid DESC LIMIT 1',  // Get the last record based on the primary key or last inserted
			'',  // No ordering
			''   // No limit (already limited to 1)
		);
	
		if ($query_result && mysqli_num_rows($query_result) > 0) {
			$row = mysqli_fetch_assoc($query_result);
			$lastConNo = $row['conno'];
	
			// Log the last control number for debugging
			error_log("Last control number fetched: " . $lastConNo);
	
			// Extract the counter (digits after the hyphen) using regex
			preg_match('/-(\d+)$/', $lastConNo, $matches);
			$lastCounter = isset($matches[1]) ? intval($matches[1]) : 0;
	
			// Log the extracted last counter
			error_log("Last counter extracted: " . $lastCounter);
	
			// Return the last counter as the response
			echo json_encode($lastCounter);
		} else {
			// Log if no records are found
			error_log("No records found, starting with 0.");
	
			// If no records are found, start from 0
			echo json_encode(0);
		}
	
		exit;
	}	

	function tr_remove_emp_edit(){
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('logdel');
		$array_values = array(1);
		$table = "tbl_training_request";
	
		$pkid = $return['remove_edit_conno'];
		$empno = $return['remove_edit_emp'];
		$query_result = User_trds::getInstance()->tr_remove_edit_emp_query($table, $array_fields, $array_values, $pkid, $empno);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}


// _______________________________________________________________ APPROVAL HANDLER CODES ___________________________________________________________________________________

	function conform_req() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$array_fields = array('isConformed','updated_at');
		$array_values = array(1, $date_time_now);
		$table = "tbl_training_request";
	
		$pkid = $return['conform_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function revision_conform_req() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$array_fields = array('isConformed', 'revision_remarks', 'updated_at');
		$array_values = array(2, $return['revision_remarks'], $date_time_now);
		$table = "tbl_training_request";
	
		$pkid = $return['revision_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function disapprove_conform_req() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$array_fields = array('isConformed', 'disapprove_reason', 'updated_at');
		$array_values = array(3, $return['disapprove_reason'],$date_time_now);
		$table = "tbl_training_request";
	
		$pkid = $return['disapprove_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}	


	// EDITED 12-10-24
	function receive_req() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$receiverFullname = $return['receiver_fullname'];
		$receiverUsername = $return['receiver_username'];
		$array_fields = array(
			'isReceived',
			'receiver',
			'receiver_username',
			'updated_at'
		);
		$array_values = array(
			1,
			$receiverFullname,
			$receiverUsername,
			$date_time_now
		);
		$table = "tbl_training_request";
	
		$pkid = $return['receive_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	// EDITED 12-10-24
	function revision_receive_req() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$receiverFullname = $return['receiver_fullname'];
		$receiverUsername = $return['receiver_username'];
		$array_fields = array(
			'isReceived', 
			'receiver',
			'receiver_username',
			'revision_remarks', 
			'updated_at'
		);
		$array_values = array(
			2, 
			$receiverFullname,
			$receiverUsername,
			$return['receiving_revision_remarks'], 
			$date_time_now
		);
		$table = "tbl_training_request";
	
		$pkid = $return['receiving_revision_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

    // INEDIT 12-10-24
	function disapprove_receive_req() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$receiverFullname = $return['receiver_fullname'];
		$receiverUsername = $return['receiver_username'];
		$array_fields = array(
			'isReceived', 
			'receiver',
			'receiver_username',
			'disapprove_reason', 
			'updated_at'
		);
		$array_values = array(
			3, 
			$receiverFullname,
			$receiverUsername,
			$return['receiving_disapprove_reason'], 
			$date_time_now
		);
		$table = "tbl_training_request";
	
		$pkid = $return['receiving_disapprove_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}	

    // EDITED 12-10-24
	function approve_req() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$approverFullname = $return['approve_fullname'];
		$approverUsername = $return['approve_username'];
		$array_fields = array(
			'isHeadApproval', 
			'qc_head_approver',
			'qc_head_approver_username',
			'updated_at'
		);
		$array_values = array(
			1, 
			$approverFullname,
			$approverUsername,
			$date_time_now
		);
		$table = "tbl_training_request";
	
		$pkid = $return['approve_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	// EDITED 12-10-24
	function revision_approve_req() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$approverFullname = $return['approve_fullname'];
		$approverUsername = $return['approve_username'];
		$array_fields = array(
			'isHeadApproval', 
			'qc_head_approver',
			'qc_head_approver_username',
			'revision_remarks', 
			'updated_at'
		);
		$array_values = array(
			2, 
			$approverFullname,
			$approverUsername,
			$return['approve_revision_remarks'], 
			$date_time_now
		);
		$table = "tbl_training_request";
	
		$pkid = $return['approve_revision_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	// EDITED 12-10-24
	function disapprove_approve_req() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$date_time_now = date("Y-m-d H:i:s");
		$approverFullname = $return['approve_fullname'];
		$approverUsername = $return['approve_username'];
		$array_fields = array(
			'isHeadApproval', 
			'qc_head_approver',
			'qc_head_approver_username',
			'disapprove_reason', 
			'updated_at'
		);
		$array_values = array(
			3, 
			$approverFullname,
			$approverUsername,
			$return['approve_disapprove_reason'], 
			$date_time_now
		);
		$table = "tbl_training_request";
	
		$pkid = $return['approve_disapprove_conno'];
		$query_result = User_trds::getInstance()->deleteTR_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}	


	function submit_day1() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$table = "tbl_training_request";
		$array_fields = array(
			'day1',
			'day1_reason'
		);
		$array_values = array(
		1,
		$return['absent_comment']
		);
	
		$pkid = $return['fkEmpNo_absent'];
		$query_result = User_trds::getInstance()->update_trainee_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function submit_day2() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$table = "tbl_training_request";
		$array_fields = array(
			'day2',
			'day2_reason'
		);
		$array_values = array(
		1,
		$return['absent_comment2']
		);
	
		$pkid = $return['fkEmpNo_absent2'];
		$query_result = User_trds::getInstance()->update_trainee_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function submit_day3() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$table = "tbl_training_request";
		$array_fields = array(
			'day3',
			'day3_reason'
		);
		$array_values = array(
		1,
		$return['absent_comment3']
		);
	
		$pkid = $return['fkEmpNo_absent3'];
		$query_result = User_trds::getInstance()->update_trainee_query($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

// _______________________________________________________________ TRAINING ENDORSEMENT CODES ___________________________________________________________________________________

	function get_endo_last_conno() {
		require_once('../class/oop_trds.php');  // Ensure the correct path to your DB class
	
		// Query to get the last control number from tbl_training_request
		$table  = "tbl_training_endorsement";
		$query_result = User_trds::getInstance()->select_query(
			array('endorsement_docno'),  // Select only the conno field
			$table,
			'',  // No joins
			'ORDER BY pkid DESC LIMIT 1',  // Get the last record based on the primary key or last inserted
			'',  // No ordering
			''   // No limit (already limited to 1)
		);
	
		if ($query_result && mysqli_num_rows($query_result) > 0) {
			$row = mysqli_fetch_assoc($query_result);
			$lastConNo = $row['endorsement_docno'];
	
			// Log the last control number for debugging
			error_log("Last control number fetched: " . $lastConNo);
	
			// Extract the counter (digits after the hyphen) using regex
			preg_match('/-(\d+)$/', $lastConNo, $matches);
			$lastCounter = isset($matches[1]) ? intval($matches[1]) : 0;
	
			// Log the extracted last counter
			error_log("Last counter extracted: " . $lastCounter);
	
			// Return the last counter as the response
			echo json_encode($lastCounter);
		} else {
			// Log if no records are found
			error_log("No records found, starting with 0.");
	
			// If no records are found, start from 0
			echo json_encode(0);
		}
	
		exit;
	}	

	function get_control_no() {
		require_once('../class/oop_trds.php');

		$table        = "tbl_training_request";
		$array_fields = array('DISTINCT conno');
		$joins        = '';
		$sql_where 	  = 'WHERE logdel=0 AND isConformed=1 AND isReceived=1';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['conno'];
		}
	
		echo json_encode($data);
	}

	function get_tr_docno(){
		require_once('../class/oop_trds.php'); // OOP Path

		$table = "tbl_training_request";
		$array_fields = array('fkdocno');
		$joins = "";
		$sql_where = 'WHERE conno = "' . $_POST['CTRLNo'] . '"';
		$sql_order = '';
		$sql_limit = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		// Fetch data to display
		$data = array();
	
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'fkdocno' => $row['fkdocno']
			);
		}
	
		echo json_encode($data);
	}

	function get_docno_details(){
		require_once('../class/oop_trds.php');

		$table = "tbl_training_request";
		$array_fields = array('fkdocno', 'fkdate_hired', 'fkEmpNo', 'fkfullname', 'fkpds', 'fktitle', 'fkremarks');
		$joins = "";
		$sql_where = 'WHERE fkdocno = "' . $_POST['FKDocNo'] . '"';
		$sql_order = '';
		$sql_limit = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		// Fetch data to display
		$data = array();
	
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'fkdate_hired' => $row['fkdate_hired'],
				'fkEmpNo' => $row['fkEmpNo'],
				'fkfullname' => $row['fkfullname'],
				'fkpds' => $row['fkpds'],
				'fktitle' => $row['fktitle'],
				'fkremarks' => $row['fkremarks']
			);
		}
	
		echo json_encode($data);
	}

	function add_training_endorsement(){
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$table  = "tbl_training_endorsement";

		$Endodocno = $return['docno'];
		$Endoto = $return['selectedValues'];
		$EndoTRCTRL = $return['tr_ctrl'];
		$Endoattn = $return['selectedAttnValues'];
		$EndoHRMemo = $return['hr_memo'];
		$Endosubject = $return['subject'];
		$Endodatenow = $return['date_now'];
		$Endopreparedby = $return['preparedby'];
		$Endonotedby = $return['notedby'];

		$rows = $return['rows'];

		foreach($rows as $row){

			$fkdate_hired = $row['fkdate_hired'];
			$fkEmpNo = $row['fkEmpNo'];
			$fkfullname = $row['fkfullname'];
			$fkpds = $row['fkpds'];
			$fktitle = $row['fktitle'];
			$fkremarks = $row['fkremarks'];

			$array_fields = array(
				'endorsement_docno',
				'endo_to',
				'endo_attn',
				'endo_subject',
				'endo_hr_memo',
				'endo_tr_ctrlno',
				'endo_date_now',
				'endo_date_hired',
				'endo_empno',
				'endo_fullname',
				'endo_pds',
				'endo_title',
				'endo_remarks',
				'endo_preparedby',
				'endo_notedby'
			);
	
			$array_values = array(
				$Endodocno,
				$Endoto,
				$Endoattn,
				$Endosubject,
				$EndoHRMemo,
				$EndoTRCTRL,
				$Endodatenow,
				$fkdate_hired,
				$fkEmpNo,
				$fkfullname,
				$fkpds,
				$fktitle,
				$fkremarks,
				$Endopreparedby,
				$Endonotedby
				
			);
	
			$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
		}

		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function check_training_endo(){
		require_once('../class/oop_trds.php');
	
		$array_fields = array('endorsement_docno','endo_hr_memo','endo_tr_ctrlno');
		$table        = "tbl_training_endorsement";
		$joins        = '';
		$sql_where    = 'WHERE endorsement_docno = "' . $_POST['endorsementDocno'] . '" AND endo_hr_memo = "' . $_POST['endoHRMemo'] . '" AND endo_tr_ctrlno = "' . $_POST['endoTRCtrlno'] . '" AND logdel = 0';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		if(mysqli_num_rows($query_result) > 0){
			$docno = mysqli_fetch_assoc($query_result);
			$data['endorsement_docno'] = $docno['endorsement_docno'];
		}
		echo json_encode($data);
	}

	function view_training_endo(){
		require_once('../class/oop_trds.php');
	
		$array_fields = array('endo_date_hired', 'endo_empno', 'endo_fullname', 'endo_pds', 'endo_title', 'endo_remarks');
		$table = "tbl_training_endorsement";
		$joins = "";
		$sql_where = 'WHERE endorsement_docno = "' . $_POST['docno'] . '"';
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'endo_date_hired' => $row['endo_date_hired'],
				'endo_empno' => $row['endo_empno'],
				'endo_fullname' => $row['endo_fullname'],
				'endo_pds' => $row['endo_pds'],
				'endo_title' => $row['endo_title'],
				'endo_remarks' => $row['endo_remarks']
			);
		}
	
		echo json_encode($data);
	}

// _______________________________________________________________ TRAINING ATTENDANCE CODES ___________________________________________________________________________________

	function get_docno(){
		require_once('../class/oop_trds.php');

			$table        = "tbl_training_request";
			$array_fields = array('DISTINCT fkdocno');
			$joins        = '';
			$sql_where 	  = 'WHERE conno = "' . $_POST['ctrlnumber'] . '"';
			$sql_order    = '';
			$sql_limit    = '';
			$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
			$data = array();
			while($row = mysqli_fetch_assoc($query_result)){
				$data[] = $row['fkdocno'];
			}
		
			echo json_encode($data);
	}

	// function check_conno_date_attendance(){
	// 	require_once('../class/oop_trds.php');

	// 	$array_fields = array('fkconno');
	// 	$table        = "tbl_attendance";
	// 	$joins        = '';
	// 	$sql_where 	  = 'WHERE fkconno = "' . $_POST[''] . '" AND day1 "' . $_POST[''] . '" AND logdel = 0';
	// 	$sql_order    = '';
	// 	$sql_limit    = '';
	// 	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	// 	$data = array();
	// 	if(mysqli_num_rows($query_result) > 0){
	// 		$fkconno = mysqli_fetch_assoc($query_result);
	// 		$data['fkconno'] = $fkconno['fkconno'];
	// 	}
	// 	echo json_encode($data);
	// }

	function check_attendance() {
		require_once('../class/oop_trds.php');
	
		$array_fields = array('fkconno');
		$table        = "tbl_attendance";
		$joins        = '';
		$sql_where    = 'WHERE fkconno = "' . $_POST['fkConNo'] . '" AND day1 = "' . $_POST['trDate'] . '" AND logdel = 0';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		if (mysqli_num_rows($query_result) > 0) {
			$ctrlnum = mysqli_fetch_assoc($query_result);
			$data['exists'] = true; // Explicitly indicate the record exists
		} else {
			$data['exists'] = false; // Explicitly indicate no record exists
		}
	
		echo json_encode($data);
	}
	
	// ORIGINAL NAGANA submit_attendance
	function submit_attendance() {
		require_once '../class/oop_trds.php';
		$return = $_POST;
		$table = "tbl_attendance";
	
		$rows = $return['rows']; // Assuming 'rows' contains an array of table row data
	
		foreach ($rows as $row) {
			// Extract each employee's data
			$attendance_status = $row['day1_status'];
			$fkEmpNo = $row['fkEmpNo'];
			$fkfullname = $row['fkfullname'];
			$fkdate_hired = $row['fkdate_hired'];
			$fkpds = $row['fkpds'];
			$attendance_remarks = $row['day1_reason'];
			$training_date = $return['view_training_date'];
			$control_number = $return['view_ctrlno'];
	
			// Check if the row with the same control number and date already exists
			$existingQuery = "SELECT * FROM $table WHERE fkconno = '$control_number' AND day1 = '$training_date' AND fkEmpNo = '$fkEmpNo' AND logdel = 0";
			$existingResult = mysql_query($existingQuery);
	
			if (mysql_num_rows($existingResult) > 0) {
				// If it exists, update the row
				$updateQuery = "
					UPDATE $table 
					SET 
						day1_status = '$attendance_status',
						day1_reason = '$attendance_remarks'
					WHERE 
						fkconno = '$control_number' 
						AND day1 = '$training_date' 
						AND fkEmpNo = '$fkEmpNo'
				";
				$query_result = mysql_query($updateQuery);
			} else {
				// Otherwise, insert a new row
				$array_fields = array(
					'fkconno', 
					'fkEmpNo', 
					'date_hired', 
					'fullname', 
					'pds', 
					'day1', 
					'day1_status',
					'day1_reason'
				);
	
				$array_values = array(
					$control_number,
					$fkEmpNo,
					$fkdate_hired,
					$fkfullname,
					$fkpds,
					$training_date,
					$attendance_status,
					$attendance_remarks
				);
	
				$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
			}
		}
	
		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function count_training(){
		require_once('../class/oop_trds.php');

		$array_fields = array('DISTINCT fkconno, day1');
		$table        = "tbl_attendance";
		$joins        = '';
		$sql_where 	  = 'WHERE fkconno = "' . $_POST['fkConno'] . '" AND logdel = 0';
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		if(mysqli_num_rows($query_result) >= 3){
			$fkconno = mysqli_fetch_assoc($query_result);
			$data['fkconno'] = $fkconno['fkconno'];
		}
		echo json_encode($data);
	}

	// Nitatrabaho ko
	// function submit_attendance() {
	// 	require_once '../class/oop_trds.php';
	// 	$return = $_POST;
	// 	$table = "tbl_attendance";
	
	// 	$rows = $return['rows']; // Assuming 'rows' contains an array of table row data
	// 	$control_number = $return['view_ctrlno']; // Get the control number from the submitted form
	// 	$training_date = $return['view_training_date']; // Get the training date
	
	// 	// Check how many records exist for the same control number and training date
	// 	$countQuery = "SELECT COUNT(*) AS record_count FROM $table WHERE fkconno = '$control_number' AND day1 = '$training_date' AND logdel = 0";
	// 	$countResult = mysql_query($countQuery);
	// 	$row = mysql_fetch_assoc($countResult);
	// 	$existingRecordsCount = $row['record_count'];
	
	// 	// If there are already 3 records, return an error
	// 	if ($existingRecordsCount >= 3) {
	// 		$return["result"] = 'error';
	// 		$return["message"] = "You can only submit up to 3 attendance records for the same control number.";
	// 		echo json_encode($return);
	// 		return;
	// 	}
	
	// 	foreach ($rows as $row) {
	// 		// Extract each employee's data
	// 		$attendance_status = $row['day1_status'];
	// 		$fkEmpNo = $row['fkEmpNo'];
	// 		$fkfullname = $row['fkfullname'];
	// 		$fkdate_hired = $row['fkdate_hired'];
	// 		$fkpds = $row['fkpds'];
	// 		$attendance_remarks = $row['day1_reason'];
	
	// 		// Check if the row with the same control number and date already exists
	// 		$existingQuery = "SELECT * FROM $table WHERE fkconno = '$control_number' AND day1 = '$training_date' AND fkEmpNo = '$fkEmpNo' AND logdel = 0";
	// 		$existingResult = mysql_query($existingQuery);
	
	// 		if (mysql_num_rows($existingResult) > 0) {
	// 			// If it exists, update the row
	// 			$updateQuery = "
	// 				UPDATE $table 
	// 				SET 
	// 					day1_status = '$attendance_status',
	// 					day1_reason = '$attendance_remarks'
	// 				WHERE 
	// 					fkconno = '$control_number' 
	// 					AND day1 = '$training_date' 
	// 					AND fkEmpNo = '$fkEmpNo'
	// 			";
	// 			$query_result = mysql_query($updateQuery);
	// 		} else {
	// 			// Otherwise, insert a new row
	// 			$array_fields = array(
	// 				'fkconno', 
	// 				'fkEmpNo', 
	// 				'date_hired', 
	// 				'fullname', 
	// 				'pds', 
	// 				'day1', 
	// 				'day1_status',
	// 				'day1_reason'
	// 			);
	
	// 			$array_values = array(
	// 				$control_number,
	// 				$fkEmpNo,
	// 				$fkdate_hired,
	// 				$fkfullname,
	// 				$fkpds,
	// 				$training_date,
	// 				$attendance_status,
	// 				$attendance_remarks
	// 			);
	
	// 			$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
	// 		}
	// 	}
	
	// 	$return["result"] = json_encode($query_result);
	// 	echo json_encode($return);
	// }
	
	

	// function submit_attendance(){
	// 	require_once '../class/oop_trds.php';
	// 	$return = $_POST;
	// 	$table = "tbl_attendance";

	// 	$rows = $return['rows']; // Assuming 'rows' contains an array of table row data

	// 	foreach ($rows as $row) {
	// 		// Extract each employee's data
	// 		$attendance_status = $row['day1_status'];
	// 		$fkEmpNo = $row['fkEmpNo'];
	// 		$fkfullname = $row['fkfullname'];
	// 		$fkdate_hired = $row['fkdate_hired'];
	// 		$fkpds = $row['fkpds'];
	// 		$attendance_remarks = $row['day1_reason'];

	// 		// Prepare array for insert or update query
	// 		$array_fields = array(
	// 			'fkconno', 
	// 			'fkEmpNo', 
	// 			'date_hired', 
	// 			'fullname', 
	// 			'pds', 
	// 			'day1', 
	// 			'day1_status',
	// 			'day1_reason'
	// 		);

	// 		$array_values = array(
	// 			$return['view_ctrlno'],
	// 			$fkEmpNo,
	// 			$fkdate_hired,
	// 			$fkfullname,
	// 			$fkpds,
	// 			$return['view_training_date'],
	// 			$attendance_status,
	// 			$attendance_remarks
	// 		);

	// 		// Insert or update for each row
	// 		$pkid = isset($row['pkid']) ? $row['pkid'] : ''; // Adjust if you have PKID
	// 		if (empty($pkid)) {
	// 			$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
	// 		} else {
	// 			$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
	// 		}
	// 	}

	// 	$return["result"] = json_encode($query_result);
	// 	echo json_encode($return);
	// }

	// function submit_attendance(){
	// 	require_once('../class/oop_trds.php');

	// 	$return = $_POST;
	// 	$table  = "tbl_attendance";
	// 	$array_fields = array(
	// 	'fkconno',
	// 	'fkEmpNo',
	// 	'date_hired',
	// 	'fullname',
	// 	'pds',
	// 	'day1',
	// 	'day1_status',
	// 	'day1_reason',
	// 	);

	// 	$array_values = array(
	// 	$return['view_ctrlno'],
	// 	$return['empno'],
	// 	$return['date_hired'],
	// 	$return['fullname'],
	// 	$return['pds'],
	// 	$return['view_training_date'],
	// 	$return['radio_add_attendance'],
	// 	$return['add_reason'],
	// 	);

	// 	$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);

	// 	$return["result"] = json_encode($query_result);
	// 	echo json_encode($return);
	// }

	function update_attendance(){
		require_once('../class/oop_trds.php');

		$return = $_POST;
		$table  = "tbl_attendance";
		$array_fields = array(
		'fkconno',
		'fkEmpNo',
		'date_hired',
		'fullname',
		'pds',
		'day1',
		'day1_status',
		'day1_reason',
		);

		$array_values = array(
		$return['view_ctrlno'],
		$return['empno'],
		$return['date_hired'],
		$return['fullname'],
		$return['pds'],
		$return['view_training_date'],
		$return['radio_add_attendance'],
		$return['add_reason'],
		);

		// Insert or update for each row
		$pkid = isset($row['pkid']) ? $row['pkid'] : '';
		if (empty($pkid)) {
			$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
		} else {
			$query_result = User_trds::getInstance()->update_query($table, $array_fields, $array_values, $pkid);
		}

		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function get_trainee_attendance(){
		require_once('../class/oop_trds.php'); // OOP Path

		$table = "tbl_attendance";
		$array_fields = array('day1_status', 'fkEmpNo', 'fullname', 'date_hired', 'pds', 'day1_reason');
		$sql_where = 'WHERE fkconno = "' . $_POST['fkControlNum'] . '" AND day1 = "' . $_POST['fkTrainingDate'] . '" AND logdel = 0';
		$sql_order = '';
		$sql_limit = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		// Fetch data to display
		$data = array();
	
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'day1_status' => $row['day1_status'],
				'fkEmpNo' => $row['fkEmpNo'],
				'fullname' => $row['fullname'],
				'date_hired' => $row['date_hired'],
				'pds' => $row['pds'],
				'day1_reason' => $row['day1_reason']
			);
		}
	
		echo json_encode($data);
	}

	function get_conno_trainee(){
		require_once('../class/oop_trds.php'); // OOP Path

		$table = "tbl_training_request";
		$array_fields = array('fkEmpNo');
		$joins = "";
		$sql_where = 'WHERE conno = "' . $_POST['CTRLNumber'] . '"';
		$sql_order = '';
		$sql_limit = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		// Fetch data to display
		$data = array();
	
		while($row = mysqli_fetch_assoc($query_result)) {
			$data[] = $row['fkEmpNo'];

		}
	
		echo json_encode($data);
	}

	// ORIGINAL get_conno_trainee_table
	// function get_conno_trainee_table() {
	// 	require_once('../class/oop_trds.php');
	
	// 	$array_fields = array('*');
	// 	$table = "tbl_training_request";
	// 	$joins = "";
	// 	$sql_where = 'WHERE conno = "' . $_POST['trainee_conno'] . '" AND logdel = 0 AND isConformed=1 AND isReceived=1 AND (isHeadApproval=0 OR isHeadApproval=1 OR isHeadApproval=2 OR isHeadApproval=3)';
	// 	$sql_order = '';
	// 	$sql_limit = '';
	
	// 	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
	// 	$data = array();
		
	// 	while($row = mysqli_fetch_assoc($query_result)) {
	// 		$data[] = array(
	// 			'fkEmpNo' => $row['fkEmpNo'],
	// 			'fkfullname' => $row['fkfullname'],
	// 			'fkdate_hired' => $row['fkdate_hired'],
	// 			'fkpds' => $row['fkpds']
	// 		);
	// 	}
	
	// 	echo json_encode($data);
	// }

	
	// Nagana na
	// function get_conno_trainee_table() {
	// 	require_once('../class/oop_trds.php');
	
	// 	$array_fields = array(
	// 		'tbl_attendance.day1_status', 
	// 		'tbl_attendance.fkEmpNo', 
	// 		'tbl_attendance.fullname', 
	// 		'tbl_training_request.fkdate_hired', 
	// 		'tbl_training_request.fkpds', 
	// 		'tbl_attendance.day1_reason'
	// 	);
	// 	$table = "tbl_training_request";
	// 	$joins = "INNER JOIN tbl_attendance ON tbl_training_request.conno = tbl_attendance.fkconno";
	// 	$sql_where = 'WHERE tbl_training_request.conno = "' . $_POST['trainee_conno'] . '" AND tbl_training_request.logdel = 0 AND tbl_attendance.date_time_created = (
    //     SELECT MAX(inner_attendance.date_time_created)
    //     FROM tbl_attendance AS inner_attendance
    //     WHERE inner_attendance.fullname = tbl_attendance.fullname
    // 	)';
	// 	$sql_order = 'GROUP BY tbl_attendance.fullname';
	// 	$sql_limit = '';
	
	// 	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
	// 	$data = array();
		
	// 	while($row = mysqli_fetch_assoc($query_result)) {
	// 		$data[] = array(
	// 			'day1_status' => $row['day1_status'],
	// 			'fkEmpNo' => $row['fkEmpNo'],
	// 			'fullname' => $row['fullname'],
	// 			'fkdate_hired' => $row['fkdate_hired'],
	// 			'fkpds' => $row['fkpds'],
	// 			'day1_reason' => $row['day1_reason']
	// 		);
	// 	}
	
	// 	echo json_encode($data);
	// }

	// Nitatrabaho ko
	function get_conno_trainee_table() {
		require_once('../class/oop_trds.php');
	
		// Instantiate the User_trds class to access the method
		$user_trds = User_trds::getInstance();
	
		// Use the new OOP method to check for records in tbl_attendance
		if ($user_trds->check_records_in_attendance($_POST['trainee_conno'])) {
			// If records exist in tbl_attendance, proceed with this query
			$array_fields = array(
				'tbl_attendance.day1_status', 
				'tbl_attendance.fkEmpNo', 
				'tbl_attendance.fullname', 
				'tbl_training_request.fkdate_hired', 
				'tbl_training_request.fkpds', 
				'tbl_attendance.day1_reason'
			);
			$table = "tbl_training_request";
			$joins = "INNER JOIN tbl_attendance ON tbl_training_request.conno = tbl_attendance.fkconno";
			$sql_where = 'WHERE tbl_training_request.conno = "' . $_POST['trainee_conno'] . '" AND tbl_training_request.logdel = 0 AND tbl_attendance.date_time_created = (
				SELECT MAX(inner_attendance.date_time_created)
				FROM tbl_attendance AS inner_attendance
				WHERE inner_attendance.fullname = tbl_attendance.fullname
			)';
			$sql_order = 'GROUP BY tbl_attendance.fullname';
			$sql_limit = '';
	
			$query_result = $user_trds->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
			$data = array();
			while ($row = mysqli_fetch_assoc($query_result)) {
				$data[] = array(
					'day1_status' => $row['day1_status'],
					'fkEmpNo' => $row['fkEmpNo'],
					'fullname' => $row['fullname'],
					'fkdate_hired' => $row['fkdate_hired'],
					'fkpds' => $row['fkpds'],
					'day1_reason' => $row['day1_reason']
				);
			}
			echo json_encode($data);
	
		} else {
			// If no records exist in tbl_attendance, proceed with this query
			$array_fields = array('*');
			$table = "tbl_training_request";
			$joins = "";
			$sql_where = 'WHERE conno = "' . $_POST['trainee_conno'] . '" AND logdel = 0 AND isConformed = 1 AND isReceived = 1 AND (isHeadApproval = 0 OR isHeadApproval = 1 OR isHeadApproval = 2 OR isHeadApproval = 3)';
			$sql_order = '';
			$sql_limit = '';
	
			$query_result = $user_trds->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
			$data = array();
			while ($row = mysqli_fetch_assoc($query_result)) {
				$data[] = array(
					'day1_status' => $row[''],
					'fkEmpNo' => $row['fkEmpNo'],
					'fullname' => $row['fkfullname'],
					'fkdate_hired' => $row['fkdate_hired'],
					'fkpds' => $row['fkpds'],
					'day1_reason' => $row['']
				);
			}
			echo json_encode($data);
		}
	}
	
	// function get_conno_trainee_table() {
	// 	require_once('../class/oop_trds.php');
	
	// 	$array_fields = array('*');
	// 	$table = "tbl_training_request";
	// 	$joins = "";
	// 	$sql_where = 'WHERE conno = "' . $_POST['trainee_conno'] . '" AND logdel = 0 AND isConformed=1 AND isReceived=1 AND (isHeadApproval=0 OR isHeadApproval=1 OR isHeadApproval=2 OR isHeadApproval=3)';
	// 	$sql_order = '';
	// 	$sql_limit = '';
	
	// 	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
	// 	$data = array();
		
	// 	while($row = mysqli_fetch_assoc($query_result)) {
	// 		$data[] = array(
	// 			'fkEmpNo' => $row['fkEmpNo'],
	// 			'fkfullname' => $row['fkfullname'],
	// 			'fkdate_hired' => $row['fkdate_hired'],
	// 			'fkpds' => $row['fkpds']
	// 		);
	// 	}
	
	// 	echo json_encode($data);
	// }

	// function get_conno_trainee_table() {
	// 	require_once('../class/oop_trds.php');
	
	// 	$array_fields = array('DISTINCT t.fkEmpNo', 't.fkfullname','t.fkdate_hired','t.fkpds','a.day1_status','a.day1_reason');
	// 	$table = "tbl_training_request t";
	// 	$joins = "INNER JOIN tbl_attendance a ON t.conno = a.fkconno";
	// 	$sql_where = 'WHERE t.conno = "' . $_POST['trainee_conno'] . '" AND t.logdel = 0 AND a.logdel = 0';
	// 	$sql_order = '';
	// 	$sql_limit = '';
	
	// 	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
	// 	$data = array();
		
	// 	while($row = mysqli_fetch_assoc($query_result)) {
	// 		$data[] = array(
	// 			'fkEmpNo' => $row['fkEmpNo'],
	// 			'fkfullname' => $row['fkfullname'],
	// 			'fkdate_hired' => $row['fkdate_hired'],
	// 			'fkpds' => $row['fkpds'],
	// 			'day1_status' => $row['day1_status'],
	// 			'day1_reason' => $row['day1_reason']
	// 		);
	// 	}
	
	// 	echo json_encode($data);
	// }

	// _______________________________________________________________ EXAMS HANDLER CODES ___________________________________________________________________________________

	function add_exam() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$table  = "tbl_exams";
	
		$category = 'NEW';
		// $revision_no = $return['revision_no'];
		$revision_no = 'Rev.No.0.00';
		$purpose = $return['purpose'];
		$position = $return['position'];
		$remarks = $return['remarks'];
		$passing_score = $return['passing_score'];
	
			$array_fields = array(
				'exam_category', 'exam_revision_no', 'exam_purpose', 'exam_position', 'exam_remarks', 'exam_passing_score'
			);
	
			$array_values = array(
				$category, $revision_no, $purpose, $position, $remarks, $passing_score
			);

			$query_result = User_trds::getInstance()->insert_query($table,$array_fields,$array_values);

		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function modify_exam() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$table  = "tbl_exams";
		
		$modify_purpose = $return['modify_purpose'];
		$modify_position = $return['modify_position'];
		$modify_remarks = $return['modify_exam_remarks'];
		$modify_passing_score = $return['modify_passing_score'];
	
			$array_fields = array(
				'exam_purpose', 'exam_position', 'exam_remarks', 'exam_passing_score'
			);
	
			$array_values = array(
				$modify_purpose, $modify_position, $modify_remarks, $modify_passing_score
			);

			$pkid = $return['exam_pkid'];
			$query_result = User_trds::getInstance()->update_record($table,$array_fields,$array_values,$pkid);
			
		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function update_passing_score() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$table  = "tbl_exam_records";
		
		$modify_passing_score = $return['m_passing_score'];
	
			$array_fields = array(
				'result_exam_passing_score'
			);
	
			$array_values = array(
				$modify_passing_score
			);

			$pkid = $return['modify_pkid'];
			$query_result = User_trds::getInstance()->update_exam_query($table,$array_fields,$array_values,$pkid);
			
		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function delete_exam() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('exam_status');
		$array_values = array(1);
		$table = "tbl_exams";
	
		$pkid = $return['pkid'];
		$query_result = User_trds::getInstance()->update_record($table, $array_fields, $array_values, $pkid);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function add_new_exam() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$table  = "tbl_exams";
	
		$category = 'REVISED';
		$revision_no = $return['new_rev_no'];
		$purpose = $return['new_exam_purpose'];
		$position = $return['new_exam_position'];
		$remarks = $return['new_exam_remarks'];
		$passing_score = $return['new_passing_score'];
	
			$array_fields = array(
				'exam_category', 'exam_revision_no', 'exam_purpose', 'exam_position', 'exam_remarks', 'exam_passing_score'
			);
	
			$array_values = array(
				$category, $revision_no, $purpose, $position, $remarks, $passing_score
			);

			$query_result = User_trds::getInstance()->insert_query($table,$array_fields,$array_values);

		if ($query_result) {
			// Retrieve the last inserted ID
			$last_inserted_id = User_trds::getInstance()->get_last_insert_id(); // Assuming you have a method like this in your `User_trds` class
			
			$return["result"] = "Success";
			$return["pkid"] = $last_inserted_id;
		} else {
			$return["result"] = "Error";
		}
	
		echo json_encode($return);
	}

	function get_purpose() {
		require_once('../class/oop.php');

		$array_fields = array('DISTINCT TypeOfTraining');
		$table        = "tbl_training_type_of_training";
		$joins        = '';
		$sql_where 	  = "";
		$sql_order    = '';
		$sql_limit    = '';
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['TypeOfTraining'];
		}
	
		echo json_encode($data);
	}

	// 1/3/2025 (edited without revision number)
	if ($_POST['action'] === 'check_purpose') {
		check_purpose();
	}
	
	function check_purpose() {
		require_once('../class/oop_trds.php');
	
		// Retrieve 'purpose' and 'position' from the POST request
		$purpose = isset($_POST['purpose']) ? $_POST['purpose'] : '';
		$position = isset($_POST['position']) ? $_POST['position'] : '';
		$table = "tbl_exams";
	
		// Prepare the response structure
		$response = array('exists' => false);
	
		// Check if the purpose and position combination already exists in the database
		$query_result = User_trds::getInstance()->select_query(
			array('pkid'),
			$table,
			"WHERE exam_purpose = '$purpose' AND exam_position = '$position' AND logdel = 0",
			'LIMIT 1'
		);
	
		if ($query_result && mysqli_num_rows($query_result) > 0) {
			$response['exists'] = true;
		}
	
		// Return the response as JSON
		echo json_encode($response);
		exit;
	}	

	// _______________________________________________________________ QUESTIONS HANDLER CODES ___________________________________________________________________________________

	function display_position() {
		require_once('../class/oop_trds.php'); // Adjust path as needed
	
		$array_fields = array('exam_revision_no', 'exam_purpose', 'exam_position', 'exam_remarks', 'exam_passing_score');
		$table = "tbl_exams";
		$sql_where = 'WHERE logdel = 0 AND exam_status = 0 AND pkid= "' . $_POST['text_exam_pkid'] . '"';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where);
	
		$data = array();

		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'exam_revision_no' => $row['exam_revision_no'],
				'exam_purpose' => $row['exam_purpose'],
				'exam_position' => $row['exam_position'],
				'exam_remarks' => $row['exam_remarks'],
				'exam_passing_score' => $row['exam_passing_score']
			);
		}
	
		echo json_encode($data);
	}

	function get_exam_details() {
		require_once('../class/oop_trds.php'); // Adjust path as needed
	
		$array_fields = array('exam_revision_no', 'exam_purpose', 'exam_position', 'exam_remarks', 'exam_passing_score');
		$table = "tbl_exams";
		$sql_where = 'WHERE logdel = 0 AND exam_status = 0 AND pkid= "' . $_POST['exam_pkid'] . '"';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where);
	
		$data = array();

		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'exam_revision_no' => $row['exam_revision_no'],
				'exam_purpose' => $row['exam_purpose'],
				'exam_position' => $row['exam_position'],
				'exam_remarks' => $row['exam_remarks'],
				'exam_passing_score' => $row['exam_passing_score']
			);
		}
	
		echo json_encode($data);
	}

	function get_last_qNo() {
		require_once('../class/oop_trds.php');
	
		$pkid = isset($_POST['pkid']) ? intval($_POST['pkid']) : 0;
	
		$table  = "tbl_questions";
		$query_result = User_trds::getInstance()->select_query(
			array('question_number'),
			$table,
			"WHERE exam_pkid = $pkid AND question_status = 0 AND logdel = 0",
			'ORDER BY pkid DESC LIMIT 1'
		);
	
		if ($query_result && mysqli_num_rows($query_result) > 0) {
			$row = mysqli_fetch_assoc($query_result);
			$lastDocNo = $row['question_number'];
	
			error_log("Last doc number fetched: " . $lastDocNo);
	
			$lastCounter = intval($lastDocNo);
	
			error_log("Last number extracted: " . $lastCounter);
	
			echo json_encode($lastCounter);
		} else {
			error_log("No records found for exam_pkid $pkid, starting with 0.");
			echo json_encode(0);
		}
	
		exit;
	}	

	// // original code
	function add_question() {
		require_once('../class/oop_trds.php');
		
		$return = $_POST;
		$table = "tbl_questions";
	
		// Collect data from the request
		$question_number = $return['question_number'];
		$question_pkid = $return['question_pkid'];
		$questionType = $return['questionType'];
		$question_description = $return['question_description'];
		$question_points = $return['question_points'];

		// handle question description
		$question = json_decode($return['question'], true);
		$question = is_array($question) ? implode(', <br>', $question) : $question;
	
		// Handle question choices
		$question_choices = json_decode($return['question_choices'], true);
		$question_choices = is_array($question_choices) ? implode(', <br>', $question_choices) : $question_choices;
	
		// Handle question answer
		$question_answer = json_decode($return['question_answer'], true);
		$question_answer = is_array($question_answer) ? implode(', <br>', $question_answer) : $question_answer;

		// // Check if an image file is uploaded
		$question_image_path = 'uploads/no_image.png';

		if (isset($_FILES['question_image_input']) && $_FILES['question_image_input']['error'] == 0) {
			$uploads_dir = '../uploads/';
			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir, 0777, true);
			}

			// Define the file path
			$filename = basename($_FILES['question_image_input']['name']);
			$target_file = $uploads_dir . $filename;

			// Move the uploaded file to the "uploads" folder
			if (move_uploaded_file($_FILES['question_image_input']['tmp_name'], $target_file)) {
				$question_image_path = 'uploads/' . $filename;
				echo "uploaded";
			} else {
				$return["result"] = "Error uploading file.";
				echo json_encode($return);
				return;
			}
		}
	
		// Prepare the array fields and values for the query
		$array_fields = array(
			'question_number', 'exam_pkid', 'question_type', 'question_image_path', 'question_desc', 'question', 'question_points', 'question_choices', 'question_answer'
		);
	
		$array_values = array(
			$question_number, $question_pkid, $questionType, $question_image_path, $question_description, $question, $question_points, $question_choices, $question_answer
		);
	
		// Insert the data into the database
		$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
		
		if ($query_result) {
			$return["result"] = "Success";
		} else {
			$return["result"] = "Error";
		}
		
		echo json_encode($return);
	}

	// function add_question() {
	// 	require_once('../class/oop_trds.php');
		
	// 	$return = $_POST;
	// 	$table = "tbl_questions";
	
	// 	// Collect data from the request
	// 	$question_number = $return['question_number'];
	// 	$question_pkid = $return['question_pkid'];
	// 	$questionType = $return['questionType'];
	// 	$question_description = $return['question_description'];
	// 	$question_points = $return['question_points'];

	// 	// handle question description
	// 	$question = json_decode($return['question'], true);
	// 	$question = is_array($question) ? implode(', <br>', $question) : $question;
	
	// 	// Handle question choices
	// 	$question_choices = json_decode($return['question_choices'], true);
	// 	$question_choices = is_array($question_choices) ? implode(', <br>', $question_choices) : $question_choices;
	
	// 	// Handle question answer
	// 	$question_answer = json_decode($return['question_answer'], true);
	// 	$question_answer = is_array($question_answer) ? implode(', <br>', $question_answer) : $question_answer;

	// 	// // Check if an image file is uploaded
	// 	$question_image_path = 'uploads/no_image.png';

	// 	if (isset($_FILES['question_image_input'])) {
	// 		$error_messages = [
	// 			UPLOAD_ERR_OK => 'There is no error, the file uploaded with success.',
	// 			UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
	// 			UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
	// 			UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
	// 			UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
	// 			UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
	// 			UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
	// 			UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.',
	// 		];
		
	// 		$error_code = $_FILES['question_image_input']['error'];
	// 		if ($error_code !== UPLOAD_ERR_OK) {
	// 			$return["result"] = $error_messages[$error_code] ?? 'Unknown upload error.';
	// 			echo json_encode($return);
	// 			return;
	// 		}
	// 	}		

	// 	if (isset($_FILES['question_image_input']) && $_FILES['question_image_input']['error'] === UPLOAD_ERR_OK) {
	// 		$uploads_dir = 'uploads/';
	// 		if (!is_dir($uploads_dir)) {
	// 			mkdir($uploads_dir, 0777, true);
	// 		}
		
	// 		// Define the file path
	// 		$filename = time() . '_' . basename($_FILES['question_image_input']['name']); // Add a timestamp to avoid overwriting files
	// 		$target_file = $uploads_dir . $filename;
		
	// 		// Validate file type
	// 		$file_type = mime_content_type($_FILES['question_image_input']['tmp_name']);
	// 		$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
		
	// 		if (!in_array($file_type, $allowed_types)) {
	// 			$return["result"] = "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
	// 			echo json_encode($return);
	// 			return;
	// 		}
		
	// 		// Move the uploaded file to the "uploads" folder
	// 		if (move_uploaded_file($_FILES['question_image_input']['tmp_name'], $target_file)) {
	// 			$question_image_path = $uploads_dir . $filename;
	// 		} else {
	// 			$return["result"] = "Error uploading file.";
	// 			echo json_encode($return);
	// 			return;
	// 		}
	// 	} else {
	// 		$error_code = $_FILES['question_image_input']['error'];
	// 		$return["result"] = "File upload error. Error code: $error_code.";
	// 		echo json_encode($return);
	// 		return;
	// 	}		
	
	// 	// Prepare the array fields and values for the query
	// 	$array_fields = array(
	// 		'question_number', 'exam_pkid', 'question_type', 'question_image_path', 'question_desc', 'question', 'question_points', 'question_choices', 'question_answer'
	// 	);
	
	// 	$array_values = array(
	// 		$question_number, $question_pkid, $questionType, $question_image_path, $question_description, $question, $question_points, $question_choices, $question_answer
	// 	);
	
	// 	// Insert the data into the database
	// 	$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
		
	// 	if ($query_result) {
	// 		$return["result"] = "Success";
	// 	} else {
	// 		$return["result"] = "Error";
	// 	}
		
	// 	echo json_encode($return);
	// }

	// 1/6/2025
	// function add_question() {
	// 	require_once('../class/oop_trds.php');
	
	// 	$return = $_POST;
	// 	$table = "tbl_questions";
	
	// 	// Collect data from the request
	// 	$question_number = $return['question_number'];
	// 	$question_pkid = $return['question_pkid'];
	// 	$questionType = $return['questionType'];
	// 	$question_description = $return['question_description'];
	// 	$question_points = $return['question_points'];
	
	// 	// Handle question description
	// 	$question = json_decode($return['question'], true);
	// 	$question = is_array($question) ? implode(', <br>', $question) : $question;
	
	// 	// Handle question choices
	// 	$question_choices = json_decode($return['question_choices'], true);
	// 	$question_choices = is_array($question_choices) ? implode(', <br>', $question_choices) : $question_choices;
	
	// 	// Handle question answer
	// 	$question_answer = json_decode($return['question_answer'], true);
	// 	$question_answer = is_array($question_answer) ? implode(', <br>', $question_answer) : $question_answer;
	
	// 	// Set default image path
	// 	$question_image_path = 'uploads/no_image.png';
	
	// 	// Handle file upload
	// 	if (isset($_FILES["question_image_input"]) && $_FILES["question_image_input"]["error"] === UPLOAD_ERR_OK) {
	// 		$upload_dir = "uploads/";
	// 		$file_name = basename($_FILES["question_image_input"]["name"]);
	// 		$target_file = $upload_dir . $file_name;
	
	// 		// Validate file type and size
	// 		$allowedExts = array("gif", "jpeg", "jpg", "png");
	// 		$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
	// 		if (in_array($file_type, $allowedExts) && $_FILES["question_image_input"]["size"] <= 5 * 1024 * 1024) {
	// 			if (move_uploaded_file($_FILES["question_image_input"]["tmp_name"], $target_file)) {
	// 				$question_image_path = $target_file;
	// 			} else {
	// 				$return["result"] = "Error uploading file.";
	// 				echo json_encode($return);
	// 				return;
	// 			}
	// 		} else {
	// 			$return["result"] = "Invalid file type or size.";
	// 			echo json_encode($return);
	// 			return;
	// 		}
	// 	}
	
	// 	// Prepare the array fields and values for the query
	// 	$array_fields = array(
	// 		'question_number', 'exam_pkid', 'question_type', 'question_image_path', 'question_desc', 'question', 'question_points', 'question_choices', 'question_answer'
	// 	);
	
	// 	$array_values = array(
	// 		$question_number, $question_pkid, $questionType, $question_image_path, $question_description, $question, $question_points, $question_choices, $question_answer
	// 	);
	
	// 	// Insert the data into the database
	// 	$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
	
	// 	if ($query_result) {
	// 		$return["result"] = "Success";
	// 	} else {
	// 		$return["result"] = "Error";
	// 	}
	
	// 	echo json_encode($return);
	// }	

	// function add_question() {
	// 	require_once('../class/oop_trds.php');
	
	// 	$return = $_POST;
	// 	$table = "tbl_questions";
	
	// 	// Collect data from the request
	// 	$question_number = $return['question_number'];
	// 	$question_pkid = $return['question_pkid'];
	// 	$questionType = $return['questionType'];
	// 	$question_description = $return['question_description'];
	// 	$question_points = $return['question_points'];
	
	// 	// Handle question description
	// 	$question = json_decode($return['question'], true);
	// 	$question = is_array($question) ? implode(', <br>', $question) : $question;
	
	// 	// Handle question choices
	// 	$question_choices = json_decode($return['question_choices'], true);
	// 	$question_choices = is_array($question_choices) ? implode(', <br>', $question_choices) : $question_choices;
	
	// 	// Handle question answer
	// 	$question_answer = json_decode($return['question_answer'], true);
	// 	$question_answer = is_array($question_answer) ? implode(', <br>', $question_answer) : $question_answer;
	
	// 	// Default image path if no file is uploaded
	// 	$question_image_path = 'uploads/no_image.png';
	
	// 	// Check if an image file is uploaded
	// 	if (isset($_FILES["question_image"]) && $_FILES["question_image"]["error"] == UPLOAD_ERR_OK) {
	// 		$allowedExts = array("gif", "jpeg", "jpg", "png");
	// 		$temp = explode(".", $_FILES["question_image"]["name"]);
	// 		$extension = strtolower(end($temp));
	// 		$upload_dir = "uploads/";
	// 		$filename = uniqid() . '.' . $extension; // Generate a unique filename
	
	// 		if (
	// 			in_array($extension, $allowedExts) &&
	// 			($_FILES["question_image"]["size"] <= 5000000) // 5 MB limit
	// 		) {
	// 			// Attempt to move the uploaded file to the target directory
	// 			if (move_uploaded_file($_FILES["question_image"]["tmp_name"], $upload_dir . $filename)) {
	// 				$question_image_path = $upload_dir . $filename;
	// 				$return["result"] = "Success";
	// 			} else {
	// 				$return["result"] = "Error uploading file.";
	// 				echo json_encode($return);
	// 				return;
	// 			}
	// 		} else {
	// 			$return["result"] = "Invalid file type or size.";
	// 			echo json_encode($return);
	// 			return;
	// 		}
	// 	} elseif (isset($_FILES["question_image"]["error"]) && $_FILES["question_image"]["error"] !== UPLOAD_ERR_NO_FILE) {
	// 		$return["result"] = "File upload error: " . $_FILES["question_image"]["error"];
	// 		echo json_encode($return);
	// 		return;
	// 	}
	
	// 	// Prepare the array fields and values for the query
	// 	$array_fields = array(
	// 		'question_number', 'exam_pkid', 'question_type', 'question_image_path', 'question_desc', 'question', 'question_points', 'question_choices', 'question_answer'
	// 	);
	
	// 	$array_values = array(
	// 		$question_number, $question_pkid, $questionType, $question_image_path, $question_description, $question, $question_points, $question_choices, $question_answer
	// 	);
	
	// 	// Insert the data into the database
	// 	$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
	
	// 	if ($query_result) {
	// 		$return["result"] = "Success";
	// 	} else {
	// 		$return["result"] = "Database error.";
	// 	}
	
	// 	echo json_encode($return);
	// }	

	function modify_questions() {
		require_once('../class/oop_trds.php');
		$return = $_POST;
		$table  = "tbl_questions";
	
		// Collect data from the request
		$modify_exam_number = $return['modify_exam_number'];
		$modify_question_number = $return['modify_question_number'];
		$modify_questionType = $return['modify_questionType'];
		$modify_question_description = $return['modify_question_description'];
		$modify_question_points = $return['modify_question_points'];

		// handle question description
		$modify_question = json_decode($return['modify_question'], true);
		$modify_question = is_array($modify_question) ? implode(', <br>', $modify_question) : $modify_question;
	
		// Handle question choices
		$modify_question_choices = json_decode($return['modify_question_choices'], true);
		$modify_question_choices = is_array($modify_question_choices) ? implode(', <br>', $modify_question_choices) : $modify_question_choices;
	
		// Handle question answer
		$modify_question_answer = json_decode($return['modify_question_answer'], true);
		$modify_question_answer = is_array($modify_question_answer) ? implode(', <br>', $modify_question_answer) : $modify_question_answer;

		// 12102024
		$question_image_input = $return['modify_question_image_input'];

		// // Check for new image upload
		// if (isset($_FILES['modify_question_image_input']) && $_FILES['modify_question_image_input']['error'] === UPLOAD_ERR_OK) {
		// 	$uploads_dir = '.uploads/';
		// 	if (!is_dir($uploads_dir)) {
		// 		mkdir($uploads_dir, 0777, true);
		// 	}

		// 	$filename = basename($_FILES['modify_question_image_input']['name']);
		// 	$target_file = $uploads_dir . $filename;

		// 	if (move_uploaded_file($_FILES['modify_question_image_input']['tmp_name'], $target_file)) {
		// 		$question_image_input = $target_file;
		// 	} else {
		// 		$return["result"] = "Error uploading file.";
		// 		echo json_encode($return);
		// 		return;
		// 	}
		// } else {
		// 	$question_image_input = $return['current_question_image_input'];
		// }

		// 12102024
		// Handle image upload
		$uploads_dir = './uploads/';
		if (!is_dir($uploads_dir)) {
			mkdir($uploads_dir, 0777, true);
		}
	
		if (isset($_FILES['modify_question_image_input']) && $_FILES['modify_question_image_input']['error'] === UPLOAD_ERR_OK) {
			$filename = basename($_FILES['modify_question_image_input']['name']);
			$target_file = $uploads_dir . $filename;
	
			if (move_uploaded_file($_FILES['modify_question_image_input']['tmp_name'], $target_file)) {
				$question_image_input = $target_file;
			} else {
				$return["result"] = "Error uploading file.";
				echo json_encode($return);
				return;
			}
		} else {
			$question_image_input = $return['current_question_image_input'];
		}
	
		// Prepare the array fields and values for the query
		$array_fields = array(
			'question_number', 'exam_pkid', 'question_type', 'question_image_path', 'question_desc', 'question', 'question_points', 'question_choices', 'question_answer'
		);
	
		$array_values = array(
			$modify_question_number, $modify_exam_number, $modify_questionType, $question_image_input, $modify_question_description, $modify_question, $modify_question_points, $modify_question_choices, $modify_question_answer
		);

			$pkid = $return['question_pkid'];
			$query_result = User_trds::getInstance()->update_record($table,$array_fields,$array_values,$pkid);
			// $query_result = User_trds::getInstance()->insert_query($table,$array_fields,$array_values);

			
		$return["result"] = json_encode($query_result);
		echo json_encode($return);
	}

	function delete_question() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('logdel', 'question_status');
		$array_values = array(1, 1);
		$table = "tbl_questions";
	
		$pkid = $return['pkid'];
		$query_result = User_trds::getInstance()->update_record($table, $array_fields, $array_values, $pkid);
		// $return['result'] = $query_result ? true : false;

		if ($query_result) {
			$return["result"] = "Success";
		} else {
			$return["result"] = "Error";
		}

		echo json_encode($return);
	}

	function delete_Oquestion() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('logdel', 'question_status');
		$array_values = array(1, 1);
		$table = "tbl_questions";
	
		$pkid = $return['pkid'];
		$query_result = User_trds::getInstance()->update_question_query($table, $array_fields, $array_values, $pkid);
		// $return['result'] = $query_result ? true : false;

		if ($query_result) {
			$return["result"] = "Success";
		} else {
			$return["result"] = "Error";
		}

		echo json_encode($return);
	}

	function delete_Oexam() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('exam_status');
		$array_values = array(1);
		$table = "tbl_exams";
	
		$pkid = $return['pkid'];
		$query_result = User_trds::getInstance()->update_record($table, $array_fields, $array_values, $pkid);
		// $return['result'] = $query_result ? true : false;

		if ($query_result) {
			$return["result"] = "Success";
		} else {
			$return["result"] = "Error";
		}

		echo json_encode($return);
	}

	function delete_OexamRecord() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('result_exam_status');
		$array_values = array(1);
		$table = "tbl_exam_records";
	
		$pkid = $return['pkid'];
		$query_result = User_trds::getInstance()->delete_exam_record($table, $array_fields, $array_values, $pkid);
		// $return['result'] = $query_result ? true : false;

		if ($query_result) {
			$return["result"] = "Success";
		} else {
			$return["result"] = "Error";
		}

		echo json_encode($return);
	}

	// 12192024 GUMAGANA NA TEH! COPY
	function add_new_question() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$table = "tbl_questions";
	
		// Decode the `questions` JSON array
		$questions = json_decode($return['questions'], true);
	
		foreach ($questions as $question) {
			// Collect data for each question
			$question_number = $question['question_number'];
			$question_pkid = $question['question_pkid'];
			$questionType = $question['questionType'];
			$question_description = $question['question_description'];
			$question_points = $question['question_points'];
			$question_text = $question['question'];
			$question_choices = $question['question_choices'];
			$question_answer = $question['question_answer'];
			$question_image_input = $question['question_image_input'];
	
			// Prepare the array fields and values for the query
			$array_fields = array(
				'question_number', 'exam_pkid', 'question_type', 'question_image_path', 
				'question_desc', 'question', 'question_points', 'question_choices', 'question_answer'
			);
	
			$array_values = array(
				$question_number, $question_pkid, $questionType, $question_image_input, 
				$question_description, $question_text, $question_points, $question_choices, $question_answer
			);
	
			// Insert the data into the database
			$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
	
			// If any query fails, return an error
			if (!$query_result) {
				$return["result"] = "Error";
				echo json_encode($return);
				return;
			}
		}
	
		// If all questions are inserted successfully
		$return["result"] = "Success";
		echo json_encode($return);
	}	
	

	// _______________________________________________________________ TAKE EXAM HANDLER CODES ___________________________________________________________________________________

	function display_exam() {
		require_once('../class/oop_trds.php');
	
		$array_fields = array('pkid', 'exam_purpose', 'exam_position', 'exam_passing_score');
		$table = "tbl_exams";
		$joins = "";
		$sql_where = "WHERE exam_status = 0 AND logdel = 0 AND pkid IN (SELECT exam_pkid FROM tbl_questions)";
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
	
		// Check if the query returned results
		if ($query_result) {
			while ($row = mysqli_fetch_assoc($query_result)) {
				$data[] = array(
					'pkid' => $row['pkid'],
					'exam_purpose' => $row['exam_purpose'],
					'exam_position' => $row['exam_position'],
					'exam_passing_score' => $row['exam_passing_score']
				);
			}
		} else {
			// Log an error or handle the case when no results are found
			error_log("Database query failed: " . mysqli_error(User_trds::getInstance()->getConnection()));
		}
	
		// Send the JSON-encoded data back to the AJAX call
		echo json_encode($data);
	}

	function display_emp_details() {
		
		// 12/17/2024
		require_once('../class/oop_trds.php');

		// 12/17/2024
		$array_fields = array('DISTINCT fkfullname', 'fkEmpNo');
		$table = "tbl_training_request";
		$joins = "";
		$sql_where = "WHERE logdel = 0 AND isConformed = 1 AND isReceived = 1 AND isHeadApproval = 1";
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();

		while($row = mysqli_fetch_assoc($query_result)){
			// Add each row as an associative array with EmpNo and FullName as keys
			$data[] = array(
				'EmpNo' => $row['fkEmpNo'],
				'FullName' => $row['fkfullname']
			);
		}

		// Return the JSON-encoded associative array
		echo json_encode($data);
	}

	// 12/20/2024
	function check_employee() {
		require_once('../class/oop_trds.php');
	
		$empNo = $_POST['empNo']; // Corrected POST key
	
		$array_fields = array('DISTINCT fkfullname', 'fkEmpNo');
		$table = "tbl_training_request";
		$sql_where = "WHERE fkEmpNo = '$empNo' AND isConformed = 1 AND isReceived = 1 AND isHeadApproval = 1"; // Added quotes for safety
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where, $sql_order, $sql_limit);
	
		$data = array();
	
		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'EmpNo' => $row['fkEmpNo']
			);
		}
	
		echo json_encode($data); // Return JSON-encoded result
	}

	// 12/26/2024 JUST ADDED
	function get_take_no() {
		require_once('../class/oop_trds.php');
	
		$empNo = $_POST['empNo']; // Corrected POST key
		$examNo = $_POST['exam'];
	
		$array_fields = array('result_emp_no', 'result_exam_pkid', 'result_exam_take');
		$table = "tbl_exam_records";
		$sql_where = "WHERE result_emp_no = '$empNo' AND result_exam_take IN (1, 2, 3) AND result_exam_pkid = '$examNo'";
		$sql_order = '';
		$sql_limit = '';
	
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where, $sql_order, $sql_limit);
	
		$data = array();
	
		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'EmpNo' => $row['result_emp_no'],
				'result_exam_take' => $row['result_exam_take']
			);
		}
	
		echo json_encode($data); // Return JSON-encoded result
	}

	function get_emp() {
		require_once('../class/oop.php');
		require_once('../class/oop_subcon.php');
	
		$empNo = $_POST['textEmpNo']; // Corrected POST key
	
		$concat_name = "CONCAT_WS(' ', `FirstName`, IF(LENGTH(`MiddleName`) > 0, CONCAT(SUBSTRING(`MiddleName`, 1, 1), '.'), ''), `LastName`) AS FullName";
	
		$query = "
			SELECT DISTINCT 
				$concat_name,
				tbl_EmployeeInfo.EmpNo,
				tbl_Position.Position,
				tbl_EmployeeInfo.DateHired
			FROM db_hris.tbl_EmployeeInfo
			INNER JOIN db_hris.tbl_Position ON db_hris.tbl_EmployeeInfo.fkPosition = db_hris.tbl_Position.pkid
			WHERE db_hris.tbl_EmployeeInfo.EmpStatus = 1
			AND db_hris.tbl_EmployeeInfo.EmpNo = '$empNo'
	
			UNION ALL
	
			SELECT DISTINCT 
				$concat_name, 
				tbl_EmployeeInfo.EmpNo,
				tbl_Position.Position,
				tbl_EmployeeInfo.DateHired
			FROM db_subcon.tbl_EmployeeInfo
			INNER JOIN db_hris.tbl_Position ON db_subcon.tbl_EmployeeInfo.fkPosition = db_hris.tbl_Position.pkid
			WHERE db_subcon.tbl_EmployeeInfo.EmpStatus = 1
			AND db_subcon.tbl_EmployeeInfo.EmpNo = '$empNo'
		";
	
		$query_result = User_subcon::getInstance()->custom_query($query);
	
		$data = array();
	
		if (mysqli_num_rows($query_result) > 0) {
			$employee = mysqli_fetch_assoc($query_result);
			$data['EmpNo'] = $employee['EmpNo'];
			$data['FullName'] = $employee['FullName'];
			$data['Position'] = $employee['Position'];
			$data['DateHired'] = $employee['DateHired'];
		} else {
			$data['error'] = "No results found for EmpNo: $empNo";
		}
	
		echo json_encode($data); // Return the JSON-encoded data
	}

	function get_position(){
		require_once('../class/oop.php');
	
		$array_fields = array('Position');
		$table        = "tbl_Position";
		$joins        = '';
		$sql_where    = '';
		$sql_order    = 'GROUP BY Position';
		$sql_limit    = '';
		$query_result = User::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		while($row = mysqli_fetch_assoc($query_result)){
			$data[] = $row['Position'];
		}
	
		// Return JSON data
		echo json_encode($data);
	}	

	function display_remarks() {
		require_once('../class/oop_trds.php'); // Adjust path as needed
	
		$array_fields = array('exam_remarks');
		$table = "tbl_exams";
		$sql_where = 'WHERE logdel = 0 AND exam_status = 0 AND pkid= "' . $_POST['text_exam_pkid'] . '"';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where);
	
		$data = array();

		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'exam_remarks' => $row['exam_remarks']
			);
		}
	
		echo json_encode($data);
	}

	function display_questions() {
		require_once('../class/oop_trds.php'); // Adjust path as needed
	
		$array_fields = array('question_number', 'exam_pkid', 'question_type', 'question_image_path', 'question_desc', 'question', 'question_choices', 'question_answer', 'question_points');
		$table = "tbl_questions";
		$sql_where = 'WHERE logdel = 0 AND question_status = 0 AND exam_pkid= "' . $_POST['exam_pkid'] . '"';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where);
	
		$data = array();
		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'question_number' => $row['question_number'],
				'exam_pkid' => $row['exam_pkid'],
				'question_type' => $row['question_type'],
				'question_image_path' => $row['question_image_path'],
				'question_desc' => $row['question_desc'],
				'question' => $row['question'],
				'question_choices' => $row['question_choices'],
				'question_answer' => $row['question_answer'],
				'question_points' => $row['question_points']
			);
		}
	
		echo json_encode($data);
	}

	// 12202024
	function getRevNo() {
		require_once('../class/oop_trds.php'); // Adjust path as needed
	
		$return = $_POST;
		$array_fields = array('exam_revision_no');
		$table = "tbl_exams";
		$sql_where = 'WHERE pkid = "' . $_POST['examPKID'] . '"';
		$joins = '';
		$sql_order = '';
		$sql_limit = '';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	
		$data = array();
		if ($row = mysqli_fetch_assoc($query_result)) {
			$data = array(
				'rev_no' => $row['exam_revision_no']
			);
		}
	
		echo json_encode($data); // Return a single object
	}	

	function check_exam_answers() {
		require_once('../class/oop_trds.php'); // Adjust path as needed
		
		$return = $_POST;
		$array_fields = array('question_number', 'exam_pkid', 'question_type', 'question_image_path', 'question_desc', 'question', 'question_choices', 'question_answer', 'question_points');
		$table = "tbl_questions";
		$sql_where = 'WHERE logdel = 0 AND question_status = 0 AND exam_pkid = "' . $_POST['examPKID'] . '"';
		$joins = '';
		$sql_order = '';
		$sql_limit = '';
		$query_result = User_trds::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
	
		$data = array();
		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'question_number' => $row['question_number'],
				// 'exam_pkid' => $row['exam_pkid'],
				'question_type' => $row['question_type'],
				'question_image_path' => $row['question_image_path'],
				'question_desc' => $row['question_desc'],
				'question' => $row['question'],
				'question_choices' => $row['question_choices'],
				'question_answer' => $row['question_answer'],
				'question_points' => $row['question_points']
			);
		}
	
		echo json_encode($data);
	}

	// 11/28/2024 WORKING NA TIH!_COPY
	function submit_exam_result() {
		require_once('../class/oop_trds.php');
		
		$return = $_POST;
		$table = "tbl_exam_records";
	
		// Retrieve form data
		$result_exam_no = $return['result_exam_no'];
		$result_rev_no = $return['result_revNo'];
		$result_exam_purpose = $return['result_exam_purpose'];
		$result_exam_position = $return['result_exam_position'];
		$result_exam_passing_score = $return['result_exam_passing_score'];
		$result_qc_score = $return['result_score'];
		$result_qc_total = $return['result_total'];
		$result_empNo = $return['result_empNo'];
		$result_name = $return['result_name'];
		$result_date_hired = $return['result_date_hired'];
		$result_position = $return['result_position'];
		$result_exam_date = $return['result_exam_date'];
		$result_exam_take = $return['result_exam_take'];
		
		// Decode exam details JSON into an associative array
		$exam_details = json_decode($return['exam_details'], true);
	
		$all_inserts_successful = true;
	
		// Loop through each question detail and insert into the database
		foreach ($exam_details as $row) {
			if (!empty($row['question_number'])) {
				$array_fields = array(
					'result_exam_pkid',
					'result_rev_no',
					'result_exam_purpose',
					'result_exam_position',
					'result_exam_passing_score',
					'result_emp_no',
					'result_emp_name',
					'result_date_hired',
					'result_position',
					'result_exam_date',
					'result_exam_take',
					'result_q_num',
					'result_q_type',
					'result_q_image',
					'result_q_desc',
					'result_q_question',
					'result_q_choices',
					'result_q_points',
					'result_q_answer',
					'result_qc_answer',
					'result_qc_points',
					'result_qc_score',
					'result_qc_total'
				);
	
				$array_values = array(
					$result_exam_no,
					$result_rev_no,
					$result_exam_purpose,
					$result_exam_position,
					$result_exam_passing_score,
					$result_empNo,
					$result_name,
					$result_date_hired,
					$result_position,
					$result_exam_date,
					$result_exam_take,
					$row['question_number'],
					$row['question_type'],
					$row['question_image'],
					$row['question_desc'],
					$row['question'],
					$row['question_choices'],
					$row['question_points'],
					$row['correct_answer'],
					$row['user_answer'],
					$row['points_earned'],
					$result_qc_score,
					$result_qc_total
				);
	
				$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);
	
				if (!$query_result) {
					$all_inserts_successful = false;
					$status = "error";
					break;  // Exit the loop on the first failure
				} else {
					$all_inserts_successful = true;
					$status = "success";
				}
			}
		}

		if ($all_inserts_successful) {
			echo json_encode($status);
		} else {
			echo json_encode($status);
		}
	}

	// _______________________________________________________________ EXAM CHECKING HANDLER CODES ___________________________________________________________________________________

	function delete_examinee_record() {
		require_once('../class/oop_trds.php');
	
		$return = $_POST;
		$array_fields = array('result_exam_status', 'logdel');
		$array_values = array(1, 1);
		$table = "tbl_exam_records";
	
		$emp_no = $return['emp_no'];
		$exam_no = $return['exam_no'];
		$date_hired = $return['exam_date'];

		$query_result = User_trds::getInstance()->update_exam_record($table,$array_fields,$array_values,$emp_no,$exam_no,$date_hired);
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	// 12/09/2024 working na
	function delete_exam_record() {
		require_once('../class/oop_trds.php');

		$return = $_POST;

		// Set the values for logdel and result_exam_status to 1 (deleted)
		$array_fields = array('result_exam_status');
		$array_values = array(1);  // 1 for "deleted" and inactive status
		$table = "tbl_exam_records";

		// Perform the update operation
		$pkid = $return['pkid'];
		$query_result = User_trds::getInstance()->delete_exam_record($table, $array_fields, $array_values, $pkid);
		
		$return['result'] = $query_result ? true : false;
		echo json_encode($return);
	}

	function display_record() {
		require_once('../class/oop_trds.php'); // Adjust path as needed
	
		$array_fields = array('result_exam_purpose', 'result_exam_position');
		$table = "tbl_exam_records";
		$sql_where = 'WHERE logdel = 0 AND result_exam_status = 0 AND result_exam_pkid= "' . $_POST['text_exam_pkid'] . '"';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where);
	
		$data = array();

		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'exam_purpose' => $row['result_exam_purpose'],
				'exam_position' => $row['result_exam_position']
			);
		}
	
		echo json_encode($data);
	}

	// 12/09/2024
	function fetch_record() {
		require_once('../class/oop_trds.php');
		
		$array_fields = array('result_exam_pkid', 'result_exam_purpose', 'result_exam_position', 'result_exam_passing_score', 'result_emp_no', 'result_emp_name', 'result_date_hired', 'result_position', 'result_exam_date', 'result_exam_take', 'result_q_num', 'result_q_type', 'result_q_image', 'result_q_desc', 'result_q_question', 'result_q_choices', 'result_q_points', 'result_q_answer', 'result_qc_answer', 'result_qc_points', 'result_qc_score', 'result_qc_total');
		$table = "tbl_exam_records";
		$sql_where = 'WHERE logdel = 0 AND result_exam_pkid= "' . $_POST['exam_no'] . '" AND result_emp_no= "' . $_POST['emp_no'] . '" AND result_exam_date= "' . $_POST['exam_date'] . '" AND result_exam_take= "' . $_POST['exam_take'] . '"';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where);

		$data = array();

		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'exam_pkid' => $row['result_exam_pkid'],
				'exam_purpose' => $row['result_exam_purpose'],
				'exam_position' => $row['result_exam_position'],
				'exam_passing_score' => $row['result_exam_passing_score'],
				'emp_no' => $row['result_emp_no'],
				'emp_name' => $row['result_emp_name'],
				'date_hired' => $row['result_date_hired'],
				'position' => $row['result_position'],
				'exam_date' => $row['result_exam_date'],
				'exam_take' => $row['result_exam_take'],

				'q_num' => $row['result_q_num'],
				'q_type' => $row['result_q_type'],
				'q_image' => $row['result_q_image'],
				'q_desc' => $row['result_q_desc'],
				'q_question' => $row['result_q_question'],
				'q_choices' => $row['result_q_choices'],
				'q_points' => $row['result_q_points'],
				'q_answer' => $row['result_q_answer'],
				'qc_answer' => $row['result_qc_answer'],
				'qc_points' => $row['result_qc_points'],

				'qc_score' => $row['result_qc_score'],
				'qc_total' => $row['result_qc_total']
			);
		}

		echo json_encode($data);

	}

	// 12/13/2024
	function view_fetch_record() {
		require_once('../class/oop_trds.php');
		
		$array_fields = array('result_exam_pkid', 'result_exam_purpose', 'result_exam_position', 'result_exam_passing_score', 'result_emp_no', 'result_emp_name', 'result_date_hired', 'result_position', 'result_exam_date', 'result_exam_take', 'result_q_num', 'result_q_type', 'result_q_image', 'result_q_desc', 'result_q_question', 'result_q_choices', 'result_q_points', 'result_q_answer', 'result_qc_answer', 'result_qc_points', 'result_qc_score', 'result_qc_total');
		$table = "tbl_exam_records";
		$sql_where = 'WHERE logdel = 0 AND result_exam_pkid= "' . $_POST['exam_no'] . '" AND result_emp_no= "' . $_POST['emp_no'] . '" AND result_exam_date= "' . $_POST['exam_date'] . '" AND result_exam_take = "' . $_POST['exam_take'] . '" AND result_isChecked= "1"';
		$query_result = User_trds::getInstance()->select_query($array_fields, $table, '', $sql_where);

		$data = array();

		while ($row = mysqli_fetch_assoc($query_result)) {
			$data[] = array(
				'exam_pkid' => $row['result_exam_pkid'],
				'exam_purpose' => $row['result_exam_purpose'],
				'exam_position' => $row['result_exam_position'],
				'exam_passing_score' => $row['result_exam_passing_score'],
				'emp_no' => $row['result_emp_no'],
				'emp_name' => $row['result_emp_name'],
				'date_hired' => $row['result_date_hired'],
				'position' => $row['result_position'],
				'exam_date' => $row['result_exam_date'],
				'exam_take' => $row['result_exam_take'],

				'q_num' => $row['result_q_num'],
				'q_type' => $row['result_q_type'],
				'q_image' => $row['result_q_image'],
				'q_desc' => $row['result_q_desc'],
				'q_question' => $row['result_q_question'],
				'q_choices' => $row['result_q_choices'],
				'q_points' => $row['result_q_points'],
				'q_answer' => $row['result_q_answer'],
				'qc_answer' => $row['result_qc_answer'],
				'qc_points' => $row['result_qc_points'],

				'qc_score' => $row['result_qc_score'],
				'qc_total' => $row['result_qc_total']
			);
		}

		echo json_encode($data);

	}	

	function modify_exam_record() {
		require_once('../class/oop_trds.php');
		
		$return = $_POST;
		$table = "tbl_exam_records";
	
		// Retrieve form data
		$emp_no = $return['result_empNo'];
		$exam_no = $return['result_exam_no'];
		$date_hired = $return['result_exam_date'];
		$take_no = $return['result_exam_take'];

		// 1/6/2025
		$exam_name = $return['result_exam_name'];
		$passing_score = $return['result_passing_score'];
		$emp_name = $return['result_emp_name'];
		$emp_position = $return['result_emp_position'];
		$exam_total = $return['result_total'];

		$isChecked = 1;
	
		// Decode exam details JSON into an associative array
		$modified_examDetails = json_decode($return['modified_examDetails'], true);
		$m_total = $return['m_total'];
	
		$all_updates_successful = true;
	
		// Step 1: Update individual question scores
		foreach ($modified_examDetails as $row) {
			if (!empty($row['question_number'])) {
				$array_fields = array(
					'result_qc_points',
					'result_isChecked'
				);
	
				$array_values = array(
					$row['modified_score'],
					$isChecked
				);
	
				// Update the record for the specific question number
				$query_result = User_trds::getInstance()->update_examinee_record(
					$table, 
					$array_fields, 
					$array_values, 
					$emp_no, 
					$exam_no, 
					$date_hired,
					$row['question_number'],
					$take_no
				);
	
				if (!$query_result) {
					$all_updates_successful = false;
					$status = "error";
					break; // Exit the loop on the first failure
				}
			}
		}
	
		// Step 2: Update the total score (m_total)
		if ($all_updates_successful) {

			$array_fields = array('result_qc_score');
			$array_values = array($m_total);
	
			// Update the total score in the database
			$query_result = User_trds::getInstance()->update_exam_record(
				$table, 
				$array_fields, 
				$array_values, 
				$emp_no, 
				$exam_no, 
				$date_hired,
				$take_no
			);
	
			if (!$query_result) {
				$all_updates_successful = false;
				$status = "error";
			}
		}

		// 1/6/2025
		// Step 3: Add record to tbl_training_endorsement_exam
		if ($all_updates_successful) {
			$new_table = "tbl_training_endorsement_exam";
			
			$array_fields = array('exam_no', 'exam_name', 'passing_score', 'exam_date', 'exam_take', 'emp_no', 'emp_name', 'emp_position', 'score', 'total' );
			$array_values = array($exam_no, $exam_name, $passing_score, $date_hired, $take_no, $emp_no, $emp_name, $emp_position, $m_total, $exam_total);

			$query_result = User_trds::getInstance()->insert_result($new_table, $array_fields, $array_values);

			if (!$query_result) {
				$all_updates_successful = false;
				// $status = "error";
			}
		}
	
		echo json_encode($all_updates_successful ? "success" : "error");
	}	

// _______________________________________________________________ USER LIST ___________________________________________________________________________________

function get_user_module() {
	require_once('../class/oop_trds.php');
	$return = $_POST;
	$array_fields = array('*');
	$table        = "tbl_assignmodule";
	$joins        = '';
	$sql_where 	  = 'WHERE logdel = 0 AND user_id = "'.$return['user_id'].'"';
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	$data = array();
	while($row = mysqli_fetch_assoc($query_result)){
		$data[] = array('module_id' => $row['module_id']);
	}

	echo json_encode($data);
}

function get_user_pkid(){
	require_once('../class/oop_trds.php');
	$array_fields = array('DISTINCT user_id');
	$table        = "tbl_assignmodule";
	$joins        = 'INNER JOIN tbl_user ON tbl_assignmodule.user_id = tbl_user.pkid';
	$sql_where 	  = "WHERE username = '" . $_POST['rapid_username'] . "' AND tbl_assignmodule.logdel = 0";
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
	$data = array();
	while($row = mysqli_fetch_assoc($query_result)){
		$data[] = $row['user_id'];
	}

	echo json_encode($data);
}

function add_new_user() {
    require_once('../class/oop_trds.php');
	$return = $_POST;
	$table  = "tbl_user";
	$array_fields = array(
		'EmpNo',
		'username',
		'EmpName',
		'email'
	);

	$array_values = array(
	$return['add_empno'],
	$return['add_username'],
	$return['add_fullname'],
	$return['add_email']
	);

	$query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);

	$return["result"] = json_encode($query_result);
	echo json_encode($return);
}

function add_user_access() {
    require_once('../class/oop_trds.php');

    $return = $_POST;
    $table = "tbl_assignmodule";
    $user_id = $return['hidden_added_pkid'];
    $accessPoints = $return['accessPoints']; // This should be an array of selected checkboxes

    // Check if accessPoints is an array and user_id is not empty
    if (is_array($accessPoints) && !empty($user_id)) {
        foreach ($accessPoints as $module_id) {
            // Define fields and values for each module_id
            $array_fields = array('user_id', 'module_id');
            $array_values = array($user_id, $module_id);

            // Insert for each selected access point
            $query_result = User_trds::getInstance()->insert_query($table, $array_fields, $array_values);

            // Log or handle errors in query result if needed
            if (!$query_result) {
                error_log("Failed to insert module_id $module_id for user_id $user_id");
            }
        }
        $return["result"] = "Records added successfully.";
    } else {
        $return["result"] = "Error: No access points selected or user ID missing.";
    }

    echo json_encode($return);
}

function display_users_empno(){
	require_once('../class/oop_trds.php');

	$array_fields = array('*');
	$table        = "tbl_user";
	$joins        = '';
	$sql_where 	  = 'WHERE logdel = 0 AND pkid NOT IN (SELECT user_id FROM tbl_assignmodule)';
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	$data = array();
	while($row = mysqli_fetch_assoc($query_result)){
		$data[] = $row['EmpNo'];
	}

	echo json_encode($data);
}

function display_users_pkid(){
	require_once('../class/oop_trds.php');
	$return = $_POST;
	$array_fields = array('pkid');
	$table        = "tbl_user";
	$joins        = '';
	$sql_where 	  = 'WHERE EmpNo = "'.$return['user_empno'].'"';
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	$data = array();
	while($row = mysqli_fetch_assoc($query_result)){
		$data['pkid'] = $row['pkid'];
	}
	echo json_encode($data);

}

function update_user_access(){
	require_once('../class/oop_trds.php');
	$return = $_POST;
	$array_fields = array('*');
	$table        = "tbl_assignmodule";
	$joins        = '';
	$sql_where 	  = 'WHERE user_id = "'.$return['userID'].'" AND module_id = "'.$return['accessPoints[]'].'"';
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	$data = array();

	if(mysqli_num_rows($query_result) > 0){
	}
	

	echo json_encode($data);

}

function add_modify_user_access() {
    require_once('../class/oop_trds.php');

    $return = $_POST;
    $table = "tbl_assignmodule";
    $user_id = $return['hidden_add_pkid'];
    $accessPoints = $return['add_accessPoints']; // This should be an array of selected checkboxes
	$pkid = $user_id;

    // Check if accessPoints is an array and user_id is not empty
    if (is_array($accessPoints) && !empty($user_id)) {
        foreach ($accessPoints as $module_id) {
            // Define fields and values for checking existing records
            $array_fields = array('user_id', 'module_id');
            $table_check = "tbl_assignmodule"; // Table to check existing records
            $sql_where_check = 'WHERE user_id = "'.$user_id.'" AND module_id = "'.$module_id.'" AND logdel = 0';
            
            // Check for existing record
            $existing_record = User_trds::getInstance()->select_query($array_fields, $table_check, '', $sql_where_check);

            // If no existing record, proceed to insert
            if (mysqli_num_rows($existing_record) == 0) {
                // Define fields and values for the new record
                $array_fields_insert = array('user_id', 'module_id');
                $array_values_insert = array($user_id, $module_id);

                // Insert the new access point
                $query_result = User_trds::getInstance()->insert_query($table, $array_fields_insert, $array_values_insert);

                // Log or handle errors in query result if needed
                if (!$query_result) {
                    error_log("Failed to insert module_id $module_id for user_id $user_id");
                }
            } else {
                // Record already exists, you might want to log this or handle it as needed
                error_log("Access record already exists for user_id $user_id and module_id $module_id");
            }
        }
        $return["result"] = "Access points processed.";
    } else {
        $return["result"] = "Error: No access points selected or user ID missing.";
    }

    echo json_encode($return);
}

function remove_modify_user_access() {
    require_once('../class/oop_trds.php');

    $return = $_POST;
    $table = "tbl_assignmodule";
    $array_fields = array('logdel');
    $array_values = array(1);
    $pkid = $return['hidden_modify_added_pkid'];
    $modules = $return['removedModules']; // Use the array as it is

    // Call the update_user_access_query with the correct parameters
    $query_result = User_trds::getInstance()->update_user_access_query($table, $array_fields, $array_values, $pkid, $modules);
    
    // Set the result based on the query execution outcome
    $return['result'] = $query_result ? true : false;
    
    // Return the result as a JSON response
    echo json_encode($return);
}


function add_user_access_if_not_exists() {
    require_once('../class/oop_trds.php');

    $return = $_POST;
    $table = "tbl_assignmodule";
    $user_id = $return['hidden_added_pkid'];
    $accessPoints = $return['accessPoints']; // This should be an array of selected checkboxes
	$pkid = $user_id;

    // Check if accessPoints is an array and user_id is not empty
    if (is_array($accessPoints) && !empty($user_id)) {
        foreach ($accessPoints as $module_id) {
            // Define fields and values for checking existing records
            $array_fields = array('user_id', 'module_id');
            $table_check = "tbl_assignmodule"; // Table to check existing records
            $sql_where_check = 'WHERE user_id = "'.$user_id.'" AND module_id = "'.$module_id.'"  AND logdel = 0';
            
            // Check for existing record
            $existing_record = User_trds::getInstance()->select_query($array_fields, $table_check, '', $sql_where_check);

            // If no existing record, proceed to insert
            if (mysqli_num_rows($existing_record) == 0) {
                // Define fields and values for the new record
                $array_fields_insert = array('user_id', 'module_id');
                $array_values_insert = array($user_id, $module_id);

                // Insert the new access point
                $query_result = User_trds::getInstance()->insert_query($table, $array_fields_insert, $array_values_insert);

                // Log or handle errors in query result if needed
                if (!$query_result) {
                    error_log("Failed to insert module_id $module_id for user_id $user_id");
                }
            } else {
                // Record already exists, you might want to log this or handle it as needed
                error_log("Access record already exists for user_id $user_id and module_id $module_id");
            }
        }
        $return["result"] = "Access points processed.";
    } else {
        $return["result"] = "Error: No access points selected or user ID missing.";
    }

    echo json_encode($return);
}

function display_assign_module() {
	require_once('../class/oop_trds.php');
	$return = $_POST;
	$array_fields = array('tbl_module.module_name');
	$table        = "tbl_assignmodule";
	$joins        = '
	INNER JOIN tbl_module ON tbl_assignmodule.module_id = tbl_module.pkid
	';
	$sql_where = 'WHERE tbl_assignmodule.logdel = 0 AND tbl_assignmodule.user_id = "'.$return['userID'].'"';
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	$data = array();
	while($row = mysqli_fetch_assoc($query_result)) {
		$data[] = array(
			'module_name' => $row['module_name']
		);
	}

	echo json_encode($data);
}

function get_employee_user_list() {
    require_once('../class/oop.php');
    require_once('../class/oop_subcon.php');

    // Concatenate the full name without the middle name or middle initial
    $concat_name = "CONCAT_WS(' ', `FirstName`, `LastName`) AS FullName";  // Only concatenate FirstName and LastName
    $concat_pds = "CONCAT_WS(' / ', tbl_Position.`Position`, tbl_Department.`Department`, tbl_Section.`Section`) AS pds";

    // Get EmpNo from the POST request
    $empNo = $_POST['textEmpNo'];

    // Prepare the query to select from both db_hris and db_subcon
    $query = "
        SELECT DISTINCT 
            $concat_name, 
            tbl_EmployeeInfo.EmpNo,
            $concat_pds,
            tbl_EmployeeInfo.DateHired
        FROM db_hris.tbl_EmployeeInfo
        INNER JOIN db_hris.tbl_Position ON db_hris.tbl_EmployeeInfo.fkPosition = db_hris.tbl_Position.pkid
        INNER JOIN db_hris.tbl_Department ON db_hris.tbl_EmployeeInfo.fkDepartment = db_hris.tbl_Department.pkid
        INNER JOIN db_hris.tbl_Section ON db_hris.tbl_EmployeeInfo.fkSection = db_hris.tbl_Section.pkid
        WHERE db_hris.tbl_EmployeeInfo.EmpStatus = 1
        AND db_hris.tbl_EmployeeInfo.EmpNo = '$empNo'

        UNION ALL

        SELECT DISTINCT 
            $concat_name, 
            tbl_EmployeeInfo.EmpNo,
            $concat_pds,
            tbl_EmployeeInfo.DateHired
        FROM db_subcon.tbl_EmployeeInfo
        INNER JOIN db_hris.tbl_Position ON db_subcon.tbl_EmployeeInfo.fkPosition = db_hris.tbl_Position.pkid
        INNER JOIN db_hris.tbl_Department ON db_subcon.tbl_EmployeeInfo.fkDepartment = db_hris.tbl_Department.pkid
        INNER JOIN db_hris.tbl_Section ON db_subcon.tbl_EmployeeInfo.fkSection = db_hris.tbl_Section.pkid
        WHERE db_subcon.tbl_EmployeeInfo.EmpStatus = 1
        AND db_subcon.tbl_EmployeeInfo.EmpNo = '$empNo'
    ";

    // Execute the query using the custom_query function
    $query_result = User_subcon::getInstance()->custom_query($query);

    // Fetch data to display
    $data = array();
    if (mysqli_num_rows($query_result) > 0) {
        $employee = mysqli_fetch_assoc($query_result);
        $data['EmpNo'] = $employee['EmpNo'];
        $data['FullName'] = $employee['FullName'];
        $data['pds'] = $employee['pds'];
        $data['DateHired'] = $employee['DateHired'];
    } else {
        // No results found
        $data['error'] = "No results found for EmpNo: " . $empNo;
    }

    // Return the data as JSON
    echo json_encode($data);
}

function check_username(){
	require_once('../class/oop_rapid.php');

	$array_fields = array('username');
	$table        = "tbl_useraccounts";
	$joins        = '';
	$sql_where 	  = 'WHERE empno = "' . $_POST['empno'] . '" AND logdel = 0';
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	$data = array();
	if(mysqli_num_rows($query_result) > 0){
		$docno = mysqli_fetch_assoc($query_result);
		$data['username'] = $docno['username'];
	}
	echo json_encode($data);
}

// _______________________________________________________________ GLOBAL FUNCTIONS ___________________________________________________________________________________

function get_trds_user_info(){
	require_once('../class/oop_trds.php');

	$array_fields = array('*');
	$table        = "tbl_user";
	$joins        = '';
	$sql_where 	  = 'WHERE username = "' . $_POST['userUsername'] . '" AND logdel = 0';
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	$data = array();
	if(mysqli_num_rows($query_result) > 0){
		$docno = mysqli_fetch_assoc($query_result);
		$data['email'] = $docno['email'];
		$data['EmpName'] = $docno['EmpName'];

	}
	echo json_encode($data);
}

function get_trds_user_email() {
	require_once('../class/oop_trds.php');

	$array_fields = array('*');
	$table        = "tbl_user";
	$joins        = '';
	$sql_where 	  = 'WHERE EmpName = "'. $_POST['EmployeeName'] .'" AND logdel = 0';
	$sql_order    = '';
	$sql_limit    = '';
	$query_result = User_trds::getInstance()->select_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit);
	$data = array();
	while($row = mysqli_fetch_assoc($query_result)){
		$data['email'] = $row['email'];
	}

	echo json_encode($data);
}

// function send_for_approval() {
//     require_once('../class/oop.php');
//     require_once('../class/send_mail2.php');
    
//     $subject = 'New Training Request Submitted:';
//     session_start();
//     $username = $_SESSION['username'];
//     $to = $_POST['send_to'];
//     $from = $_POST['sent_from'];
    
//     $php_mailer = new SENDMAIL();
    
//     try {
//         // Specify the new mail body template
//         $result = $php_mailer->email_with_no_attachment($from, $to, $subject, '../class/tr_mail_body.php');
//         if ($result) {
//             echo "Email successfully sent to $to";
//         } else {
//             echo "Failed to send email to $to";
//         }
//     } catch (Exception $e) {
//         echo "Error sending email to $to: " . $e->getMessage();
//     }
// }

function send_for_approval() {
    require_once('../class/oop.php');
    require_once('../class/send_mail2.php');
    
    $subject = 'New Training Request Submitted:';
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'USER';
	$userFullName = $_POST['user_fullname'];
	$conno = $_POST['email_conno'];
    $to = $_POST['send_to'];
    $from = $_POST['sent_from'];

    // Construct the email body directly
    $message_body = "
        Good day!<br><br><br>
        This is to inform you that a new Training Request with CTRL#: $conno has been submitted to the TRD System by user: $userFullName. 
        We kindly request you to review and approve the details at your earliest convenience.<br><br>
        To access the training request, please log in to the TRD System and navigate to the relevant section. 
        Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency.<br><br>
        Thank you for your prompt attention to this matter.<br><br><br>
        Best regards,<br><br>
        The TRD System
    ";

    $php_mailer = new SENDMAIL();
    
    try {
        // Pass the constructed message body directly to the method
        $result = $php_mailer->email_with_no_attachment($from, $to, $subject, $message_body);
        if ($result === "Email sent!") {
            echo "Email successfully sent to $to";
        } else {
            echo "Failed to send email to $to: " . $result;
        }
    } catch (Exception $e) {
        echo "Error sending email to $to: " . $e->getMessage();
    }
}

function edit_send_for_approval() {
    require_once('../class/oop.php');
    require_once('../class/send_mail2.php');
    
    $subject = 'Training Request Updated:';
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'USER';
	$conno = $_POST['email_conno'];
    $to = $_POST['send_to'];
    $from = $_POST['sent_from'];

    // Construct the email body directly
    $message_body = "
        Good day!<br><br><br>
        The Training Request CTRL#: $conno that you set for revision has been updated. 
        Kindly check it again for your approval.<br><br>
        To access the training request, please log in to the TRD System and navigate to the relevant section. 
        Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency.<br><br>
        Thank you for your prompt attention to this matter.<br><br><br>
        Best regards,<br><br>
        The TRD System
    ";

	// $message_body = "
    //     Good day!<br><br><br>
    //     The Training Request CTRL#: $conno that you set for revision has been updated by user: $username. 
    //     Kindly check it again for your approval.<br><br>
    //     To access the training request, please log in to the TRD System and navigate to the relevant section. 
    //     Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency.<br><br>
    //     Thank you for your prompt attention to this matter.<br><br><br>
    //     Best regards,<br><br>
    //     The TRD System
    // ";

    $php_mailer = new SENDMAIL();
    
    try {
        // Pass the constructed message body directly to the method
        $result = $php_mailer->email_with_no_attachment($from, $to, $subject, $message_body);
        if ($result === "Email sent!") {
            echo "Email successfully sent to $to";
        } else {
            echo "Failed to send email to $to: " . $result;
        }
    } catch (Exception $e) {
        echo "Error sending email to $to: " . $e->getMessage();
    }
}



// function edit_send_for_approval() {
//     require_once('../class/oop.php');
//     require_once('../class/send_mail2.php');
    
//     $subject = 'Training Request Updated:';
//     session_start();
//     $username = $_SESSION['username'];
//     $to = $_POST['send_to'];
//     $from = $_POST['sent_from'];
    
//     $php_mailer = new SENDMAIL();
    
//     try {
//         // Specify the new mail body template
//         $result = $php_mailer->email_with_no_attachment($from, $to, $subject, '../class/tr_edit_mail_body.php');
//         if ($result) {
//             echo "Email successfully sent to $to";
//         } else {
//             echo "Failed to send email to $to";
//         }
//     } catch (Exception $e) {
//         echo "Error sending email to $to: " . $e->getMessage();
//     }
// }

// function send_multiple_emails() {
//     require_once('../class/oop.php');
//     require_once('../class/send_mail2.php');

//     $subject = $_POST['email_subject'];
//     session_start();
//     $username = $_SESSION['username'];
//     $to = $_POST['send_to'];
//     $from = $_POST['sent_from'];

//     $php_mailer = new SENDMAIL();

//     try {
//         // Use the default mail body template (mail_body.php)
//         $result = $php_mailer->email_with_no_attachment($from, $to, $subject, '../class/mail_body.php');
//         if ($result) {
//             echo "Email successfully sent to $to";
//         } else {
//             echo "Failed to send email to $to";
//         }
//     } catch (Exception $e) {
//         echo "Error sending email to $to: " . $e->getMessage();
//     }
// }

function send_multiple_emails() {
    require_once('../class/oop.php');
    require_once('../class/send_mail2.php');

	$subject = $_POST['email_subject'];
    session_start();
    $username = $_SESSION['username'];
	$userFullName = $_POST['user_fullname'];
	$docno = $_POST['email_docno'];
    $to = $_POST['send_to'];
    $from = $_POST['sent_from'];

    $message_body = "
        Good day!<br><br>
        This is to inform you that a new HR Memorandum with Doc#: $docno has been submitted to the TRD System by user: $userFullName. 
        We kindly request you to review the details at your earliest convenience.<br><br>
        To access the memorandum, please log in to the TRD System and navigate to the relevant section. 
        Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency.<br><br>
        Thank you for your prompt attention to this matter.<br><br>
        Best regards,<br><br>
        The TRD System
    ";

    $php_mailer = new SENDMAIL();

    try {
        // Use the constructed $message_body instead of an external file
        $result = $php_mailer->email_with_no_attachment($from, $to, $subject, $message_body);
        if ($result) {
            echo "Email successfully sent to $to";
        } else {
            echo "Failed to send email to $to";
        }
    } catch (Exception $e) {
        echo "Error sending email to $to: " . $e->getMessage();
    }
}

function edit_send_multiple_emails() {
    require_once('../class/oop.php');
    require_once('../class/send_mail2.php');

    $subject = $_POST['email_subject'];
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'USER';
	$docno = $_POST['email_docno'];
    $to = $_POST['send_to'];
    $from = $_POST['sent_from'];

    // Construct the email body directly
    $message_body = "
        Good day!<br><br><br>
        The HR Memorandum, with Doc#: $docno that you set for revision has been updated. 
        Kindly check it in the TRD System.<br><br>
        To access the memorandum, please log in to the TRD System and navigate to the relevant section. 
        Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency.<br><br>
        Thank you for your prompt attention to this matter.<br><br><br>
        Best regards,<br><br>
        The TRD System
    ";

	// $message_body = "
    //     Good day!<br><br><br>
    //     The HR Memorandum, with Doc#: $docno that you set for revision has been updated by user: $username. 
    //     Kindly check it in the TRD System.<br><br>
    //     To access the memorandum, please log in to the TRD System and navigate to the relevant section. 
    //     Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency.<br><br>
    //     Thank you for your prompt attention to this matter.<br><br><br>
    //     Best regards,<br><br>
    //     The TRD System
    // ";

    $php_mailer = new SENDMAIL();

    try {
        // Pass the constructed message body directly to the method
        $result = $php_mailer->email_with_no_attachment($from, $to, $subject, $message_body);
        if ($result === "Email sent!") {
            echo "Email successfully sent to $to";
        } else {
            echo "Failed to send email to $to: " . $result;
        }
    } catch (Exception $e) {
        echo "Error sending email to $to: " . $e->getMessage();
    }
}


// function edit_send_multiple_emails() {
//     require_once('../class/oop.php');
//     require_once('../class/send_mail2.php');

//     $subject = $_POST['email_subject'];
//     session_start();
//     $username = $_SESSION['username'];
//     $to = $_POST['send_to'];
//     $from = $_POST['sent_from'];

//     $php_mailer = new SENDMAIL();

//     try {
//         // Use the default mail body template (mail_body.php)
//         $result = $php_mailer->email_with_no_attachment($from, $to, $subject, '../class/edit_mail_body.php');
//         if ($result) {
//             echo "Email successfully sent to $to";
//         } else {
//             echo "Failed to send email to $to";
//         }
//     } catch (Exception $e) {
//         echo "Error sending email to $to: " . $e->getMessage();
//     }
// }


// function send_for_approval($pkid, $approval_order, $status) {
// function send_for_approval() {
	
// 	require_once('../class/oop.php');
// 	require_once('../class/send_mail2.php');
	
// 	// $return = $_POST;
// 	// $result = "";
// 	// $array_fields = array('created_by','(SELECT `category` FROM `tbl_category` WHERE pkid = tbl_document.`fk_category` ) as `category`', 'status', 'document_name', 'remarks', '(SELECT `approver_username` FROM `tbl_approver_ordinates` WHERE tbl_approver_ordinates.`fk_document`=tbl_document.pkid AND tbl_approver_ordinates.order_no=tbl_document.approval_order LIMIT 0,1) as approver_username');
// 	// $table 	   	= 'tbl_document';
// 	// $joins 	   	= '';
// 	// $sql_where 	= 'WHERE pkid="'.$pkid.'" AND approval_order="'.$approval_order.'" AND logdel=0';
// 	// $sql_order 	= '';
// 	// $sql_limit 	= '';
// 	// $result = OOP::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
// 	// if($row = mysqli_fetch_array($result)){
// 	// 	$document_name 		= $row['document_name'];
// 	// 	$category 			= $row['category'];
// 	// 	$approver_username 	= $row['approver_username'];
// 	// 	$created_by 		= $row['created_by'];
// 	// 	$remarks 			= $row['remarks'];
// 	// }
// 	// if($status == 'new') {
// 	// 	$subject 	 = 'FOR APPROVAL: '.$document_name;
// 	// } else {
// 	// 	$subject 	 = '(Revised) FOR APPROVAL: '.$document_name;
// 	// }
// 	$subject 	 = 'TEST EMAIL:';
// 	$body 	 	 = 'Please be informed that you have document for approval.<br> <br>';
// 	$body 		.= 'Report details: <br>';
// 	// $body 		.= '&emsp;Document Name: '.$document_name.' <br>';
// 	// $body 		.= '&emsp;Category: '.$category.' <br>';
// 	// $body 		.= '&emsp;Created By: '.get_emp_name_by_username_systemone($created_by).' <br><br>';
// 	// $body 		.= '&emsp;Approval Hierarchy: '.return_approval_hierarchy_email($pkid, $approval_order).' <br> <br>';
	
// 	session_start();
// 	$username = $_SESSION['username'];

// 	// echo 'sent ' . $username;
// 	// return;
// 	// $to 		 = return_user_email_add($username);
// 	// $from 		 = return_user_email_add($username);
// 	$to 		 = 'bariringpaulgabrielle17@gmail.com';
// 	$from 		 = 'jdomingo@pricon.ph';
// 	// $cc 		 = add_view_access_email($pkid, $created_by);
	
// 	$php_mailer = new SENDMAIL();
// 	// $php_mailer->send_email($to, $from, $cc, $subject, $body,'','');
// 	$php_mailer->email_with_no_attachment($from, $to, $subject);
// }


	
?>