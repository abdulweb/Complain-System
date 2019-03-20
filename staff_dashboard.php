<?php
session_start();
$user=$_SESSION['user'];
$category=$_SESSION['category'];
if (!isset($user)){
	header('location: login.php');
}

include('connect.php');
$sql= "SELECT * from auth";
$query=mysqli_query($connect,$sql);
$no_of_users=mysqli_num_rows($query);

$sql2= "SELECT * from complaint";
$querys=mysqli_query($connect,$sql);
$no_of_compaints=mysqli_num_rows($querys);

?>
<!DOCTYPE html>
<html>
	<head>
		<title> DASHBOARD </title>
	</head>

	<body>
	<?php 
	 echo date("d/m/y") ; ?>

		<h1> DASHBOARD </h1>

		<a href="staff_dashboard.php">Dashboard</a>
		<?php
		if ($category == 'Admin') {
			echo "<a href='staffreg.php'>Register staff</a>";
			

		} else {
			echo "";
		}
		
		?>

		<a href='viewallcomplain.php'>View Complaint</a>
		<a href="changepassword.php">Change Password</a>
		<a href="logout.php">Log out</a>

		<p> <?php echo $no_of_users . " users"; ?> </p>
		<p> <?php echo $no_of_compaints . " complaints"; ?> </p>

	</body>
</html>