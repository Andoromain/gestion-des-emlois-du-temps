<?php

 include('server.php');

	/*Declaraion des variables pour les Etudiants*/
	$nomet ="";
	$prenomet ="";
	$datenais ="";
	$matriculeet = "";
	$codep ="";
	$codeniv ="";
	$usernameet = "";
	$texte="/^[A-Z][\p{L}\s-]*$/i";
	$texte1="/^[A-Za-z][A-Za-z0-9]*$/i";
	$mat="/^[0-9][a-zA-Z0-9]+$/i";
	$niv="/^[A-Z0-9][A-Z0-9]{0,1}$/i";
	$par="/^[A-Z][A-Za-z]{2,6}$/i";
        $errors = array();
        /***************************************************************************************************************/	
	//if the register button is clicked
	if(isset($_POST['register']))
	{
		$nomet = htmlspecialchars($_POST['nomet']);
		$prenomet = htmlspecialchars($_POST['prenomet']);
		$datenais = htmlspecialchars ($_POST['datenais']);
		$matriculeet = htmlspecialchars ($_POST['matriculeet']);
		$codep = htmlspecialchars ($_POST['codep']);
		$codeniv = htmlspecialchars ($_POST['codeniv']);
		$usernameet = htmlspecialchars ($_POST['usernameet']);
		$password_1 = htmlspecialchars($_POST['password_1']);
		$password_2 = htmlspecialchars($_POST['password_2']);
		
		
		//ensure that form fields are filled properly
		if(empty($nomet))
		{
			array_push($errors,"Le Nom est obligatoire");
		}else if((!preg_match_all($texte,$nomet))){
			array_push($errors,"Le Nom est invalide");
		}
		if(empty($prenomet)){
			
		}else if(!preg_match_all($texte,$prenomet)){
				array_push($errors,"Le prenom est invalide");	
		}
		if(empty($datenais))
		{
			array_push($errors,"La Date de naissance est obligatoire");
		}
		if(empty($matriculeet))
		{
			array_push($errors,"Le Matricule est obligatoire");
		}else if(!preg_match_all($mat,$matriculeet)){
			array_push($errors,"Le Matricule est invalide");
		}
		if(empty($codep))
		{
			array_push($errors,"Le Parcours est obligatoire");
		}else if(!preg_match_all($par,$codep)){
			array_push($errors,"Le parcours est invalide");
		}
		if(empty($codeniv))
		{
			array_push($errors,"Le Niveau est obligatoire");
		}else if(!preg_match_all($niv,$codeniv)){
			array_push($errors,"Le niveau est invalide");
		}
		if(empty($usernameet))
		{
			array_push($errors,"L'username est obligatoire");
		}else if(!preg_match_all($texte1,$usernameet)){
			array_push($errors,"L' username est invalide");
		}
		if(empty($password_1))
		{
			array_push($errors,"Le mot de passe est obligatoired");
		}
         if(empty($password_2))
		{
			array_push($errors,"Le mot de passe est obligatoire");
		}
		if($password_1 != $password_2)
		{
			array_push($errors,"Les deux mots de passe ne correspondent pas");
		}
		
		
		
                            //if there are no errors, save user to database
                            if(count($errors) == 0)
                            {
                                //POUR CONNAITRE QUE L'ETUDIANT EST DANS LA BASE DE DONNEE
                                 $verifierEt = $bdd->prepare("SELECT * from verifieretudiant WHERE NumEt = ? AND NomEt = ? AND PrenomEt = ? and Datenais=? and Niveau= ? and Parcours=?");
                                 $verifierEt->execute(array($matriculeet,$nomet,$prenomet,$datenais,$codeniv,$codep));               
                                 $etudiantexit = $verifierEt->rowCount();
                                    if( $etudiantexit > 0)
                                    {
                                        //POUR CONNAITRE QUE CETTE MATRICULE DE CET ETUDIANT EST DEJA EXISTE
                                        $matricul = $bdd->prepare("SELECT * from etudiant,enseignant WHERE etudiant.MATRICULEET = ? or enseignant.MATRICULEEN = ?");
                                        $matricul ->execute(array($matriculeet,$matriculeet));
                                        $matriculeexist = $matricul->rowCount();//counte Nbre de colone
                                        if($matriculeexist == 0)
                                        {
                                            //POUR CONNAITRE USERNAME EXIST DANS DB ET MEME INSTRUCTION POUR FAIRE VOTRE PSEUDO EST EXIT
                                            $requser = $bdd->prepare("SELECT * from etudiant,enseignant,administrateur WHERE etudiant.USERNAMEET = ? or enseignant.USERNAMEEN= ? or administrateur.USERNAMEADMIN= ?");
                                            $requser->execute(array($usernameet,$usernameet,$usernameet));
                                            $usernameetexist = $requser->rowCount();//counte Nbre de colone
                                            if($usernameetexist == 0)
                                            {

                                                $mdpet = base64_encode($password_1); //encrypt password before storing in database(security)
                                                $sql = $bdd->prepare("INSERT INTO etudiant (MATRICULEET,CODENIV,CODEP,NOMET,PRENOMET,DATENAIS,MDPET,USERNAMEET) VALUES ('$matriculeet','$codeniv','$codep','$nomet','$prenomet','$datenais','$mdpet','$usernameet')");
                                                $sql->execute(array('$matriculeet','$codeniv','$codep','$nomet','$prenomet','$datenais','$mdpet','$usernameet'));
                                                //mysql_query($ddb, $sql);
                                                $_SESSION['usernameet']=$usernameet;
                                                $_SESSION['nomet']=$nomet;
                                                $_SESSION['prenomet']=$prenomet;
                                                $_SESSION['datenais']=$datenais;
                                                $_SESSION['matriculeet']=$matriculeet;
                                                $_SESSION['codeniv']=$codeniv;
                                                $_SESSION['codep']=$codep;
                                                $_SESSION['success']="You are now logged in";
                                                header('Location: etudiant/acceuil.php'); //redirect to home page

                                            }
                                            else
                                            {
                                                array_push($errors,"votre username est deja existe");
                                            }
                                        }
                                        else
                                        {
                                            array_push($errors,"Votre numero de matricule est deja existe");
                                        }
                                    }
                                    else
                                    {
                                        array_push($errors,"Vous n'etes pas encore inscrit dans la base de donnees,contacter l'administrateur");
                                    }
                            }
                   
	}
		
	//log user in from login page
	if(isset($_POST['login']))
	{
	    $usernameet = htmlspecialchars ($_POST['usernameet']);
	    $mdpet = htmlspecialchars($_POST['mdpet']);		
		//ensure that form fields are filled properly
		if(empty($usernameet))
		{
		    array_push($errors,"L'username est obligatoire");
		}else if(!preg_match_all($texte1,$usernameet)){
			array_push($errors,"L'username est invalide");
		}
		if(empty($mdpet))
		{
		    array_push($errors,"Le mot de passe est obligatoire");
		}
                    if(count($errors) == 0)
                    {
			$mdpet = base64_encode($mdpet); //encrypt password before comparing with that from database
			$query = $bdd->prepare("SELECT * FROM etudiant WHERE USERNAMEET ='$usernameet' AND MDPET='$mdpet'");
			$query->execute(array('$usernameet','$mdpet'));
			$result = $query->rowCount();
			if($result == 1)
			{
			    //log user in
			   $row=$query->fetch();
				$_SESSION['usernameet']=$row["USERNAMEET"];
				$_SESSION['nomet']=$row["NOMET"];
				$_SESSION['prenomet']=$row["PRENOMET"];
				$_SESSION['datenais']=$row["DATENAIS"];
				$_SESSION['matriculeet']=$row["MATRICULEET"];
				$_SESSION['codeniv']=$row["CODENIV"];
				$_SESSION['codep']=$row["CODEP"];
			    header('Location: etudiant/acceuil.php'); //redirect to home page
			}
			else
			{
				array_push($errors,"Votre username et password ne correspond pas");
			}
		    }
	}
	
?>