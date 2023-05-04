<?php

include('server.php');

/*Declaraion des variables pour les Enseignats*/
	$nomen = "";
	$prenomen = "";
	$telephoneen = "";
	$emailen = "";
	$codecat = "";
	$usernameen = "";
	$matriculeen = "";
	$errors = array();
	$texte="/^[A-Z][\p{L}\s-]*$/i";
	$texte1="/^[A-Za-z][A-Za-z0-9]*$/i";
	$nombre="/^[0-9][0-9]+$/i";
	$telephone="/^(03)[0-9]{8}$/i";
	$email="/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";
        /***************************************************************************************************************/
		
	//if the register button is clicked
	if(isset($_POST['registerEn']))
	{
		$nomen = htmlspecialchars($_POST['nomen']);
		$prenomen = htmlspecialchars($_POST['prenomen']);
		$emailen = htmlspecialchars ($_POST['emailen']);		
		$matriculeen = htmlspecialchars ($_POST['matriculeen']);
		$telephoneen = htmlspecialchars ($_POST['telephoneen']);
		$usernameen = htmlspecialchars ($_POST['usernameen']);
		$password_1 = htmlspecialchars($_POST['password_1']);
		$password_2 = htmlspecialchars($_POST['password_2']);
		
		
		//ensure that form fields are filled properly
		if(empty($nomen))
		{
			array_push($errors,"Le Nom est obligatoire");
		}else if(!preg_match_all($texte,$nomen)){
			array_push($errors,"Le nom est invalide");
		}
		if(empty($prenomen)){
			
		}else if(!preg_match_all($texte,$prenomen)){
				array_push($errors,"Le prenom est invalide");	
		}
		if(empty($emailen))
		{
			array_push($errors,"L'adresse mail est obligatoire");
		}else if(!preg_match_all($email,$emailen)){
			array_push($errors,"L'addresse mail est invalide");
		}
		if(empty($matriculeen))
		{
			array_push($errors,"Le matricule est obligatoire");
		}else if(!preg_match_all($nombre,$matriculeen)){
			array_push($errors,"Le matricule est invalide");
		}
		if(empty($telephoneen))
		{
			array_push($errors,"Le Telephone est obligatoire");
			
		}else if(!preg_match_all($telephone,$telephoneen)){
			array_push($errors,"Le telephone est invalide");
		}
		if(empty($usernameen))
		{
			array_push($errors,"L'username est  requis");
		}else if(!preg_match_all($texte1,$usernameen)){
			array_push($errors,"L'username est  invalide");
		}
		if(empty($password_1))
		{
			array_push($errors,"Le mot de passe est obligatoire");
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
                                //POUR CONNAITRE QUE L'ENSEIGNANT EST DANS LA BASE DE DONNEE
                                $verifierEn = $bdd->prepare("SELECT * from verifierenseignant WHERE NomEn = ? AND PrenomEn = ? AND NumEn = ? and Email=? and Telephone=?");
                                $verifierEn->execute(array($nomen,$prenomen,$matriculeen,$emailen,$telephoneen));               
                                $enseignantexit = $verifierEn->rowCount();
                                if( $enseignantexit > 0)
                                {
									//maka categorie
									$row=$verifierEn->fetch();
									$codecat=$row["Categorie"];
									
									
                                    //POUR CONNAITRE QUE CETTE MATRICULE DE CET ENSEIGNANT EST DEJA EXISTE
                                    $matriculEns = $bdd->prepare("SELECT * from etudiant,enseignant WHERE etudiant.MATRICULEET = ? or enseignant.MATRICULEEN = ?");
                                    $matriculEns ->execute(array($matriculeen,$matriculeen));
                                    $matriculeEnexist = $matriculEns->rowCount();//counte Nbre de colone
                                    if($matriculeEnexist == 0)
                                    {
                                        //POUR CONNAITRE USERNAME EXIST DANS DANS DB ET MEME INSTRUCTION POUR FAIRE VOTRE PSEUDO EST EXIT
                                        $requser = $bdd->prepare("SELECT * from etudiant,enseignant,administrateur WHERE etudiant.USERNAMEET = ? or enseignant.USERNAMEEN= ? or administrateur.USERNAMEADMIN= ?");
                                        $requser->execute(array($usernameen,$usernameen,$usernameen));
                                        $usernameetexist = $requser->rowCount();//counte Nbre de colone
                                        if($usernameetexist == 0)
                                        {
                                            $mdpen = base64_encode($password_1); //encrypt password before storing in database(security)
                                            $sql = $bdd->prepare("INSERT INTO enseignant (MATRICULEEN,CODECAT,NOMEN,PRENOMEN,EMAILEN,TELEPHONEEN,MDPEN,USERNAMEEN) VALUES ('$matriculeen','$codecat','$nomen','$prenomen','$emailen','$telephoneen','$mdpen','$usernameen')");
                                            $sql->execute(array('$matriculeen','$codecat','$nomen','$prenomen','$emailen','$telephoneen','$mdpen','$usernameen'));
                                            //mysql_query($ddb, $sql);
                                            $_SESSION['usernameen']=$usernameen;
                                            $_SESSION['nomen']=$nomen;
                                            $_SESSION['prenomen']=$prenomen;
                                            $_SESSION['telephoneen']=$telephoneen;
                                            $_SESSION['emailen']=$emailen;
                                            $_SESSION['codecat']=$codecat;
                                            $_SESSION['matriculeen']=$matriculeen;
                                            $_SESSION['success']="You are now logged in";
                                            header('Location: enseignant/acceuil.php'); //redirect to home page

                                        }
                                        else
                                        {
                                            array_push($errors,"votre username est deja existé");
                                        }
                                    }
                                    else
                                    {
                                        array_push($errors,"votre numero de matricule de cet etudiant est deja existe");
                                    }
                                }
                                else
                                {
                                    array_push($errors,"Vous n'etes pas encore inscrit dans la base de donnees,contacter l'administrateur");
                                }  
                            }
                    
	}
	
	
	
	//log user in from login page
	if(isset($_POST['loginEn']))
	{
            $usernameen = htmlspecialchars ($_POST['usernameen']);
	    $mdpen = htmlspecialchars($_POST['mdpen']);
		
		//ensure that form fields are filled properly
		if(empty($usernameen))
		{
			array_push($errors,"L'username est obligatoire");
		}
		if(!preg_match_all($texte1,$usernameen)){
			array_push($errors,"L'username est invalide");
		}
		if(empty($mdpen))
		{
			array_push($errors,"Le mot de passe est obligatoire");
		}
		if(count($errors) == 0)
		{
		    $mdpen = base64_encode($mdpen); //encrypt password before comparing with that from database
		    $query = $bdd->prepare("SELECT * FROM enseignant WHERE USERNAMEEN ='$usernameen' AND MDPEN='$mdpen'");
		    $query->execute(array('$usernameen','$mdpen'));
		    $result = $query->rowCount();
		        if($result == 1)
			{
				//log user in
				$row=$query->fetch();
				$_SESSION['usernameen']=$row["USERNAMEEN"];
				$_SESSION['nomen']=$row["NOMEN"];
				$_SESSION['prenomen']=$row["PRENOMEN"];
				$_SESSION['telephoneen']=$row["TELEPHONEEN"];;
				$_SESSION['emailen']=$row["EMAILEN"];
				$_SESSION['codecat']=$row["CODECAT"];
				$_SESSION['matriculeen']=$row["MATRICULEEN"];
				$_SESSION['success']="Vous etes inscrire";
				header('Location: enseignant/acceuil.php'); //redirect to indexen page
			}
			else
			{
				array_push($errors,"Votre username et password ne correspond pas");
			}
		}
	}
	
	
?>