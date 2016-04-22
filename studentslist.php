		<?php
/**
  *@author Jeffrey Takyi-Yeboah
  */
				error_reporting(0);
				session_start();
				if(!isset($_SESSION['USER'])){

					header("location:login.php");
					exit();
				}

	?>
				<html>
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


								var currentObject = null;
	    	function viewDetailsComplete(xhr,status){

									if(status!="success"){
										divStatus.innerHTML="error sending request";
										return;
									}

									// Get the button that opens the modal


									var obj=JSON.parse(xhr.responseText);

									console.log(xhr.responseText);

									if(obj.result==0){
										//echo"dsdsd";
										divStatus.innerHTML=obj.message;
									}else{

			// When the user clicks on the button, open the modal
			var modal="";
					 modal+="<div class='modal-content12'><span class='close'>x</span><h3> STUDENT DETAILS<h3><table border = 1><tr><th>HEIGHT</th><th>WEIGHT</th><th>BLOODTYPE</th></tr><tr><td bgcolor=  #65B529>" +obj.user.HEIGHT +"m "+ "</td><td bgcolor= #65B529>" +obj.user.WEIGHT +"kg "+ "</td><td bgcolor=  #65B529>"+obj.user.BLOODTYPE+"</td></tr></div>";

					 var modalView = document.getElementById('myModal');

			modalView.innerHTML=modal;
			document.getElementById('myModal').style.display="block";


			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modalView) {
			        modalView.style.display = "none";
			    }
			}

			var span = document.getElementsByClassName("close")[0];
			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			    modalView.style.display = "none";
			}

			}
	}

								function viewDetails(obj,userid){
									console.log(userid);
					      currentObject=obj;
								var theUrl="studentsajax.php?cmd=2&uc="+userid;
								$.ajax(theUrl,
									{async:true,complete:viewDetailsComplete}
									);

								}

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

									result+="<div style='overflow-x:auto;'><table class='center' id='table'><tr><th>ID</th><th>USER NAME</th><th>FULL NAME</th><th>GENDER</th><th>PHONE NUMBER</th></tr>"

									while(length>0){


										result+="<tr bgcolor='$bgcolor' style='$style'><td>"+obj.user[length-1].STUDENTID+"</td><td>"+obj.user[length-1].USERNAME+"</td><td>"+obj.user[length-1].FIRSTNAME +" "+obj.user[length-1].LASTNAME+"</td><td>"
										+obj.user[length-1].GENDER+"</td> <td>"+obj.user[length-1].PHONENUMBER+"</td><td onclick='viewDetails(this,"+obj.user[length-1].STUDENTID+")'><button class='btn'>View More</button></td><td><a  href='editStudentRecord.php?studentID="+obj.user[length-1].STUDENTID+"' class='button'>Update</a><br><a href='viewStudentComplaints.php?sid="+obj.user[length-1].STUDENTID+
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
				                //echo $id['FIRSTNAME']." " .$id['LASTNAME'];
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



							  </div>

							</div>


							</div>


				<?php


				echo "<div style='overflow-x:auto;'><table class='center' id='table'>
				<tr><th>ID</th><th>USER NAME</th><th>FULL NAME</th><th>GENDER</th><th>PHONE NUMBER</th><th>CONTROLS</th></tr>";


				echo "</table>";
				?>
				<php
				echo "<div id='myModal' class='modal12'></div>";

				</div>
				</section>

				</body>
				</html>
