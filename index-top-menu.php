<?php
// Initialize the session
session_start();
?>


<html>
<head>
	<link rel="stylesheet" href="./styles/index.css">
 <title> Virtual Library </title> 
</head> 

<BODY>
        <H2> <CENTER> SUNY New Paltz VIRTUAL Library</CENTER> </H2>
	   
<?php 
if(!empty($_SESSION["username"])){
echo "<div align=\"right\"><h3>Hello <font color=\"red\">";
echo htmlspecialchars($_SESSION["username"]); 
echo "</font> </h3></div>";
}
?> 

        <HR> <CENTER><b>
		 <a href="DemoData/c01.htm" target="BOT">BROWSE Shelves</a>  |
		 <a href="https://cs.newpaltz.edu/p/f17-07/f20-v1/f20-Dynamic-Mapping/" target="BOT">LOCATE a Book EXPERIMENTAL</a>  |
		 <a href="TrafficAnalysis/" target="BOT">Traffic ANALYSIS</a>  |
		 
	<HR>
	<p>
   </BODY>
</html>
