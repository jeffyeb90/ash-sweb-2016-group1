<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ashesi | Student Medical Details</title>
				<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
			  <link rel="stylesheet" href="style.css"/>

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
<?php
	$strStatusMessage ="Edit Student Record";
	include_once("students.php");
	 $obj=new students();
	$studentID = $_REQUEST["studentID"];

	$result =$obj->getStudentByID($studentID);
	if(!$result){
		echo "Error getting data.";
		exit();

	}
	$row =$obj->fetch();


?>
					<div id="position" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div class="position">

						<form action="update.php" method="GET">
						<input type="hidden" name="studentID" value="<?php echo $row['STUDENTID'] ?>">
						<div>Weight: <input type="text" name="weight" value="<?php echo $row['WEIGHT'] ?>";/></div>
						<div>Height: <input type="text" name="height" value="<?php echo $row['HEIGHT'] ?>"/>


						<div>Blood Type:
							<select name="bloodtype">
								 <?php
									echo "hello";
									$groupA="";
									$groupB="";
									$groupAB="";
									$groupO="";

									if($row['BLOODTYPE']=='A'){
										$groupA="selected";

									}
									else if($row['BLOODTYPE']=='B'){
										$groupB="selected";

									}
									else if($row['BLOODTYPE']=='AB'){
										$groupAB="selected";

									}
									else{

										$groupO="selected";

									}



								?>
                   				 <option <?php echo $groupA ?> value =A>A</option>
                   				 <option <?php echo $groupB ?> value =B>B</option>
                   				 <option <?php echo $groupAB ?> value =AB>AB</option>
                    			<option <?php echo $groupO ?> value =O>O</option>




							</select>
						</div>
						<br><input type="submit" name= "save" value="Update">
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
