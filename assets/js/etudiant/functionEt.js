function showET(niveau,parcours){
	if(parcours=="MED"){
		$("#parcours").text("MEDECINE ");
	}
	if(parcours=="TCL"){
		$("#parcours").text("TECHNICIEN DE LABORATOIRE");
	}
	if(parcours=="SGF"){
		$("#parcours").text("SAGE FEMME");
	}
	if(parcours=="INF"){
		$("#parcours").text("INFIRMERIE");
	}
	if(parcours=="MEDSp"){
		$("#parcours").text("MEDECINE HUMAINE Specifique");
	}
	if(parcours=="PMED"){
		$("#parcours").text("PACES MEDECINE");
	}
	if(parcours=="ODOSp"){
		$("#parcours").text("ODONTO STOMATO Specifique");
	}
	if(parcours=="PPAR"){
		$("#parcours").text("PACES PARAMED");
	}
	if(parcours=="INFSp"){
		$("#parcours").text("INFIRMERIE Specifique");
	}
	if(parcours=="MRSp"){
		$("#parcours").text("MANIP RADIO Specifique");
	}
	if(parcours=="TCLSp"){
		$("#parcours").text("TECH LAB Specifique");
	}
	if(parcours=="SGFSp"){
		$("#parcours").text("SAGE FEMME Specifique");
	}
	if(parcours=="MASSp"){
		$("#parcours").text("MASSOKINE Specifique");
	}
	if(parcours=="ANESp"){
		$("#parcours").text("ANESTHESIE Specifique");
	}
	
	$("#niveau").text(niveau);
	$("#timetable").fullCalendar( 'addEventSource', 'listeET.php?parcours='+parcours+'&niveau='+niveau+'');
}

