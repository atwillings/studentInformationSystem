<?php






       if(!isset($_GET['username']))
         {
              header("Location: ../index.html");
              exit();
          }

      $username = $_GET['username'];
      $url0 = "studentOptions.php?username=" . $username;
      
    





?>






<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Credits And GPA</title>
   </head>
   <body>

<h1>Credits And GPA<h1>











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

WHERE class.grade IS NOT null AND class.grade != '' AND student.studentID = '$username' AND class.grade = ('a' OR 'b' OR 'c' OR 'd')
ORDER BY semester"
;
$result = mysqli_query($db, $query);

echo "<table border='1'>
<tr>
<th>Class Name</th>
<th>Semester</th>
<th>Grade</th>
<th>Credits Earned</th>
</tr>";

   while($rows=mysqli_fetch_assoc($result)) {

      
         echo "<tr>";
            echo "<td>" . $rows['className'] . "</td>";
            echo "<td>" . $rows['semester'] . "</td>";
            echo "<td>" . $rows['grade'] . "</td>";
            echo "<td>" . $rows['credits'] . "</td>";
            echo "</tr>";      
   }
   echo "</table>";


?>
<br>
<br>
<?php


$query2 = "SELECT 
   SUM(credits)
FROM class

WHERE class.grade IS NOT null AND class.grade != '' AND class.studentID = '$username' AND class.grade = ('a' OR 'b' OR 'c' OR 'p')
ORDER BY semester"
;
$result2 = mysqli_query($db, $query2);
$credits=mysqli_fetch_assoc($result2);

echo "<table border='1'>
<tr>
<th>Earned Credits</th>
<th>Credits Needed To Graduate</th>
</tr>";
echo "<tr>";
echo "<td>" . $credits['SUM(credits)'] . "</td>";
echo "<td>" . 120 - $credits['SUM(credits)'] . "</td>";
echo "</tr>";
echo "</table>";

?>
<br>
<br>
<?php



$querya = "SELECT COUNT(grade)
FROM class
WHERE class.grade IS NOT null AND class.grade != '' AND class.studentID = '$username' AND class.grade = ('a')
";

$resulta = mysqli_query($db, $querya);
$dataa = mysqli_fetch_assoc($resulta);











$queryb = "SELECT COUNT(grade)
FROM class
WHERE class.grade IS NOT null AND class.grade != '' AND class.studentID = '$username' AND class.grade = ('b')
";

$resultb = mysqli_query($db, $queryb);
$datab = mysqli_fetch_assoc($resultb);












$queryc = "SELECT COUNT(grade)
FROM class
WHERE class.grade IS NOT null AND class.grade != '' AND class.studentID = '$username' AND class.grade = ('c')
";

$resultc = mysqli_query($db, $queryc);
$datac = mysqli_fetch_assoc($resultc);












$queryp = "SELECT COUNT(grade)
FROM class
WHERE class.grade IS NOT null AND class.grade != '' AND class.studentID = '$username' AND class.grade = ('p')
";

$resultp = mysqli_query($db, $queryp);
$datap = mysqli_fetch_assoc($resultp);












$query0 = "SELECT COUNT(classID)
FROM class
WHERE class.grade IS NOT null AND class.grade != '' AND class.studentID = '$username'
";

$result0 = mysqli_query($db, $query0);
$data0 = mysqli_fetch_assoc($result0);




















echo "<table border='1'>
<tr>
<th>GPA</th>
</tr>";

   

      
         echo "<tr>";
            echo "<td>" . (4 * $dataa['COUNT(grade)'] + 3 * $datab['COUNT(grade)'] + 2 * $datac['COUNT(grade)'] + 1 * $datap['COUNT(grade)'])/$data0['COUNT(classID)'] . "</td>";
            echo "</tr>";      
   
   echo "</table>";













?>






<br>
<br>
<br>
<br>

      <h2><?php echo "<a href='$url0'>Back</a>"; ?></h2>






   </body>

</html>