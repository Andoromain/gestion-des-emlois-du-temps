<?php
	session_start();
	if(isset($_SESSION['usernamead']))
	{
		require("acceuilVue.php");
	}else
	{	
		header("Location: ../index.php");
	}
?>	