function getRequete(){
	if(window.XMLHttpRequest)
	{
		return new XMLHttpRequest;
	}
	else
	{
		if(window.ActiveXObject)
		{
			try
			{
				return new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
				try
				{
					return new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e)
				{
					return null;
				}
			}
		}
	}
}

function envoyerReqAnneeUniv(url){
	viderModalET();
	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("On ne peut pas utiliser Ajax sur ce navigateur");	
		}
		else
		{
			requeteHttp.open("GET",url,true);
			requeteHttp.onreadystatechange=function(){recevoirReqAnneeUniv(requeteHttp);}
			requeteHttp.send(null);
		}
}

function recevoirReqAnneeUniv(requeteHttp){
	
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReqAnneeUniv(requeteHttp.responseText);
		}
	}	
}
function traiterReqAnneeUniv(reponse){
	
	if(reponse=="")
	{
		//alert('pas d\'annee');
	}
	else{
		var nb,select,rep,i,compteur=1,select2;
		rep=reponse.split("/");
		select=document.getElementById('anneeUnivAjout');
		select2=document.getElementById('anneeUnivModif');
		nb=rep.length;
		select.length=nb;
		select2.length=nb;
		
		for(i=0;i<nb;i++)
		{
			select.options[i].text=rep[i];
			select2.options[i].text=rep[i];
			select.options[i].value=compteur;
			select2.options[i].value=compteur;
			compteur=compteur+1;
		}
	}

}

//mivider anle modal
function viderModalET(){
	$("#modalAddET #dateDeb").val("");
	$("#modalModifierET #dateDeb").val("");
	$("#modalModifierET #dateFin").val("");
	$("#modalAddET #dateFin").val("");

}

//miapporer contenu @modalModifierET

function apporterModalModifET(dateDeb,dateFin,idUniv){
	$("#modalModifierET #dateDeb").val(dateDeb);
	$("#modalModifierET #dateFin").val(dateFin);
	$("#modalModifierET #anneeUnivModif option[value='"+idUniv+"']").prop("selected",true);
}

//misupprimer ET

function supprimerET(dateDeb,dateFin,idUniv){
        swal({
			title: "Etes- vous Sur?",
			text: "Si vous le supprimer , on ne peut pas le recuperer?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				
				$.ajax({
					type:'POST',
					url:'supprimerET.php',
					data:"dateDeb="+dateDeb+"&dateFin="+dateFin+"&idUniv="+idUniv,
					success:function(msg){
						swal({
							title: "",
							text: msg,
							icon: "success",
						}).then((willDelete) => {
							if (willDelete){
								document.location.reload();
							};
						});			
					},
					error:function(){
						swal({
								title: "",
								text: "On ne peut pas connecter au serveur pour le moment!!",
								icon: "error",
						}).then((willDelete) => {
							if (willDelete){
								document.location.reload();
							};
						});
					}
				});
			};
		});
}