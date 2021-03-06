<?php
session_start();
include('connect.php');
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
<h2 class = "h2-responsive">Desision Status</h2>
<hr class="mb-4">
</div>
</div>

<?php
$message="";
	 if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$view="SELECT * FROM complaint WHERE complaint_id='$id'";
		$getselect=mysqli_query($connect,$view);


		


		while($row=mysqli_fetch_array($getselect))
		{
			$status=$row['flag'];
			$decision=$row['complaint_decision'];
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
			<a class="btn btn-dark-green" href="view_complains.php" role="button"><i class="fa fa-magic left"></i>Back to View All Complaint</a>
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
				<div class='row'>
					<div class = 'col-md-3'>
					</div>
					<div class='col-md-9'>
						<div class='md-form'>
							<i class='fa fa-pencil prefix'></i>
							<textarea type='text' id ='solution' name = 'solution' class='md-textarea' disabled> 
							The decision message is currently pending....plese check back later!</textarea>
							<label for='solution'>Decision Message</label>
						</div>
						</div>
					</div>
				";
			echo'
			<div class = "text-center">
			<a class="btn btn-dark-green" href="view_complains.php" role="button"><i class="fa fa-magic left"></i>Back to View All Complaint</a>
			</div>';	
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
