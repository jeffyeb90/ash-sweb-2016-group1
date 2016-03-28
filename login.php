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
