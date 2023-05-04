<?php
	if(isset($_POST["modifier"])){
		$code=base64_encode($_POST["code"]);
		$codeAncien=base64_encode($_POST["codeAncien"]);
		$connect=connection();
		$requete=$connect->query("UPDATE `verifieradministrateur` SET `codeverifierAd`='$code' WHERE codeverifierAd='$codeAncien'") or $error2="Le code admin est déjà dans la base de donnée! ";
		$resultat2="Le code Admin est modifié avec succès!!";
	}
?>