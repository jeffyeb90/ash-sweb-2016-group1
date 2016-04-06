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
          <?php

                //initialize
  include_once("students.php");
  /**
  *@author Jeffrey Takyi-Yeboah

  */
if(isset($_REQUEST['studentID'])){
	$studentID=$_REQUEST['studentID'];
	$weight=$_REQUEST['weight'];
	$height = $_REQUEST['height'];
	$bloodtype=$_REQUEST['bloodtype'];

	 $obj=new students();
	 $r=$obj->addNewStudentRecord($studentID,$weight,$height,$bloodtype);

		 if($r==false){
		 echo "Error adding student information";
		}else{
		 echo" Student with ID $studentID added";
				echo'<script> window.location.href="studentslist.php";</script>';
				}
			}





		/**else if(isset($_REQUEST['studentID'])){
			    $studentID=$_REQUEST['studentID'];
			    $weight=$_REQUEST['weight'];
			    $height = $_REQUEST['height'];
			    $bloodtype=$_REQUEST['bloodtype'];
		      //$add = $_REQUEST['add'];

					 $obj=new students();
			     $r=$obj->addStudentRecord($studentID,$weight,$height,$bloodtype);


			       if($r==false){
							 echo "<h4 style='text-align: left'>Failed to add Student</h4>";
						 }
							else{
			       echo" Student with ID $studentID added";
						 //header("Location :studentslist.php");
						 	echo'<script> window.location.href="studentslist.php";</script>';
			        }

						}*/


          ?>

          <div class= "position" class="status">
                
                      <form action="addStudent.php" method="GET">

                  <div>StudentID: <input type="text" name="studentID" value="<?php if(!isset($_REQUEST['add'])){}
									else{echo $_REQUEST['add'];}?>"></div>
                  <div>Height (cm): <input type="text" name="height" value=""/>
                  <div>Weight (kg): <input type="text" name="weight" value=""/>
                  <div>Bloodtype: <select name="bloodtype">
                    <option value =A>A</option>
                    <option value =B>B</option>
                    <option value =AB>AB</option>
                    <option value =O>O</option>

          </select>
            </div>
            <div>
                  <input type="submit" name="submit" value="Add">
                      </form>
                    </div>
                  </table>
                  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
                  <script type="text/javascript" src="js/materialize.min.js"></script>
                </section>
                </body>
              </html>
