<?php
	require("../modele.php");
	if(isset($_POST["ajouter"])){
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$matricule=$_POST["matricule"];
		$categorie=$_POST["categorie"];
		$telephone=$_POST["telephone"];
		$email=$_POST["email"];
		$connect=connection();
		$requete=$connect->query("INSERT INTO `verifierenseignant`(`NumEn`, `NomEn`, `PrenomEn`, `Categorie`, `Email`, `Telephone`) VALUES ('$matricule','$nom','$prenom','$categorie','$email','$telephone')") or $error1="L'enseignant est déjà dans la base de donnée! ";
		$resultat1="L'enseignant est enregistré avec succès!!";
	}
?>