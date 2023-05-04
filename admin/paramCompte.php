<?php
	require("../modele.php");
	echo modifierAdmin($_POST["usernameAncien"],$_POST["codeAdminAncien"],$_POST["codeAdmin"],$_POST["username"],$_POST["mdp"]);
?>