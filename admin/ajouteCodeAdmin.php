<?php
	require("../modele.php");
	if(isset($_POST["ajouter"])){
		$code=base64_encode($_POST["code"]);
		$connect=connection();
		$requete=$connect->query("INSERT INTO `verifieradministrateur`(`codeverifierAd`) VALUES ('$code')") or $error1="Le code Admin est déjà dans la base de donnée! ";
		$resultat1="Le code Admin est enregistré avec succès!!";
	}
?>