<?php
//verification du session
session_start();
if(!isset($_SESSION['usernamead']))
{
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>statistiqueEn</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/stat/Table-With-Search-1.css">
    <link rel="stylesheet" href="../assets/css/stat/Table-With-Search.css">
</head>

<body>
	<?php include("header.php"); ?>
	<br>
	<br>
	
    <div class="col-md-12 search-table-col" style="width: 73%;margin: 6% 14% 0% 14%;">
		<h3 style="text-align:center">Statistique des heures d'enseignement par chaque enseignant</h3>
		<br>
		<?php
			if(isset($_POST["liste"])){
		?>
		<div class="form-group pull-right col-lg-4">
			<form  style="float: right;">
				<a href="statistiquepdf.php?dateDeb=<?php echo $_POST["dateDeb"]."&dateFin=".$_POST["dateFin"]; ?>"><button class="btn btn-primary" type="button" style="float: inherit;">Generer PDF</button></a>
			</form>
		</div>
		<?php
			}else{
		?>
			<div class="form-group pull-right col-lg-4">
				<br>
				<br>
			</div>
		<?php	
			}
		?>
		<form action="statistiqueEn.php" method="POST" style="float: left;">
			<label>Debut  :</label><input class="form-control" style="display:inline; width:150px" autocomplete="off" type="date" name="dateDeb" required="">	
			<label>Fin  :</label><input class="form-control" autocomplete="off" style="display:inline; width:150px" type="date" name="dateFin" required="">	
			<button class="btn btn-primary" type="submit" name="liste">Lister</button>
		</form>
        <div class="table-responsive table-bordered table table-hover table-bordered results" style="max-height: 600px;height: 500px;">
			<p><?php if(isset($_POST["dateDeb"]) && isset($_POST["dateDeb"])){ echo "Entre <strong><u>".$_POST["dateDeb"]."</u></strong> et <strong><u>".$_POST["dateFin"]."</u></strong>";}?></p>
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">Nom de l'enseignant</th>
						<th id="trs-hd" class="col-lg-6">Matricule</th>
                        <th id="trs-hd" class="col-lg-2">Nombre d'heure d'enseignement</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
					<?php 
						if(isset($_POST["liste"])){
							
						require('../modele.php');
						if($_POST["dateDeb"]>$_POST["dateFin"]){
							$erreur="la date debut est supérieur à la date fin!";
						}else{
						$requete=listeStatistiqueEn($_POST["dateDeb"],$_POST["dateFin"]);
						if($requete->rowCount()==0){
					?>
						<tr>
							<td colspan=3 style="text-align:center">Aucun emplois du temps!</td>
						</tr>
					<?php	
						}else{
						while($row=$requete->fetch()){
					?>
						 <tr>		
							<td><?php echo $row["NOMEN"]." ".$row["PRENOMEN"]; ?></td>
							<td><?php echo $row["MATRICULEEN"]; ?></td>
							<td><?php echo $row["nombre"]; ?></td>
							
						</tr>
					<?php		
						}
						}
						}
						}else{
					?>
						<tr>
							<td colspan=3 style="text-align:center">Vide</td>
						</tr>
					<?php
						}
					?>
                   
                </tbody>
            </table>
        </div>
    </div>
	<?php include("footer.php"); ?> 
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/Table-With-Search.js"></script>
	 <script src="../assets/js/sweetalert.min.js"></script>
	 <script>
		<?php
			if(isset($erreur)){
		?>
			swal({
				 title:"erreur",
				 text:'<?php echo $erreur; ?>',
				 icon:'error',
			}).then((willDelete) => {
					if (willDelete) {
						document.location.href="statistiqueEn.php";
					}else{
						document.location.href="statistiqueEn.php";
					}
				});
		<?php
			}
		?>
	 </script>
</body>

</html>