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
        <style>
      /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

    </style>
       
        <link href="css/style.css" rel="stylesheet">
        
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
					//console.log(length);
					result+="<div style='overflow-x:auto;'><table class='center' id='table'><tr><th>ID</th><th>USER NAME</th><th>FULL NAME</th><th>GENDER</th><th>PHONE NUMBER</th><th>HEIGHT</th><th>WEIGHT</th><th>BLOOD TYPE</th><th>EMERGENCY CONTACT</th><th>CONTROLS</th></tr>"
					while(length>0){
						result+="<tr bgcolor='$bgcolor' style='$style'><td>"+obj.user[length-1].STUDENTID+"</td><td>"+obj.user[length-1].USERNAME+"</td><td>"+obj.user[length-1].FIRSTNAME +" "+obj.user[length-1].LASTNAME+"</td><td>"+obj.user[length-1].GENDER+"</td> <td>"+obj.user[length-1].PHONENUMBER+"</td><td>"+
						obj.user[length-1].HEIGHT+"</td><td>"+obj.user[length-1].WEIGHT+"</td><td>"+obj.user[length-1].BLOODTYPE+"</td><td>"+obj.user[length-1].CONTACTFIRSTNAME +" "+obj.user[length-1].CONTACTLASTNAME+"</td><td><span  onclick='update("+obj.user[length-1].STUDENTID+")' class='btn'>Update</span><br><a href='viewStudentComplaints.php?sid="+obj.user[length-1].STUDENTID+
						"'class='button'>View</a><br><a href='medicalComplaintAdd.php?sid="+obj.user[length-1].STUDENTID+"' class='button'>Add Medical Complaint</a><br></td></tr>";
						length-=1;
						 
						//console.log(length);
					}
					table.innerHTML=result;
      	}
      }
       var updatedStudent=null;
      function getStudentComplete(xhr, status){
        if(status!="success"){
          alert("error retrieving student information");
          return;
        }
        var object=$.parseJSON(xhr.responseText);
        
        if(object.result==0){
          alert(""+object.message);

        }
        else{
          //alert("Height:"+object.student.HEIGHT+" ");
        //  return object.student;
          updatedStudent= object.student;
        }
      }
      function getStudent(sid){
        var url="studentsajax.php?cmd=2&sid="+sid;
        $.ajax(url,{
          async:true, complete:getStudentComplete
        });
   //prompt("url", url);
      }

      function updateStudentComplete(status, xhr){
        if(status!="success"){
          divStatus.innerHTML = "error sending request";
          return;
        }

        var response = $.parseJSON(xhr.responseText);
        if(response.result==0){
          divStatus.innerHTML=response.message;
        }
        else{

        }

      }

      function updateStudent(sid, height, weight, bloodType){
        var url = "studentsajax.php?cmd=3&sid="+sid+"&weight="+weight+"&height="+height+"bloodType="+bloodType;
        $.ajax(url,{
          async:true, complete:updateStudentComplete
        });
      }
      function update(sid){
       getStudent(sid);
      	//alert(""+sid);
        //alert("Height:" +student.HEIGHT);
      	//alert("Height:" +updatedStudent.HEIGHT);
      //  if(updatedStudent){
        var sid=updatedStudent.STUDENTID;
        //alert(""+sid);
        var weight=updatedStudent.WEIGHT;
        var height=updatedStudent.HEIGHT;
        var bloodType=updatedStudent.BLOODTYPE;

        var groupA, groupB, groupAB, groupO="";
        if(bloodType=="A"){
          groupA="selected";
        }
        else if(bloodType=="B"){
          groupB="selected";
        }
        else if(bloodType=="AB"){
          groupAB="selected";
        }
        else{
          groupO="selected";
        }

        var modal="";
        modal+="<div class='modal-content'><div class='modal-header'><span class='close'>x</span><h2>Edit Student Record</h2><div><div class='position' action='update.php' method='GET'><input type='hidden' name='sid' value="+sid+"><div>Weight: <input class='text' type='text' name='weight'value="+weight+"> kg</div><div>Height: <input class='text' type='text' name='height' value="+height+"> m</div><div>Blood Type:<select class='select name='bloodtype'><option "+groupA+" value ='A'>A</option><option "+groupB+" value ='B'>B</option><option "+groupAB +"value ='AB'>AB</option><option "+groupO +"value ='O'>O</option></select><input class='submit' type='submit' name= 'save' value='Update'></div></div>";
       // alert(""+modal);
      // alert(""+document.getElementById("myModal").innerHTML);
       var m= document.getElementById("myModal");
       m.innerHTML=modal;
       m.style.display="block";
       //var span=document.getElementByClassName('close')[0];
       window.onclick=function(event){
          if(event.target==m){
            m.style.display="none";
          }
       }
       // span.onclick=function(){
       //  m.style.display="none";
       // }
      // alert(""+m.innerHTML);
     // }
      // else{
      //   alert("error");
      // }
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
              <span onclick="searchStudentInfo()" value="search" class="button">SEARCH</span>
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
<?php
echo "<div id='myModal' class='modal'>oh []
</div>";
?>
</section>



</body>
</html>