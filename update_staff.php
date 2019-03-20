<?php
session_start();
include('connect.php');
$id=$_GET['id'];
$user=$_SESSION['user'];
$category=$_SESSION['category'];
if (!isset($user)){
	header('location: index.php');
}
//$sql3="select * from auth where username='$user' and category= '$category' ";
//$fetch=mysqli_query($connect,$sql3);
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

	$sql = "UPDATE staff_reg SET staff_id='$staff_id', name='$name', category='$category', phone='$phone_no'  WHERE staff_id='$id' ";
	
	$sql2="UPDATE auth SET  username='$staff_id', password='$password', category='$category' WHERE username='$id'";
	if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql2) ) {
		$success=  "Record Updated!";
	} 
	else {
    $fail = "Error: " . $sql . "<br>" . mysqli_error($connect);
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
<div class="card">
    <div class="card-block">
        <!--Header-->
        <div class="form-header green-gradient">
            <h3><i class="fa fa-user"></i> Update Staff</h3>
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
        <?php
								 if(isset($_GET['id']))
							  	{
							  		$id=$_GET['id'];
							  		$view="SELECT * FROM auth,staff_reg WHERE staff_id='$id'";
							  		$getselect=mysqli_query($connect,$view);
							  		if($row=mysqli_fetch_assoc($getselect))
							  		{
							    		
							    		
							?>
		<form method="post" action="#" enctype="multipart/form-data" >
        <!--Body-->



        <div class="md-form">
            <i class="fa fa-user prefix"></i>
            <input type="text" id="staffid" name = "staffid" class="form-control" max = "5" value="<?php echo $row['staff_id'];  ?>">
            <label for="staffid">Staff ID</label>
        </div>

        <div class="md-form">
            <i class="fa fa-user-plus prefix"></i>
            <input type="text" id="name" name = "name" class="form-control" value="<?php echo $row['name'];  ?>">
            <label for="name">Name</label>
        </div>
        
		<div class = "mdl-selectfield mt-2 mb-2">
            <select name = "category" class = "browser-default" required >
            <option value = "<?php echo $row['category'];  ?>" selected><?php echo $row['category'];  ?></option>
				<option value = "Segregation">Segregation</option>
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
            <input type="text" id="phone" name = "phone" class="form-control" value="<?php echo $row['phone'];  ?>" >
            <label for="phone">Phone Number</label>
        </div>

        <div class="md-form">
            <i class="fa fa-lock prefix"></i>
            <input type="text" id="password" name = "password" class="form-control" value="<?php echo $row['password'];  ?>">
            <label for="password">Your password</label>
        </div>

        <div class="text-center">
            <button class="btn btn-dark-green" name = "submit" value = "submit">Update</button>
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
	}
	}
	 else {
  		header('location: index.php');
     }
	?>




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