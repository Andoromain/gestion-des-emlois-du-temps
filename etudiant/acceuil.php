<?php
	session_start();
	if(isset($_SESSION['usernameet']))
	{
		require("acceuilVue.php");
	}else
	{	
		header("Location: ../index.php");
	}
?>	