<?php
  
  include("connect.php");
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  
  
  $sql="DELETE FROM auth WHERE username='$delete'  ";
  $sql2="DELETE FROM staff_reg WHERE staff_id='$delete'  ";
  
  

  

    if(mysqli_query($connect,$sql))
    {
      if(mysqli_query($connect,$sql2))
      {
        
        header("Location:allstaff.php");

      }

    }
    else
    {
      echo mysqli_error($connect)."Record not Deleted";
    }
  }
  
?>