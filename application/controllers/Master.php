<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct(){
		parent::__construct();
		cek_akses(array(1,2,3));
		if (!$this->ion_auth->logged_in()){
			{
				redirect('auth/login');
			}
		}
	}
	public function data_pertanyaan()
	{
		$a['page'] 		= 'admin/content/master/pertanyaan';
		$a['title'] 	= 'List Pertanyaan';
		$this->load->view('admin/index',$a);
	}
	public function data_survei()
	{	
		$a['page'] 		= 'admin/content/master/survei';
		$a['title'] 	= 'List Survei';
		$this->load->view('admin/index',$a);
	}
	public function data_detail_survei()
	{	
		$kode_survei    = $this->uri->segment(2);
        $a['id_survei'] = $this->uri->segment(2);
        $a['user']      = $this->db->query("SELECT * FROM tbl_user_survei WHERE kode_survei = ".$kode_survei." ORDER BY id ");
        $a['survei']	= $this->db->query("SELECT * FROM tbl_pengisian_survei WHERE id_survei =".$kode_survei." ORDER BY id ASC");
		$a['page'] 		= 'admin/content/master/detail-survei';
		$a['title'] 	= 'Detail Survei';
		$this->load->view('admin/index',$a);
	}
	public function data_kenalan()
	{
		$a['page'] 		= 'admin/content/master/data-kenalan';
		$a['title'] 	= 'List Kenalan';
		$this->load->view('admin/index',$a);
	}

	public function pengaturan_referral()
	{
		$a['page'] 		= 'admin/content/master/pengaturan-referral';
		$a['title'] 	= 'Pengaturan Referral';
		$this->load->view('admin/index',$a);
	}

}
