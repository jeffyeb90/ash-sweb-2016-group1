<?php
include_once("../students.php");
/**
*@author Jeffrey Takyi-Yebaoh
*testStudent  class
* @method boolean testAddStudentRecord() should return a boolean result after test
* @method boolean testGetStudentByID() should  return a boolean result after test
*/

class testStudent extends PHPUnit_Framework_TestCase
{
  /**
  *Test addStudentRecord
  *@return boolean returns true if results match or false if otherwise
  */
    public function testAddStudentRecord()
    {
      	/**
        *@var int $strTestStudentID should contain ID of student
        *@var StudentObject $obj should create an instance of student class
        */

		// generate test studentID
		$strTestStudentID=3;
        $obj=new students();

        $this->assertEquals(true,
		$obj->addStudentRecord(
			$strTestStudentID,// studentID
			"3",	//height
			"45",	//weight
			"AB"	//bloodtype

			));

		$this->assertEquals(true,$obj->query("select * from studentHasRecord where STUDENTID=$strTestStudentID"));
		//count the number of fields
		$this->assertCount(4,$obj->fetch());
    }

  /**
  *Test getStudentByID
  *@return boolean returns true if results match or false if otherwise
  */

public function testGetStudentByID(){
  /**
  *@var int $testStudentID should contain ID of student
  *@var StudentObject $obj should create an instance of student class
  */

  		// generate test studentID
  		$testStudentID=2;
          $obj=new students();

          $this->assertEquals(true,
  		$obj->getStudentByID(
  			$testStudentID,// studentID
  			));

  		$this->assertEquals(true,$obj->query("select * from studentHasRecord where STUDENTID=$testStudentID"));
  		//count the number of fields
  		$this->assertCount(4,$obj->fetch());
      }

}
