
          <?php

                //initialize
  include_once("students.php");
  /**
  *@author Jeffrey Takyi-Yeboah

  */
    if(isset($_REQUEST['email'])&&(isset($_REQUEST['password']))){
       $obj=new students();
      $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
       $row=$obj->login($email,$password);

       if($row==false){
                echo "Error finding nurse";
}
      else{
        $result=$obj->fetch();
				if(($email!=NULL) && ($password!=NULL)){
				if(($result['EMAIL']==$email) &&($result['PASSWORD'])==$password){
          	error_reporting(0);
          session_start();
          $_SESSION['USER']=$result;


          echo "Nurse Logged In";
	         echo'<script> window.location.href="studentslist.php";</script>';
				}

				else{
					echo"User not found";
				}




       }
		 }
	 }







  ?>


	<html>
		<head>
			<title>Log In</title>
			<link rel="stylesheet" href="css/style.css">

		</head>

		<body>

			<div id="header" > <h2>Ashesi University Clinic</h2> </div>
				<div class="image">  <img src="images/1.JPG" border="5"/></div>

	  <form action="login.php" method="GET">

		<section class="container">
			<div class="login">
				<h2>   Nurse Login</h2>



												<p><input class="text" type="text" name="email" value="" placeholder="Username or Email"></p>
												<p><input type="password" name="password" value="" placeholder="Password"></p>

																	<input class="submit" type="submit" value="Log In">
																		</div>
																			</form>

																</section>
															</div>
																</body>

															</html>
