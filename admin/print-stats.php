<?php
session_start();
	include 'includes/conn.php';
	include '../includes/appsettings.php';

	function generateRow($conn){
		$contents = '';
	 	
		$sql = "SELECT * FROM `enquiry_type` ORDER BY `etid` ASC";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
        	$id = $row['etid'];
        	$contents .= '
        		<tr>
        			<td colspan="2" align="center" style="font-size:15px;"><b>'.$row['name'].'</b></td>
        		</tr>
        		<tr>
        			<td width="80%"><b>Departments</b></td>
        			<td width="20%"><b>Total</b></td>
        		</tr>
        	';

        	// $sql = "SELECT * FROM `departments` WHERE `et_id` = '$id' ORDER BY `dept_id` ASC";
        	$sql = "SELECT * FROM `departments` ORDER BY `did` ASC";
    		$cquery = $conn->query($sql);
    		while($crow = $cquery->fetch_assoc()){
    			$sql = "SELECT * FROM `enquiries` WHERE `dept_id` = '".$crow['did']."' AND `et_id`='$id'";
      			$vquery = $conn->query($sql);
      			$stats = $vquery->num_rows;
      			// $votes = $vquery->num_rows;

      			$contents .= '
      				<tr>
      					<td>'.$crow['dept_name'].'</td>
      					<td>'.$stats.'</td>
      				</tr>
      			';

    		}

        }

		return $contents;
	}


    // get app settings
    $title = (!empty($app['name'])) ? $app['name'] : 'Client Services Management System';

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Result: '.$title);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">'.$title.'</h2>
      	<h4 align="center">All Service Request Statistics - Report</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
      ';  
   	$content .= generateRow($conn);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('Service-Requests-Statistics-Report.pdf', 'I');

?>