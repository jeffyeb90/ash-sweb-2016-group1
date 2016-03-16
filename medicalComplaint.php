<?php
	include_once("databasehelper.php");
	class medicalComplaint extends databasehelper{
		
		function medicalComplaint(){
			
		}

		function getComplaints($filter=false){
			$strQuery="select COMPLAINTID, STUDENTID, DATE, TEMPERATURE, SYMPTOMS, DIAGNOSIS, CAUSE, PRESCRIPTION, NURSEID from medicalcomplaint";

			if($filter!=false){
				$strQuery=$strQuery . " where $filter";

			}
			return $this->query($strQuery); 
		}




	}
?>