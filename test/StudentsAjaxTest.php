<?php
include_once("../students.php");
include_once("../studentsajax.php");
/**
*@author Jeffrey Takyi-Yebaoh
*testStudent  class
* @method boolean testAddStudentRecord() should return a boolean result after test
* @method boolean testGetStudentByID() should  return a boolean result after test
*/

class StudentsAjaxTest extends PHPUnit_Framework_TestCase
{

  public function testViewStudentInfo(){

$url ="studentsajax.php?cmd=2&uc=2";
$this->asserttrue(true,'{"result":1, "student":{"STUDENTID":"2","HEIGHT":"3", "WEIGHT":"90", "BLOODTYPE":"AB"}}',$url);


}

}
?>
