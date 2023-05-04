<?php
	require("../modele.php");
	session_start();
	if(isset($_SESSION['usernamead']))
	{
		$requete=listeET();
		require("pageET.php");
		
	}else
	{	
		header("Location: ../index.php");
	}
?>