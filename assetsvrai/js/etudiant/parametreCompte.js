$(document).ready(function(){

    $("#modalParamEt #modifierEt").click(function(){
		var matriculeAncien=$("#matriculeEtAncien").val();
        var username=$("#modalParamEt #usernameP").val();
        var matricule=$("#modalParamEt #matriculeEt").val();
        var nom=$("#modalParamEt #nomEt").val();
        var prenom=$("#modalParamEt #prenomEt").val();
        var datenais=$("#modalParamEt #datenaisEt").val();
		var niveau=$("#modalParamEt #niveauP option:selected").val();
		var parcours=$("#modalParamEt #parcoursP option:selected").val();
        var mdp1=$("#modalParamEt #mdpEt1").val();
        var mdp2=$("#modalParamEt #mdpEt2").val();
		
		
	
	if(username=="" || matricule=="" || nom==""  || prenom==""  || datenais=="" || mdp1=="" || mdp2==""){
                swal({
                    title: "",
                    text: "Il y a quelques champs vide sur le formulaire!!",
                    icon: "error",
                }).then((vrai)=>{
				            if(vrai){
								document.location.reload();
				            }
			            });   
    }else{
		var exp=new RegExp("^[A-Z][a-zA-Z\\s-àâäãçéèêëìîïòôöõùûüñ'-]+");
		if(!exp.test(nom)){
			swal({
                    title: "",
                    text: "Verifiez le nom que vous qvez saisi<br> (Il doit commencer par majiscule et doit etre des caracteres alphabetiques )!!",
                    icon: "error",
            }).then((vrai)=>{
				            if(vrai){
								document.location.reload();
				            }
			           });
		}else{
			if(!exp.test(prenom)){
				swal({
                    title: "",
                    text: "Verifiez le prenom que vous qvez saisi<br> (Il doit commencer par majiscule et doit etre des caracteres alphabetiques )!!",
                    icon: "error",
				}).then((vrai)=>{
				            if(vrai){
								document.location.reload();
				            }
			            });
			}else{
				
		if(mdp1==mdp2){
                //code modification
                
                 $.ajax({
                    type:"POST",
                    url:"modifierParamCompteEt.php",
                    data:"matriculeAncien="+matriculeAncien+"&username="+username+"&datenais="+datenais+"&matricule="+matricule+"&nom="+nom+"&prenom="+prenom+"&niveau="+niveau+"&parcours="+parcours+"&mdp1="+mdp1,
                    success:function(msg){
						if(msg=="l'etudiant est modifie avec success!"){
							swal({
                            title:"",
                            text:"votre compte a été modifié et vous devez vous reconnectez!",
					        icon: "success",
							}).then((vrai)=>{
								if(vrai){
									document.location.href="logout.php";
								}
							});
						}else{
							swal({
								title:"",
								text:msg,
								icon: "error",
							}).then((vrai)=>{
				            if(vrai){
								document.location.reload();
				            }
			            });
						}
                    },
                    error:function(){
                        swal({
                            title:"",
                            text:"on ne peut pas connecter a la base de donnee pour le moment!!  ",
                            icon:'error',
                        }).then((vrai)=>{
				            if(vrai){
								document.location.reload();
				            }
			            });
                    }
                });
		}else{
			swal({
						title: "",
						text: "Les deux mots de pass ne sont pas identiques!!",
						icon: "error",
					}).then((willDelete) => {
					if (willDelete) {
						document.location.reload();
					}
					});
		}
			}
		}	
       }
    });
    
 });    