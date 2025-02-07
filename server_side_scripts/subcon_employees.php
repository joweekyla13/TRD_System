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

	$aColumns = array('tbl_EmployeeInfo.pkid','EmpNo', 'LastName', 'FirstName','MiddleName','Gender','fkPosition','Position','fkSection','Section','DateHired','EmpStatus');
	
	/* used this field for searching data typed in the search box */
	// $array_search = array('empno', 'LastName',
							// 'date', 'date_out');
	// $array_search = array('empno', 'LastName');
							
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "tbl_EmployeeInfo.pkid";
	
	/* DB table to use */
	$sTable = "tbl_EmployeeInfo";
	
	$database_config = '../db_config/db_subcon.php';
	
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
		$sWhere .= "WHERE ";
	}else{
		$sWhere .= "AND ";
	}
	$sWhere .= " EmpStatus=1";
	
	if($sOrder == ""){
		$sOrder = 'ORDER BY tbl_EmployeeInfo.pkid ASC';
	}
    
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS tbl_EmployeeInfo.pkid, ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM $sTable
        INNER JOIN db_hris.tbl_Position ON db_hris.tbl_Position.pkid = db_subcon.tbl_EmployeeInfo.fkPosition
        INNER JOIN db_hris.tbl_Section ON db_hris.tbl_Section.pkid = db_subcon.tbl_EmployeeInfo.fkSection 
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
                   data-bs-target="#modify_emp_info_modal" 
                   class="btn btn-primary fa-solid fa-pen-to-square btn_modify_emp_info"
				   title="Click to modify Employee Details"
				   style="color:white"
                   id="modify_emp_info" 
                   value="'.$aRow['tbl_EmployeeInfo.pkid'].'" 

                   data-pkid="' . $aRow['tbl_EmployeeInfo.pkid'] . '" 
                   data-employee_number="'.$aRow['EmpNo'].'" 
                   data-employee_firstname="'.$aRow['FirstName'].'"
                   data-employee_lastname="'.$aRow['LastName'].'"
                   data-employee_middlename="'.$aRow['MiddleName'].'"
                   data-employee_position="'.$aRow['Position'].'"
                   data-employee_date_hired="'.$aRow['DateHired'].'" 
                   data-employee_section="'.$aRow['Section'].'"
			></button>

           <button type="button" 
                data-bs-toggle="modal" 
                data-bs-target="#view_emp_info_modal" 
                class="btn btn-info fa-solid fa-eye btn_view_emp_info"
				title="Click to view Employee Details"
                style="color:white"
                id="view_emp_info" 
                value="'.$aRow['tbl_EmployeeInfo.pkid'].'" 

                data-pkid="' . $aRow['tbl_EmployeeInfo.pkid'] . '" 
                data-employee_number="'.$aRow['EmpNo'].'" 
                data-employee_firstname="'.$aRow['FirstName'].'"
                data-employee_lastname="'.$aRow['LastName'].'"
                data-employee_middlename="'.$aRow['MiddleName'].'"
                data-employee_position="'.$aRow['Position'].'"
                data-employee_date_hired="'.$aRow['DateHired'].'" 
                data-employee_section="'.$aRow['Section'].'"
           ></button>

           <button
                data-bs-toggle="modal" 
                data-bs-target="#pdf_emp_info_modal" 
                class="btn btn-warning fa-solid fa-address-card btn_create_skill_card" 
				title="Click to show skill Card"
                style="color:white"
                id="create_skill_card"
				value="'.$aRow['tbl_EmployeeInfo.pkid'].'" 

                data-pkid="' . $aRow['tbl_EmployeeInfo.pkid'] . '" 
                data-employee_number="'.$aRow['EmpNo'].'" 
                data-employee_firstname="'.$aRow['FirstName'].'"
                data-employee_lastname="'.$aRow['LastName'].'"
                data-employee_middlename="'.$aRow['MiddleName'].'"
                data-employee_position="'.$aRow['Position'].'"
                data-employee_date_hired="'.$aRow['DateHired'].'" 
                data-employee_section="'.$aRow['Section'].'"
           ></button>  ';

		$row[] = $aRow['EmpNo'];

		$row[] = $aRow['FirstName'] . ' ' . (isset($aRow['MiddleName'][0]) ? $aRow['MiddleName'][0] . '.' : '') . ' ' . $aRow['LastName'];
		$row[] = date("F j, Y", strtotime($aRow['DateHired']));
		$row[] = $aRow['Position'];
		$row[] = $aRow['Section'];

		array_push($output['aaData'],$row);
	}
	
	echo json_encode( $output );

?>