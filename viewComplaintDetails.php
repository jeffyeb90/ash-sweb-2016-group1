<html>
	<head>
		<title>View Medical Complaint Details</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
		</script>
	</head>
	
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>		
					</div>
					<div id="divStatus" class="status">status message
					</div>
					<img src="" alt="">
					<div class="divContent">
					<?php
                        //Request the sid and if it isn't available say so
                        if(!isset($_REQUEST['cid'])){
                            echo "No complaint to show";
                            return;
                        }
                        
                        
                        //Function to check if a given number is even
                        function isEven($num) {
                            return $num % 2 == 0;
                        }
                        
                        
                        include_once("medicalComplaint.php");
                        $obj = new medicalComplaint();
                        
                        $complaint_id = $_REQUEST['cid'];
                        $result = $obj->getMedicalComplaint($complaint_id);
                        $row = $obj->fetch();
                        
                        if($row <= 0){
                            echo "Complaint doesn't exist";
                        }
                        else{                            
                            while($row){
                                echo "<p>Complaint ID: {$row['COMPLAINTID']}</p>";
                                echo "<p>Student ID: {$row['STUDENTID']}</p>";
                                echo "<p>Date: {$row['DATE']}</p>";
                                echo "<p>Temperature: {$row['TEMPERATURE']}</p>";
                                echo "<p>Symptoms: {$row['SYMPTOMS']}</p>";
                                echo "<p>Diagnosis: {$row['DIAGNOSIS']}</p>";
                                echo "<p>Cause: {$row['CAUSE']}</p>";
                                echo "<p>Prescription: {$row['PRESCRIPTION']}</p>";
                                echo "";
                                $row = $obj->fetch();
                            }
                        }
                            
                        ?>					    
					</div>
					
					
				</td>
			</tr>
		</table>
	</body>
</html>	