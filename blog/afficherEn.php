<?php
	session_start();
	if(!isset($_SESSION['usernameen']))
	{
		header("Location: ../index.php");
	}

?>
<?php include("ajoutBlog.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>blog</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Callout-Success.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Callout-Warning.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/summernote-bs4.css">
    <link rel="stylesheet" href="assets/css/summernote-icons-1.css">
    <link rel="stylesheet" href="assets/css/summernote-icons.css">
    <link rel="stylesheet" href="assets/css/TextEditor.css">
</head>
<style>
	p{
		word-break: break-word !important;
		overflow-wrap: break-word !important;
		text-align-last:left;
	}
</style>

<body style="background-color:#8d88861c">
	<?php 
     include("../enseignant/header.php");
?>
	<br>
	<br>
	<br>
	<br>
	<br>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
				<?php
					//require("modele.php");
					$requete=listeBlog();
					if($requete->rowCount()==0){
						
				?>
				<div class="row bs-callout bs-callout-success" style="background-color:white">
                        <p style="text-align:center"> Le blog est vide </p>
                    </div>
				<?php
					}else{
						$i=0;
						while($row=$requete->fetch()){
							if(($i%2)==0){
				?>
					<div class="row bs-callout bs-callout-warning" style="background-color:white">
                        <div class="col-md-2">
                            <div><i class="icon ion-android-person" style="font-size: 45px;"></i>
                                <h4 style="font-size: medium;"><?php echo $row["pseudo"]; ?></h4>
                            </div><span style="font-size: small;"><?php echo $row["type"]; ?></span></div>
                        <div class="col-md-10">
                            <blockquote class="blockquote" style="font-size: 12px;">
                                <p class="text-break text-justify mb-0" ><?php echo base64_decode($row["corps"]); ?></p>
								<?php if(!empty($row["fichier"])){ ?>
								<span class="text-break text-justify mb-0">cliquer sur le fichier : <?php echo "<a href='../fichier/".$row["fichier"]."'>".$row["fichier"]."</a>"; ?></span>
								<?php } ?>
                                <footer class="blockquote-footer" style="background-color:white"><?php echo "Le ".date('d/m/y à H:i:s', strtotime($row['date']))."<br/>"; ?></footer>
                            </blockquote>
                        </div>
                    </div>
							<?php  }else{  ?>
						<div class="row bs-callout bs-callout-success"style="background-color:white">
                        <div class="col-md-2">
                            <div><i class="icon ion-android-person" style="font-size: 45px;"></i>
                                <h4 style="font-size: medium;"><?php echo $row["pseudo"]; ?></h4>
                            </div><span style="font-size: small;"><?php echo $row["type"]; ?></span></div>
                        <div class="col-md-10">
                            <blockquote class="blockquote" style="font-size: 12px;">
                                <p class="text-break text-justify mb-0" ><?php echo base64_decode($row["corps"]); ?></p>
								<?php if(!empty($row["fichier"])){ ?>
								<span class="text-break text-justify mb-0">cliquer sur le fichier : <?php echo "<a href='../fichier/".$row["fichier"]."'>".$row["fichier"]."</a>"; ?></span>
								<?php } ?>
                                <footer class="blockquote-footer" style="background-color:white"><?php echo "Le ".date('d/m/y à H:i:s', strtotime($row['date']))."<br/>"; ?></footer>
                            </blockquote>
                        </div>
                    </div>
                    
				<?php
							}
							$i=$i+1;
						}
					}
				?>
                    <br></div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <div>
	<form action="afficherEn.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
			
                <div class="col-md-2"></div>
                <div class="col-md-8" style="background-color: #ccc;">
                    <div class="container">
						<input type="hidden" name="pseudo" value="<?php echo $_SESSION["usernameen"]; ?>" >
						<input type="hidden" name="type" value="Enseignant">
                        <p style="color: #7848ee;font-size: larger;font-weight: 800;font-style: oblique;">Repondre au discussion</p>
						<input type="file" name="fichier" class="btn btn-primary" style="margin-bottom:8px">
                        <div class="form-group" style="text-align-last:left"><textarea id="summernote" name="editordata" style="width: 43vw;"></textarea></div>
                        <div class="form-group"><button class="btn btn-primary" id="en" name="envoyer" type="submit">Envoyer</button></div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
		</form>	
    </div>
	<br>
	<?php 
     include("../admin/footer.php");
?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/TextEditor.js"></script>
    <script src="assets/js/summernote-bs4.js"></script>
    <script src="assets/js/summernote-fr-FR.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script >
	/*$(document).ready(function(){
		$("#en").click(function(){
			
			$.ajax({
				type:"POST",
				url:"ajoutBlog.php",
				data:'corps='+$("#summernote").val(),
				success:function(msg){
					swal({
						title:"",
						text:msg,
						icon:"success"
					}).then((willDelete) => {
						$("#summernote").val("")
					if (willDelete) {
						document.location.reload();
					}else{
						document.location.reload();
					}
				});
				},
				error:function(){
					swal({
						title:"",
						text:$("#summernote").val(),
						icon:"error"
					}).then((willDelete) => {
					if (willDelete) {
						document.location.reload();
					}else{
						document.location.reload();
					}
				});
				}
			});
		});
	});
	*/
	<?php if(isset($msg)){?>
			swal({
				 title:"success",
				 text:'<?php echo $msg ?>',
				 icon:'success',
			}).then((willDelete) => {
					if (willDelete) {
						document.location.href="afficherEn.php";
					}else{
						document.location.href="afficherEn.php";	
					}
				});
		 <?php  } ?>
	</script>
</body>

</html>