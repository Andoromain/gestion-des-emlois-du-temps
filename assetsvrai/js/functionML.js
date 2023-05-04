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

function envoyerReqMatiere(url,mot){
  	var requeteHttp=getRequete();
  	if(requeteHttp==null)
  	{
  		alert("on ne peut pas utiliser Ajax sur ce navigateur!");
  	}
  	else
  	{
  		if(mot=="" )
  		{
  			//document.getElementById('select').style.visibility='hidden';
  		}
  		else
  		{
  		requeteHttp.open("POST",url,true);
  		requeteHttp.onreadystatechange=function(){recevoirReqMatiere(requeteHttp);}
  		requeteHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
  		requeteHttp.send("mot="+escape(mot));
  		}
  	}

  return;
}

function recevoirReqMatiere(requeteHttp){
	if(requeteHttp.readyState==4)
	{
		if(requeteHttp.status==200)
		{
			traiterReqMatiere(requeteHttp.responseText);
		}
	}
}
function traiterReqMatiere(reponse){

	if(reponse=="")
	{
		//alert('pas d\'annee');
	}
	else{
		var nb,selectMot,rep,i;
		rep=reponse.split("/");
    selectMot=document.getElementById('dataMatiere');
    nb=rep.length;
  	selectMot.length=nb;
    for(i=0;i<nb;i++)
  	{
  		selectMot.options[i].text=rep[i];
  	}
	}

}
