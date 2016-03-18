<?php 
	include_once("databasehelper.php");
	/**
	*Students class
	*/
	class students extends databasehelper{
		
		function students(){
			
		}
		/**
		*gets students records based on a filter
		*@param string condition to filter. If false, the condition will not be applied.
		*@return boolean true if successful, false if unsuccessful
		*/
		function getStudents($filter=false){
			$strQuery= "select students.STUDENTID, USERNAME, students.FIRSTNAME, students.LASTNAME, GENDER, students.EMAIL, students.PHONENUMBER, HEIGHT, WEIGHT, BLOODTYPE, emergencycontact.FIRSTNAME as CONTACTFIRSTNAME, emergencycontact.LASTNAME as CONTACTLASTNAME from students left join studenthasrecord on students.STUDENTID= studenthasrecord.STUDENTID left join emergencycontact on students.EMERGENCYCONTACTID= emergencycontact.CONTACTID";

			

			if($filter!=false){
				$strQuery=$strQuery . " where $filter";
			}
			return $this->query($strQuery);
		}

		/**
		*Searches for students by username, firstname, last name
		*@param string search text
		*@return boolean true if successful, false if insuccessful
		**/
		function searchStudents($text=false){
			$filter=false;
			if($text!=false){
				$filter=" students.USERNAME like '$text' or students.FIRSTNAME like '$text' or students.LASTNAME like '$text' ";
			}
			return $this->getStudents($filter);
		}

	}
?>
