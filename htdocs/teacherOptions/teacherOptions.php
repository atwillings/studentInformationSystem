<?php



if(!isset($_GET['username']))
         {
              header("Location: ../index.html");
              exit();
          }

      $username = $_GET['username'];
      $url = "enterFinalGrades.php?username=" . $username;
      $url1 = "../index.html";

?>









<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Teacher Options</title>
   </head>
   <body>
      










<h1>   <?php echo "<a href='$url'>Enter Final Grades</a>"; ?> </h1>








<h2>   <?php echo "<a href='$url1'>Back</a>"; ?> </h2>




   </body>

</html>