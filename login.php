<html>
	<head>
		<title>Log In</title>
		<link rel="stylesheet" href="css/style.css">
		<script>

		</script>
	</head>
	<body>

		<table>
			<tr>
				<td colspan="2" id="pageheader">
		Log In Page
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>
					</div>

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
    echo "Nurse Logged In";
	echo'<script> window.location.href="addstudentlist.php";</script>';
				}

				else{
					echo"User not found";
				}




       }
		 }
	 }







  ?>

          <div id="divStatus" class="status">
                    </div>
                    <div id="divContent">

                      <form action="login.php" method="GET">


                  <div><h5>Email:</h5> <input type="text" name="email" value=""/></div>
              <div><h5>Password: </h5>  <input type="password" name="password" value=""/></div>

            </div>
            <div>
                  <input type="submit" height = "80" value="Log In" >
                      </form>
                    </div>
                  </table>
                </body>
              </html>
