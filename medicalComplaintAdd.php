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
					$strStatusMessage="Add Medical Complaint";

					if(isset($_REQUEST['message'])){
						$strStatusMessage=$_REQUEST['message'];
					}

	?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>


		<section class="medical-history">




					<form  action="" method="GET">
        <div class="position">
              <div>
							Student ID: <br><input class="text" type="text" name="studentID" value="<?php if(!isset($_REQUEST['sid'])){}
							else{echo $_REQUEST['sid'];}?>">
</div>
						<div>
							<br>Date of Attendance: <br><input class="date1" type="date" name="date">
						</div>
						<div>
							Temperature: <br><input class="number" type="number" name="temp" step="0.01" min="20" max="50" value="37">°C
						</div>
						<div>

							Symptoms: <br><input class="text" type="text" name="symptoms">
						</div>
						Diagnosis: <br><select class="select1" name="diagnosis">
							<?php

							include_once("diseases.php");
				      	$disease=new diseases();
				      	$result=$disease->getAllDiseases();

				      	$row=$disease->fetch();
				        		while($row==true){
				          		echo "<option value={$row['DISEASEID']}>{$row['NAME']}</option>";
											$row=$disease->fetch();
				        	}
				      ?>
						</select>

						<div>
							Cause: <br><input class="text" type="text" name="cause">
						</div>
						<div>
							Prescription: <br><input class="text" type="text" name="prescription">
						</div>
						<div>
							Nurse ID: <br><input class="text" type="text" name="nurseID">
						</div><br>


							<input class="submit" type="submit" value="Add" >
</div>
					</form>



			</section>

	</body>
</html>
<?php
  include_once("medicalComplaint.php");
  $complaint=new medicalComplaint();
  if(!isset($_REQUEST['studentID'])){
    exit();
  }
  else{
    $studentID=$_REQUEST['studentID'];
    $date=$_REQUEST['date'];
    $temp=$_REQUEST['temp'];
    $symptoms=$_REQUEST['symptoms'];
    $diagnosis=$_REQUEST['diagnosis'];
    $cause=$_REQUEST['cause'];
    $prescription=$_REQUEST['prescription'];
		$nurseID=$_REQUEST['nurseID'];


    $result=$complaint->addComplaint($studentID, $date, $temp, $symptoms, $diagnosis, $cause, $prescription, $nurseID);
    if($result==false){
      echo "Error";
    }
    else {
      echo "User Added";
    }
  }

?>
