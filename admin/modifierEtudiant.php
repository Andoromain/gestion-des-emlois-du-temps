<?php
	require("../modele.php");
	echo modifierEtudiant($_POST["matriculeAncien"],$_POST["username"],$_POST["matricule"],$_POST["nom"],$_POST["prenom"],$_POST["datenais"],$_POST["niveau"],$_POST["parcours"],$_POST["mdp"]);

?>