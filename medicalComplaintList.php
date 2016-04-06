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
		
					<?php
					$strStatusMessage="Display Medical Complaints";

					if(isset($_REQUEST['message'])){
						$strStatusMessage=$_REQUEST['message'];
					}



	?>

					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					
<section class="medical-history">
<?php
	include_once("medicalComplaint.php");

	$complaint = new medicalComplaint();

	$result=$complaint->getComplaints();

	if($result==false){
		echo "Error getting Medical Complaints.";
		exit();
	}

	echo "<div style='overflow-x:auto;'><table class='center'>
		<tr><th>COMPLAINT ID</th><th>STUDENT ID</th><th>DATE</th><th>TEMPERATURE</th><th>SYMPTOMS</th><th>DIAGNOSIS</th><th>CAUSE<th>PRESCRIPTION</th><th>NURSE</th><tr>";
		$counter=1;
		$bgcolor ="";
		$style="";
	while($row=$complaint->fetch()){


		if($counter%2==0){
			$bgcolor="white";
			$style="color:black";
		}
		else{
			$bgcolor = "#EDEFF4";
			$style="color:black";
		}



		echo "<tr bgcolor='$bgcolor' style='$style'>
		<td>{$row['COMPLAINTID']}</td>
		<td>{$row['STUDENTID']}</td>
		<td>{$row['DATE']}</td>
		<td>{$row['TEMPERATURE']}</td>
		<td>{$row['SYMPTOMS']}</td>
		<td>{$row['NAME']}</td>
		<td>{$row['CAUSE']}</td>
		<td>{$row['PRESCRIPTION']}</td>
		<td>{$row['FIRSTNAME']} {$row['LASTNAME']}</td>
		<td><a href='editComplaints.php?complaintID={$row['COMPLAINTID']}'>Update</a>
		<a href='viewComplaintDetails.php?cid={$row['COMPLAINTID']}'>View Details</a>
		</td>


		</tr>";

		$counter++;


	}
	echo "</table>
	";

?>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</section>
</body>
</html>
