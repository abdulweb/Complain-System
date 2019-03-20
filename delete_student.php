<?php
  
  include("connect.php");
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  
  
  $sql="DELETE FROM student_reg  WHERE admission_number='$delete' ";
  $sql2="DELETE FROM auth  WHERE username='$delete' ";
  
  

    if(mysqli_query($connect,$sql)){
      if(mysqli_query($connect,$sql2)){
          header("Location:allusers.php");
      }
    }
    else{
      echo mysqli_error($connect)."Record not Deleted";
    }
  }
  
?>