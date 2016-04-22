	<?php
	/**
	*@author Efua Bainson, Makafui Fie and Andrew Abbeyquaye
	*starting the session and authenticating
	*/
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


					function saveComplaint(cid){

						var theUrl="medicalComplaintAjax.php?&cmd=1&cid="+cid+"&sid="+$("#studentID").val()+"&date="+$("#date").val()+"&temp="+$("#temperature").val()+"&sympt="+$("#symptoms").val()+"&diag="+$("#diagnosis option:selected").val()+"&cause="+$("#cause").val()+"&presc="+$("#prescription").val()+"&nid="+$("#nurseID").val();
						//prompt("theUrl",theUrl);
				 		$.ajax(theUrl,
				 		{
				 			async:true,complete:saveComplaintComplete
				 		});
						divStatus.innerHTML="Complaint saved";
						//console.log($("#txtName").val());
						//currentObject.innerHTML=$("#txtName").val();
						document.getElementById('myModal').style.display="none";

					}
						var select="";
					function saveComplaintComplete(xhr,status){
						if(status!="success"){
							divStatus.innerHTML="error while updating page";
							return;
						}

						var obj=$.parseJSON(xhr.responseText);
						if(obj.result==0){
							divStatus.innerHTML=obj.message;
						}
						else{
							divStatus.innerHTML="Display Complaints";


							var lengthOfDisease=obj.disease.length;
							console.log(lengthOfDisease);

							while(lengthOfDisease>0){
								var selected="";
								select+="<option value="+obj.disease[lengthOfDisease-1].DISEASEID+">"+obj.disease[lengthOfDisease-1].NAME+"</option>";
								lengthOfDisease-=1;
							}

							var result="";
							var length=obj.complaint.length;

							result+="<div style='overflow-x:auto;'><table class='center' id='table' ><tr><th>COMPLAINTID</th><th>STUDENT ID</th><th>DATE</th><th>TEMPERATURE</th><th>SYMPTOMS</th><th>DIAGNOSIS</th><th>CAUSE<th>PRESCRIPTION</th><th>NURSE</th><th>CONTROLS</th><tr>"
							while(length>0){

								result+="<tr bgcolor='$bgcolor' style='$style'><td>"+obj.complaint[length-1].COMPLAINTID+"</td><td>"+obj.complaint[length-1].STUDENTID+"</td><td>"+obj.complaint[length-1].DATE +"</td><td> "+obj.complaint[length-1].TEMPERATURE+"</td><td>"+obj.complaint[length-1].SYMPTOMS+"</td> <td>"+obj.complaint[length-1].NAME+"</td><td>"+
								obj.complaint[length-1].CAUSE+"</td><td>"+obj.complaint[length-1].PRESCRIPTION+"</td><td>"+obj.complaint[length-1].FIRSTNAME +" "+obj.complaint[length-1].LASTNAME+"</td><td><span onclick='editName("+obj.complaint[length-1].COMPLAINTID+","+obj.complaint[length-1].STUDENTID+",&apos;"+obj.complaint[length-1].DATE
								+"&apos;,"+obj.complaint[length-1].TEMPERATURE+",&apos;"+obj.complaint[length-1].SYMPTOMS+"&apos;,&apos;"+obj.complaint[length-1].NAME+"&apos;,"+obj.complaint[length-1].DISEASEID+",&apos;"+obj.complaint[length-1].CAUSE+"&apos;,&apos;"+obj.complaint[length-1].PRESCRIPTION+"&apos;,"+obj.complaint[length-1].NURSEID+")'id='myBtn' >UPDATE</span><br><span><a href='viewComplaintDetails.php?cid="+obj.complaint[length-1].COMPLAINTID+"'>View Details</a></span>	</td></tr>";
								length-=1;

							}
							table.innerHTML=result;

						}


					}


					function editName(cid,sid,date,temp,symptoms,name,diagnosisId,cause,presc,nid){
					//	var currentName=obj.innerHTML;


						$("body").append("<div id='myModal' class='modal'><div class='modal-content'><span class='close'>×</span><b>UPDATE MEDICAL COMPLAINT</b><div class='position'><form action='' method='GET'><input type='hidden' name='complaintID' value="+cid+"><div>Student ID: <br><input id='studentID' type='text' class='text' value="+sid+"></div><div>Date: <br><input  class='date1' type='date' id='date' value="+date+"></div><div>Temperature: <br><input class='number' type='text' id='temperature' value="+temp+" ></div>	<div>Symptoms: <br><input class='text' type='text' id='symptoms' value="+symptoms+"></div><div>Diagnosis: <br><select class='select1' name='selector' id='diagnosis'>"+select+"</select></div><div>Cause: <br><input class='text' type='text' id='cause' value="+cause+"></div><div>Prescription: <br><input class='text' type='text' id='prescription' value="+presc+"></div><div>Nurse ID: <br><input class='text' type='text' id='nurseID' value="+nid+"></div>	<input  class='submit' type='submit' name= 'save' value='Update' onclick='saveComplaint("+cid+")'></div></form></div></div></div>");
						document.getElementById('myModal').style.display="block";

						var modal = document.getElementById('myModal');
						window.onclick = function(event) {
						    if (event.target == modal) {
						        modal.style.display = "none";
						    }
						}
						var span = document.getElementsByClassName("close")[0];
						span.onclick = function() {
						    modal.style.display = "none";
						}

				}





				window.onload= saveComplaint;
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
		echo "<table class='center' id='table'>";


		echo "</table>";


	?>

	</section>
	</body>
	</html>
