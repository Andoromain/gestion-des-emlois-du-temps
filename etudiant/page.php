<?php
	session_start();
	if(isset($_SESSION['usernameet']))
	{
		require("pageVue.php");
	}else
	{	
		header("Location: ../index.php");
	}
?>	