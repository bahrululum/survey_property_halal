<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load extends CI_Controller {
	function __construct(){ 
		parent::__construct();
		$this->load->model('Modeldata','model');
		$this->load->model('Crud_data','model');
		$this->load->library('datatables');
		$this->opsi = array("a","b","c","d","e");
		$this->load->helper('text');
		
	}
	function list_pertanyaan(){ 
						$this->db->initialize();  
						$table 			= 'm_pertanyaan'; 
						$column_order 	= array(null,'id','pertanyaan','status_p','last_update');
						$column_search 	= array('id','pertanyaan','status_p','last_update');
						$order 			= array('id' => 'desc'); 
						$list 			= $this->model->get_datatables($table,$column_order,$column_search,$order);
						$data 			= array();
						$no 			= $_POST['start'];
						$i 				= 1;
						foreach ($list as $post){
							$nestedData['no'] 		= $i;
							$nestedData['pertanyaan'] 		= $post->pertanyaan;
							if($post->status_p == 'aktif'){
							$nestedData['stts'] 	= "<button class='btn btn-success btn-bordered waves-effect w-md waves-light'  onclick='status_n(".$post->id.");'>Nonaktifkan</button>";
							}else{
							$nestedData['stts'] 	= "<button class='btn btn-danger btn-bordered waves-effect w-md waves-light'  onclick='status_a(".$post->id.");'>Aktifkan</button>";
							}
							$nestedData['last_update']	=  "<span class='text-muted'><i class='fa fa-calendar'></i> ".date('j M Y',strtotime($post->last_update))."<br><i class='fa fa-clock-o'></i> ".date('H:i:s',strtotime($post->last_update))."</div></span>";
							$nestedData['aksi'] 	= "<div class='table-action-btn h3' onclick='edit(".$post->id.");'>
							<i class='mdi mdi-pencil-box-outline text-success'></i>
							</div><div class='table-action-btn h3' onclick='hapus(".$post->id.");'>
							<i class='mdi mdi-close-box-outline text-danger'></i>
							</div>";
							$data[] = $nestedData;
							$i++;
						}
						$json_data = array(
							"draw"            => intval($this->input->post('draw')),  
							"recordsTotal"    => $this->model->count_all($table),
							"recordsFiltered" => $this->model->count_filtered($table,$column_order,$column_search,$order),
							"data"            => $data   
						);
						echo json_encode($json_data);
							}

	function list_pengaturan(){ 
						$this->db->initialize();  
						$table 			= 'tbl_aturan_referral'; 
						$column_order 	= array(null,'id','isi','last_update');
						$column_search 	= array('id','isi','last_update');
						$order 			= array('id' => 'desc'); 
						$list 			= $this->model->get_datatables($table,$column_order,$column_search,$order);
						$data 			= array();
						$no 			= $_POST['start'];
						$i 				= 1;
						foreach ($list as $post){
							$nestedData['no'] 		= $i;
							$nestedData['keterangan'] 		= $post->isi;
							$nestedData['last_update']	=  "<span class='text-muted'><i class='fa fa-calendar'></i> ".date('j M Y',strtotime($post->last_update))."<br><i class='fa fa-clock-o'></i> ".date('H:i:s',strtotime($post->last_update))."</div></span>";
							$nestedData['aksi'] 	= "<div class='table-action-btn h3' onclick='edit(".$post->id.");'>
							<i class='mdi mdi-pencil-box-outline text-success'></i>
							</div>";
							$data[] = $nestedData;
							$i++;
						}
						$json_data = array(
							"draw"            => intval($this->input->post('draw')),  
							"recordsTotal"    => $this->model->count_all($table),
							"recordsFiltered" => $this->model->count_filtered($table,$column_order,$column_search,$order),
							"data"            => $data   
						);
						echo json_encode($json_data);
							}

	function list_survei(){ 
		$this->db->initialize();  
		$table 			= 'tbl_user_survei'; 
		$column_order 	= array(null,'id','kode_survei','nama_lengkap','alamat_domisili','email','handphone','jenis_kelamin','usia','status_pernikahan','pekerjaan','last_update');
		$column_search 	= array('id','nama_lengkap');
		$order 			= array('id' => 'desc'); 
		$list 			= $this->model->get_datatables($table,$column_order,$column_search,$order);
		$data 			= array();
		$no 			= $_POST['start'];
		$i 				= 1;
		foreach ($list as $post){
			$referral = field_value('users','id_registrasi',$post->kode_survei,'id_asal_registrasi');

			$nestedData['no'] 		= $i;
			$nestedData['kode_s']		= $referral.'<br>'.field_value('users','id_registrasi',$referral,'first_name');
			$nestedData['nama'] 		= $post->nama_lengkap;
			$nestedData['alamat'] 		= $post->alamat_domisili;
			$nestedData['kontak'] 		= $post->handphone;
			$nestedData['ket1'] 		= $post->jenis_kelamin.'<br>usia '.$post->usia.' tahun';
			$nestedData['ket2'] 		= $post->status_pernikahan.'<br>pekrjaan : '.$post->pekerjaan;
			$nestedData['detail'] 		= "<a href='".base_url("data-survei-detail/").$post->kode_survei."' class='btn btn-info btn-bordered waves-effect w-md waves-light'>view</a>";
			$nestedData['aksi'] 	= "<div class='table-action-btn h3' onclick='hapus(".$post->id.");'>
			<i class='mdi mdi-close-box-outline text-danger'></i>
			</div>";
			
			$data[] = $nestedData;
			$i++;
		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),  
			"recordsTotal"    => $this->model->count_all($table),
			"recordsFiltered" => $this->model->count_filtered($table,$column_order,$column_search,$order),
			"data"            => $data   
		);
		echo json_encode($json_data);
	}

	function list_data_kenalan(){ 
		$this->db->initialize();  
		$table 			= 'tbl_data_kenalan'; 
		$column_order 	= array(null,'id','id_asal_survei','nama_lengkap','alamat_domisili','email','handphone','jenis_kelamin','usia','status_pernikahan','pekerjaan','last_update');
		$column_search 	= array('id','nama_lengkap');
		$order 			= array('id' => 'desc'); 
		$list 			= $this->model->get_datatables($table,$column_order,$column_search,$order);
		$data 			= array();
		$no 			= $_POST['start'];
		$i 				= 1;
		foreach ($list as $post){
			$nestedData['no'] 		= $i;
			$nestedData['nama'] 		= $post->nama_lengkap.'<br>kenalan : '.field_value("tbl_user_survei","kode_survei",$post->id_asal_survei,"nama_lengkap");
			$nestedData['alamat'] 		= $post->alamat_domisili;
			$nestedData['kontak'] 		= $post->handphone;
			$nestedData['ket1'] 		= $post->jenis_kelamin.'<br>usia '.$post->usia.' tahun';
			$nestedData['ket2'] 		= $post->status_pernikahan.'<br>pekrjaan : '.$post->pekerjaan;
			$nestedData['detail'] 		= "-";
			$nestedData['aksi'] 	= "<div class='table-action-btn h3' onclick='hapus(".$post->id.");'>
			<i class='mdi mdi-close-box-outline text-danger'></i>
			</div>";
			
			$data[] = $nestedData;
			$i++;
		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),  
			"recordsTotal"    => $this->model->count_all($table),
			"recordsFiltered" => $this->model->count_filtered($table,$column_order,$column_search,$order),
			"data"            => $data   
		);
		echo json_encode($json_data);
	}

}