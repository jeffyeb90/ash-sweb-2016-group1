<?php
include_once("setting.php");
/**
*@author Jeffrey Takyi-Yebaoh
*databasehelper  class
* @method boolean connect() should connect to database and return a boolean result
* @method construct() is a constructor of the databaseHelper class
* @method query($strQuery) should execute sql string
* @method fetch() should fetch result after sql qeury execution
*/

class databasehelper{
  /**
  *@global  $db should connect to database details
  *@global string $result should hold record queried
  */
  var $db=null;
  var $result=null;

  function __construct() {

   }
   /**
   *connect to the database
   *@return boolean true or false for success
   */
  function connect(){
  	$this->db=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
  	if($this->db->connect_errno){
  			return false;
  	}
  	return true;
	}
  	/**
  	*Query the database
  	*@param string $strQuery sql string to execute
  	*/
  function query($strQuery){
  	if(!$this->connect()){
  			return false;
  	}
    if($this->db==null){
  			return false;
	  }
   $this->result=$this->db->query($strQuery);
   if($this->result==false){
  		return false;
	 }
   return true;
 }
  	/**
  	* Fetch from the current data set and return
  	* @return array one record
  	*/
  function fetch(){
  		//Complete this funtion to fetch from the $this->result
	 if($this->result==null){
  	return false;
   }

	if($this->result==false){
  			return false;
  }

  return $this->result->fetch_assoc();
  }
}


?>
