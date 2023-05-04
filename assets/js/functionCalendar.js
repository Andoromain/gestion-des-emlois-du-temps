function viderModalAddEvent(){
    $("#modalAddEvent #repetition").addClass("d-none");
    $("#modalAddEvent #nomEvenement").val("");
    $("#modalAddEvent #matiere").val("");
    $("#modalAddEvent #lieu").val("");
    $("#modalAddEvent #repeatSemaine").removeAttr("checked");
    $("#modalAddEvent #dateDebut").val("");
    $("#modalAddEvent #dateFin").val("");
}
function viderModalUpdateEvent(){
    $("#modalUpdateEvent #repetition").addClass("d-none");
    $("#modalUpdateEvent #nomEvenement").val("");
    $("#modalUpdateEvent #matiere").val("");
    $("#modalUpdateEvent #lieu").val("");
    $("#modalUpdateEvent #repeatSemaine").removeAttr("checked");
    $("#modalUpdateEvent #dateDebut").val("");
    $("#modalUpdateEvent #dateFin").val("");
	$("#modalUpdateEvent #repetition").addClass("d-none");
	$("#modalUpdateEvent #repetition #dateDeb").val("");
	$("#modalUpdateEvent #repetition #dateFin").val("");
}


function ajoutEvent(nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin)
{
    $.ajax({
        type:"POST",
        url:"ajoutEvent.php",
        data:"nomEvenement="+nomEvenement+"&parcours="+parcours+"&niveau="+niveau+"&matiere="+matiere+"&lieu="+lieu+"&repetition="+repetition+"&daty="+daty+"&heureDeb="+heureDeb+"&heureFin="+heureFin+"&dateDeb="+dateDeb+"&dateFin="+dateFin,
         success:function(msg){
             swal({
                     title:"",
                     text:msg,
					 //icon: "success",
              }).then((vrai)=>{
				  if(vrai){
					  
					   var mail=$("#emailen").val();
					  //code mail 
					  $.ajax({
						  type:"POST",
						  url:"https://www.facmedfianar.mg/mail.php",
						  data:"reponse= Un des évènement dans votre emplois du temps est ajouté , veuilez consulter votre compte !"+"&email="+mail,
						  success:function(msg){
							   document.location.reload();
						  },
						  error:function(){
							   document.location.reload();
						  }
					  });
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

function apporterSurModalUpdate(nomEvenement,codeP,codeNiv,libelleMat,daty,lieu,heureDeb,heureFin,repetition,dateDeb,dateFin)
{
    $("#modalUpdateEvent #nomEvenement").val(nomEvenement);
	if(codeNiv=="L1"){
		$("#pourL1U").removeClass("d-none");
		$("#pourL1U").slideDown("normal");
		$("#modalUpdateEvent input[value=pourL1]").prop("checked",true);
		$("#modalUpdateEvent #pourL1 option[value='"+codeP+"']").prop("selected",true);
		$("#autreU").addClass("d-none");		
	}else{
		$("#autreU").removeClass("d-none");
		$("#autreU").slideDown("normal");
		$("#modalUpdateEvent input[value=autre]").prop("checked",true);
		$("#pourL1U").addClass("d-none");
		$("#modalUpdateEvent #parcours option[value='"+codeP+"']").prop("selected",true);
		$("#modalUpdateEvent #niveau option[value='"+codeNiv+"']").prop("selected",true);
	}
    $("#modalUpdateEvent #matiere").val(libelleMat);
	$("#modalUpdateEvent #lieu").val(lieu);
	if(repetition==1){
		$("#modalUpdateEvent input[value='1']").prop("checked",true);
	}else{
		$("#modalUpdateEvent input[value='7']").prop("checked",true);
		$("#modalUpdateEvent #repetition").removeClass("d-none");
		$("#modalUpdateEvent #repetition #dateDeb").val(dateDeb);
		$("#modalUpdateEvent #repetition #dateFin").val(dateFin);
	}
	$("#modalUpdateEvent #date").val(daty);
	$("#modalUpdateEvent #heureDeb").val(heureDeb);
	$("#modalUpdateEvent #heureFin").val(heureFin);
		
}

function supprimerEvent(id)
{
	$.ajax({
		type:"POST",
		 url:"supprimerEvent.php",
		 data:"id="+id,
		 success:function(msg){
             swal({
                     title:"",
                     text:msg,
					 icon: "success",
              }).then((vrai)=>{
				  if(vrai){
					  
					    var mail=$("#emailen").val();
					  //code mail 
					  $.ajax({
						  type:"POST",
						  url:"https://www.facmedfianar.mg/mail.php",
						  data:"reponse= Un des évènement dans votre emplois du temps est supprimé , veuilez consulter votre compte !"+"&email="+mail,
						  success:function(msg){
							   document.location.reload();
						  },
						  error:function(){
							   document.location.reload();
						  }
					  });
					  
					 
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

function modifierEvent(id,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin)
{
	$.ajax({
		type:"POST",
		url:"modifierEvent.php",
		data:"id="+id+"&nomEvenement="+nomEvenement+"&parcours="+parcours+"&niveau="+niveau+"&matiere="+matiere+"&lieu="+lieu+"&repetition="+repetition+"&daty="+daty+"&heureDeb="+heureDeb+"&heureFin="+heureFin+"&dateDeb="+dateDeb+"&dateFin="+dateFin,
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
              }).then((vrai)=>{
				  if(vrai){
					  
					    var mail=$("#emailen").val();
					  //code mail 
					  $.ajax({
						  type:"POST",
						  url:"https://www.facmedfianar.mg/mail.php",
						  data:"reponse= Un des évènement dans votre emplois du temps est modifié , veuilez consulter votre compte!"+"&email="+mail,
						  success:function(msg){
							   document.location.reload();
						  },
						  error:function(){
							   document.location.reload();
						  }
					  });
					  
				  }
			  });
         } 
	});
}