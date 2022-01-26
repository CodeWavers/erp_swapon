<?php
defined('BASEPATH') or exit('No direct script access allowed');

define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once("./vendor/dompdf/autoload.inc.php");

class Pdfgenerator
{

  public function generate($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->set('isRemoteEnabled', TRUE);
    $dompdf->set_base_path(base_url());
    $dompdf->render();
    if ($stream) {
      $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    } else {
      return $dompdf->output();
    }
  }
}
