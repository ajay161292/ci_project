<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// reference the Dompdf namespace
use Dompdf\Dompdf;
class Pdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
  	// instantiate and use the dompdf class
    $dompdf = new DOMPDF();
    
    $dompdf->load_html($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->set_paper($paper, $orientation);
    $dompdf->set_option('defaultFont', 'Courier');
    // Render the HTML as PDF
    $dompdf->render();
    if ($stream) {
    	// Output the generated PDF to Browser
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}