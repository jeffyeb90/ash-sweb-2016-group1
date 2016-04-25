<?php

if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1:
	searchStudent();
  break;
	case 2:
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
		exit();
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
