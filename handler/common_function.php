<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	
	
	/* ***************************
			Common Functions
	*****************************/
	
	function get_fields_values($passed_param,$excluded_value){
		 $array_fields = array();
		 $array_values = array();
		 foreach($passed_param as $key => $value){
			if(in_array($key,$excluded_value)){
				continue;
			}
			$array_fields[] = $key;
			if(is_array($value)){
				$array_values[] = implode(',',$value);
			}else{
				$array_values[] = $value;
			}
		}
		$return = array();
		$return['array_fields'] = $array_fields;
		$return['array_values'] = $array_values;
		return $return;
	}
	
	function get_emp_info_by_username($username) {
		require_once('../class/oop.php');
		$array_fields 	= array('*');
		// $table			= 'vw_EmpInfo_Rapid';
		// $table			= 'vw_emp_hris'; //OLD
		$table			= 'tbl_useraccounts'; //Chan 09-26-2022
		$joins			= '';
		$sql_where		= 'WHERE username="'.$username.'" AND logdel = 0';
		$sql_order		= '';
		$sql_limit		= 'LIMIT 0,1';
		$html_select	= '';
		// $result			= SYS1::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit); //OLD
		$result			= RapidUser::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit); //Chan 09-26-2022

		if($result->num_rows == 0) {
			return array();
		} else {
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
	}
	function return_user_email_add($username) {
		echo 'username '.$username;
		return;
		require_once('../class/oop.php'); //OOP Path
		$return = $_POST;
		$result = "";
		$array_fields = array('email_add');
		$table 	   	= 'db_acl.tbl_useraccnt';
		$joins 	   	= '';
		$sql_where 	= 'WHERE username="'.$username.'"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result = SYS1::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)) {
			$email_add = $row['email_add'];		
		} else {
			$email_add = '';
		}
		return $email_add;
	}
	
	function get_emp_name_by_username_systemone($username) { //Get name in Rapid
		require_once('../class/oop.php');
		$emp_name		= 'Not found !!!';
		// $array_fields 	= array('CONCAT(`firstName`," ",`lastname`) as emp_name'); //OLD
		$array_fields 	= array('`name` as emp_name'); //Chan 09-26-2022
		// $table			= 'vw_EmpInfo_Rapid';
		// $table			= 'vw_emp_hris'; //OLD
		$table			= 'tbl_useraccounts'; //Chan 09-26-2022
		$joins			= '';
		$sql_where		= 'WHERE username="'.$username.'" AND logdel = 0';
		$sql_order		= '';
		$sql_limit		= 'LIMIT 0,1';
		$html_select	= '';

		// $result			= SYS1::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit); //OLD
		$result			= RapidUser::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit); //Chan 09-26-2022

		if($row = mysqli_fetch_array($result)) {
			$emp_name = $row['emp_name'];
		}
		return $emp_name;
	}
	
	function get_email_add_by_username_systemone($username) {
		require_once('../class/oop.php');
		$email_add		= '';
		$array_fields 	= array('email_add');
		$table			= 'vw_EmpInfo_Rapid';
		$joins			= '';
		$sql_where		= 'WHERE username="'.$username.'"';
		$sql_order		= '';
		$sql_limit		= 'LIMIT 0,1';
		$html_select	= '';
		$result			= SYS1::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($row = mysqli_fetch_array($result)) {
			$email_add = $row['email_add'];
		}
		return $email_add;
	}
	
	
	
	/* ***************************
			Common Functions
	*****************************/
	
	/* ***************************
			Mailing Functions
	*****************************/
	function send_with_mailer($mail_data){
		require_once('../class/oop_mailer.php');
		$result = "";
		/* 
			Instructions for data values
			Array should contain the following data:
			1. to			= separator is comma
			2. cc			= separator is comma
			3. bcc			= separator is comma
			4. from			
			5. from_name
			6. subject
			7. message
			8. system_name
			9. send_date_time
		*/
		$table				 = 'tbl_mailer';
		$array_fields_values = get_fields_values($mail_data,array('username'));
		$array_fields		 = $array_fields_values['array_fields']; 
		$array_values		 = $array_fields_values['array_values']; 
		$array_fields[]		 = 'date_created'; $array_values[] = date('Y-m-d H:i:s');
		$array_fields[]		 = 'created_by'; $array_values[] = $mail_data['username'];
		$result = MAILER::getInstance()->insert_query($table,$array_fields,$array_values);
		$script = MAILER::getInstance()->insert_query_script($table,$array_fields,$array_values);
		return $result;
	}
	
	function send_with_mailer_with_attachment($mail_data){
		require_once('../class/oop_mailer.php');
		$result = "";
		/* 
			Instructions for data values
			Array should contain the following data:
			1. to			= separator is comma
			2. cc			= separator is comma
			3. bcc			= separator is comma
			4. from			
			5. from_name
			6. subject
			7. message
			8. attachment
			9. system_name
			10. send_date_time
		*/
		$table				 = 'tbl_mailer';
		$array_fields_values = get_fields_values($mail_data,array('username'));
		$array_fields		 = $array_fields_values['array_fields']; 
		$array_values		 = $array_fields_values['array_values']; 
		$array_fields[]		 = 'date_created'; $array_values[] = date('Y-m-d H:i:s');
		$array_fields[]		 = 'created_by'; $array_values[] = $mail_data['username'];
		$result = MAILER::getInstance()->insert_query($table,$array_fields,$array_values);
		$script = MAILER::getInstance()->insert_query_script($table,$array_fields,$array_values);
		return $result;
	}
	
	/* Scheduled e-mail */
	function send_with_auto_mailer($mail_data){
		require_once('../class/oop_mailer.php');
		$result = "";
		/* 
			Instructions for data values
			Array should contain the following data:
			1. to			= separator is comma
			2. cc			= separator is comma
			3. bcc			= separator is comma
			4. from			
			5. from_name
			6. subject
			7. message
			8. system_name
			9. send_date_time
		*/
		$table				 = 'tbl_auto_mailer';
		$array_fields_values = get_fields_values($mail_data,array('username'));
		$array_fields		 = $array_fields_values['array_fields']; 
		$array_values		 = $array_fields_values['array_values']; 
		$array_fields[]		 = 'date_created'; $array_values[] = date('Y-m-d H:i:s');
		$result = MAILER::getInstance()->insert_query($table,$array_fields,$array_values);
		$script = MAILER::getInstance()->insert_query_script($table,$array_fields,$array_values);
		return $script;
	}
	
	
	function close_auto_mailer($tbl_name,$fkid){
		require_once('../class/oop_mailer.php');
		$table		  = 'tbl_auto_mailer';
		$array_fields = array('logdel');
		$array_values = array('1');
		$where		  = "WHERE `fkid` = '".$fkid."' AND `table_name` = '".$tbl_name."'";
		$result = MAILER::getInstance()->update_query_detailed($table,$array_fields,$array_values,$where);
		$script = MAILER::getInstance()->update_query_detailed_script($table,$array_fields,$array_values,$where);
		// return $script;
		return $result;
	}
	/* ***************************
			Mailing Functions
	*****************************/	
	
	?>
	
	