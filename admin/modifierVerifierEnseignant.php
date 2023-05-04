<?php
	if(isset($_POST["modifier"])){
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$matricule=$_POST["matricule"];
		$matriculeAncien=$_POST["matriculeAncien"];
		$categorie=$_POST["categorie"];
		$email=$_POST["email"];
		$telephone=$_POST["telephone"];
		$connect=connection();
		$requete=$connect->query("UPDATE `verifierenseignant` SET `NumEn`='$matricule',`NomEn`='$nom',`PrenomEn`='$prenom',`Categorie`='$categorie',`Email`='$email',`Telephone`='$telephone' WHERE NumEn='$matriculeAncien';") or $error2="L'enseignant est déjà dans la base de donnée! ";
		$resultat2="L'enseignant est modifié avec succès!!";
	}
?>