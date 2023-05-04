<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Faculté de Médecine de Fianarantsoa</title>
	<link rel="shortcut icon" href="fac.ico">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla&amp;amp;subset=latin-ext">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/page/API-Theme-1.css">
    <link rel="stylesheet" href="assets/css/page/API-Theme-2.css">
    <link rel="stylesheet" href="assets/css/page/API-Theme-3.css">
    <link rel="stylesheet" href="assets/css/page/API-Theme.css">
    <link rel="stylesheet" href="assets/css/page/ImageSlidePete.css">
    <link rel="stylesheet" href="assets/css/page/Dark-NavBar-1.css">
    <link rel="stylesheet" href="assets/css/page/Dark-NavBar-2.css">
    <link rel="stylesheet" href="assets/css/page/Dark-NavBar.css">
    <link rel="stylesheet" href="assets/css/page/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="assets/css/page/mystyle.css">
    <link rel="stylesheet" href="assets/css/page/Profile-Card.css">
    <link rel="stylesheet" href="assets/css/page/Search-Input-responsive.css">
    <link rel="stylesheet" href="assets/css/page/Service-Box-Style-01-1.css">
    <link rel="stylesheet" href="assets/css/page/Service-Box-Style-01.css">
    <link rel="stylesheet" href="assets/css/page/styles.css">
    <link rel="stylesheet" href="assets/css/page/Testimomial-Slider.css">
    <link rel="stylesheet" href="assets/css/page/viewsection.css">
</head>

<body style="background-color: #f5f5f5;">
    <div>
        <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button" style="background-color: #27284f;color: #ffffff;padding-top:0%;padding-bottom:0%">
            <div class="container-fluid">
			<img src="assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" style="width:18px;width: 5vw;border-radius: 40px;">
			<a class="navbar-brand" href="" style="font-size: 2.5vw;text-align:center">&nbsp;&nbsp;FACULTE DE MEDECINE DE FIANARANTSOA <p style="font-size:1.7vmax;margin-top:-1%;font-family: 'Aguafina Script', cursive;"> " Ny aigna ro soa tsa hagnahy "</p></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
			
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"></li>
                        <li class="nav-item" role="presentation"></li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" style="color:#ffffff;" href="#">
                                <h1 class="text-center" style="font-family: 'Aguafina Script', cursive;font-size: x-large;"><img src="univ.png" style="width: 4vw;"></h1>
                            </a>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="container-fluid" style="border: 0.5px solid #f5f5f5;">
        <div class="row">
            <div class="col-md-3 sidebar">
                    <div>
                    <h3 class="text-center">Mots du Doyen</h3>
					
					
                    <div class="profile-card">
						<?php
						
							
							require("modele.php");	
							$requete=motduDoyen();
							while($row=$requete->fetch()){	
						?>
                        <div class="profile-back"></div><img class="rounded-circle profile-pic" 
						<?php  if(!empty($row["image"])){
								echo 'src="imagesPub/'.$row["image"].'"';
						}else if(!empty($row["image1"])){
								echo 'src="imagesPub/'.$row["image1"].'"';
						}else if(!empty($row["image2"])){
								echo 'src="imagesPub/'.$row["image2"].'"';
						}else if(!empty($row["image3"])){
								echo 'src="imagesPub/'.$row["image3"].'"';
						}
						
						?> >
                        <h3 class="profile-name"><?php echo $row["titre"]; ?></h3>
                        <p class="profile-bio" style="word-wrap: break-word;text-align:justify"><?php echo $row["contenu"]; ?></p>
						
						<?php
							}
							
						?>

					<!-- fin mot du doyen -->	
						
                        <ul class="social-list">
							
                            <li> <a href="https://www.facebook.com/groups/302437857152045/?amp%3B_rdr&_rdc=2&_rdr"><i class="fa fa-facebook-official"></i></a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 content">
                <div class="card" style="border: 0.5px solid #f5f5f5;">
                    <div class="card-header" style="border: 0.5px solid #f5f5f5;">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-7"><button class="btn btn-primary" type="button" style="font-family: 'Karla';font-size: 26px;padding: 0px 7px 0px 7px;top: -7px;font-weight: 800;border-radius: 0px;background-color: #EE161F;border-color: transparent;">Acceuil</button></div>
                            <div
                                class="col-12 col-sm-6 col-lg-5 text-right">
                                <div class="btn-group btn-group-justified" role="group">
                                    <div class="dropdown btn-group" role="group"><button class="btn btn-primary " data-toggle="dropdown" aria-expanded="false" type="button">E.N.T&nbsp;<i class="fa fa-chevron-down"></i></button>
                                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="loginEtudiant">Etudiant </a><a class="dropdown-item" role="presentation" href="loginEnseignant">Enseignant </a><a class="dropdown-item" role="presentation" href="loginAdministrateur">Admin </a></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="border: 0.5px solid #f5f5f5;box-shadow: inset 0 0 10px;">
                    <div class="row">
                  <!-- debut actualite -->
						
						<?php 
							$requete1=actualite();
							$nbr=$requete1->rowCount();
							if($nbr==2){
								while($row1=$requete1->fetch()){
						?>
                            <div class="col-md-4">
                                <div class="serviceBox yellow">
                                    <div class="service-content">
                                        <h3><?php echo $row1["titre"]; ?></h3>
                                        <hr>
                                        <p><?php echo $row1["contenu"]; ?>
										<?php
										
						if(!empty($row1["image"])){
							echo '<a href="imagesPub/'.$row1["image"].'" >'. $row1["image"].'</a> ';
						}
						if(!empty($row1["image1"])){
								echo '<a href="imagesPub/'.$row1["image1"].'" >'. $row1["image1"].'</a> ';
						}
						if(!empty($row1["image2"])){
								echo ' <a href="imagesPub/'.$row1["image2"].'" >'. $row1["image2"].'</a> ';
						}
						if(!empty($row1["image3"])){
								echo ' <a href="imagesPub/'.$row1["image3"].'" >'.$row1["image3"].'</a> ';
						}
										?>
										</p>
                                    </div>
                                </div>
                            </div>
						<?php
								}
							}else{	
								while($row=$requete1->fetch()){
						?>			
						     <div class="col-md-4">
                                <div class="serviceBox yellow">
                                    <div class="service-content">
                                        <h3><?php echo $row["titre"]; ?></h3>
                                        <hr>
                                        <p><?php echo $row["contenu"]; ?>
										<?php
										
						if(!empty($row["image"])){
							echo '<a href="/imagesPub/'.$row["image"].'" >'. $row["image"].'</a> ';
						}
						if(!empty($row["image1"])){
								echo '<a href="/imagesPub/'.$row["image1"].'" >'. $row["image1"].'</a> ';
						}
						if(!empty($row["image2"])){
								echo ' <a href="/imagesPub/'.$row["image2"].'" >'. $row["image2"].'</a> ';
						}
						if(!empty($row["image3"])){
								echo ' <a href="/imagesPub/'.$row["image3"].'" >'.$row["image3"].'</a> ';
						}
										?>
										
										</p>
                                    </div>
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="serviceBox yellow">
                                    <div class="service-content">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
						<?php }
							}
						?>
						
						<!-- fin actualite -->
                        <div class="col-md-4">
                            <div class="float-left float-md-right mt-5 mt-md-0 search-area"></div><br><br>
                            <section class="showcase">
                                <div class="container-fluid p-0">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 text-white showcase-img" style="background-image: url(&quot;foto2.jpg&quot;);background-position: right;"><span></span></div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col" style="margin-top: -53px;">
                                            <hr style="border: 0.5px #f00 dotted;">
                                            <h2 style="font-family: Muli, sans-serif;color: #ec1b23;font-size: 12px;text-align: center;"><a href="index" style="color: #ec1b23;">Acceuil</a></h2>
                                            <hr style="border: 0.5px #f00 dotted;">
                                            <h2 style="font-family: Muli, sans-serif;color: #ec1b23;font-size: 12px;text-align: center;"><a href="pageActualite" style="color: #ec1b23;">Actualités<br></a></h2>
                                            <hr style="border: 0.5px #f00 dotted;">
                                            <h2 style="font-family: Muli, sans-serif;color: #ec1b23;font-size: 12px;text-align: center;"><a href="pageContact" style="color: #ec1b23;">Contacts</a></h2>
                                            <hr style="border: 0.5px #f00 dotted;">
                                            <h2 style="font-family: Muli, sans-serif;color: #ec1b23;font-size: 12px;text-align: center;"><a href="pageHistorique" style="color: #ec1b23;">Historique</a></h2>
                                            <hr style="border: 0.5px #f00 dotted;">
                                            <h2 style="font-family: Muli, sans-serif;color: #ec1b23;font-size: 12px;text-align: center;"><a href="pageListeEnseignant" style="color: #ec1b23;">Enseignants</a></h2>
                                            <hr style="border: 0.5px #f00 dotted;">
                                            <h2 style="font-family: Muli, sans-serif;color: #ec1b23;font-size: 12px;text-align: center;"><a href="pageLiensUtils" style="color: #ec1b23;">Liens utiles</a></h2>
                                            <hr style="border: 0.5px #f00 dotted;">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="jumbotron" style="padding: 15px;background-color: #fff;" >
                        <h1 class="text-center" style="font-family:'Aguafina Script', cursive;">La Faculté de Médecine de Fianarantsoa</h1>
                        <p style="text-align:justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Faculté de Médecine de l’Université de Fianarantsoa est implantée dans la belle région de Haute Matsiatra réputée pour son vin, son thé et sa biodiversité. Elle propose 3 mentions paramédicales (maïeutique, infirmière et technicien de laboratoire) avec un parcours complet de licence et une mention médecine humaine sanctionnée par le diplôme d'État de docteur en médecin à la fin du cursus. Pour les autres mentions, c’est seulement la première année commune aux études de santé (PACES) que les étudiants suivent à Fianarantsoa puis ils continueront leurs études à la Faculté de Médecine d’Antananarivo (mentions masso-kinésithérapie, anesthésiste et manipulateur radiologie) ou à l’Institut d'Odonto-Stomatologie Tropicale de Madagascar à Mahajanga (dentiste et assistant dentaire) L’entrée à la Faculté de Médecine de Fianarantsoa se fait par voie de sélection de dossier par une commission sous tutelle de la Présidence de l’Université. Et pour le passage en L2, il faut réussir le concours de la  PACES. La formation théorique est dispensée par 16 enseignants permanents au sein de la Faculté de Médecine de Fianarantsoa, et une quarantaine d’enseignants vacataires spécialistes ou professeurs dont la majorité vient des autres Facultés de Médecine. Les stages pratiques se déroulent essentiellement dans 2 grands hôpitaux universitaires (CHU) de Fianarantsoa, et dans tous les centres de santé de base (CSB) urbains mais surtouts ruraux de toutes les régions de l’Ex-province de Fianarantsoa. Le bureau administratif de la faculté se trouve dans l’enceinte du CHU Tambohobe. La faculté dispose 2 campus l’un à l’IFIRP Tambohobe pour les formations paramédicales et l’autre à l’Université Andrainjato pour la mention médecine humaine.</p>
                        <div id="cbp-fwslider" class="cbp-fwslider"><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$( function() {
    /*
    - how to call the plugin:
    $( selector ).cbpFWSlider( [options] );
    - options:
    {
        // default transition speed (ms)
        speed : 500,
        // default transition easing
        easing : 'ease'
    }
    - destroy:
    $( selector ).cbpFWSlider( 'destroy' );
    */

    $( '#cbp-fwslider' ).cbpFWSlider();

} );
</script></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
		<?php require("responsable.php"); ?>
    <div class="footer-basic">
        <footer>
            <div class="social" style="color: white;"><a href="https://www.facebook.com/groups/302437857152045/"><i class="fa fa-facebook"></i></a><a href="https://mail.google.com/mail/u/0/#inbox"><i class="fa fa-envelope-o"></i></a></div>
            <ul class="list-inline" style="color: white;">
                <li class="list-inline-item"><a href="index.php">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">facmedfianar © 2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/API-Theme.js"></script>
    <script src="assets/js/HoverText-Plugin-V1.js"></script>
    <script src="assets/js/ImageSlidePete.js"></script>
    <script src="assets/js/Testimomial-Slider.js"></script>
</body>

</html>