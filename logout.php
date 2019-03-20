<?php
session_start() ;
session_destroy() ;
                if(isset($_SESSION['user']))
                {
                unset($_SESSION['user']);
                }
                
				header( "refresh:1;url=index.php" );
?>