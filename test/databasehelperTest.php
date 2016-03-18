<?php
/**
*@author Efua Bainson
*@method object testConnect()
*@method object testQuery(string $databasehelper)
*@method void testFetch(string $databasehelper)
*/
include_once("../databasehelper.php");
/**
*databasehelperTest  class
*/
class DatabasehelperTest extends PHPUnit_Framework_TestCase
{
  /**
  *@return returns an object
  */
    public function testConnect()
    {
      $databasehelper=new databasehelper();
      $this->assertEquals(true, $->connect());
		return $databasehelper;
    }
    /**
    *@param object $databasehelper is an instance of databasehelper
    *@return returns an object
    */
	public function testQuery($databasehelper)
	{
		$this->assertEquals(true,$databasehelper->query("select * from users"));
		return $databasehelper;
	}

  /**
  *@param object $databasehelper is an instance of databasehelper
  */
	public function testFetch($databasehelper)
	{
		$row=$databasehelper->fetch();
		$this->assertGreaterThan(0,count($row));

	}
}
