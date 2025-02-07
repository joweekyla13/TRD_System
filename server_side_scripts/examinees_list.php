<?php
    session_start();
    $_SESSION['question_pkid'];
	/*
	 * Script:    DataTables server-side script for PHP and MySQL
	 * Copyright: 2010 - Allan Jardine
	 * License:   GPL v2 or BSD (3-point)
	 */
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	 // error_reporting(E_ALL);
	 // ini_set('display_errors', 1);

	$aColumns = array('pkid', 'result_exam_pkid', 'result_exam_title', 'result_exam_purpose','result_exam_position','result_exam_passing_score','result_emp_no','result_emp_name','result_date_hired','result_position','result_exam_date','result_exam_take','result_q_num','result_q_type','result_q_image','result_q_desc','result_q_question','result_q_choices','result_q_points','result_q_answer','result_qc_answer','result_qc_points','result_qc_score','result_qc_total','result_exam_status','result_isChecked');
	
	/* used this field for searching data typed in the search box */
	// $array_search = array('empno', 'LastName',
							// 'date', 'date_out');
	// $array_search = array('empno', 'LastName');
							
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "pkid";
	
	/* DB table to use */
	$sTable = "tbl_exam_records";
	
	$database_config = '../db_config/db_trds.php';
	
	if(!file_exists($database_config)){
		echo "config file does not exist!";
		exit;
	} else {
		require_once($database_config);
	}
	
	/* Database connection information */
	$gaSql['user']       = $username;
	$gaSql['password']   = $password;
	$gaSql['db']         = $db_name;
	$gaSql['server']     = $server;
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
	}
		
	/*
	 * Ordering
	 */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */

	 //  12/05/2024
	$status = isset($_GET['status']) ? $_GET['status'] : '';
	 
	 /* wag gagalawin yung sWhere default to para sa searchbox ng datatables check mo sa baba kung pano gagawin mo :) */
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			// if( in_array($aColumns[$i],$array_search) ){
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
			// }
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}
	
	/* 
		dito ka mag add ng where mo, una check mo kung may laman na yung $sWhere pag wala append mo yung where mo na meron
		kasama where kapag naman may laman na AND na syempre diba :)
	*/
	
	// if($sWhere == ""){
	// 	$sWhere .= "WHERE  ";
	// }else{
	// 	$sWhere .= "AND ";
	// }
	// $sWhere .= " result_exam_status=0 AND result_exam_pkid = '".$_SESSION['question_pkid']."' ";

	
	// if($sOrder == ""){
	// 	$sOrder = 'ORDER BY pkid ASC';
	// }

	// 12/05/2024
	if ($status != '') {
		$statusFilter = implode(",", array_map('intval', explode(',', $status))); // Sanitize and create a comma-separated list
		if ($sWhere == "") {
			$sWhere .= "WHERE result_isChecked IN ($statusFilter) AND result_exam_pkid = '".$_SESSION['question_pkid']."' AND logdel = 0";
		} else {
			$sWhere .= " AND result_isChecked IN ($statusFilter) AND logdel = 0";
		}
	}

	$sOrder = $sOrder ?: 'ORDER BY pkid ASC';
    
	/*
	 * SQL queries
	 * Get data to display
	 */

	$sQuery = "
		SELECT DISTINCT result_emp_no , ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM $sTable
		$sWhere
        GROUP BY result_emp_no, result_exam_take
		$sOrder
		$sLimit
	";
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	
	// echo "limit: ".$sLimit." : ".$sQuery."<hr>";
	$query_used = $sQuery;
	// echo $query_used."<br>";
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);

	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$row = array();
		unset($row);

		if($aRow['result_isChecked'] == 0) {
			$row[]  = '<center>
            <button type="button" 
                   
                   class="btn btn-info fa-solid fa-pen-to-square btn_examinee_record_view"
				   style="color:white"
                   id="btn_view" 
                   value="'.$aRow['result_emp_no'].'" 

				   data-isChecked="'.$aRow['result_isChecked'].'"
				   data-exam_pkid="'.$aRow['result_exam_pkid'].'"
				   data-exam_name="'.$aRow['result_exam_title'].'"
				   data-exam_purpose="'.$aRow['result_exam_purpose'].'"
				   data-exam_position="'.$aRow['result_exam_position'].'"
				   data-passing_score="'.$aRow['result_exam_passing_score'].'"
				   data-emp_no="'.$aRow['result_emp_no'].'"
                   data-emp_name="'.$aRow['result_emp_name'].'"
				   data-date_hired="'.$aRow['result_date_hired'].'"
				   data-position="'.$aRow['result_position'].'"
                   data-exam_date="'.$aRow['result_exam_date'].'"
                   data-exam_take="'.$aRow['result_exam_take'].'"

				   data-q_num="'.$aRow['result_q_num'].'" 
                   data-q_type="'.$aRow['result_q_type'].'"
                   data-q_image="'.$aRow['result_q_image'].'"
                   data-q_desc="'.$aRow['result_q_desc'].'"
                   data-q_question="'.$aRow['result_q_question'].'"
                   data-q_choices="'.$aRow['result_q_choices'].'"
                   data-q_points="'.$aRow['result_q_points'].'"
                   data-q_answer="'.$aRow['result_q_answer'].'"
				   
                   data-qc_answer="'.$aRow['result_qc_answer'].'"
                   data-qc_points="'.$aRow['result_qc_points'].'"
                   data-qc_score="'.$aRow['result_qc_score'].'"
                   data-qc_total="'.$aRow['result_qc_total'].'"
			></button>

           <button type="button" 
                class="btn btn-danger fa-solid fa-trash btn_examinee_delete" 
                style="color:white"
                id="btn_delete" 
                data-emp_no="'.$aRow['result_emp_no'].'"
                data-exam_no="'.$aRow['result_exam_pkid'].'"
                data-exam_date="'.$aRow['result_exam_date'].'"
           ></button>';

		   
		//    data-exam_name="'.$aRow['result_exam_purpose'].' for '.$aRow['result_exam_position'].' Examination" 

		} elseif($aRow['result_isChecked'] == 1) {
			$row[]  = '<center>
            <button type="button" 
                   
                   class="btn btn-info fa-solid fa-eye btn_examinee_record_views"
				   style="color:white"
                   id="btn_view" 
                   value="'.$aRow['result_emp_no'].'" 

				   data-result_isChecked="'.$aRow['result_isChecked'].'"
				   data-exam_pkid="'.$aRow['result_exam_pkid'].'"
				   data-exam_name="'.$aRow['result_exam_title'].'"
				   data-exam_purpose="'.$aRow['result_exam_purpose'].'"
				   data-exam_position="'.$aRow['result_exam_position'].'"
				   data-passing_score="'.$aRow['result_exam_passing_score'].'"
				   data-emp_no="'.$aRow['result_emp_no'].'"
                   data-emp_name="'.$aRow['result_emp_name'].'"
				   data-date_hired="'.$aRow['result_date_hired'].'"
				   data-position="'.$aRow['result_position'].'"
                   data-exam_date="'.$aRow['result_exam_date'].'"
                   data-exam_take="'.$aRow['result_exam_take'].'"

				   data-q_num="'.$aRow['result_q_num'].'" 
                   data-q_type="'.$aRow['result_q_type'].'"
                   data-q_image="'.$aRow['result_q_image'].'"
                   data-q_desc="'.$aRow['result_q_desc'].'"
                   data-q_question="'.$aRow['result_q_question'].'"
                   data-q_choices="'.$aRow['result_q_choices'].'"
                   data-q_points="'.$aRow['result_q_points'].'"
                   data-q_answer="'.$aRow['result_q_answer'].'"
				   
                   data-qc_answer="'.$aRow['result_qc_answer'].'"
                   data-qc_points="'.$aRow['result_qc_points'].'"
                   data-qc_score="'.$aRow['result_qc_score'].'"
                   data-qc_total="'.$aRow['result_qc_total'].'"
			></button>

           <button type="button" 
                class="btn btn-danger fa-solid fa-trash btn_examinee_delete" 
                style="color:white"
                id="btn_delete" 
                data-emp_no="'.$aRow['result_emp_no'].'"
                data-exam_no="'.$aRow['result_exam_pkid'].'"
                data-exam_date="'.$aRow['result_exam_date'].'"
           ></button>';
		}

		// $row[] = $aRow['result_exam_take'];

		// 1/22/2025
		if ($aRow['result_exam_take'] == 1) {
			$row[] = '1st Take';
		} else if ($aRow['result_exam_take'] == 2) {
			$row[] = '2nd Take';
		} else {
			$row[] = '3rd Take';
		}

		$row[] = $aRow['result_exam_date'];
        $row[] = $aRow['result_emp_no'];
		$row[] = $aRow['result_emp_name'];
		$row[] = $aRow['result_qc_score'];
        $row[] = $aRow['result_qc_total'];

		if ($aRow['result_qc_total'] > 0) {
			$percentage = ($aRow['result_qc_score'] / $aRow['result_qc_total']) * 100;
			$percentage = round($percentage) . '%';
			$row[] = $percentage;
		} else {
			$row[] = '0%';
		}

		$row[] = $aRow['result_exam_passing_score'];

		if ($aRow['result_exam_take'] == 1) {
			if ($percentage == 100) {
				$row[] = '<center><span class="badge bg-success text-light"><span>PASSED</span></span></center>';
			} else if ($percentage >= 70 && $percentage <= 99) {
				$row[] = '<center><span class="badge bg-warning text-light"><span>CONDITIONAL</span></span></center>';
			} else {
				$row[] = '<center><span class="badge bg-danger text-light"><span>FAILED / DISQUALIFIED</span></span></center>';
			}
		} else if ($aRow['result_exam_take'] == 2) {
			if ($percentage == 100) {
				$row[] = '<center><span class="badge bg-success text-light"><span>PASSED</span></span></center>';
			} else if ($percentage >= 90 && $percentage <= 99) {
				$row[] = '<center><span class="badge bg-warning text-light"><span>CONDITIONAL</span></span></center>';
			} else {
				$row[] = '<center><span class="badge bg-danger text-light"><span>FAILED / DISQUALIFIED</span></span></center>';
			}
		} else if ($aRow['result_exam_take'] == 3) {
			if ($percentage == 100) {
				$row[] = '<center><span class="badge bg-success text-light"><span>PASSED</span></span></center>';
			} else {
				$row[] = '<center><span class="badge bg-danger text-light"><span>FAILED / DISQUALIFIED</span></span></center>';
			}
		}

		// $row[] = $aRow['result_exam_passing_score'];

		// if ($aRow['result_qc_score'] >= $aRow['result_exam_passing_score']) {
		// 	$row[] = '<center><span class="badge bg-success text-light"><span>PASSED</span></span></center>';
		// } else {
		// 	$row[] = '<center><span class="badge bg-danger text-light"><span>FAILED / DISQUALIFIED</span></span></center>';
		// }

		array_push($output['aaData'],$row);
	}
	
	echo json_encode( $output );

?>