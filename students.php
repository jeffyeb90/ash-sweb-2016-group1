<?php 
	include_once("databasehelper.php");
	class students extends databasehelper{
		
		function students(){
			
		}

		function updateStudentRecord($studentID, $weight, $height, $bloodtype){

			$strQuery="Update studenthasrecord set HEIGHT='$height', WEIGHT='$weight', BLOODTYPE='$bloodtype' where STUDENTID=$studentID";
			return $this->query($strQuery);
		}

		function getStudentByID($studentID){
			$strQuery="Select STUDENTID, HEIGHT, WEIGHT, BLOODTYPE from studenthasrecord where STUDENTID=$studentID";
			return $this->query($strQuery);
		}

	}
	?>