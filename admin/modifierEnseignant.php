<?php
	require("../modele.php");
	echo modifierEnseignantAdmin($_POST["matriculeAncien"],$_POST["username"],$_POST["matricule"],$_POST["nom"],$_POST["prenom"],$_POST["categorie"],$_POST["email"],$_POST["telephone"],$_POST["mdp"]);
?>