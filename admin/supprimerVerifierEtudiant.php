<?php
	require("../modele.php");
	if(isset($_POST["matricule"])){
	$connect=connection();
	$matricule=$_POST["matricule"];
	$requete=$connect->query("DELETE FROM `verifieretudiant` WHERE NumEt='$matricule';");
	echo "L'étudiant est supprimé avec succès!!";
	}
?>