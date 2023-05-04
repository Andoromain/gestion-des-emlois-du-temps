<?php
//verification du session
session_start();
if(!isset($_SESSION['usernamead']))
{
	header("Location: ../index.php");
}
?>
<?php include("ajouteCodeAdmin.php"); ?>
<?php include("modifierCodeAdmin.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>codeVerifierAdmin</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
	<?php include("header.php"); ?>
	<br>
	<br>
	<br>
	<br>
    <div class="container profile profile-view" id="profile">
        <div class="row profile-row">
            <div class="col-md-8" style="max-width: 40%;margin-left: 30%;margin-right: 20%;">
                <form id="formAjout" action="pageVerifierAdmin.php" method="POST">
                    <h2>Formulaire Admin</h2>
                    <hr>
					<?php if(isset($error1)){ $resultat1="";echo "<p style='color:red;font-weigth:bold'>".$error1."</p>"; }?>
					<?php if(isset($resultat1)){ echo "<p style='color:green;font-weigth:bold'>".$resultat1."</p>"; }?>
					<?php if(isset($error2)){ $resultat2="";echo "<p style='color:red;font-weigth:bold'>".$error2."</p>"; }?>
					<?php if(isset($resultat2)){ echo "<p style='color:green;font-weigth:bold'>".$resultat2."</p>"; }?>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label>Code pour l 'administrateur</label>
							<input type="hidden" name="codeAncien">
							<input class="form-control" type="text" name="code" autocomplete="off" required=""></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 content-right"><button class="btn btn-primary form-btn" type="submit" name="ajouter">AJOUTER</button><button class="btn btn-primary form-btn" type="submit" name="modifier">MODIFIER</button><button class="btn btn-danger form-btn" type="reset"
                                name="reset">ANNULER</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div><br>
    <div class="table-responsive" style="margin-left: 16%;margin-right: 10%;max-width: 70%;max-height:500px;">
        <table class="table">
            <thead>
                <tr>
                    <th>Code Admin</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php	
					//liste etudiant dans verifieradmin 
					$connect=connection();
					$requete=$connect->query("select *from verifieradministrateur group by codeverifierAd asc;");
					$nbr=$requete->rowCount();
					if($nbr==0){
						echo "<tr>
								<td colspan=8 style='text-align:center;color:red;'>Vide</td>
							  </tr>";
					}else{
						$i=1;
						while($row=$requete->fetch()){
							?> 
								<tr>
									<td><?php echo base64_decode($row["codeverifierAd"]); ?></td>
									<td><a href="#" onclick="apporterSurForm(<?php echo $i; ?>);">Modifier</a></td>
									<input type="hidden" id="codeverifadmin<?php echo $i; ?>" value="<?php echo base64_decode($row["codeverifierAd"]); ?>">
									<td><a href='#' onclick="supprimerCodeAdmin('<?php echo $row["codeverifierAd"]; ?>');">Supprimer</a></td>
								</tr>
				<?php
					$i=$i+1;
						}
					}
				?>
            </tbody>
        </table>
    </div>
	<?php include("footer.php"); ?> 
	
	<script > 
	function apporterSurForm(code){
		$("#formAjout input[name=code]").val($("#codeverifadmin"+code).val());
		$("#formAjout input[name=codeAncien]").val($("#codeverifadmin"+code).val());
	}
	function supprimerCodeAdmin(code){
		$.ajax({
			url:"supprimerCodeAdmin.php",
			type:"POST",
			data:"code="+code,
			success:function(msg){
			swal({
				title:"success",
				text:msg,
				icon:'success',
			}).then((willDelete) => {
			if (willDelete) {
				document.location.href="pageVerifierAdmin.php";
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