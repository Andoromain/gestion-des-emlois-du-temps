
<?php include('serverEnseignant.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inscription Enseignant</title>
	<link rel="shortcut icon" href="fac.ico">
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
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-9 content" style="margin:3% 15% 3% 15%;">
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
													<a href="index" style="font-size: 25px;"><i class="fa fa-home"></i></a>
                                                        <hr>
                                                        <form id="contactForm" method="post" action="inscriptionEnseignant.php">
                                                            
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
                                                                                <h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:400;font-size:27px;">Register Enseignant</h4>
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
                                                                                <div class="form-group"><label>Nom</label><input class="form-control form-control" type="text" name="nomen" style="height: 20px;"></div>
                                                                                <div class="form-group"><label>Prénom</label><input class="form-control form-control" type="text" name="prenomen" style="height: 20px;"></div>
                                                                                <div class="form-group"><label>Matricule</label><input class="form-control form-control" type="text" name="matriculeen"  style="height: 20px;"></div>
                                                                                <div class="form-group"><label>Email</label><input class="form-control form-control" type="email" name="emailen" style="height: 20px;"></div>
                                                                                <div class="form-group"><label>Téléphone<br></label><input class="form-control form-control" type="tel" name="telephoneen" style="height: 20px;"></div>
                                                                                <div class="form-group"><label>Username</label><input class="form-control form-control" type="text" name="usernameen" style="height: 20px;"></div>
                                                                                <div class="form-group"><label>password</label><input class="form-control form-control" type="password" name="password_1" style="height: 20px;"></div>
                                                                                <div class="form-group"><label>Confirm password</label><input class="form-control form-control" type="password" name="password_2" style="height: 20px;"></div>
                                                                            </div>
                                                                            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;"><button class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit" name="registerEn">Register</button>
                                                                                <div class="d-flex justify-content-between">
                                                                                    
                                                                                    <a
                                                                                        id="forgot-password-link" href="#">Mot de passe oublié?</a>
                                                                                </div>
                                                                            </div>
                                                                            <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
                                                                                <p style="margin-bottom:0px;">Vous avez déjà un compte?<a id="register-link" href="loginEnseignant">Se connecter!</a></p>
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