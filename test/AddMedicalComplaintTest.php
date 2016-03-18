<?php
/**
*@author Efua Bainson
*@method void testAddMedicalComplaint()
*/
include_once("../medicalComplaint.php");
/**
*AddMedicalComplaintTest  class
*/
class AddMedicalComplaintTest extends PHPUnit_Framework_TestCase
{
    public function testAddMedicalComplaint()
    {
    /**
    *@var integer $testStudentID Contains studentID
    *@var object $obj Contains an instance of medicalComplaint
    */
    $testStudentID=78902016;
    $obj=new medicalComplaint();
    $this->assertEquals(true,
		$obj->addComplaint(
    	78902016,	//studentID
			'2016-03-15',		//date
			38.5,			//temperature
			'Headache',		//symptoms
			'Malaria',	//diagnosis
			'Unhygenic conditions',			//cause
      'Paracetamol', //prescription
      47932409 //nurseID
			));

		$this->assertEquals(true,$obj->query("select * from medicalComplaint where STUDENTID=$testStudentID"));
		//counts the number of fields
		$this->assertCount(9,$obj->fetch());
    }



}
