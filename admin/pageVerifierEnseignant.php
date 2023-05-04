<?php
//verification du session
session_start();
if(!isset($_SESSION['usernamead']))
{
	header("Location: ../index.php");
}
?>
<?php include("ajouterVerifierEnseignant.php"); ?>
<?php include("modifierVerifierEnseignant.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>listeMpampianatraaVerifier</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
</head>

<body>
	<?php include("header.php"); ?>
	<br>
	<br>
	<br>
	<br>
    <div class="container profile profile-view" id="profile">
        <div class="row profile-row">
            <div class="col-md-8" style="margin-left: 18%;margin-right: 20%;">
                <form id="formAjout" action="pageVerifierEnseignant.php" method="POST">
                    <h2>Formulaire Enseignant</h2>
                    <hr>
					<?php if(isset($error1)){ $resultat1="";echo "<p style='color:red;font-weigth:bold'>".$error1."</p>"; }?>
					<?php if(isset($resultat1)){ echo "<p style='color:green;font-weigth:bold'>".$resultat1."</p>"; }?>
					<?php if(isset($error2)){ $resultat2="";echo "<p style='color:red;font-weigth:bold'>".$error2."</p>"; }?>
					<?php if(isset($resultat2)){ echo "<p style='color:green;font-weigth:bold'>".$resultat2."</p>"; }?>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>Matricule ou CIN</label>
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
                            <div class="form-group"><label>Categorie</label><select  id="categorie" class="form-control" name="categorie"><option value="PER">PERMANENT</option><option value="MIS">MISSIONAIRE</option><option value="VAC">VACATAIRE</option></select></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>Email</label><input class="form-control" autocomplete="off" type="email" name="email" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label>Téléphone</label><input class="form-control" autocomplete="off" type="tel" name="telephone" maxlength="10" required=""></div>
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
	<form method="POST" action="pageVerifierEnseignant.php">
	<input type="text" name="searchETinTable" style="margin-left: 10%;margin-right: 2%;margin-bottom: 2%;" placeholder="recherche par nom ou ...."><button class="btn btn-primary" type="submit" name="searchBtn">Rechercher</button>
	<button class="btn btn-primary" style="float:right;margin-right:10%;" onclick="document.location.href='pageVerifierEnseignant.php';" type="button">Tous enseignants</button>
	</form>
    <div class="table-responsive"
        style="margin-left: 10%;margin-right: 10%;width: 82%;max-height:600px">
        <table class="table">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Categorie</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
					if(isset($_POST["searchBtn"])){
						$mot=$_POST["searchETinTable"];

						//liste etudiant dans verifieretudiant lors de la recherche
					$connect=connection();
					$requete1=$connect->query("select *from verifierenseignant where NumEn like '%$mot%' or NomEn like '%$mot%' or PrenomEn like '%$mot%' or Categorie like '%$mot%' or Email like '%$mot%' or Telephone like '%$mot%' group by NumEn asc;") or die("Il ya une erreur!");
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
									<td><?php echo $row["NumEn"]; ?></td>
									<td><?php echo $row["NomEn"]; ?></td>
									<td><?php echo $row["PrenomEn"]; ?></td>
									<td><?php echo $row["Categorie"]; ?></td>
									<td><?php echo $row["Email"]; ?></td>
									<td><?php echo $row["Telephone"]; ?></td>
									<td><a href="#" onclick="apporterSurForm('<?php echo $row["NumEn"]; ?>','<?php echo$row["NomEn"]; ?>','<?php echo $row["PrenomEn"]; ?>','<?php echo $row["Categorie"]; ?>','<?php echo $row["Email"]; ?>','<?php echo $row["Telephone"]; ?>');">Modifier</a></td>
									<td><a href='#' onclick="supprimerEnseignant('<?php echo $row["NumEn"]; ?>');">Supprimer</a></td>
								</tr>
				<?php
						}
					}
				?>
				<?php
					}else{

					//liste etudiant dans verifieretudiant
					$connect=connection();
					$requete=$connect->query("select *from verifierenseignant group by NumEn asc;");
					$nbr=$requete->rowCount();
					if($nbr==0){
						echo "<tr>
								<td colspan=8 style='text-align:center;color:red;'>Vide</td>
							  </tr>";
					}else{
						while($row=$requete->fetch()){
							?>
								<tr>
									<td><?php echo $row["NumEn"]; ?></td>
									<td><?php echo $row["NomEn"]; ?></td>
									<td><?php echo $row["PrenomEn"]; ?></td>
									<td><?php echo $row["Categorie"]; ?></td>
									<td><?php echo $row["Email"]; ?></td>
									<td><?php echo $row["Telephone"]; ?></td>
									<td><a href="#" onclick="apporterSurForm('<?php echo $row["NumEn"]; ?>','<?php echo$row["NomEn"]; ?>','<?php echo $row["PrenomEn"]; ?>','<?php echo $row["Categorie"]; ?>','<?php echo $row["Email"]; ?>','<?php echo $row["Telephone"]; ?>');">Modifier</a></td>
									<td><a href='#' onclick="supprimerEnseignant('<?php echo $row["NumEn"]; ?>');">Supprimer</a></td>
								</tr>
				<?php
						}
					}

					}
				?>
            </tbody>
        </table>
    </div>
    <nav style="margin-left: 47%;margin-right: 47%;">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <li class="page-item"><a class="page-link">1</a></li>
            <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul>
    </nav>
	<?php include("footer.php"); ?>
	 <script >
	function apporterSurForm(matricule,nom,prenom,categorie,email,telephone){
		$("#formAjout input[name=matriculeAncien]").val(matricule);
		$("#formAjout input[name=matricule]").val(matricule);
		$("#formAjout input[name='nom']").val(nom);
		$("#formAjout input[name='prenom']").val(prenom);
		$("#formAjout #categorie option[value='"+categorie+"']").prop("selected",true);
		$("#formAjout input[name='email']").val(email);
		$("#formAjout input[name='telephone']").val(telephone);
	}
	function supprimerEnseignant(matricule){
		$.ajax({
			url:"supprimerVerifierEnseignant.php",
			type:"POST",
			data:"matricule="+matricule,
			success:function(msg){
			swal({
				title:"success",
				text:msg,
				icon:'success',
			}).then((willDelete) => {
			if (willDelete) {
				document.location.href="pageVerifierEnseignant.php";
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
