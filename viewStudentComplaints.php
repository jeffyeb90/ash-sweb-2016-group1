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



								<li class="dropdown" id="complaints"><a  class="dropdown-button">COMPLAINTS</a>
                <ul class="dropdown-content">
    							<li><a href="medicalComplaintAdd.php">Add </a></li>

    							<li><a href="medicalComplaintList.php">View </a></li>


    						</ul>

                </li>
			        <li class="dropdown" id="records"><a class="dropdown-button2" >STUDENT RECORDS</a>
                  <ul class="dropdown-content2">
                      <li><a href="studentslist.php">View </a></li>

                  </ul>

                </li>
								<li><a href="generateReport.php">GET REPORT</a></li>
                <li><a href="medicalComplaintAdd.php" class="btn">NEW COMPLAINT</a></li>
                <li><a href='logout.php' class='btn'>Logout</a><li>
                <li><img src="images/profie.jpg" alt="" class="profile-pic"><br>
                  <?php


                $id=$_SESSION['USER'];
                echo $id['FIRSTNAME']." " .$id['LASTNAME'];
                ?></li>
            </ul>
        </div>


					<?php
					$strStatusMessage="Display Student Complaints";

					if(isset($_REQUEST['message'])){
						$strStatusMessage=$_REQUEST['message'];
					}

	?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>

		<div class="row">
			  <div class="col s3 offset-s9"><span class="flow-text">

			</span></div>
		</div>

					<div class="divContent">
<!--					    Content Space-->

					    <?php
                        //Request the sid and if it isn't available say so
                        if(!isset($_REQUEST['sid'])){
                            echo "No user to show";
                            return;
                        }


                        //Function to check if a given number is even
                        function isEven($num) {
                            return $num % 2 == 0;
                        }


                        include_once("medicalComplaint.php");
                        $obj = new medicalComplaint();

                        $student_id = $_REQUEST['sid'];
                        $filter = "students.STUDENTID = $student_id";
                        $result = $obj->getAllMedicalComplaints($filter);
                        $row = $obj->fetch();

                        if($row <= 0){
                            echo "User doesn't exist";
                        }
                        else{
                            //$row = $obj->fetch();
                            //var_dump($result);

                            echo "	<div class='student-desc'>
											            <img class='student-photo' src='images/{$row['IMAGE']}' alt='Student image'>
											            <ul class='student-info'>
														";
                            echo "<li><p>Name: {$row['FIRSTNAME']} {$row['LASTNAME']}</p></li>";
                            echo "<li><p>Student ID: {$row['STUDENTID']}</p></li>";
                            echo "<li><p>Email: {$row['EMAIL']}


														<a href='mailto:{$row['EMAIL']}?Subject=Notification%20from%20Clinic' target='_top'  class='btn'>Send Mail</a></p></li>";

                            echo "<li><p>Phone: {$row['PHONENUMBER']}</p></li></ul></div>
														<section class='medical-history'>";


                            if($row['COMPLAINTID'] == NULL){
                                echo "<h2 style='text-align: center'>No Medical History</h2>";
                                return;
                            }
                            else{

                                $rowNum = 1;
                                while($row){
                                    echo "<div class='complaint'>";
                                    echo "<ul class='a-list'>";
                                    echo "<li><p>Complaint ID: {$row['COMPLAINTID']}</p></li>";
                                    echo "<li><p>Date:{$row['DATE']}</p></li>";
                                    echo "<li><p>{$row['TEMPERATURE']}</p></li></ul>";
                                    echo "<ul class='b-list'>";
                                    echo "<li><p>Symptoms: {$row['SYMPTOMS']}</p></li>";
                                    echo "<li><p>Diagnosis: {$row['DIAGNOSIS']}</p></li>";
                                    echo "<li><p>{$row['CAUSE']}</p></li>";
                                    echo "<li><p>{$row['PRESCRIPTION']}</p></li>
                                    <li><p><a href='viewComplaintDetails.php?cid={$row['COMPLAINTID']}' class='btn'>View Details</a></p></li></ul></div>";

                                    $row = $obj->fetch();
                                    $rowNum++;
                                }

                            }
                        }


                        ?>
					</div>
  </section>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

	</body>
</html>
