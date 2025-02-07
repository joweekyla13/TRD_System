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

	$aColumns = array('pkid','date_time_created','docno','classification','reason','memo_to','memo_email_to','memo_from','subject','date_now','department','section','empNo','fullname','date_hired','pds','fromto','venue','endorsementDate','remarks','title','preparedby','notedby','status','revision','username','updated_at','approvedby');
	
	/* used this field for searching data typed in the search box */
	// $array_search = array('empno', 'LastName',
							// 'date', 'date_out');
	// $array_search = array('empno', 'LastName');
							
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "pkid";
	
	/* DB table to use */
	$sTable = "tbl_memo";
	
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
	
	 //  12/02/2024
	$status = isset($_GET['status']) ? $_GET['status'] : '';
	
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
	
	// 12/02/2024
	if ($status != '') {
		$statusFilter = implode(",", array_map('intval', explode(',', $status))); // Sanitize and create a comma-separated list
		if ($sWhere == "") {
			$sWhere .= "WHERE status IN ($statusFilter) AND logdel = 0";
		} else {
			$sWhere .= " AND status IN ($statusFilter) AND logdel = 0";
		}
	}

	$sOrder = $sOrder ?: 'ORDER BY updated_at DESC';
    
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS DISTINCT docno, ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM $sTable
		$sWhere
		GROUP BY docno
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

	// Edited 1-30-25
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$row = array();
		unset($row);
		
		if($aRow['status'] == 0 || $aRow['status'] == 2) {
			$row[]  = '<center>
			<button type="button"
				data-bs-toggle="modal"
				data-bs-target="#view_memo" 
                   class="btn btn-success fa-solid fa-pen-to-square btn_view" 
				   style="color:white"
                   id="btn_view" 
                   value="'.$aRow['pkid'].'" 

                   data-pkid="'.$aRow['pkid'].'" 
                   data-docno="'.$aRow['docno'].'"
				   data-classification="'.$aRow['classification'].'"
                   data-reason="'.$aRow['reason'].'"
                   data-memo_to="'.$aRow['memo_to'].'"
				   data-memo_email_to="'.$aRow['memo_email_to'].'"

                   data-memo_cc_to="'.$aRow['memo_cc_to'].'"
                   data-memo_email_cc_to="'.$aRow['memo_email_cc_to'].'"

                   data-memo_from="'.$aRow['memo_from'].'"
                   data-subject="'.$aRow['subject'].'"
                   data-date_now="'.$aRow['date_now'].'"
                   data-department="'.$aRow['department'].'"
                   data-section="'.$aRow['section'].'"

				   data-preparedby="'.$aRow['preparedby'].'"
                   data-notedby="'.$aRow['notedby'].'"

				   data-username="'.$aRow['username'].'"


				   data-status="'.$aRow['status'].'" 
				   	data-revision="'.$aRow['revision'].'" 	 
			></button>
			
			<button type="button" 
                class="btn btn-danger fa-solid fa-trash btn_delete" 
                style="color:white"
                id="btn_delete" 
                data-id="'.$aRow['pkid'].'"
                data-docno="'.$aRow['docno'].'">
           </button>
			';
		}
		elseif($aRow['status'] == 1 || $aRow['status'] == 3 || $aRow['status'] == 4) {
			$row[]  = '<center>
			<button type="button" 
				data-bs-toggle="modal" 
				data-bs-target="#view_memo" 
				class="btn btn-info fa-solid fa-eye btn_view" 
				style="color:white"
				id="btn_view" 
				value="'.$aRow['pkid'].'" 

                   data-pkid="'.$aRow['pkid'].'" 
                   data-docno="'.$aRow['docno'].'"
				   data-classification="'.$aRow['classification'].'"
                   data-reason="'.$aRow['reason'].'"
                   data-memo_to="'.$aRow['memo_to'].'"
				   data-memo_email_to="'.$aRow['memo_email_to'].'"


				   data-memo_cc_to="'.$aRow['memo_cc_to'].'"
                   data-memo_email_cc_to="'.$aRow['memo_email_cc_to'].'"


                   data-memo_from="'.$aRow['memo_from'].'"
                   data-subject="'.$aRow['subject'].'"
                   data-date_now="'.$aRow['date_now'].'"
                   data-department="'.$aRow['department'].'"
                   data-section="'.$aRow['section'].'"

				   data-preparedby="'.$aRow['preparedby'].'"
                   data-notedby="'.$aRow['notedby'].'"

				   data-username="'.$aRow['username'].'"

				   data-status="'.$aRow['status'].'" 
				   	data-revision="'.$aRow['revision'].'" 


				 
			></button>';
		}

		if ($aRow['status'] == 0) {
            $row[] = '<center><span class="badge bg-secondary text-light"><span>Pending<br>For<br>TU Approval</span></span><br><i style="font-size: 0.8em;">'.$aRow['updated_at'].'</i></center>';
        } elseif ($aRow['status'] == 1) {
            $row[] = '<center><span class="badge bg-success text-light"><span>Approved<br><span>by: '. $aRow['approvedby'] .'</span></span></span><br><i style="font-size: 0.8em;">'.$aRow['updated_at'].'</i></center>';
        } elseif ($aRow['status'] == 2) {
            $row[] = '<center><span class="badge bg-danger text-dark"><span>Disapproved</span></span></center>
						<center><button data-bs-toggle="modal" data-bs-target="#modalViewRevisionRemarks" class="btn btn-sm btn-danger btnRevision"
						data-revision_remarks="'.$aRow['revision'].'"
						><i class="fa-solid fa-envelope"></i></button><br><i style="font-size: 0.8em;">'.$aRow['updated_at'].'</i></center>';
        } elseif ($aRow['status'] == 3) {
            $row[] = '<center><span class="badge bg-danger text-light"><span>Disapproved</span></span></center>
						<center><button data-bs-toggle="modal" data-bs-target="#modalViewDisapproveReason" class="btn btn-sm btn-danger btnReason"
						data-disapprove_reason="'.$aRow['revision'].'"
						><i class="fa-solid fa-envelope"></i></button><br><i style="font-size: 0.8em;">'.$aRow['updated_at'].'</i></center>';
        } elseif ($aRow['status'] == 4) {
            $row[] = '<center><span class="badge bg-success text-light"><span>Approved<br><span>by: '. $aRow['approvedby'] .'</span></span></span><br><i style="font-size: 0.8em;">'.$aRow['updated_at'].'</i></center>';
        }

        $row[] = $aRow['docno'];
		$row[] = $aRow['date_time_created'];
        $row[] = $aRow['reason'];
        $row[] = $aRow['subject'];

		// $row[]  = '<center>
        //    <button type="button" 
        //            data-bs-toggle="modal" 
        //            data-bs-target="#view_memo" 
        //            class="btn btn-success fa-solid fa-pen-to-square btn_view"
		// 		   style="color:white"
        //            id="btn_view" 
        //            value="'.$aRow['pkid'].'" 

        //            data-pkid="'.$aRow['pkid'].'" 
        //            data-docno="'.$aRow['docno'].'"
		// 		   data-classification="'.$aRow['classification'].'"
        //            data-reason="'.$aRow['reason'].'"
        //            data-memo_to="'.$aRow['memo_to'].'"
		// 		   data-memo_email_to="'.$aRow['memo_email_to'].'"
        //            data-memo_from="'.$aRow['memo_from'].'"
        //            data-subject="'.$aRow['subject'].'"
        //            data-date_now="'.$aRow['date_now'].'"
        //            data-department="'.$aRow['department'].'"
        //            data-section="'.$aRow['section'].'"

		// 		   data-preparedby="'.$aRow['preparedby'].'"
        //            data-notedby="'.$aRow['notedby'].'"

		// 		   data-status="'.$aRow['status'].'" 
		// 		   	data-revision="'.$aRow['revision'].'" 


				 
		// 		   ></button>
		// 		</center>
        // ';

		// elseif($aRow['status'] == 1 || $aRow['status'] == 4) {
		// 	$row[]  = '<center>
		// 	<button type="button" 
		// 		data-bs-toggle="modal" 
		// 		data-bs-target="#view_memo" 
		// 		class="btn btn-info fa-solid fa-eye btn_view" 
		// 		style="color:white"
		// 		id="btn_view" 
		// 		value="'.$aRow['pkid'].'" 

        //            data-pkid="'.$aRow['pkid'].'" 
        //            data-docno="'.$aRow['docno'].'"
		// 		   data-classification="'.$aRow['classification'].'"
        //            data-reason="'.$aRow['reason'].'"
        //            data-memo_to="'.$aRow['memo_to'].'"
		// 		   data-memo_email_to="'.$aRow['memo_email_to'].'"
        //            data-memo_from="'.$aRow['memo_from'].'"
        //            data-subject="'.$aRow['subject'].'"
        //            data-date_now="'.$aRow['date_now'].'"
        //            data-department="'.$aRow['department'].'"
        //            data-section="'.$aRow['section'].'"

		// 		   data-preparedby="'.$aRow['preparedby'].'"
        //            data-notedby="'.$aRow['notedby'].'"

		// 		   data-status="'.$aRow['status'].'" 
		// 		   	data-revision="'.$aRow['revision'].'" 

		// 	></button>';

		// 	$row[]  = '<center>
		// 	<button type="button" 
		// 		data-bs-toggle="modal" 
		// 		data-bs-target="#view_memo" 
		// 		class="btn btn-info fa-solid fa-eye btn_pdf" 
		// 		style="color:white"
		// 		id="btn_pdf" 
		// 		value="'.$aRow['pkid'].'" 

        //            data-pkid="'.$aRow['pkid'].'" 
        //            data-docno="'.$aRow['docno'].'"
		// 		   data-classification="'.$aRow['classification'].'"
        //            data-reason="'.$aRow['reason'].'"
        //            data-memo_to="'.$aRow['memo_to'].'"
		// 		   data-memo_email_to="'.$aRow['memo_email_to'].'"
        //            data-memo_from="'.$aRow['memo_from'].'"
        //            data-subject="'.$aRow['subject'].'"
        //            data-date_now="'.$aRow['date_now'].'"
        //            data-department="'.$aRow['department'].'"
        //            data-section="'.$aRow['section'].'"

		// 		   data-preparedby="'.$aRow['preparedby'].'"
        //            data-notedby="'.$aRow['notedby'].'"

		// 		   data-status="'.$aRow['status'].'" 
		// 		   	data-revision="'.$aRow['revision'].'" 


				 
		// 	></button>';
		// }

		//    <button type="button" 
        //         class="btn btn-danger fa-solid fa-trash btn_delete" 
        //         style="color:white"
        //         id="btn_delete" 
        //         data-id="'.$aRow['pkid'].'"
        //         data-docno="'.$aRow['docno'].'">
        //    </button>

		array_push($output['aaData'],$row);
	}
	
	echo json_encode( $output );

?>