$(document).ready(function(){
    $("#modalEt #modifierEt").click(function(){
      
        var username=$("#modalEt #usernameEt").text();
        var matricule=$("#modalEt #matriculeEt").val();
        var nom=$("#modalEt #nomEt").val();
        var prenom=$("#modalEt #prenomEt").val();
        var datenais=$("#modalEt #datenaisEt").val();
       var niveau=$("#modalEt #niveauEt option:selected").val();
       var parcours=$("#modalEt #parcoursEt option:selected").val();
        var mdp=$("#modalEt #mdpEt").val();
        var matriculeAncien=$("#modalEt #matriculeEtAncien").val();
   
	if(matricule=="" || nom==""  || prenom==""  ||  mdp=="" || datenais==""){
                swal({
                    title: "",
                    text: "Il y a quelques champs vide sur le formulaire!!",
                    icon: "error",
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
				
                //code modification
                
                 $.ajax({
                    type:"POST",
                    url:"modifierEtudiant.php",
                    data:"matriculeAncien="+matriculeAncien+"&username="+username+"&datenais="+datenais+"&matricule="+matricule+"&nom="+nom+"&prenom="+prenom+"&niveau="+niveau+"&parcours="+parcours+"&mdp="+mdp,
                    success:function(msg){
                        swal({
                            title:"",
                            text:msg,
					        icon: "success",
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
    });
    
 });    