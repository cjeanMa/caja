<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class fpdf_gen{
	public function __construct(){
		require_once APPPATH.'third_party/fpdf/CELLpdf.php';
		$fpdf = NEW FPDF('P', 'mm', 'A4');
		$fpdf->SetMargins(10,10,10,10);
		$fpdf->AddPage();
		$CI =& get_instance();
		$CI->fpdf = $fpdf;
	}
	function cabecera($posicion = 0)
    {
        $this->ln($posicion);
        $this->SetLineWidth(1);
        $this->SetFont('Arial','B',11);
        $this->image(base_url('public/iestp/img/logo.png'), 20, $posicion + 4, 20, 20);
        $this->image('img/minedu.jpg', 175,$posicion + 8,20, 14);
        $this->Cell(190,4,utf8_decode("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO"),0,0,'C');
        $this->Ln(4);
        $this->Cell(190,4,"ILAVE ",0,0,'C');
        $this->ln(4);
        
        $this->SetFont('Arial','B',7);
        $this->Cell(190,4,"OFICINA DE SECRETARIA ACADEMICA",0,0,'C');
        $this->SetFont('Arial','B',6);
        $this->ln(2);
        $this->Cell(190,4,utf8_decode("Panamericana Sur 4.5 km. Chillacollo - Ilave"),0,0,'C');
        $this->ln(4);
        $this->Cell(190,1,"","B",0,"C");
        $this->Ln(4);
        $this->SetLineWidth(0.1);
    }
    function cabecera_medio($posicion = 0)
    {
        $this->ln($posicion);
        $this->SetLineWidth(1);
        $this->SetFont('Arial','B',11);
        $this->image('img/logo.png', 20, $posicion + 139, 20, 20);
        $this->image('img/minedu.jpg', 175,$posicion + 143,20, 14);
        $this->setXY(20,155);
        $this->Cell(170,4,utf8_decode("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO"),0,0,'C');
        $this->Ln(4);
        $this->Cell(170,4,"ILAVE ",0,0,'C');
        $this->ln(4);
        
        $this->SetFont('Arial','B',7);
        $this->Cell(170,4,"OFICINA DE SECRETARIA ACADEMICA",0,0,'C');
        $this->SetFont('Arial','B',6);
        $this->ln(2);
        $this->Cell(170,4,utf8_decode("Panamericana Sur 4.5 km. Chillacollo - Ilave"),0,0,'C');
        $this->ln(4);
        $this->Cell(170,1,"","B",0,"C");
        $this->Ln(4);
        $this->SetLineWidth(0.2);
    }
    function cabecera_boleta($posicion = 0){
        $this->ln($posicion);
        $this->SetLineWidth(1);
        $this->SetFont('Arial','B',12);
        $this->image(base_url('public/iestp/img/logo.png'), 15, $posicion + 15, 20, 20);
    }

}
 ?>