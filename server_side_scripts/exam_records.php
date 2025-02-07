<?php
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

	$aColumns = array('pkid', 'result_exam_pkid', 'result_rev_no', 'result_exam_title', 'result_exam_category', 'result_exam_purpose', 'result_exam_department', 'result_exam_position', 'result_exam_productLine', 'result_exam_passing_score', 'result_emp_no', 'result_emp_name', 'result_date_hired', 'result_position', 'result_exam_date', 'result_exam_take', 'result_q_num', 'result_q_type', 'result_q_image', 'result_q_desc', 'result_q_question', 'result_q_choices', 'result_q_points', 'result_q_answer', 'result_qc_answer', 'result_qc_points', 'result_qc_score', 'result_qc_total', 'result_exam_status', 'logdel');
	
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

	// 1/27/2025
	$status = isset($_GET['status']) ? $_GET['status'] : '';
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	 
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
	// $sWhere .= "logdel=0";
	
	// if($sOrder == ""){
	// 	$sOrder = 'GROUP BY result_exam_pkid, result_exam_purpose, result_exam_position, result_exam_title ORDER BY result_exam_status ASC';
	// }

	// 1/27/2025
	if ($status != '') {
		$statusFilter = implode(",", array_map('intval', explode(',', $status))); // Sanitize and create a comma-separated list
		if ($sWhere == "") {
			$sWhere .= "WHERE result_exam_category IN ($statusFilter) AND logdel = 0";
		} else {
			$sWhere .= " AND result_exam_category IN ($statusFilter) AND logdel = 0";
		}
	}

	$sOrder = $sOrder ?: 'GROUP BY result_exam_pkid, result_exam_purpose, result_exam_position, result_exam_title ORDER BY result_exam_status ASC';
    
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT result_exam_title, result_exam_purpose, result_exam_position, " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM $sTable
		$sWhere
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

		$row[] = '<center>
            <a href="index.php?page=examinees_list.php&pkid=' . $aRow['result_exam_pkid'] . '" 
               class="btn btn-warning fa-solid fa-list-ul btn_exam_list" 
               title="Show List of Examinees"
               style="color:white"
               id=""> 
            </a>
        </center>';

		
		// <button type="button" 
		// 	class="btn btn-danger fa-solid fa-trash btn_exam_record_delete"
		// 	title="Delete Exam record"
		// 	style="color:white"
		// 	id="btn_delete" 
		// 	data-pkid="' . $aRow['result_exam_pkid'] . '">
		// </button>

		// $row[] = $aRow['result_rev_no'];

		if ($aRow['result_rev_no'] !== "Rev.No.0.00") {
			$row[] = '<div style="text-align: center;">' . $aRow['result_rev_no'] . '</div>';
		} else {
			$row[] = '<div style="text-align: center;">No Revisions</div>';
		}

		$row[] = $aRow['result_exam_title'];
		$row[] = $aRow['result_exam_purpose'];
		$row[] = $aRow['result_exam_department'];
		$row[] = $aRow['result_exam_position'];
		$row[] = $aRow['result_exam_productLine'];
        $row[] = $aRow['result_exam_passing_score'];

        if ($aRow['result_exam_status'] == 0) {
            $row[] = '<center><span class="badge bg-success text-light"><span>Active</span></span></center>';
        } elseif ($aRow['result_exam_status'] == 1) {
            $row[] = '<center><span class="badge bg-secondary text-light"><span>Inactive</span></span></center>';
        }

		array_push($output['aaData'],$row);
	}
	
	echo json_encode( $output );

?>