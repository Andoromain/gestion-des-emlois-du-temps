<?php
	header('Content-Type: text/html; charset=UTF-8');
	require_once('../PHPExcel/Classes/PHPExcel.php');
	require("../modele.php");
	$connect=connection1();
	
	if(isset($_POST["upload"])){
		$niveau=$_POST["niveau"];
		$parcours=$_POST["parcours"];
		
		$file=$_FILES["fichier"]["tmp_name"];
		if(!empty($file)){
		try {
			$inputFileType = PHPExcel_IOFactory::identify($file);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($file);
		} catch(Exception $e) {
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);

		$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();

foreach($rowIterator as $row) {
	$cellIterator = $row->getCellIterator();
	// Loop all cells, even if it is not set
	$cellIterator->setIterateOnlyExistingCells(false);
	$rowIndex = $row->getRowIndex ();
	if($rowIndex!=1){
	$array_data[$rowIndex] = array('A'=>'', 'B'=>'','C'=>'','D'=>'');
	
	foreach ($cellIterator as $cell) {

		if('A' == $cell->getColumn()) {
			$array_data[$rowIndex][$cell->getColumn()] = $cell->getValue();
		} else if('B' == $cell->getColumn()) {
			$array_data[$rowIndex][$cell->getColumn()] = $cell->getValue();
		} else if('C' == $cell->getColumn()) {
			$array_data[$rowIndex][$cell->getColumn()] = $cell->getValue();
		} else if('D' == $cell->getColumn()) {
			$array_data[$rowIndex][$cell->getColumn()] =  PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD');
		}
		$sql = $connect->prepare('INSERT INTO `verifieretudiant`(`NumEt`, `NomEt`, `PrenomEt`, `Datenais`, `Niveau`, `Parcours`) VALUES (:a,:b,:c,:d,:e,:f)'); 
		$sql->bindParam(":a",$array_data[$rowIndex]["A"],PDO::PARAM_STR);
		$sql->bindParam(":b",$array_data[$rowIndex]["B"],PDO::PARAM_STR);
		$sql->bindParam(":c",$array_data[$rowIndex]["C"],PDO::PARAM_STR);
		$sql->bindParam(":d",$array_data[$rowIndex]["D"],PDO::PARAM_STR);
		$sql->bindParam(":e",$niveau,PDO::PARAM_STR);
		$sql->bindParam(":f",$parcours,PDO::PARAM_STR);
	}
	$sql->execute();
	}
}
	$resultat="Les étudiants sont enregistrés avec succes!";
	}else{
		$error="Veuillez selectioner un fichier Excel!!";
	}
}
?>