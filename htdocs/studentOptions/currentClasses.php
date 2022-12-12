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
      <title>Current Classes</title>
   </head>









<body>
      <h1>Current Classes<h1>
       
                  


<?php
$servername = '127.0.0.1:3307';
$user = 'root';
$pass = '';
$db = 'student_information_system';

$db = new mysqli($servername, $user, $pass, $db);

$query = "SELECT class.*, student.studentFirstName, student.studentLastName, teacher.teacherFirstName, teacher.teacherLastName
FROM class
LEFT JOIN student
ON class.studentID = student.studentID
LEFT JOIN teacher 
ON class.teacherID = teacher.teacherID

WHERE (class.grade IS null OR class.grade = '') AND student.studentID = '$username'"
;
$result = mysqli_query($db, $query);

echo "<table border='1'>
<tr>
<th>Student Name</th>
<th>Class Name Name</th>
<th>Teacher</th>

</tr>";

	while($rows=mysqli_fetch_assoc($result)) {

    	
    		echo "<tr>";
    		echo "<td>" . $rows['studentFirstName'], " ",$rows['studentLastName'] . "</td>";  
       		echo "<td>" . $rows['className'] . "</td>";  
       		echo "<td>" . $rows['teacherFirstName'], " ", $rows['teacherLastName'] . "</td>";
       		echo "</tr>";      
  	}
  	echo "</table>";
?>




















       <h2><?php echo "<a href='$url'>Back</a>"; ?></h2>


   </body>

</html>