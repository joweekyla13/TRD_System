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

	$aColumns = array('pkid','question_number','exam_pkid','question_type','question_image_path', 'question_desc','question','question_choices','question_answer','question_points','question_status',);
	
	/* used this field for searching data typed in the search box */
	// $array_search = array('empno', 'LastName',
							// 'date', 'date_out');
	// $array_search = array('empno', 'LastName');
							
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "pkid";
	
	/* DB table to use */
	$sTable = "tbl_questions";
	
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
	
	if($sWhere == ""){
		$sWhere .= "WHERE  ";
	}else{
		$sWhere .= "AND ";
	}
	$sWhere .= " question_status=0 AND exam_pkid = '".$_SESSION['question_pkid']."' ";

	
	if($sOrder == ""){
		$sOrder = 'ORDER BY pkid ASC';
	}
    
	/*
	 * SQL queries
	 * Get data to display
	 */
	// $sQuery = "
	// 	SELECT DISTINCT question_number, ".str_replace(" , ", " ", implode(", ", $aColumns))."
	// 	FROM $sTable
	// 	$sWhere
	// 	GROUP BY question_number
	// 	$sOrder
	// 	$sLimit
	// ";
	// $rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());

	$sQuery = "
		SELECT exam_pkid, ".str_replace(" , ", " ", implode(", ", $aColumns))."
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
		
        $row[] = $aRow['question_type'];

		// $row[]  = '<center>
        //    <button type="button" 
        //            data-bs-toggle="modal" 
        //            data-bs-target="#modify_questions_form" 
        //            class="btn btn-info fa-solid fa-pen-to-square btn_questions_view"
		// 		   style="color:white"
        //            id="btn_view" 
        //            value="'.$aRow['pkid'].'" 

		// 		   data-pkid="'.$aRow['pkid'].'"
        //            data-question_number="'.$aRow['question_number'].'" 
		// 		   data-exam_number="'.$aRow['exam_pkid'].'"
		// 		   data-question_type="'.$aRow['question_type'].'"
        //            data-question_image_path="'.$aRow['question_image_path'].'"
		// 		   data-question_desc="'.$aRow['question_desc'].'"
		// 		   data-question="'.$aRow['question'].'"
        //            data-question_choices="'.$aRow['question_choices'].'"
        //            data-question_answer="'.$aRow['question_answer'].'"
		// 		   data-question_points="'.$aRow['question_points'].'" 
        //            data-question_status="'.$aRow['question_status'].'"


				 
		// 	></button>

        //    <button type="button" 
        //         class="btn btn-danger fa-solid fa-trash btn_questions_delete" 
        //         style="color:white"
        //         id="btn_delete" 
        //         data-id="'.$aRow['pkid'].'"
        //    ></button>';

        // $row[] = $aRow['exam_pkid'];
		$row[] = $aRow['question_number'];

		// $imagePath = !empty($aRow['question_image_path']) ? $aRow['question_image_path'] : 'uploads/no_image.png';
    	$row[] = '<img src="' . $aRow['question_image_path'] . '" style="width: 100px; height: auto;">';

        $row[] = $aRow['question_desc'];
		$row[] = $aRow['question'];


		$row[] = $aRow['question_choices'];
        $row[] = $aRow['question_answer'];
        $row[] = $aRow['question_points'];

        if ($aRow['question_status'] == 0) {
            $row[] = '<center><span class="badge bg-success text-light"><span>Active</span></span></center>';
        } elseif ($aRow['question_status'] == 1) {
            $row[] = '<center><span class="badge bg-secondary text-light"><span>Inactive</span></span></center>';
        }

		

		array_push($output['aaData'],$row);
	}
	
	echo json_encode( $output );

?>