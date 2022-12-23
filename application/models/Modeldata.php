<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modeldata extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	function maxNomor($tabel,$field,$jns){
		$query = $this->db->query("select concat('$jns',lpad(ifnull(max(right($field,7))+1,1),7,0)) as maxNo from $tabel");
		return $query->result();
	}
	public function save($data,$table){
		$save = $this->db->insert($table, $data);
		if($save){
			return '1';
		}else{
			return '2';
		}
	}
	public function update($data,$table,$kode,$field){
		$this->db->where($field, $kode);
		$this->db->update($table, $data);	
		return '1';
	}
	public function update_user($data,$table,$kode,$field){
		$this->db->where($field, $kode);
		$this->db->where('dgroup', '3');
		$this->db->update($table, $data);	
		return '1';
	}
	function hapus($table,$where){
		$this->db->where($where);
		$del = $this->db->delete($table);
		if($del){
			return '1';
		}else{
			return '2';
		}
	}
	function edit($table,$where){
		$this->db->where($where);
		$del = $this->db->get($table);
		return $del;
	}
	function simpan($table,$pk,$data,$field,$action){
		if($action == 'tambah'){
			if($this->db->insert($table,$data)){
				return true;
			}else{
				return false;
			}
		}else{
			if($this->db->update($table,$data,array($pk=>$field))){
				return true;
			}else{
				return false;
			}
		}
	}
	function getData($table,$field,$group1){
		$query = $this->db->query("select * from $table group by $group1 order by last_update desc");
		return $query->result();
	}
	function get_where($table,$where,$order=null){
		if(empty($order)){
			$d=$this->db->get_where($table,$where);
		}else{
			$d=$this->db->where($where)->order_by($order)->get($table);
		}
		return $d->result();
	}
	function getDataWhere($table,$value){
		$query = $this->db->query("select * from $table where jns_kategori='$value'");
		return $query->result();
	}
	function getDataWhere2($table){
		$query = $this->db->query("select kategori,count(kd_form) as jum from $table group by kategori");
		return $query->result();
	}
	function getDataWhere3($table,$value){
		$query = $this->db->query("select * from $table where id='$value'");
		return $query->result();
	}
	function getDataWhere4($table,$value,$field){
		$query = $this->db->query("select * from $table where $field='$value'");
		return $query->result();
	}
	
	function getDataWhere5($table,$value,$field){
		$query = $this->db->query("select * from $table where $field='$value'");
		return $query;
	}
	function getDataWhere6($table,$value,$field,$field2){
		$query = $this->db->query("select $field2 as nama from $table where $field='$value'")->row('nama');
		return $query;
	}
	
	//mpdf2
	function _mpdf2($judul='',$isi='',$lMargin='',$rMargin='',$font=0,$orientasi='',$footer='') {
        
        ini_set("memory_limit","512M");
        $this->load->library('mpdf');
        $this->mpdf->defaultheaderfontsize = 6;	/* in pts */
        $this->mpdf->defaultheaderfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultheaderline = 1; 	/* 1 to include line below header/above footer */

        $this->mpdf->defaultfooterfontsize = 6;	/* in pts */
        $this->mpdf->defaultfooterfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultfooterline = 1; 
        $this->mpdf->SetLeftMargin = $lMargin;
        $this->mpdf->SetRightMargin = $rMargin;
        //$this->mpdf->SetHeader('SIMAKDA||');
        $jam = date("H:i:s");
        //$this->mpdf->SetFooter('Printed on @ {DATE j-m-Y H:i:s} |Simakda| Page {PAGENO} of {nb}');
		$this->mpdf->SethtmlFooter($footer);
        
        $this->mpdf->AddPage($orientasi,'','','','',$lMargin,$rMargin);
        
        if (!empty($judul)) $this->mpdf->writeHTML($judul);
        $this->mpdf->writeHTML($isi);         
        $this->mpdf->Output();
               
    }
	function number_format_short( $n, $precision = 1 ) {
		if ($n < 900) {
			// 0 - 900
			$n_format = number_format($n, $precision);
			$suffix = '';
		} else if ($n < 900000) {
			// 0.9k-850k
			$n_format = number_format($n / 1000, $precision);
			$suffix = 'rb';
		} else if ($n < 900000000) {
			// 0.9m-850m
			$n_format = number_format($n / 1000000, $precision);
			$suffix = 'jt';
		} else if ($n < 900000000000) {
			// 0.9b-850b
			$n_format = number_format($n / 1000000000, $precision);
			$suffix = 'mlr';
		} else {
			// 0.9t+
			$n_format = number_format($n / 1000000000000, $precision);
			$suffix = 'trl';
		}
	  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
	  // Intentionally does not affect partials, eg "1.50" -> "1.50"
		if ( $precision > 0 ) {
			$dotzero = '.' . str_repeat( '0', $precision );
			$n_format = str_replace( $dotzero, '', $n_format );
		}
		return $n_format . $suffix;
	}
	function getDataGroup($tabel,$index,$search,$uri,$filed0,$fields1,$fields2){
		$cari = '';
		$w = '';
		if($search){
			$cari = "where $fields1 like '%$search%' or $fields2 like '%$search%'";
		}
		if($uri){
			$w = "where $filed0='$uri'";
			$cari = "and ($fields1 like '%$search%' or $fields2 like '%$search%')";
		}
		$db = $this->db->query("select $fields1 as kode, $fields2 as nama from $tabel $w $cari group by $fields1,$fields2 order by $index");
		$get_data = $db->row();
		if($db->num_rows()>0){
			foreach($db->result() as $a){
				$realisasi = 0;
				$data[] = array(
					'id' => $a->kode, 
					'text' => $a->nama,
				);
			}
            return $data;
        }else{
            return $data[] = array('id' => '0', 'text' => 'No Products Found');
        }
	}
	
	
	//get data table
	function get_datatables($table,$column_order,$column_search,$order){
		$this->_get_datatables_query($table,$column_order,$column_search,$order);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered($table,$column_order,$column_search,$order)
	{
		$this->_get_datatables_query($table,$column_order,$column_search,$order);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table)
	{
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	// list load data
	private function _get_datatables_query($table,$column_order,$column_search,$order){
		$user = user_data('id');
		$pic = user_data('company');
		$kodepic = str_replace('p_', '', $pic);
		$kodeupload = $this->input->get('kodeupload',true);
		$kodecabang = str_replace('c_', '', $pic);
		$kodearea = str_replace('a_', '', $pic);
		$kodeaset = $this->uri->segment(2);
		$aset     = $this->input->get('kode',true);
		$level = $this->session->userdata('group_id');
		$id_user = $this->session->userdata('id_user');
		$uname = $this->session->userdata('uname');
		$this->db->from($table);
		if($level != '1' && $level != '2' && $level != '3' && $table != 'tbl_cabang' && $table != 'tbl_area' && $table != 'tbl_pic'  && $table != 'tbl_agen'  && $table != 'tbl_data_agen' && $table != 'tbl_lupa_password'){
			$this->db->where('id_user',$id_user);
		}
		if($level=='1'){
			if($table=='tbl_aset'){
				$this->db->where('rak',$aset);
				$this->db->order_by('id');
			}
		}

		if($level=='3'){
			$kondisi = 'Baik';
			if($table=='tbl_aset'){
				$this->db->where('kondisi_aset',$kondisi);
				$this->db->order_by('id');
			}
		}

		if($level=='2'){
			$mahasiswa = '3';
			if($table=='users'){
				$this->db->where('company',$mahasiswa);
			}
		}

		if($level=='5'){
			if($table=='tbl_data_agen'){
				$array = array('id_pic' => $kodepic, 'verifikasi' => 0);
				$this->db->where($array);
				$this->db->group_by('kode_upload');
				$this->db->order_by('id');
			}
		}

		if($level=='4'){
			if($table=='tbl_data_agen'){
				$array = array('id_cabang' => $kodecabang, 'verifikasi' => 0);
				$this->db->where($array);
				$this->db->group_by('kode_upload');
				$this->db->order_by('id');
			}
		}

		if($level=='3'){
			if($table=='tbl_data_agen'){
				$array = array('id_area' => $kodearea, 'verifikasi' => 0);
				$this->db->where($array);
				$this->db->group_by('kode_upload');
				$this->db->order_by('id');
			}
		}


		$i = 0;
		foreach ($column_search as $item){
			if(isset($_POST['search']['value'])){				
				if($i===0){
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])){
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}else if(isset($order)){
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	//get data table
	function get_datatables_detail($table,$column_order,$column_search,$order){
		$this->_get_datatables_query_detail($table,$column_order,$column_search,$order);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered_detail($table,$column_order,$column_search,$order)
	{
		$this->_get_datatables_query_detail($table,$column_order,$column_search,$order);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_detail($table)
	{
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	// list load data
	private function _get_datatables_query_detail($table,$column_order,$column_search,$order){
		$user = user_data('id');
		$kodeupload = $this->input->get('kodeupload',true);
		$pic = user_data('company');
		$kodepic = str_replace('p_', '', $pic);
		$kodecabang = str_replace('c_', '', $pic);
		$kodearea = str_replace('a_', '', $pic);
		$level = $this->session->userdata('group_id');
		$id_user = $this->session->userdata('id_user');
		$uname = $this->session->userdata('uname');
		$this->db->from($table);
		if($level != '1' && $table != 'tbl_cabang' && $table != 'tbl_area' && $table != 'tbl_pic' && $table != 'tbl_data_agen'){
			$this->db->where('id_user',$id_user);
		}

		if($level=='2'){
			if($table=='tbl_data_agen'){
				$this->db->where('kode_upload',$kodeupload);
				$this->db->order_by('id');
			}
		}

		if($level=='1'){
			if($table=='tbl_data_agen'){
				$this->db->where('kode_upload',$kodeupload);
				$this->db->order_by('id');
			}
		}

		if($level=='5'){
			if($table=='tbl_data_agen'){
				$array = array('id_pic' => $kodepic, 'kode_upload' => $kodeupload);
				$this->db->where($array);
				$this->db->order_by('id');
			}
		}

		if($level=='4'){
			if($table=='tbl_data_agen'){
				$array = array('id_cabang' => $kodecabang, 'kode_upload' => $kodeupload);
				$this->db->where($array);
				$this->db->order_by('id');
			}
		}

		if($level=='3'){
			if($table=='tbl_data_agen'){
				$array = array('id_area' => $kodearea, 'kode_upload' => $kodeupload);
				$this->db->where($array);
				$this->db->order_by('id');
			}
		}


		$i = 0;
		foreach ($column_search as $item){
			if(isset($_POST['search']['value'])){				
				if($i===0){
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])){
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}else if(isset($order)){
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	

	
	//get data table join
	function get_datatables_join($select,$table,$table2,$field1,$field2,$column_order,$column_search,$order){
		$this->_get_datatables_query_join($select,$table,$table2,$field1,$field2,$column_order,$column_search,$order);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered_join($select,$table,$table2,$field1,$field2,$column_order,$column_search,$order)
	{
		$this->_get_datatables_query_join($select,$table,$table2,$field1,$field2,$column_order,$column_search,$order);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_join($select,$table,$table2,$field1,$field2)
	{
		$level 		= $this->session->userdata('group_id');
		$id_user 	= $this->session->userdata('id_user');
		$this->db->join($table2.' b','a.'.$field1.'= b.'.$field2);
		$this->db->from($table.' a');
		if($level != '1' ){
			$this->db->where('a.id',$id_user);
		}
		return $this->db->count_all_results();
	}
	private function _get_datatables_query_join($select,$table,$table2,$field1,$field2,$column_order,$column_search,$order){
		$level = $this->session->userdata('group_id');
		$id_user = $this->session->userdata('id_user');
		$uname = $this->session->userdata('uname');
		$this->db->select($select);
		$this->db->join($table2.' b','a.'.$field1.'= b.'.$field2);
		$i = 0;
		foreach ($column_search as $item){
			if(isset($_POST['search']['value'])){				
				if($i===0){
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])){
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}else if(isset($order)){
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	
	
function cek_harga($harga_produk){
        $query = $this->db->query("select * from m_produk group  where id='$kd_produk'");
		return $query->result();
  	}

	function  getBulanHuruf($bln){
        switch  ($bln){
			case 1:return   "Januari";break;
			case 2:return   "Februari";break;
			case 3:return   "Maret";break;
			case 4:return   "April";break;
			case 5:return   "Mei";break;
			case 6:return   "Juni";break;
			case 7:return   "Juli";break;
			case 8:return   "Agustus";break;
			case 9:return   "September";break;
			case 10:return  "Oktober";break;
			case 11:return  "November";break;
			case 12:return  "Desember";break;
		}
    }
  }