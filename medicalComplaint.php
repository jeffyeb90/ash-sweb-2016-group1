<?php
	include_once("databasehelper.php");
	class medicalComplaint extends databasehelper{
		
		function medicalComplaint(){
			
		}

		function getComplaints($filter=false){
			 $strQuery="select COMPLAINTID, STUDENTID, DATE, TEMPERATURE, SYMPTOMS, diseases.NAME, CAUSE, PRESCRIPTION, nurses.FIRSTNAME, nurses.LASTNAME from medicalcomplaint, diseases, nurses where medicalcomplaint.DIAGNOSIS=diseases.DISEASEID and medicalcomplaint.NURSEID=nurses.NURSEID";

	

			if($filter!=false){
				$strQuery=$strQuery . " where $filter";

			}
			return $this->query($strQuery); 
		}

		// function searchComplaints($text=false){
		// 	$filter=false;
		// 	if($text!=false){
		// 		$filter=" "
		// 	}
		// }




	}
?>