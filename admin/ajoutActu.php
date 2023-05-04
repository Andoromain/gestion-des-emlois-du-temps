<?php 
	require("../modele.php");
		if(isset($_POST["ajouterActu"])){
			$extension_autorise=array(".jpg",".jpeg",".png",".bmp",".ico",".JPG",".JPEG",".PNG",".BMP","ICO");
			$titre=$_POST["titre"];
			$contenu=$_POST["contenu"];
			$image="";$image1="";$image2="";$image3="";
		
			if(isset($_FILES["image"])){
				//hasiana anle image
				$target="imagesPub/".basename($_FILES["image"]["name"]);
				$image=$_FILES["image"]["name"];
				echo "ok  ".$image.'<br>';
			}
			if(isset($_FILES["image1"])){
				//hasiana anle image
				$target="imagesPub/".basename($_FILES["image1"]["name"]);
				$image1=$_FILES["image1"]["name"];
				echo "ok 1 ".$image1.'<br>';
			}
			if(isset($_FILES["image2"])){
				//hasiana anle image
				$target="imagesPub/".basename($_FILES["image2"]["name"]);
				$image2=$_FILES["image2"]["name"];
				echo "ok 2 ".$image2.'<br>';
			}
			if(isset($_FILES["image3"])){
				//hasiana anle image
				$target="imagesPub/".basename($_FILES["image3"]["name"]);
				$image3=$_FILES["image3"]["name"];
				echo "ok  3".$image3.'<br>';
			}
			
			$file_extension=strrchr($image,".");
			$file_extension1=strrchr($image1,".");
			$file_extension2=strrchr($image2,".");
			$file_extension3=strrchr($image3,".");
			
			if($titre =="" || $contenu==""){
				$error="le titre ou le contenu est vide!!";
			}else{
				
			}
		
		}
?>