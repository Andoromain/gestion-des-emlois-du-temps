function modificationEn(username,matricule,nom,prenom,categorie,email,telephone,mdp)
{
    $("#modalEn #matriculeEn").val(matricule);
    $("#modalEn #usernameEn").text(username);
    $("#modalEn #nomEn").val(nom);
    $("#modalEn #prenomEn").val(prenom);
    $("#modalEn #categorieEn option[value='"+categorie+"']").prop("selected",true);
    $("#modalEn #emailEn").val(email);
    $("#modalEn #telephoneEn").val(telephone);
    $("#modalEn #matriculeEnAncien").val(matricule);
    $("#modalEn #mdpEn").val(mdp);
}
function modificationEt(username,matricule,nom,prenom,datenais,niveau,parcours,mdp)
{
    $("#modalEt #matriculeEt").val(matricule);
    $("#modalEt #usernameEt").text(username);
    $("#modalEt #nomEt").val(nom);
    $("#modalEt #prenomEt").val(prenom);
    $("#modalEt #datenaisEt").val(datenais);
    $("#modalEt #niveauEt").val(niveau);
    $("#modalEt #parcoursEt").val(parcours);
    $("#modalEt #matriculeEtAncien").val(matricule);
    $("#modalEt #mdpEt").val(mdp);
}

function suppressionEn(matricule){
	swal({
            title: "Etes- vous Sur?",
            text: "Si vous le supprimer l'enseignant, on ne peut pas le recuperer?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
				$.ajax({
                    type:"POST",
                    url:"suppressionEnseignant.php",
                    data:"matricule="+matricule,
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
        });
}

function suppressionEt(matricule){
	swal({
            title: "Etes- vous Sur ?",
            text: "Si vous le supprimer l'etudiant, on ne peut pas le recuperer?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
				$.ajax({
                    type:"POST",
                    url:"suppressionEtudiant.php",
                    data:"matricule="+matricule,
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
        });
}
