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
                    <li class="nav-item" role="presentation" id="adminNav" style="background-color:rgb(102,153,255)"><a class="nav-link active" href="controleurPageEnseignant.php">Enseignant</a></li>
                    <li class="nav-item" role="presentation" id="adminNav"><a class="nav-link" href="controleurPageET.php">Emploi du Temps</a></li>
                    <li class="nav-item" role="presentation" id="adminNav"><a class="nav-link" href="pageEvenementEn.php?niveau=L1&parcours=PMED">Evenement des Enseignants</a></li>
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
    <div class="container" id="containerTableau">
        <div id="modalAveclink">
            <div class="modal fade" role="dialog" tabindex="-1" id="modalEn">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header box">
                            <h4 class="modal-title"><img src="../assets/img/avatar.png" id="img" class="box"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body"><label id="matriculeEnAncien">Label</label><strong id="usernameEn">Usrename</strong>
                            <div id="div"><i class="fa fa-user" id="iconUser"></i><span>Matricule &nbsp; &nbsp; &nbsp; &nbsp; :</span><input type="text" id="matriculeEn" class="input"></div>
                            <div id="div"><i class="fa fa-user" id="iconUser"></i><span>Nom &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</span><input type="text" id="nomEn" class="input"></div>
                            <div id="div"><i class="fa fa-user-o" id="iconUser"></i><span>Prenom &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</span><input type="text" id="prenomEn" class="input"></div>
                            <div id="div"><span><i class="fa fa-university" id="iconUser"></i>Categorie &nbsp; &nbsp; &nbsp; :</span><select id="categorieEn" class="input"><option value="MIS">Missionnaire</option><option value="VAC">Vacataire</option><option value="PER">Permanent</option></select></div>
                            <div
                                id="div"><i class="fa fa-envelope-open-o" id="iconUser"></i><span>E-mail &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</span><input type="email" id="emailEn" class="input"></div>
                        <div id="div"><i class="fa fa-volume-control-phone" id="iconUser"></i><span>Telephone &nbsp; &nbsp; &nbsp; :</span><input type="tel" id="telephoneEn" class="input"></div>
                        <div id="div"><i class="fa fa-key" id="iconUser"></i><span>Mot de Passe &nbsp;:</span><input type="text" id="mdpEn" class="input"></div>
                        <div><button class="btn btn-primary" type="button" id="modifierEn">Modifier</button><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
                    </div>
                    <div class="modal-footer">
                        <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logoFac"></div>
                </div>
            </div>
        </div>
    </div>
    <!--niova tato -->
    <div id="modalAveclink">
        <div class="modal fade" role="dialog" tabindex="-1" id="modalParamAdmin">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header box">
                        <h4 class="modal-title"><img src="../assets/img/avatar.png" id="img" class="box"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
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
    <div class="col-md-12 search-table-col">
		<h3 style="text-align:center">Liste des comptes des enseignants</h3>
        <div class="form-group pull-right col-lg-4"><input type="text" placeholder="Search by typing here.." id="searchTxt" class="search form-control"><button class="btn btn-primary" type="button" id="searchEn"><i class="icon ion-search"></i></button></div><span class="counter pull-right"></span>
        <div
            class="table-responsive table-bordered table table-hover table-bordered results" id="tableStandard">
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th id="matricule">N0 MATRICULE</th>
                        <th id="trs-hd">Nom et Prenom</th>
                        <th id="trs-hd">Coategorie</th>
                        <th id="trs-hd">e-mail</th>
                        <th id="trs-hd">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                    
					<!-- liste des etudiant -->
					
                    <?php $row=$requete->rowCount(); 
							if($row==0){ ?>
					<tr>
						<td colspan=5 style="text-align:center">Vide</td>
					</tr>	
					<?php
					}else{
						while($reponse=$requete->fetch())
						{ ?>
                    <tr>
                        <td id="matriculeEn"><?php echo $reponse["MATRICULEEN"]?></td>
                        <td id="nomPrenomEn"><?php echo $reponse["NOMEN"]." ".$reponse["PRENOMEN"]?></td>
                        <td id="categorieEn"><?php echo $reponse["CODECAT"]?></td>
                        <td id="emailEn"><?php echo $reponse["EMAILEN"]?></td>
                        <td>
							<button class="btn btn-success" type="submit" id="modifierEnseignant" style="margin-left: 5px;" data-toggle="modal" onClick="javascript:modificationEn(
								'<?php echo $reponse["USERNAMEEN"] ?>',
								'<?php echo $reponse["MATRICULEEN"] ?>',
								'<?php echo $reponse["NOMEN"] ?>',
								'<?php echo $reponse["PRENOMEN"] ?>',
								'<?php echo $reponse["CODECAT"] ?>',
								'<?php echo $reponse["EMAILEN"] ?>',
								'<?php echo $reponse["TELEPHONEEN"] ?>',
								'<?php echo base64_decode($reponse["MDPEN"]) ?>'
								);"
							data-target="#modalEn"><i class="fa fa-edit" style="font-size: 15px;"></i></button>
							<button class="btn btn-danger" type="submit" id="SuppressionEnseignant" style="margin-left: 5px;" onClick="javascript:suppressionEn(
								'<?php echo $reponse["MATRICULEEN"] ?>'
							);"> <i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                    </tr>
					<?php }
					}
					?>
					
					<!-- fin des etudiant -->
					
                </tbody>
            </table>
    </div>
    </div>
    </div>
    <?php require("footer.php"); ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/fullcalendar.min.js"></script>
    <script src="../assets/js/sample_french.js"></script>
    <script src="../assets/js/etudiant/timetable.js"></script>
    <script src="../assets/js/admin/etudiantModele2-by-ando-1.js"></script>
    <script src="../assets/js/admin/etudiantModele2-by-ando-2.js"></script>
    <script src="../assets/js/admin/etudiantModele2-by-ando-3.js"></script>
    <script src="../assets/js/admin/etudiantModele2-by-ando.js"></script>
    <script src="../assets/js/admin/function.js"></script>
    <script src="../assets/js/admin/tableauEnseignat-modal-1.js"></script>
    <script src="../assets/js/admin/tableauEnseignat-modal.js"></script>
    <script src="../assets/js/html2canvas.min.js"></script>
    <script src="../assets/js/pdfmake.min.js"></script>
    <script src="../assets/js/Testimomial-Slider.js"></script>
    <script src="../assets/js/etudiant/toPDF.js"></script>
    <script src="../assets/js/admin/paramCompte.js"></script>
    <script src="../assets/js/allStyle.js"></script>
    <script src="../assets/js/enseignant/parametreCompte.js"></script>
    <script src="../assets/js/etudiant/parametreCompte.js"></script>
</body>

</html>