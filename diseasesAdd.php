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


            <ul class="menu">
                <li><a href="studentslist.php">HOME</a></li>
								<li><a class="dropdown-button"  data-activates="dropdown1">COMPLAINTS</a>
                <ul id="dropdown1" class="dropdown-content">
    							<li><a href="medicalComplaintAdd.php">Add </a></li>

    							<li><a href="medicalComplaintList.php">View </a></li>

    							<li><a href="editComplaints.php">Edit </a></li>
    						</ul>
                </li>
								<li><a class="dropdown-button2"  data-activates="dropdown2">STUDENT RECORDS</a>
                <ul id="dropdown2" class="dropdown-content">
    							<li><a href="studentslist.php">View </a></li>
    							<li class="divider"></li>
    							<li><a href="editStudentRecord.php">Edit </a></li>
    						</ul>
                </li>
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

			$strStatusMessage ="Add disease";
			$name="";

			if(isset($_REQUEST['name'])){
				$name=$_REQUEST['name'];

				include_once("diseases.php");
				$obj=new diseases();
				$r=$obj->addDisease($name);

				if($r==false){
					$strStatusMessage="Error while adding disease";
				}else{
					$strStatusMessage="Disease added";
				}

			}
?>
					<div class= "position" class="status">
						<?php echo  "<h1>$strStatusMessage<h1>" ?>


						<form action="" method="GET">
			<div> Disease: <input type="text" name="name" value="<?php echo $name;  ?>"/></div>

			<br><input class="DiseaseAdd" value="ADD">
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
