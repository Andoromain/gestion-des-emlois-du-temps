<?php
//verification du session
require("../modele.php");
session_start();
if(!isset($_SESSION['usernamead']))
{
	header("Location: ../index.php");
}
?>
<?php
//listage
	$rpp=5;
	isset($_GET["page"]) ? $page=$_GET["page"] : $page=0;

	if($page>1){
		$start=($page * $rpp) - $rpp;
	}else{
		$start=0;
	}
	$requete1=listeActu();

	$num_rows=count($requete1->fetchAll());

	$totalPage= ceil($num_rows / $rpp);
	
 $requete=listeActuParPage($start,$rpp);

?>


<?php

//ajout publication
		if(isset($_POST["ajouterActu"])){
			$extension_autorise=array(".jpg",".jpeg",".png",".bmp",".ico",".JPG",".JPEG",".PNG",".BMP",".ICO",".pdf",'.PDF');
			$titre=$_POST["titre"];
			$contenu=$_POST["contenu"];
			$image="";$image1="";$image2="";$image3="";

			if($titre =="" || $contenu==""){
				$error="le titre ou le contenu est vide!!";
			}else{
				if(empty($_POST["type"])){
					$error="veuillez choisir le type de votre publication!";
				}else{
					$type=$_POST["type"];
					if(isset($_FILES["image"])){
						//hasiana anle image
						$target="../imagesPub/".basename($_FILES["image"]["name"]);
						$image=$_FILES["image"]["name"];
						$file_extension=strrchr($image,".");
						if( in_array($file_extension,$extension_autorise)){
							move_uploaded_file($_FILES["image"]["tmp_name"], $target);
						}else{
							$error="seuls des images sont autorise!";
						}
					}
					if(isset($_FILES["image1"])){
						//hasiana anle image
						$target1="../imagesPub/".basename($_FILES["image1"]["name"]);
						$image1=$_FILES["image1"]["name"];
						$file_extension1=strrchr($image1,".");
						if( in_array($file_extension1,$extension_autorise)){
							 move_uploaded_file($_FILES["image1"]["tmp_name"], $target1);
						}else{
							$error="seuls des images sont autorise!";
						}
					}
					if(isset($_FILES["image2"])){
						//hasiana anle image
						$target2="../imagesPub/".basename($_FILES["image2"]["name"]);
						$image2=$_FILES["image2"]["name"];
						$file_extension2=strrchr($image2,".");
						if( in_array($file_extension2,$extension_autorise)){
							  move_uploaded_file($_FILES["image2"]["tmp_name"], $target2);
						}else{
							$error="seuls des images sont autorise!";
						}
					}
					if(isset($_FILES["image3"])){
						//hasiana anle image
						$target3="../imagesPub/".basename($_FILES["image3"]["name"]);
						$image3=$_FILES["image3"]["name"];
						$file_extension3=strrchr($image3,".");
						if( in_array($file_extension3,$extension_autorise)){
							move_uploaded_file($_FILES["image3"]["tmp_name"], $target3);
						}else{
							$error="seuls des images sont autorise!";
						}
					}
					//asiana code ajout
					 ajoutActu($titre,$contenu,$type,$image,$image1,$image2,$image3);
						$msg="La publication est ajoutée avec success!";
				}
			}

		}
?>
<?php

//modifier publication
		if(isset($_POST["modifierActu"])){
			$extension_autorise=array(".jpg",".jpeg",".png",".bmp",".ico",".JPG",".JPEG",".PNG",".BMP",".ICO",".pdf",'.PDF');
			$id=$_POST["id"];
			$titre=$_POST["titre"];
			$contenu=$_POST["contenu"];
			$image="";$image1="";$image2="";$image3="";

			if($titre =="" || $contenu==""){
				$error="le titre ou le contenu est vide!!";
			}else{
				if(empty($_POST["type"])){
					$error="veuillez choisir le type de votre publication!";
				}else{
					$type=$_POST["type"];
					if(isset($_FILES["image"])){
						//hasiana anle image
						$target="../imagesPub/".basename($_FILES["image"]["name"]);
						$image=$_FILES["image"]["name"];
						$file_extension=strrchr($image,".");
						if( in_array($file_extension,$extension_autorise)){
							move_uploaded_file($_FILES["image"]["tmp_name"], $target);
						}else{
							$error="seuls des images sont et PDF  autorise!";
						}
					}
					if(isset($_FILES["image1"])){
						//hasiana anle image
						$target1="../imagesPub/".basename($_FILES["image1"]["name"]);
						$image1=$_FILES["image1"]["name"];
						$file_extension1=strrchr($image1,".");
						if( in_array($file_extension1,$extension_autorise)){
							 move_uploaded_file($_FILES["image1"]["tmp_name"], $target1);
						}else{
							$error="seuls des images sont et PDF  autorise!";
						}
					}
					if(isset($_FILES["image2"])){
						//hasiana anle image
						$target2="../imagesPub/".basename($_FILES["image2"]["name"]);
						$image2=$_FILES["image2"]["name"];
						$file_extension2=strrchr($image2,".");
						if( in_array($file_extension2,$extension_autorise)){
							  move_uploaded_file($_FILES["image2"]["tmp_name"], $target2);
						}else{
							$error="seuls des images et PDF sont autorise!";
						}
					}
					if(isset($_FILES["image3"])){
						//hasiana anle image
						$target3="../imagesPub/".basename($_FILES["image3"]["name"]);
						$image3=$_FILES["image3"]["name"];
						$file_extension3=strrchr($image3,".");
						if( in_array($file_extension3,$extension_autorise)){
							move_uploaded_file($_FILES["image3"]["tmp_name"], $target3);
						}else{
							$error="seuls des images et PDF sont autorise!";
						}
					}
					//asiana code ajout
					 modifierActu($id,$titre,$contenu,$type,$image,$image1,$image2,$image3);
						$msg="La publication est mnodifiée avec success!";
				}
			}

		}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>pageCreerActualite</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="../assets/css/boutom.css">
    <link rel="stylesheet" href="../assets/css/head-faculte.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="../assets/css/styl.css">
	<link rel="stylesheet" href="../assets/css/styleMenu.css">
    <link rel="stylesheet" href="../assets/css/User-Payment-Overview-Rows---Panel-Container.css">
	<link rel="stylesheet" href="../assets/css/Animated-Header--Easy-Editable--1.css">
    <link rel="stylesheet" href="../assets/css/Animated-Header--Easy-Editable-.css">
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

<body>
    <div>
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
						<li class="nav-item" role="presentation" id="adminNav"><a class="nav-link" href="pageEvenementEn.php?niveau=L1&parcours=PMED">Evenement des Enseignants</a></li>
                       <li class="nav-item dropdown" style="background-color:rgb(102,153,255)"><a class="dropdown-toggle  nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Administration</a>
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
    </div><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAddActu" style="margin-top: 140px;margin-left: 14%;"><i class="la la-plus"></i>&nbsp; Ajouter</button>
    <div class="card">
        <div class="card-header">
            <h3><span class="fa-stack"><i class="fa fa-circle fa-stack-2x text-muted"></i><i class="fa fa-angle-double-down fa-stack-1x fa-inverse"></i></span>Liste des Actualités et à la Une &nbsp;</h3>
        </div>
        <div class="card-body">
				<?php $row=$requete->rowCount();
							if($row==0){ ?>
					<div class="row" > <h3 style="margin:7px 45% 10px 45%;">vide</h3></div>
				<?php } else{
				//listage des publication
				$compteur=$requete->rowCount();	
				while($row=$requete->fetch()){
				?>

            <div class="row">
                <div class="col-md-5">
                    <h4><?php echo $compteur ?>&nbsp;</h4>
                </div>
                <div class="col-md-7">
                    <h4><?php echo determinType($row["type"]); ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="media">
                        <div>
							<img class="rounded-circle mr-3"
							<?php  if(!empty($row["image"])){
								echo 'src="../imagesPub/'.$row["image"].'"';
							}else{
								echo 'src="../IMAGES/ouverture.png"';
							}
								?>
							  width="50" height="50">
						</div>
                        <div class="media-body">
                            <h4><a href="#"><?php echo $row["titre"]; ?> </a><span class="badge badge-success">du <?php echo $row["datePub"] ?></span></h4>
                            <p class="text-muted"><?php echo substr($row["contenu"],1,20);?><br>
 <?php echo substr($row["contenu"],20,10);?> <strong>....</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <p><span class="h3">$100 </span><br>
<strong> </strong><a href="#">Voir Details</a></p>
                    <p></p>
                </div>
                <div class="col-md-3 text-right">
                    <div class="btn-group" role="group">
					
					<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalUpdateActu"  onClick='javascript:apporterActuSurModalEdit("<?php echo $row["id"]?>","<?php echo $row["type"]?>","<?php echo  ($row["titre"]); ?>","<?php echo ($row["contenu"]); ?>");'><i class="fa fa-pencil"></i> Modifier </button>
					
					<button class="btn btn-primary" type="button" onClick="javascript:supprimerActu('<?php echo $row["id"];?>')"> <i class="fa fa-trash-o"></i></button></div>
                </div>
            </div>
			<hr></hr>

				<?php 
				$compteur-=1;
				} 
			} ?>

		</div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <nav class="pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                           <?php for($x=1;$x<=$totalPage;$x++){ ?>
														 <li class="page-item"><a href="?page=<?php echo $x; ?>" class="page-link"><?php echo $x; ?></a></li>
						   				 			<?php } ?>
                            <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
		<br>
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


    <div class="modal fade" role="dialog" tabindex="-1" id="modalAddActu">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nouveau publication</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body"><label>Type:</label>
                    <form action="creerActualite.php" method="POST" enctype="multipart/form-data">
                        <div><input type="radio" name="type" value="ACTU"><label>&nbsp; &nbsp; &nbsp;Actualité &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input type="radio" name="type" value="ALAU"><label>&nbsp; &nbsp; &nbsp;A la Une &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label>
                            <input type="radio" name="type" value="MOTD"><label>&nbsp; &nbsp; &nbsp;Mot du Doyen &nbsp; &nbsp;</label></div>
                        <div><label>Titre :</label><input class="form-control" type="text" name="titre"></div>
                        <div id="test">
                            <div id="file" style="display: flow-root;"><label>Image ou fichier&nbsp;:</label><input type="file" name="image" style="width: 368px;" accept="image/*,.pdf,.PDF"></div>
                            <div style="display: flow-root;"><button class="btn btn-primary add" type="button" id="addtypeFile" style="float: right;"><i class="far fa-plus-square"></i></button></div>
                        </div>
                        <div><label>Contenu :</label><textarea class="form-control" name="contenu"></textarea></div>
                        <div><button class="btn btn-primary" type="button" data-dismiss="modal" >Annuler</button><button class="btn btn-primary" type="submit" style="float: right;" name="ajouterActu">Enregistrer</button></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logoFac"></div>
            </div>
        </div>
    </div>
   <!--place de modalUpdate -->
   
    <div class="modal fade" role="dialog" tabindex="-1" id="modalUpdateActu">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier publication</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body"><label>Type:</label>
                    <form action="creerActualite.php" method="POST"  id="form" enctype="multipart/form-data">
						<input name="id" type="hidden">
                        <div><input type="radio" name="type" value="ACTU"><label>&nbsp; &nbsp; &nbsp;Actualité &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label><input type="radio" name="type" value="ALAU"><label>&nbsp; &nbsp; &nbsp;A la Une &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label>
                            <input
                                type="radio" name="type" value="MOTD"><label>&nbsp; &nbsp; &nbsp;Mot du Doyen &nbsp; &nbsp;</label></div>
                        <div><label>Titre :</label><input class="form-control" type="text" name="titre"></div>
                        <div id="test">
                            <div id="file"><label>Image ou fichier&nbsp;:</label><input type="file" name="image"  id="dmg"></div>
                            <div style="display: flow-root;"><button class="btn btn-primary add" type="button" id="addtypeFile" style="float: right;"><i class="far fa-plus-square"></i></button></div>
                        </div>
                        <div><label>Contenu :</label><textarea class="form-control" name="contenu"></textarea></div>
                        <div><button class="btn btn-primary" id="annuler" type="button" data-dismiss="modal" >Annuler</button><button class="btn btn-primary" type="submit" style="float: right;" name="modifierActu">Modifier</button></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <h5 id="titreFac">Faculte de Medecine</h5><img src="../assets/img/Logo_Méds%20Fianar%20-%20vf2.jpg" id="logoFac"></div>
            </div>
        </div>
    </div>
   
   
   <br>
	<?php require("footer.php"); ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/addTypeFile.js"></script>
    <script src="../assets/js/addTypeFile1.js"></script>
    <script src="../assets/js/removeTypeFile.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
    <script src="../assets/js/admin/actu.js"></script>
	<script>
		<?php if(isset($error)){?>
			swal({
				 title:"erreur",
				 text:'<?php echo $error ?>',
				 icon:'error',
			}).then((willDelete) => {
					if (willDelete) {
						document.location.href="creerActualite.php";
					}
				});
		 <?php  } ?>

		 <?php if(isset($msg)){?>
			swal({
				 title:"success",
				 text:'<?php echo $msg ?>',
				 icon:'success',
			}).then((willDelete) => {
					if (willDelete) {
						document.location.href="creerActualite.php";
					}
				});
		 <?php  } ?>
		 
function apporterActuSurModalEdit(id,type,titre,btoa(contenu)){
	$("#form input[name=id]").val(id);
	$("#form input[value="+type+"]").prop("checked",true);
	$("#form input[name=titre]").val(titre);
	$("#form textarea[name=contenu]").val(contenu);
}
	</script>
</body>

</html>
