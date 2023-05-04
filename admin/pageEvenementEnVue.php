<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Evenement des enseignants</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Animated-Header--Easy-Editable--1.css">
    <link rel="stylesheet" href="../assets/css/Central-Align-Logo-Header-With-Nav.css">
    <link rel="stylesheet" href="../assets/css/fullcalendar.css">
    <link rel="stylesheet" href="../assets/css/modalAddEvent.css">
    <link rel="stylesheet" href="../assets/css/modalAddEventTout.css">
    <link rel="stylesheet" href="../assets/css/pageET.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="../assets/css/styleMenu.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
	<style>
#img {
    position: relative;
    width: 25px;
    min-width: 23%;
    display: block;
    margin: 0px 40% 1% 40%;
    z-index: 5;
    background-color: 
	white;
	clip-path: circle();
	border-radius: 48px;
	border: 1px solid
	rgb(0,255,224);
	box-shadow: 1px 4px 28px blue;
}
#modalParamAdmin #div {
    margin: 0% 0% 4% 0%;
}
#iconUser {
    border: double;
    border-radius: 30px;
    padding: 3px;
    color: 
    rgb(102,153,255);
    position: relative;
    margin: 0% 0% 0% 4%;
    float: left;
    position: relative;
}
#modalParamAdmin span {
    word-wrap: break-word;
    text-align: center;
    margin-left: 13px;
    min-width: 106px;
    max-width: 106px;
}
.input {
    position: relative;
    display: inline-block;
    margin-left: 3%;
    width: 60%;
}
#modalParamAdmin #modifierEn{
	float:right;
}

.modal-footer {
    background-color: 
    #27284f;
    height: 50px;
}
	
	</style>

</head>

<body onload="envoyerReqNomEn('nomEn.php');envoyerReqMailEn('mailEn.php');">
	<input id="codeAdminAncien" class="d-none" value='<?php echo $_SESSION["codead"]; ?>' >
    <header id="header" style="background-color: #fffff;">
        <h1 class="" id="facMed" style="text-transform:initial;color: rgb(249,249,249);background-color: #27284f;">E.N.T Faculté de Médecine<img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logo"><a href="#" id=
		"usernameConnecte"><i class="fa fa-user" id="iconUsername"></i><span id="usernameConnecteSpan"><?php
				if(isset($_SESSION["usernamead"])){
					echo $_SESSION["usernamead"];}?></span></a></h1>
    </header>
    <nav class="navbar navbar-light navbar-expand-md" id="navMenu">
        <div class="container-fluid"><a class="navbar-brand" href="acceuil.php">Home</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav" id="navigation">
                    <li class="nav-item" role="presentation" id="adminNav"><a class="nav-link" href="controleurPageEtudiant.php">Etudiant</a></li>
                    <li class="nav-item" role="presentation" id="adminNav"><a class="nav-link" href="controleurPageEnseignant.php">Enseignant</a></li>
                    <li class="nav-item" role="presentation" id="adminNav"><a class="nav-link" href="controleurPageET.php">Emploi du Temps</a></li>
                    <li class="nav-item" role="presentation" id="adminNav" style="background-color:rgb(102,153,255)"><a class="nav-link active" href="pageEvenementEn.php?niveau=L1&parcours=PMED">Evenement des Enseignants</a></li>
					 <li class="nav-item dropdown" ><a class="dropdown-toggle  nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Administration</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="creerActualite.php">Publication</a><a class="dropdown-item" role="presentation" href="pageVerifierEtudiantVue.php">Verification Etudiant</a>
							<a class="dropdown-item" role="presentation" href="pageverifierEnseignant.php">Verification Enseignant</a><a class="dropdown-item" role="presentation" href="pageVerifierAdmin.php">Verification Admin</a><a class="dropdown-item" role="presentation" href="statistiqueEn.php">Statistique des heures d'enseignement</a>
							
							</div>
                      </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" id="Menulogin"><img src="../assets/img/kissclipart-team-member-icon-clipart-user-computer-icons-a9df604fa77d98a4.png" id="imageMenuLogin"></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#" id="paramCompteAdmin" data-toggle="modal" data-target="#modalParamAdmin">Parametre du Compte</a><a class="dropdown-item" role="presentation" href="logout.php">Logout</a></div>
                    </li>
                </ul>
                <p class="navbar-text" id="univ">Université de Fianarantsoa &nbsp;<img src="../assets/img/univ.jpg" id="logoUniv"></p>
            </div>
        </div>
    </nav>

	<!--niova tato -->
    <div id="modalAveclink">
        <div class="modal fade" role="dialog" tabindex="-1" id="modalParamAdmin">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header box" style=" background-color: #3EC9E5;height: 124px;">
                        <h4 class="modal-title" style="
						text-align: center;
						width: 98%;
						max-height: 20%;
						margin-top: 11%;
						z-index: 5;
					"><img src="../assets/img/avatar.png" id="img" class="box"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
						<br>
						<br>
						 <div id="div"><i class="fa fa-user" id="iconUser"></i><span>Usename  &nbsp; &nbsp; &nbsp; &nbsp;  :</span><input type="text" class="input" name="usernameAdmin" value='<?php echo $_SESSION['usernamead'] ?>' ></div>
                        <div id="div"><i class="fa fa-user" id="iconUser"></i><span>CodeAdmin &nbsp; &nbsp; :</span><input type="text" name="codeAdmin" class="input" value='<?php echo $_SESSION['codead'] ?>' ></div>
                        <div id="div"><i class="fa fa-key" id="iconUser"></i><span>Mot de Passe &nbsp;:</span><input type="password" name="password_1Ad" class="input" ></div>
                        <div id="div"><i class="fa fa-key" id="iconUser"></i><span>Confirmation  &nbsp;:</span><input type="password" name="password_2Ad" class="input"></div>
                        <div><button class="btn btn-primary" type="button" id="modifierEn">Modifier</button><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
                    </div>
                    <div class="modal-footer">
                        <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logoFac"></div>
                </div>
            </div>
        </div>
    </div>
	<!--niova tato -->
	<br>
	
    <div id="divaETSpan">
        <div class="text-center" id="divaInput" style="margin: 5px;">

		 <input type="radio" name="type1" value="L1manokana" id="L1manokanaLab"><label> &nbsp;&nbsp; Pour L1</label><br>
		 <div id="L1manokana" class="d-none">
       <select id="L1manokana" >
                       <option value="PMED" selected="">Pacès Medecine</option>
                       <option value="PPAR">Pacès Paramed</option>
                       <option value="MEDSp">MED Hum</option>
                       <option value="ODOSp">Odonto Stomato</option>
                       <option value="MASSp">Massokiné</option>
                       <option value="MRSp">Manip Radio</option>
                       <option value="TCLSp">Tech Lab</option>
                       <option value="INFSp">Inf</option>
                       <option value="SGFSp">SF</option>
                       <option value="ANESp">Anesth</option>
          </select>
		 </div>
		 <input type="radio" name="type1" value="hafa" id="hafaLab"><label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Autre</label><br>
		<div id="hafa" class="d-none">
		     <select id="parcoursSearchTout"><option value="MED" selected="">Medecine </option><option value="SGF">Sage Femme</option><option value="TCL">Technicien de Labo</option><option value="INF">Infirmerie</option></select><select id="niveauSearchTout"><option value="L2">L2</option><option value="L3">L3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>
         <br><br>
    </div>
            <button
                class="btn btn-primary" type="button" id="searchTout" style="padding: 2px 6px 6px 6px;"><i class="icon ion-ios-search"></i>
			</button>
        </div>
        <h4 class="text-center" id="headingET">Liste des evenements des enseignants dans&nbsp;<span id="niveauSpanTout">........</span><span id="parcoursSpanTout">&nbsp;.........</span>&nbsp;&nbsp;</h4>
		
		<button class="btn btn-primary" data-toggle="modal" data-target="#modalAddEventTout" type="button" style="margin-left:18%;"><i class="fa fa-plus"></i>&nbsp;Ajouter</button>
		<br>
		<br>
		
        <div class="container">
            <div id="calendarTout"></div>
            <div class="modal fade" role="dialog" tabindex="-1" id="modalAddEventTout">
				<form>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header box">
                            <h4>Ajouter un évènement</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <p class="text">Numero matricule de l'enseignant :</p><select id="matriculeEnAddTout" class="input"></select>
                            <p class="text">Evenement:</p><input type="text" id="nomEvenementTout" class="input">
							
                            <!--niova tato-->
						<p class="text"> <input type="radio" name="type" value="pourL1" id="pourL1Lab"> Pour L1 :</p>
					<div id="pourL1" class="d-none">
						<select
                            id="pourL1" class="input">
                            <option value="PMED" selected="">Pacès Medecine</option>
                            <option value="PPAR">Pacès Paramed</option>
                            <option value="MEDSp">MED Hum</option>
                            <option value="ODOSp">Odonto Stomato</option>
                            <option value="MASSp">Massokiné</option>
                            <option value="MRSp">Manip Radio</option>
                            <option value="TCLSp">Tech Lab</option>
                            <option value="INFSp">Inf</option>
                            <option value="SGFSp">SF</option>
                            <option value="ANESp">Anesth</option>
                        </select>
					</div>		
                        
						<p class="text"> <input type="radio" name="type" value="autre" id="autreLab"> Autre :</p>
						
					<div id="autre" class="d-none">	
						<p><span class="" >Parcours :</span><span id="textNiveau" class="">Niveau :</span></p><select id="parcoursTout" class="input"><option value="MED" selected="">Medecine Humaine</option><option value="SGF">Sage Femme</option><option value="TCL">Technicien de Labo</option><option value="INF">Infirmerie</option></select>
                        <select
                            id="niveauTout" class="input">
                            <option value="L2" selected="">L2</option>
                            <option value="L3">L3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>        
					
                                <p class="text">Matiere :</p><input type="text" id="matiereTout" list="dataMatiere" class="input" onkeyup="javascript:envoyerReqMatiere('ajaxMatiere.php',this.value)" >
                                <datalist id="dataMatiere">
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              								        <option></option>
              		  					</datalist>
                                <p class="text">Lieu :</p><input type="text" id="lieuTout" class="input">
                                <p class="text">Repetition :</p><input type="radio" id="uneseulefoisTout" name="repetitionTout" value="1"><label>une seule fois</label>
                                <p><input type="radio" id="repeatSemaineTout" name="repetitionTout" value="7"><label>par semaine</label></p>
                                <div class="d-none" id="repetitionTout"><label id="label">Debut &nbsp; :&nbsp;</label><input type="date" id="dateDebTout">
                                    <div><label>Fin &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;</label><input type="date" id="dateFinTout"></div>
                                </div>
                                <p class="text">Quand :</p>
                                <!--niova ny heure -->
								
							 <div><label>Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;</label><input class="form-control-sm" type="date" id="dateTout"></div><label>heure debut &nbsp;: &nbsp;</label><input class="form-control-sm" type="time" id="heureDebTout">
                            <div><label>heure fin &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;</label><input class="form-control-sm" type="time" id="heureFinTout"></div>
							
							
							<!--niova ny heure -->
                                <div id="cancelSave"><button class="btn btn-primary" type="button" id="enregistrerTout">Enregistrer</button></div>
                        </div>
                        <div class="modal-footer">
                            <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logoFac"></div>
                    </div>
                </div>
				</form>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="modalUpdateEventTout">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><strong>Action sur un évènement</strong><br></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <p class="text">Numero matricule de l'enseignant :</p><select id="matriculeEnUpdateTout" class="input"></select>
                            <p class="text">Evenement:</p><input type="text" id="nomEvenementTout" class="input">
                                                    <!--niova tato-->
						<p class="text"> <input type="radio" name="type" value="pourL1" id="pourL1LabU"> Pour L1 :</p>
					<div id="pourL1U" class="d-none">
						<select
                            id="pourL1" class="input">
                            <option value="PMED" selected="">Pacès Medecine</option>
                            <option value="PPAR">Pacès Paramed</option>
                            <option value="MEDSp">MED Hum</option>
                            <option value="ODOSp">Odonto Stomato</option>
                            <option value="MASSp">Massokiné</option>
                            <option value="MRSp">Manip Radio</option>
                            <option value="TCLSp">Tech Lab</option>
                            <option value="INFSp">Inf</option>
                            <option value="SGFSp">SF</option>
                            <option value="ANESp">Anesth</option>
                        </select>
					</div>		
                        
						<p class="text"> <input type="radio" name="type" value="autre" id="autreLabU"> Autre :</p>
						
					<div id="autreU" class="d-none">	
						<p><span class="" >Parcours :</span><span id="textNiveau" class="">Niveau :</span></p><select id="parcoursTout" class="input"><option value="MED" selected="">Medecine Humaine</option><option value="SGF">Sage Femme</option><option value="TCL">Technicien de Labo</option><option value="INF">Infirmerie</option></select>
                        <select
                            id="niveauTout" class="input">
                            <option value="L2" selected="">L2</option>
                            <option value="L3">L3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                                <p class="text">Matiere :</p><input type="text" id="matiereTout"  list="dataMatiere" class="input" onkeyup="javascript:envoyerReqMatiere('ajaxMatiere.php',this.value)" >
                                <datalist id="dataMatiere">
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                                      <option></option>
                              </datalist>
                                <p class="text">Lieu :</p><input type="text" id="lieuTout" class="input">
                                <p class="text">Repetition :</p><input type="radio" id="uneseulefoisTout" name="repetitionTout" value="1"><label>une seule fois</label>
                                <p><input type="radio" id="repeatSemaineTout" name="repetitionTout" value="7"><label>par semaine</label></p>
                                <div class="d-none" id="repetitionTout"><label id="label">Debut &nbsp; :&nbsp;</label><input type="date" id="dateDebTout">
                                    <div><label>Fin &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;</label><input type="date" id="dateFinTout"></div>
                                </div>
                                <p class="text">Quand :</p>
                                <div><label>Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;</label><input class="form-control-sm" type="date" id="dateTout"></div><label>heure debut &nbsp;: &nbsp;</label><input class="form-control-sm" type="time"
                                    id="heureDebTout">
                                <div><label>heure fin &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;</label><input class="form-control-sm" type="time" id="heureFinTout"></div><button class="btn btn-primary" type="button" id="supprimerTout">Supprimer</button><button class="btn btn-primary"
                                    type="button" id="modifierTout">Modifier</button></div>
                        <div class="modal-footer">
                            <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logoFac"></div>
                    </div>
                </div>
            </div><br><br></div>
    </div><button class="btn btn-primary" type="button"  style="margin-left:550px" id="genererPDFToutEn">Generer du PDF</button>
	<br>
	<br>
    <?php require("footer.php"); ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/fullcalendar.min.js"></script>
    <script src="../assets/js/calendarTout.js"></script>
    <script src="../assets/js/functionCalendarTout.js"></script>
    <script src="../assets/js/jsCalendarTout.js"></script>
    <script src="../assets/js/sample_french.js"></script>
    <script src="../assets/js/styleCalendar.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
	 <script src="../assets/js/admin/paramCompte.js"></script>
   <script src="../assets/js/functionML.js"></script>
   <script src="../assets/js/jspdf.debug.js"></script>
    <script src="../assets/js/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/js/pdfmake/vfs_fonts.js"></script>
	<script src="../assets/js/html2canvas.min.js"></script>
   
   <script type="text/javascript">
   $(document).ready(function(){
		$("#pourL1Lab").click(function(){
			$("#pourL1").removeClass("d-none");
			$("#pourL1").slideDown("normal");
			$("#autre").addClass("d-none");
		});
		
		$("#autreLab").click(function(){
			$("#autre").removeClass("d-none");
			$("#autre").slideDown("normal");
			$("#pourL1").addClass("d-none");
		});
		$("#pourL1LabU").click(function(){
			$("#pourL1U").removeClass("d-none");
			$("#pourL1U").slideDown("normal");
			$("#autreU").addClass("d-none");
		});
		
		$("#autreLabU").click(function(){
			$("#autreU").removeClass("d-none");
			$("#autreU").slideDown("normal");
			$("#pourL1U").addClass("d-none");
		});
		
		<?php
		if(isset($_GET["niveau"]) && $_GET["parcours"]){
			if($_GET["niveau"]=='L1'){
		?>
			$("#pourL1").removeClass("d-none");
			$("#pourL1U").slideDown("normal");
			$("#pourL1LabU").prop("checked",true);
			
			$("#L1manokanaLab").prop("checked",true);
			$("#L1manokana").removeClass("d-none");
			
			niveau='<?php echo $_GET["niveau"]; ?>';
			parcours='<?php echo $_GET["parcours"]; ?>';
			lister(niveau,parcours);
			$("#pourL1Lab").prop("checked",true);
		<?php
			}else{
		?>
			$("#autreU").removeClass("d-none");
			$("#autre").removeClass("d-none");
			$("#autre").slideDown("normal");
			$("#autreU").slideDown("normal");
			
			$("#autreLab").prop("checked",true);
			$("#autreLabU").prop("checked",true);
			
			$("#hafaLab").prop("checked",true);	
			$("#hafa").removeClass("d-none");
			niveau='<?php echo $_GET["niveau"]; ?>';
			parcours='<?php echo $_GET["parcours"]; ?>';
			lister(niveau,parcours);
			$("#autreLab").prop("checked",true);
		<?php
			}
		}
		?>	
		 $("#L1manokanaLab").click(function(){
			$("#L1manokana").removeClass("d-none");
			$("#L1manokana").slideDown("normal");
			$("#hafa").addClass("d-none");
		});
		$("#hafaLab").click(function(){
			$("#hafa").removeClass("d-none");
			$("#hafa").slideDown("normal");
			$("#L1manokana").addClass("d-none");
	});
   });
	</script>
<script type="text/javascript">
    $(document).ready(function(){
       /* var doc = new jsPDF();
		doc.setFontSize(10);
		doc.setFont("Times", "bold");
		doc.text( 'FACULTE DE MEDECINE\r            --------------', 100, 20, 'center' );
		doc.text( '  ', 100, 22, 'center' );
		doc.setFont("Times", "normal");
		doc.text( 'Tel :034 99 244 64   ; E-mail : facmedfianar@gmail.com', 103,30, 'center' );
		doc.setFont("Times", "bold");
		doc.text( 'EMPLOI DU TEMPS du', 62,43,  );
		doc.setFont("Times", "normal");
		doc.text( '12 Septembre au 22 Novembre 2020', 101,43,  );
        $('#genererPDFToutEn').click(function () {
           
            doc.save('emploi du temps.pdf');
        });*/
	var moi1=$.fullCalendar.moment().startOf('week').month();
	var moi=$.fullCalendar.moment().endOf('week').month();
	var jour=$.fullCalendar.moment().endOf('week').date();
	var jour1=$.fullCalendar.moment().startOf('week').date();
	var annee=$.fullCalendar.moment().endOf('week').year();
	var mois1,mois;
	if(moi==0){
		mois1="Janvier";
		mois="Janvier";
	}
	if(moi==1){
		mois1="Fevrier";
		mois="Fevrier";
	}
	if(moi==2){
		mois1="Mars";
		mois="Mars";
	}
	if(moi==3){
		mois1="Avril";
		mois="Avril";
	}
	if(moi==4){
		mois1="Mai";
		mois="Mai";
	}
	if(moi==5){
		mois1="Juin";
		mois="Juin";
	}
	if(moi==6){
		mois1="Juillet";
		mois="Juillet";
	}
	if(moi==7){
		mois1="Aout";
		mois="Aout";
	}
	if(moi==8){
		mois1="Septembre";
		mois="Septembre";
	}
	if(moi==9){
		mois1="Octobre";
		mois="Octobre";
	}
	if(moi==10){
		mois1="Novembre";
		mois="Novembre";
	}
	if(moi==11){
		mois1="Decembre";
		mois="Decembre";
	}
	var debut="    "+jour1+" "+mois1+"   ";
	var fin="    "+jour+" "+mois+"   "+annee;
	$('#genererPDFToutEn').click(function () {
	
	html2canvas($('#calendarTout .fc-view-container'), {
        onrendered: function (canvas) {
                var img = canvas.toDataURL();
	
	var docDefinition = {
			
			content:[
			{
				text: 'FACULTE DE MEDECINE\n',
				style: 'header'
			},
			{
				text: [
					{ text: '-----------\n ', fontSize: 15, bold: true,alignment:'center' },
					{ text: 'Tel :034 99 244 64   ; E-mail : ', fontSize: 11 },
					{ text: 'facmedfianar@gmail.com \n\n', decoration:'underline',fontSize: 11 },
					{ text: 'EMPLOI DU TEMPS du ', fontSize: 12,bold:true,alignment:'center' },
					{ text: debut, fontSize: 11,alignment:'center' },
					{ text: 'au ', fontSize: 12,bold:true,alignment:'center' },
					{ text: fin, fontSize: 11,alignment:'center' },
					{ text: "\n", fontSize: 11,alignment:'center' },
					{ text: "Parcours  :  ", fontSize: 12,bold:true,alignment:'center' },
					{ text: $("#parcoursSpanTout").text(), fontSize: 11,alignment:'center' },
					{ text: "\n", fontSize: 11,alignment:'center' },
					{ text: "Niveau  :  ", fontSize: 12,bold:true,alignment:'center' },
					{ text: $("#niveauSpanTout").text(), fontSize: 11,alignment:'center' },
					{ text: "\n", fontSize: 11,alignment:'center' },
				]
			},{
				image:'monimage',
				width:50,
				margin: [5, -40]
			},
			'\n',{
				image:img,
				width:500,
				margin: [0, 40]
			}
			],
		styles: {
			header: {
				fontSize: 12,
				bold: true,
				alignment:'center',
			}
		},
		images:{
			monimage:'  data:image/png;base64,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'
		}
		};
		
		par=$("#parcoursSpanTout").text();
		niv=$("#niveauSpanTout").text();
		
		
		
             pdfMake.createPdf(docDefinition).download("emploidutemps "+par+" "+niv+".pdf");
                }
            });
		
		
        });
		
});
</script>
   
</body>

</html>
