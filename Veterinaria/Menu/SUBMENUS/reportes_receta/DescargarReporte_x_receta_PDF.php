<?php
require_once('tcpdf/tcpdf.php'); //Llamando a la Libreria TCPDF
require_once('../../../conexion.php'); //Llamando a la conexión para BD
date_default_timezone_set('America/Mexico_City');


ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF{
      
    	public function Header() {
            $bMargin = $this->getBreakMargin();
            $auto_page_break = $this->AutoPageBreak;
            $this->SetAutoPageBreak(false, 0);
            $img_file = dirname( __FILE__ ) .'/assets/img/veterinaria.jpeg';
            $this->Image($img_file, 115, 10, 60 /*anchura*/, 60 /*altura*/, '', '', '', false, 50, '', false, false, 0);
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            $this->setPageMark();
	    }
}


//Iniciando un nuevo pdf
$pdf = new MYPDF('L', 'mm', 'Letter', true, 'UTF-8', false);



//Establecer margenes del PDF
$pdf->SetMargins(20, 35, 25);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(true); //Eliminar la linea superior del PDF por defecto
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM); //Activa o desactiva el modo de salto de página automático
 
//Informacion del PDF
$pdf->SetCreator('');
$pdf->SetAuthor('');
$pdf->SetTitle('Informe');
 
/** Eje de Coordenadas
 *          Y
 *          -
 *          - 
 *          -
 *  X ------------- X
 *          -
 *          -
 *          -
 *          Y
 * 
 * $pdf->SetXY(X, Y);
 */

//Agregando la primera página
$pdf->AddPage();
$pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
$pdf->SetXY(230, 20);
$pdf->Write(0, 'ALFA');
$pdf->SetXY(230, 25);
$pdf->Write(0, 'Fecha: '. date('d-m-Y'));
$pdf->SetXY(230, 30);
$pdf->Write(0, 'Hora: '. date('h:i A'));

$canal ='VETERINARIA';
$pdf->SetFont('helvetica','B',14); //Tipo de fuente y tamaño de letra
$pdf->SetXY(30, 20); //Margen en X y en Y
$pdf->SetTextColor(255,0,0);
$pdf->Write(0, 'ALFA');
$pdf->SetTextColor(255, 102, 102); //Color Negrita
$pdf->SetXY(30, 25);
$pdf->Write(0, ''. $canal);



$pdf->Ln(40); //Salto de Linea
$pdf->Cell(36,26,'',0,0,'C');
/*$pdf->SetDrawColor(50, 0, 0, 0);
$pdf->SetFillColor(100, 0, 0, 0); */
$pdf->SetTextColor(0,0,0);
//$pdf->SetTextColor(255,204,0); //Amarillo
//$pdf->SetTextColor(34,68,136); //Azul
//$pdf->SetTextColor(153,204,0); //Verde
//$pdf->SetTextColor(204,0,0); //Marron
//$pdf->SetTextColor(245,245,205); //Gris claro
//$pdf->SetTextColor(100, 0, 0); //Color Carne
$pdf->SetFont('helvetica','B', 15); 
$pdf->Cell(185,6,'RECETA',0,0,'C');


$pdf->Ln(20); //Salto de Linea
$pdf->SetTextColor(0, 0, 0); 



//inicia la tabla aqui------------------------------------------------------------------



//Configuración inicial
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('helvetica','B',12); //La B es para letras en Negritas

// Cabecera de la primera fila
$pdf->Cell(64.25,6,'Num receta',1,0,'C',1);
$pdf->Cell(64.25,6,'codigo paciente',1,0,'C',1);
$pdf->Cell(64.25,6,'id dueño',1,0,'C',1);
$pdf->Cell(64.25,6,'id medico',1,1,'C',1); // El '1' al final indica que se va a una nueva línea después de esta celda

$pdf->SetFont('helvetica','',10);

// SQL para obtener el diagnóstico específico
$numDiagnostico = $_POST['Num_receta'];

$sqlDiagnostico = "SELECT * FROM receta WHERE Num_receta = '$numDiagnostico' ORDER BY Num_receta ASC";
$query = mysqli_query($conexion, $sqlDiagnostico);

while ($dataRow = mysqli_fetch_array($query)) {
    // Primera fila con los datos principales
    $pdf->Cell(64.25,10,($dataRow['Num_receta']),1,0,'C');
    $pdf->Cell(64.25,10,($dataRow['P_codigo']),1,0,'C');
    $pdf->Cell(64.25,10,($dataRow['id_dueño']),1,0,'C');
    $pdf->Cell(64.25,10,($dataRow['id_medico']),1,1,'C'); // Nueva línea después de esta celda



    // Segunda fila para "Padecimiento"
    $pdf->SetFont('helvetica','B',12); // Cambia la fuente a negritas
    $pdf->Cell(37,20,'Medicamento',1,0,'C',1); // Cabecera
    $pdf->SetFont('helvetica','',10); // Cambia la fuente a normal
    $pdf->Cell(220,20,($dataRow['Medicamentos']),1,1,'L'); // Datos (181 = 35 + 20 + 23 + 103)



    $pdf->SetFont('helvetica','B',12); // Cambia la fuente a negritas
    // Tercera fila para "Sintomas"
    $pdf->Cell(37,20,'Tratamiento',1,0,'C',1); // Cabecera
    $pdf->SetFont('helvetica','',10); // Cambia la fuente a normal
    $pdf->Cell(220,20,($dataRow['Tratamiento']),1,1,'L'); // Datos

}


//termina la tabla aqui-----------------------------------------------------------

//$pdf->AddPage(); //Agregar nueva Pagina

$pdf->Output('Resumen_Pedido_'.date('d_m_y').'.pdf', 'I'); 
// Output funcion que recibe 2 parameros, el nombre del archivo, ver archivo o descargar,
// La D es para Forzar una descarga
