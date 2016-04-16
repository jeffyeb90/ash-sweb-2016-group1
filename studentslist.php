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
					table.innerHTML="No result found";
      		//divStatus.append=obj.message;
      	}
      	else{
					divStatus.innerHTML='Display Students';
var result="";
					var length=obj.user.length;
					console.log(obj.user);
					console.log(length);
					result+="<div style='overflow-x:auto;'><table class='center' id='table'><tr><th>ID</th><th>USER NAME</th><th>FULL NAME</th><th>GENDER</th><th>PHONE NUMBER</th><th>HEIGHT</th><th>WEIGHT</th><th>BLOOD TYPE</th><th>EMERGENCY CONTACT</th><th>CONTROLS</th></tr>"
					while(length>0){
						result+="<tr bgcolor='$bgcolor' style='$style'><td>"+obj.user[length-1].STUDENTID+"</td><td>"+obj.user[length-1].USERNAME+"</td><td>"+obj.user[length-1].FIRSTNAME +" "+obj.user[length-1].LASTNAME+"</td><td>"+obj.user[length-1].GENDER+"</td> <td>"+obj.user[length-1].PHONENUMBER+"</td><td>"+
						obj.user[length-1].HEIGHT+"</td><td>"+obj.user[length-1].WEIGHT+"</td><td>"+obj.user[length-1].BLOODTYPE+"</td><td>"+obj.user[length-1].CONTACTFIRSTNAME +" "+obj.user[length-1].CONTACTLASTNAME+"</td><td><a  href='editStudentRecord.php?studentID="+obj.user[length-1].STUDENTID+"' class='button'>Update</a><br><a href='viewStudentComplaints.php?sid="+obj.user[length-1].STUDENTID+
						"'class='button'>View</a><br><a href='medicalComplaintAdd.php?sid="+obj.user[length-1].STUDENTID+"' class='button'>Add Medical Complaint</a><br></td></tr>";
						length-=1;
						console.log(length);
					}
					table.innerHTML=result;
      	}


      }
		window.onload= searchStudentInfo;
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
              <input onkeyup="searchStudentInfo()"id="search" type="text" name="txtSearch">
              <span onclick="searchStudentInfo()" value="search" class="button">SEARCH</ispan>
            </div>
          </form>
			</span></div>
		</div>
		<section class="medical-history">






<?php


echo "<div style='overflow-x:auto;'><table class='center' id='table'>
<tr><th>ID</th><th>USER NAME</th><th>FULL NAME</th><th>GENDER</th><th>PHONE NUMBER</th><th>HEIGHT</th><th>WEIGHT</th><th>BLOOD TYPE</th><th>EMERGENCY CONTACT</th><th>CONTROLS</th></tr>";


echo "</table>";
?>
</div>
</section>

</body>
</html>
