$(document).ready(function(){
		//miajouter emploi du temps
    $("#modalAddET #ajouterET").click(function(){
		
        var dateDeb,dateFin,idUniv,daty;
		dateDeb=$("#modalAddET #dateDeb").val();
		dateFin=$("#modalAddET #dateFin").val();
		idUniv=$("#modalAddET #anneeUnivAjout option:selected").val();
		
		var d2=new Date();
		j2=d2.getDate();
		m2=d2.getMonth()+1;
		a2=d2.getFullYear();
		daty=a2+"-0"+m2+"-"+j2;
		
		if(dateDeb=="" ){
			swal({
				title: "",
				text: "Il'y a un(des) champ vide!!",
				icon: "error",
			});
			
		}else{
			if(dateFin>=daty){
				if(dateFin>=dateDeb){
					//code ajout ET(table) 
					
					$.ajax({
						type:'POST',
						url:'ajouterET.php',
						data:"dateDeb="+dateDeb+"&dateFin="+dateFin+"&idUniv="+idUniv,
						success:function(msg){
							swal({
								title: "",
								text: msg,
								icon: "success",
							}).then((willDelete) => {
								if(willDelete){
									document.location.reload();
								};
							});
							viderModalET();
						},
						error:function(){
							swal({
								title: "",
								text: "On ne peut pas connecter au serveur pour le moment!!",
								icon: "error",
							});
							viderModalET();
						}
					});	
					
				}else{
					swal({
						title: "",
						text: "Le date debut est en avance que le date fin!!",
						icon: "error",
					});
				}
			}else{
				swal({
						title: "",
						text: "Le date que vous saisissez est dejà fini!!",
						icon: "error",
					});
			}
		}	
    });
	
	//mimodifier ET
	
	var dateDebAncien,dateFinAncien,idUnivAncien; //variable global
	
	$('#modalModifierET').on('shown.bs.modal', function () {
		dateDebAncien=$("#modalModifierET #dateDeb").val();
		dateFinAncien=$("#modalModifierET #dateFin").val();
		idUnivAncien=$("#modalModifierET #anneeUnivModif option:selected").val();
	});
	
	
	$("#modalModifierET #modifierET").click(function(){
		 var dateDeb,dateFin,idUniv,daty;

		dateDeb=$("#modalModifierET #dateDeb").val();
		dateFin=$("#modalModifierET #dateFin").val();
		idUniv=$("#modalModifierET #anneeUnivModif option:selected").val();
		
		var d2=new Date();
		j2=d2.getDate();
		m2=d2.getMonth()+1;
		a2=d2.getFullYear();
		daty=a2+"-0"+m2+"-"+j2;
		
		if(dateDeb=="" ){
			swal({
				title: "",
				text: "Il'y a un(des) champ vide!!",
				icon: "error",
			});
		}else{
			if(dateFin>=daty){
				if(dateFin>=dateDeb){
					//code mimodifier ET
					
					$.ajax({
						type:"POST",
						url:"modifierET.php",
						data:"dateDebAncien="+dateDebAncien+"&dateFinAncien="+dateFinAncien+"&idUnivAncien="+idUnivAncien+"&dateDeb="+dateDeb+"&dateFin="+dateFin+"&idUniv="+idUniv,
						success:function(msg){
							swal({
								title: "",
								text: msg,
								icon: "success",
							}).then((willDelete) => {
								if(willDelete){
									document.location.reload();
								};
							});
							viderModalET();
						},
						error:function(){
							swal({
								title: "",
								text: "On ne peut pas connecter au serveur pour le moment!!",
								icon: "error",
							});
							viderModalET();
						}
					});
					

						
				}else{
					swal({
						title: "",
						text: "Le date debut est en avance que le date fin!!",
						icon: "error",
					});
				}
			}else{
				swal({
					title: "",
					text: "Le date que vous saisissez est dejà fini!!",
					icon: "error",
				});
			}
		}
		
	});
 });    