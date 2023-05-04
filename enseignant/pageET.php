<?php
	session_start();
	if(isset($_SESSION['usernameen']))
	{
		require("pageETVue.php");
	}else
	{	
		header("Location: ../index.php");
	}
?>	