<?php
/**
*@author Andrew Abbeyquaye
*@method bool getAllMedicalComplaints($filter)
*/

	include_once("databasehelper.php");
    /**
    *medicalComplaint class
    */
	class medicalComplaint extends databasehelper{
		
		function medicalComplaint(){
			
		}
        
        
        /**
        *gets medical complaints based on the filter
        *@param string mixed condition to filter. If false, then filter will not be applied
        *@return boolean true if successful, else false
        */
        function getAllMedicalComplaints($filter=false){
            $strQuery="select COMPLAINTID, students.STUDENTID, students.FIRSTNAME, students.LASTNAME, EMAIL, PHONENUMBER, DATE,TEMPERATURE,SYMPTOMS,DIAGNOSIS,CAUSE,PRESCRIPTION,NURSEID, IMAGE from students left join medicalComplaint on students.STUDENTID=medicalComplaint.STUDENTID";
            
            if($filter!=false){
                $strQuery=$strQuery . " where $filter";
            }
            $strQuery=$strQuery . " ORDER BY DATE DESC";
            //var_dump($strQuery);
            return $this->query($strQuery);
        }
        
        
        /**
        *gets a medical complaint based on the complaintID
        *@param string complaint id 
        *@return boolean true if successful, else false
        */
        function getMedicalComplaint($complaintID){
            $strQuery = "SELECT * FROM medicalComplaint WHERE COMPLAINTID=$complaintID";
            return $this->query($strQuery);
        }

	}
?>