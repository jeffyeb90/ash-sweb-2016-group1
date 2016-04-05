<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ashesi | Student Medical Details</title>
		

			  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<?php
	$strStatusMessage ="Edit Medical Complaint";
	include_once("medicalComplaint.php");
	 $obj=new medicalComplaint();
	$complaintID = $_REQUEST["complaintID"];

	$result =$obj->getComplaintByID($complaintID);
	if(!$result){
		echo "Error getting data.";
		exit();

	}
	$row =$obj->fetch();


?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div id="divContent">
						Content space
						<form action="updateComplaint.php" method="GET">
						<input type="hidden" name="complaintID" value="<?php echo $row['COMPLAINTID'] ?>">
						<div>Student ID: <input type="text" name="studentID" value="<?php echo $row['STUDENTID'] ?>";/></div>
						<div>Date: <input type="text" name="date" value="<?php echo $row['DATE'] ?>"/>
						<div>Temperature: <input type="text" name="temperature" value="<?php echo $row['TEMPERATURE'] ?>"/>
						<div>Symptoms: <input type="text" name="symptoms" value="<?php echo $row['SYMPTOMS'] ?>"/>
						<div>Diagnosis: <input type="text" name="diagnosis" value="<?php echo $row['DIAGNOSIS'] ?>";/></div>
						<div>Cause: <input type="text" name="cause" value="<?php echo $row['CAUSE'] ?>";/></div>
						<div>Prescription: <input type="text" name="prescription" value="<?php echo $row['PRESCRIPTION'] ?>";/></div>
						<div>Nurse ID: <input type="text" name="nurseID" value="<?php echo $row['NURSEID'] ?>";/></div>

						</div>

						<input type="submit" name= "save" value="Update">
		</form>
					</div>
				</td>
			</tr>
		</table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </section>
	</body>
</html>
