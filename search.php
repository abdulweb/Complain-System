<?php
session_start();
$user=$_SESSION['user'];
$category=$_SESSION['category'];

?>

<!doctype html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Complaint Information</title>
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
<!-- first row -->
<div class = "col-md-3">
</div>
<!-- second row -->
<div class = "col-md-9">
<h2 class = "h2-responsive"> Complaint Information</h2>
<hr class="mb-2">
<p> Search the Complaint Table Using:</p>
		<div class = "col-md-4">
           <div class = "mdl-selectfield mt-2 select">
            <select name = "type" class = "browser-default" required>
				<option value = "Adm_no" >Admission Number</option>
				<option value = "date" >Submission Date</option>
			</select>
			<label>Search Type</label>
		</div>
		</div>
<form class="form-inline frm" method="post" action="#" enctype="multipart/form-data">
    <input class= "form-control mr-sm-2" type="text" placeholder="Search Record" aria-label="Search" id = "record" name = "record" pattern = "[0-9]+">
    <button class="btn btn-outline-success btn-sm my-0" value = "submit" name="submit">Search </button>
	
</form>
 <hr class = "mb-4">              
</div>
</div>
<?php
require_once('connect.php');
if ($category == "Admin"){
	if(array_key_exists('submit', $_POST)){
		if(isset($_POST['record'])){
		$admission_no=mysqli_real_escape_string($connect,$_POST['record']);
		$sql = "SELECT * from complaint WHERE admission_number = '$admission_no'";
		$result = mysqli_query($connect, $sql);
		}
		else{
		$date = mysqli_real_escape_string($connect,$_POST['date']);
		$sql = "SELECT * from complaint WHERE date = '$date' ";
		$result = mysqli_query($connect, $sql);
		}
$count_pend = 0;
$count_ans = 0;
if (mysqli_num_rows($result) > 0) {
	echo "
	<div class='row'>
		<div class = 'col-md-3'>
		</div>
        <div class='col-md-9'>
		<table class = 'table table-hover'>
			<thead class = 'thead-inverse'>
				<tr>
					<th>ID</th>
					<th>Admission No.</th>
					<th>Title</th>
					<th>Category</th>
					<th>Message</th>
					<th>Status</th>
				</tr>
			</thead>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $rowid=$row["complaint_id"];
        $rowstatus=$row["flag"];

        if ($rowstatus == 0) {
            $rowstatus="Pending";
			$count_pend = $count_pend + 1;
			
        } else {
            $rowstatus="Answered";
			$count_ans = $count_ans + 1;
			
        }
        
		  echo "
			<tbody>
				<tr>
					<th scope = 'row'>".$row["complaint_id"]."</th>
					<td>".$row["admission_number"]."</td>
					<td>".$row["complaint_title"]."</td>
					<td>".$row["complaint_category"]."</td>
					";
				echo"
					<td> <a href='view_message.php?id=$rowid'> View </a> </td>
					";
					if ($rowstatus == "Answered"){
						echo"
					<td> <a href='viewall_decision.php?id=$rowid' class = 'text-success'>". $rowstatus ."</a></td>";
					}
					else{
						echo"
					<td> <a href='viewall_decision.php?id=$rowid' class = 'text-danger'>". $rowstatus ."</a></td>";	
					}
				echo"
				</tr>
			</tbody>";
    }
    echo "
			</table>
		</div>
	</div>
	";
        ?>
	<div class = "row">
		<div class = "col-md-3">
		</div>
		<div class = "col-md-9">
		<hr class = "mt-2 mb-2">
		<?php
		echo"
		<p><span class = 'badge green'>". $count_ans. "</span> Answered Complaints</p> 
		<p><span class = 'badge red'>". $count_pend. "</span> Pending Complaints</p> 
		<p> Total: <span class = 'badge badge-info'>". mysqli_num_rows($result). " Complaints </span></p> 
		</div>
		</div>
		"; 
} else {
	
    echo "
	<div class='row'>
		<div class = 'col-md-3'>
		</div>
        <div class='col-md-9'>
			<p total :><span class = 'badge badge-info'> 0 complaints </span></p> 
		</div
	</div>
	
	";
}
	}//end if of post
	else{
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}//end else
}else{
	//category is not admin
	header("location:index.php");
}

mysqli_close($connect);




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
	</div>
</main>
	</body>
</html> 