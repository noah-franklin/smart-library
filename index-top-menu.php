<?php
// Initialize the session
session_start();
?>


<html>
<head>
 <title> Virtual Library </title> 
</head> 

<BODY>
        <H2> <CENTER> SUNY New Paltz VIRTUAL Library</CENTER> </H2>
	<CENTER><IMG SRC="images/i2.jpg" width="100" height="80"><IMG SRC="images/i1.gif" width="100" height="80"><IMG SRC="images/i3.jpg" width="100" height="80"> </CENTER>       
<?php 
if(!empty($_SESSION["username"])){
echo "<div align=\"right\"><h3>Hello <font color=\"red\">";
echo htmlspecialchars($_SESSION["username"]); 
echo "</font> </h3></div>";
}
?> 

        <HR> <CENTER><b>
		 <a href="DemoData/c01.htm" target="BOT">BROWSE Shelves</a>  |
		 <a href="https://cs.newpaltz.edu/p/f17-07/Project/Dynamic-Mapping(Spring2018)/" target="BOT">LOCATE a Book</a>  |
		 <a href="https://cs.newpaltz.edu/p/f17-07/f20-v1/f20-Dynamic-Mapping/" target="BOT">LOCATE a Book EXPERIMENTAL</a>  |
		 <a href="TrafficAnalysis/" target="BOT">Traffic ANALYSIS</a>  |
		 <a href="register.php" target="BOT">Register</a> | 
		 <a href="login.php" target="BOT">Login</a>  |
		 <a href="logout.php" target="BOT">Logout</a> </CENTER>
	<HR>
	<p>
   </BODY>
</html>

