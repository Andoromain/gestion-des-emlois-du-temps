<?php
	require("../modele.php");
	$connect=connection();
	$requete=$connect->query("DELETE FROM `verifieretudiant`");
	echo "Tous les etudiants sont supprimés avec succès!";	
?>