$(document).ready(function(){

    $("#modalParamEn #modifierEn").click(function(){
        	
        var matriculeAncien=$("#matriculeEnAncien").val();
        var username=$("#modalParamEn #usernameP").val()
		var matricule=$("#modalParamEn #matriculeEn").val();
		var nom=$("#modalParamEn #nomEn").val();
		var prenom=$("#modalParamEn #prenomEn").val();
		var email= $("#modalParamEn #emailEn").val();
        var telephone=$("#modalParamEn #telephoneEn").val();
        var mdp1=$("#modalParamEn #mdpEn1").val();
        var mdp2=$("#modalParamEn #mdpEn2").val();
     
        if(username==""|| matricule=="" || nom==""  || prenom==""|| email==""|| telephone==""|| mdp1=="" || mdp2=="")
            {
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
				var expTel=new RegExp("^(03)[0-9]{8}$");
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
				if(!expTel.test(telephone)){
				swal({
                    title: "",
                    text: "Verifiez le telephone que vous qvez saisi<br> (Il doit commencer par 03 et doit contenir 10 chiffres )!!",
                    icon: "error",
				}).then((vrai)=>{
				            if(vrai){
								document.location.reload();
				            }
			            });
				}else{
				
				
                //code modification
                if(mdp1==mdp2){
                    $.ajax({
                    type:"POST",
                    url:"modifierEnseignant.php",
                    data:"matriculeEnAncien="+matriculeAncien+"&username="+username+"&matricule="+matricule+"&nom="+nom+"&prenom="+prenom+"&email="+email+"&telephone="+telephone+"&mdp="+mdp1,
                    success:function(msg){
                        if(msg=="l'enseignant est modifie avec success!"){
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
                    }).then((vrai)=>{
				            if(vrai){
								document.location.reload();
				            }
			            }); 
                } 
				}
			}
		}
            }
    });
 });    