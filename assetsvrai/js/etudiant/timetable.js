$(document).ready(function(){
	var moi1=$.fullCalendar.moment().startOf('week').month();
	var moi=$.fullCalendar.moment().endOf('week').month();
	var jour=$.fullCalendar.moment().endOf('week').date();
	var jour1=$.fullCalendar.moment().startOf('week').date();
	var annee=$.fullCalendar.moment().endOf('week').year();
	var mois1,mois;
	if(moi==0){
		mois1="Janvier";
		mois="Janvier";
	}
	if(moi==1){
		mois1="Fevrier";
		mois="Fevrier";
	}
	if(moi==2){
		mois1="Mars";
		mois="Mars";
	}
	if(moi==3){
		mois1="Avril";
		mois="Avril";
	}
	if(moi==4){
		mois1="Mai";
		mois="Mai";
	}
	if(moi==5){
		mois1="Juin";
		mois="Juin";
	}
	if(moi==6){
		mois1="Juillet";
		mois="Juillet";
	}
	if(moi==7){
		mois1="Aout";
		mois="Aout";
	}
	if(moi==8){
		mois1="Septembre";
		mois="Septembre";
	}
	if(moi==9){
		mois1="Octobre";
		mois="Octobre";
	}
	if(moi==10){
		mois1="Novembre";
		mois="Novembre";
	}
	if(moi==11){
		mois1="Decembre";
		mois="Decembre";
	}
	$("#startDate").text("    "+jour1+" "+mois1+"   ")
	$("#finDate").text("    "+jour+" "+mois+"   ")
	$("#anneeJ").text(" "+annee);
	
    $("#timetable").fullCalendar({
        locale:'fr',
        header:
        {
            left:'prev,next,today',
            center:'',
            right:'',
        },
		columnFormat:'dddd D MMMM',
        defaultView:"agendaWeek",
        allDaySlot:false,
        disableDragging: false,
        disableResizing:false,
        minTime:'06:00:00',
        maxTime:'18:30:00',
		eventBackgroundColor:'black',
		eventTextColor :'white',
		eventBorderColor:"#ccc",
		contentHeight: 'auto',
        slotLabelFormat:"HH:mm",
		height: 1300,
		slotDuration: '00:15:00', // 2 hours
        editable:false,
        selectable:false,
        events:'listeET.php',
		eventRender:function(event,element,view){
			element.find('.fc-title').append(
				"<div class='hr-line-solid-no-margin'></div><span style='font-size: 15px'> par : Pr(Dr) "+event.nomEn+"</span><br><span style='font-size: 15px'><u>lieu</u> :<b>"+event.lieu+"</b></span></div>");
	},	
		eventMouseover: function(calEvent, jsEvent) {
    $('.swlFlyout').css('z-index', 7000);
    $(this).flyout({
		title:'Enseignant : (Mr ou Mme)'+calEvent.nomEn,
		content: ''+calEvent.title+'<br><i style="color:green;text-decoration:underline">Lieu:</i>'+calEvent.lieu,
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
		}
	});
	
	
	
});