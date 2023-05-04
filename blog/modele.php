<?php
	function connection(){
		$connect=new PDO("mysql:host=localhost;dbname=facultemedecine;charset=utf8","root",'') or die("on ne peut pas se connecter au server car il y a un probleme de connection");
		return $connect;
	}
	function ajoutBlog($pseudo,$type,$corps){
		$connect=connection();
		$requete=$connect->prepare("INSERT INTO `blog`(`id`, `pseudo`, `type`, `corps`, `date`) VALUES (:id,:pseudo,:type,:corps,NOW())");
		$id=0;
		$requete->bindParam(":id",$id,PDO::PARAM_INT);
		$requete->bindParam(":pseudo",$pseudo,PDO::PARAM_STR);
		$requete->bindParam(":type",$type,PDO::PARAM_STR);
		$requete->bindParam(":corps",$corps,PDO::PARAM_STR);
		$requete->execute();
		return "votre mot est ajoutée avec succès";
	}
	function listeBlog(){
		$connect=connection();
		$requete=$connect->query("select *from blog group by id asc");
		return $requete;
	}

?>