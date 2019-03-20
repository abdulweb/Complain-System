<?php
session_start();
include('connect.php');
$message="";
$user=$_SESSION['user'];
$category=$_SESSION['category'];
if (!isset($user)){
	header('location: login.php');
}

if(array_key_exists('submit', $_POST)){
	 $retype = mysqli_real_escape_string($connect,htmlspecialchars($_POST['retype']));
     $password = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password']));

     if ($password==$retype) {
    	$sql="UPDATE  auth set password= '$password' where username='$user' and category= '$category'  ";
		if(mysqli_query($connect,$sql)){
			$msg_success="Password changed successfully";
		}
     } else {
     	$msg_fail="The passwords do not match!..please re-enter your password";
     }
     
	
	

}
?>
<!doctype html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>make complaint</title>
		<!-- Font Awesome -->
		<link rel = "stylesheet" href = "font-awesome-4.6.3/css/font-awesome.css">
		
		<!-- Bootstrap core CSS -->
		<link href="MDB/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Material Design Bootstrap -->
		<link href="MDB/css/mdb.min.css" rel="stylesheet">
		
		<!-- Your custom styles (optional) -->
		<link href="style.css" rel="stylesheet">
		<!--<link href="materialize/css/materialize.min.css" rel="stylesheet">-->
	</head>
<?php include "board.php"; ?>
<!-- main -->
<main>
<div class = "container-fluid mt-6">
<div class = "row">
<div class = "col-md-3">
</div>
<div class = "col-md-9">
<h2 class = "h2-responsive"> Change Password</h2>
<hr class="mb-2">
</div>
</div>
<?php
if (!empty($msg_fail)){
	echo "
		<div class='row'>
			<div class = 'col-md-3'>
			</div>
			<div class='col-md-9'>
				<div class='card card-danger text-center'>".
					"<div class='card-block'>".
						"<p class='white-text error'>" . $msg_fail . "</p> </div> </div>
				<hr class = 'mb-2'>
			</div>
		</div>
	";
}
if (!empty($msg_success)){
	echo "
		<div class='row'>
			<div class = 'col-md-3'>
			</div>
			<div class='col-md-9'>
				<div class='card card-success text-center'>".
					"<div class='card-block'>".
						"<p class='white-text error'>" . $msg_success . "</p> </div> </div>
				<hr class = 'mb-2'>
			</div>
		</div>
	";
}
		?>
	<form method="post" enctype="multipart/form-data">
		<div class="row">
        <!--First column-->
		<div class = "col-md-3">
		</div>
		<!-- second column -->
        <div class="col-md-4">
            
    <div class="md-form form-group">
        <i class="fa fa-lock prefix"></i>
        <input type="password" id="password" name = "password" class="form-control" required>
        <label for="password">Type your Password</label>
    </div>
	</div>
	<div class = "col-md-5">
    <div class="md-form form-group">
        <i class="fa fa-lock prefix"></i>
        <input type="password" id="retype" name = "retype" class="form-control" required>
        <label for="retype">Re-type your password</label>
    </div>
        </div>	
    </div>
	<div class="text-center">
        <button class="btn btn-dark-green" name = "submit" value = "submit">Change Password</button>
        </div>
		
	</form>
	



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
	</div>
</main>
	</body>
	</html>