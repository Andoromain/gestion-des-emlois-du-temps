function viderModalAddEventTout(){
    $("#modalAddEventTout #repetitionTout").addClass("d-none");
    $("#modalAddEventTout #nomEvenementTout").val("");
    $("#modalAddEventTout #matiereTout").val("");
    $("#modalAddEventTout #lieuTout").val("");
    $("#modalAddEventTout #repeatSemaineTout").removeAttr("checked");
    $("#modalAddEventTout #dateDebutTout").val("");
    $("#modalAddEventTout #dateFinTout").val("");
}
function viderModalUpdateEventTout(){
    $("#modalUpdateEventTout #repetitionTout").addClass("d-none");
    $("#modalUpdateEventTout #nomEvenementTout").val("");
    $("#modalUpdateEventTout #matiereTout").val("");
    $("#modalUpdateEventTout #lieuTout").val("");
    $("#modalUpdateEventTout #repeatSemaineTout").removeAttr("checked");
    $("#modalUpdateEventTout #dateDebutTout").val("");
    $("#modalUpdateEventTout #dateFinTout").val("");
	$("#modalUpdateEventTout #repetitionTout").addClass("d-none");
	$("#modalUpdateEventToutTout #repetitionTout #dateDebTout").val("");
	$("#modalUpdateEventTout #repetitionTout #dateFinTout").val("");
}


function ajoutEventTout(matriculeEn,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin,mail)
{
    $.ajax({
        type:"POST",
        url:"ajoutEventTout.php",
        data:"matriculeEn="+matriculeEn+"&nomEvenement="+nomEvenement+"&parcours="+parcours+"&niveau="+niveau+"&matiere="+matiere+"&lieu="+lieu+"&repetition="+repetition+"&daty="+daty+"&heureDeb="+heureDeb+"&heureFin="+heureFin+"&dateDeb="+dateDeb+"&dateFin="+dateFin,
         success:function(msg){
             swal({
                     title:"",
                     text:msg,
					 //icon: "success",
              }).then((vrai)=>{
				  if(vrai){
					  //code mail 
					  $.ajax({
						  type:"POST",
						  url:"https://www.facmedfianar.mg/mail.php",
						  data:"reponse= Un des évènement dans votre emplois du temps est ajouté  par l'administrateur, veuilez consulter votre compte !"+"&email="+mail,
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

function  apporterSurModalUpdateTout(matriculeEn,nomEvenement,codeP,codeNiv,libelleMat,daty,lieu,heureDeb,heureFin,repetition,dateDeb,dateFin,mail)
{	
    $("#modalUpdateEventTout #matriculeEnUpdateTout option[value='"+mail+"']").prop("selected",true);
    $("#modalUpdateEventTout #nomEvenementTout").val(nomEvenement);
	if(codeNiv=="L1"){
		$("#pourL1U").removeClass("d-none");
		$("#pourL1U").slideDown("normal");
		$("#modalUpdateEventTout input[value=pourL1]").prop("checked",true);
		$("#modalUpdateEventTout #pourL1 option[value='"+codeP+"']").prop("selected",true);
		$("#autreU").addClass("d-none");		
	}else{
		$("#autreU").removeClass("d-none");
		$("#autreU").slideDown("normal");
		$("#modalUpdateEventTout input[value=autre]").prop("checked",true);
		$("#pourL1U").addClass("d-none");
		$("#modalUpdateEventTout #parcours option[value='"+codeP+"']").prop("selected",true);
		$("#modalUpdateEventTout #niveau option[value='"+codeNiv+"']").prop("selected",true);
	}
    $("#modalUpdateEventTout #matiereTout").val(libelleMat);
	$("#modalUpdateEventTout #lieuTout").val(lieu);
	if(repetition==1){
		$("#modalUpdateEventTout input[value='1']").prop("checked",true);
	}else{
		$("#modalUpdateEventTout input[value='7']").prop("checked",true);
		$("#modalUpdateEventTout #repetitionTout").removeClass("d-none");
		$("#modalUpdateEventTout #repetitionTout #dateDebTout").val(dateDeb);
		$("#modalUpdateEventTout #repetitionTout #dateFinTout").val(dateFin);
	}
	$("#modalUpdateEventTout #dateTout").val(daty);
	$("#modalUpdateEventTout #heureDebTout").val(heureDeb);
	$("#modalUpdateEventTout #heureFinTout").val(heureFin);
		
}

function supprimerEventTout(id,mail)
{
	$.ajax({
		type:"POST",
		 url:"supprimerEventTout.php",
		 data:"id="+id,
		 success:function(msg){
             swal({
                     title:"",
                     text:msg,
					 icon: "success",
              }).then((vrai)=>{
				  if(vrai){
					  
					  //code mail 
					  $.ajax({
						  type:"POST",
						  url:"https://www.facmedfianar.mg/mail.php",
						  data:"reponse= Un des évènement dans votre emplois du temps est supprimé  par l'administrateur, veuilez consulter votre compte !"+"&email="+mail,
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

function modifierEventTout(id,matriculeEn,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin,mail)
{
	$.ajax({
		type:"POST",
		url:"modifierEventTout.php",
		data:"id="+id+"&matriculeEn="+matriculeEn+"&nomEvenement="+nomEvenement+"&parcours="+parcours+"&niveau="+niveau+"&matiere="+matiere+"&lieu="+lieu+"&repetition="+repetition+"&daty="+daty+"&heureDeb="+heureDeb+"&heureFin="+heureFin+"&dateDeb="+dateDeb+"&dateFin="+dateFin,
		success:function(msg){
             swal({
                     title:"",
                     text:msg,
					 icon: "success",
              }).then((vrai)=>{
				  if(vrai){
					 
					  //code mail 
					 $.ajax({
						  type:"POST",
						  url:"https://www.facmedfianar.mg/mail.php",
						  data:"reponse= Un des évènement dans votre emplois du temps est modifié par l'administrateur, veuilez consulter votre compte !"+"&email="+mail,
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
              }).then((vrai)=>{
				  if(vrai){
					  document.location.reload();
				  }
			  });
         } 
	});
}