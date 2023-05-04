<?php
	require("../modele.php");
	if(isset($_POST["code"])){
	$connect=connection();
	$code=$_POST["code"];
	$requete=$connect->query("DELETE FROM `verifieradministrateur` WHERE codeverifierAd='$code';");
	echo "Le code Admin est supprimé avec succès!!";
	}
?>