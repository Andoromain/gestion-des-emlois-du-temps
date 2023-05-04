<?php
        include('server.php');
	/*Declaration des variables pour l'Administrateurs*/
	$codead = "";
	$usernamead = "";
	$texte="/^[a-zA-Z][a-zA-Z0-9]+$/i";
	
	
        /* On commence ici pour l'Administrateur*/
	//if the register button is clicked
	if(isset($_POST['registerAd']))
	{
		$codead = htmlspecialchars($_POST['codead']);
		$usernamead = htmlspecialchars($_POST['usernamead']);
		$password_1 = htmlspecialchars($_POST['password_1']);
		$password_2 = htmlspecialchars($_POST['password_2']);
		
		
		
		//ensure that form fields are filled properly
		if(empty($codead))
		{
			array_push($errors,"Code de l'Admin est requis");
		}
		if(empty($usernamead))
		{
			array_push($errors,"Username est nécessaire");
		}else if(!preg_match_all($texte,$usernamead)){
			array_push($errors,"L' Username est invalide");
		}
		if(empty($password_1))
		{
			array_push($errors,"Un mot de passe est requis");
		}
		if(empty($password_2))
		{
			array_push($errors,"Un mot de passe est requis");
		}
		if($password_1 != $password_2)
		{
			array_push($errors,"Les deux mots de passe ne correspondent pas");
		}
		
                
                            //if there are no errors, save user to database
                            if(count($errors) == 0)
                            {
								
				//POUR CONNAITRE QUE L'ENSEIGNANT EST DANS LA BASE DE DONNEE
				$verifierAd = $bdd->prepare("SELECT * from verifieradministrateur WHERE codeverifierAd = ?");
				$verifierAd->execute(array(base64_encode($codead)));               
				$administrateurexit = $verifierAd->rowCount();
				if(  $administrateurexit == 1)
				{
				    //POUR CONNAITRE USERNAME EXIST DANS DANS DB ET MEME INSTRUCTION POUR FAIRE VOTRE PSEUDO EST EXIT
				    $requser = $bdd->prepare("SELECT * from etudiant,enseignant,administrateur WHERE etudiant.USERNAMEET = ? or enseignant.USERNAMEEN= ? or administrateur.USERNAMEADMIN= ?");
				    $requser->execute(array($usernamead,$usernamead,$usernamead));
				    $usernameetexist = $requser->rowCount();//counte Nbre de colone
				    if($usernameetexist == 0)
				    {
                                        $mdpad = base64_encode($password_1); //encrypt password before storing in database(security)
                                        $sql = $bdd->prepare("INSERT INTO administrateur (CODEADMIN,MDPADMIN,USERNAMEADMIN) VALUES ('$codead','$mdpad','$usernamead')");
                                        $sql->execute(array('$codead','$mdpad','$usernamead'));
                                        //mysql_query($ddb, $sql);
                                        $_SESSION['usernamead']=$usernamead;
                                        $_SESSION['codead']=$codead;
                 
                                        header('Location: admin/acceuil.php'); //redirect to home page
				    }
				    else
				    {
					array_push($errors,"votre username est deja existe");
				    }
			        }
				else
				{
				    array_push($errors,"Vous n'etes pas inscri dans la base de donnees");
				} 
                            }
                    
                
            }



            //log user in from login page
            if(isset($_POST['loginAd']))
            {
                    $usernamead = htmlspecialchars ($_POST['usernamead']);
                    $mdpad = htmlspecialchars($_POST['mdpad']);

                    //ensure that form fields are filled properly
                    if(empty($usernamead))
                    {
                            array_push($errors,"L'username est obligatoire");
                    }
                    if(empty($mdpad))
                    {
                            array_push($errors,"Le mot de passe est obligatoire");
                    }
					 if(!preg_match_all($texte,$usernamead))
                    {
                            array_push($errors,"L'username  est invalide");
                    }
                    if(count($errors) == 0)
                    {
                        $mdpad = base64_encode($mdpad); //encrypt password before comparing with that from database
                        $query = $bdd->prepare("SELECT * FROM administrateur WHERE USERNAMEADMIN ='$usernamead' AND MDPADMIN='$mdpad'");
                        $query->execute(array('$usernamead','$mdpad'));
                        $result = $query->rowCount();
                        if($result == 1)
                        {
                            //log user in
                            $row=$query->fetch();
							$_SESSION['usernamead']=$row["USERNAMEADMIN"];
							$_SESSION['codead']=$row["CODEADMIN"];
                            header('Location: admin/acceuil.php'); //redirect to home page
                        }
                        else
                        {
                            array_push($errors,"Votre username et password ne correspond pas");
                            //header('Location: index.php');
                        }
		    }
	    }
		
	
?>