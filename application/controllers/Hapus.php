<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hapus extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Modeldata','model');
	}
	function hapus_master(){
		$id 	= $this->input->post('id',true);
		$field 	= $this->input->post('field',true);
		$table 	= $this->input->post('table',true);
		$del = $this->db->where($field,$id)->delete($table);
		if($del){
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false));
		}
	}
		function hapus_survei(){
		$id		= $this->input->post('id');
		$table 	= $this->input->post('table',true);
		$query = $this->db->get_where($table, array('id' => $id)); 
		if($query){
			$this->db->delete('tbl_user_survei', array('kode_survei' => $query->row('kode_survei'))); 
			$this->db->delete('tbl_pengisian_survei', array('id_survei' => $query->row('kode_survei')));
			$this->db->delete('tbl_data_kenalan',array('id_asal_survei' => $query->row('kode_survei')));
			$this->db->delete('users', array('id_asal_registrasi' => $query->row('kode_survei')));
			$return = array(
				'status'	=> true,
			);
		}else{
			$return = array(
				'status'	=> false,
			);
			}
			echo json_encode($return);
	}
}
