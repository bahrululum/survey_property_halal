<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Modeldata','model');
	}

	
	// public function edit_master_user(){
	// 	$id 		= $this->input->post('id',true);
	// 	$where		= array('id'=>$id);
	// 	$query		= $this->model->edit('users',$where);
	// 	foreach($query->result() as $a){
	// 		$data = array(
	// 			"id"			=> $a->id,
	// 			"nm_lengkap" 	=> $a->first_name,
	// 			"username"	 	=> $a->username,
	// 			"password" 		=> $a->password,
	// 			"email"		 	=> $a->email,
	// 			"no_hp"		 	=> $a->phone,
	// 			"password_view" => $a->password_view,
	// 			"group"		=> field_value('users_groups','user_id',$a->id,'group_id'),
	// 		);
	// 		echo json_encode($data);
	// 	}
	// }

	public function edit_pertanyaan(){
		$id 		= $this->input->post('id',true);
		$where		= array('id'=>$id);
		$query		= $this->model->edit('m_pertanyaan',$where);
		foreach($query->result() as $a){
			$data = array(
				"id"			=> $a->id,
				"pertanyaan" 	=> $a->pertanyaan,
			);
			echo json_encode($data);
		}
	}

	public function edit_pengaturan_referral(){
		$id 		= $this->input->post('id',true);
		$where		= array('id'=>$id);
		$query		= $this->model->edit('tbl_aturan_referral',$where);
		foreach($query->result() as $a){
			$data = array(
				"id"			=> $a->id,
				"isi" 	=> html_entity_decode($a->isi),
			);
			echo json_encode($data);
		}
	}

	public function edit_master_aset(){
		$id 		= $this->input->post('id',true);
		$where		= array('id'=>$id);
		$query		= $this->model->edit('tbl_aset',$where);
		foreach($query->result() as $a){
			$data = array(
				"id"				=> $a->id,
				"nama_aset" 		=> $a->nama_aset,
				"vendor"			=> $a->vendor,
				"kode_aset"			=> $a->kode_aset,
				"kondisi_aset"		=> $a->kondisi_aset,
				"gambar"			=> $a->gambar,
			);
			echo json_encode($data);
		}
	}

	
}
