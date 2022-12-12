<?php
   $connect=mysqli_connect("127.0.0.1:3307", "root", "", "student_information_system") or die("Connection Failed");
   if(isset($_POST['save']))
   {

      $username=$_POST['un'];
      $password=$_POST['pw'];
      $query="select * from student where studentID='$username' and studentPass='$password'";


      $result=mysqli_query($connect,$query);
      $count=mysqli_num_rows($result);
      if($count>0)
         {

            $url = "studentOptions/studentOptions.php?username=" . $username;
            header('Location: ' . $url);

         }
      else
         {
            echo "Login Failed";
         }
   }
?>





<html lang="en">
   <head>
      <title>Student Login</title>
   </head>
   <body>
      <h1>Login<h1>







<form method="post" action="studentLogin.php">
   Enter Student ID <input type="text" name="un"/>
   <br/>
   Enter Password <input type="text" name="pw"/>
   <br/>
   <input type="submit" name="save" value="Login" />
</form>












































      <form action="index.html">
         <button type="submit">Back</button>
      </form>




   </body>

</html>