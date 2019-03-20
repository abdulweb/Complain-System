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
	
	$fetch="select * from complaint";
    $query=mysqli_num_rows(mysqli_query($connect, $fetch));
	$id="C".$query++;

	
  //  $idno=mysqli_real_escape_string($connect,$_POST['idno']);
	$title=mysqli_real_escape_string($connect,$_POST['title']);
	$categ=mysqli_real_escape_string($connect,$_POST['category']);
	if ($categ=='Accomodation') {
		$priority=1;
	} 
	else if ($categ=='Results') {
		$priority=2;
	}else {
		$priority=3;
	}
	$body=mysqli_real_escape_string($connect,$_POST['body']);
	
	
	//inserting into database

	$sql = "INSERT INTO complaint(complaint_id, admission_number,complaint_title, complaint_category, complaint_body,priority) 
	VALUES ('$id','$user', '$title', '$categ', '$body' ,'$priority' );";
	
	if (mysqli_query($connect, $sql)) {	
    $success = "Complaint Submitted!";
	} 
	else {
    $fail =  "Complaint message not submitted..please try again!". mysqli_error($connect); 
	}
	mysqli_close($connect);

}

if(!isset($_SESSION['user']))
        {
                header("location: index.php");
        }
        $user=$_SESSION['user'];
if($user !="" && $category="student"){



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
	</head>
<?php include "board.php"; ?>
<!-- main -->
<main>
<div class = "container-fluid mt-6">
<div class = "row">
<div class = "col-md-3">
</div>
<div class = "col-md-9">
<h2 class = "h2-responsive"> Complaint Form</h2>
<hr class="mb-4">
</div>
</div>
<?php
if (!empty($fail)){
	echo "
		<div class='row'>
			<div class = 'col-md-3'>
			</div>
			<div class='col-md-9'>
				<div class='card card-danger text-center'>".
					"<div class='card-block'>".
						"<p class='white-text error'>" . $fail ."</p> </div> </div>
				<hr class = 'mb-2'>
			</div>
		</div>
	";
}
if (!empty($success)){
	echo "
		<div class='row'>
			<div class = 'col-md-3'>
			</div>
			<div class='col-md-9'>
				<div class='card card-success text-center'>".
					"<div class='card-block'>".
						"<p class='white-text error'>" . $success . "</p> </div> </div>
				<hr class = 'mb-2'>
			</div>
		</div>
	";
}
		?>
<form method="post" action="#" enctype="multipart/form-data">
    <!--First row-->
    <div class="row">
        <!--First column-->
		<div class = "col-md-3">
		</div>
		<!-- second column -->
        <div class="col-md-4">
            <div class="md-form">
                <i class="fa fa-edit prefix"></i>
                <input type="text" id="title" name = "title" class="form-control required">
                <label for="title">Complaint Title</label>
            </div>
        </div>

        <!--third column-->
        <div class="col-md-5">
           <div class = "mdl-selectfield mt-2">
            <select name = "category" class = "browser-default" required>
				<option value = "Segregation" >Segregation</option>
				<option value = "Grieviance" >Accomodation</option>
				<option value = "Grieviance" >Results</option>
				<option value = "Inequality" >Inequality</option>
				<option value = "Suggestion" >Suggestion</option>
				<option value = "General" >General</option>
				
			</select>
			<label>Complaint Category</label>
		</div>
        </div>
    </div>
    <!--/.First row-->

    <!--Second row-->
    <div class="row">
        <!--First column-->
		<div class = "col-md-3">
		</div>
		<!-- second column -->
        <div class="col-md-9">

            <div class="md-form">
                <textarea type="text" id="body" name = "body" class="md-textarea" required></textarea>
                <label for="body">Complaint Body</label>
            </div>

        </div>
    </div>
    <!--/.Second row-->
	<div class="text-center">
            <button class="btn btn-dark-green" name = "submit" value = "submit">Make Complaint</button>
        </div>
	
	</form>
	
	
	
		
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
	<!--<script type="text/JavaScript" src="result.js"></script>-->
	</div>
</main>
	</body>


	</html>