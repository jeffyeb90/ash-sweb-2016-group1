	<?php
	/**
	*@author Efua Bainson, Makafui Fie and Andrew Abbeyquaye
	*starting the session and authenticating
	*/
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

            <script type="text/javascript" src="js/jquery-1.12.1.js"></script>
	      	<script type="text/javascript">

                function showComplaint(cid, single){
                    var theUrl="medicalComplaintAjax.php?cmd=2&cid="+cid;
                    
                    if(single == true){
                        $.ajax(theUrl,{
                            async:true,complete:showSingleComplaintComplete
                        });
                    }
                    else{
                       $.ajax(theUrl,{
                            async:true,complete:showComplaintComplete
                        }); 
                    }
                    
                    divStatus.innerHTML="Complaint saved";
                    //console.log($("#txtName").val());
                    //currentObject.innerHTML=$("#txtName").val();
                    //document.getElementById('myModal').style.display="none";
                    
                }

				    
				function showComplaintComplete(xhr,status){
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
							var result="";
							var length=obj.complaint.length;

							result+="<div style='overflow-x:auto;'><table class='center' id='table' ><tr><th>COMPLAINTID</th><th>STUDENT ID</th><th>DATE</th><th>TEMPERATURE</th><th>SYMPTOMS</th><th>DIAGNOSIS</th><th>CAUSE<th>PRESCRIPTION</th><th>NURSE</th><th>CONTROLS</th><tr>"
							while(length>0){

								result+="<tr bgcolor='$bgcolor' style='$style'><td>"+obj.complaint[length-1].COMPLAINTID+"</td><td>"+obj.complaint[length-1].STUDENTID+"</td><td>"+obj.complaint[length-1].DATE +"</td><td> "+obj.complaint[length-1].TEMPERATURE+"</td><td>"+obj.complaint[length-1].SYMPTOMS+"</td> <td>"+obj.complaint[length-1].NAME+"</td><td>"+
								obj.complaint[length-1].CAUSE+"</td><td>"+obj.complaint[length-1].PRESCRIPTION+"</td><td>"+obj.complaint[length-1].FIRSTNAME +" "+obj.complaint[length-1].LASTNAME+"</td><td><span onclick='editName("+obj.complaint[length-1].COMPLAINTID+","+obj.complaint[length-1].STUDENTID+",&apos;"+obj.complaint[length-1].DATE
								+"&apos;,"+obj.complaint[length-1].TEMPERATURE+",&apos;"+obj.complaint[length-1].SYMPTOMS+"&apos;,&apos;"+obj.complaint[length-1].NAME+"&apos;,"+obj.complaint[length-1].DISEASEID+",&apos;"+obj.complaint[length-1].CAUSE+"&apos;,&apos;"+obj.complaint[length-1].PRESCRIPTION+"&apos;,"+obj.complaint[length-1].NURSEID+")'id='myBtn' >UPDATE</span><br><a><span onClick='showComplaint("+ obj.complaint[length-1].COMPLAINTID+", true)'>View Details</span></a>	</td></tr>";
								length-=1;

							}
							table.innerHTML=result;

						}


					}
                
                
                function showSingleComplaintComplete(xhr, status){
                    if(status!="success"){
                        divStatus.innerHTML="error while updating page";
                        return;
                    }
                        
				    var obj=$.parseJSON(xhr.responseText);
                    //var modal = "";
                    
                    var modal = document.getElementById('myModal');
                    
                    
                    
                    modal.style.display = "block";
                    
                    var modalContent = "<span class='close'>x</span><p>Complaint ID: "+obj.complaint[0].COMPLAINTID+"</p><p>Student ID: "+obj.complaint[0].STUDENTID+"</p><p>Date: 2016-03-04</p><p>Temperature: "+obj.complaint[0].TEMPERATURE+"</p><p>Symptoms: "+obj.complaint[0].SYMPTOMS+"</p><p>Diagnosis: "+obj.complaint[0].DIAGNOSIS+"</p><p>Cause: "+obj.complaint[0].CAUSE+"</p><p>Prescription: "+obj.complaint[0].PRESCRIPTION+"</p>";
                    
                    
                    //Prepare the contents of the modal
                    document.getElementsByClassName("modal-content").innerHTML = " ";
                    $(".modal-content").html(modalContent);
                    
                    
                    //Close the modal when button is pressed
                    var span = document.getElementsByClassName("close")[0];
                    span.onclick = function(){
                        modal.style.display = "none";
                    };
                }




				window.onload= showComplaint;
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
                <table class='center' id="table">
                    
                </table>
            </section>
            
            
            <div id="myModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                
                
              </div>

            </div>
            
            
            
	</body>
	</html>
