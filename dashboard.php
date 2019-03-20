
<?php
session_start();
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
if ($category != "student"){
$sql3 = "SELECT * from complaint where complaint_category= '$category' ";
$result = mysqli_query($connect, $sql3);
}
else{
	$sql3 = "SELECT * from complaint where admission_number = '$user' ";
	$result = mysqli_query($connect, $sql3);
}
$count_pend = 0;
$count_ans = 0;
$total = 0;
if (mysqli_num_rows($result) > 0) {
	$total = $total + mysqli_num_rows($result);
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
	  }
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Complaint system Dashboard</title>
		<!-- Font Awesome -->
		<link rel = "stylesheet" href = "font-awesome-4.6.3/css/font-awesome.css">
		<!-- Bootstrap core CSS -->
		<link href="MDB/css/bootstrap.min.css" rel="stylesheet">
		<!-- Material Design Bootstrap -->
		<link href="MDB/css/mdb.min.css" rel="stylesheet">
		<!-- chart styles -->
		<link rel="stylesheet" href="circle/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="circle/css/jquery.circliful.css">
		<!-- Your custom styles (optional) -->
		<link href="style.css" rel="stylesheet">
	</head>

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
            Grieviance and Suggestion Management<span class = "system"> System </span> </a></h1>
        
		
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
		<a href='view_complains.php'><i class='fa fa-fw fa-pencil'></i> View All Complaint <span class = 'badge red'>". $no_of_compaints . "</span></</a>
		<a href='allusers.php'><i class='fa fa-fw fa-user'></i> All Users <span class = 'badge red'>". $no_of_users . "</span></a>
		<a href='allstaff.php'><i class='fa fa-fw fa-user-plus'></i> All Staff </a> 
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
<!-- main -->
<main>
<div class = "container-fluid mt-6">
<div class = "row">
<div class = "col-md-3">
</div>
<div class = "col-md-9">
<h2 class = "h2-responsive"> Dashboard <small> Complaints Overview</small></h2>
<hr class="mb-2">
<?php
if ($category!= "student"){
echo

'<div class = "row">
<div class = "col-md-4">
<div class="card warning-color-dark z-depth-2 animated fadeInLeftBig">
        <div class="card-block">
			<p class = " white-text size"><i class="fa fa-user fa-lg" aria-hidden="true"></i><span class = "float-right sensor">'. $no_of_users .' </span></p>
			<p class = "float-left white-text size2">Users </p>
        </div>
    </div>
	
</div>
<div class = "col-md-3"></div>
<div class = "col-md-4">
<div class="card info-color-dark z-depth-2 animated fadeInLeftBig">
        <div class="card-block">
			<p class = " white-text size"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i><span class = "float-right sensor">'. $no_of_compaints .' </span></p>
			<p class = "float-left white-text size2">Complaints </p>
        </div>
    </div>
</div>
</div>
<hr class="mt-3">';
}
echo '<div class = "row">';
if (mysqli_num_rows($result) > 0) {
echo 
'
<div class = "col-md-4">
<div id="circle1"></div>
</div>
<div class = "col-md-4">
<div id="circle2"></div>
</div>
<div class = "col-md-4">
<div id="circle3"></div>
</div>';
}
else{
	echo'<div class = "col-md-4">
<div id="circle4"></div>
</div>';
}
echo '</div>';

?>
</div>
</div>
</main>


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
	<script src="circle/js/jquery.circliful.js"></script>
	<script>
    $( document ).ready(function() { // 6,32 5,38 2,34
		var answer = <?php echo $count_ans ?>;
		var pending = <?php echo $count_pend ?>;
		var total = <?php echo $total ?>;
        $("#circle1").circliful({
            animation: 1,
            animationStep: 2,
			pointSize: 40,
			foregroundColor:'#00C851',
            foregroundBorderWidth: 10,
            backgroundBorderWidth: 10,
            percent: answer,
            textSize: 28,
            textStyle: 'font-size: 12px;',
			noPercentageSign:'false',
			percentageTextSize:25,
            textColor: '#000',
			text: 'Answered Complaints',
            textBelow: true
        });
		        $("#circle2").circliful({
            animation: 1,
            animationStep: 2,
			pointSize: 40,
			foregroundColor:'#CC0000',
            foregroundBorderWidth: 10,
            backgroundBorderWidth: 10,
            percent: pending,
            textSize: 28,
            textStyle: 'font-size: 12px;',
			noPercentageSign:'false',
			percentageTextSize:25,
            textColor: '#000',
			text: 'Pending Complaints',
            textBelow: true
        });
		        $("#circle3").circliful({
            animation: 1,
            animationStep: 2,
			pointSize: 40,
			foregroundColor:'#33b5e5',
            foregroundBorderWidth: 10,
            backgroundBorderWidth: 10,
            percent: total,
            textSize: 28,
            textStyle: 'font-size: 12px;',
			noPercentageSign:'false',
			percentageTextSize:25,
            textColor: '#000',
			text: 'Total Complaints',
            textBelow: true
        });
		        $("#circle4").circliful({
            animation: 1,
            animationStep: 2,
			pointSize: 40,
			foregroundColor:'#ffbb33',
            foregroundBorderWidth: 10,
            backgroundBorderWidth: 10,
            percent: 0,
            textSize: 28,
            textStyle: 'font-size: 12px;',
			noPercentageSign:'false',
			percentageTextSize:25,
            textColor: '#000',
			text: 'No Complaints',
            textBelow: true
        });
	});
	</script>
	</body>
</html>