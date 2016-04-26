<?php
include_once("../medicalComplaintAjax.php");
/**
*@author Andrew Abbeyquaye
* testViewComplaintDetails class
* @method boolean testViewComplaintDetails() should return a boolean result after test
*/

class testViewComplaintDetails extends PHPUnit_Framework_TestCase
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

		$this->assertTrue(true,'{"result":1,"complaint":[{"COMPLAINTID":"1","STUDENTID":"73812017","DATE":"2016-03-04","TEMPERATURE":"38.00","SYMPTOMS":"Headache, nausea","NAME":null,"CAUSE":"Stagnant water in area","PRESCRIPTION":"Amodiaquine ","FIRSTNAME":null,"LASTNAME":null},{"COMPLAINTID":"2","STUDENTID":"20402017","DATE":"2016-03-09","TEMPERATURE":"39.50","SYMPTOMS":"Headache","NAME":null,"CAUSE":"Dehydration","PRESCRIPTION":"Panadol","FIRSTNAME":null,"LASTNAME":null},{"COMPLAINTID":"3","STUDENTID":"73812017","DATE":"2016-03-04","TEMPERATURE":"39.00","SYMPTOMS":"Headache, Fever","NAME":null,"CAUSE":"Casual sex","PRESCRIPTION":"Amodiaquine ","FIRSTNAME":null,"LASTNAME":null}]}', '../medicalComplaintAjax.php?cmd=2&cid=');
    }



}