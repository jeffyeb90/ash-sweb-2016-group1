<?php
	include_once("databasehelper.php");
	class medicalComplaint extends databasehelper{
		
		function medicalComplaint(){
			
		}
		/**
		*get complaint records based on the filter
		*@param string condition to filter. If false, filter will not be applied
		*@return boolean true if successful, false if unsuccessful
		**/

		function getComplaints($filter=false){
			 $strQuery="select COMPLAINTID, STUDENTID, DATE, TEMPERATURE, SYMPTOMS, diseases.NAME, CAUSE, PRESCRIPTION, nurses.FIRSTNAME, nurses.LASTNAME from medicalcomplaint left join diseases on medicalcomplaint.DIAGNOSIS=diseases.DISEASEID left join nurses on  medicalcomplaint.NURSEID=nurses.NURSEID";

	

			if($filter!=false){
				$strQuery=$strQuery . " where $filter";

			}
			return $this->query($strQuery); 
		}
		/**
		*search for medical complaints using student ID as a filter
		*@param string student ID to filter by. If false, calls getComplaints function to display all complaints
		*@return boolean true if successful, false if unsuccessful
		**/
		function searchComplaintsByStudentID($text=false){
			$filter=false;
			if($text!=false){
				$filter=" STUDENTID like '$text'";
			}

			return $this->getComplaints($filter);
		}




	}
?>