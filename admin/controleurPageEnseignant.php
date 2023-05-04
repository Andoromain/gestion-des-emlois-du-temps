<?php
	require("../modele.php");
	session_start();
	if(isset($_SESSION['usernamead']))
	{
		$requete=listeEnseignant();
		require("pageEnseignant.php");
	}else
	{	
		header("Location: ../index.php");
	}	
	
?>