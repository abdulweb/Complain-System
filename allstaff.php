<?php
session_start();
$user=$_SESSION['user'];
$category=$_SESSION['category'];
if (!isset($user)){
	header('location: login.php');
}
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
<h2 class = "h2-responsive"> Staff Information</h2>
<hr class="mb-4">
</div>
</div>
<?php
require_once('connect.php');

$sql = "SELECT * from auth, staff_reg  where  auth.username = staff_reg.staff_id ";
$result = mysqli_query($connect, $sql);
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
					<th>Staff ID.</th>
					<th>Name</th>
					<th>Category</th>
					<th>Phone Number</th>
					<th>Username</th>
					<th>Password</th>
				</tr>
			</thead>";
    // output data of each row
			$count=0;
    while($row = mysqli_fetch_assoc($result)) {
        $rowid=$row["staff_id"];
        //$rowstatus=$row["flag"];
        $count++;

       /* if ($rowstatus == 0) {
            $rowstatus="Pending";
			$count_pend = $count_pend + 1;
        } else {
            $rowstatus="Answered";
			$count_ans = $count_ans + 1;
        }*/
        
		  echo "
			<tbody>
				<tr>
					<th scope = 'row'>".$count."</th>
					<td>".$row["staff_id"]."</td>
					<td>".$row["name"]."</td>
					<td>".$row["category"]."</td>
					
					<td>".$row["phone"]."</td>
					
					<td>".$row["username"]."</td>
					<td>".$row["password"]."</td>
					<td> <a href=\"update_staff.php?id=$rowid \"> Edit </a> </td>
                	<td> <a href=\"delete_staff.php?id=$rowid \" onclick=\"return confirm('Are you sure you wish to delete this Record?');\">Delete</a></td>
					";
				/*echo"
					<td> <a href='view_message.php?id=$rowid'> View </a> </td>
					";
					if ($rowstatus == "Answered"){
						echo"
					<td> <a href='makedecision.php?id=$rowid' class = 'text-success'>". $rowstatus ."</a></td>";
					}
					else{
						echo"
					<td> <a href='makedecision.php?id=$rowid' class = 'text-danger'>". $rowstatus ."</a></td>";	*/
					}
				echo"
				</tr>
			</tbody>";
    
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
		
} else {
    echo "
	<div class='row'>
		<div class = 'col-md-3'>
		</div>
        <div class='col-md-9'>
			<p total :><span class = 'badge badge-info'> 0 users </span></p> 
		</div
	</div>
	
	";
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