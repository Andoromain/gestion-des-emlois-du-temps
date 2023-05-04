<?php
  require("../modele.php");
  $requete=nombreEtudiant();
  $data=array();
  $label=array();
	while($row=$requete->fetch()){
		$data[]= $row["nombreEtudiant"];
    $label[]=$row["CODENIV"];
	}
 ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <script src="../assets/Chart.js"></script>
<head>
<body>
  <div style="width:45vw;height:auto;float:left;display:inline;position:relative"><canvas  id="canvasPie" </canvas></div>
  <div style="width:45vw;height:auto;display:flex"><canvas  id="canvasHisto" </canvas></div>
  <script type="text/javascript">
    var ctx=document.getElementById('canvasPie').getContext('2d');
    var chart=new Chart(ctx,{
      type:'pie',
      data:{
        labels:<?php echo json_encode($label); ?>,
        datasets:[{
          label:"premier",
          backgroundColor:["red","blue","green","yellow","violet","#ccc","orange","white"],
          borderColor:'#ccd',
          data:<?php echo json_encode($data); ?>,
        }]
      },
      options:{
        legend: {
          display: true ,
          position : "left"
        },
				title: {
							fontSize:'18',
							display: true,
							text: ' Graphe de nombre des etudiants de cette annee scolaire!'
						},
      }
    });
    var ctx1=document.getElementById('canvasHisto').getContext('2d');
    var chart1=new Chart(ctx1,{
      type:'bar',
      data:{
        labels:<?php echo json_encode($label); ?>,
        datasets:[{
          label:<?php echo json_encode($label); ?>,
          backgroundColor:["red","blue","green","yellow","violet","#ccc","orange","white"],
          borderColor:'#ccd',
          data:<?php echo json_encode($data); ?>,
        }]
      },
      options:{
        legend: {
          display: true ,
          position : "left"
        },
				title: {
							fontSize:'18',
							display: true,
							text: ' Graphe de nombre des etudiants de cette annee scolaire!'
						},
      }
    });
</script>
</body>
</html>
