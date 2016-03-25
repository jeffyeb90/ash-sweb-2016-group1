<?php
/**
*@author makafui fie
*/
	$complaintID="";
	$studentID="";
	$temperature="";
	$symptoms="";
	$diagnosis="";
	$cause="";
	$prescription="";
	$nurseID="";

	include_once("medicalComplaint.php");
	$complaint=new medicalComplaint();

	if(!isset($_REQUEST['complaintID'])){
		$strStatusMessage="No complaint ID provided.";
		header("Location: medicalComplaintList.php?message=$strStatusMessage");
	}
	$complaintID=$_REQUEST['complaintID'];
	$studentID=$_REQUEST['studentID'];
	$temperature=$_REQUEST['temperature'];
	$symptoms=$_REQUEST['symptoms'];
	$diagnosis=$_REQUEST['diagnosis'];
	$cause=$_REQUEST['cause'];
	$prescription=$_REQUEST['prescription'];
	$nurseID=$_REQUEST['nurseID'];

	$result=$complaint->updateComplaint($complaintID, $studentID, $temperature, $symptoms, $diagnosis, $cause, $prescription, $nurseID);
	if($result==false){
		$strStatusMessage="Error while editing complaint";
	}
	else{
		$strStatusMessage="Medical complaint of $complaintID successfully updated.";
	}
	header("Location: medicalComplaintList.php?message=$strStatusMessage");
?>