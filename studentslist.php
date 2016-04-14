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

        function searchStudentInfo(){

      		var theUrl="studentsajax.php?cmd=1&txtName="+$("#search").val();

       		$.ajax(theUrl,
       		{
       			async:true,complete:searchStudentInfoComplete
       		});


      	}


      function searchStudentInfoComplete(xhr, status){
      	if(status!="success"){
      		divStatus.innerHTML="error while getting information";
      		return;
      	}
      	var obj=JSON.parse(xhr.responseText);
      	if(obj.result==0){
      		divStatus.innerHTML=obj.message;
      	}
      	else{
      		divStatus.innerHTML=obj.user.FIRSTNAME;
      	}


      }
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
					$strStatusMessage="Display Students";

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
              <span onclick="searchStudentInfo()" value="search" class="button">SEARCH</ispan>
            </div>
          </form>
			</span></div>
		</div>
		<section class="medical-history">






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

echo "</table>";
?>
</div>
</section>

</body>
</html>
