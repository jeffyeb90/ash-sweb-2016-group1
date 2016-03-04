<?php
include_once("..\databasehelper.php");

class testDatabasehelper extends PHPUnit_Framework_TestCase
{
    public function testConnect()
    {

        $databasehelper=new databasehelper();
        $this->assertEquals(true, $->connect());
		return $databasehelper;
    }
	/**
	*@depends  testConnect
	*/
	public function testQuery($databasehelper)
	{
		$this->assertEquals(true,$databasehelper->query("select * from users"));
		return $databasehelper;
	}

	/**
	*@depends testQuery
	*/
	public function testFetch($databasehelper)
	{
		$row=$databasehelper->fetch();
		$this->assertGreaterThan(0,count($row));

	}
}
