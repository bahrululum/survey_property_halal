<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Modeldata','model');
		$this->load->model('Crud_model','model');
		$this->load->library('datatables');
	}

	public function simpan_pertanyaan(){
		date_default_timezone_set("Asia/Makassar");
		$lupdate 	= date("Y-m-d H:i:s");
		$id 		= $this->input->post('id',true);
		$data = array(
			"pertanyaan"	=> $this->input->post('pertanyaan',true),
			"status_p"		=> 'aktif',
			"last_update"	=> $lupdate,	
		);
			if($this->input->post('status')=='tambah'){
			$query 		= $this->db->insert('m_pertanyaan',$data);
			if($query){
				echo json_encode(array('status'=>1));
			}else{
				echo json_encode(array('status'=>0));
			}
		}else{
			$this->db->where('id',$id);
			$query 		= $this->db->update('m_pertanyaan',$data);
			if($query){
				echo json_encode(array('status'=>2));
			}else{
				echo json_encode(array('status'=>0));
			}
		}
	}

	public function simpan_pengaturan_referral(){
		date_default_timezone_set("Asia/Makassar");
		$lupdate 	= date("Y-m-d H:i:s");
		$id 		= $this->input->post('id',true);
		$data = array(
			"isi"	=> $this->input->post('keterangan',true),
			"last_update"	=> $lupdate,	
		);
			if($this->input->post('status')=='tambah'){
			$query 		= $this->db->insert('tbl_aturan_referral',$data);
			if($query){
				echo json_encode(array('status'=>1));
			}else{
				echo json_encode(array('status'=>0));
			}
		}else{
			$this->db->where('id',$id);
			$query 		= $this->db->update('tbl_aturan_referral',$data);
			if($query){
				echo json_encode(array('status'=>2));
			}else{
				echo json_encode(array('status'=>0));
			}
		}
	}

	function pertanyaan_aktif(){
		date_default_timezone_set("Asia/Makassar");
		$lupdate 	= date("Y-m-d H:i:s");
        $field  = $this->input->post('id',true);
        $aksi   = 'edit';
        $data   = array(
         	'status_p' 		  => 'aktif',
         	'last_update'     => $lupdate,
        );   
        if($this->model->simpan('m_pertanyaan','id',$data,$field,$aksi) == true){
            $return = array(
                'status'    => 1,
            );
        }else{
            $return = array(
                'status'    => 0,
            );
        }
        echo json_encode($return);
    }

    function pertanyaan_nonaktif(){
		date_default_timezone_set("Asia/Makassar");
		$lupdate 	= date("Y-m-d H:i:s");
        $field  = $this->input->post('id',true);
        $aksi   = 'edit';
        $data   = array(
         	'status_p' 		  => 'tidak',
         	'last_update'     => $lupdate,
        );   
        if($this->model->simpan('m_pertanyaan','id',$data,$field,$aksi) == true){
            $return = array(
                'status'    => 1,
            );
        }else{
            $return = array(
                'status'    => 0,
            );
        }
        echo json_encode($return);
    }






	public function data_user_survei(){
		$cek_referral   = $this->input->post('share',true);
		$random   	= $this->acak_id(5); 
		$id 		= $this->input->post('id',true);
		$nama 		= $this->input->post('nama',true);
		$jk 		= $this->input->post('jk',true);
		$status_nikah = $this->input->post('status_nikah',true);
		$usia 		= $this->input->post('usia',true);
		// $cekemail	= $this->input->post('email',true);
		// if($cekemail == ''){
		// $email	 	= $this->input->post('email',true);
		// }else{
		$email	 	= 'e'.$random.'@survei.com';
		// }
		// $phone 		= $this->input->post('phone',true);
		$phone = '0823'.$random;
		$pekerjaan 	= $this->input->post('pekerjaan',true);
		$alamat 		= $this->input->post('alamat',true);
		
		date_default_timezone_set("Asia/Makassar");
		$lupdate 	= date("Y-m-d H:i:s");
		$otoritas 	= '2';
		

		$username 	= 'u_'.$random;
		$password 	= 'p_'.$random;
		$user_survei  = array(
			'kode_survei'	=> $random,
			'nama_lengkap'  => $nama,
			'alamat_domisili' => $alamat,
			'email'	=> $email,
			'handphone' => $phone,
			'jenis_kelamin' => $jk,
			'usia'	=> $usia,
			'status_pernikahan' => $status_nikah,
			'pekerjaan'	=> $pekerjaan,
			'last_update' => $lupdate
		);
		$additional_data = 
			array(
				'first_name'		=> $nama,
				'phone'				=> $phone,
				'password_view'		=> $password,
				'created_on'		=> $lupdate,
				'tanggal_register' 	=> $lupdate,
				'id_registrasi'		=> $random,
				'id_asal_registrasi'=> $cek_referral
			);
		$group = array($otoritas);		
			$sql = $this->db->query("SELECT * from users where phone = '$phone'")->num_rows();
			if($sql > 0){
				$respon = array(
					'status'	=> false,
					'message'	=> 'No handphone Anda Sudah Terdaftar, Silahkan menggunakan No handphone aktif yang berbeda',
				);
				echo json_encode($respon);
				exit();
			}else{
				$query 		= $this->ion_auth->register($username, $password, $email, $additional_data, $group);

				if($query){
						$this->db->insert('tbl_user_survei',$user_survei);
						$this->ion_auth->login($username, $password, '');
					echo json_encode(array('status'=>1, 'message' => '', 'url' => 'pertanyaan/'.$random.'?share='.$cek_referral));
				}else{
					echo json_encode(array('status'=>0));
				}
			}
		
	}	

	public function cek_user(){
		$id 		= $this->input->post('id',true);

		$cek = $this->db->get_where('tbl_user_survei',array('kode_survei'=>$id));
		if($cek->num_rows()>0){
			$link = base_url('isi-data/').$id; 
		}else{
			$link = base_url(); 
		}
			if($cek){
				echo json_encode(array('status'=>1, 'message' => '', 'url' => $link));
			}else{
				echo json_encode(array('status'=>0));
			}
	}

	public function data_jawaban_user_survei(){
		$id 		= $this->input->post('id',true);
		$id_survei 	= $this->input->post('id_survei',true);
		date_default_timezone_set("Asia/Makassar");
		$last_update 	= date("Y-m-d H:i:s");

		$data = array(
			array(
				"id_survei"	=> $this->input->post('id_survei',true),	
				"id_pertanyaan"	=> $this->input->post('id_pertanyaan_1',true),	
				"jawaban"	=> $this->input->post('jawaban_1',true),
				"last_update" => $last_update,
			),
			array(
				"id_survei"	=> $this->input->post('id_survei',true),	
				"id_pertanyaan"	=> $this->input->post('id_pertanyaan_2',true),	
				"jawaban"	=> $this->input->post('jawaban_2',true),
				"last_update" => $last_update,
			),
			array(
				"id_survei"	=> $this->input->post('id_survei',true),	
				"id_pertanyaan"	=> $this->input->post('id_pertanyaan_3',true),	
				"jawaban"	=> $this->input->post('jawaban_3',true),
				"last_update" => $last_update,
			),
			array(
				"id_survei"	=> $this->input->post('id_survei',true),	
				"id_pertanyaan"	=> $this->input->post('id_pertanyaan_4',true),	
				"jawaban"	=> $this->input->post('jawaban_4',true),
				"last_update" => $last_update,
			),		
		);

		$query 		= $this->db->insert_batch('tbl_pengisian_survei',$data);
			if($query){
				echo json_encode(array('status'=>1, 'message' => '',  'url' => base_url('terimakasih/').$id_survei));
			}else{
				echo json_encode(array('status'=>0));
			}
	}

	public function data_user_keluaga(){
		$random   	= $this->input->post('id_survei',true);
		$id 		= $this->input->post('id',true);
		$nama 		= $this->input->post('nama',true);
		$jk 		= $this->input->post('jk',true);
		$status_nikah = $this->input->post('status_nikah',true);
		$usia 		= $this->input->post('usia',true);
		// $cekemail	= $this->input->post('email',true);
		// if($cekemail == ''){
		// $email	 	= $this->input->post('email',true);
		// }else{
		$email	 	= '-';
		// }
		$phone 		= $this->input->post('phone',true);
		$pekerjaan 	= $this->input->post('pekerjaan',true);
		$alamat 		= $this->input->post('alamat',true);
		
		date_default_timezone_set("Asia/Makassar");
		$lupdate 	= date("Y-m-d H:i:s");
		// $otoritas 	= '2';
		

		// $username 	= 'u_'.$random;
		// $password 	= 'p_'.$random;
		$user_survei  = array(
			'id_asal_survei'	=> $random,
			'nama_lengkap'  => $nama,
			'alamat_domisili' => $alamat,
			'email'	=> $email,
			'handphone' => $phone,
			'jenis_kelamin' => $jk,
			'usia'	=> $usia,
			'status_pernikahan' => $status_nikah,
			'pekerjaan'	=> $pekerjaan,
			'last_update' => $lupdate
		);
	
				$query 		= $this->db->insert('tbl_data_kenalan',$user_survei);
				if($query){
					echo json_encode(array('status'=>1, 'message' => '', 'url' => base_url('terimakasih/').$random));
				}else{
					echo json_encode(array('status'=>0));
				}
	}	


	private function _do_upload2($nama,$folder,$newfilename){
        $config['upload_path']  = $folder;
        $config['allowed_types']= 'jpg|png';
        $config['max_size']     = 5 * 1024 * 1024;
        $config['max_width']    = 0;
        $config['max_height']   = 0; 
		$config['file_name']   = $newfilename; 
        $this->load->library('upload', $config); 
		$this->upload->initialize($config);
        if(!$this->upload->do_upload($nama)){
            $status = array("pesan"=>'inputerror : '. $nama.': '.$this->upload->display_errors('',''),'status'=>0);
			echo json_encode($status);
        }
        return $this->upload->data('file_name');
    }

    function acak_id($panjang){
		$karakter= '1234567890';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter[$pos];
		}
		return $string;
	}
}
