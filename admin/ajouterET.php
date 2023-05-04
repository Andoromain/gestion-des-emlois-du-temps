<?php
	require("../modele.php");
	session_start();
	echo ajouterET($_POST["dateDeb"],$_POST["dateFin"],$_POST["idUniv"],$_SESSION["codead"]);
?>