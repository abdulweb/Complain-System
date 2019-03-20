
<?php
$user=$_SESSION['user'];
$category=$_SESSION['category'];
if (!isset($user)){
	header('location: index.php');
}

include('connect.php');
$sql= "SELECT * from auth";
$query=mysqli_query($connect,$sql);
$no_of_users=mysqli_num_rows($query);

$sql2= "SELECT * from complaint";
$querys=mysqli_query($connect,$sql2);
$no_of_compaints=mysqli_num_rows($querys);

?>
<body onload = "startTime()">
<header>
 <!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark elegant-color-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1><a class="navbar-brand" href="index.php">
		<img src="image/logo2.jpg" height="30" class="d-inline-block align-top" alt="udus_logo">
           Grieviance and Suggestion Management <span class = "system"> System </span></a></h1>
        
		
        <div class="collapse navbar-collapse" id="navbarNav1">
            <div class="navbar-nav ml-auto">
			<li class="nav-item nav-link">
                    <div id = "date"> </div>
                </li>
				<li class="nav-item nav-link">
                     <?php 
					echo 'welcome ' . $user. '!' ?>

                </li>
                <li class="nav-item">
                    <a  href = "logout.php" class="nav-link"><i class="fa fa-lock log login" aria-hidden="true"></i> log out</a>
                </li>           
        </div>
    </div>
	</div>
</nav>
</header>
 <div class="side-nav">

	<?php
	echo '
        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
    ';
	if ($category == 'Admin') {
		echo 
		"
		<a href='staffreg.php'><i class='fa fa-fw fa-edit'></i> Register Staff</a>
		
		<a href='viewallcomplain.php'><i class='fa fa-fw fa-desktop'></i> View Complaint</a> 
		<a href='view_complains.php'><i class='fa fa-fw fa-pencil'></i> View All Complaint <span class = 'badge red'>". $no_of_compaints . "</span></a>
		 <a href='allusers.php'><i class='fa fa-fw fa-users'></i> All Users <span class = 'badge red'>". $no_of_users . "</span></a>
		<a href='allstaff.php'><i class='fa fa-fw fa-user-plus'></i> All Staff    </a>
		<a href='changepassword.php'> <i class='fa fa-fw fa-wrench'></i> Change Password</a>
		";
			

		}

		else if ($category != "student") {
			echo "
			<a href='viewallcomplain.php'><i class='fa fa-fw fa-desktop'></i> View Complaint</a>
			<a href='changepassword.php'> <i class='fa fa-fw fa-wrench'></i> Change Password</a>
			";
			

		}



		 else {
			echo '

			<a href="makecomplain.php"><i class="fa fa-fw fa-edit"></i> Make Complaint</a>
			<a href="viewmycomplain.php"><i class="fa fa-fw fa-desktop"></i> View Complaint</a>
			<a href="viewdetails.php"><i class="fa fa-fw fa-user"></i> View Profile</a>
			<a href="changepassword.php"><i class="fa fa-fw fa-wrench"></i> Change Password</a>


			'


			;
		}
		
		?>
	</div>


