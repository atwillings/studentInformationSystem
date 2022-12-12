<?php



if(!isset($_GET['adminID']))
         {
              header("Location: ../index.html");
              exit();
          }

      $adminID = $_GET['adminID'];
      $url1 = "updateRecords.php?adminID=" . $adminID;

?>







<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Update Teacher Records</title>
   </head>
   <body>
      <h1>Select A Teacher<h1>


       




<?php




$servername = '127.0.0.1:3307';
$user = 'root';
$pass = '';
$db = 'student_information_system';

$db = new mysqli($servername, $user, $pass, $db);


$query = "SELECT teacher.*
FROM teacher";


$result = mysqli_query($db, $query);

echo "<table border='1'>
<tr>
<th>Teacher ID</th>
<th>Teacher Name</th>

</tr>";

   while($rows=mysqli_fetch_assoc($result)) {

      
         echo "<tr>";
         echo "<td>" . $rows['teacherID'] . "</td>";  
         echo "<td><a href='updateSelectedTeacher.php?adminID=$adminID&teacherID=$rows[teacherID]&teacherFirstName=$rows[teacherFirstName]&teacherLastName=$rows[teacherLastName]&teacherPass=$rows[teacherPass]'>" . $rows['teacherFirstName'], " ",$rows['teacherLastName'] . "</a></td>";
         echo "</tr>";      
   }
   echo "</table>";
?>







<h2>   <?php echo "<a href='$url1'>Back</a>"; ?> </h2>


   </body>

</html>