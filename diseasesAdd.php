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
					$strStatusMessage="Add Disease";

					if(isset($_REQUEST['message'])){
						$strStatusMessage=$_REQUEST['message'];
					}

					?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
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
				<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
				</div>
				<div id="divContent">
						Content space
						<form action="" method="GET">
								<div> Disease: <input type="text" name="name" value="<?php echo $name;  ?>"/></div>

									<input type="submit" value="Add">
						</form>
					</div>
				</td>
			</tr>
		</table>
  </section>
	</body>
</html>
