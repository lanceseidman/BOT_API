<?php 
// Connect to DB...
 $conn=mysqli_connect("localhost","theapi","theapi","theapi");

 // Check connection
   if (mysqli_connect_errno()){
       // Connection failed, report to EU why it failed...
        echo "Error, DB Connection issue... Error returned:<br>" . mysqli_connect_error();

        // Setup Email Alert here when going LIVE...?

        die(); // Kill page...
    }
?>