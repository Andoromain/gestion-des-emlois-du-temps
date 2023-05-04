<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>medecine</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/Animated-Header--Easy-Editable--1.css">
    <link rel="stylesheet" href="../assets/css/Animated-Header--Easy-Editable-.css">
    <link rel="stylesheet" href="../assets/css/bottomemploidutemps-etudiant.css">
    <link rel="stylesheet" href="../assets/css/Central-Align-Logo-Header-With-Nav.css">
    <link rel="stylesheet" href="../assets/css/etudiantModele2-by-ando.css">
    <link rel="stylesheet" href="../assets/css/fullcalendar.css">
    <link rel="stylesheet" href="../assets/css/slider.css">
    <link rel="stylesheet" href="../assets/css/styleMenu.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/tableauEnseignat-modal.css">
    <link rel="stylesheet" href="../assets/css/Testimomial-Slider.css">
    <link rel="stylesheet" href="../assets/css/topCalendrier-etudiant.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
	
</head>

<body>
	<input id="matriculeEtAncien" class="d-none" value='<?php echo $_SESSION["matriculeet"]; ?>' >
    <div>
        <header id="header" style="background-color: #fffff;">
            <h1 class="text-capitalize" id="facMed" style="color: rgb(249,249,249);background-color: #27284f;">E.N.T Faculté de Medecine<img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logo"><a href="#" id="usernameConnecte"><i class="fa fa-user" id="iconUsername"></i>     <span id="usernameConnecteSpan">
			<?php
				if(isset($_SESSION["usernameet"])){
					echo $_SESSION["usernameet"];
				}	
			?>
			</span></a></h1>
        </header>
        <nav class="navbar navbar-light navbar-expand-md" id="navMenu">
            <div class="container-fluid"><a class="navbar-brand" href="../etudiant/acceuil.php" style="color:rgb(102,153,255)">Home</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav" id="navigation">
                        <li class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Medecine</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MED&niveau=L2">L2</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MED&niveau=L3">L3</a><a class="dropdown-item" role="presentation"
                                    href="../etudiant/page.php?parcours=MED&niveau=4">4</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MED&niveau=5">5</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MED&niveau=6">6</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MED&niveau=7">7</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MED&niveau=8">8</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Infirmerie</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=INF&niveau=L2">L2</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=INF&niveau=L3">L3</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Sage Femme</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=SGF&niveau=L2">L2</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=SGF&niveau=L3">L3</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Technicien de Labo</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=TCL&niveau=L2">L2</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=TCL&niveau=L3">L3</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Pacès</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=PMED&niveau=L1">Pacès MEDECINE</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=PPAR&niveau=L1">Pacès PARAMED</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Spécifique</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MEDSp&niveau=L1">Medecine Humaine</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=ODOSp&niveau=L1">Odonto Stomato</a><a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=INFSp&niveau=L1">INF</a>
                                <a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MRSp&niveau=L1">Manip Radio</a>
                                <a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=TCLSp&niveau=L1">Tech Lab</a>
                                <a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=SGFSp&niveau=L1">Sage Femme</a>
                                <a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=MASSp&niveau=L1">Massokiné</a>
                                <a class="dropdown-item" role="presentation" href="../etudiant/page.php?parcours=ANESp&niveau=L1">Anesth</a>
                            </div>
                        </li>
						 <li class="nav-item " style="background-color:rgb(102,153,255)"><a class=" nav-link " data-toggle="dropdown-item" aria-expanded="false" href="../blog/afficherEt.php">Blog</a>
                        </li>

                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" id="Menulogin"><img src="../assets/img/kissclipart-team-member-icon-clipart-user-computer-icons-a9df604fa77d98a4.png" id="imageMenuLogin"></a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#" id="paramCompteEt" data-toggle="modal" data-target="#modalParamEt">Parametre du Compte</a><a class="dropdown-item" role="presentation" href="logout.php">Logout</a></div>
                        </li>
                    </ul>
                    <p class="navbar-text" id="univ">Université de Fianarantsoa &nbsp;<img src="../assets/img/univ.jpg" id="logoUniv"></p>
                </div>
            </div>
        </nav>
    </div>
	
	
	<!--niova tato-->
	<div id="modalAveclink">
        <div class="modal fade" role="dialog" tabindex="-1" id="modalParamEt">
            <div class="modal-dialog" role="document">
			<form method="POST" action="modifierParamCompteEt.php">
                <div class="modal-content">
                    <div class="modal-header box">
                        <h4 class="modal-title"><img src="../assets/img/avatar.png" id="img" class="box"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
					<br>
					<br>
						 <div id="div"><i class="fa fa-user" id="iconUser"></i><span>Usename  &nbsp; &nbsp; &nbsp; &nbsp;  :</span><input type="text"class="input" id="usernameP" value='<?php echo $_SESSION['usernameet'] ?>' ></div>
                        <div id="div"><i class="fa fa-user" id="iconUser"></i><span>Matricule &nbsp; &nbsp; &nbsp; &nbsp; :</span><input type="text" id="matriculeEt" class="input" name="matriculeP" value='<?php echo $_SESSION['matriculeet'] ?>'></div>
                        <div id="div"><i class="fa fa-user" id="iconUser"></i><span>Nom &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</span><input type="text" id="nomEt" class="input" name="nomP" value='<?php echo $_SESSION['nomet'] ?>'></div>
                        <div id="div"><i class="fa fa-user-o" id="iconUser"></i><span>Prenom &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</span><input type="text" id="prenomEt" class="input" class="prenomP" value='<?php echo $_SESSION['prenomet'] ?>'></div>
                        <div id="div"><i class="fa fa-calendar" id="iconUser"></i><span>Ne le &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</span><input type="date" id="datenaisEt" class="input" name="datenaisP" value='<?php echo $_SESSION['datenais'] ?>'></div>
                        <div id="div"><span><i class="fa fa-university" id="iconUser"></i>Niveau &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</span><select id="niveauP" class="input" name="niveauP"><option value="L1" selected="">L1</option><option value="L2">L2</option><option value="L3">L3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></div>
                        <div
                            id="div"><i class="fa fa-graduation-cap" id="iconUser"></i><span>Parcours &nbsp; &nbsp; &nbsp; &nbsp; :</span><select id="parcoursP" class="input" name="parcoursP" ><option value="MED" >Medcine Humaine</option><option value="SGF">Sage Femme</option><option value="TCL">Technicien de Labo</option><option value="INF">Infirmerie</option></select></div>
                    <div
                        id="div"><i class="fa fa-key" id="iconUser"></i><span>Mot de Passe &nbsp;:</span><input type="password" id="mdpEt1" class="input" name="password_1P"></div>
                       <div id="div"><i class="fa fa-key" id="iconUser"></i><span>confirmation &nbsp; &nbsp;:</span><input type="password" id="mdpEt2" class="input" name="password_2P"></div>
                <div><button class="btn btn-primary" type="submit" id="modifierEt" data-dismiss="modal">Modifier</button><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
            </div>
            <div class="modal-footer">
                <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logoFac"></div>
        </div>
		</form>
    </div>
    </div>
    </div>
	<!--niova tato-->
	
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/sweetalert.min.js"></script>
	 <script src="../assets/js/etudiant/parametreCompte.js"></script>
	 <script type="text/javascript">
		var a=document.getElementById('parcoursP');
		if(a.options[0].value=='<?php echo $_SESSION["codep"] ?>'){
			a.options[0].selected=true;			
		}
		if(a.options[1].value=='<?php echo $_SESSION["codep"] ?>'){
			a.options[1].selected=true;	
		}
		if(a.options[2].value=='<?php echo $_SESSION["codep"] ?>'){
			a.options[2].selected=true;	
		}
		if(a.options[3].value=='<?php echo $_SESSION["codep"] ?>'){
			a.options[3].selected=true;	
		}
		
		var b=document.getElementById('niveauP');
		if(b.options[0].value=='<?php echo $_SESSION["codeniv"] ?>'){
			b.options[0].selected=true;			
		}
		if(b.options[1].value=='<?php echo $_SESSION["codeniv"] ?>'){
			b.options[1].selected=true;			
		}
		if(b.options[2].value=='<?php echo $_SESSION["codeniv"] ?>'){
			b.options[2].selected=true;			
		}
		if(b.options[3].value=='<?php echo $_SESSION["codeniv"] ?>'){
			b.options[3].selected=true;			
		}
		if(b.options[4].value=='<?php echo $_SESSION["codeniv"] ?>'){
			b.options[4].selected=true;			
		}
		if(b.options[5].value=='<?php echo $_SESSION["codeniv"] ?>'){
			b.options[5].selected=true;			
		}
		if(b.options[6].value=='<?php echo $_SESSION["codeniv"] ?>'){
			b.options[6].selected=true;			
		}
		
	</script>
	
	