<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->model('Crud_model','model');
		$this->load->library('datatables');
		if (!$this->ion_auth->logged_in()){
			{
				redirect('auth/login');
			}
		}
	}
	function lupa_password(){
		$userid			= $this->ion_auth->get_user_id();
		$a['title'] 	= "Pengaturan Verifikasi Permintaan Password Baru";
		$a['page'] 		= "admin/content/pengaturan/pengaturan-lupa-password";
		$this->load->view('admin/index',$a);
	}
	function verfifikasi_permintaan_password(){
		$field 	= $this->input->post('id',true);
		$aksi 	= 'edit';
		$data	= array(
			'status_password'	=> 'Selesai',
			'created'			=> user_data('id'),
			'last_update'		=>  date("Y-m-d H:i:s"),
		);
			
		if($this->model->simpan('tbl_lupa_password','id',$data,$field,$aksi) == true){
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
	function pengaturan_user(){
		$userid			= $this->ion_auth->get_user_id();
		$a['title'] 	= "Pengaturan User";
		$a['profile']	= $this->model->get_where('users',array('id'=>$userid));
		$a['page'] 	= "admin/content/pengaturan/pengaturan-user";
		$this->load->view('admin/index',$a);
	}
	function simpan_profile(){
		$kode 	= $this->ion_auth->get_user_id();
		$aksi 	= 'edit';
		$nama 	= 'photo';
		$folder	= 'assets/img/avatar';
	
		$data = array(
			'first_name'	=> $this->input->post('nama',true),
			'phone'			=> $this->input->post('phone',true),
		);

		$datanya = array(
			'user_id' 		=> $this->ion_auth->get_user_id(),
			'nama'			=> $this->input->post('nama',true),
			'phone'			=> $this->input->post('phone',true),
		);


		if ($this->input->post('password')){
			$datax['password'] = $this->input->post('password');
			$this->db->update('users', array('password_view' => $this->input->post('password')),array('id' => $kode));
			$this->ion_auth->update($kode, $datax);
		}
		if(!empty($_FILES[$nama]['name'])){
			$oldphoto = user_data('foto',$kode);
			if($oldphoto != 'user.png'){
				if (file_exists($folder.'/'.$oldphoto)) {
					unlink($folder.'/'.$oldphoto);
				}
			}
			$data['foto'] = $this->_do_upload2($nama,$folder,$kode);
		}
		
		if($this->model->simpan('users','id',$data,$kode,$aksi) == true){
			$return = array(
				'status'	=> true,
				'message'	=> 'Profil telah diperbaharui',
			);
		}else{
			$return = array(
				'status'	=> false,
				'message'	=> 'Gagal menyimpan data',
			);
		}
		echo json_encode($return);
	}
	// private function _do_upload2($nama,$folder,$newfilename){
    //     $config['upload_path']  = $folder;
    //     $config['allowed_types']= 'gif|jpg|png|jpeg';
    //     $config['max_size']     = 5 * 1024 * 1024;
    //     $config['max_width']    = 0;
    //     $config['max_height']   = 0; 
	// 	$config['file_name']   = $newfilename; 
    //     $this->load->library('upload', $config); 
	// 	$this->upload->initialize($config);
    //     if(!$this->upload->do_upload($nama)){
    //         $status = array("pesan"=>'inputerror : '. $nama.': '.$this->upload->display_errors('',''),'getStatus'=>0);
	// 		echo json_encode($status);
    //     }
    //     return $this->upload->data('file_name');
	// }
	
	private function _do_upload2($inputname,$folder,$filename){
		$ekstensi_diperbolehkan	= array('png','jpg','gif','jpeg');
		$nama = $_FILES[$inputname]['name'];
		$x = explode('.', $nama);
		$temp = explode(".", $_FILES[$inputname]["name"]);
		$newfilename = $filename.'-'.round(microtime(true)) . '.' . end($temp);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES[$inputname]['size'];
		$file_tmp = $_FILES[$inputname]['tmp_name'];	

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){			
				if(move_uploaded_file($file_tmp, $folder.'/'.$newfilename)){
					return $newfilename;
				}else{
					$data['message']	= 'Upload error: Gagal upload file...';
					$data['status']		= FALSE;
					echo json_encode($data);
					exit();
				}
			}else{
				$data['message']	= 'Upload error: Ukuran file terlalu besar. Minimal 1 MB';
				$data['status']		= FALSE;
				echo json_encode($data);
				exit();
			}
		}else{
			$data['message']	= 'Upload error: Jenis file tidak di izinkan. Silahkan upload file png, jpg, gif, jpeg.';
			$data['status']		= FALSE;
			echo json_encode($data);
			exit();
		}
}
}