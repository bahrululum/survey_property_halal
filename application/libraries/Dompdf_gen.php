<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
class Dompdf_gen {
  public function __construct(){
    $pdf = new DOMPDF();
    $CI = & get_instance();
    $CI ->dompdf = $pdf;
  }
}
