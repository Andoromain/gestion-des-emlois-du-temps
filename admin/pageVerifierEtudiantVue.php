<?php
//verification du session
session_start();
if(!isset($_SESSION['usernamead']) || !isset($_SESSION['codead']))
{
	header("Location: ../index.php");
}
?>
<?php include("ExcelToDB.php"); ?>
<?php include("ajouterVerifierEtudiant.php"); ?>
<?php include("modifierVerifierEtudiant.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>listeMpianatraExcelaToMysql</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
	<?php require("header.php"); ?>
	<br>
	<br>
	<br>
	<br>
	<br>
    <div class="container profile profile-view" id="profile">
        <div class="row">
            <div class="col"><button class="btn btn-danger form-btn" type="reset" id="supprimerToutEtudiant" style="float: right;min-width: 230px;">Suprimer toutes les etudiants</button></div>
        </div>
        <div class="row profile-row">
            <div class="col-md-4 relative" style="/*border: 1px solid black;*/border-radius: 15px;">
                <form name="upload" enctype="multipart/form-data" method="POST" action="pageVerifierEtudiantVue.php">
                    <h2>Importer les étudiants</h2>
                    <hr><select class="form-control" name="niveau"><option value="L1">L1</option><option value="L2">L2</option><option value="L3">L3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select><br>
                    <select
                        class="form-control" name="parcours">
                        <option value="MED">MEDECINE </option>
                        <option value="TCL">Tech Lab</option>
                        <option value="INF">Infirmière</option>
                        <option value="SGF">Sage Femme</option>
                        </select><br><input type="file" class="form-control" name="fichier" accept=".xlsx"><br><button class="btn btn-primary form-btn" type="submit" name="upload">importer</button></form>
				</div>
            <div class="col-md-8">
                <form method="POST"  id="formAjout" action="pageVerifierEtudiantVue.php">
                    <h2>Formulaire Etudiant</h2>
                    <hr>
					<?php if(isset($error1)){ $resultat1="";echo "<p style='color:red;font-weigth:bold'>".$error1."</p>"; }?>
					<?php if(isset($resultat1)){ echo "<p style='color:green;font-weigth:bold'>".$resultat1."</p>"; }?>
					<?php if(isset($error2)){ $resultat2="";echo "<p style='color:red;font-weigth:bold'>".$error2."</p>"; }?>
					<?php if(isset($resultat2)){ echo "<p style='color:green;font-weigth:bold'>".$resultat2."</p>"; }?>
					
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>Matricule</label>
							<input type="hidden" name="matriculeAncien">
							<input class="form-control" type="text" name="matricule" autocomplete="off" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>Nom</label><input class="form-control" type="text" name="nom" autocomplete="off" required=""></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>Prénom</label><input class="form-control" type="text" name="prenom" autocomplete="off" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>date de naissance</label><input class="form-control" type="date" name="datenais" autocomplete="off" required=""></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>Niveau</label><select id="niveau" class="form-control" name="niveau"><option value="L1">L1</option><option value="L2">L2</option><option value="L3">L3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>Parcours</label><select id="parcours" class="form-control" name="parcours"><option value="MED">MEDECINE </option><option value="TCL">Tech Lab</option><option value="INF">Infirmière</option><option value="SGF">Sage Femme</option></select></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 content-right"><button class="btn btn-primary form-btn" type="submit" name="ajouter">AJOUTER</button><button class="btn btn-primary form-btn" type="submit" name="modifier">MODIFIER</button><button class="btn btn-danger form-btn" type="reset"
                                name="reset">ANNULER</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<br>
	<form method="POST" action="pageVerifierEtudiantVue.php">
	<input type="text" name="searchETinTable" style="margin-left: 10%;margin-right: 2%;margin-bottom: 2%;" placeholder="recherche par nom ou ...."><button class="btn btn-primary" type="submit" name="searchBtn">Rechercher</button>
	<button class="btn btn-primary" style="float:right;margin-right:10%;" onclick="document.location.href='pageVerifierEtudiantVue.php';" type="button">Tous etudiants</button>
	</form>
    <div class="table-responsive"
        style="margin-left: 10%;margin-right: 10%;width: 82%; max-height:600px">
        <table class="table">
            <thead style="background-color:#ccc">
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date de Naissance</th>
                    <th>Niveau</th>
                    <th>Parcours</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
				<?php 
					if(isset($_POST["searchBtn"])){
						$mot=$_POST["searchETinTable"];
						
						//liste etudiant dans verifieretudiant lors de la recherche
					$requete1=$connect->query("select *from verifieretudiant where NumEt like '%$mot%' or NomEt like '%$mot%' or PrenomEt like '%$mot%' or Niveau like '%$mot%' or Parcours like '%$mot%' group by NumEt asc;") or die("Il ya une erreur!");
					//$requete1->bindParam(":mot",$mot,PDO::PARAM_STR);
					
					$nbr1=$requete1->rowCount();
					if($nbr1==0){
						echo "
							<p style='color:#007bff;font-weigth:bold;font-size:150%;'>Liste de recherche du mot '".$mot."'</p>
							 <tr>
								<td colspan=8 style='text-align:center;color:red;'>Vide</td>
							  </tr>";
					}else{
						echo '<p style="color:#007bff;font-weigth:bold;font-size:150%;">Liste de recherche du mot "'.$mot.'"</p>';
						while($row=$requete1->fetch()){
							?> 
								<tr>
									<td><?php echo $row["NumEt"]; ?></td>
									<td><?php echo $row["NomEt"]; ?></td>
									<td><?php echo $row["PrenomEt"]; ?></td>
									<td><?php echo $row["Datenais"]; ?></td>
									<td><?php echo $row["Niveau"]; ?></td>
									<td><?php echo $row["Parcours"]; ?></td>
									<td><a href="#" onclick="apporterSurForm('<?php echo $row["NumEt"]; ?>','<?php echo$row["NomEt"]; ?>','<?php echo $row["PrenomEt"]; ?>','<?php echo $row["Datenais"]; ?>','<?php echo $row["Niveau"]; ?>','<?php echo $row["Parcours"]; ?>');">Modifier</a></td>
									<td><a href='#' onclick="supprimerEtudiant('<?php echo $row["NumEt"]; ?>');">Supprimer</a></td>
								</tr>
				<?php
						}
					}
				?>
				<?php	
					}else{
					
					//liste etudiant dans verifieretudiant 
					$requete=$connect->query("select *from verifieretudiant group by NumEt asc;");
					$nbr=$requete->rowCount();
					if($nbr==0){
						echo "<tr>
								<td colspan=8 style='text-align:center;color:red;'>Vide</td>
							  </tr>";
					}else{
						while($row=$requete->fetch()){
							?> 
								<tr>
									<td><?php echo $row["NumEt"]; ?></td>
									<td><?php echo $row["NomEt"]; ?></td>
									<td><?php echo $row["PrenomEt"]; ?></td>
									<td><?php echo $row["Datenais"]; ?></td>
									<td><?php echo $row["Niveau"]; ?></td>
									<td><?php echo $row["Parcours"]; ?></td>
									<td><a href="#" onclick="apporterSurForm('<?php echo $row["NumEt"]; ?>','<?php echo$row["NomEt"]; ?>','<?php echo $row["PrenomEt"]; ?>','<?php echo $row["Datenais"]; ?>','<?php echo $row["Niveau"]; ?>','<?php echo $row["Parcours"]; ?>');">Modifier</a></td>
									<td><a href='#' onclick="supprimerEtudiant('<?php echo $row["NumEt"]; ?>');">Supprimer</a></td>
								</tr>
				<?php
						}
					}
					
					}
				?>
            </tbody>
        </table>
    </div><br>
    <nav style="margin-left: 40%;margin-right: 40%;">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <li class="page-item"><a class="page-link">1</a></li>
            <li class="page-item"><a class="page-link">2</a></li>
            <li class="page-item"><a class="page-link">3</a></li>
            <li class="page-item"><a class="page-link">4</a></li>
            <li class="page-item"><a class="page-link">5</a></li>
            <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul>
    </nav>
	
	<?php include("footer.php"); ?> 
	
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/verifieretudiant.js"></script>
    <script > 
	function apporterSurForm(matricule,nom,prenom,datenais,niveau,parcours){
		$("#formAjout input[name=matriculeAncien]").val(matricule);
		$("#formAjout input[name=matricule]").val(matricule);
		$("#formAjout input[name='nom']").val(nom);
		$("#formAjout input[name='prenom']").val(prenom);
		$("#formAjout input[name='datenais']").val(datenais);
		$("#formAjout #parcours option[value='"+parcours+"']").prop("selected",true);
		$("#formAjout #niveau option[value='"+niveau+"']").prop("selected",true);
	}
	function supprimerEtudiant(matricule){
		$.ajax({
			url:"supprimerVerifierEtudiant.php",
			type:"POST",
			data:"matricule="+matricule,
			success:function(msg){
			swal({
				title:"success",
				text:msg,
				icon:'success',
			}).then((willDelete) => {
			if (willDelete) {
				document.location.href="pageVerifierEtudiantVue.php";
			}
			});
			},
			error:function(){
				swal({
					title:"error",
					text:"Il y a une erreur lors de l'envoi de la requete!",
					icon:'error',
				});
					}
			})
	}
	</script>
	<script>
			<?php if(isset($resultat)){?>
			swal({
				 title:"success",
				 text:'<?php echo $resultat; ?>',
				 icon:'success',
			}).then((willDelete) => {
					if (willDelete) {
						document.location.href="pageVerifierEtudiantVue.php";
					}
				});
		 <?php  } ?>
		 <?php if(isset($error)){?>
			swal({
				 title:"error",
				 text:'<?php echo $error; ?>',
				 icon:'error',
			}).then((willDelete) => {
					if (willDelete) {
						document.location.href="pageVerifierEtudiantVue.php";
					}
				});
		 <?php  } ?>
		
	</script>
</body>

</html>