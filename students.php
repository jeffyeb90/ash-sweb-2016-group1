<?php
	include_once("databasehelper.php");
	class students extends databasehelper{

		function students(){

		}
		/**
		*Adds a new user
		*@param int studentID
		*@param decimal weight weight of student
		*@param decimal height height of student
		*@param string bloodtype bloodtype of student

		*@return boolean returns true if successful or false
		*/
		function addStudentRecord($studentID,$weight,$height,$bloodtype){
			$strQuery="insert into studentHasRecord set
							STUDENTID='$studentID',
							HEIGHT='$height',
							WEIGHT='$weight',
							BLOODTYPE=''$bloodtype'";
			return $this->query($strQuery);
		}


	}
	?>
