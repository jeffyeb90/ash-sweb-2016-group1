<?php
/**
*@author Efua Bainson and Andrew Abbeyquaye
*@method string updateComplaint()
*@method void viewComplaintDetails()
*/
if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			updateComplaint();
		break;
		case 2:
				viewComplaintDetails();
				break;

		default:
			echo "wrong command";
		break;
	}
}
/**
*updates a medical complaint
*@return all medical complaints
*/
function updateComplaint(){
	if(!isset($_REQUEST['cid'])){
		echo '{"result":0,"message":"complaint code is not correct"}';
		return;
	}

  $complaintID=$_REQUEST['cid'];
  $studentID=$_REQUEST['sid'];
  $date=$_REQUEST['date'];
  $temperature=$_REQUEST['temp'];
  $symptoms=$_REQUEST['sympt'];
  $diagnosis=$_REQUEST['diag'];
  $cause=$_REQUEST['cause'];
  $prescription=$_REQUEST['presc'];
  $nurseID=$_REQUEST['nid'];

  include_once("medicalComplaint.php");
	$complaint=new medicalComplaint();

  $result=$complaint->updateComplaint($complaintID, $studentID, $temperature, $symptoms, $diagnosis, $cause, $prescription, $nurseID);

  $result=$complaint->getComplaints();
  $row=$complaint->fetch();
  if($row==false){
    echo '{"result":0,"message":"error updating name"}';
	    }
	  else{
      echo '{"result":1,"complaint":[';
    	while($row){
      echo json_encode($row);

    	$row=$complaint->fetch();
			if($row!=false){
				echo ",";
			}
    }
echo "]";
		include_once("diseases.php");
		$disease=new diseases();
		$value=$disease->getAllDiseases();
		$value=$disease->fetch();
		 	echo ',"disease":[';
		while($value){

			echo json_encode($value);

			$value=$disease->fetch();
		if($value!=false){
			echo ",";
		}
		}
		echo "]}";

	}

}


/**
*view complaints details based on the parameter passed in the URL
*@return void
*/
function viewComplaintDetails(){
    if(!isset($_REQUEST['cid'])){
        echo '{"result": 0, "message": "Error viewing complaint details"}';
        $obj = new medicalComplaint();
        $result = $obj->getComplaints();

    }else{
        $complaintId = $_REQUEST['cid'];
        $filter = false;
        if(is_numeric($complaintId))
            $filter = 'COMPLAINTID = ' . $complaintId;

        $obj = new medicalComplaint();
        $result = $obj->getComplaints($filter);
    }




    if($result == true){
        $row = $obj->fetch();

        if($row == false){
            echo '{"result": 0, "message": "Error viewing complaint details"}';

        }
        else{
//            echo '{"result": 1, "complaint":';
//            echo json_encode($row);
//            echo '}';

            echo '{"result":1,"complaint":[';
                while($row){
                    echo json_encode($row);

                    $row=$obj->fetch();
                    if($row!=false){
                        echo ",";
                    }
                }

            echo ']}';
        }


    }
}

?>
