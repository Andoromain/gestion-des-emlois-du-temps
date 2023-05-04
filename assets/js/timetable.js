$(document).ready(function(){
    $("#timetable").fullCalendar({
        locale:'fr',
        header:
        {
            left:'',
            center:'',
            right:'',
        },
        defaultView:"agendaWeek",
        allDaySlot:false,
        disableDragging: false,
        disableResizing:false,
        minTime:'05:00:00',
        maxTime:'19:00:00',
        slotLabelFormat:"HH:mm",
        editable:false,
        selectable:false,
        events:'listeET.php',
		eventRender:function(event,element,view){
			element.find('.fc-title').append(
				"<div class='hr-line-solid-no-margin'></div><span style='font-size: 13px'> par : Mr/Mme "+event.nomEn+"</span><br><span style='font-size: 13px'><u>lieu</u> :"+event.lieu+"</span></div>");
		}
	});
});