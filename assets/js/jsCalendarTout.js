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

function envoyerReqNomEn(url){

	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("On ne peut pas utiliser Ajax sur ce navigateur");	
		}
		else
		{
			requeteHttp.open("GET",url,true);
			requeteHttp.onreadystatechange=function(){recevoirReqNomEn(requeteHttp);}
			requeteHttp.send(null);
		}
}

function recevoirReqNomEn(requeteHttp){
	
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReqNomEn(requeteHttp.responseText);
		}
	}	
}
function traiterReqNomEn(reponse){
	
	if(reponse=="")
	{
		//alert('pas d\'annee');
	}
	else{
		var nb,select,rep,i,select2;
		rep=reponse.split("/");
		select=document.getElementById('matriculeEnAddTout');
		select2=document.getElementById('matriculeEnUpdateTout');
		nb=rep.length;
		select.length=nb;
		select2.length=nb;
		
		for(i=0;i<nb;i++)
		{
			select.options[i].text=rep[i];
			select2.options[i].text=rep[i];
		}
	}

}

function envoyerReqMailEn(url){
	var requeteHttp=getRequete();
		if(requeteHttp==null)
		{
			alert("On ne peut pas utiliser Ajax sur ce navigateur");	
		}
		else
		{
			requeteHttp.open("GET",url,true);
			requeteHttp.onreadystatechange=function(){recevoirReqMailEn(requeteHttp);}
			requeteHttp.send(null);
		}
}

function recevoirReqMailEn(requeteHttp){
	
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReqMailEn(requeteHttp.responseText);
		}
	}	
}
function traiterReqMailEn(reponse){
	if(reponse=="")
	{
		//alert('pas d\'annee');
	}
	else{
		var nb,select,rep,i,select2;
		rep=reponse.split("/");
		select=document.getElementById('matriculeEnAddTout');
		select2=document.getElementById('matriculeEnUpdateTout');
		nb=select.length;
		
		//select.length=nb;
		//select2.length=nb;
		
		for(i=0;i<nb;i++)
		{
			select.options[i].value=rep[i];
			select2.options[i].value=rep[i];
		}
	}

}
