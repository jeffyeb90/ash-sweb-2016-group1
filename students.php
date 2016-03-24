<?php 
	include_once("databasehelper.php");
	class students extends databasehelper{
		
		function students(){
			
		}

		function updateStudentRecord($studentID, $weight, $height, $bloodtype){

			$strQuery="Update studenthasrecord set HEIGHT='$height', WEIGHT='$weight', BLOODTYPE='$bloodtype' where STUDENTID=$studentID";
			return $this->query($strQuery);
		}

	}
	?>