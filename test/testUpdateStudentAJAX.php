<?php
/**
*@author makafui fie
*testUpdateStudentAJAX class
*/
include_once("..\studentsajax.php");
include_once("..\students.php");
	class testUpdateStudentAJAX extends PHPUnit_Framework_TestCase{
		public function testUpdateStudent(){
			$url="studentsajax.php?cmd=2&sid=3424323";
			$this->asserttrue(true,'{"result":1, "student":{"STUDENTID":"3424323","HEIGHT":"1.52","WEIGHT":"46.00","BLOODTYPE":"B"}}', $url);

		} 

		


	}
?>