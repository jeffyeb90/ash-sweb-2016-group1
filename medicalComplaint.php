<?php

 include_once("databasehelper.php");
 /**
 *medicalComplaint  class
 */
 class medicalComplaint extends databasehelper{
   function __construct() {

    }
    /**
  	*Adds a new medical complaint
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
      $strQuery="insert into medicalcomplaint set
  						STUDENTID='$studentid',
  						DATE='$date',
  						TEMPERATURE='$temperature',
  						SYMPTOMS='$symptoms',
              DIAGNOSIS='$diagnosis',
  						CAUSE='$cause',
              PRESCRIPTION='$prescription',
  						NURSEID='$nurseid'";
  		return $this->query($strQuery);
  	}





 }
 ?>
