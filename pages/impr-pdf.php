<?php
	function generateRow(){
		$contents = '';
		include_once('../config/con-bd.php');
		$sql = "SELECT * FROM registros ORDER BY term_ced asc";

		$query = $conn->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
               <td>".$row['nom_ape']."</td>
               <td>".$row['cedula']."</td>
               <td>".$row['term_ced']."</td>
			</tr>
			";
		}
	
		return $contents;
	}

	require_once('../plugins/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Secretaría de Salud del Estado Zulia | Lista Registros");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(true);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
          <img src="../assets/img/img-logo.png" alt="Logo">
          <h2 align="center">Lista de Registros</h2>
      	  <table border="1" cellspacing="0" cellpadding="3" style="text-align:center;">  
             <tr style="background-color:#ebebe0;font-weight:bold">  
                 <th width="40%">Nombre y Apellido</th>
                 <th width="30%">Cédula</th>	 
                 <th width="30%">Terminal de Cédula</th>
             </tr>  
        ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('lista_registros.pdf', 'I');
	
?>