<?php
	function connection()
	{
		$connect=new PDO("mysql:host=localhost;dbname=facultemedecine;","root",'') or die("on ne peut pas se connecter au server car il y a un probleme de connection");
		//$connect=new PDO("mysql:host=localhost;dbname=facmedfi_facultedemedecine;","facmedfi_facultedemedecine",'') or die("on ne peut pas se connecter au server car il y a un probleme de connection");
		return $connect;
	}
	function connection1()
	{
		$connect=new PDO("mysql:host=localhost;dbname=facultemedecine;charset=utf8","root",'') or die("on ne peut pas se connecter au server car il y a un probleme de connection");
		//$connect=new PDO("mysql:host=localhost;dbname=facmedfi_facultedemedecine;charset=utf8","facmedfi_facultedemedecine",'') or die("on ne peut pas se connecter au server car il y a un probleme de connection");
		return $connect;
	}

	function verificationLoginEnseignant($username,$password)
	{
		$connect=connection();
		$requete=$connect->prepare("select *from enseignant where UsernameEn= :username and MdpEn= :password;") or die("Il y a une erreur");
		$requete->execute(array(':username'=>$username,':password'=>$password));
		$row=$requete->rowCount();
		if($row==1)
		{
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header("location:enseignant/acceuil.html?enseignant");
			exit();
		}else{
			$requete=$connect->prepare("select *from enseignant where UsernameEn= :username ;") or die("Il y a une erreur");
			$requete->execute(array(':username'=>$username));
			$row=$requete->rowCount();
			if($row==1){
				return "Votre mot de passe est invalide! <style>#password{box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px red;}</style>";
			}
		}
	}
	function verificationLoginEtudiant($username,$password)
	{
		$connect=connection();
		$requete=$connect->prepare("select *from etudiant where UsernameEt= :username and MdpEt= :password;") or die("Il y a une erreur");
		$requete->execute(array(':username'=>$username,':password'=>$password));
		$row=$requete->rowCount();
		if($row==1)
		{
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header("location:etudiant/acceuil.html?etudiant");
			exit();
		}else{
			$requete=$connect->prepare("select *from etudiant where UsernameEt= :username ;") or die("Il y a une erreur");
			$requete->execute(array(':username'=>$username));
			$row=$requete->rowCount();
			if($row==1){
				return "Votre mot de passe est invalide! <style>#password{box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px red;}</style>";
			}
		}
	}

	function verificationLoginAdmin($username,$password)
	{

		$connect=connection();
		$requete=$connect->prepare("select *from administrateur where UsernameAdmin= :username and MdpAdmin= :password;") or die("Il y a une erreur");
		$requete->execute(array(':username'=>$username,':password'=>$password));
		$row=$requete->rowCount();
		if($row==1)
		{
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header("location:admin/acceuil.html?admin");
			exit();
		}else{
			$requete=$connect->prepare("select *from administrateur where UsernameAdmin= :username ;") or die("Il y a une erreur");
			$requete->execute(array(':username'=>$username));
			$row=$requete->rowCount();
			if($row==1){
				return "Votre mot de passe est invalide!<style>#password{box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px red;}</style>";
			}
		}
	}


	function verificationLogin($username,$password)
	{
		$verifEt=verificationLoginEtudiant($username,$password);
		$verifEn=verificationLoginEnseignant($username,$password);
		$verifAdmin=verificationLoginAdmin($username,$password);


		if(isset($verifEt)){
			return $verifEt;
		}else if(isset($verifEn)){
			return $verifEn;
		}else if(isset($verifAdmin)){
			return $verifAdmin;
		}else{
			return "Vous n'etes pas encore inscrit dans la base de donnee !!";
		}

	}
	function envoyerLogin($username,$password)
	{
		if(!empty($username)&&!empty($password))
		{
			return verificationLogin($username,$password);
		}else
		{
			if(!empty($username))
			{
				return "Votre mot de passe est vide!<style>#password{box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px red;}</style>";
			}else if(!empty($password))
			{
				return "Votre username est vide!<style>#username{box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px red;}</style>";
			}
			else {return "vos login sont vide! <style>#username,#password{box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px red;}</style> ";}
		}
	}
	function listeEtudiant()
	{
		$connect=connection();
		$requete=$connect->query("select *from etudiant group by matriculeet asc;");
		return $requete;
	}
	function listeEnseignant()
	{
		$connect=connection();
		$requete=$connect->query("select *from enseignant group by matriculeen asc;");
		return $requete;
	}
	function listeEmploiduTemps()
	{
		$connect=connection();
		$requete=$connect->query("select *from emploi_du_temps ;");
		return $requete;
	}
	function modifierEtudiant($matriculeAncien,$username,$matricule,$nom,$prenom,$datenais,$niveau,$parcours,$mdp)
	{
		$connect=connection();
		$mdp1=base64_encode($mdp);
		$requete2=$connect->prepare("SELECT USERNAMEEN from enseignant WHERE USERNAMEEN=? union select USERNAMEADMIN from  administrateur where USERNAMEADMIN=? ;");
		$requete2->execute(array($username,$username));
		$usernameexist = $requete2->rowCount();

		if($usernameexist == 0)
		{
		$requete=$connect->prepare("update etudiant set MATRICULEET=:matricule,NOMET=:nom,PRENOMET=:prenom,USERNAMEET=:username,CODENIV=:niveau,CODEP=:parcours,MDPET=:mdp,DATENAIS=:datenais where MATRICULEET=:matriculeAncien;");
				$requete->bindParam(":matricule",$matricule,PDO::PARAM_STR);
				$requete->bindParam(":nom",$nom,PDO::PARAM_STR);
				$requete->bindParam(":prenom",$prenom,PDO::PARAM_STR);
				$requete->bindParam(":username",$username,PDO::PARAM_STR);
				$requete->bindParam(":niveau",$niveau,PDO::PARAM_STR);
				$requete->bindParam(":parcours",$parcours,PDO::PARAM_STR);
				$requete->bindParam(":mdp",$mdp1,PDO::PARAM_STR);
				$requete->bindParam(":datenais",$datenais,PDO::PARAM_STR);
				$requete->bindParam(":matriculeAncien",$matriculeAncien,PDO::PARAM_STR);
			$requete->execute()or die("le matricule que vous venez modifié est deja prise!");
			return "l'etudiant est modifie avec success!";
		}else{
			return "L'username est déjà occupé par un autre utilisateur!";
		}

	}

	function modifierEnseignant($matriculeAncien,$username,$matricule,$nom,$prenom,$email,$telephone,$mdp)
	{
		$connect=connection();

		$mdp1=base64_encode($mdp);
		$requete2=$connect->prepare("SELECT USERNAMEET from etudiant WHERE USERNAMEET=? union select USERNAMEADMIN from  administrateur where USERNAMEADMIN=? ;");
		$requete2->execute(array($username,$username)) or die("erreur");
		$usernameexist = $requete2->rowCount();//counte Nbre de colone

		if($usernameexist == 0)
		{

		$requete=$connect->prepare("update enseignant set MATRICULEEN=:matricule,NOMEN=:nom,PRENOMEN=:prenom,USERNAMEEN=:username,EMAILEN=:email,MDPEN=:mdp,TELEPHONEEN=:telephone where MATRICULEEN=:matriculeAncien;");
				$requete->bindParam(":matricule",$matricule,PDO::PARAM_STR);
				$requete->bindParam(":nom",$nom,PDO::PARAM_STR);
				$requete->bindParam(":prenom",$prenom,PDO::PARAM_STR);
				$requete->bindParam(":username",$username,PDO::PARAM_STR);
				$requete->bindParam(":email",$email,PDO::PARAM_STR);
				$requete->bindParam(":mdp",$mdp1,PDO::PARAM_STR);
				$requete->bindParam(":telephone",$telephone,PDO::PARAM_STR);
				$requete->bindParam(":matriculeAncien",$matriculeAncien,PDO::PARAM_STR);
			$requete->execute()or die("le matricule que vous venez modifié est deja prise!");
		$requete3=$connect->query("update joindre set MATRICULEEN='$matricule' where MATRICULEEN='$matriculeAncien'");

			return "l'enseignant est modifie avec success!";


		}else{
			return "L'username est déjà occupé par un autre utilisateur!";
		}
	}

	function modifierEnseignantAdmin($matriculeAncien,$username,$matricule,$nom,$prenom,$categorie,$email,$telephone,$mdp)
	{
		$connect=connection();

		$mdp1=base64_encode($mdp);
		$requete2=$connect->prepare("SELECT USERNAMEET from etudiant WHERE USERNAMEET=? union select USERNAMEADMIN from  administrateur where USERNAMEADMIN=? ;");
		$requete2->execute(array($username,$username)) or die("erreur");
		$usernameexist = $requete2->rowCount();//counte Nbre de colone

		if($usernameexist == 0)
		{

		$requete=$connect->prepare("update enseignant set MATRICULEEN=:matricule,NOMEN=:nom,PRENOMEN=:prenom,USERNAMEEN=:username,CODECAT=:categorie,EMAILEN=:email,MDPEN=:mdp,TELEPHONEEN=:telephone where MATRICULEEN=:matriculeAncien;");
				$requete->bindParam(":matricule",$matricule,PDO::PARAM_STR);
				$requete->bindParam(":nom",$nom,PDO::PARAM_STR);
				$requete->bindParam(":prenom",$prenom,PDO::PARAM_STR);
				$requete->bindParam(":username",$username,PDO::PARAM_STR);
				$requete->bindParam(":email",$email,PDO::PARAM_STR);
				$requete->bindParam(":mdp",$mdp1,PDO::PARAM_STR);
				$requete->bindParam(":categorie",$categorie,PDO::PARAM_STR);
				$requete->bindParam(":telephone",$telephone,PDO::PARAM_STR);
				$requete->bindParam(":matriculeAncien",$matriculeAncien,PDO::PARAM_STR);
			$requete->execute()or die("le matricule que vous venez modifié est deja prise!");
			return "l'enseignant est modifie avec success!";

		}else{
			return "L'username est déjà occupé par un autre utilisateur!";
		}
	}





	function suppressionEtudiant($matricule)
	{
		$connect=connection();
		$requete=$connect->prepare("delete from etudiant where MATRICULEET=:matricule;");
		$requete->bindParam(":matricule",$matricule,PDO::PARAM_STR);
		$requete->execute();
		return "l' etudiant est supprime avec success!";
	}
	function suppressionEnseignant($matricule)
	{
		$connect=connection();
		$requete1=$connect->prepare("delete from joindre where MATRICULEEN=:matricule;");
		$requete1->bindParam(":matricule",$matricule,PDO::PARAM_STR);
		$requete1->execute();

		$requete=$connect->prepare("delete from enseignant where MATRICULEEN=:matricule;");
		$requete->bindParam(":matricule",$matricule,PDO::PARAM_STR);
		$requete->execute();
		return "l' enseignant est supprime avec success!";

	}
	function ListeEmploiDuTemps1En($matricule)
	{
		$connect=connection();
		$data=array();
		$query="select joindre.id,enseignant.EMAILEN, joindre.MATRICULEEN,parcours.LIBELLEP,parcours.CODEP,emploi_du_temps.CODENIV,matiere.LIBELLEMAT,joindre.DATE,joindre.LIEU,joindre.NOMEVENEMENT,joindre.HEURED,joindre.HEUREF,joindre.REPETITION,joindre.DATEDEB,joindre.DATEFIN from emploi_du_temps,joindre,matiere,parcours,enseignant where joindre.CODEMAT=matiere.CODEMAT and joindre.CODEET=emploi_du_temps.CODEET  and joindre.MATRICULEEN=enseignant.MATRICULEEN and matiere.CODEMAT=joindre.CODEMAT and parcours.CODEP=emploi_du_temps.CODEP and joindre.MATRICULEEN=:matricule ;";
		$statement=$connect->prepare($query);
		$statement->bindParam(":matricule",$matricule,PDO::PARAM_STR);
		$statement->execute() or die("erreur");
		$result=$statement->fetchAll();
		foreach ($result as $row) {
			if($row["REPETITION"]==7){
				$data[]=array(
					'id'	=> $row["id"],
					'title'	=> $row["NOMEVENEMENT"],
					'matricule' => $row["MATRICULEEN"],
					'email' => $row["EMAILEN"],
					'codeP'   => $row["CODEP"],
					'libelleP'   => $row["LIBELLEP"],
					'codeNiv'   => $row["CODENIV"],
					'libelleMat'   => $row["LIBELLEMAT"],
					'date'   => $row["DATE"],
					'lieu'   => $row["LIEU"],
					'start'   => $row["HEURED"],
					'heureDeb' => $row["HEURED"],
					'end'   => $row["HEUREF"],
					'heureFin' => $row["HEUREF"],
					'dow' => "[".date_format(date_create($row["DATE"]),"w")."]",
					'dowstart' => $row["DATEDEB"],
					'dowend' => $row["DATEFIN"],
					'repetition'   => $row["REPETITION"],
					'dateDeb'   => $row["DATEDEB"],
					'dateFin'   => $row["DATEFIN"],
				);
			}else{
				$data[]=array(
					'id'	=> $row["id"],
					'title'	=> $row["NOMEVENEMENT"],
					'matricule' => $row["MATRICULEEN"],
					'email' => $row["EMAILEN"],
					'codeP'   => $row["CODEP"],
					'libelleP'   => $row["LIBELLEP"],
					'codeNiv'   => $row["CODENIV"],
					'libelleMat'   => $row["LIBELLEMAT"],
					'date'   => $row["DATE"],
					'lieu'   => $row["LIEU"],
					'start'   => $row["DATE"]."T".$row["HEURED"],
					'heureDeb' => $row["HEURED"],
					'end'   => $row["DATE"]."T".$row["HEUREF"],
					'heureFin' => $row["HEUREF"],
					'repetition'   => $row["REPETITION"],
					'dateDeb'   => $row["DATEDEB"],
					'dateFin'   => $row["DATEFIN"],
				);
			}
		}
		return json_encode($data);
	}

	function ListeEmploiDuTemps2En($niveau,$parcours)
	{
		$connect=connection();
		$data=array();
		$query="select joindre.id, joindre.MATRICULEEN,enseignant.NOMEN,enseignant.PRENOMEN,enseignant.EMAILEN,parcours.LIBELLEP,parcours.CODEP,emploi_du_temps.CODENIV,matiere.LIBELLEMAT,joindre.DATE,joindre.LIEU,joindre.NOMEVENEMENT,joindre.HEURED,joindre.HEUREF,joindre.REPETITION,joindre.DATEDEB,joindre.DATEFIN from emploi_du_temps,joindre,matiere,parcours,enseignant where joindre.CODEMAT=matiere.CODEMAT and joindre.CODEET=emploi_du_temps.CODEET  and matiere.CODEMAT=joindre.CODEMAT and parcours.CODEP=emploi_du_temps.CODEP and joindre.MATRICULEEN=enseignant.MATRICULEEN and emploi_du_temps.CODENIV=:niveau and emploi_du_temps.CODEP=:parcours order by joindre.id;";
		$statement=$connect->prepare($query);
		$statement->bindParam(":niveau",$niveau,PDO::PARAM_STR);
		$statement->bindParam(":parcours",$parcours,PDO::PARAM_STR);
		$statement->execute();
		$result=$statement->fetchAll();
		foreach ($result as $row) {
			if($row["REPETITION"]==7){
				$data[]=array(
					'id'	=> $row["id"],
					'title'	=> $row["NOMEVENEMENT"],
					'nom' => $row["NOMEN"]."  ".$row["PRENOMEN"],
					'matricule' => $row["MATRICULEEN"],
					'email' => $row["EMAILEN"],
					'codeP'   => $row["CODEP"],
					'libelleP'   => $row["LIBELLEP"],
					'codeNiv'   => $row["CODENIV"],
					'libelleMat'   => $row["LIBELLEMAT"],
					'date'   => $row["DATE"],
					'lieu'   => $row["LIEU"],
					'start'   => $row["HEURED"],
					'heureDeb' => $row["HEURED"],
					'end'   => $row["HEUREF"],
					'heureFin' => $row["HEUREF"],
					'dow' => "[".date_format(date_create($row["DATE"]),"w")."]",
					'dowstart' => $row["DATEDEB"],
					'dowend' => $row["DATEFIN"],
					'repetition'   => $row["REPETITION"],
					'dateDeb'   => $row["DATEDEB"],
					'dateFin'   => $row["DATEFIN"],
				);
			}else{
				$data[]=array(
					'id'	=> $row["id"],
					'title'	=> $row["NOMEVENEMENT"],
					'nom' => $row["NOMEN"]."  ".$row["PRENOMEN"],
					'matricule' => $row["MATRICULEEN"],
					'email' => $row["EMAILEN"],
					'codeP'   => $row["CODEP"],
					'libelleP'   => $row["LIBELLEP"],
					'codeNiv'   => $row["CODENIV"],
					'libelleMat'   => $row["LIBELLEMAT"],
					'date'   => $row["DATE"],
					'lieu'   => $row["LIEU"],
					'start'   => $row["DATE"]."T".$row["HEURED"],
					'heureDeb' => $row["HEURED"],
					'end'   => $row["DATE"]."T".$row["HEUREF"],
					'heureFin' => $row["HEUREF"],
					'repetition'   => $row["REPETITION"],
					'dateDeb'   => $row["DATEDEB"],
					'dateFin'   => $row["DATEFIN"],
				);
			}
		}
		return json_encode($data);
	}


	function verificationMatiere($matiere,$matricule)
	{
		$connect=connection();
		$requete=$connect->prepare("select LIBELLEMAT from matiere where MATRICULEEN=:matricule ;");
		$requete->bindParam(":matricule",$matricule,PDO::PARAM_STR);
		$requete->execute();
		$result=$requete->fetchAll();
		$nombre=0;
		foreach ($result as $row) {
			if($matiere==$row["LIBELLEMAT"]){
				$nombre=$nombre+1;
			}
		}
		return $nombre;
	}

	function ajoutMatiere($matricule,$matiere)
	{
		$prim=substr($matiere,0,3);
		$der=substr ($matiere, strlen($matiere) - 2,2);
		$codeMat=$prim.$der;

		$connect=connection();
		$requete=$connect->prepare("insert into matiere values(:codeMat,:matricule,:matiere);");
		$requete->bindParam(":codeMat",$codeMat,PDO::PARAM_STR);
		$requete->bindParam("matricule",$matricule,PDO::PARAM_STR);
		$requete->bindParam("matiere",$matiere,PDO::PARAM_STR);
		$requete->execute();

		return $codeMat;
	}
	function ajoutJoindre($codeEt,$codeMat,$matricule,$nomEvenement,$parcours,$niveau,$matiere,$lieu,$repetition,$daty,$heureDeb,$heureFin,$dateDeb,$dateFin){

		$connect=connection();
		$requete=$connect->prepare("INSERT INTO `joindre`(`id`, `MATRICULEEN`, `CODEET`, `CODEMAT`, `DATE`, `LIEU`, `NOMEVENEMENT`, `HEURED`, `HEUREF`, `REPETITION`, `DATEDEB`, `DATEFIN`) VALUES(:id,:matricule,:codeEt,:codeMat,:daty,:lieu,:nomEvenement,:heureDeb,:heureFin,:repetition,:dateDeb,:dateFin);");

		$id=0;
		if($dateDeb=="" || $dateFin==""){
			$dateDeb=NULL;$dateFin=NULL;
		}

		$requete->bindParam(":id",$id,PDO::PARAM_INT);
		$requete->bindParam(":matricule",$matricule,PDO::PARAM_STR);
		$requete->bindParam(":codeEt",$codeEt,PDO::PARAM_STR);
		$requete->bindParam(":codeMat",$codeMat,PDO::PARAM_STR);
		$requete->bindParam(":daty",$daty,PDO::PARAM_STR);
		$requete->bindParam(":lieu",$lieu,PDO::PARAM_STR);
		$requete->bindParam(":nomEvenement",$nomEvenement,PDO::PARAM_STR);
		$requete->bindParam(":heureDeb",$heureDeb,PDO::PARAM_STR);
		$requete->bindParam(":heureFin",$heureFin,PDO::PARAM_STR);
		$requete->bindParam(":repetition",$repetition,PDO::PARAM_INT);
		$requete->bindParam(":dateDeb",$dateDeb,PDO::PARAM_STR);
		$requete->bindParam(":dateFin",$dateFin,PDO::PARAM_STR);

		$requete->execute() or die("erreur");
		return "Votre evenement est ajoutée avec succes! ";
	}

	function ajoutEvent($matricule,$nomEvenement,$parcours,$niveau,$matiere,$lieu,$repetition,$daty,$heureDeb,$heureFin,$dateDeb,$dateFin){
		$id="0";
		$nombre=verificationMatiere($matiere,$matricule);

		if($nombre==0)
		{
			//mblola tsy anaty  bD ni matiere

			$codeMat=ajoutMatiere($matricule,$matiere);
			$codeEt=obtenirCODEET($parcours,$niveau,$daty);

			if(strlen($codeEt)<=30)
			{
				if(verificationEmploiDuTemps($id,$matricule,$codeEt,$heureDeb,$heureFin,$daty)=="ok")
				{

					return ajoutJoindre($codeEt,$codeMat,$matricule,$nomEvenement,$parcours,$niveau,$matiere,$lieu,$repetition,$daty,$heureDeb,$heureFin,$dateDeb,$dateFin);


				}else{
					return verificationEmploiDuTemps($id,$matricule,$codeEt,$heureDeb,$heureFin,$daty);
				}


			}else{
				return $codeEt;
			}

		}else{
			//efa anaty bD ni matiere

			$connect=connection();
			$requete=$connect->prepare("select CODEMAT from matiere where LIBELLEMAT=:matiere;");
			$requete->bindParam(":matiere",$matiere,PDO::PARAM_STR);
			$requete->execute();
			$result=$requete->fetchAll();
			foreach ($result as $row)
			{
				$codeMat=$row["CODEMAT"];
			}

			$codeEt=obtenirCODEET($parcours,$niveau,$daty);

			if(strlen($codeEt)<=30)
			{
				if(verificationEmploiDuTemps($id,$matricule,$codeEt,$heureDeb,$heureFin,$daty)=="ok")
				{
					return ajoutJoindre($codeEt,$codeMat,$matricule,$nomEvenement,$parcours,$niveau,$matiere,$lieu,$repetition,$daty,$heureDeb,$heureFin,$dateDeb,$dateFin);

				}else{
					return verificationEmploiDuTemps($id,$matricule,$codeEt,$heureDeb,$heureFin,$daty);
				}


			}else{
				return $codeEt;
			}
		}
	}
	function modifierEvent($matricule,$id,$nomEvenement,$parcours,$niveau,$matiere,$lieu,$repetition,$daty,$heureDeb,$heureFin,$dateDeb,$dateFin)
	{
		$nombre=verificationMatiere($matiere,$matricule);

		if($nombre==0){
			//mblola tsy anaty  bD ni matiere

			$codeMat=ajoutMatiere($matricule,$matiere);
			$codeEt=obtenirCODEET($parcours,$niveau,$daty);

			if(strlen($codeEt)<=30)
			{
				if(verificationEmploiDuTemps($id,$matricule,$codeEt,$heureDeb,$heureFin,$daty)=="ok")
				{
					return	modifierJoindre($id,$codeEt,$codeMat,$matricule,$nomEvenement,$parcours,$niveau,$matiere,$lieu,$repetition,$daty,$heureDeb,$heureFin,$dateDeb,$dateFin);

				}else{
					return verificationEmploiDuTemps($matricule,$codeEt,$heureDeb,$heureFin,$daty);
				}

			}else{
				return $codeEt;
			}
		}else{
			//efa anaty base de donnee ni matiere
			$connect=connection();
			$requete=$connect->prepare("select CODEMAT from matiere where LIBELLEMAT=:matiere;");
			$requete->bindParam(":matiere",$matiere,PDO::PARAM_STR);
			$requete->execute();
			$result=$requete->fetchAll();
			foreach ($result as $row)
			{
				$codeMat=$row["CODEMAT"];
			}

			$codeEt=obtenirCODEET($parcours,$niveau,$daty);

			if(strlen($codeEt)<=30)
			{
				if(verificationEmploiDuTemps($id,$matricule,$codeEt,$heureDeb,$heureFin,$daty)=="ok")
				{
					return modifierJoindre($id,$codeEt,$codeMat,$matricule,$nomEvenement,$parcours,$niveau,$matiere,$lieu,$repetition,$daty,$heureDeb,$heureFin,$dateDeb,$dateFin);
				}else{
					return verificationEmploiDuTemps($id,$matricule,$codeEt,$heureDeb,$heureFin,$daty);
				}

			}else{
				return $codeEt;
			}
		}
	}
	function modifierJoindre($id,$codeEt,$codeMat,$matricule,$nomEvenement,$parcours,$niveau,$matiere,$lieu,$repetition,$daty,$heureDeb,$heureFin,$dateDeb,$dateFin){
		if($dateDeb=="" && $dateFin==""){
			$dateDeb=NULL;
			$dateFin=NULL;
		}
		$connect=connection();
		$requete1=$connect->prepare("update joindre set CODEET=:codeEt , CODEMAT=:codeMat,MATRICULEEN=:matricule,NOMEVENEMENT=:nomEvenement,LIEU=:lieu,REPETITION=:repetition,DATE=:daty,HEURED=:heureDeb,HEUREF=:heureFin,DATEDEB=:dateDeb,DATEFIN=:dateFin where id=:id;");
		$requete1->bindParam(":id",$id,PDO::PARAM_INT);
		$requete1->bindParam(":codeEt",$codeEt,PDO::PARAM_STR);
		$requete1->bindParam(":codeMat",$codeMat,PDO::PARAM_STR);
		$requete1->bindParam(":matricule",$matricule,PDO::PARAM_STR);
		$requete1->bindParam(":daty",$daty,PDO::PARAM_STR);
		$requete1->bindParam(":lieu",$lieu,PDO::PARAM_STR);
		$requete1->bindParam(":nomEvenement",$nomEvenement,PDO::PARAM_STR);
		$requete1->bindParam(":heureDeb",$heureDeb,PDO::PARAM_STR);
		$requete1->bindParam(":heureFin",$heureFin,PDO::PARAM_STR);
		$requete1->bindParam(":repetition",$repetition,PDO::PARAM_INT);
		$requete1->bindParam(":dateDeb",$dateDeb,PDO::PARAM_STR);
		$requete1->bindParam(":dateFin",$dateFin,PDO::PARAM_STR);

		$requete1->execute() or die("erreur");
		return "Votre evenement est modifie avec succes! ";

	}


	//manao verification oe ni perode ve occupe sa tsia
	function verificationEmploiDuTemps($id,$matricule,$codeEt,$heureDeb,$heureFin,$daty)
	{
		//miselectionne parcours niveau apenarnle prof amnio
		//select emploi_du_temps.CODEP,emploi_du_temps.CODENIV ,joindre.HEURED,joindre.HEUREF from joindre,enseignant,emploi_du_temps where joindre.CODEET=emploi_du_temps.CODEET and enseignant.MATRICULEEN=444444 and joindre.DATE="2020-03-12"
		$verif=0;
		$connect=connection();
		$requete1=$connect->prepare("select emploi_du_temps.CODEP,emploi_du_temps.CODENIV ,joindre.HEURED,joindre.HEUREF from joindre,enseignant,emploi_du_temps where joindre.CODEET=emploi_du_temps.CODEET and enseignant.MATRICULEEN=:matricule and joindre.DATE=:daty");
		$requete1->bindParam(":matricule",$matricule,PDO::PARAM_STR);
		$requete1->bindParam(":daty",$daty,PDO::PARAM_STR);
		$requete1->execute();
		
		while($row1=$requete1->fetch()){
			if($heureDeb < $row1["HEUREF"] && $row1["HEURED"] < $heureFin)
			{
				$verif=1;
			}
		}
		if($verif==1){
			return "Votre emplois du temps sur ces heures sont déjà occupé!";
		}else{
		$requete=$connect->prepare("select enseignant.MATRICULEEN, enseignant.NOMEN,enseignant.PRENOMEN,joindre.HEURED,joindre.HEUREF from enseignant,joindre where  joindre.MATRICULEEN=enseignant.MATRICULEEN and joindre.DATE=:daty and joindre.id <> :id and joindre.CODEET=:codeEt;");
		$requete->bindParam(":daty",$daty,PDO::PARAM_STR);
		$requete->bindParam(":id",$id,PDO::PARAM_INT);
		$requete->bindParam(":codeEt",$codeEt,PDO::PARAM_STR);
		$requete->execute();
		$result=$requete->fetchAll();

		foreach ($result as $row){
			if($heureDeb < $row["HEUREF"] && $row["HEURED"] < $heureFin)
			{
				if($row["MATRICULEEN"]==$matricule){
					return "Cette heure est deja prise par vous!!";
				}else{
					return "Cette heure est deja occupe par l'enseignant ".$row["NOMEN"]." ".$row["PRENOMEN"]."!";
				}
			}
		}
		// tstartA<tstartB&&tstartB<tEndA
		// bool overlap=a.start<b.end && b.start<b.end;
		return "ok";
		}
	}


	//manao verification oe anaty n periode io v le evenement selectione ni papianatra

	function obtenirIDAnneeUniversitaire($daty)
	{
		$annee=substr($daty,0,4);
		$connect=connection();
		$requete=$connect->prepare("select ID_ANNEEUNIV from anneeuniversitaire where DEBUTUNIV=:annee;");
		$requete->bindParam(":annee",$annee,PDO::PARAM_STR);
		$requete->execute();
		while($result=$requete->fetch())
		{
			return $result["ID_ANNEEUNIV"];
		}
	}
	function obtenirCODEET($parcours,$niveau,$daty){

		$idUniv=obtenirIDAnneeUniversitaire($daty);

		$connect=connection();
		$requete=$connect->prepare("select * from emploi_du_temps where CODEP=:parcours and CODENIV=:niveau and ID_ANNEEUNIV=:id;");

		$requete->bindParam(":parcours",$parcours,PDO::PARAM_STR);
		$requete->bindParam(":niveau",$niveau,PDO::PARAM_STR);
		$requete->bindParam(":id",$idUniv,PDO::PARAM_INT);

		$requete->execute();

		while($result=$requete->fetch())
		{
			if($daty<=$result["DATEFIN"] && $daty>=$result["DATEDEBUT"]){
				return $result["CODEET"];
			}
		}
		return "L'emploi du temps dans ce jour n'est pas encore attribue par l'admin!";
	}


	//niovako tato
	function obtenirCODEETEtudiant($parcours,$niveau,$daty){

		$idUniv=obtenirIDAnneeUniversitaire($daty);

		$connect=connection();
		$requete=$connect->prepare("select * from emploi_du_temps where CODEP=:parcours and CODENIV=:niveau and ID_ANNEEUNIV=:id;");

		$requete->bindParam(":parcours",$parcours,PDO::PARAM_STR);
		$requete->bindParam(":niveau",$niveau,PDO::PARAM_STR);
		$requete->bindParam(":id",$idUniv,PDO::PARAM_INT);

		$requete->execute();

		while($result=$requete->fetch())
		{
			if($daty<=$result["DATEFIN"] ){
				return $result["CODEET"];
			}
		}
		return "L'emploi du temps dans ce jour n'est pas encore attribue par l'admin!";
	}

	function supprimerJoindre($id)
	{
		$connect=connection();
		$requete=$connect->prepare("delete from joindre where id=:id;");
		$requete->bindParam(":id",$id,PDO::PARAM_INT);
		$requete->execute();
		return "votre evenement est supprimée avec success!";
	}


	//niova tato

	//emploi du temps ho an'i etudiant
	function listeEmploiduTempsEtudiant($niveau,$parcours){
		$daty= date("Y-m-d");

		//niova koa
		$codeEt=obtenirCODEETEtudiant($parcours,$niveau,$daty);
		$data=array();

		$connect=connection();
		$query="select enseignant.NOMEN,enseignant.PRENOMEN,matiere.LIBELLEMAT,joindre.LIEU,joindre.DATE,joindre.HEURED,joindre.HEUREF,joindre.REPETITION,joindre.DATEDEB,joindre.DATEFIN from enseignant,matiere,joindre where enseignant.MATRICULEEN=joindre.MATRICULEEN and matiere.CODEMAT=joindre.CODEMAT and joindre.CODEET=:codeEt ;";
		$statement=$connect->prepare($query);
		$statement->bindParam(":codeEt",$codeEt,PDO::PARAM_STR);
		$statement->execute();
		$result=$statement->fetchAll();
		foreach ($result as $row) {
			if($row["REPETITION"]==7){
				$data[]=array(
					'title'	=> "matiere : ".$row["LIBELLEMAT"],
					'nomEn'=> $row["NOMEN"]." ".$row["PRENOMEN"],
					'date'   => $row["DATE"],
					'lieu'   => $row["LIEU"],
					'start'   => $row["HEURED"],
					'end'   => $row["HEUREF"],
					'dow' => "[".date_format(date_create($row["DATE"]),"w")."]",
					'dowstart' => $row["DATEDEB"],
					'dowend' => $row["DATEFIN"],
				);
			}else{
				$data[]=array(
					'title'	=> "matiere : ".$row["LIBELLEMAT"],
					'nomEn'=> $row["NOMEN"]." ".$row["PRENOMEN"],
					'date'   => $row["DATE"],
					'lieu'   => $row["LIEU"],
					'start'   => $row["DATE"]."T".$row["HEURED"],
					'end'   => $row["DATE"]."T".$row["HEUREF"],
				);
			}
		}
		return json_encode($data);
		//return $codeEt;
	}
	//miova manaraka

	function listeAnneeUniv()
	{
		header("cache-control:no-cache,must-revalidate");
		header("content-type:text/plain;charset=ISO-8859-1");
		$connect=connection();
		$requete=$connect->query("select *from anneeuniversitaire;");
		$reponse=$requete->fetch();
		if($requete)
		{
			$resultat=$reponse["DEBUTUNIV"]."-".$reponse["FINUNIV"];
			$reponse=$requete->fetch();
		}else{
				$resultat="";
		}
		while($reponse)
		{
			$resultat=$resultat."/".$reponse["DEBUTUNIV"]."-".$reponse["FINUNIV"];
			$reponse=$requete->fetch();
		}
		return $resultat;
	}

	function ajouterET($dateDeb,$dateFin,$idUniv,$codeAdmin)
	{
		$connect=connection();
		$a1="PMED";
		$a2="MEDSp";
		$a3="ODOSp";
		$a4="PPAR";
		$a5="INFSp";
		$a6="MRSp";
		$a7="TCLSp";
		$a8="SGFSp";
		$a9="MASSp";
		$a10="ANESp";
		
		$codeEt1=$idUniv."MED"."L2".$dateDeb.$dateFin;
		$codeEt2=$idUniv."MED"."L3".$dateDeb.$dateFin;
		$codeEt3=$idUniv."MED"."4".$dateDeb.$dateFin;
		$codeEt4=$idUniv."MED"."5".$dateDeb.$dateFin;
		$codeEt5=$idUniv."MED"."6".$dateDeb.$dateFin;
		$codeEt6=$idUniv."INF"."L2".$dateDeb.$dateFin;
		$codeEt7=$idUniv."INF"."L3".$dateDeb.$dateFin;
		$codeEt8=$idUniv."SGF"."L2".$dateDeb.$dateFin;
		$codeEt9=$idUniv."SGF"."L3".$dateDeb.$dateFin;
		$codeEt10=$idUniv."TCL"."L2".$dateDeb.$dateFin;
		$codeEt11=$idUniv."TCL"."L3".$dateDeb.$dateFin;
		$codeEt12=$idUniv.$a1."L1".$dateDeb.$dateFin;
		$codeEt13=$idUniv.$a2."L1".$dateDeb.$dateFin;
		$codeEt14=$idUniv.$a3."L1".$dateDeb.$dateFin;
		$codeEt15=$idUniv.$a4."L1".$dateDeb.$dateFin;
		$codeEt16=$idUniv.$a5."L1".$dateDeb.$dateFin;
		$codeEt17=$idUniv.$a6."L1".$dateDeb.$dateFin;
		$codeEt18=$idUniv.$a7."L1".$dateDeb.$dateFin;
		$codeEt19=$idUniv.$a8."L1".$dateDeb.$dateFin;
		$codeEt20=$idUniv.$a9."L1".$dateDeb.$dateFin;
		$codeEt21=$idUniv.$a10."L1".$dateDeb.$dateFin;

	
		$requete=$connect->query("INSERT INTO `emploi_du_temps`(`CODEET`, `ID_ANNEEUNIV`, `CODEP`, `CODEADMIN`, `CODENIV`, `DATEDEBUT`, `DATEFIN`) VALUES
		('$codeEt1','$idUniv','MED','$codeAdmin','L2','$dateDeb','$dateFin'),
		('$codeEt2','$idUniv','MED','$codeAdmin','L3','$dateDeb','$dateFin'),
		('$codeEt3','$idUniv','MED','$codeAdmin','4','$dateDeb','$dateFin'),
		('$codeEt4','$idUniv','MED','$codeAdmin','5','$dateDeb','$dateFin'),
		('$codeEt5','$idUniv','MED','$codeAdmin','6','$dateDeb','$dateFin'),
		('$codeEt6','$idUniv','INF','$codeAdmin','L2','$dateDeb','$dateFin'),
		('$codeEt7','$idUniv','INF','$codeAdmin','L3','$dateDeb','$dateFin'),
		('$codeEt8','$idUniv','SGF','$codeAdmin','L2','$dateDeb','$dateFin'),
		('$codeEt9','$idUniv','SGF','$codeAdmin','L3','$dateDeb','$dateFin'),
		('$codeEt10','$idUniv','TCL','$codeAdmin','L2','$dateDeb','$dateFin'),
		('$codeEt11','$idUniv','TCL','$codeAdmin','L3','$dateDeb','$dateFin'),
		('$codeEt12','$idUniv','$a1','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt13','$idUniv','$a2','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt14','$idUniv','$a3','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt15','$idUniv','$a4','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt16','$idUniv','$a5','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt17','$idUniv','$a6','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt18','$idUniv','$a7','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt19','$idUniv','$a8','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt20','$idUniv','$a9','$codeAdmin','L1','$dateDeb','$dateFin'),
		('$codeEt21','$idUniv','$a10','$codeAdmin','L1','$dateDeb','$dateFin');
		
		") or die(print_r($connect->errorInfo(), true));
		
		return "L'emploi du temps est ajouté avec succes!";
	}

	function listeET(){
		$connect=connection();
		$requete=$connect->query("select distinct anneeuniversitaire.ID_ANNEEUNIV,  anneeuniversitaire.DEBUTUNIV,anneeuniversitaire.FINUNIV,emploi_du_temps.DATEDEBUT,emploi_du_temps.DATEFIN from emploi_du_temps,anneeuniversitaire where emploi_du_temps.ID_ANNEEUNIV=anneeuniversitaire.ID_ANNEEUNIV ;");
		return $requete;
	}

	function supprimerET($dateDeb,$dateFin,$idUniv)
	{
		$connect=connection();
		$requete1=$connect->prepare("DELETE FROM `joindre` WHERE CODEET like '$idUniv%$dateDeb$dateFin'");
		$requete=$connect->prepare("delete from emploi_du_temps where DATEDEBUT=:dateDeb and DATEFIN=:dateFin and ID_ANNEEUNIV=:idUniv;");

		/*$requete1->bindParam(":idUniv",$idUniv,PDO::PARAM_INT);
		$requete1->bindParam(":dateDeb",$dateDeb,PDO::PARAM_STR);
		$requete1->bindParam(":dateFin",$dateFin,PDO::PARAM_STR);*/

		$requete->bindParam(":dateDeb",$dateDeb,PDO::PARAM_STR);
		$requete->bindParam(":dateFin",$dateFin,PDO::PARAM_STR);
		$requete->bindParam(":idUniv",$idUniv,PDO::PARAM_INT);

		$requete1->execute();

		$requete->execute();
		return "L'emploi du temps est supprimée avec success!";
	}

	function modifierET($dateDebAncien,$dateFinAncien,$idUnivAncien,$dateDeb,$dateFin,$idUniv){
		$connect=connection();
		$requete=$connect->prepare("update emploi_du_temps set ID_ANNEEUNIV=:idUniv,DATEDEBUT=:dateDeb,DATEFIN=:dateFin where ID_ANNEEUNIV=:idUnivAncien and DATEDEBUT=:dateDebAncien and DATEFIN=:dateFinAncien;");

		$requete->bindParam(":idUniv",$idUniv,PDO::PARAM_INT);
		$requete->bindParam(":dateDeb",$dateDeb,PDO::PARAM_STR);
		$requete->bindParam(":dateFin",$dateFin,PDO::PARAM_STR);
		$requete->bindParam(":idUnivAncien",$idUnivAncien,PDO::PARAM_INT);
		$requete->bindParam(":dateDebAncien",$dateDebAncien,PDO::PARAM_STR);
		$requete->bindParam(":dateFinAncien",$dateFinAncien,PDO::PARAM_STR);
		$requete->execute();
		//$requete1=$connect->prepare();
		$tab=array("ANESpL1","INFL2","INFL3","INFSpL1","MASSpL1","MEDL2","MEDL3","MED4","MED5","MED6","MEDSpL1","MRSpL1","ODOSpL1","PMEDL1","PPARL1","SGFL2","SGFL3","SGFSpL1","TCLL2","TCLL3","TCLSpL1");

		foreach($tab as $val){
			$requete1=$connect->query("update emploi_du_temps set CODEET='$idUniv$val$dateDeb$dateFin' where CODEET='$idUnivAncien$val$dateDebAncien$dateFinAncien' ");
			$requete2=$connect->query("update joindre set CODEET='$idUniv$val$dateDeb$dateFin' where CODEET='$idUnivAncien$val$dateDebAncien$dateFinAncien' ");
		}
		return "L'emploi du temps est modifié avec success!";
	}

	function listeMatriculeEn(){
		header("cache-control:no-cache,must-revalidate");
		header("content-type:text/plain;charset=ISO-8859-1");
		$connect=connection();
		$requete=$connect->query("select MATRICULEEN,EMAILEN from enseignant group by MATRICULEEN asc;");
		$reponse=$requete->fetch();
		if($requete)
		{
			$resultat=$reponse["MATRICULEEN"];
			$reponse=$requete->fetch();
		}else{
				$resultat="";
		}
		while($reponse)
		{
			$resultat=$resultat."/".$reponse["MATRICULEEN"];
			$reponse=$requete->fetch();
		}
		return $resultat;
	}
	function listeMailEn(){
		header("cache-control:no-cache,must-revalidate");
		header("content-type:text/plain;charset=ISO-8859-1");
		$connect=connection();
		$requete=$connect->query("select MATRICULEEN,EMAILEN from enseignant group by MATRICULEEN asc;");
		$reponse=$requete->fetch();
		if($requete)
		{
			$resultat=$reponse["EMAILEN"];
			$reponse=$requete->fetch();
		}else{
				$resultat="";
		}
		while($reponse)
		{
			$resultat=$resultat."/".$reponse["EMAILEN"];
			$reponse=$requete->fetch();
		}
		return $resultat;
	}
	function modifierAdmin($usernameAncien,$codeAdminAncien,$codeAdmin,$username,$mdp){
		$connect=connection();
		$mdp1=base64_encode($mdp);
		$requete2=$connect->prepare("SELECT * from etudiant,enseignant WHERE etudiant.USERNAMEET = ? or enseignant.USERNAMEEN= ? ;");
		$requete2->execute(array($username,$username));
		$usernameexist = $requete2->rowCount();//counte Nbre de colone
		if($usernameexist == 0)
		{
			$requete1=$connect->prepare("update emploi_du_temps set CODEADMIN=:codeAdmin where CODEADMIN=:codeAdminAncien;");
			$requete1->bindParam(":codeAdmin",$codeAdmin,PDO::PARAM_STR);
			$requete1->bindParam(":codeAdminAncien",$codeAdminAncien,PDO::PARAM_STR);

			$requete=$connect->prepare("update administrateur set CODEADMIN=:codeAdmin,USERNAMEADMIN=:username,MDPADMIN=:mdp where USERNAMEADMIN=:usernameAncien;");
			$requete->bindParam(":codeAdmin",$codeAdmin,PDO::PARAM_STR);
			$requete->bindParam(":username",$username,PDO::PARAM_STR);
			$requete->bindParam(":mdp",$mdp1,PDO::PARAM_STR);
			$requete->bindParam(":usernameAncien",$usernameAncien,PDO::PARAM_STR);

			$requete->execute()or die("le codeAdmin est deja existe");
			$requete1->execute() or die ("Il ya erreur de requete!");
			return "votre compte est modifié avec success et vous devez vous reconnectez!";
		}else{
			return "L'username est déjà occupé par un autre utilisateur!";
		}
	}
	function ajoutActu($titre,$contenu,$type,$image,$image1,$image2,$image3){
		$datePub=date("Y-m-d");
		$connect=connection();
		$requete=$connect->prepare("INSERT INTO `publication` (`id`, `type`, `titre`, `contenu`, `image`, `image1`, `image2`, `image3`,`datePub`) VALUES (NULL, :type, :titre, :contenu, :image,:image1,:image2,:image3,:datePub);");
			$requete->bindParam(":type",$type,PDO::PARAM_STR);
			$requete->bindParam(":titre",$titre,PDO::PARAM_STR);
			$requete->bindParam(":contenu",$contenu,PDO::PARAM_STR);
			$requete->bindParam(":image",$image,PDO::PARAM_STR);
			$requete->bindParam(":image1",$image1,PDO::PARAM_STR);
			$requete->bindParam(":image2",$image2,PDO::PARAM_STR);
			$requete->bindParam(":image3",$image3,PDO::PARAM_STR);
			$requete->bindParam(":datePub",$datePub,PDO::PARAM_STR);
			$requete->execute() or die("on ne peut pas");
	}
	function modifierActu($id,$titre,$contenu,$type,$image,$image1,$image2,$image3){
		$datePub=date("Y-m-d");
		$connect=connection();

		if(!empty($image)){
			if(!empty($image1)){
				if(!empty($image2)){
					if(!empty($image3)){
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image='$image' ,image1='$image1',image2='$image2' ,image3='$image3' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}else{
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image='$image' ,image1='$image1',image2='$image2' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}
				}else{
					if(!empty($image3)){
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image='$image' ,image1='$image1' ,image3='$image3' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}else{
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image='$image' ,image1='$image1' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}
				}
			}else{
				if(!empty($image2)){
					if(!empty($image3)){
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image='$image',image2='$image2' ,image3='$image3' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}else{
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image='$image',image2='$image2' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}
				}else{
					if(!empty($image3)){
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image='$image' ,image3='$image3' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}else{
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image='$image' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}
				}
			}
		}else{
			if(!empty($image1)){
				if(!empty($image2)){
					if(!empty($image3)){
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image1='$image1',image2='$image2' ,image3='$image3' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}else{
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image1='$image1',image2='$image2' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}
				}else{
					if(!empty($image3)){
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image1='$image1' ,image3='$image3' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}else{
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu'  ,image1='$image1' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}
				}
			}else{
				if(!empty($image2)){
					if(!empty($image3)){
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image2='$image2' ,image3='$image3' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}else{
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu' ,image2='$image2' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}
				}else{
					if(!empty($image3)){
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu'  ,image3='$image3' where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}else{
						$requete=$connect->query("update `publication` set type='$type' ,titre='$titre',contenu='$contenu'  where id='$id'");
						$requete->execute() or die("on ne peut pas ar il y a une erreur!");
					}
				}
			}
		}
	}
	function listeActu(){
		$connect=connection();
		$requete=$connect->query("select *from publication group by id desc;");
		return $requete;
	}
	function listeActuParPage($start,$rpp){
		$connect=connection();
		$requete=$connect->prepare("select *from publication  group by id desc LIMIT :start,:rpp;");
		$requete->bindParam(":start",$start,PDO::PARAM_INT);
		$requete->bindParam(":rpp",$rpp,PDO::PARAM_INT);
		$requete->execute();
		return $requete;
	}
	function determinType($variable){
		if($variable=="ACTU"){
			return "Actualité";
		}else if($variable=="ALAU"){
			return "A la Une";
		}else if($variable=="MOTD"){
			return "Mot du Doyen";
		}else{
			return "Autre";
		}
	}
	function suppressionActu($id){
		$connect=connection();
		$requete=$connect->prepare("delete from publication where id=:id;");
		$requete->bindParam(":id",$id,PDO::PARAM_INT);
		$requete->execute();
		return "la publication a été supprimée avec succès!";
	}
	function ajaxMatiere($mot){
		header("cache-control:no-cache,must-revalidate");
		header("content-type:text/plain;charset=ISO-8859-1");
		$connect=connection();
		$requete=$connect->query("select LIBELLEMAT from matiere where LIBELLEMAT like '$mot%' ;");
		$res=$requete->fetch();
			if($res)
			{
				$resultat=$res["LIBELLEMAT"];
				$res=$requete->fetch();
			}
			else
			{
				$resultat="";
			}
			while($res)
			{
				$resultat=$resultat."/".$res["LIBELLEMAT"];
					$res=$requete->fetch();
			}
			return $resultat;
	}


function motduDoyen(){
	$type="MOTD";
	$connect=connection();
	$requete=$connect->query("SELECT * FROM `publication`  where type='$type' group by id desc limit 1;");
	return $requete;
}
function actualite(){
	$type="ACTU";
	$connect=connection();
	$requete=$connect->query("SELECT * FROM `publication`  where type='$type' group by id desc limit 2;");
	return $requete;
}
function alaUne(){
	$type="ALAU";
	$connect=connection();
	$requete=$connect->query("SELECT * FROM `publication`  where type='$type' group by id desc limit 2;");
	return $requete;
}
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

// ########################################### niampy #############################################///

function listeStatistiqueEn($dateDeb,$dateFin){
	$connect=connection();
	$requete=$connect->query("select distinct joindre.MATRICULEEN,enseignant.NOMEN,enseignant.PRENOMEN,SEC_TO_TIME(sum(TIME_TO_SEC(TIMEDIFF(joindre.HEUREF,joindre.HEURED)))) as nombre from enseignant,joindre  where enseignant.MATRICULEEN=joindre.MATRICULEEN and joindre.DATE BETWEEN '$dateDeb' and '$dateFin'  group by joindre.MATRICULEEN ");
	return $requete;
	//facmed2020++
}
function nombreEtudiant(){
	$connect=connection();
	$requete=$connect->query("SELECT niveau.CODENIV, count(verifieretudiant.NumEt) as nombreEtudiant from verifieretudiant,niveau where verifieretudiant.Niveau=niveau.CODENIV GROUP by niveau.CODENIV");
	return $requete;
}

?>
