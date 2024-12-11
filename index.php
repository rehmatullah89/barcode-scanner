<?
	require_once("barcode/barcode.php");
	require_once('barcode/fpdf.php');

			// Bar Code
			$sBarCodeFile = "File";
			$sBarCode     = "12345678";


			$objBarCode = new BARCODE( );
			$objPdf		= new FPDF('P', 'pt', array(108,72));
			
			$objPdf->AddPage();
			
			$objPdf->SetFont('Arial', '', 9);
			$objPdf->SetTextColor(0, 0, 0);
			
			$objBarCode->setSymblogy("CODE128");
			$objBarCode->setHeight(50);
			$objBarCode->setScale(0.08);
			$objBarCode->setHexColor("#000000", "#ffffff");
			$objBarCode->genBarCode($sBarCode, "jpg", $sBarCodeFile);

			$sBarCodeFile .= ".jpg";

			if (@file_exists($sBarCodeFile) && @filesize($sBarCodeFile) > 0)
				$objPdf->Image($sBarCodeFile, 5, 10, 100, 65);
			
			
			$objPdf->Text(30, 65, $sBarCode);

			 $objPdf->Output("Code.pdf", 'D');
			 
			 //@unlink($sBarCodeFile);
?>