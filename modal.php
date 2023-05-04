<?php include('server.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>medecine - copie</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/css/KD_Header-2.css">
    <link rel="stylesheet" href="assets/css/Animated-Header--Easy-Editable--1.css">
    <link rel="stylesheet" href="assets/css/Animated-Header--Easy-Editable-.css">
    <link rel="stylesheet" href="assets/css/Central-Align-Logo-Header-With-Nav.css">
    <link rel="stylesheet" href="assets/css/header-1.css">
    <link rel="stylesheet" href="assets/css/header-2.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/KD_Header-1.css">
    <link rel="stylesheet" href="assets/css/KD_Header.css">
    <link rel="stylesheet" href="assets/css/Navbar-with-menu-and-login.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
	<!--Mon CSS ko -->
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
    <header id="header" style="background-color: #fffff;">
        <h1 class="text-capitalize" id="facMed" style="color: rgb(249,249,249);background-color: #27284f;">E.N.T Faculté de Medecine<img id="logo" src="assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg"></h1>
    </header>
    <nav class="navbar navbar-light navbar-expand-md" id="navMenu">
        <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <p class="navbar-text" id="univ">Université de Fianarantsoa &nbsp;<img id="logoUniv" src="assets/img/univ.jpg"></p>
            </div>
        </div>
    </nav>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Inscription -->
	<br />
	<br />
	<br />
	<br/>
	<br/>
	<div>
		<style>
		*{
			margin: 0px;
			padding: 0px;
			font-family: helventica,Arial,sans-serif;
		}
		/*fulle-width fields*/
		input[type=text],input[type=password]
		{
			width: 70%;
			padding-top: 5px 14px;
			margin-left: 14%;
			margin-bottom: 3%;
			text-align: center;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			font-size: 16px;
		}
		
		/*set a style for all button*/
		button
		{
			background-color: #4CAF50;
			color: white;
			padding: 5px 14px;
			margin-left: 14%;
			border: none;
			cursor: pointier;
			width: 70%;
			font-size: 20px;
		}
		
		button:hover
		{
			opacity: 0.8;
		}
		
		/*center the image and position the close button*/
		.imgcontainer
		{
			text-align: center;
			margin: 24px 0 12px 0;
			position: relative;
		}
		
		.avatar
		{
			width: 80px;
			height: 80px;
			border-radius: 50%;
		}
		
		/*The Modal (backgruond)*/
		.modal
		{
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0,0,0,0.4);
		}
		
		/*Modal content Box*/
		.modal-content
		{
			background-color: #fefefe;
			margin-top: 180px;
			margin-left: 32%;
			border: 1px solid #888;
			width: 30%;
			min-width: 100px;
			padding-botton: 30px;
		}
		
		/*The close Button*/
		.close
		{
			position: absolute;
			right: 25px;
			top: 0;
			color: #000;
			font-size: 35px;
			font-weight: bold;
		}
		
		.close:hover,.close:focus
		{
			color: red;
			cxursor: pointer;
		}
		
		/*Add zom animation*/
		.animate
		{
			animation: zoom 0.6s; //tokony his ;
		}
		
		@keyframes zoom
		{
			from {transform: scale(0);} //tokony his ;
			to{transform: scale(1);}
		}
			
			
			.modal-footer {

    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding: 15px;
    border-top: 1px solid #eceeef;
}
.modal-footer {

    background-color: #27284f;
    height: 50px;
}	


#titreFac {

    margin: -2px 1px 1px 1px;
    color: #CED0D0;
    font-family: initial;

}
#logoFac {

    width: 32px;
    height: 32px;
    float: left;
    clip-path: circle();
	border-style: none;
}
	</style>
	
	<body background="IMAGES/ouverture.png" style="background: no-repeat" onload="document.getElementById('modal-wrapper').style.display='block'">
		<h1 style="text-align: center; font-size: 50px; color: #fff">Modal Box login Form</h1>
		
		<div id="modal-wrapper" class="modal">
			<form class="modal-content animate" method="POST" action="index.php">
			<div class="imgcontainer">
		<img src="IMAGES/ouverture.png" alt="avatar" class="avatar">
		</div>
				<div class="container">
					<input type="password" placeholder="Enter Password" name="psw">
					<button type="submit" name="enter">Enter</button>
					<a href="#" style="text-decoration: none; float: right; margin-right: 34px; margin-top: 26px;">Forgot Password? </a>
				
				</div>
				
				<!--footer-->
			<div class="modal-footer">
                        <h5 id="titreFac">Faculte de Medecine</h5><img src="assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logoFac">
			</div>
			</form>
			
		</div>
		
	
		
	
	</div>
</body>

</html>