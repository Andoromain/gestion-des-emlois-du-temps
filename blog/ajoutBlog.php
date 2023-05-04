<?php
	require("modele.php");
	if(isset($_POST["envoyer"])){
		//..//fichierBlog/
		$fichier="";
		if(isset($_FILES["fichier"])){
			$target="../fichier/".basename($_FILES["fichier"]["name"]);
			$fichier=$_FILES["fichier"]["name"];
			move_uploaded_file($_FILES["fichier"]["tmp_name"], $target);
		}
		$connect=connection();
		$requete=$connect->prepare("INSERT INTO `blog`(`id`, `pseudo`, `type`, `corps`,`fichier`, `date`) VALUES (:id,:pseudo,:type,:corps,:fichier,NOW())");
		$id=0;
		$t=base64_encode($_POST["editordata"]);
		$requete->bindParam(":id",$id,PDO::PARAM_INT);
		$requete->bindParam(":pseudo",$_POST["pseudo"],PDO::PARAM_STR);
		$requete->bindParam(":type",$_POST["type"],PDO::PARAM_STR);
		$requete->bindParam(":corps",$t,PDO::PARAM_STR);
		$requete->bindParam(":fichier",$fichier,PDO::PARAM_STR);
		$requete->execute();
	 $msg= "votre mot est ajoutée avec succès";
	}
?>