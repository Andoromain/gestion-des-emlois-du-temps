<?php
	session_start();
	if(isset($_SESSION['usernamead']))
	{
		require("pageEvenementEnVue.php");	
	}else
	{	
		header("Location: ../index.php");
	}
	
?>