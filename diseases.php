<?php
include_once("databasehelper.php");
/**
*disease  class
*/
class diseases extends databasehelper{
  function diseases() {

   }

	function getAllDiseases(){
		$strQuery="select * from diseases";
		return $this->query($strQuery);

	}

	function addDisease($name){
		$strQuery="insert into diseases set NAME='$name'";
		return $this->query($strQuery);
	}

	function editDisease($name, $id){
		$strQuery="update diseases set NAME='$name' where DISEASEID='$id'";
		return $this->query($strQuery);
	}

	function searchDisease($name){
		$strQuery="select * from diseases where NAME='$name'";
		return $this->query($strQuery);
	}

}

?>
