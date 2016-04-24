<?php
include_once('medicalComplaint.php');

if(isset($_REQUEST['cmd'])){
    $cmd = $_REQUEST['cmd'];
    
    switch($cmd){
        case 2:
            viewComplaintDetails();
            break;
        default:
            echo "Wrong Command Entered";
            break;
    }
    
}



function viewComplaintDetails(){
    if(!isset($_REQUEST['cid'])){
        echo "No complaint id given.";
        return;
    }
    
    $complaintId = $_REQUEST['cid'];
    $medComplaints = new medicalComplaint();
    $result = $medComplaints->getMedicalComplaint($complaintId);
    
    if($result == true){
        $row = $medComplaints->fetch();
        
        if($row == false){
            echo '{"result": 0, "message": "Error viewing complaint details"}';
            
        }
        else{
            echo '{"result": 1, "complaint":';
            echo json_encode($row);
            echo '}';
        }
    }
}

?>