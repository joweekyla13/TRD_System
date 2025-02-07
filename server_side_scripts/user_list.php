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

	$aColumns = array('tbl_assignmodule.pkid','tbl_assignmodule.user_id','tbl_assignmodule.module_id','tbl_user.pkid','tbl_user.EmpNo','tbl_user.username','tbl_user.EmpName','tbl_module.pkid','tbl_module.module_name');
	
	/* used this field for searching data typed in the search box */
	// $array_search = array('empno', 'LastName',
							// 'date', 'date_out');
	// $array_search = array('empno', 'LastName');
							
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "tbl_assignmodule.pkid";
	
	/* DB table to use */
	$sTable = "tbl_assignmodule";
	
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
	$sWhere .= " tbl_assignmodule.logdel=0";
	
	if($sOrder == ""){
		$sOrder = 'ORDER BY tbl_assignmodule.pkid ASC';
	}
    
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS DISTINCT tbl_user.EmpNo, ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM $sTable
        INNER JOIN tbl_user ON tbl_assignmodule.user_id = tbl_user.pkid
	    INNER JOIN tbl_module ON tbl_assignmodule.module_id = tbl_module.pkid
		$sWhere
        GROUP BY tbl_user.EmpNo
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
        // $row[] = $aRow['pkid'];
        $row[] = $aRow['EmpNo'];
		$row[] = $aRow['EmpName'];
        $row[] = $aRow['username'];

        // $row[] = $aRow['module_name'];

        // if ($aRow['isConformed'] == 0) {
        //     $row[] = '<center><span class="badge bg-secondary text-light"><span>Pending</span></span></center>';
        // } elseif ($aRow['isConformed'] == 1) {
        //     $row[] = '<center><span class="badge bg-success text-light"><span>Conformed</span></span></center>';
        // } elseif ($aRow['isConformed'] == 2) {
        //     $row[] = '<center><span class="badge bg-warning text-dark"><span>ForRevision</span></span></center>';
        // } elseif ($aRow['isConformed'] == 3) {
        //     $row[] = '<center><span class="badge bg-danger text-light"><span>Rejected</span></span></center>';
        // }

        // if ($aRow['isReceived'] == 0) {
        //     $row[] = '<center><span class="badge bg-secondary text-light"><span>Pending</span></span></center>';
        // } elseif ($aRow['isReceived'] == 1) {
        //     $row[] = '<center><span class="badge bg-success text-light"><span>Received</span></span></center>';
        // } elseif ($aRow['isReceived'] == 2) {
        //     $row[] = '<center><span class="badge bg-warning text-dark"><span>ForRevision</span></span></center>';
        // } elseif ($aRow['isReceived'] == 3) {
        //     $row[] = '<center><span class="badge bg-danger text-light"><span>Rejected</span></span></center>';
        // }

        // if ($aRow['isHeadApproval'] == 0) {
        //     $row[] = '<center><span class="badge bg-secondary text-light"><span>Pending</span></span></center>';
        // } elseif ($aRow['isHeadApproval'] == 1) {
        //     $row[] = '<center><span class="badge bg-success text-light"><span>Approved</span></span></center>';
        // } elseif ($aRow['isHeadApproval'] == 2) {
        //     $row[] = '<center><span class="badge bg-warning text-dark"><span>ForRevision</span></span></center>';
        // } elseif ($aRow['isHeadApproval'] == 3) {
        //     $row[] = '<center><span class="badge bg-danger text-light"><span>Rejected</span></span></center>';
        // }

		$row[]  = '<center>
			<button type="button" 
				data-bs-toggle="modal" 
				data-bs-target="#modalModifyUserAccess" 
				class="btn btn-success fa-solid fa-file btn_view" 
				style="color:white"
				id="btn_view" 
				value="'.$aRow['tbl_assignmodule.pkid'].'" 

				data-pkid="'.$aRow['tbl_assignmodule.pkid'].'" 
				data-userpkid="'.$aRow['tbl_user.pkid'].'" 
				data-user_id="'.$aRow['user_id'].'" 
				data-module_id="'.$aRow['module_id'].'" 
				data-empno="'.$aRow['EmpNo'].'" 
				data-module_name="'.$aRow['module_name'].'">

			</button>';

		array_push($output['aaData'],$row);
	}
	
	echo json_encode( $output );

?>