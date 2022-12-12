<?php
if(!isset($_GET['username']))
        {
            header("Location: ../index.html");
            exit();
        }

    $username = $_GET['username'];
    $url = "studentOptions.php?username=" . $username;
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Final Grades</title>
   </head>









<body>
      <h1>Final Grades<h1>
       
                  


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

WHERE class.grade IS NOT null AND class.grade != '' AND student.studentID = '$username'
ORDER BY semester"
;
$result = mysqli_query($db, $query);

echo "<table border='1'>
<tr>
<th>Student Name</th>
<th>Class Name</th>
<th>Semester</th>
<th>Grade</th>
</tr>";

	while($rows=mysqli_fetch_assoc($result)) {

    	
    		echo "<tr>";
    		echo "<td>" . $rows['studentFirstName'], " ",$rows['studentLastName'] . "</td>";  
       		echo "<td>" . $rows['className'] . "</td>";
       		echo "<td>" . $rows['semester'] . "</td>";
       		echo "<td>" . $rows['grade'] . "</td>";
       		echo "</tr>";      
  	}
  	echo "</table>";
?>




















      <h2><?php echo "<a href='$url'>Back</a>";  ?></h2>


   </body>

</html>