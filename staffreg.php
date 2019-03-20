<?php
session_start();
include('connect.php');
$user=$_SESSION['user'];
$category=$_SESSION['category'];
if (!isset($user)){
	header('location: index.php');
}
$sql3="select * from auth where username='$user' and category= '$category' ";
$fetch=mysqli_query($connect,$sql3);
$success = "";
$fail = "";

if(array_key_exists('submit', $_POST)){
	//collect all user inputs
	
    #owner input
  //  $idno=mysqli_real_escape_string($connect,$_POST['idno']);
	$staff_id=mysqli_real_escape_string($connect,$_POST['staffid']);
	$name=mysqli_real_escape_string($connect,$_POST['name']);
	$category=mysqli_real_escape_string($connect,$_POST['category']);
	$phone_no=mysqli_real_escape_string($connect,$_POST['phone']);	
    //$email=mysqli_real_escape_string($connect,$_POST['email']);   
    $password=mysqli_real_escape_string($connect,$_POST['password']);	
  
	
	
	//inserting into database

	$sql = "INSERT INTO staff_reg(staff_id, name, category, phone) 
	VALUES ('$staff_id', '$name', '$category',  '$phone_no');";
	
	$sql2="INSERT INTO auth(username, password, category) 
	VALUES ('$staff_id', '$password', '$category');";

	if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql2) ) { 
    
		$success=  "Registration Succesful!";
	} 
	else {
    $fail = " Registration not successful..please try again";
	}
	mysqli_close($connect);

}

if(!isset($_SESSION['user']))
        {
                header("location: index.php");
        }
        $user=$_SESSION['user'];
if($user !="" && $category="admin"){
?>




<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Staff Registration</title>
		<!-- Font Awesome -->
		<link rel = "stylesheet" href = "font-awesome-4.6.3/css/font-awesome.css">
	
		
		<!-- Bootstrap core CSS -->
		<link href="MDB/css/bootstrap.min.css" rel="stylesheet">

		<!-- Material Design Bootstrap -->
		<link href="MDB/css/mdb.min.css" rel="stylesheet">
		
		<!-- Your custom styles (optional) -->
		<link href="style.css" rel="stylesheet">
		
	</head>
<?php include "board.php"; ?>
<!-- main content goe here -->
<main>
<div class = "container-fluid mt-6">
<div class = "row">
<div class = "col-md-4">
</div>
<div class = "col-md-5">
<!--Form with header-->
<div class="card mt-2">
    <div class="card-block">
        <!--Header-->
        <div class="form-header green-gradient">
            <h3><i class="fa fa-user"></i> Staff Registration:</h3>
        </div>
		<form method="post" action="#" enctype="multipart/form-data" >
        <!--Body-->
		<?php
if (!empty($fail)){
	echo "
		<hr class = 'mt-2'>
		<div class='card card-danger text-center'>".
			"<div class='card-block'>".
				"<p class='white-text error'>" . $fail . "</p> </div> </div>
				<hr class = 'mb-2'>
	";
}
if (!empty($success)){
	echo "
		<hr class = mt-2 mb-2'>
		<div class='card card-success text-center'>".
			"<div class='card-block'>".
				"<p class='white-text error'>" . $success . "</p> </div> </div>
				<hr class = 'mt-2 mb-2'>
	";
}
		?>
        <div class="md-form">
            <i class="fa fa-user prefix"></i>
            <input type="text" id="staffid" name = "staffid" class="form-control" max = "5" pattern = "[A-Za-z]+">
            <label for="staffid">Staff ID</label>
        </div>
        <div class="md-form">
            <i class="fa fa-user-plus prefix"></i>
            <input type="text" id="name" name = "name" class="form-control" pattern = "[A-Za-z]+">
            <label for="name">Username</label>
        </div>
		<div class = "mdl-selectfield mt-2 mb-2">
            <select name = "category" class = "browser-default" required="">
				<option value = "Segregation" >Segregation</option>
				<option value = "Grieviance" >Grieviance</option>
				<option value = "Inequality" >Inequality</option>
				<option value = "Suggestion" >Suggestion</option>
				<option value = "General" >General</option>
				<option value = "Admin" >Admin</option>
			</select>
			<label>Complaint Category</label>
		</div>
		 <div class="md-form">
            <i class="fa fa-phone prefix"></i>
            <input type="text" id="phone" name = "phone" class="form-control" pattern = "[0-9]+">
            <label for="phone">Phone Number</label>
        </div>

        <div class="md-form">
            <i class="fa fa-lock prefix"></i>
            <input type="password" id="password" name = "password" class="form-control">
            <label for="password">Your password</label>
        </div>

        <div class="text-center">
            <button class="btn btn-dark-green" name = "submit" value = "submit">Sign up</button>
        </div>
		</form>

    </div>
</div>
<!--/Form with header-->
</div>
<div class = "col-md-3">
</div>
</div>

	

 <?php
  }  else {
  		header('location: index.php');
     }?>



				<!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="MDB/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="MDB/js/tether.min.js"></script>
    
	<!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="MDB/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="MDB/js/mdb.min.js"></script>
	<script type="text/JavaScript" src="result.js"></script>
	</body>
</html>