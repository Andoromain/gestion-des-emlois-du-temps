<?php
	session_start();
	if(isset($_SESSION['usernameen']))
	{
		require("acceuilVue.php");
	}else
	{	
		header("Location: ../index.php");
	}
?>	