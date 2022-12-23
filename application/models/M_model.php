<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function _get_datatables_query($query, $column_order, $column_search, $order) {
    
    // $this->db->from($query);

	    $i = 0;
	 
	    foreach ($column_search as $item) // loop column 
	    {
	        if(isset($_POST['search']['value'])) {
	             
	            if ($i===0) {
	                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
	                $this->db->like($item, $_POST['search']['value']);
	            } else {
	                $this->db->or_like($item, $_POST['search']['value']);
	            }

	            if(count($column_search) - 1 == $i) //last loop
	                $this->db->group_end(); //close bracket
	        }
	        $i++;
	    }
	     
	    if(isset($_POST['order'])) {
	        $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	    } else if (isset($order)) {
	        $this->db->order_by(key($order), $order[key($order)]);
	    }
	  }
	function get_datatables($query, $column_order, $column_search, $order) {
      $this->_get_datatables_query($query, $column_order, $column_search, $order);
      if($_POST['length'] != -1)
      $clone = clone $query;
      $this->db->limit($_POST['length'], $_POST['start']);
      $data['result'] = $query->get()->result();
      $data['count_filtered'] = $clone->get()->num_rows();
      return $data;
	}

	public function count_all($query)
    {
      return $query->count_all_results();
    }

	function hsave($table,$data,$kode,$status,$pk){
		if($status=='2'){
			$this->db->where($pk, $kode);
			$this->db->update($table, $data);
			return true;
		}else{
			$this->db->insert($table, $data);
			return true;
		}
	}
	function get_edit($id,$pk,$table){
        $q = $this->db->query("select * from $table where $pk = '$id'");
		return $q->result();
	}

	function hapus($tabel,$field,$value){
        $del_item = $this->db->query("delete from $tabel where $field='$value'");
        return '1';
  	}
  	
  	function rev_date($tgl){
		$t=explode("/",$tgl);
		$tanggal  =  $t[0];
		$bulan    =  $t[1];
		$tahun    =  $t[2];
		return  $tahun.'-'.$bulan.'-'.$tanggal;
	}
	function rev_date2($tgl){
		$t=explode("-",$tgl);
		$tanggal  =  $t[2];
		$bulan    =  $t[1];
		$tahun    =  $t[0];
		return  $tanggal.'/'.$bulan.'/'.$tahun;
	}
	function rev_date3($tgl){
		$t=explode("-",$tgl);
		$tanggal  =  $t[2];
		$bulan    =  $t[1];
		$tahun    =  $t[0];
		Switch ($bulan){
		    case 1 : $bulan="Januari";
		        Break;
		    case 2 : $bulan="Februari";
		        Break;
		    case 3 : $bulan="Maret";
		        Break;
		    case 4 : $bulan="April";
		        Break;
		    case 5 : $bulan="Mei";
		        Break;
		    case 6 : $bulan="Juni";
		        Break;
		    case 7 : $bulan="Juli";
		        Break;
		    case 8 : $bulan="Agustus";
		        Break;
		    case 9 : $bulan="September";
		        Break;
		    case 10 : $bulan="Oktober";
		        Break;
		    case 11 : $bulan="November";
		        Break;
		    case 12 : $bulan="Desember";
		        Break;
		}
		return  $tanggal.' '.$bulan.' '.$tahun;
	}
	function rev_date4($tgl){
		$t=explode("-",$tgl);
		$tanggal  =  $t[2];
		$bulan    =  $t[1];
		$tahun    =  $t[0];
		Switch ($bulan){
		    case 1 : $bulan="JAN";
		        Break;
		    case 2 : $bulan="FEB";
		        Break;
		    case 3 : $bulan="MAR";
		        Break;
		    case 4 : $bulan="APR";
		        Break;
		    case 5 : $bulan="MEI";
		        Break;
		    case 6 : $bulan="JUN";
		        Break;
		    case 7 : $bulan="JUL";
		        Break;
		    case 8 : $bulan="AGT";
		        Break;
		    case 9 : $bulan="SEP";
		        Break;
		    case 10 : $bulan="OKT";
		        Break;
		    case 11 : $bulan="NOV";
		        Break;
		    case 12 : $bulan="DES";
		        Break;
		}
		return  $tanggal.' '.$bulan;
	}
	function maxNomor($tabel,$field,$digit){
		$query = $this->db->query("select lpad(ifnull(max($field)+1,1),$digit,0) as maxNo from $tabel");
		return $query->result();
	}
	function maxNomor2($tabel,$field,$digit,$field2,$kode){
		$query = $this->db->query("select lpad(ifnull(max($field)+1,1),$digit,0) as maxNo from $tabel where $field2='$kode'");
		return $query->result();
	}
	function _mpdf($judul='',$isi='',$lMargin='',$rMargin='',$font=0,$orientasi='') {
        
        //ini_set("memory_limit","512M");
		ini_set('memory_limit', -1);
		ini_set('max_execution_time', -1);
        $this->load->library('mpdf');
        
        /*
        $this->mpdf->progbar_altHTML = '<html><body>
	                                    <div style="margin-top: 5em; text-align: center; font-family: Verdana; font-size: 12px;"><img style="vertical-align: middle" src="'.base_url().'images/loading.gif" /> Creating PDF file. Please wait...</div>';        
        $this->mpdf->StartProgressBarOutput();
        */
        
        $this->mpdf->defaultheaderfontsize = 6;	/* in pts */
        $this->mpdf->defaultheaderfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultheaderline = 1; 	/* 1 to include line below header/above footer */

        $this->mpdf->defaultfooterfontsize = 6;	/* in pts */
        $this->mpdf->defaultfooterfontstyle = B;	/* blank, B, I, or BI */
        $this->mpdf->defaultfooterline = 0; 
        $this->mpdf->SetLeftMargin = $lMargin;
        $this->mpdf->SetRightMargin = $rMargin;
        //$this->mpdf->SetHeader('SIMAKDA||');
        $jam = date("H:i:s");
        //$this->mpdf->SetFooter('Printed on @ {DATE j-m-Y H:i:s} |Simakda| Page {PAGENO} of {nb}');
        $hari_ini = date("Y-m-d H:i:s");
        $this->mpdf->SetFooter('KRS Online Prodi Pendidikan Teknologi Informasi - (STKIP) Muhammadiyah Sorong - '.$hari_ini);
        
        $this->mpdf->AddPage($orientasi,'','','','',$lMargin,$rMargin);
        
        if (!empty($judul)) $this->mpdf->writeHTML($judul);
        $this->mpdf->writeHTML($isi);         
        $this->mpdf->Output();
               
    }
    function  tanggal_format_indonesia($tgl){   
        $tanggal  = explode('-',$tgl); 
        $bulan  = $this-> getBulan($tanggal[1]);
        $tahun  =  $tanggal[0];
        return  $tanggal[2].' '.$bulan.' '.$tahun;
    }
    function  getBulan($bln){
        switch  ($bln){
	        case  1:
	        return  "Januari";
	        break;
	        case  2:
	        return  "Februari";
	        break;
	        case  3:
	        return  "Maret";
	        break;
	        case  4:
	        return  "April";
	        break;
	        case  5:
	        return  "Mei";
	        break;
	        case  6:
	        return  "Juni";
	        break;
	        case  7:
	        return  "Juli";
	        break;
	        case  8:
	        return  "Agustus";
	        break;
	        case  9:
	        return  "September";
	        break;
	        case  10:
	        return  "Oktober";
	        break;
	        case  11:
	        return  "November";
	        break;
	        case  12:
	        return  "Desember";
	        break;
	    }
    }
    function get_nama($kode,$hasil,$tabel,$field)
	{
		$this->db->select($hasil);
		$this->db->where($field, $kode);
		$q = $this->db->get($tabel);
		$data  = $q->result_array();
		$baris = $q->num_rows();
		return $data[0][$hasil];
	}
	function terbilang($number){
		$komaxx  = $this->terbilang_xx($number);
		$komayy  = substr($komaxx,-2);
		$number1 = round($number,2);
		if ($komayy>0){
			$ax    = $number;
			$koma  = substr($number,-2);
			$koma1 = $this->terbilang2($komayy);
		
			$ax1   = strlen($number1);
			$ax2   = $ax1-2;
			$ax3   = substr($number1,0,$ax2);
			$ax4   = $this->terbilang1($ax3);
			$hasil = $ax4." koma ".$koma1;
			
			} else {
			
			$ax1   = strlen($number);
			$ax3   = substr($number,0,$ax1);		
			$ax4   = $this->terbilang1($ax3);
			$hasil = $ax4;
			
			}
		return $hasil;  
	}
	function terbilang_xx($number){
		$koma2  = number_format($number,2);
		return($koma2);
	}
	function terbilang1($number) {
	    $this->dasar = array(1 => 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam','tujuh', 'delapan', 'sembilan');
	    $this->angka = array(1000000000, 1000000, 1000, 100, 10, 1);
	    $this->satuan = array('milyar', 'juta', 'ribu', 'ratus', 'puluh', '');
	 
	    $i = 0;
	    if($number==0)	{
	    	$str = "nol";
	    }else{
			$str = "";
	       	while ($number != 0) {
	        	$count = (int)($number/$this->angka[$i]);
	      		if($count >= 10) {
	          		$str .= $this->terbilang($count). " ".$this->satuan[$i]." ";
	      		}else if($count > 0 && $count < 10){
	          		$str .= $this->dasar[$count] . " ".$this->satuan[$i]." ";
	      		}
			  	$number -= $this->angka[$i] * $count;
			  	$i++;
		   }
		   $str = preg_replace("/satu puluh (\w+)/i", "\\1 belas", $str);
		   $str = preg_replace("/satu (ribu|Ratus|puluh|belas)/i", "se\\1", $str);
		}
		$string = $str.'';
    	return $string;
  	}
	function terbilang2($koma) {
	    $this->dasar = array(1 => 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam','tujuh', 'delapan', 'sembilan');
	    $this->angka = array(1000000000, 1000000, 1000, 100, 10, 1);
	    $this->satuan = array('milyar', 'juta', 'ribu', 'ratus', 'puluh', '');
	 
	    $i = 0;
	    if($koma==0 )	{
	    	$str = "nol";
	    }else{
			$str = "";
	       	while ($koma != 0) {
	        	$count = (int)($koma/$this->angka[$i]);
	      		if($count >= 10) {
	          		$str .= $this->terbilang($count). " ".$this->satuan[$i]." ";
	      		}else if($count > 0 && $count < 10){
	          		$str .= $this->dasar[$count] . " ".$this->satuan[$i]." ";
	      		}
			  	$koma -= $this->angka[$i] * $count;
			  	$i++;
		   }
		   $str = preg_replace("/satu puluh (\w+)/i", "\\1 belas", $str);
		   $str = preg_replace("/satu (ribu|Ratus|puluh|belas)/i", "se\\1", $str);
		}
		$string = $str.'';
    	return $string;
  	}
  	function  tanggal_ind($tgl){
        $tanggal  = explode('-',$tgl); 
        $bulan  = $tanggal[1];
        $tahun  =  $tanggal[0];
        return  $tanggal[2].'-'.$bulan.'-'.$tahun;
    }
    function link($url){
    	$link1 = str_replace('-','x03',trim($url));
		$link2 = str_replace('(','x01',trim($link1));
		$link3 = str_replace(')','x02',trim($link2));
		$link4 = str_replace(' ','-',trim($link3));
		$link = str_replace(',','_',trim($link4));

		return $link;
    }
    function rev_link($url){
    	$judul1 = str_replace('-', ' ', $url);
		$judul2 = str_replace('x01', '(', $judul1);
		$judul3 = str_replace('x02', ')', $judul2);
		$judul4 = str_replace('x03', '-', $judul3);
		$judul = str_replace('_', ',', $judul4);

		return $judul;
    }
}
