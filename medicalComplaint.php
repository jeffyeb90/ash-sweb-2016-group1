<?php
	include_once("databasehelper.php");
	class medicalComplaint extends databasehelper{
		
		function medicalComplaint(){
			
		}

		function updateComplaints($complaintID, $studentID, $temperature, $symptoms, $diagnosis, $cause, $prescription, $nurseID){
				$strQuery="Update medicalcomplaint set STUDENTID=$studentID,  TEMPERATURE=$temperature, SYMPTOMS='$symptoms', DIAGNOSIS='$diagnosis', CAUSE='$cause', PRESCRIPTION='$prescription', NURSEID='$nurseID' where COMPLAINTID = $complaintID";
				return $this->query($strQuery);
		}

		function getComplaintByID($complaintID){
			$strQuery="select COMPLAINTID, STUDENTID, DATE, TEMPERATURE, SYMPTOMS, DIAGNOSIS, CAUSE, PRESCRIPTION, NURSEID from medicalcomplaint where COMPLAINTID=$complaintID";
			return $this->query($strQuery);
		}

	}
?>