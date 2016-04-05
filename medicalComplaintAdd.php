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
					<div id="divContent">

					<form action="" method="GET">
						<div  class="input-field col s12">
						<div>
							Student ID: <input type="text" name="studentID" value="<?php if(!isset($_REQUEST['sid'])){}
							else{echo $_REQUEST['sid'];}?>">
						</div>
						<div>
							Date of Attendance: <input type="date" name="date">
						</div>
						<div>
							Temperature: <input type="number" name="temp" step="0.01" min="20" max="50" value="37">°C
						</div>
						<div>

							Symptoms: <input type="text" name="symptoms">
						</div>
						Diagnosis: <select class="browser-default" name="diagnosis">
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
							Cause: <input type="text" name="cause">
						</div>
						<div>
							prescription: <input type="text" name="prescription">
						</div>
						<div>
							Nurse ID: <input type="text" name="nurseID">
						</div>
						<div>
							<input type="submit" value="Add">
						</div>
					</form>

					</div>
			</div>
	</div>
			</section>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>

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
