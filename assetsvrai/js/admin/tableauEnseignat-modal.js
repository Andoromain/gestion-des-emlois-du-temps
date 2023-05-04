$(document).ready(function(){
	
    $("#modalEn #modifierEn").click(function(){
        var username=$("#modalEn #usernameEn").text()
       var matricule=$("#modalEn #matriculeEn").val();
       var nom=$("#modalEn #nomEn").val();
       var prenom=$("#modalEn #prenomEn").val();
       var categorie=$("#modalEn #categorieEn option:selected").val();
       var email= $("#modalEn #emailEn").val();
        var telephone=$("#modalEn #telephoneEn").val();
        var mdp=$("#modalEn #mdpEn").val();
        var matriculeAncien=$("#modalEn #matriculeEnAncien").val();
        
        if(username=="" || matricule=="" || nom==""  || prenom==""|| email==""|| telephone==""|| mdp=="")
            {
                swal({
                    title: "",
                    text: "Il y a quelques champs vide sur le formulaire!!",
                    icon: "error",
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
                
                $.ajax({
                    type:"POST",
                    url:"modifierEnseignant.php",
                    data:"matriculeAncien="+matriculeAncien+"&username="+username+"&matricule="+matricule+"&nom="+nom+"&prenom="+prenom+"&categorie="+categorie+"&email="+email+"&telephone="+telephone+"&mdp="+mdp,
                    success:function(msg){
                        swal({
                            title:"",
                            text:msg,
					        //icon: "success",
                        }).then((vrai)=>{
				            if(vrai){
					         document.location.reload();
				            }
			            });
                    },
                    error:function(){
                        swal({
                            title:"",
                            text:"on ne peut pas connecter a la base de donnee pour le moment!!  ",
                            icon:'error',
                        });
                    }
                });
		}
		}
		}
            }
    });
 });    