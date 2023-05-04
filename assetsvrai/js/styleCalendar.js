$(document).ready(function(){
    $("#modalAddEvent #repeatSemaine").click(function(){
        $("#modalAddEvent #repetition").removeClass("d-none");
       $("#modalAddEvent #repetition").slideDown("slow");
   });
    $("#modalAddEvent #uneseulefois").click(function(){
       $("#modalAddEvent #repetition").slideUp("slow");
         $("#modalAddEvent #repetition").addClass("d-none");
   });
   $("#modalUpdateEvent #repeatSemaine").click(function(){
        $("#modalUpdateEvent #repetition").removeClass("d-none");
       $("#modaUpdateEvent #repetition").slideDown("slow");
   });
    $("#modalUpdateEvent #uneseulefois").click(function(){
       $("#modalUpdateEvent #repetition").slideUp("slow");
         $("#modalUpdateEvent #repetition").addClass("d-none");
   });


   $("#modalAddEventTout #repeatSemaineTout").click(function(){
        $("#modalAddEventTout #repetitionTout").removeClass("d-none");
       $("#modalAddEventTout #repetitionTout").slideDown("slow");
   });
    $("#modalAddEventTout #uneseulefoisTout").click(function(){
       $("#modalAddEventTout #repetitionTout").slideUp("slow");
         $("#modalAddEventTout #repetitionTout").addClass("d-none");
   });
   $("#modalUpdateEventTout #repeatSemaineTout").click(function(){
        $("#modalUpdateEventTout #repetitionTout").removeClass("d-none");
       $("#modaUpdateEventTout #repetitionTout").slideDown("slow");
   });
    $("#modalUpdateEventTout #uneseulefoisTout").click(function(){
       $("#modalUpdateEventTout #repetitionTout").slideUp("slow");
         $("#modalUpdateEventTout #repetitionTout").addClass("d-none");
   });

	$("#search").click(function(){
    var type=$("input[name=type1]:checked").val();
    if(type=="L1manokana"){
      var parcours=$("#L1manokana option:selected").val();
  		var parcoursSpan=$("#L1manokana option:selected").text();
      var niveau="L1 ";
      var niveauSpan="L1 ";
    }else{
		    var parcours=$("#parcoursSearch option:selected").val();
		    var parcoursSpan=$("#parcoursSearch option:selected").text();
        var niveau=$("#niveauSearch option:selected").val();
        var niveauSpan=$("#niveauSearch option:selected").text();
      }
		$("#niveauSpan").text(niveauSpan);
		$("#parcoursSpan").text(parcoursSpan);

		$('#calendarEn').fullCalendar('removeEvents');
		$("#calendarEn").fullCalendar( 'addEventSource', 'liste.php?parcours='+parcours+'&niveau='+niveau+'');
	});

	
	$("#searchTout").click(function(){
		 var type=$("input[name=type1]:checked").val();
		if(type=="L1manokana"){
			var parcours=$("#L1manokana option:selected").val();
			var parcoursSpan=$("#L1manokana option:selected").text();
			var niveau="L1";
			var niveauSpan="L1   ";
		}else{
		    var parcours=$("#parcoursSearchTout option:selected").val();
		    var parcoursSpan=$("#parcoursSearchTout option:selected").text();
			var niveau=$("#niveauSearchTout option:selected").val();
			var niveauSpan=$("#niveauSearchTout option:selected").text();
		}
		document.location.href="pageEvenementEn.php?niveau="+niveau+"&parcours="+parcours+"";
		
	});
});
function lister(niveau,parcours){
	if(parcours=="MED"){
		$("#parcoursSpanTout").text("MEDECINE ");
	}
	if(parcours=="TCL"){
		$("#parcoursSpanTout").text("TECHNICIEN DE LABORATOIRE");
	}
	if(parcours=="SGF"){
		$("#parcoursSpanTout").text("SAGE FEMME");
	}
	if(parcours=="INF"){
		$("#parcoursSpanTout").text("INFIRMERIE");
	}
	if(parcours=="MEDSp"){
		$("#parcoursSpanTout").text("MEDECINE HUMAINE Specifique");
	}
	if(parcours=="PMED"){
		$("#parcoursSpanTout").text("PACES MEDECINE");
	}
	if(parcours=="ODOSp"){
		$("#parcoursSpanTout").text("ODONTO STOMATO Specifique");
	}
	if(parcours=="PPAR"){
		$("#parcoursSpanTout").text("PACES PARAMED");
	}
	if(parcours=="INFSp"){
		$("#parcoursSpanTout").text("INFIRMERIE Specifique");
	}
	if(parcours=="MRSp"){
		$("#parcoursSpanTout").text("MANIP RADIO Specifique");
	}
	if(parcours=="TCLSp"){
		$("#parcoursSpanTout").text("TECH LAB Specifique");
	}
	if(parcours=="SGFSp"){
		$("#parcoursSpanTout").text("SAGE FEMME Specifique");
	}
	if(parcours=="MASSp"){
		$("#parcoursSpanTout").text("MASSOKINE Specifique");
	}
	if(parcours=="ANESp"){
		$("#parcoursSpanTout").text("ANESTHESIE Specifique");
	}
	
	$("#L1manokana option[value='"+parcours+"']").prop("selected",true);
	$("#pourL1 option[value='"+parcours+"']").prop("selected",true);
	//$("#pourL1 ").prop("selected",true);
	$("#parcoursSearchTout option[value='"+parcours+"']").prop("selected",true);
	$("#parcoursTout option[value='"+parcours+"']").prop("selected",true);
	$("#niveauTout option[value='"+niveau+"']").prop("selected",true);
	$("#niveauSearchTout option[value='"+niveau+"']").prop("selected",true);
	$("#niveauSpanTout").text(niveau);
	$("#calendarTout").fullCalendar( 'addEventSource', 'listeTout.php?parcours='+parcours+'&niveau='+niveau+'');
	
}
