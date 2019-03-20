<?php
session_start();
include('connect.php');
$user=$_SESSION['user'];
$category=$_SESSION['category'];
if (!isset($user)){
	header('location: index.php');
}
$success = "";
$fail = "";

if(array_key_exists('submit', $_POST)){
	$success = "";
	//collect all user inputs
	
	$admission_no=mysqli_real_escape_string($connect,$_POST['admno']);
	$name=mysqli_real_escape_string($connect,$_POST['name']);
	$level=mysqli_real_escape_string($connect,$_POST['level']);
	$faculty=mysqli_real_escape_string($connect,$_POST['faculty']);
	$phone_no=mysqli_real_escape_string($connect,$_POST['phone']);	
    $email=mysqli_real_escape_string($connect,$_POST['email']);
     	
  
	//inserting into database

	$sql = "UPDATE student_reg SET admission_number='$admission_no', name='$name',level='$level', faculty='$faculty', email='$email', phone_no = '$phone_no'  WHERE admission_number='$user' ";
	
	if (mysqli_query($connect, $sql) ) {
		$success=  "Record Updated!";
	} 
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
	mysqli_close($connect);

}
?>
?>

<!doctype html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>View Message Status</title>
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
<div class = "col-md-4">
</div>
<div class = "col-md-5">
<?php
$sql2 = "SELECT * FROM student_reg WHERE admission_number = '$user' ";
$fetch=mysqli_query($connect,$sql2);
	if($row = mysqli_fetch_array($fetch)){		
?>

<!--Form with header-->
<div class="card ">
    <div class="card-block">
        <!--Header-->
        <div class="form-header green-gradient">
            <h3><i class="fa fa-user"></i> Update Profile</h3>
        </div>
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
						if(!empty($success)){
							echo "<div class='card card-success text-center'>".
							"<div class='card-block'>".
							"<p class='white-text error'>" . $success . " </p>". 
							"</div>". "</div>
							<hr class = 'mb-2'>
							";
					
							}
						
		?>
		<form method="post" action="#" enctype="multipart/form-data" >
								<div class="md-form">
									<i class="fa fa-user prefix"></i>
									<input type="text" id="admno" name = "admno" class="form-control" min = "10" max = "10" pattern = "[0-9]+" value="<?php echo $row['admission_number'];  ?>"required>
									<label for="admno">Admission Number</label>
								</div>
								<div class="md-form">
									<i class="fa fa-user-plus prefix"></i>
									<input type="text" id="name" class="form-control" name = "name" pattern = "[A-Za-z]+" value="<?php echo $row['name'];  ?>" required>
									<label for="name">Name</label>
								</div>
								<div class="md-form">
									<i class="fa fa-envelope prefix"></i>
									<input type="email" id="email" name = "email" class="form-control" value="<?php echo $row['email'];?>">
									<label for="email">Your email</label>
								</div>
								<div class = "mdl-selectfield mt-2 mb-2">
									<select name = "level" class = "browser-default">
										<option value = "<?php echo $row['level'];  ?>" selected><?php echo $row['level'];?></option>
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
										<option value = "<?php echo $row['faculty'];  ?>" selected><?php echo $row['faculty'];?></option>
										<option value = "Science"  selected>Science</option>
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
									<input type="text" id="phone" name = "phone" class="form-control" pattern = "[0-9]+" value="<?php echo $row['phone_no'];?>">
									<label for="phone">Phone Number</label>
								</div>

								<div class="text-center">
								<button class="btn btn-dark-green" type = "submit" value = "submit" name = "submit">Update</button>
								</div>
						</form>
		
	<?php
	}

?>
<!--/Form with header-->
		</div>
				</div>
				</div>
				<div class = "col-md-3"> </div>

			
		</div>


                
				


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