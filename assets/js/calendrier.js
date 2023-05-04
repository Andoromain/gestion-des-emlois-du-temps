$(document).ready(function(){
	var calendar=$("#calendar").fullCalendar({
        locale:'fr',
        header:
        {
            left:'prev,next,today',
            center:'title',
            right:'agendaWeek,agendaDay,list',  $(document).on('click','.genererPdfEt',function(e){
      //alert();   
        var moi1=$.fullCalendar.moment().startOf('week').month();
	var moi=$.fullCalendar.moment().endOf('week').month();
	var jour=$.fullCalendar.moment().endOf('week').date();
	var jour1=$.fullCalendar.moment().startOf('week').date();
	var annee=$.fullCalendar.moment().endOf('week').year();
	var annee1=$.fullCalendar.moment().startOf('week').year();
	var mois1,mois;
        //start
    if(moi1==0){
		mois1="Janvier";
	}
	if(moi1==1){
		mois1="Fevrier";
	}
	if(moi1==2){
		mois1="Mars";
	}
	if(moi1==3){
		mois1="Avril";
	}
	if(moi1==4){
		mois1="Mai";
	}
	if(moi1==5){
		mois1="Juin";
	}
	if(moi1==6){
		mois1="Juillet";
	}
	if(moi1==7){
		mois1="Aout";
	}
	if(moi1==8){
		mois1="Septembre";
	}
	if(moi1==9){
		mois1="Octobre";
	}
	if(moi1==10){
		mois1="Novembre";
	}
	if(moi1==11){
		mois1="Decembre";
	}
        //end
    if(moi==0){
		mois="Janvier";
	}
	if(moi==1){
		mois="Fevrier";
	}
	if(moi==2){
		mois="Mars";
	}
	if(moi==3){
		mois="Avril";
	}
	if(moi==4){
		mois="Mai";
	}
	if(moi==5){
		mois="Juin";
	}
	if(moi==6){
		mois="Juillet";
	}
	if(moi==7){
		mois="Aout";
	}
	if(moi==8){
		mois="Septembre";
	}
	if(moi==9){
		mois="Octobre";
	}
	if(moi==10){
		mois="Novembre";
	}
	if(moi==11){
		mois="Decembre";
	}
	var debut="    "+jour1+" "+mois1+"   ";
	var fin="    "+jour+" "+mois+"   "+annee;
     
    let b=parseInt(moi)+1;
    let a=parseInt(moi1)+1;
    var start=annee1+'-'+a+'-'+jour1;
    var end=annee+'-'+b+'-'+jour;
    //alert(debut+' '+fin);
        e.preventDefault();
        var $a = $(this);
        $.ajax({
            type : 'GET',
            url : $a.attr('href')+'?debut='+debut+'&fin='+fin+'&start='+start+'&end='+end,
        })
    });
    
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
        allDaySlot:false,
        navLinks:true,
        editable:false,
		eventBackgroundColor:'black',
		eventTextColor :'white',
		eventBorderColor:"#ccc",
		slotLabelFormat:"HH:mm",
        disableDragging: false,
        disableResizing:false,
		selectOverlap:false,
        eventClick:function(event){
           
            //maka ni evenement taloha
            var id=event.id;
            var nomEvenementAncien=event.title;
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
            apporterSurModalUpdate(nomEvenementAncien,codePAncien,codeNivAncien,libelleMatAncien,dateAncien,lieuAncien,heureDebAncien,heureFinAncien,repetitionAncien,dateDebAncien,dateFinAncien);
            
			$("#modalUpdateEvent").modal("show"); 
			
			//manao modification na event
			
            $("#modalUpdateEvent #modifier").click(function(){
				var parcours,niveau;
				var nomEvenement= $("#modalUpdateEvent #nomEvenement").val();//
				var type=$("#modalUpdateEvent input[name=type]:checked").val();
				if(type=="pourL1"){
					parcours=$("#modalUpdateEvent #pourL1 option:selected").val();//
					niveau="L1";
				}else{
					parcours=$("#modalUpdateEvent #parcours option:selected").val();//
					niveau=$("#modalUpdateEvent #niveau option:selected").val();//
                }
				var matiere=$("#modalUpdateEvent #matiere").val();//
                var lieu=$("#modalUpdateEvent #lieu").val();//
                var repetition=$("#modalUpdateEvent input[name=repetition]:checked").val();
				var daty=$("#modalUpdateEvent #date").val();
				var heureDeb=$("#modalUpdateEvent #heureDeb").val();
				var heureFin=$("#modalUpdateEvent #heureFin").val();
				var dateDeb=$("#modalUpdateEvent #repetition #dateDeb").val();
				var dateFin=$("#modalUpdateEvent #repetition #dateFin").val();
				
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
								 modifierEvent(id,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin);
							}
						}else{
							//code modification pour repetition 1
							 modifierEvent(id,nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin);
							
							
						}
					}
				}
				
			});
			
			
			
			
			
			//suppresion event 
			$("#modalUpdateEvent #supprimer").click(function(){
				swal({
					title: "Etes- vous Sur?",
					text: "Si vous le supprimer , on ne peut pas le recuperer?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$("#modalUpdateEvent").modal("hide"); 
						supprimerEvent(id);
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
			viderModalAddEvent();
           
            $("#modalAddEvent #heureDeb").val($.fullCalendar.formatDate(start,"HH:mm:ss"));
            $("#modalAddEvent #heureFin").val($.fullCalendar.formatDate(end,"HH:mm:ss"));
            $("#modalAddEvent #date").val($.fullCalendar.formatDate(end, "YYYY-MM-DD"));
            $("#modalAddEvent").modal("show");
           
            
            //recuperer les informations sur le modal//
            
			
			
			//calendar.fullCalendar('unselect');
			$('#modalAddEvent').on('hidden.bs.modal', function () {
				$(this).find('form').trigger('reset');
				//$('#modalAddEvent *').unbind();
				//document.location.reload();
			});
			
			
        },
		eventRender:function(event,element,view){
			element.find('.fc-title').append(
				"<div class='hr-line-solid-no-margin'></div><span style='font-size: 10px'>"+event.libelleP+" "+event.codeNiv+ "</span><br><span style='font-size: 10px'><u>matiere</u> :"+event.libelleMat+"</span><br><span style='font-size: 10px'><u>Lieu</u> : "+event.lieu+"</span><br><span style='font-size: 10px'><u>Repetition</u> :"+event.repetition+"</span></div>");
			
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

eventMouseover: function(calEvent, jsEvent) {
    $('.swlFlyout').css('z-index', 7000);
    $(this).flyout({
		title:'Nom de l\'evenement :'+calEvent.title,
		content: '<i style="color:green;text-decoration:underline">Matiere:</i>'+calEvent.libelleMat+'<br><i style="color:green;text-decoration:underline">Niveau:</i>'+calEvent.codeNiv+'<br><i style="color:green;text-decoration:underline">Parcours:</i>'+calEvent.libelleP+'<br><i style="color:green;text-decoration:underline">Salle et Lieu:</i>'+calEvent.lieu,
		placement: 'left',
		html: true,
		trigger: 'manual'
	}).mouseover(function() {
		$(this).flyout('show');
	}).mouseout(function() {
		$(this).flyout('hide');
	});
},

eventMouseout: function(calEvent, jsEvent) {
    $('.swlFlyout').remove();
},


		events: 'liste.php',
    });
	//code pour hide modal
	
	$('#modalUpdateEvent').on('hidden.bs.modal', function () {
		viderModalUpdateEvent();
	});
	
	
	//calendrier pour voir les Evenement de chaque  enseignant dans un parcours,dans un niveau
	var calendrierEn=$("#calendarEn").fullCalendar({
		locale:'fr',
        header:
        {
            left:'prev,next,today',
            center:'title',
            right:'month,agendaWeek,agendaDay,list',
        },
        defaultView:'month',
        selectable:false,
        weekly:true,
        minTime:'06:00:00',
        maxTime:'18:30:00',
        allDaySlot:false,
        navLinks:true,
        editable:false,
		slotLabelFormat:"HH:mm",
        disableDragging: false,
        disableResizing:false,
		eventRender:function(event,element,view){
			element.find('.fc-title').append(
				"<div class='hr-line-solid-no-margin'></div><span style='font-size: 13px'><u>Nom de l'enseignant</u>  : "+event.nom+ "</span><br><span style='font-size: 13px'><u>matiere</u> :"+event.libelleMat+"</span><br><span style='font-size: 13px'><u>Lieu</u> : "+event.lieu+"</span><br><span style='font-size: 13px'><u>Repetition</u> :"+event.repetition+"</span></div>");
			var theDate=event.start;
            var endDate=new Date(event.dowend);
            var startDate=new Date(event.dowstart);
            
            if(theDate >=endDate){
                return false;
            }
            if(theDate<=startDate){
                return false;
            }
		}
			
	});
	
	
	 $("#modalAddEvent #enregistrer").click(function(){
				 
				var heureDeb=$("#modalAddEvent #heureDeb").val();
				var heureFin =  $("#modalAddEvent #heureFin").val();
				var daty=  $("#modalAddEvent #date").val();
                var nomEvenement=$("#modalAddEvent #nomEvenement").val();
                var matiere=$("#modalAddEvent #matiere").val();
                var lieu=$("#modalAddEvent #lieu").val();
                var repetition=$("#modalAddEvent input[name=repetition]:checked").val();
				var type=$("#modalAddEvent input[name=type]:checked").val();
                var dateDeb,dateFin;
				var parcours="",niveau="";
                /* var daty=moment(debut);
                 var day=daty.day();*/
               
			   
			   if(type=="pourL1"){
				    parcours=$("#modalAddEvent #pourL1 option:selected").val();
					niveau="L1";
			   }else if(type=="autre"){
				   parcours=$("#modalAddEvent #parcours option:selected").val();
				   niveau=$("#modalAddEvent #niveau option:selected").val();
			   }
			if(parcours=="" && niveau==""){
				swal({
                           title:"",
                           text:"Veuillez choisir si L1 ou Autre!",
                           icon:"error",
                 }); 
			}else{
                if (nomEvenement=="" || matiere=="" || lieu=="" || heureDeb==""  || heureFin=="" || daty =="" ){
                       swal({
                           title:"",
                           text:"Il y a quelque champ invalide!",
                           icon:"error",
                       }); 
                }else{
                   if(repetition==7){
                        
                       dateDeb=$("#modalAddEvent #dateDeb").val();//maka ni daty eo @ modal
                        dateFin=$("#modalAddEvent #dateFin").val();//maka ni daty eo @ modal
                      
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
									ajoutEvent(nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin);
									}else{
										swal({
                                        title:"",
                                        text:"votre heure debut est plus grand que heure Fin!",
                                        icon:"error",
                                    }); 
									}
									$("#modalAddEvent").modal("hide");
                                }
                            }
                       }    
                    }else if(repetition==1){   
						dateDeb="";dateFin="";
						if(heureDeb<heureFin){
									ajoutEvent(nomEvenement,parcours,niveau,matiere,lieu,repetition,daty,heureDeb,heureFin,dateDeb,dateFin);
						}else{
										swal({
                                        title:"",
                                        text:"votre heure debut est plus grand que heure Fin!",
                                        icon:"error",
                                    }); 
						}
						 $("#modalAddEvent").modal("hide");
						
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
