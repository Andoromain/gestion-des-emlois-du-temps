<?php
	require("../modele.php");
	if(isset($_POST["matricule"])){
	$connect=connection();
	$matricule=$_POST["matricule"];
	$requete=$connect->query("DELETE FROM `verifierenseignant` WHERE NumEn='$matricule';");
	echo "L'enseignant est supprimé avec succès!!";
	}
?>