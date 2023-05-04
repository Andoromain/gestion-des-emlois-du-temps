
<?php include('serverEtudiant.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PublicP</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla&amp;amp;subset=latin-ext">
    <link rel="stylesheet" href="assets/css/CSSIN/API-Theme-1.css">
    <link rel="stylesheet" href="assets/css/CSSIN/API-Theme-2.css">
    <link rel="stylesheet" href="assets/css/CSSIN/API-Theme-3.css">
    <link rel="stylesheet" href="assets/css/CSSIN/API-Theme.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Dark-NavBar-1.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Dark-NavBar-2.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Dark-NavBar.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Featured-Section.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Image-slider-carousel-With-arrow-buttons-1.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Image-slider-carousel-With-arrow-buttons.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Login-Box-En.css">
    <link rel="stylesheet" href="assets/css/CSSIN/login-form---Ambrodu-1.css">
    <link rel="stylesheet" href="assets/css/CSSIN/login-form---Ambrodu.css">
    <link rel="stylesheet" href="assets/css/CSSIN/mystyle.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Profile-Card.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Service-Box-Style-01-1.css">
    <link rel="stylesheet" href="assets/css/CSSIN/Service-Box-Style-01.css">
    <link rel="stylesheet" href="assets/css/CSSIN/styles.css">
</head>

<body style="background-color: #f5f5f5;">
    <div>
         <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button" style="background-color: #27284f;color: #ffffff;">
            <div class="container-fluid"><a class="navbar-brand" href="#" style="font-size: xx-large;"><img src="assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" style="width: 62px;border-radius: 40px;">FACULTE DE MEDECINE FIANARANTSOA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"></li>
                        <li class="nav-item" role="presentation"></li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" style="color:#ffffff;" href="#">
                                <h1 class="text-center" style="font-family: 'Aguafina Script', cursive;font-size: x-large;">"Ny aigna ro soa tsa hagnahy"</h1>
                            </a>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div>
                    <h3 class="text-center">Mots du Doyen</h3>
					
					
					
					<!-- debut mot du doyen -->
					
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
                        <p class="profile-bio" style="word-wrap: break-word;"><?php echo $row["contenu"]; ?></p>
						
						<?php
							}
						?>

					<!-- fin mot du doyen -->	
						
                        <ul class="social-list">
                            <li> <i class="fa fa-facebook-official"></i></li>
                            <li> <i class="fa fa-twitter-square"></i></li>
                            <li> <i class="fa fa-linkedin-square"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 content">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card" style="border: 0.5px solid #fff;box-shadow: inset 0 0 10px;">
                            <div class="card-body">
                                <div></div>
                                <div class="card" style="border: 0.5px solid #fff;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div>
                                                    <div class="container-fluid">
                                                        <hr>
                                                        <form id="contactForm" method="post" action="loginEtudiant.php">
                                                            
                                                            <input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form">
                                                            <input
                                                                class="form-control" type="hidden" name="to" value="email@awebsite.com">
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div id="successfail"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <div class="d-flex flex-column justify-content-center" id="login-box">
                                                                            <div class="login-box-header">
                                                                                <h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:400;font-size:27px;">Login</h4>
                                                                            </div>
                                                                            <div class="d-flex flex-row align-items-center login-box-seperator-container">
                                                                                <div class="login-box-seperator-text">
                                                                                    <p style="margin-bottom:0px;padding-left:10px;padding-right:10px;font-weight:400;color:rgb(201,201,201);">
                                                                                        <!-- display validation errors here -->
			                                                                <?php include('errors.php'); ?>       
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="email-login" style="background-color:#ffffff;">
                                                                                <div class="form-group"><label>Username</label><input class="form-control form-control" type="text" name="usernameet" style="height: 20px;"></div>
                                                                                <div class="form-group"><label>password</label><input class="form-control form-control" type="password" name="mdpet" style="height: 20px;"></div>
                                                                            </div>
                                                                            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;"><button class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit" name="login">Login</button>
                                                                                <div class="d-flex justify-content-between">
                                                                                    <div class="form-check form-check-inline" id="form-check-rememberMe"><input class="form-check-input" type="checkbox" id="formCheck-1" for="remember" style="cursor: pointer;" name="check"><label class="form-check-label" for="formCheck-1"></label></div>
                                                                                    <a
                                                                                        id="forgot-password-link" href="#">Forgot Password?</a>
                                                                                </div>
                                                                            </div>
                                                                            <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
                                                                                <p style="margin-bottom:0px;">Don't you have an account?<a id="register-link" href="inscriptionEtudiant.php">Sign Up!</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/JSIN/API-Theme.js"></script>
    <script src="assets/js/JSIN/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
    <script src="assets/js/JSIN/Image-slider-carousel-With-arrow-buttons.js"></script>
</body>

</html>