<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('Crud_model','model');
		$this->load->library('datatables');
		cek_akses(array(1,2,3,4,5));
    }
	function data_laporan(){
		$a['title'] 	= "Laporan Data Agen";
		$a['page'] 	= "admin/content/laporan/list-laporan";		
		$this->load->view('admin/index',$a);
	}

	function performance(){
		$a['title'] 	= "Laporan Data Performance";
		$a['page'] 	= "admin/content/laporan/performance";
		$otoritas = $this->session->userdata('group_id');
		$company = user_data('company');
		$loadpic = str_replace('p_', '', $company);
		$loadcabang = str_replace('c_', '', $company);
		$loadarea = str_replace('a_', '', $company);
		$kodeupload = $this->db->query("SELECT kode_upload FROM tbl_data_agen WHERE last_status ='1' GROUP BY kode_upload ORDER BY id ASC")->row('kode_upload');
		if($otoritas == '5' ){
		$piliharea = $this->input->get('area');
		$pilihcabang = $this->input->get('cabang');
		$pilihpic = $loadpic;
		$pilihagen = $this->input->get('agen');
		}elseif($otoritas == '4'){
		$piliharea = $this->input->get('area');
		$pilihcabang = $loadcabang;
		$pilihpic = $this->input->get('pic');
		$pilihagen = $this->input->get('agen');
		}elseif ($otoritas == '3') {
		$piliharea = $loadarea;
		$pilihcabang = $this->input->get('cabang');
		$pilihpic = $this->input->get('pic');
		$pilihagen = $this->input->get('agen');
		}else{
		$piliharea = $this->input->get('area');
		$pilihcabang = $this->input->get('cabang');
		$pilihpic = $this->input->get('pic');
		$pilihagen = $this->input->get('agen');
		}

		
		
		$a['funding'] = $this->db->query("SELECT last_update,kode_upload,SUM(funding) AS total FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' GROUP BY kode_upload ORDER BY id ASC LIMIT 4");

		$a['rekening'] = $this->db->query("SELECT last_update,kode_upload,SUM(rekening) AS total FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' GROUP BY kode_upload ORDER BY id ASC LIMIT 4");

		$a['kuadran1'] = $this->db->query("SELECT last_update,kode_upload,count(kuadran) AS total FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' AND kuadran ='A' GROUP BY kode_upload ORDER BY id ASC");
		$a['kuadran2'] = $this->db->query("SELECT last_update,kode_upload,count(kuadran) AS total FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' AND kuadran ='B' GROUP BY kode_upload ORDER BY id ASC");
		$a['kuadran3'] = $this->db->query("SELECT last_update,kode_upload,count(kuadran) AS total FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' AND kuadran ='C' GROUP BY kode_upload ORDER BY id ASC");
		$a['kuadran4'] = $this->db->query("SELECT last_update,kode_upload,count(kuadran) AS total FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' AND kuadran IN ('D','E') GROUP BY kode_upload ORDER BY id ASC");
		
		$a['frek'] 	   = $this->db->query("SELECT kode_upload,SUM(frek) AS total FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' GROUP BY kode_upload ORDER BY id ASC LIMIT 4");

		$a['kuadranA'] = $this->db->query("SELECT * FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' AND kuadran ='A' AND kode_upload= '$kodeupload' AND last_status='1'")->num_rows();
		$a['kuadranB'] = $this->db->query("SELECT * FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' AND kuadran ='B' AND kode_upload= '$kodeupload' AND last_status='1'")->num_rows();
		$a['kuadranC'] = $this->db->query("SELECT * FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' AND kuadran ='C' AND kode_upload= '$kodeupload' AND last_status='1'")->num_rows();
		$a['kuadranDE'] = $this->db->query("SELECT * FROM tbl_data_agen WHERE id_area like'%".$piliharea."%' AND  id_cabang like'%".$pilihcabang."%'AND id_pic like'%".$pilihpic."%' AND  kode_agen like'%".$pilihagen."%' AND kuadran IN ('D','E') AND kode_upload = '$kodeupload' AND last_status='1'")->num_rows();

		$this->load->view('admin/index',$a);
	}

	
	public function load_performance(){
		$query  = $this->db->query("SELECT * FROM tbl_data_agen_tmp");
		$data = array();
		foreach($query->result() as $a){	
			$kat = array(
				"id"			=> $a->id,
				// "nama_area" 	=> $a->nama_area,
				// "kode_area"		=> $a->kode_area,
			);
			array_push($data,$kat);
		}
		echo json_encode($data);
	}



	function cetak_laporan_bulanan(){
		$jenis = $this->input->get('jenis',true);
		$ctk = $this->input->get('ctk',true);
		$a['ctk'] = $ctk;
		if($ctk=='cabang'){
			$area = $this->input->get('area',true);
			$cabang = $this->input->get('cabang',true);
			$tahun = $this->input->get('tahun',true);
			$bulan = $this->input->get('bulan',true);
			$a['cabang'] = $cabang;
			$a['bulan'] = $this->model->getBulanHuruf($bulan);
			$a['tahun']  = $tahun;
			$a['data'] = $this->db->query("select *  from tbl_data_agen where id_area like'%".$area."%' and id_cabang like'%".$cabang."%' and month(last_update)='$bulan' and year(last_update)='$tahun'  order by last_update");
		}else{
			$area = $this->input->get('area',true);
			$cabang = $this->input->get('cabang',true);
			$tahun = $this->input->get('tahun',true);
			$bulan = $this->input->get('bulan',true);
			$a['bulan'] = $this->model->getBulanHuruf($bulan);
			$a['tahun']  = $tahun;
			$a['data'] = $this->db->query("select *  from tbl_data_agen where id_area like'%".$area."%' and id_cabang like'%".$cabang."%' and month(last_update)='$bulan' and year(last_update)='$tahun'  order by last_update");
		}
		if($jenis =='pdf'){
			$this->load->view("admin/content/laporan/cetak-lap-perbulan",$a);
			$paper_size='Legal';
			$orientation ='landscape';
			$html =$this->output->get_output();
			//echo $html;
			$tabel = "Cetak Obat";
			$this->dompdf->setPaper($paper_size,$orientation);
			$this->dompdf->loadHtml($html);
			$this->dompdf->render();
			$this->dompdf->stream($tabel.".pdf", array('Attachment'=>0));
		}else if($jenis=='excel'){
			$table = $this->load->view("admin/content/laporan/cetak-lap-perbulan",$a);
			$data['prev']= $table; 
			header("Cache-Control: no-cache, no-store, must-revalidate");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename= data-registrasi.xls");
			//$this->load->view('excel', $data);
		}else{
			$this->load->view("admin/content/laporan/cetak-lap-perbulan",$a);
		}
	}

	function cetak_riwayat_kunjungan(){
		$jenis = $this->input->get('jenis',true);
		$ctk = $this->input->get('ctk',true);
		$a['ctk'] = $ctk;
		if($ctk=='cabang'){
			$kodeupload = $this->input->get('kodeupload',true);
			$kode_upload = base64_decode($kodeupload);
			$a['data'] = $this->db->query("select *  from tbl_data_agen where kode_upload='$kode_upload' order by last_update");
		}else{
			$kodeupload = $this->input->get('kodeupload',true);
			$kode_upload = base64_decode($kodeupload);
			$a['data'] = $this->db->query("select *  from tbl_data_agen where kode_upload='$kode_upload' order by last_update");
		}
		if($jenis =='pdf'){
			$this->load->view("admin/content/laporan/cetak-riwayat-kunjungan",$a);
			$paper_size='Legal';
			$orientation ='landscape';
			$html =$this->output->get_output();
			//echo $html;
			$tabel = "Cetak";
			$this->dompdf->setPaper($paper_size,$orientation);
			$this->dompdf->loadHtml($html);
			$this->dompdf->render();
			$this->dompdf->stream($tabel.".pdf", array('Attachment'=>0));
		}else if($jenis=='excel'){
			$table = $this->load->view("admin/content/laporan/cetak-riwayat-kunjungan",$a);
			$data['prev']= $table; 
			header("Cache-Control: no-cache, no-store, must-revalidate");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename= ".$kodeupload.".xls");
			//$this->load->view('excel', $data);
		}else{
			$this->load->view("admin/content/laporan/cetak-riwayat-kunjungan",$a);
		}
	}


	}