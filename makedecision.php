<?php
session_start();
$user=$_SESSION['user'];
$category=$_SESSION['category'];
if (!isset($user)){
	header('location: index.php');
}
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
<div class = "col-md-3">
</div>
<div class = "col-md-9">
<h2 class = "h2-responsive">Decision Status</h2>
<hr class="mb-4">
</div>
</div>
<?php


	include('connect.php');
	//$msg="";

	$success="";
	$id = '';
	

	
	if(isset($_POST['solution'])){
		$ided=$_POST['id'];
		
		$fetch="SELECT admission_number, complaint_category from complaint WHERE complaint_id='$ided'";
		$query=mysqli_query($connect,$fetch);
		if($row=mysqli_fetch_assoc($query))
			{ 
				$adm=$row['admission_number'];
				$categ = $row['complaint_category'];
				$get="SELECT phone_no from student_reg WHERE admission_number='$adm'";
				$query2=mysqli_query($connect,$get);
			if($row=mysqli_fetch_assoc($query2))
				{
					$phone=$row['phone_no'];
					
					
					include('send_sms.php');

				} 

		

			}

		
	
		$solution = mysqli_real_escape_string($connect,htmlspecialchars($_POST['solution']));
		$value = array("solution" => $solution, "ID" => $ided, "phone" => $phone, "categ" => $categ);
        $value = json_encode($value);
		echo $value; 
		$sql="UPDATE  complaint set flag= 1, complaint_decision='$solution' where complaint_id='$ided' and complaint_category= '$categ'  ";
		mysqli_query($connect,$sql);
			/*$sucess="Decision Submitted";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}*/
		
	
}
elseif (isset($_POST['senate'])) {
	//$solution = mysqli_real_escape_string($connect,htmlspecialchars($_POST['solution']));
		$sql="UPDATE  complaint set complaint_category='Admin' where complaint_id='$id' and complaint_category= '$categ'  ";
		mysqli_query($connect,$sql);
		header('Location:viewallcomplain.php');

}

?>

<?php
$message="";
	 if(isset($_GET['id']))
	{
		$ident=$_GET['id'];
		$view="SELECT * FROM complaint WHERE complaint_id='$ident'";
		$getselect=mysqli_query($connect,$view);


		


		while($row=mysqli_fetch_array($getselect))
		{
			$status=$row['flag'];
			$decision=$row['complaint_decision'];
			$categ = $row['complaint_category'];
			if ($status == 0) {
				$message="Pending";
			} else {
				$message="Answered";
			}
			

?>
<div class = "row">
		<div class = "col-md-3">
		</div>
		<div class = "col-md-9">
		<?php
		if ($message == "Answered"){
			echo"
				<h3 class = 'h3-resposive'> Status: <span class = 'badge badge-success'>". $message. "</span></h3> 
				<hr class = 'mb-2'>
				</div>
				</div>
			";
			echo"
				<div class='row'>
					<div class = 'col-md-3'>
					</div>
					<div class='col-md-9'>

						<div class='md-form'>
							<i class='fa fa-pencil prefix'></i>
							<textarea type='text' id ='msg' class='md-textarea' disabled>". $decision."</textarea>
							<label for='msg'>Decision Message</label>
						</div>

						</div>
					</div>";
			echo'
			<div class = "text-center">
			<a class="btn btn-dark-green" href="viewallcomplain.php" role="button"><i class="fa fa-magic left"></i>Back to View Complaint</a>
			</div>';
		}
		else{
			echo"
				<h3 class = 'h3-resposive'> Status: <span class = 'badge badge-danger'>". $message. "</span></h3> 
				<hr class = 'mb-2'>
				</div>
				</div>
			";
			echo"
			<form method='post' enctype='multipart/form-data' >
				<div class='row'>
					<div class = 'col-md-3'>
					</div>
					<div class='col-md-9'>
						<div class='md-form'>
							<i class='fa fa-pencil prefix'></i>
							<textarea type='text' id ='solution' name = 'solution' class='md-textarea' required>
							</textarea>
							<label for='solution'>Decision Message</label>
						</div>
						</div>
					</div>
				<div class='text-center'>
					<button class='btn btn-dark-green send' name = 'submit' value = 'submit'>Make Decision</button>";
					if ($category=='Admin') {
						echo "";
					} else {
					echo "
					<button class='btn btn-dark-green' name = 'senate' value = 'submit'>Push to Senate</button>"; 
					}
					
					
					
					
					
		echo"				
	<div class = 'done'></div>
	</div>
			</form>";
		}
		?>


	

	<?php
	}
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
	</div>
</main>
	</body>


</html>
