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

$url ="studentsajax.php?cmd=2&uc=24345";
$this->asserttrue('{"result":1, "student":{"STUDENTID":"24345","HEIGHT":"4.5", "WEIGHT":"45", "BLOODTYPE":"AB"}}',$url);


}

}
?>
