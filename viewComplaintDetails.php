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
						<ul id="dropdown1" class="dropdown-content">
							<li><a href="medicalComplaintAdd.php">Add </a></li>
							<li class="divider"></li>
							<li><a href="medicalComplaintList.php">View </a></li>
							<li class="divider"></li>
							<li><a href="editComplaints.php">Edit </a></li>
						</ul>
						<ul id="dropdown2" class="dropdown-content">
							<li><a href="studentslist.php">View </a></li>
							<li class="divider"></li>
							<li><a href="editStudentRecord.php">Edit </a></li>
						</ul>
            <ul class="menu">
                <li><a href="studentslist.php">HOME</a></li>
								<li><a class="dropdown-button" href="#!" data-activates="dropdown1">COMPLAINTS</a></li>
								<li><a class="dropdown-button" href="#!" data-activates="dropdown2">STUDENT RECORDS</a></li>
								<li><a href="generateReport.php">GET REPORT</a></li>
                <li><a href="medicalComplaintAdd.php" class="btn">NEW COMPLAINT</a></li>
                <li><img src="images/profie.jpg" alt="" class="profile-pic"></li>
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

		<div class="row">
			  <div class="col s3 offset-s9"><span class="flow-text">
      <form action="" method="GET">
        <div class="input-field">
          <input id="search" type="search" name="txtSearch">
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
			</span></div>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </section>
	</body>
</html>
