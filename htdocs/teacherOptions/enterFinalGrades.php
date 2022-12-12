<?php



if(!isset($_GET['username']))
         {
              header("Location: ../index.html");
              exit();
          }

      $username = $_GET['username'];
      $url1 = "teacherOptions.php?username=" . $username;

?>







<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Enter Final Grades</title>
   </head>
   <body>
      <h1>Enter Final Grades<h1>


       




<?php




$servername = '127.0.0.1:3307';
$user = 'root';
$pass = '';
$db = 'student_information_system';

$db = new mysqli($servername, $user, $pass, $db);


$query = "SELECT class.*, student.studentFirstName, student.studentLastName
FROM class
LEFT JOIN student
ON class.studentID = student.studentID
LEFT JOIN teacher 
ON class.teacherID = teacher.teacherID

WHERE (class.grade = '' OR class.grade IS null) AND teacher.teacherID = '$username'"
;
$result = mysqli_query($db, $query);

echo "<table border='1'>
<tr>
<th>Student Name</th>
<th>Student ID</th>
<th>Class Name</th>
<th></th>

</tr>";

   while($rows=mysqli_fetch_assoc($result)) {

      
         echo "<tr>";
         echo "<td>" . $rows['studentFirstName'], " ",$rows['studentLastName'] . "</td>";  
         echo "<td>" . $rows['studentID'] . "</td>";  
         echo "<td>" . $rows['className'] . "</td>";  
         echo "<td><a href='update.php?studentID=$rows[studentID]&teacherID=$username&classID=$rows[classID]&grade=$rows[grade]'>Enter Grade</a></td>";
         echo "</tr>";      
   }
   echo "</table>";
?>







<h2>   <?php echo "<a href='$url1'>Back</a>"; ?> </h2>


   </body>

</html>