<?php 
	include_once("databasehelper.php");
	class students extends databasehelper{
		
		function students(){
			
		}

		function getStudents($filter=false){
			$strQuery= "select STUDENTID, USERNAME, FIRSTNAME, LASTNAME, PASSWORD, GENDER, EMAIL, PHONENUMBER, EMERGENCYCONTACTID from students";

			if($filter!=false){
				$strQuery=$strQuery . " where $filter";
			}
			return $this->query($strQuery);
		}

	}
	?>
