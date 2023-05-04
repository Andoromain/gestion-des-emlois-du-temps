function supprimerActu(id){
	swal({
            title: "Etes- vous Sur?",
            text: "Si vous le supprimer la publication, on ne peut pas le recuperer?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
				$.ajax({
                    type:"POST",
                    url:"suppressionActu.php",
                    data:"id="+id,
                    success:function(msg){
                        swal({
                            title:"",
                            text:msg,
					        icon: "success",
                        }).then((vrai)=>{
				            if(vrai){
					         document.location.reload();
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
        });
}

$("#form #annuler").click(function(){
	document.location.reload();
});
