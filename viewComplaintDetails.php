
<?php
	error_reporting(0);
session_start();
if(!isset($_SESSION['USER'])){

	header("location:login.php");
	exit();
}

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ashesi | Student Medical Details</title>
			  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- Loading Flat UI -->
        <link href="css/style.css" rel="stylesheet">
        <!-- 	Web Browser thumbnail image -->
        <link rel="shortcut icon" href="#">
    </head>


    <body>
        <div class="navigation">
                <img src="images/logo.jpg" alt="" class="logo">
                    <ul class="menu">
                        <li><a href="studentslist.php">HOME</a></li>

                        <li class="dropdown active" id="complaints"><a  class="dropdown-button">COMPLAINTS</a>
                            <ul class="dropdown-content">
            				    <li><a href="medicalComplaintAdd.php">ADD </a></li>

            					<li><a href="medicalComplaintList.php">VIEW </a></li>


            				</ul>

                        </li>
        			    <li class="dropdown" id="records"><a class="dropdown-button2" >STUDENT RECORDS</a>
                            <ul class="dropdown-content2">
                                <li><a href="studentslist.php">VIEW </a></li>


                            </ul>

                        </li>
        				<li><a href="generateReport.php">GET REPORT</a></li>
                        <li><a href="medicalComplaintAdd.php" class="btn">NEW COMPLAINT</a></li>
                        
                        <li class="dropdown pic-dropdown" id="records"><a href=""><img src="images/profie.jpg" alt="" class="profile-pic"></a>
                            <ul class="dropdown-content2 logout-dropdown">
                               <li><a href='logout.php' class='btn'>Logout <?php
                                $id=$_SESSION['USER'];
                                echo "<p class='username'>".$id['FIRSTNAME']."</p>";
                            ?></a></li>
                            </ul>
                            
                        </li>
                    </ul>
                </div>

					<?php
					$strStatusMessage="Display Users";

					if(isset($_REQUEST['message'])){
						$strStatusMessage=$_REQUEST['message'];
					}

	?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>


		<section class="medical-history">
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

  </section>
	</body>
</html>
