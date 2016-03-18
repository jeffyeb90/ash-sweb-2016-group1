<?php
	include_once("databasehelper.php");
	class medicalComplaint extends databasehelper{
		
		function medicalComplaint(){
			
		}
        
        
        /**
        *gets medical complaints based on the filter
        *@param string mixed condition to filter. If  false, then filter will not be applied
        *@return boolean true if successful, else false
        */
        function getAllMedicalComplaints($filter=false){
            $strQuery="select COMPLAINTID, students.STUDENTID, students.FIRSTNAME, students.LASTNAME, DATE,TEMPERATURE,SYMPTOMS,DIAGNOSIS,CAUSE,PRESCRIPTION,NURSEID from students left join medicalComplaint on students.STUDENTID=medicalComplaint.STUDENTID";
            
            if($filter!=false){
                $strQuery=$strQuery . " where $filter";
            }
            $strQuery=$strQuery . " ORDER BY DATE DESC";
            return $this->query($strQuery);
        }

	}
?>