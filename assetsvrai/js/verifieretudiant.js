$(document).ready(function(){
	$("#supprimerToutEtudiant").click(function(){
		swal({
			title: "Etes- vous Sur?",
			text: "Si vous supprimer Tout, on ne peut pas le recuperer?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
						$.ajax({
							url:"supprimerToutEtudiant.php",
							type:"POST",
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
				})
	});
	
});
