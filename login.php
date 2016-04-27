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

    <body class="login-body">

        



        <section class="container">
           <div id="header">
               <img class="img-responsive" src="images/logo.jpg"/>
            </div>
           
            <form action="login.php" method="GET">
                <div class="login">
                    <p>Nurse Login</p>
                    <input class="text" type="text" name="email" value="" placeholder="Username or Email">
                    <input type="password" name="password" value="" placeholder="Password">
                    <input class="submit" type="submit" value="Log In">
                </div>
            </form>
        </section>
        
    </body>

</html>
