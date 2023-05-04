<?php
	require("../modele.php");
	session_start();
	if(isset($_SESSION['usernamead']))
	{
		$requete=listeEtudiant();
		require("pageEtudiant.php");	
	}else
	{	
		header("Location: ../index.php");
	}
?>