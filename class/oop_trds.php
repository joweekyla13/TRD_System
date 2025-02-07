<?php

// Set Class name here, it's a good practice to Capitalize the first letter
class User_trds extends mysqli {
	private static $instance = null;
	
	public static function getInstance() {
		if(!self::$instance instanceof self) 
		{
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function __clone()
	{
		trigger_error('Clone is not allowed.',E_USER_ERROR);
	}
	
	public function __wakeup()
	{
		trigger_error('Deserializing is not allowed.',E_USER_ERROR);
	}
	
	private function __construct() {
		$path 		= '../';
		$db_config  = 'db_config/db_trds.php';
		if(file_exists($path.$db_config)){
			include($path.$db_config);
		}else{
			$path = '../../';
			if(file_exists($path.$db_config)){
				include($path.$db_config);
			}else{
				$path = '../../../';
				if(file_exists($path.$db_config)){
					include($path.$db_config);
				}else{
					exit;
				}
				
			}
		}
		parent::__construct($server, $username, $password, $db_name);
		
		if(mysqli_connect_error())
		{
			exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
		}
		parent::set_charset('utf-8');
	}

	// 12182024 - JOWEE
	public function get_last_insert_id() {
		$query = "SELECT LAST_INSERT_ID() AS last_id;";
		$result = $this->query($query);
		$row = mysqli_fetch_assoc($result);
		return $row['last_id'];
	}	

	public function select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
		$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		// echo $query;
		return $this->query($query);
	}

	// 1/27/2025 - JOWEE
	public function select_exam_query($array_fields, $table, $joins, $sql_where, $sql_order, $sql_limit, $category) {
		// Ensure the SQL WHERE clause is properly concatenated
		$sql_where .= " AND exam_category = " . intval($category);
	
		// Construct the query
		$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		
		// Execute the query and return the result
		return $this->query($query);
	}	

	public function check_records_in_attendance($trainee_conno) {
		$query = 'SELECT 1 FROM tbl_attendance WHERE fkconno = "' . $trainee_conno . '" LIMIT 1';	
		$result = $this->query($query);	
		return mysqli_num_rows($result) > 0;
	}

	public function row_count($array_fields, $as_column, $table, $sql_where){
		$query = "SELECT COUNT( DISTINCT {$array_fields} ) AS {$as_column} FROM {$table} {$sql_where};";
		return $this->query($query);
	}
		
	public function insert_query($table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values);
		$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
		$this->query($query);
		return "New record has been saved";
	}

	// 1/17/2025
	public function insert_endo_image($image_table, $image_insert_fields, $image_insert_values){
		$new_values = $this->add_quotations($image_insert_values);
		$query 		= "INSERT INTO {$image_table} (". implode(", ", $image_insert_fields).") VALUES (". implode(",", $new_values) .");";
		$this->query($query);
		return "New record has been saved";
	}

	// 1/6/2025
	public function insert_result($new_table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values);
		$query 		= "INSERT INTO {$new_table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
		$this->query($query);
		return "New record has been saved";
	}

	public function update_record($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET " . implode(",", $update_array) . "WHERE pkid='{$pkid}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function update_query($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET " . implode(",", $update_array) . "WHERE docno='{$pkid}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function update_user_access_query($table, $array_fields, $array_values, $pkid, $modules) {
		$update_array = $this->create_update_param($array_fields, $array_values);
		foreach ($modules as $module) {
			$query = "UPDATE {$table} SET " . implode(",", $update_array) . " WHERE user_id='{$pkid}' AND module_id='{$module}';";
			$this->query($query);
		}
		return "Record(s) have been updated";
	}

	public function memo_remove_edit_emp_query($table, $array_fields, $array_values, $pkid, $empno) {
		$update_array = $this->create_update_param($array_fields, $array_values);
		$query = "UPDATE {$table} SET " . implode(",", $update_array) . " WHERE docno='{$pkid}' AND empno='{$empno}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function tr_remove_edit_emp_query($table, $array_fields, $array_values, $pkid, $empno) {
		$update_array = $this->create_update_param($array_fields, $array_values);
		$query = "UPDATE {$table} SET " . implode(",", $update_array) . " WHERE conno='{$pkid}' AND fkEmpNo='{$empno}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function update_questionnaire_query($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET " . implode(",", $update_array) . "WHERE pkid='{$pkid}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function update_question_query($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET " . implode(",", $update_array) . "WHERE exam_pkid='{$pkid}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function update_exam_query($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET " . implode(",", $update_array) . "WHERE result_exam_pkid='{$pkid}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function update_exam_record($table, $array_fields, $array_values, $emp_no, $exam_no, $date_hired, $take_no) {
		$update_array = $this->create_update_param($array_fields, $array_values);
		$query = "UPDATE {$table} SET " . implode(",", $update_array) . " WHERE result_emp_no='{$emp_no}' AND result_exam_pkid='{$exam_no}' AND result_exam_date='{$date_hired}' AND result_exam_take='{$take_no}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function update_examinee_record($table, $array_fields, $array_values, $emp_no, $exam_no, $date_hired, $question_number, $take_no) {
		$update_array = $this->create_update_param($array_fields, $array_values);
		$query = "UPDATE {$table} SET " . implode(",", $update_array) . " WHERE result_emp_no='{$emp_no}' AND result_exam_pkid='{$exam_no}' AND result_exam_date='{$date_hired}' AND result_q_num='{$question_number}' AND result_exam_take='{$take_no}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function deleteTR_query($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET " . implode(",", $update_array) . "WHERE conno='{$pkid}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function update_trainee_query($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET " . implode(",", $update_array) . "WHERE fkEmpNo='{$pkid}';";
		$this->query($query);
		return "Record has been updated";
	}

	public function delete_query($table,$pkid){
		$query = "DELETE FROM {$table} WHERE `pkid` = '{$pkid}';";
		$this->query($query);
		return "Record has been deleted";
	}

	public function delete_exam_record($table,$array_fields,$array_values,$pkid){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET " . implode(",", $update_array) . "WHERE result_exam_pkid='{$pkid}';";
		$this->query($query);
		return "Record has been updated";
	}
	
	public function add_quotations($array_values){
		$array_values_r = array();
		for($i=0;$i<count($array_values);$i++){
			$array_values_r[$i] = "'".$this->real_escape_string($array_values[$i])."'";
		}
		return $array_values_r;
	}

	public function create_update_param($array_fields,$array_values){
		$array_update = array();
		for($i=0;$i<count($array_fields);$i++){
			$array_update[$i] = "`".$array_fields[$i]."` = "."'".$array_values[$i]."' ";
		}
		return $array_update;
	}

	public function get_user_empname($username) {
		$select_query = $this->query("SELECT `EmpName` FROM `tbl_user` WHERE `username` = '$username';");
		return $select_query;
	}

}
?>
