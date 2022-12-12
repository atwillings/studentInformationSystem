<?php






       if(!isset($_GET['username']))
         {
              header("Location: ../index.html");
              exit();
          }

      $username = $_GET['username'];
      $url1 = "viewFinalGrades.php?username=" . $username;
      $url2 = "currentClasses.php?username=" . $username;
      $url3 = "dropClasses.php?username=" . $username;
      $url4 = "addClasses.php?username=" . $username;
      $url5 = "adminHelp.php?username=" . $username;
      $url6 = "../index.html";
    





?>






<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Student Options</title>
   </head>
   <body>





    <h1>   <?php echo "<a href='$url1'>View Final Grades</a>"; ?> </h1>


<br>

   <h1>    <?php echo "<a href='$url2'>Current Classes</a>"; ?></h1>






<br>
<br>
<br>
<br>

      <h2><?php echo "<a href='$url6'>Back</a>"; ?></h2>






   </body>

</html>