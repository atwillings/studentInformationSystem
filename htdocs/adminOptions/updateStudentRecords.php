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
      <title>Update Student Records</title>
   </head>
   <body>
      <h1>Select A Student<h1>


       




<?php




$servername = '127.0.0.1:3307';
$user = 'root';
$pass = '';
$db = 'student_information_system';

$db = new mysqli($servername, $user, $pass, $db);


$query = "SELECT student.*
FROM student";


$result = mysqli_query($db, $query);

echo "<table border='1'>
<tr>
<th>Student ID</th>
<th>Student Name</th>

</tr>";

   while($rows=mysqli_fetch_assoc($result)) {

      
         echo "<tr>";
         echo "<td>" . $rows['studentID'] . "</td>";  
         echo "<td><a href='updateSelectedStudent.php?adminID=$adminID&studentID=$rows[studentID]&studentFirstName=$rows[studentFirstName]&studentLastName=$rows[studentLastName]&studentPass=$rows[studentPass]'>" . $rows['studentFirstName'], " ",$rows['studentLastName'] . "</a></td>";
         echo "</tr>";      
   }
   echo "</table>";
?>







<h2>   <?php echo "<a href='$url1'>Back</a>"; ?> </h2>


   </body>

</html>