<?php
/**
	@author makafui fie
*/
	$studentID="";
	$weight="";
	$height="";
	$bloodtype="";

	include_once("students.php");
	$student=new students();

	if(!isset($_REQUEST['studentID'])){
		$strStatusMessage="No studentID provided.";
		header("Location: studentsList.php?message=$strStatusMessage");
	}
	$studentID=$_REQUEST['studentID'];
	$weight=$_REQUEST['weight'];
	$height=$_REQUEST['height'];
	$bloodtype=$_REQUEST['bloodtype'];

	$result=$student->updateStudentRecord($studentID, $weight, $height, $bloodtype);
	if($result==false){
		$strStatusMessage="Error while editing user";
	}
	else{
		$strStatusMessage="Student record of student $studentID successfully updated.";
	}
	header("Location: studentsList.php?message=$strStatusMessage");
?>