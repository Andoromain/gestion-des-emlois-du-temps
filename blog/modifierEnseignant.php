<?php
	require("../modele.php");

	echo modifierEnseignant($_POST["matriculeEnAncien"],$_POST["username"],$_POST["matricule"],$_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["telephone"],$_POST["mdp"]);


?>