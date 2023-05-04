<?php
	
	require("../modele.php");
	session_start();
	 echo ajoutEvent($_SESSION["matriculeen"],$_POST["nomEvenement"],$_POST["parcours"],$_POST["niveau"],$_POST["matiere"],$_POST["lieu"],$_POST["repetition"],$_POST["daty"],$_POST["heureDeb"],$_POST["heureFin"],$_POST["dateDeb"],$_POST["dateFin"]);

?>