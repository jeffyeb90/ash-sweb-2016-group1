<?php
  session_start();
  if(!isset($_SESSION['USER'])){
  	header("location:login.php");
	 exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>Ashesi | Student Medical Details</title>
		        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          
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
        		
        	            }
        	            else{
  					        divStatus.innerHTML='Display Students';
                            var result="";
  				            var length=obj.user.length;
  					
  					        result+="<div style='overflow-x:auto;'><table class='center' id='table'><tr><th>ID</th><th>USER NAME</th><th>FULL NAME</th><th>GENDER</th><th>PHONE NUMBER</th><th>CONTROLS</th></tr>"
  					        while(length>0){
  						        result+="<tr bgcolor='$bgcolor' style='$style'><td>"+obj.user[length-1].STUDENTID+"</td><td>"+obj.user[length-1].USERNAME+"</td><td>"+obj.user[length-1].FIRSTNAME +" "+obj.user[length-1].LASTNAME+"</td><td>"+obj.user[length-1].GENDER+"</td> <td>"+obj.user[length-1].PHONENUMBER+"</td><td><span  onclick='getStudent("+obj.user[length-1].STUDENTID+")' class='btn'>Update</span><br><a href='viewStudentComplaints.php?sid="+obj.user[length-1].STUDENTID+
  						"'class='button'>View</a><br><a href='medicalComplaintAdd.php?sid="+obj.user[length-1].STUDENTID+"' class='button'>Add Medical Complaint</a><br></td></tr>";

  						        length-=1;
                             }
  					         table.innerHTML=result;
        	            }
                    }
                    /**
                    *function to validate user's input
                    *@param string string
                    *@return boolean
                    */
                    function validate(string){
                        var regex=/\d+(\.?\d{1,2})?/;
                        return regex.test(string);
                    }

                     /**
                     *callback function for searchStudentInfo AJAX function. Receives the status of the AJAX request and rows of information as a JSON object. Displays modal containing form for editing
                     *@param xhr XMLHTTPRequest response object
                     *@param status status of the request
                     */
        
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
                            var sid=object.student.STUDENTID;
                          
                            var weight=object.student.WEIGHT;
                            var height=object.student.HEIGHT;
                            var bloodType=object.student.BLOODTYPE;

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

                            var modalInfo="";
                            modalInfo+="<div class='modal-content'><span class='close'>x</span><b>EDIT STUDENT RECORD</b><div class='position'><input type='hidden' id='sid' value="+sid+"><div>Weight: <input class='text' type='text' id='weight'value="+weight+"> kg</div><div>Height: <input class='text' type='text' id='height' value="+height+"> m</div><div>Blood Type:<select class='select' id='bloodtype'><option "+groupA+" value ='A'>A</option><option "+groupB+" value ='B'>B</option><option "+groupAB +"value ='AB'>AB</option><option "+groupO +"value ='O'>O</option></select><input class='submit' type='submit' name= 'save' value='Update' onclick='updateStudent("+sid+")'></div></div>";
                         
                            modal= document.getElementById("myModal");
                            modal.innerHTML=modalInfo;
                            modal.style.display="block";

                            var span=document.getElementsByClassName('close')[0];
            
                            span.onclick=function(){
                                modal.style.display="none";
                            }
                         
                            window.onclick=function(event){
                              if(event.target==modal){
                                modal.style.display="none";
                              }
                            }
                            
                        }
                    }
                    /**
                    *AJAX function that asynchronously makes a request to the studentsajax page to retrieve student records from the database
                    *return redirects to searchStudentComplete (callback function ) after request is completed
                    */
                    function getStudent(sid){
                        var url="studentsajax.php?cmd=2&sid="+sid;
                        $.ajax(url,
                        {
                            async:true, complete:getStudentComplete
                        });
                        
                 
                    }
                    /**
                     *callback function for updateStudent AJAX function. Receives the status of the AJAX request a as a JSON object. 
                     *@param xhr XMLHTTPRequest response object
                     *@param status status of the request
                     */

                    function updateStudentComplete(xhr, status){
                        if(status!="success"){
                            divStatus.innerHTML = "error sending request";
                            return;
                        }

                        var response = $.parseJSON(xhr.responseText);
                        if(response.result==0){
                            divStatus.innerHTML=response.message;
                        }
                        else{
                            alert("User updated!");
                            divStatus.innerHTML="User successfully updated.";
                        }

                    }
                    /**
                    *AJAX function that asynchronously makes a request to the studentsajax page to update a student record in the database
                    *return redirects to searchStudentComplete (callback function ) after request is completed
                    */
                    function updateStudent(sid){
                        var editedHeight=$("#height").val();
                       
                        var error=validate(editedHeight);
                        if(error==false){
                           
                            alert("Please enter a decimal value for the height");
                            return;
                        }
                        var editedWeight=$("#weight").val();
                        
                        var heightError=validate(editedWeight);
                        if(heightError==false){
                            
                            alert("Please enter a decimal value for the weight");
                            return;
                        }
                        var editedBloodType=$("#bloodtype option:selected").text();
                        modal.style.display="none";
                     
                     
                        var url = "studentsajax.php?cmd=3&sid="+sid+"&weight="+editedWeight+"&height="+editedHeight+"&bloodType="+editedBloodType;
                        $.ajax(url,
                        {
                            async:true, complete:updateStudentComplete
                        });
                      
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
                            ?>
                        </li>
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
                 
                    <div class="input-field">
                        <input onkeyup="searchStudentInfo()"id="search" type="text" name="txtSearch">
                        <span onclick="searchStudentInfo()" value="search" class="button">SEARCH</span>
                    </div>
                  
        			
                </div>
        		 
        		<section class="medical-history">
                <?php
                    echo "<div style='overflow-x:auto;'><table class='center' id='table'>
                    <tr><th>ID</th><th>USER NAME</th><th>FULL NAME</th><th>GENDER</th><th>PHONE NUMBER</th><th>HEIGHT</th><th>WEIGHT</th><th>BLOOD TYPE</th><th>EMERGENCY CONTACT</th><th>CONTROLS</th></tr>";
                    echo "</table>";


                ?>
                
                <?php
                    echo "<div id='myModal' class='modal'>
                    </div>";
                ?>
            </section>



    </body>
</html>