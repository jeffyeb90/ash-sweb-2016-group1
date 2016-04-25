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