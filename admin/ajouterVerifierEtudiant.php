<?php
	if(isset($_POST["ajouter"])){
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$matricule=$_POST["matricule"];
		$datenais=$_POST["datenais"];
		$niveau=$_POST["niveau"];
		$parcours=$_POST["parcours"];
		$connect=connection();
		$requete=$connect->query("INSERT INTO `verifieretudiant`(`NumEt`, `NomEt`, `PrenomEt`, `Datenais`, `Niveau`, `Parcours`) VALUES ('$matricule','$nom','$prenom','$datenais','$niveau','$parcours')") or $error1="L'etudiant est déjà dans la base de donnée! ";
		$resultat1="L'étudiant est enregistré avec succès!!";
	}
?>