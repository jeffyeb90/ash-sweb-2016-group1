<!DOCTYPE html>
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
			<div class="container">





<?php
	include_once("students.php");
	$student = new students();
	if(isset($_REQUEST['txtSearch'])){
		$result = $student->searchStudents($_REQUEST['txtSearch']);
	}
	else{
		$result = $student->getStudents();
	}
	if($result==false){
		echo "Error getting users.";
		exit();
	}

	echo "<div style='overflow-x:auto;'><table class='center'>
		<tr><th>ID</th><th>USER NAME</th><th>FULL NAME</th><th>GENDER</th><th>PHONE NUMBER</th><th>HEIGHT</th><th>WEIGHT</th><th>BLOOD TYPE</th><th>EMERGENCY CONTACT</th><th>CONTROLS</th></tr>";
	$counter = 1;
	$bgcolor="";
	$style="";

	while ($row=$student->fetch()){
		if($counter%2==0){
			$bgcolor="white";
			$style="color:black";
		}

		else{
			$bgcolor = "#EDEFF4";
			$style="color:black";
		}

		echo "<tr bgcolor='$bgcolor' style='$style'>
		<td>{$row['STUDENTID']}</td>
		<td>{$row['USERNAME']}</td>
		<td>{$row['FIRSTNAME']} {$row["LASTNAME"]}</td>
		<td>{$row['GENDER']}</td>
		<td>{$row['PHONENUMBER']}</td>
		<td>{$row['HEIGHT']}</td>
		<td>{$row['WEIGHT']}</td>
		<td>{$row['BLOODTYPE']}</td>


		<td>{$row['CONTACTFIRSTNAME']} {$row['CONTACTLASTNAME']}</td>
		<td><a href='editStudentRecord.php?studentID={$row['STUDENTID']}' class='button'>Update</a><br>
		<a href='viewStudentComplaints.php?sid={$row['STUDENTID']}' class='button'>View</a><br>
		<a href='medicalComplaintAdd.php?sid={$row['STUDENTID']}' class='button'>Add Medical Complaint</a><br>
		</td>
		</tr>";

		$counter++;
	}

	echo "</table></div>
	";
?>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</section>

</body>
</html>
