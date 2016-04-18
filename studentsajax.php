<?php

if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1:
	searchStudent();
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
    echo '{"result":0,"message":"error searching for name"}';
  }else{
  echo '{"result":1,"user":';
  echo json_encode($result);
  echo "}";
}
}


}



?>
