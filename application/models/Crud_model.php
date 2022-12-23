<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Crud_model extends CI_Model{
	function __construct(){
	   $this->load->database();	
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
	function get_db($table,$field,$value){
		$query = $this->db->get_where($table,array($field=>$value));
		return $query;
	}
     public function get_current_page($limit=null, $start=null, $caribimbingan=null, $carilokasi=null) {
      	 $this->db->limit($limit, $start);
       	 $this->db->select(array('a.id','a.kode_guru','a.ktp','d.foto','a.nama_lengkap','a.alamat','a.email','a.no_handphone','a.universitas','b.bimbingan','b.kategori','c.name','a.username','a.password','a.created'))
		->from('tbl_guru_private a')
		->join('tbl_kelas_bimbingan b', 'b.id = a.produk','left')
		->join('regencies c', 'c.id = a.lokasi_reg', 'left')
		->join('users d', 'd.company = a.kode_guru', 'left'  )
		->where("a.status ='Aktif' and b.bimbingan  like '%$caribimbingan%' and c.name like '%$carilokasi%'");
				     
        $query = $this->db->get();
        $rows = $query->result();
 
        if ($query->num_rows() > 0) {
            foreach ($rows as $row) {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }

	 public function get_current_page1($limit, $start) {
	 	 $produkblc      = user_data('produk');
        $this->db->limit($limit, $start);
        $this->db->select(array('id','nm_modul','kd_embed','slug','banner'))
                ->from('tbl_modul')
                ->where("tipe_modul ='1' and kd_produk  like '%$produkblc%' ");
        $query = $this->db->get();
        $rows = $query->result();
 
        if ($query->num_rows() > 0) {
            foreach ($rows as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
        	return false;
        }
 
      	
    }
	 public function get_current_page2($limit, $start) {
		 $produkblc      = user_data('produk');
		 $video          = $this->input->get('video');
		 if ($produkblc == '2'){
        $this->db->limit($limit, $start);
        $this->db->select(array('id','nm_modul','kd_embed','slug','banner'))
                ->from('tbl_modul')
                ->where("tipe_modul ='2' and kd_produk like '%$produkblc%' and jenis_modul in ('TWK','TIU','TKP') and jenis_modul like'%$video%'");
        $query = $this->db->get();
		$rows = $query->result();
		 }elseif ($produkblc == '6'){
			$this->db->limit($limit, $start);
			$this->db->select(array('id','nm_modul','kd_embed','slug','banner'))
					->from('tbl_modul')
					->where("tipe_modul ='2' and kd_produk like '%$produkblc%' and jenis_modul in ('TWK','TIU','TKP','TBI','TPA') and jenis_modul like'%$video%'");
			$query = $this->db->get();
			$rows = $query->result();
		 }else{
			$this->db->limit($limit, $start);
			$this->db->select(array('id','nm_modul','kd_embed','slug','banner'))
					->from('tbl_modul')
					->where("tipe_modul ='2' and kd_produk like '%$produkblc%' and jenis_modul in ('TWK','TIU','TKP','TBI','TPA') and jenis_modul like'%$video%'");
			$query = $this->db->get();
			$rows = $query->result();
		 }
 
        if ($query->num_rows() > 0) {
            foreach ($rows as $row) {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
    public function get_current_page3($limit, $start) {
		  $produkblc      = user_data('produk');
		  $video          = $this->input->get('video');
        $this->db->limit($limit, $start);
        $this->db->select(array('id','nm_modul','kd_embed','slug','banner','jenis_modul'))
                ->from('tbl_modul')
                ->where("tipe_modul ='3' and kd_produk like '%$produkblc%' and jenis_modul in ('TWK','TIU','TKP') and jenis_modul like'%$video%' ");
        $query = $this->db->get();
        $rows = $query->result();
 
        if ($query->num_rows() > 0) {
            foreach ($rows as $row) {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
	}
	function cek_db_video($table,$field,$value){
		$cek_data = $this->db->get_where($table,array($field=>$value));
		return $cek_data;
	}
	public function get_current_page4($limit, $start) {
		$produkblc      = user_data('produk');
		$video          = $this->input->get('video');
	  $this->db->limit($limit, $start);
	  $this->db->select(array('id','nm_modul','kd_embed','slug','banner','jenis_modul'))
			  ->from('tbl_modul')
			  ->where("tipe_modul ='3' and kd_produk like '%$produkblc%' and jenis_modul in ('TBI','TPA') and jenis_modul like'%$video%' ");
	  $query = $this->db->get();
	  $rows = $query->result();

	  if ($query->num_rows() > 0) {
		  foreach ($rows as $row) {
			  $data[] = $row;
		  }
		   
		  return $data;
	  }

	  return false;
  }

	public function get_current_page6($limit, $start,$video) {
		$produkblc      = user_data('produk');
		$this->db->limit($limit, $start);
		$this->db->select(array('id','nm_modul','kd_embed','slug','banner','jenis_modul','nomor_urut'))
			->from('tbl_modul')
			->where("tipe_modul ='3' and kd_produk like '%$produkblc%' and  jenis_modul like'%$video%' ")
			->order_by('id', 'ASC');
		$query = $this->db->get();
		$rows = $query->result();
		if ($query->num_rows() > 0) {
			foreach ($rows as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function get_current_page5($limit, $start) {
		$produkblc      = user_data('produk');
		$video 			= $this->input->get('video');
		$this->db->limit($limit, $start);
		$this->db->select(array('id','nm_modul','kd_embed','slug','banner','jenis_modul'))
			->from('tbl_modul')
			->where("tipe_modul ='3' and kd_produk like '%$produkblc%' and  jenis_modul like'%$video%' ")
			->order_by('id', 'ASC');
		$query = $this->db->get();
		$rows = $query->result();
		if ($query->num_rows() > 0) {
			foreach ($rows as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
 
     
    public function count_all($query)
  {
      return $query->count_all_results();
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
	function hapus($table,$where){
		$this->db->where($where);
		$del = $this->db->delete($table);
		if($del){
			return '1';
		}else{
			return '2';
		}
	}
	function get_edit($id,$pk,$table){
		$d=$this->db->query("SELECT * from $table where $pk='$id'");
		return $d->result();
	}
	function get_where($table,$where,$order=null){
		if(empty($order)){
			$d=$this->db->get_where($table,$where);
		}else{
			$d=$this->db->where($where)->order_by($order)->get($table);
		}
		return $d->result();
	}
	function get_modul($table,$kategori,$field){
		$d=$this->db->query("select * from $table where $kategori = '$field' order by kd_modul asc");
		return $d->result();
	}
	function maxNomor($table,$field,$unik){
		$lupdate 	= date("Ymd");
		$random		= $this->acak(5);
		return $unik.$lupdate.$random;
	}

	function acak($panjang){
  		$karakter= '0123456789';
  		$string = '';
  		for ($i = 0; $i < $panjang; $i++) {
   		$pos = rand(0, strlen($karakter)-1);
   		$string .= $karakter{$pos};
  		}
  		return $string;
 		}
	
	function get_all_data($table,$order){
		if(empty($order)){
			$d=$this->db->query("SELECT * from $table");
		}else{
			$d=$this->db->query("SELECT * from $table order by $order");
		}
		return $d->result();
	}
	
	function get_detail_question($kd_tanya){
		return $this->db->query("SELECT CONCAT(b.first_name,' ',b.last_name) AS nama, b.foto, b.email, a.* FROM tbl_question a,users b WHERE a.kd_tanya = '$kd_tanya' AND b.id = a.user_id")->result();
	}
	function get_jawaban($kd_tanya){
		return $this->db->query("SELECT CONCAT(b.first_name,' ',b.last_name) AS nama, b.foto, b.email, a.* FROM tbl_reply a,users b WHERE a.kd_tanya = '$kd_tanya'  AND b.id = a.user_id order by a.kd_reply asc")->result();
	}
	function accept_fee_register($kode){
		return $this->db->query("SELECT kd_daftar, nama, biaya, tanggal, tbl_daftar.kd_refferal, tbl_produk.kd_produk, harga_register, (SELECT CONCAT(first_name, ' ', last_name) FROM users WHERE kd_refferal = tbl_daftar.kd_refferal) AS nm_refferal, (SELECT id FROM users WHERE kd_refferal = tbl_daftar.kd_refferal) AS userid_affiliate FROM tbl_daftar INNER JOIN tbl_produk ON tbl_produk.kd_produk = tbl_daftar.kd_produk WHERE status = 'Selesai' AND kd_daftar =  '$kode'")->row();
	}
	function detail_fee_register($kd_regis_renew){
		return $this->db->query("SELECT a.kd_komisi, a.kd_regis_renew, userid_penerima, (SELECT CONCAT(first_name, ' ', last_name) FROM users WHERE id = a.userid_penerima) AS penerima, (SELECT nama FROM tbl_daftar WHERE kd_daftar = a.kd_regis_renew) AS member, (SELECT nm_produk FROM tbl_produk WHERE kd_produk = a.kd_produk) AS produk, a.tgl_accept, a.jml_komisi, a.status FROM tbl_komisi a WHERE a.kd_regis_renew = '$kd_regis_renew' order by a.kd_komisi asc")->result();
	}
	
	
	// Notifikasi
	function notif_count() {
		$user_id = $this->ion_auth->get_user_id();
		if($this->ion_auth->is_admin()){
			$query = $this->db->query("select count(*) as jml from notifikasi where status = '0' and user_id = '1' ");
		}else{
			$query = $this->db->query("select count(*) as jml from notifikasi where status = '0' and user_id = '$user_id' ");
		}
        return $query->row('jml');
	}
    function getnotifikasi() {
        $user_id = $this->ion_auth->get_user_id();
		if($this->ion_auth->is_admin()){
			$query = $this->db->query("select * from notifikasi where status = '0' and user_id = '1' order by id desc limit 5");
		}else{
			$query = $this->db->query("select * from notifikasi where status = '0' and user_id = '$user_id' order by id desc limit 5");
		}
        if ($query->num_rows() >0) {
            return $query->result();
        }
    }
	
	
	// Laporan
	function peringkat($star,$end){
		$query = $this->db->query("SELECT b.jns_user,
				  b.first_name as nama,
				  SUM(a.jumlah) AS komisi,
				  COUNT(a.id) AS jml 
				FROM
				  tbl_komisi a 
				  LEFT JOIN users b 
					ON b.id = a.user_id 
				WHERE  b.jns_user = 'affiliate'	and a.user_id<>1
				  AND DATE(a.`created`) >= '$star' 
				  AND DATE(a.`created`) <= '$end' 
				GROUP BY a.user_id 
				ORDER BY komisi DESC 
				LIMIT 10 
		");
		return $query->result();
	}
	function subaff_peringkat($star,$end){
		$query = $this->db->query("SELECT b.jns_user,
				  b.first_name as nama,
				  SUM(a.jumlah) AS komisi,
				  COUNT(a.id) AS jml 
				FROM
				  tbl_komisi a 
				  LEFT JOIN users b 
					ON b.id = a.user_id 
				WHERE  b.jns_user = 'sub-affiliate'	
				  AND DATE(a.`created`) >= '$star' 
				  AND DATE(a.`created`) <= '$end' 
				GROUP BY a.user_id 
				ORDER BY jml DESC 
				LIMIT 10 
		");
		return $query->result();
	}
	function lap_afiliasi($star,$end,$refferal){
		$query = $this->db->query("SELECT
			(SELECT id FROM users WHERE kd_refferal = a.kd_refferal) AS userid,
			(SELECT first_name FROM users WHERE kd_refferal = a.kd_refferal) AS fmember,
			(SELECT last_name FROM users WHERE kd_refferal = a.kd_refferal) AS lmember,
			(SELECT COUNT(id) FROM tbl_daftar WHERE DATE(tanggal) >= '$star' AND DATE(tanggal) <= '$end' AND kd_refferal = a.kd_refferal) AS total,
			(SELECT COUNT(id) FROM tbl_daftar WHERE DATE(tanggal) >= '$star' AND DATE(tanggal) <= '$end' AND kd_refferal = a.kd_refferal AND status = 'selesai') AS selesai,
			(SELECT COUNT(id) FROM tbl_daftar WHERE DATE(tanggal) >= '$star' AND DATE(tanggal) <= '$end' AND kd_refferal = a.kd_refferal AND jenis = 'free') AS free,
			(SELECT COUNT(id) FROM tbl_daftar WHERE DATE(tanggal) >= '$star' AND DATE(tanggal) <= '$end' AND kd_refferal = a.kd_refferal AND jenis = 'member') AS member,
			(SELECT COUNT(id) FROM tbl_daftar WHERE DATE(tanggal) >= '$star' AND DATE(tanggal) <= '$end' AND kd_refferal = a.kd_refferal AND jenis = 'renew') AS renew,
			(SELECT COUNT(id) FROM tbl_daftar WHERE DATE(tanggal) >= '$star' AND DATE(tanggal) <= '$end' AND kd_refferal = a.kd_refferal AND jenis != 'renew') AS register
			FROM tbl_daftar a
			WHERE DATE(a.tanggal) >= '$star' AND DATE(a.tanggal) <= '$end' AND  kd_refferal LIKE '%$refferal%' ESCAPE '!'
			GROUP BY a.kd_refferal
			ORDER BY a.kd_refferal ASC 
		");
		return $query->result();
	}
	function lap_withdraw($star,$end,$userid){
		$query = $this->db->query("
			SELECT 
			(SELECT first_name FROM users WHERE id = a.user_id) AS fname,
			(SELECT last_name FROM users WHERE id = a.user_id) AS lname,
			SUM(a.amount) AS amount,
			COUNT(a.id) AS total 
			FROM tbl_withdraw a
			WHERE DATE(a.tanggal) >= '$star' AND DATE(a.tanggal) <= '$end' AND  a.user_id LIKE '%$userid%' ESCAPE '!' AND a.status = 'paid'
			GROUP BY a.user_id
		");
		return $query->result();
	}
	function lap_komisi($star,$end,$userid){
		$query = $this->db->query("
			SELECT 
			  b.first_name AS fname,
			  b.last_name AS lname,
			  SUM(a.jml_komisi) AS komisi,
			  jmlwd,
			  withdraw,
			  total_member,
			  jumlah_komisi 
			FROM
			  tbl_komisi a 
			  LEFT JOIN users b 
				ON b.id = a.userid_penerima 
			  LEFT JOIN 
				(SELECT 
				  p.user_id,
				  COUNT(*) AS jmlwd,
				  SUM(p.amount) AS withdraw 
				FROM
				  tbl_withdraw p 
				WHERE p.status = 'paid' 
				GROUP BY p.user_id) AS r 
				ON r.user_id = a.userid_penerima 
			  LEFT JOIN 
				(SELECT 
				  q.userid_penerima,
				  COUNT(*) AS total_member,
				  SUM(q.jml_komisi) AS jumlah_komisi 
				FROM
				  tbl_komisi q 
				WHERE DATE(q.tgl_accept) >= '$star' 
				  AND DATE(q.tgl_accept) <= '$end'
				GROUP BY q.userid_penerima) AS s 
				ON s.userid_penerima = a.userid_penerima 
			GROUP BY a.userid_penerima  
		");
		return $query->result();
	}
	function lap_pendapatan($star,$end,$produk){
		if($produk == 'all'){
			
		}
		
		// return $query->result();
	}
}