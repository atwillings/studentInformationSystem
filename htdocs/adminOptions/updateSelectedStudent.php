<?php
$adminID = $_GET['adminID'];
$studentID = $_GET['studentID'];
$studentPass = $_GET['studentPass'];
$studentFirstName = $_GET['studentFirstName'];
$studentLastName = $_GET['studentLastName'];

$url1 = "updateStudentRecords.php?adminID=" . $adminID;


?>

<html>
<head>
</head>
<body>
<h1>Update Student Information</h1>

<form action="">
	Student ID <input type="number" name="studentID" value="<?php echo $_GET['studentID'] ?>" readonly/>   		<br><br>
	Student Password <input type="text" name="teacherID" value="<?php echo $_GET['studentPass'] ?>"/>   			<br><br>
	Student First Name <input type="text" name="classID" value="<?php echo $_GET['studentFirstName'] ?>"/>    <br><br>
	Student Last Name <input type="text" name="classID" value="<?php echo $_GET['studentLastName'] ?>"/>      <br><br>
  <input type="submit" name="submit" value="submit">
</form>



<?php
if(isset($_GET['submit']))
	{

		$adminID = $_GET['adminID'];
		$studentID = $_GET['studentID'];
		$studentPass = $_GET['studentPass'];
		$studentFirstName = $_GET['studentFirstName'];
		$studentLastName = $_GET['studentLastName'];


		$servername = '127.0.0.1:3307';
		$user = 'root';
		$pass = '';
		$db = 'student_information_system';

		$db = new mysqli($servername, $user, $pass, $db);


		$query = "UPDATE student
		SET
		studentPass = '$studentPass',
		studentFirstName '$studentFirstName',
		studentLastName '$studentLastName'
		WHERE student.studentID = '$studentID'
		;";


		$data = mysqli_query($db, $query);
		if($data)
		{
			echo "Updated!!!";
		}
		else
		{
			echo "Failed...";
		}

	}

?>

<br>
<br>
<br>
<h1>Update Student Grades</h1>
<br>


<?php
$servername = '127.0.0.1:3307';
		$user = 'root';
		$pass = '';
		$db2 = 'student_information_system';

		$db2 = new mysqli($servername, $user, $pass, $db2);

$query2 = "SELECT class.*, student.studentFirstName, student.studentLastName, student.studentPass
FROM class
LEFT JOIN student
ON class.studentID = student.studentID
LEFT JOIN teacher 
ON class.teacherID = teacher.teacherID

WHERE class.studentID = '$studentID'"
;
$result2 = mysqli_query($db2, $query2);

echo "<table border='1'>
<tr>
<th>Class Name</th>
<th>Grade</th>
<th></th>


</tr>";

   while($rows2=mysqli_fetch_assoc($result2)) {

      
         echo "<tr>";
         echo "<td>" . $rows2['className'] . "</td>";  
         echo "<td>" . $rows2['grade'] . "</td>";  
         echo "<td><a href='updateSelectedStudentGrade.php?adminID=$adminID&studentID=$rows2[studentID]&classID=$rows2[classID]&className=$rows2[className]&grade=$rows2[grade]&studentFirstName=$rows2[studentFirstName]&studentLastName=$rows2[studentLastName]&studentPass=$rows2[studentPass]'>Edit</a></td>";
         echo "</tr>";      
   }
   echo "</table>";

?>



<br>
<br>
<br>
<h2>   <?php echo "<a href='$url1'>Back</a>"; ?> </h2>



<body>
</html>