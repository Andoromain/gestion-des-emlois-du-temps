$(document).ready(function(){
	
    $("#modalParamAdmin #modifierEn").click(function(){
		var usernameAncien=$("#usernameConnecteSpan").text();
		var codeAdminAncien=$("#codeAdminAncien").val();
        var username=$("#modalParamAdmin input[name=usernameAdmin]").val();
       var code=$("#modalParamAdmin input[name=codeAdmin]").val();
       var mdp1= $("#modalParamAdmin input[name=password_1Ad]").val();
        var mdp2=$("#modalParamAdmin input[name=password_2Ad]").val();

        if(username==""|| code==""|| mdp1=="" || mdp2==""){
                swal({
                    title: "",
                    text: "Il y a quelques champs vide sur le formulaire!!",
                    icon: "error",
                }).then((willDelete) => {
					if (willDelete) {
						document.location.reload();
					}
				});  
        }else{
			if(mdp1==mdp2){
				
                
                $.ajax({
                    type:"POST",
                    url:"paramCompte.php",
                    data:"usernameAncien="+usernameAncien+"&codeAdminAncien="+codeAdminAncien+"&username="+username+"&codeAdmin="+code+"&mdp="+mdp1,
                    success:function(msg){
						error=msg;
						if(msg=="votre compte est modifié avec success et vous devez vous reconnectez!"){
							swal({
                            title:"",
                            text:"votre compte est modifié avec success et vous devez vous reconnectez!",
					        icon: "success",
                        }).then((vrai)=>{
				            if(vrai){
					         document.location.href="logout.php";
				            }
			            });
						}else{
                        swal({
                            title:"",
                            text:error,
					        //icon: "success",
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
    });
 });    