<?php

if(isset($_SESSION['success']))
{


	echo "welcome".$_SESSION['username'];
	echo"<br><br>";
	echo'<a href="logout">Logout</a>';

}


?>