<?php
session_start();
 include 'connect.php';

		
        if (isset($_POST['submit'])) {
			


            $username = mysqli_real_escape_string($connect,htmlspecialchars($_POST['username']));
            $password = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password']));
            //$status = "1";
            
                $sql="SELECT * FROM auth WHERE username='$username' and flag=1 ";
                
                $query = mysqli_query($connect,$sql) or die(mysql_error());
                $fetch = mysqli_fetch_array($query);
				
                //staff
                $dbusname = $fetch['username'];
                $dbpwd = $fetch['password'];
                $db_category= $fetch['category'];

                
                 
                if ($username == $dbusname && $password == $dbpwd) {
                    $_SESSION["user"] = $username;
                    $_SESSION["category"] = $db_category;

                    header( "Location: dashboard.php" );
                    
                } 
                   
                    else {
                    
					$_SESSION["err_msg"] = "Invalid username and password";    
                    
					}
                    
               
           
        }
        ?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Complaint system log in form</title>
		<!-- Font Awesome -->
		<link rel = "stylesheet" href = "font-awesome-4.6.3/css/font-awesome.css">
		<!-- Bootstrap core CSS -->
		<link href="MDB/css/bootstrap.min.css" rel="stylesheet">
		<!-- Material Design Bootstrap -->
		<link href="MDB/css/mdb.min.css" rel="stylesheet">
		<!-- Your custom styles (optional) -->
		<link href="style.css" rel="stylesheet">
	</head>

	<body>
	<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark elegant-color-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
		
		
        <a class="navbar-brand" href="index.php">
		<img src="image/logo2.jpg" height="30" class="d-inline-block align-top" alt="udus_logo">
				 Grieviance and Suggestion Management<span class = "system"> System </span>
        </a>
		</div>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <div class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href ="index.php" ><i class="fa fa-lock log login" aria-hidden="true"></i> Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href = "studentreg.php">Join now</a>
                </li>
                        
        </div>
    </div>
	</div>
</nav>
<!-- Navbar -->
<div class = "container-fluid">
	<div class = "row mt-5 d-flex justify-content-center">
		<div class = "col-md-1"></div>
		<div class = "col-md-10 text-center">
		 	 <!-- Heading -->
			   <h1 class="display-5 font-bold animated slideInDown mt-2><a class="navbar-brand" href="index.php">
		<img src="image/logo2.jpg" height="70" class="d-inline-block" alt="udus_logo">
				 Grieviance and Suggestion Management<span class = "system"> System </span></h1>
    <h2 class="display-5 font-bold animated slideInDown mt-2">Usmanu Danfodiyo University Sokoto</h2>

    <!-- Divider -->
    <hr class="hr-dark">
	
    <!-- Description -->
    <h4 class=" my-4 animated fadeInRight"> Student Affairs Division</h4>
	<p>Supervised by: Professor Aminu Mohammed</p>
		</div>
		<div class = "col-md-1"></div>
	</div>
	</div>
	<div class = "container">
			<div class = "row">
				<div class = "col-md-3">
				</div>
				<div class = "col-md-6">
					<div class="card mt-1">
						<div class="card-block">
							<!--Header-->
							<div class="text-center">
								<h4><i class="fa fa-lock login"></i> Grieviance and suggestion System Login:</h4>
												<!--Card Danger-->
									<?php
									if(!empty($_SESSION['err_msg'])){
											echo "<div class='card card-danger text-center'>".
											"<div class='card-block'>".
											"<p class='white-text error'>" . $_SESSION['err_msg'] . "</p>". "</div>". "</div>";
											unset($_SESSION['err_msg']);
										}
										
									?>
    <!--/.Card Danger-->
								<hr class="mt-2 mb-2">
							</div>
							<!-- header -->

							<!--Body-->
							<form method="post" action="#" enctype="multipart/form-data" > 
								<div class="md-form">
									<i class="fa fa-envelope prefix"></i>
									<input type="text" id="username" class="form-control" name = "username">
									<label for="usernamew">Admission Number</label>
							</div>

							<div class="md-form">
								<i class="fa fa-lock prefix"></i>
								<input type="password" id="password" class="form-control" name = "password">
								<label for="password">Enter Password</label>
							</div>

							<div class="text-center">
								<button class="btn btn-dark-green" value = "submit" name = "submit">Login</button>
							</div>
						</form>

					</div>

					<!--Footer-->
						<div class="text-center">
							<p>Not a member? <a href="studentreg.php">Join now</a></p>
						</div>
					</div>
				</div>
				<div class = "col-md-3"> </div>

			</div>
		</div>


<!--Footer-->
<footer class="page-footer elegant-color-dark center-on-small-only mt-6">

        <div class="container-fluid">
			<div class = "text-center">
			
           Grieviance and Suggestions management System © 2017 Copyright:site designed and developed by <a href="#"> Lawal Yunusa Shehu</a> Admission Number: 1210310020
		   
			</div>
        </div>

</footer>




		
		<!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="MDB/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="MDB/js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="MDB/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="MDB/js/mdb.min.js"></script>
	<script type="text/JavaScript" src="js/validate.js"></script>
	</body>
	</html>