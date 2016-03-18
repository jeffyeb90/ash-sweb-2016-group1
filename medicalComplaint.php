<?php
/**
*@author Efua Bainson
*@method string addComplaint(integer $studentID, date $date, decimal $temperature, string $symptoms, string $diagnosis, string $cause, string $prescription, integer $nurseID)
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
 }


?>
