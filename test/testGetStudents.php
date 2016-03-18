<?php
	include_once("..\students.php");

	class testGetStudents extends PHPUnit_Framework_TestCase{
		public function testGetStudents(){
			$student = new students();
			$this->assertEquals(true, $student->getStudents());
			$row=$student->fetch();
			$this->assertGreaterThan(0, count($row));
		}

	public function testSearchStudents(){
		$student = new students();
		$username = "jessie";
		$this->assertEquals(true, $student->searchStudents($username));

		$row=$student->fetch();
		$this->assertEquals("jessie.aye", $row['USERNAME']);
	}

	}
?>