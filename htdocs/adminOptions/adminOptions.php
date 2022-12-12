<?php



if(!isset($_GET['adminID']))
         {
              header("Location: ../index.html");
              exit();
          }

      $adminID = $_GET['adminID'];
      $url = "createNewUser.php?adminID=" . $adminID;
      $url1 = "addNewClass.php?adminID=" . $adminID;
      $url2 = "updateRecords.php?adminID=" . $adminID;
      $url3 = "../index.html";

?>








<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Admin Options</title>
   </head>
   <body>
      










<h1>   <?php echo "<a href='$url'>Create New User</a>"; ?> </h1>
<br>
<h1>   <?php echo "<a href='$url1'>Add New Class</a>"; ?> </h1>
<br>
<h1>   <?php echo "<a href='$url2'>Update Records</a>"; ?> </h1>
<br>
<br>
<br>
<h2>   <?php echo "<a href='$url3'>Back</a>"; ?> </h2>




   </body>

</html>