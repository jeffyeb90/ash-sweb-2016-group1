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
		<section class="medical-history">					<div id="divContent">
						<h3>Chart showing frequency of diseses occuring</h3>
						<canvas id="myCanvas" width="1000" height="1000"></canvas>
              <?php
                include_once("medicalComplaint.php");
                $obj=new medicalComplaint;
                $row=$obj->diseaseFrequency();
                $row=$obj->fetch();
								$i=50;
								$y=50;
								$q=60;
								$a=90;
								$var=0;
				        		while($row==true){
											$x=$q+(50*$row['count(DIAGNOSIS)']);
                      echo "
									    <script>
											var c = document.getElementById('myCanvas');
											var ctx = c.getContext('2d');
											ctx.moveTo(50,0);
											ctx.lineTo(50,(50*{$row['count(DIAGNOSIS)']})-50);
											var value=(50*{$row['count(DIAGNOSIS)']})-50;
											ctx.stroke();
												var c = document.getElementById('myCanvas');
												var ctx = c.getContext('2d');
												ctx.font = '15px Arial';
												ctx.fillStyle = 'black';
												ctx.fillText('{$row['NAME']} ({$row['count(DIAGNOSIS)']} students)',$x,$a);

									      var canvas = document.getElementById('myCanvas');
									      var context = canvas.getContext('2d');
									      context.beginPath();
									      context.rect($i, $y, 50*{$row['count(DIAGNOSIS)']}, 50);
									      context.fillStyle = 'orange';
									      context.fill();
									      context.lineWidth = 2;
									      context.strokeStyle = 'black';
									      context.stroke();
									    </script>

											"
                      ;

											$a=$a+50;
											$y=$y+50;
											$row=$obj->fetch();
				        	}
									$v=50;
									$q=0;
									echo "a=$a";
									while($q<20){
									echo "<script>
									var c = document.getElementById('myCanvas');
									var ctx = c.getContext('2d');
									ctx.moveTo(50,$a-40);
									ctx.lineTo(1000,$a-40);
									ctx.fillStyle = 'black';

									ctx.stroke();
									var c = document.getElementById('myCanvas');
									var ctx = c.getContext('2d');
									ctx.font = '15px Arial';
									ctx.fillText('$q',$v,$a);
									</script>";
									$q=$q+1;
									$v=$v+50;
								}
               ?>

					</div>
				</td>
			</tr>
		</table>
	</section>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>