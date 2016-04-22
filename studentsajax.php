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
  }else{
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
function getStudentByID(){
	if(!isset($_REQUEST['sid'])){
		echo '{"result": 0, "message": "Student ID not provided"}';
		exit();
	}
	$sid = $_REQUEST['sid'];
	include_once("students.php");

	$obj = new students();
	$result = $obj->getStudentByID($sid);
	if(!$result){
		echo '{"result":0, "mesage": "error getting student information"}';
		exit();
	}
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

	function updateStudent(){
		if((!isset($_REQUEST['sid']))&&(!isset($_REQUEST['weight']))&&(!isset($_REQUEST['height']))&&(!isset($_REQUEST['bloodType']))){
			echo '{"result": 0, "message": "Updated information not provided"}';
			exit();
			
		}
		include_once("students.php");
		$sid = $_REQUEST['sid'];
		$weight = $_REQUEST['weight'];
		$height = $_REQUEST['height'];
		$bloodType = $_REQUEST['bloodType'];
		
		$obj = new students();
		$result=$obj->updateStudentRecord($sid, $weight, $height, $bloodType);
		
		if($result==false){
			echo '{"result": 0, "message" :"error updating user"}';
			exit();
		}
		else{
			echo '{"result": 1, "message": "Student record updated"}';
		}
		}
		
	




?>
