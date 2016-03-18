<html>
	<head>
		<title>View Student's Medical Records</title>
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
					
					<div class="divContent">
<!--					    Content Space-->
					    
					    <?php
                        
                        if(!isset($_REQUEST['sid'])){
                            echo "No user to show";
                            return;
                        }
                        
                        function isEven($num) {
                            return $num % 2 == 0;
                        }
                        
                        include_once("medicalComplaint.php");
                        $obj = new medicalComplaint();
                        
                        $student_id = $_REQUEST['sid'];
                        $filter = "students.STUDENTID = $student_id";
                        $result = $obj->getAllMedicalComplaints($filter);
                        
                        if($result == false){
                            echo "User doesn't exist";
                        }
                        else{
                            $row = $obj->fetch();
                            //var_dump($row);
                            echo "<p>Name: {$row['FIRSTNAME']} {$row['LASTNAME']}</p>";
                            echo "<p>Student ID: {$row['STUDENTID']}</p>";
                            echo "<p>Email: {$row['EMAIL']}</p>";
                            echo "<p>Phone: {$row['PHONENUMBER']}</p>";
                            
                            
                            if($row['COMPLAINTID'] == NULL){
                                return;
                            }
                            else{
                                echo "<body><table class='usertable'>";
                                echo "<tr class='heading'><td>Complaint ID</td><td>Full Name</td><td>Date</td><td>Temperature</td><td>Symptoms</td><td>Diagnosis</td><td>Cause</td><td>Prescription</td></tr>";
                                $rowNum = 1;
                                while($row){
                                    echo "<tr";
                                    if(isEven($rowNum))
                                            echo " class = 'alternate' ";
                                    echo "><td>{$row['COMPLAINTID']}</td>";
                                    echo "<td>{$row['FIRSTNAME']} {$row['LASTNAME']}</td>";
                                    echo "<td>{$row['DATE']}</td>";
                                    echo "<td>{$row['TEMPERATURE']}</td>";
                                    echo "<td>{$row['SYMPTOMS']}</td>";
                                    echo "<td>{$row['DIAGNOSIS']}</td>";
                                    echo "<td>{$row['CAUSE']}</td>";
                                    echo "<td>{$row['PRESCRIPTION']}</td>";
                                    echo "</td></tr>";
                                    $row = $obj->fetch();
                                    $rowNum++;
                                }
                                
                            }
                        }
                        
                        
                        ?>
					</div>
					
					
				</td>
			</tr>
		</table>
	</body>
</html>	
