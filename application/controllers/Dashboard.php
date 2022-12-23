<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}
	}
	public function index(){
		$this->db->initialize(); 
		$otoritas = user_data('tipe_user');
		if ($otoritas == 'admin') {
		$a['title']     = 'Dashboard ';
		$a['page'] 		= 'admin/dashboard/admin';
		$this->load->view('admin/index', $a);
		}else{
		 $this->load->view('index');
		}
	}
}
