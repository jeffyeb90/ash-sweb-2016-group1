<?php
/**
*@author Efua Bainson
*@method string getAllDiseases()
*@method string addDisease(string $name)
*@method string editDisease(string $name, integer $id)
*@method string searchDisease(string $name)
*/
include_once("databasehelper.php");
/**
*disease  class
*/
class diseases extends databasehelper{
  function diseases() {

   }
   /**
   *Fetchs all the diseases
   *@return sql query
   */
	function getAllDiseases(){
		$strQuery="select * from diseases";
		return $this->query($strQuery);

	}
  /**
  *Adds a disease
  *@param string $name name of disease
  *@return sql query
  */
	function addDisease($name){
		$strQuery="insert into diseases set NAME='$name'";
		return $this->query($strQuery);
	}
  /**
  *Edits a disease
  *@param string $name name of disease
  *@param integer $id id of disease
  *@return sql query
  */
	function editDisease($name, $id){
		$strQuery="update diseases set NAME='$name' where DISEASEID=$id";
		return $this->query($strQuery);
	}
  /**
  *Searches for a disease
  *@param string $name name of disease
  *@return sql query
  */
	function searchDisease($name){
		$strQuery="select * from diseases where NAME='$name'";
		return $this->query($strQuery);
	}

}

?>
