<?php
/**
*@author makafui fie
*testEditStudentRecord class
*/
include_once("..\students.php");
	class testEditStudentRecord extends PHPUnit_Framework_TestCase{
		public function testEditStudentRecord(){
			$student=new students();

			$this->assertEquals(true, $student->updateStudentRecord(4893, 1.34, 1.99, 'AB'));
			  $result=$student->getStudentByID(4893);
			  $row=$student->fetch();
			 $this->assertEquals(1.99,$row['HEIGHT'] );

		} 

		public function testGetStudentByID(){
			$student=new students();
			$result=$student->getStudentByID(2343243);
			$this->assertEquals(true, $result);
			$row=$student->fetch();
			$this->assertEquals(2343243, $row['STUDENTID']);
		}
 

	}
?>