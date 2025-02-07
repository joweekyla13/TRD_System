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

	$aColumns = array('pkid','date_time_created', 'exam_category', 'exam_type','exam_title','exam_revision_no','exam_purpose','exam_department','exam_position','exam_productLine','exam_remarks','exam_passing_score','exam_status');
	
	/* used this field for searching data typed in the search box */
	// $array_search = array('empno', 'LastName',
							// 'date', 'date_out');
	// $array_search = array('empno', 'LastName');
							
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "pkid";
	
	/* DB table to use */
	$sTable = "tbl_exams";
	
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

	// 1/22/2025
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
	// $sWhere .= " exam_status=0";
	
	// if($sOrder == ""){
	// 	$sOrder = 'ORDER BY exam_title ASC';
	// }

	// 1/22/2025
	if ($status != '') {
		$statusFilter = implode(",", array_map('intval', explode(',', $status))); // Sanitize and create a comma-separated list
		if ($sWhere == "") {
			$sWhere .= "WHERE exam_category IN ($statusFilter) AND exam_status = 0";
		} else {
			$sWhere .= " AND exam_category IN ($statusFilter) AND exam_status = 0";
		}
	}

	$sOrder = $sOrder ?: 'ORDER BY pkid ASC';
    
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT pkid, ".str_replace(" , ", " ", implode(", ", $aColumns))."
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

		$row[]  = '<center>
           <button type="button" 
                   data-bs-toggle="modal" 
                   data-bs-target="#modify_exam_modal" 
                   class="btn btn-info fa-solid fa-pen-to-square btn_exam_view"
				   title="Click to modify exam"
				   style="color:white"
                   id="btn_view" 
                   value="'.$aRow['pkid'].'" 

                   data-pkid="'.$aRow['pkid'].'" 
				   data-category="'.$aRow['exam_category'].'"
				   data-exam_title="'.$aRow['exam_title'].'"  
                   data-rev_no="'.$aRow['exam_revision_no'].'"
				   data-purpose="'.$aRow['exam_purpose'].'"
				   data-department="'.$aRow['exam_department'].'" 
				   data-position="'.$aRow['exam_position'].'"
				   data-product_line="'.$aRow['exam_productLine'].'" 
                   data-remarks="'.$aRow['exam_remarks'].'"
                   data-passing_score="'.$aRow['exam_passing_score'].'"
				   data-status="'.$aRow['status'].'" 


				 
			></button>

           <button type="button" 
                class="btn btn-danger fa-solid fa-trash btn_exam_delete"
				title="Click to delete exam"
                style="color:white"
                id="btn_delete" 
                data-pkid="'.$aRow['pkid'].'"
           ></button>

           <a
                class="btn btn-warning fa-solid fa-list-ul btn_exam_list" 
				title="Click to show questions for this exam"
                style="color:white"
                id="btn_questions"
				data-pkid="'.$aRow['pkid'].'"
           </a>  ';

		//    <a
		//    		href="index.php?page=questions_list.php&pkid='.$aRow['pkid'].'"
        //         class="btn btn-warning fa-solid fa-list-ul btn_exam_list" 
		// 		title="Show questions for this exam"
        //         style="color:white"
        //         id="btn_questions"
        //    </a> 

        // $row[] = $aRow['exam_type'];
        // $row[] = $aRow['exam_revision_no'];
		// $row[]  = $aRow['exam_revision_no'] . '
		//    <a
        //         class="ms-2 me-1 btn btn-sm btn-primary fa-solid fa-eye btn_revisions_list" 
        //         title="View revisions for this exam"
        //         style="color:white"
        //         id="btn_revisions"
        //         value="' . $aRow['pkid'] . '" 
        //         data-pkid="' . $aRow['pkid'] . '" 
        //         data-category="' . $aRow['exam_type'] . '" 
        //         data-rev_no="' . $aRow['exam_revision_no'] . '"
        //         data-purpose="' . $aRow['exam_purpose'] . '"
        //         data-position="' . $aRow['exam_position'] . '"
        //         data-remarks="' . $aRow['exam_remarks'] . '"
        //         data-passing_score="' . $aRow['exam_passing_score'] . '"
        //         data-status="' . $aRow['status'] . '"
        //    >
        //    </a>
        // ';

		if ($aRow['exam_revision_no'] !== "Rev.No.0.00") {
			$row[] = $aRow['exam_revision_no'] . '
			   <a
					class="ms-2 me-1 btn btn-sm btn-primary fa-solid fa-eye btn_revisions_list" 
					title="View revisions for this exam"
					style="color:white"
					id="btn_revisions"
					value="' . $aRow['pkid'] . '" 
					data-pkid="' . $aRow['pkid'] . '" 
					data-category="' . $aRow['exam_type'] . '" 
					data-exam_title="'.$aRow['exam_title'].'"  
					data-rev_no="'.$aRow['exam_revision_no'].'"
					data-purpose="'.$aRow['exam_purpose'].'"
					data-department="'.$aRow['exam_department'].'" 
					data-position="'.$aRow['exam_position'].'"
					data-productLine="'.$aRow['exam_productLine'].'" 
					data-remarks="'.$aRow['exam_remarks'].'"
					data-passing_score="'.$aRow['exam_passing_score'].'"
					data-status="'.$aRow['status'].'" 
			   >
			   </a>
			 ';
		} else {
			$row[] = '<div style="text-align: center;">No Revisions</div>';
		}
		   
		// href="index.php?page=revisions_list.php&pkid='.$aRow['pkid'].'"

		// $row[] = $aRow['exam_category'];
		// if ($aRow['exam_category'] == 0) {
		// 	$row[] = 'Newly Hired';
		// } else {
		// 	$row[] = 'Re-Certification';
		// }

		$row[] = $aRow['exam_title'];
		$row[] = $aRow['exam_purpose'];
		$row[] = $aRow['exam_department'];
		$row[] = $aRow['exam_position'];
		$row[] = $aRow['exam_productLine'];
        $row[] = $aRow['exam_passing_score'];
        $row[] = $aRow['exam_remarks'];

        // if ($aRow['exam_status'] == 0) {
        //     $row[] = '<center><span class="badge bg-success text-light"><span>Active</span></span></center>';
        // } elseif ($aRow['exam_status'] == 1) {
        //     $row[] = '<center><span class="badge bg-secondary text-light"><span>Inactive</span></span></center>';
        // }

		array_push($output['aaData'],$row);
	}
	
	echo json_encode( $output );

?>