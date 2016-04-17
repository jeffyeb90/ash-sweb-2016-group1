<?php
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
				<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
      	<script type="text/javascript">


				</script>
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
					$strStatusMessage="Display Medical Complaints";

					if(isset($_REQUEST['message'])){
						$strStatusMessage=$_REQUEST['message'];
					}

	?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>

          <div class="row">

            <form action="" method="GET">
              <div class="input-field">
                <input id="search" type="text" name="txtSearch">
                <input type="submit" value="search" class="button"></input>

              </div>
            </form>
      			</span></div>
      		</div>
		<section class="medical-history">




<?php
	include_once("medicalComplaint.php");

	$complaint = new medicalComplaint();
  if(isset($_REQUEST['txtSearch'])){
    $result=$complaint->searchComplaints($_REQUEST['txtSearch']);
  }else{
    $result=$complaint->getComplaints();
  }


	if($result==false){
		echo "Error getting Medical Complaints.";
		exit();
	}

	echo "<table class='center'>
		<tr><th>COMPLAINT ID</th><th>STUDENT ID</th><th>DATE</th><th>TEMPERATURE</th><th>SYMPTOMS</th><th>DIAGNOSIS</th><th>CAUSE<th>PRESCRIPTION</th><th>NURSE</th><tr>";
		// $counter=1;
		// $bgcolor ="";
		// $style="";
	while($row=$complaint->fetch()){


		// if($counter%2==0){
		// 	$bgcolor="Coral";
		// 	$style='color:black';
		// }
		// else{
		// 	$bgcolor = "PapayaWhip";
		// 	$style='color:black';
		// }



		echo "<tr >
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




	}
	echo "</table>
	";

?>

</section>
</body>
</html>
