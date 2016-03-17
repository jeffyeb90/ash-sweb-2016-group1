<?php 
	include_once("databasehelper.php");
	class students extends databasehelper{
		
		function students(){
			
		}

		function getStudents($filter=false){
			$strQuery= "select students.STUDENTID, USERNAME, students.FIRSTNAME, students.LASTNAME, GENDER, students.EMAIL, students.PHONENUMBER, HEIGHT, WEIGHT, BLOODTYPE, emergencycontact.FIRSTNAME as CONTACTFIRSTNAME, emergencycontact.LASTNAME as CONTACTLASTNAME from students left join studenthasrecord on students.STUDENTID= studenthasrecord.STUDENTID left join emergencycontact on students.EMERGENCYCONTACTID= emergencycontact.CONTACTID";

			

			if($filter!=false){
				$strQuery=$strQuery . " where $filter";
			}
			return $this->query($strQuery);
		}

		function searchStudents($text=false){
			$filter=false;
			if($text!=false){
				$filter=" students.USERNAME like '$text' or students.FIRSTNAME like '$text' or students.LASTNAME like '$text' ";
			}
			return $this->getStudents($filter);
		}

	}
	?>
