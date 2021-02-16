
<?php
require 'config.php';

   session_start(); // Starting Session
   if(isset($_POST['submit'])) {
    $_SESSION['username'] = $_POST['username'];
    }


    // Define $username and $password
    $user=$_POST['username'];
    $pass=$_POST['password'];

    // To protect MySQL injection for Security purpose
    $user = stripslashes($user);
    $pass = stripslashes($pass);
    $user = mysql_real_escape_string($user);
    $pass = mysql_real_escape_string($pass);



   $query = mysqli_query($conn, "SELECT * FROM `staffTest` WHERE `username` = '$user' AND `password` = '$pass'") 
    or die (mysqli_error()); 

    
    $access = array();

    if ($query->num_rows > 0) {
        // output data of each row
        while($row = $query->fetch_assoc()) {
            $access[] = $row["access"];
        }
    } else {
        echo "0 results";
    }

    
    

   if(!mysqli_num_rows($query))
   header("Location: signin.html");
   else {
        if($access[0] == 0){
            $_SESSION['login_user']=$username; // Initializing Session
            header("Location: admin.php");}
        else
        {
            $_SESSION['login_user']=$username; // Initializing Session
            header("Location: staff.php");  
        }

   }    
   
   
   mysqli_close($conn);

?>