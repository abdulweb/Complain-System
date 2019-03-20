<?php
include('connect.php');
if(array_key_exists('submit', $_POST)){
	$success = "";
	//collect all user inputs
	
    #owner input
  //  $idno=mysqli_real_escape_string($connect,$_POST['idno']);
	$admission_no=mysqli_real_escape_string($connect,$_POST['admno']);
	$name=mysqli_real_escape_string($connect,$_POST['name']);
	$level=mysqli_real_escape_string($connect,$_POST['level']);
	$faculty=mysqli_real_escape_string($connect,$_POST['faculty']);
	$phone_no=mysqli_real_escape_string($connect,$_POST['phone']);	
    $email=mysqli_real_escape_string($connect,$_POST['email']);   
    $password=mysqli_real_escape_string($connect,$_POST['password']);	
  
	
	
	//inserting into database

	$sql = "INSERT INTO student_reg(admission_number, name, level, faculty, phone_no, email) 
	VALUES ('$admission_no', '$name', '$level', '$faculty', '$phone_no', '$email');";
	
	$sql.="INSERT INTO auth(username, password, category) 
	VALUES ('$admission_no', '$password', 'student');";

	if (mysqli_multi_query($connect, $sql) ) {
		$success=  "Registration Succesful!";
	} 
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
	mysqli_close($connect);

}



?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Registration Form</title>
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
            Grieviance and Suggestion Management <span class = "system"> System </span>
        </a>
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
<div class = "container">
			<div class = "row">
				<div class = "col-md-3">
				</div>
				<div class = "col-md-6">
					<div class="card mt-6 mb-6">
						<div class="card-block">
							<!--Header-->
							<div class="text-center">
								<h3><i class="fa fa-lock login"></i> Registration Form:</h3>
												<!--Card Danger-->
									<?php
									if(!empty($success)){
											echo "<div class='card card-success text-center'>".
											"<div class='card-block'>".
											"<p class='white-text error'>" . $success . " click <a href = 'index.php'>here </a> to login</p>". 
											"</div>". "</div>";
											
										}
										
									?>
    <!--/.Card Danger-->
								<hr class="mt-2 mb-2">
							</div>
							<!-- header -->

							<!--Body-->
							<form method="post" action="#" enctype="multipart/form-data" >
								<div class="md-form">
									<i class="fa fa-user prefix"></i>
									<input type="text" id="admno" name = "admno" class="form-control" min = "10" max = "10" required pattern = "[0-9]+">
									<label for="admno">Admission Number</label>
								</div>
								<div class="md-form">
									<i class="fa fa-user-plus prefix"></i>
									<input type="text" id="name" class="form-control" name = "name" required pattern= "[[a-zA-Z]+s]+">
									<label for="name">Name</label>
								</div>
								<div class="md-form">
									<i class="fa fa-envelope prefix"></i>
									<input type="email" id="email" name = "email" class="form-control">
									<label for="email">Your email</label>
								</div>
								<div class = "mdl-selectfield mt-2 mb-2">
									<select name = "level" class = "browser-default" placeholder = "Level">
										
										<option value = "100">100</option>
										<option value = "200" >200</option>
										<option value = "300" >300</option>
										<option value = "400" >400</option>
										<option value = "500" >500</option>
										<option value = "600" >600</option>
										<option value = "700" >700</option>
									</select>
									<label>Level</label>
								</div>
								<div class = "mdl-selectfield mt-2 mb-2">
									<select name = "faculty" class = "browser-default">
										<option value = "Science">Science</option>
										<option value = "Art" >Art</option>
										<option value = "Education" >Education</option>
										<option value = "Vetinary Medicine" >Vetinary Medicine</option>
										<option value = "Law" >Law</option>
										<option value = "Management Science" >Management Science</option>
										<option value = "Medicine" >Medicine</option>
										<option value = "Engineering" >Engineering</option>
									</select>
									<label>Faculty</label>
								</div>
								
								<div class="md-form">
									<i class="fa fa-phone prefix"></i>
									<input type="text" id="phone" name = "phone" class="form-control" pattern = "[0-9]+">
									<label for="phone">Phone Number</label>
								</div>
								<div class="md-form">
									<i class="fa fa-lock prefix"></i>
									<input type="password" id="password" class="form-control" name = "password" required>
									<label for="password">Enter Password</label>
								</div>

								<div class="text-center">
								<button class="btn btn-dark-green" value = "submit" name = "submit">Register</button>
								</div>
						</form>

					</div>
				</div>
				<div class = "col-md-3"> </div>

			</div>
		</div>
	</div>


<!--Footer-->
<footer class="page-footer elegant-color-dark center-on-small-only ">

        <div class="container-fluid">
			<div class = "text-center">
           Grieviance and Complaint System © 2017 Copyright:site designed and developed by <a href="#"> Lawal Yunusa </a> Admission Number: 1210310020
			</div>
        </div>

</footer>
<!--/.Footer-->



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