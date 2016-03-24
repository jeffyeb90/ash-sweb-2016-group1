<?php
/**

*@author Efua Bainson, Makafui Fie and Andrew Abbeyquaye
*@method string addComplaint(integer $studentID, date $date, decimal $temperature, string $symptoms, string $diagnosis, string $cause, string $prescription, integer $nurseID)
*@method bool getAllMedicalComplaints($filter)
*/
 include_once("databasehelper.php");
 /**
 *medicalComplaint  class
 */
 class medicalComplaint extends databasehelper{
   function medicalComplaint () {

    }
    /**
  	*@param string studentID identification number of the student
  	*@param string date date
  	*@param string temperature temperature
  	*@param string symptoms symptoms shown by the student
  	*@param string diagnosis diagnosis given by nurse
  	*@param string cause cause of illness
  	*@param string prescription prescription made by nurse
    *@param string nurseID identification number of the nurse
  	*@return boolean returns true if successful or false
  	*/
    function addComplaint($studentID, $date, $temperature, $symptoms, $diagnosis, $cause, $prescription, $nurseID){
      /**
      *@var string $strQuery Contains sql statement
      */
      $strQuery="insert into medicalcomplaint set
  						STUDENTID=$studentID,
  						DATE='$date',
  						TEMPERATURE=$temperature,
  						SYMPTOMS='$symptoms',
              DIAGNOSIS='$diagnosis',
  						CAUSE='$cause',
              PRESCRIPTION='$prescription',
  						NURSEID=$nurseID";
  		return $this->query($strQuery);
  	}


        /**
        *gets medical complaints based on the filter
        *@param string mixed condition to filter. If  false, then filter will not be applied
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
