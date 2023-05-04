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
	<link rel="stylesheet" href="../assets/css/jquery.flyout.css">

</head>

<body style="background-color: rgb(249,247,247);">
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
            <div class="container-fluid"><a class="navbar-brand" href="acceuil.php">Home</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav" id="navigation">
                        <li class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Medecine</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="page.php?parcours=MED&niveau=L2">L2</a><a class="dropdown-item" role="presentation" href="page.php?parcours=MED&niveau=L3">L3</a><a class="dropdown-item" role="presentation"
                                    href="page.php?parcours=MED&niveau=4">4</a><a class="dropdown-item" role="presentation" href="page.php?parcours=MED&niveau=5">5</a><a class="dropdown-item" role="presentation" href="page.php?parcours=MED&niveau=6">6</a><a class="dropdown-item" role="presentation" href="page.php?parcours=MED&niveau=7">7</a><a class="dropdown-item" role="presentation" href="page.php?parcours=MED&niveau=8">8</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Infirmerie</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="page.php?parcours=INF&niveau=L2">L2</a><a class="dropdown-item" role="presentation" href="page.php?parcours=INF&niveau=L3">L3</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Sage Femme</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="page.php?parcours=SGF&niveau=L2">L2</a><a class="dropdown-item" role="presentation" href="page.php?parcours=SGF&niveau=L3">L3</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Technicien de Labo</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="page.php?parcours=TCL&niveau=L2">L2</a><a class="dropdown-item" role="presentation" href="page.php?parcours=TCL&niveau=L3">L3</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Pacès</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="page.php?parcours=PMED&niveau=L1">Pacès MEDECINE</a><a class="dropdown-item" role="presentation" href="page.php?parcours=PPAR&niveau=L1">Pacès PARAMED</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class=" nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Spécifique</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="page.php?parcours=MEDSp&niveau=L1">Medecine Humaine</a><a class="dropdown-item" role="presentation" href="page.php?parcours=ODOSp&niveau=L1">Odonto Stomato</a><a class="dropdown-item" role="presentation" href="page.php?parcours=INFSp&niveau=L1">INF</a>
                                <a class="dropdown-item" role="presentation" href="page.php?parcours=MRSp&niveau=L1">Manip Radio</a>
                                <a class="dropdown-item" role="presentation" href="page.php?parcours=TCLSp&niveau=L1">Tech Lab</a>
                                <a class="dropdown-item" role="presentation" href="page.php?parcours=SGFSp&niveau=L1">Sage Femme</a>
                                <a class="dropdown-item" role="presentation" href="page.php?parcours=MASSp&niveau=L1">Massokiné</a>
                                <a class="dropdown-item" role="presentation" href="page.php?parcours=ANESp&niveau=L1">Anesth</a>
                            </div>
                        </li>
						 <li class="nav-item " ><a class=" nav-link " data-toggle="dropdown-item" aria-expanded="false" href="../blog/afficherEt.php">Blog</a>
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
    <div id="ET">
        <div class="container">
            <div class="row">
                <div class="col" style="width:80%"><br>
                    <p id="facmedtitre" class="fac"><strong>FACULTE DE MEDECINE</strong></p>
                    <p>--------------</p><br>
                    <p class="aproposFac">Tel :034 99 244 64 &nbsp; ; E-mail : <span style="text-decoration: underline;">facmedfianar@gmail.com</span></p><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="imageLogoFac"></div>
            </div>
        </div>
        <div class="container" id="EmploiduTempsEt">
            <div class="row">
                <div class="col-md-12">
                    <p>EMPLOI DU TEMPS &nbsp;du &nbsp;<span id="startDate">.........</span> &nbsp;<span id="au">au &nbsp;</span><span id="finDate">.......</span>&nbsp;<span id="anneeJ">...................</span></p>
                    <p>Parcours &nbsp;  : &nbsp;<span id="parcours">     </span></p>
                    <p>Niveau &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;<span id="niveau">    </span></p>
                    <p style="display:none">Lieu &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;<span id="lieu">   </span></p>
                </div>
            </div>
			<br>
		
            <div class="row">
                <div class="col-md-12" id="timetable"></div>
                <div class="col-md-12"></div>
            </div>
        </div>
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
	
	<button class="btn btn-primary" type="button" id="genererETtoPDF" style="margin:1% 48% 1% 48%">generer PDF</button>
    <div id="time"></div><br>
    <footer>
        <div class="row">
            <div class="col-sm-6 col-md-4 footer-navigation">
                <h3><a href="#">Faculté&nbsp;<span>Medecine</span></a></h3>
                <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Contacter Admin</a><strong> · </strong><a href="#">Apropos du site</a><strong> · </strong><a href="#">Developpers du site</a><strong> · </strong>
                    <a
                        href="#">Contact</a>
                </p>
                <p class="company-name">Faculté de Medecine © 2020</p>
            </div>
            <div class="col-sm-6 col-md-4 offset-md-0 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p><span class="new-line-span">CHU Tambohobe</span>Fianarantsoa, Madagascar</p>
                </div>
                <div><i class="fa fa-phone footer-contacts-icon"></i>
                    <p class="footer-center-info email text-left"> +261 34 99 244 64</p>
                </div>
                <div><i class="fa fa-envelope footer-contacts-icon"></i>
                    <p> <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">facmedfianar@gmail.com</a></p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 offset-md-0 footer-about">
                <h4 style="text-align:center"><span style="text-decoration: underline;">Apropos du Faculte de Medecine&nbsp;</span></h4>
                <p style="text-align:center;margin-bottom:4%;"> C'est un université public, situé a Fianarantsoa</p>
                <p style="text-align:center"><img src="../assets/img/univ.jpg" style="width: 20%;clip-path:circle();"><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" style="width: 20%;margin-left:25%;clip-path:circle();"></p>
                <div class="social-links social-icons" style="text-align:center"><a href="https://www.facebook.com/groups/302437857152045/"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-rss-square"></i></a></div>
            </div>
        </div>
    </footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
	 <script src="../assets/js/jquery.flyout.js"></script>
    <script src="../assets/js/fullcalendar.min.js"></script>
    <script src="../assets/js/sample_french.js"></script>
    <script src="../assets/js/etudiant/timetable.js"></script>
	<script src="../assets/js/sweetalert.min.js"></script>
    <script src="../assets/js/admin/etudiantModele2-by-ando-1.js"></script>
    <script src="../assets/js/admin/etudiantModele2-by-ando-2.js"></script>
    <script src="../assets/js/admin/etudiantModele2-by-ando-3.js"></script>
    <script src="../assets/js/admin/etudiantModele2-by-ando.js"></script>
    <script src="../assets/js/admin/function.js"></script>
    <script src="../assets/js/admin/tableauEnseignat-modal-1.js"></script>
    <script src="../assets/js/admin/tableauEnseignat-modal.js"></script>
   <script src="../assets/js/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/js/pdfmake/vfs_fonts.js"></script>
	<script src="../assets/js/html2canvas.min.js"></script>
    <script src="../assets/js/Testimomial-Slider.js"></script>
    <script src="../assets/js/etudiant/toPDF.js"></script>
    <script src="../assets/js/allStyle.js"></script>
    <script src="../assets/js/etudiant/parametreCompte.js"></script>
    <script src="../assets/js/etudiant/functionEt.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		showET('<?php echo $_GET["niveau"] ?>','<?php echo $_GET["parcours"] ?>');
		//$('#timetable').fullCalendar('removeEvents');
		//$("#timetable").fullCalendar( 'addEventSource', 'listeET.php?parcours='+'<?php echo $_GET["parcours"] ?>'+'&niveau='+'<?php echo $_GET["niveau"] ?>'+'');
		//$("#niveau").text(' <?php echo $_GET["niveau"] ?> ');
		//$("#parcours").text(' <?php echo $_GET["parcours"] ?> ');
	});

	</script>
</body>

</html>
