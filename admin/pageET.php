<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Emplois du temps</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="../assets/css/ETadmin.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
	<link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/Animated-Header--Easy-Editable--1.css">
    <link rel="stylesheet" href="../assets/css/Animated-Header--Easy-Editable-.css">
	<link rel="stylesheet" href="../assets/css/Central-Align-Logo-Header-With-Nav.css">
	<link rel="stylesheet" href="../assets/css/styleMenu.css">
	<link rel="stylesheet" href="../assets/css/styles.css">
	<link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
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

<body onload="javascript:envoyerReqAnneeUniv('anneeUniv.php');">
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
                    <li class="nav-item" role="presentation" id="adminNav" style="background-color:rgb(102,153,255)"><a class="nav-link active" href="controleurPageET.php">Emploi du Temps</a></li>
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
	



<div class="container ET" id="containerTableau">
        <div>
            <div class="modal fade" role="dialog" tabindex="-1" id="modalModifierET">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header box">
                            <h4><strong>Modifier un Emploi du Temps</strong></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <div id="div"><label>Date debut &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</label><input type="date" id="dateDeb" class="input"></div>
                            <div id="div"><label>Date Fin &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</label><input type="date" id="dateFin" class="input"></div>
                            <div id="div"><label>Annee Unniversitaire &nbsp; &nbsp;:</label><select id="anneeUnivModif" class="input"></select></div>
                            <div><button class="btn btn-primary" type="button" id="modifierET" data-dismiss="modal">Modifier</button><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
                        </div>
                        <div class="modal-footer">
                            <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds Fianar - vf2.jpg" id="logoFac"></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="modal fade" role="dialog" tabindex="-1" id="modalAddET">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header box">
                            <h4><strong>Ajouter un Emploi du Temps</strong></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <div id="div"><label>Date debut &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</label><input type="date" id="dateDeb" class="input"></div>
                            <div id="div"><label>Date Fin &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</label><input type="date" id="dateFin" class="input"></div>
                            <div id="div"><label>Annee Unniversitaire &nbsp; &nbsp;:</label><select id="anneeUnivAjout" class="input"></select></div>
                            <div><button class="btn btn-primary" type="button" id="ajouterET" data-dismiss="modal">Ajouter</button><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
                        </div>
                        <div class="modal-footer">
                            <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds Fianar - vf2.jpg" id="logoFac"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 search-table-col">
		<h3 style="text-align:center">Limitation des emplois du temps</h3>
		<button class="btn btn-primary" type="button" id="addET" data-toggle="modal" data-target="#modalAddET"><i class="icon ion-plus"></i>&nbsp; &nbsp;Ajouter</button>
            <div class="form-group pull-right col-lg-4"><input type="text" placeholder="Search by typing here.." id="searchTxt" class="search form-control"><button class="btn btn-primary" type="button" id="searchEn"><i class="icon ion-search"></i></button></div><span class="counter pull-right"></span>
            <div
                class="table-responsive table-bordered table table-hover table-bordered results" id="tableStandard">
                <table class="table table-bordered table-hover">
                    <thead class="bill-header cs">
                        <tr>
                            <th>id</th>
                            <th id="trs-hd">date debut</th>
                            <th id="trs-hd">date fin</th>
                            <th id="trs-hd">année universitaire</th>
                            <th id="trs-hd">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
			
			
			
			
						<?php $row=$requete->rowCount(); 
							if($row==0){ ?>
						<tr>
							<td colspan=5 style="text-align:center">Vide</td>
						</tr>	
						<?php
						}else{
							$i=1;
							while($reponse=$requete->fetch())
							{ ?>
						<tr>
							<td ><?php echo $i?></td>
							<td ><?php echo $reponse["DATEDEBUT"] ?></td>
							<td ><?php echo $reponse["DATEFIN"]?></td>
							<td ><?php echo $reponse["DEBUTUNIV"]."-".$reponse["FINUNIV"] ?></td>
                            <td><button class="btn btn-success" type="submit" id="modifierET" style="margin-left: 5px;" data-toggle="modal" data-target="#modalModifierET" onClick="javascript:apporterModalModifET(
							'<?php echo $reponse["DATEDEBUT"] ?>',
							'<?php echo $reponse["DATEFIN"] ?>',
							<?php echo $reponse["ID_ANNEEUNIV"] ?>
							);"
							><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger"
                                    type="submit" id="SupprimerET" style="margin-left: 5px;" onClick="javascript:supprimerET(
									'<?php echo $reponse["DATEDEBUT"] ?>',
									'<?php echo $reponse["DATEFIN"] ?>',
									<?php echo $reponse["ID_ANNEEUNIV"] ?>,
									);"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                        </tr>
						<?php $i=$i+1;	} 
						} ?>
						
						
						
						
                    </tbody>
                </table>
        </div>
    </div>
    </div>
	
	 <?php require("footer.php"); ?>
	
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/functionETadmin.js"></script>
    <script src="../assets/js/jqueryETadmin.js"></script>
    <script src="../assets/js/search.js"></script>
    <script src="../assets/js/tableauEnseignat-modal.js"></script>
	 <script src="../assets/js/admin/paramCompte.js"></script>
</body>

</html>