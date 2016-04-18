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


				function saveComplaint(cid,sid,date,temp,symptoms,name,cause,presc,nid){
					//		console.log(recordID);
					var theUrl="medicalComplaintAjax.php?uc="+cid+"&sid="+$("#studentID").val()+"&date="+$("#date").val()+"&temp="+$("#temperature").val()+"&sympt="+$("#symptoms").val()+"&diag="+$("#diagnosis").val();
			 		$.ajax(theUrl,
			 		{
			 			async:true,complete:saveComplaintComplete
			 		});
					divStatus.innerHTML="Name saved";
					//console.log($("#txtName").val());
					currentObject.innerHTML=$("#txtName").val();





				}
				function saveComplaintComplete(xhr,status){
					if(status!="success"){
						divStatus.innerHTML="error while updating page";
						return;
					}
					//console.log(xhr.responseText);
					var obj=$.parseJSON(xhr.responseText);
					if(obj.result==0){
						divStatus.innerHTML=obj.message;
					}
					else{
						divStatus.innerHTML="name has been changed";
					}

				}
				function editName(cid,sid,date,temp,symptoms,name,cause,presc,nid){
				//	var currentName=obj.innerHTML;


					$("body").append("<span id='myBtn'></span><div id='myModal' class='modal'><div class='modal-content'><span class='close'>×</span><b>UPDATE MEDICAL COMPLAINT</b><div class='position'><form action='' method='GET'><input type='hidden' name='complaintID' value="+cid+"><div>Student ID: <input id='studentID' type='text' class='text' value="+sid+"</div><div>Date: <input  class='date1' type='date' id='date' value="+date+"></div><div>Temperature: <input class='number' type='text' id='temperature' value="+temp+" ></div>	<div>Symptoms: <input class='text' type='text' id='symptoms' value="+symptoms+"></div><div>Diagnosis: <select class='browser-default' id='diagnosis'><option value='name' </option>"+name+"</select></div><div>Cause: <input class='text' type='text' name='cause' value="+cause+"></div><div>Prescription: <input class='text' type='text' name='prescription' value="+presc+"></div><div>Nurse ID: <input class='text' type='text' name='nurseID' value="+nid+"></div>	<input  class='submit' type='submit' name= 'save' value='Update' onclick='saveComplaint("+cid+","+date+","+temp+","+symptoms+","+name+","+cause+",	"+presc+","+nid+")'></div></form></div></div></div>");

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

	while($row=$complaint->fetch()){

	$symptoms = str_replace(',', ' and', $row['SYMPTOMS'] );

	$cause = str_replace( ',', ' and ', $row['CAUSE'] );
	//ECHO $symptoms;
	$prescription = str_replace( ',', ' and', $row['PRESCRIPTION'] );
		echo "<tr>
		<td>{$row['COMPLAINTID']}</td>
		<td>{$row['STUDENTID']}</td>
		<td>{$row['DATE']}</td>
		<td>{$row['TEMPERATURE']}</td>
		<td>{$row['SYMPTOMS']}</td>
		<td>{$row['NAME']}</td>
		<td>{$row['CAUSE']}</td>
		<td>{$row['PRESCRIPTION']}</td>
		<td>{$row['FIRSTNAME']} {$row['LASTNAME']}</td>

		<td>";?>
		<span
		 onclick='editName(<?php echo $row['COMPLAINTID']?>,<?php echo $row['STUDENTID']?>,
		 <?php echo '"'.$row['DATE'].'"'?>,<?php echo $row['TEMPERATURE'] ?>,
		 <?php echo '"'.$symptoms.'"' ?>,
		 <?php echo'"'.$row['NAME'].'"' ?>,
		 <?php echo '"'.$cause.'"' ?>,<?php echo '"'.$prescription.'"' ?>,<?php echo '"'.$row['FIRSTNAME'].'"' ?>)'  id='myBtn' > UPDATE </span>
<?php

echo "<span><a href='editComplaints.php?complaintID={$row['COMPLAINTID']}'>Update</a></span>
<span><a href='viewComplaintDetails.php?cid={$row['COMPLAINTID']}'>View Details</a></span>
</td></tr>";

	}
	echo "</table>
	";

?>

</section>
</body>
</html>
