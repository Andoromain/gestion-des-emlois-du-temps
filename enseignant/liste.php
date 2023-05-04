<?php
 require("../modele.php");
 session_start();
	if(isset($_GET["parcours"]) && $_GET["niveau"])
	{
		echo ListeEmploiDuTemps2En($_GET["niveau"],$_GET["parcours"]);
	}else{
		echo ListeEmploiDuTemps1En($_SESSION["matriculeen"]);
	}
?>