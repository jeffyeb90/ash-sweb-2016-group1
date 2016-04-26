<?php

	if(isset($_REQUEST['cmd'])){
		$cmd=$_REQUEST['cmd'];
		switch($cmd){
			case 1:
				searchStudent();
	  			break;
	  		case 2:
	  			getStudentByID();
	  			break;
	  		case 3: 
	  			updateStudent();
	  			break;
	  		case 4:
	  			viewStudentInfo();
	  			break;
	  		default:
	  			echo "wrong command";
	  			break;
	  		}
		}

		function searchStudent(){
			$name=$_REQUEST['txtName'];
			include_once('students.php');
			//create an object of users
			$obj=new students();
			$row=$obj->searchStudents($name);

			if($row==false){
				echo '{"result":0,"message":"error searching name"}';
			}
			else{

	  		$result=$obj->fetch();

	 		if($result==false){
	    		echo '{"result":0,"message":"No student found"}';
	  		}
	  		else{
	  			echo '{"result":1,"user":[';
				while($result){
	  				echo json_encode($result);

					$result=$obj->fetch();
					if($result!=false){
						echo ",";
					}
				}
				echo "]}";
			}
		}	
	}
	/**
	*Server side AJAX function that gets a student record 
	*@return a JSON object containing the success of the request and information from the database if successful
	*/
	function getStudentByID(){
		//checks if sid is set
		if(!isset($_REQUEST['sid'])){
			echo '{"result": 0, "message": "Student ID not provided"}';
			exit();
		}
		/**
			*@var string $sid should contain requested sid
		*/
		$sid = $_REQUEST['sid'];
		//include students class
		include_once("students.php");
		/**
			*@var string $obj, an object of the student class
		*/
		$obj = new students();
		/**
			*@var string $result containing the result of the executed query
		*/
		$result = $obj->getStudentByID($sid);
		if(!$result){
			echo '{"result":0, "mesage": "error getting student information"}';
			exit();
		}
		/**
			*@var string $row containing information fetched from the database
		*/
		$row=$obj->fetch();
		if(!$row){
			echo '{"result":0, "message": "Student not found"}';

		}
		else{
			echo '{"result":1, "student":';
			echo json_encode($row);
			echo '}';
		}
	}
	/**
	*Server side AJAX function that updates a student record 
	*@return a JSON object containing the success of the request and a message
	*/
	function updateStudent(){
		//checks if sid, weight, height and bloodType are set
		if((!isset($_REQUEST['sid']))&&(!isset($_REQUEST['weight']))&&(!isset($_REQUEST['height']))&&(!isset($_REQUEST['bloodType']))){
			//echoes a JSON object with the error message
			echo '{"result": 0, "message": "Updated information not provided"}';
			exit();
			
		}
		//include students class
		include_once("students.php");
		/**
			*@var string $sid should contain requested sid
			*@var string $weight should contain requested weight
			*@var string $height should contain requested weight
			*@var string $bloodType should contain requested weight
		*/
		$sid = $_REQUEST['sid'];
		$weight = $_REQUEST['weight'];
		$height = $_REQUEST['height'];
		$bloodType = $_REQUEST['bloodType'];
		/**
			*@var string $obj, an object of the student class
		*/
		$obj = new students();
		/**
			*@var string $result containing the result of the executed query
		*/
		$result=$obj->updateStudentRecord($sid, $weight, $height, $bloodType);
		
		if($result==false){
			echo '{"result": 0, "message" :"error updating user"}';
			exit();
		}
		else{
			echo '{"result": 1, "message": "Student record updated"}';
		}
	}
		
	


function viewStudentInfo(){

	include_once("students.php");
	//check if there is a user code
	if(!isset($_REQUEST['uc'])){
		echo '{"result":0,"message":"User code not provided"}';
		return;
	}

	$usercode=$_REQUEST["uc"];
	//create an object of users
	$obj=new students();
	// call get user method
	$result=$obj->getStudentByID($usercode);
	if($result==false){
		echo'{"result":0,"message":"could not find user "}';
		return;
	}

	$row = $obj->fetch();
	if($row==false){
		echo '{"result":0,"message":"could not get user information"}';
		return;
	}

	echo '{"result":1,"user":';
		echo json_encode($row);
	echo "}";

}



?>
