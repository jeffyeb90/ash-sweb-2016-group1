<?php
	include_once("databasehelper.php");
	/**
	*@author Jeffrey Takyi-Yeboah
	*Student  class
	* @method boolean addStudentRecord() should insert a student and return a boolean result
	* @method students() is a constructor of the student class
	*/
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
			/**
			*@var string $strQuery should contain insert query
			*/
			$strQuery="insert into studentHasRecord set
							STUDENTID=$studentID,
							HEIGHT=$height,
							WEIGHT=$weight,
							BLOODTYPE='$bloodtype'";
			return $this->query($strQuery);
		}


	}
	?>
