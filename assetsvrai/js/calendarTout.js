$(document).ready(function(){

	var calendarTout=$("#calendarTout").fullCalendar({
        locale:'fr',
        header:
        {
            left:'prev,next,today',
            center:'title',
            right:'agendaWeek,agendaDay,list',
        },
		buttonText :{
			today:    'aujourd\'hui',
			month:    'mois',
			week:     'semaine',
			day:      'jour',
			list:     'liste'
		},
		columnFormat:'dddd D MMMM',
        defaultView:'agendaWeek',
        selectable:true,
        weekly:true,
        selectHelper:true,
        minTime:'06:00:00',
        maxTime:'18:30:00',
		eventBackgroundColor:'black',
		eventTextColor :'white',
		eventBorderColor:"#ccc",
		slotDuration: '00:15:00',
		contentHeight: 'auto',
        allDaySlot:false,
        navLinks:true,
        editable:false,
		slotLabelFormat:"HH:mm",
        disableDragging: false,
        disableResizing:false,
		selectOverlap:false,
        eventClick:function(event){
           
            //maka ni evenement taloha
            var id=event.id;
            var matriculeAncien=event.matricule;
            var nomEvenementAncien=event.title;
			var mail=event.email;
            var codePAncien=event.codeP;
            var codeNivAncien=event.codeNiv;
            var libelleMatAncien=event.libelleMat;
            var dateAncien=event.date;
            var lieuAncien=event.lieu;
            var heureDebAncien=event.heureDeb;
            var heureFinAncien=event.heureFin;
            var repetitionAncien=event.repetition;
            var dateDebAncien=event.dateDeb;
            var dateFinAncien=event.dateFin;
            /////////////////////////////////
            apporterSurModalUpdateTout(matriculeAncien,nomEvenementAncien,codePAncien,codeNivAncien,libelleMatAncien,dateAncien,lieuAncien,heureDebAncien,heureFinAncien,repetitionAncien,dateDebAncien,dateFinAncien,mail);
            	
			$("#modalUpdateEventTout").modal("show"); 
			
			//manao modification na event
			
            $("#modalUpdateEventTout #modifierTout").click(function(){
				var parcours,niveau;
				var matriculeEn=$("#modalUpdateEventTout #matriculeEnUpdateTout option:selected").text();
				var mailEn=$("#modalUpdateEventTout #matriculeEnUpdateTout option:selected").val();
				var nomEvenement= $("#modalUpdateEventTout #nomEvenementTout").val();//
				var type=$("#modalUpdateEventTout input[name=type]:checked").val();
				if(type=="pourL1"){
					parcours=$("#modalUpdateEventTout #pourL1 option:selected").val();//
					niveau="L1";
				}else{
					parcours=$("#modalUpdateEventTout #parcoursTout option:selected").val();//
					niveau=$("#modalUpdateEventTout #niveauTout option:selected").val();//
                }
                var matiere=$("#modalUpdateEventTout #matiereTout").val();//
                var lieu=$("#modalUpdateEventTout #lieuTout").val();//
                var repetition=$("#modalUpdateEventTout input[name=repetitionTout]:checked").val();
				var daty=$("#modalUpdateEventTout #dateTout").val();
				var heureDeb=$("#modalUpdateEventTout #heureDebTout").val();
				var heureFin=$("#modalUpdateEventTout #heureFinTout").val();
				var dateDeb=$("#modalUpdateEventTout #repetitionTout #dateDebTout").val();
				var dateFin=$("#modalUpdateEventTout #repetitionTout #dateFinTout").val();
				
				if(nomEvenement=="" || matiere=="" || lieu=="" || daty=="" || heureDeb=="" || heureFin=="")
				{
					swal({
						title: "",
						text: "Il y a quelque champ vide! veuillez le verifier ",
						icon: "error",
					});	
				}else{
					if(heureDeb>heureFin){
						swal({
							title: "",
							text: "L'heure debut est en retard a celui de heure fin!",
							icon: "error",
						});	
					}else{
						if(repetition==7)
						{
							if(dateDeb>dateFin)
							{
								swal({
									title: "",
									text: "La date debut est en retard a celui de date fin!",
									icon: "error",
								});	
							}else{
								//code modification pour repetition 7
								 modifierEventTout(id,matriculeEn,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin,mailEn);
							}
						}else{
							//code modification pour repetition 1
							 modifierEventTout(id,matriculeEn,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin,mailEn);
							
							
						}
					}
				}
				
			});
			
			
			
			
			
			//suppresion event 
			$("#modalUpdateEventTout #supprimerTout").click(function(){
				swal({
					title: "Etes- vous Sur?",
					text: "Si vous le supprimer , on ne peut pas le recuperer?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$("#modalUpdateEventTout").modal("hide"); 
						supprimerEventTout(id,mail);
					}
				})
			});
        },
		//mahatonga tsy hai selectionena ni temps passe fa ni present si future iani
		
		selectConstraint:{
			start:$.fullCalendar.moment().subtract(0,'days'),
			end:$.fullCalendar.moment().startOf('month').add(6,'month')
		},
		
		////////////////////////////////////////////
		
		
		//Ajout rehefa avi miselectionne
		
        select:function(start,end,allDay)
        {
			viderModalAddEventTout();
           
            $("#modalAddEventTout #dateTout").val($.fullCalendar.formatDate(end, "YYYY-MM-DD"));
            $("#modalAddEventTout #heureDebTout").val($.fullCalendar.formatDate(start,"HH:mm:ss"));
            $("#modalAddEventTout #heureFinTout").val($.fullCalendar.formatDate(end,"HH:mm:ss"));
            $("#modalAddEventTout").modal("show");
           
            
			calendarTout.fullCalendar('unselect');
			$('#modalAddEventTout').on('hidden.bs.modal', function () {
				$(this).find('form').trigger('reset');
				//viderModalAddEventTout();
				//$('#modalAddEventTout *').unbind();
			});
			
        },
		eventRender:function(event,element,view){
			element.find('.fc-title').append(
				"<div class='hr-line-solid-no-margin'></div><span style='font-size: 14px'>"+event.nom+ "</span><br><span style='font-size: 14px'>"+event.libelleP+" "+event.codeNiv+ "</span><br><span style='font-size: 14px'><u>matiere</u> :"+event.libelleMat+"</span><br><span style='font-size: 14px'><u>Lieu</u> : "+event.lieu+"</span><br></div>");
			
            var theDate=event.start;
            var endDate=new Date(event.dowend);
            var startDate=new Date(event.dowstart);
            
            if(theDate >=endDate){
                return false;
            }
            if(theDate<=startDate){
                return false;
            }
        },
			
    });
	//code pour hide modal
	
	$('#modalUpdateEventTout').on('hidden.bs.modal', function () {
		viderModalUpdateEventTout();
	});
	
	
	$('#modalAddEventTout').on('hidden.bs.modal', function () {
		viderModalAddEventTout();
		$('#modalAddEventTout #heureDebTout').val("");
		$('#modalAddEventTout #heureFinTout').val("");
		$('#modalAddEventTout #dateTout').val("");
				
	});
			
	//recuperer les informations sur le modal//
            $("#modalAddEventTout #enregistrerTout").click(function(){
				
				var heureDeb=$("#modalAddEventTout #heureDebTout").val();
				var heureFin = $("#modalAddEventTout #heureFinTout").val();
				var daty=$("#modalAddEventTout #dateTout").val();
                var matriculeEn=$("#modalAddEventTout #matriculeEnAddTout option:selected").text();
                var mailEn=$("#modalAddEventTout #matriculeEnAddTout option:selected").val();
                var nomEvenement=$("#modalAddEventTout #nomEvenementTout").val();
                var matiere=$("#modalAddEventTout #matiereTout").val();
                var lieu=$("#modalAddEventTout #lieuTout").val();
                var repetition=$("#modalAddEventTout input[name=repetitionTout]:checked").val();
				var type=$("#modalAddEventTout input[name=type]:checked").val();
                var dateDeb,dateFin;
				var parcours="",niveau="";
                var dateDeb,dateFin;
                /* var daty=moment(debut);
                 var day=daty.day();*/
             
			  if(type=="pourL1"){
				    parcours=$("#modalAddEventTout #pourL1 option:selected").val();
					niveau="L1";
			   }else if(type=="autre"){
				   parcours=$("#modalAddEventTout #parcoursTout option:selected").val();
				   niveau=$("#modalAddEventTout #niveauTout option:selected").val();
			   }
			 
            if(matriculeEn=="undefined" || matriculeEn==""){
                swal({
                          title:"",
                          text:"Il n'y pas d'esnseignant sur la base de donnée!",
                          icon:"error",
                       }); 
            }else{
                    
                if (nomEvenement=="" || matiere=="" || lieu=="" ){
                       swal({
                           title:"",
                           text:"Il y a quelque champ invalide!",
                           icon:"error",
                       }); 
                }else{
                   if(repetition==7){
                        
                       dateDeb=$("#modalAddEventTout #dateDebTout").val();//maka ni daty eo @ modal
                        dateFin=$("#modalAddEventTout #dateFinTout").val();//maka ni daty eo @ modal
                      
                       //maka daty androany
                       var d = new Date();
                       var month = d.getMonth()+1;
                       var day = d.getDate();
                       var output = d.getFullYear() + '-' +(month<10 ? '0' : '') + month + '-' +(day<10 ? '0' : '') + day;
                       //------------------
                       
                       if(dateDeb=="" || dateFin==""){
                           swal({
                                title:"",
                                text:"votre date debut ou date Fin est vide!!",
                                icon:"error",
                            }); 
                       }else{
                            if(dateDeb<output || dateFin<output){
                                swal({
                                    title:"",
                                    text:"votre date debut ou date Fin est inferieur à la date d'aujourd'hui!",
                                    icon:"error",
                                }); 
                            }else{
                                if(dateDeb>dateFin){
                                    swal({
                                        title:"",
                                        text:"votre date debut est plus grand que date Fin!",
                                        icon:"error",
                                    }); 
                                }else{
									if(heureDeb<heureFin){
									ajoutEventTout(matriculeEn,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin,mailEn);
									$("#modalAddEventTout").modal("hide");
									}else{
										swal({
											title:"",
											text:"votre heure debut est plus grand que heure Fin!",
											icon:"error",
										});
									}
                                }
                            }
                       }    
                    }else if(repetition==1){   
						dateD="";dateF="";
						if(heureDeb<heureFin){
						ajoutEventTout(matriculeEn,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateD,dateF,mailEn);
						 $("#modalAddEventTout").modal("hide");
						}else{
							swal({
								title:"",
								text:"votre heure debut est plus grand que heure Fin!",
								icon:"error",
							});
						}
                    }else{
						swal({
							title:"",
							text:"Veuillez selectionner la repetition de votre evenement!!  ",
							icon:'error',
						});
					}
                }
				} 
			});
	
	
	
});
