<?php



if(!isset($_GET['adminID']))
         {
              header("Location: ../index.html");
              exit();
          }

      $adminID = $_GET['adminID'];
      $url = "updateStudentRecords.php?adminID=" . $adminID;
      $url1 = "updateTeacherRecords.php?adminID=" . $adminID;
      $url2 = "adminOptions.php?adminID=" . $adminID;

?>









<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Update Recods</title>
   </head>
   <body>
      

<h1>Update Student or Teacher Records</h1>
<br>
<br>








<h1>   <?php echo "<a href='$url'>Student</a>"; ?> </h1>
<br>
<h1>   <?php echo "<a href='$url1'>Teacher</a>"; ?> </h1>
<br>
<br>
<br>
<h2>   <?php echo "<a href='$url2'>Back</a>"; ?> </h2>




   </body>

</html>