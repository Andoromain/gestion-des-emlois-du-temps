<?php
	require('../fpdf/fpdf.php');
	if(isset($_GET["dateDeb"]) && isset($_GET["dateFin"])){
		$dateDeb=$_GET["dateDeb"]; 
		$dateFin=$_GET["dateFin"]; 
	$pdf=new FPDF("P",'mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Times','B');
	$pdf->Cell(180,5,'FACULTE DE MEDECINE FIANARANTSOA',0,1,'C');
	$pdf->Cell(180,5,'------------------',0,1,'C');
	$pdf->Cell(180,5,'Tel :034 99 244 64   ; E-mail : facmedfanar@gmail.com',0,1,'C');
	$pdf->SetFont('Times','BU');
	$pdf->Cell(180,25,'Statistique des heures d\'enseignement par chaque enseignant',0,1,'C');
	$pdf->Ln(3);
	$pdf->SetFont('Times','B');
	$pdf->Cell(60,10,'Matricule de l\'enseignant',1,0,'C');
	$pdf->Cell(60,10,'NOM de l\'enseignant',1,0,"C");
	$pdf->Cell(60,10,'Nombre d\'heure d\'enseignement',1,1,"C");
	$pdf->SetFont('Times','');
	require("../modele.php");
	$requete=listeStatistiqueEn($dateDeb,$dateFin);
	if($requete->rowCount()==0){
			$pdf->Cell(180,10,"Vide",1,1,"C");
	}else{
		while($res=$requete->fetch())
		{
			$pdf->Cell(60,7,$res["MATRICULEEN"],1,0,'C');
			$pdf->Cell(60,7,$res["NOMEN"],1,0,'C');
			$pdf->Cell(60,7,substr($res["nombre"],-8,2)." h et ".substr($res["nombre"],-5,2)." min",1,1,'C');
		}
	}
	$pdf->output('statistique'.date("d-m-y H:i").'.pdf','I');
	}
?>