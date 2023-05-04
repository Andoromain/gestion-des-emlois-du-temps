<?php
	if(isset($_POST["modifier"])){
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$matricule=$_POST["matricule"];
		$matriculeAncien=$_POST["matriculeAncien"];
		$datenais=$_POST["datenais"];
		$niveau=$_POST["niveau"];
		$parcours=$_POST["parcours"];
		$connect=connection();
		$requete=$connect->query("UPDATE `verifieretudiant` SET `NumEt`='$matricule',`NomEt`='$nom',`PrenomEt`='$prenom',`Datenais`='$datenais',`Niveau`='$niveau',`Parcours`='$parcours' WHERE NumEt='$matriculeAncien';") or $error2="L'etudiant est déjà dans la base de donnée! ";
		$resultat2="L'étudiant est modifié avec succès!!";
	}
?>