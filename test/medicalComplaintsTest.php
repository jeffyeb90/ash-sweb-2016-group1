<?php
/**
*@author Andrew Abbeyquaye
*/
include_once("../medicalComplaint.php");
/**
*medicalComplaintsTest class
*/
class medicalComplaintsTest extends PHPUnit_Framework_TestCase
{

	public function testGetAllMedicalComplaints(){
		$obj=new medicalComplaint();
        $this->assertEquals(true, $obj->getAllMedicalComplaints());
        $this->assertEquals(true, $obj->query("select COMPLAINTID, students.STUDENTID, students.FIRSTNAME, students.LASTNAME, EMAIL, PHONENUMBER, DATE,TEMPERATURE,SYMPTOMS,DIAGNOSIS,CAUSE,PRESCRIPTION,NURSEID, IMAGE from students left join medicalComplaint on students.STUDENTID=medicalComplaint.STUDENTID ORDER BY DATE DESC"));
	}


}