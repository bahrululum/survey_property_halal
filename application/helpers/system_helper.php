<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('set_header_message'))
{
	function set_header_message($tipe,$title,$message)
	{
		$CI=& get_instance();
		
		$CI->session->set_flashdata('message_header',array(
		'tipe'=>$tipe,
		'title'=>$title,
		'message'=>$message,
		));				
	}
}
if(!function_exists('cek_akses')){
	function cek_akses($group_id,$tipe='error',$title='Akses Ditolak',$message='Anda tidak memiliki akses ke halaman tersebut...!!',$redirect='dashboard'){
		$CI = & get_instance();
		$CI->load->library('ion_auth');
		if(!$CI->ion_auth->in_group($group_id)){
			set_header_message($tipe,$title,$message);
			redirect($redirect,'refresh');
		}
	}
}

if(!function_exists('user_id'))
{
	function user_id()
	{
		$CI = & get_instance();
		$CI->load->library('ion_auth');
		$user_id = $CI->ion_auth->get_user_id();
		return $user_id;
	}
}

if(!function_exists('user_group'))
{
	function user_group($item)
	{
		$CI = & get_instance();
		$CI->load->library('ion_auth');
		$user_id = $CI->ion_auth->get_user_id();
		$group = $CI->ion_auth->get_users_groups($user_id)->row();
		$user_group = $group->$item;
		return $user_group;
	}
}

if(!function_exists('user_email'))
{
	function user_email($userid=null)
	{
		$CI = & get_instance();
		$CI->load->library('ion_auth');
		if(empty($userid)){
			$user_id = $CI->ion_auth->get_user_id();
		}else{
			$user_id = $userid;
		}		
		$item = $CI->db->query("select email from users where id = '$user_id'")->row('email');
		return $item;
	}
}

if(!function_exists('get_refferal_user'))
{
	function get_refferal_user($userid=null)
	{
		$CI = & get_instance();
		$CI->load->library('ion_auth');
		if(empty($userid)){
			$user_id = $CI->ion_auth->get_user_id();
		}else{
			$user_id = $userid;
		}		
		$item = $CI->db->query("select kode from tbl_refferal where user_id = '$user_id'")->row('kode');
		return $item;
	}
}

if(!function_exists('user_data'))
{
	function user_data($field,$userid=null)
	{
		$CI = & get_instance();
		$CI->load->library('ion_auth');
		if(empty($userid)){
			$user_id = $CI->ion_auth->get_user_id();
		}else{
			$user_id = $userid;
		}		
		$item = $CI->db->get_where('users',array('id' => $user_id))->row($field);
		return $item;
	}
}

if(!function_exists('user_name'))
{
	function user_name($userid=null)
	{
		$CI = & get_instance();
		$CI->load->library('ion_auth');
		if(empty($userid)){
			$user_id = $CI->ion_auth->get_user_id();
		}else{
			$user_id = $userid;
		}		
		$f = $CI->db->query("select first_name from users where id = '$user_id'")->row('first_name');
		$l = $CI->db->query("select last_name from users where id = '$user_id'")->row('last_name');
		$item = $f.' '.$l;
		return $item;
	}
}

if(!function_exists('user_foto'))
{
	function user_foto($userid=null)
	{
		$CI = & get_instance();
		$CI->load->library('ion_auth');
		if(empty($userid)){
			$user_id = $CI->ion_auth->get_user_id();
		}else{
			$user_id = $userid;
		}		
		$q = $CI->db->query("select foto from users where id = '$user_id'")->row('foto');
		$fotofile = base_url('assets/img/avatar/'.$q);
		$pathPhoto=FCPATH.'assets/img/avatar/'.$q;
		if(!file_exists($pathPhoto) && !file_exists($pathPhoto)){
			$fotofile=base_url('assets/img/avatar/user.png');
		}
		return $fotofile;
	}
}

if(!function_exists('menu_active'))
{
	function menu_active($slug2)
	{
		$CI=& get_instance();
		$s=$CI->uri->segment(2);
		if($slug2==$s)
		{
			return true;
		}else{
			return false;
		}
	}
}

if(!function_exists('sub_menu_active'))
{
	function sub_menu_active($slug3)
	{
		$CI=& get_instance();
		$s=$CI->uri->segment(3);
		if($slug3==$s)
		{
			return true;
		}else{
			return false;
		}
	}
}

if(!function_exists('tema_logo'))
{
	function tema_logo()
	{
		$biasa=base_url().'assets/images/logo.png';
		$foto=baca_konfig('tema-logo');
		$fotofile=base_url().'assets/images/'.$foto;
		if(@getimagesize($fotofile))
		{
			return $fotofile;
		}else{
			return $biasa;
		}
		
	}
}

if(!function_exists('add_css'))
{
	function add_css($url)
	{
		$tmp='<link rel="stylesheet" href="'.$url.'">';
		return $tmp;
	}
}

if(!function_exists('add_js'))
{
	function add_js($url)
	{
		$tmp='<script src="'.$url.'"></script>';
		return $tmp;
	}
}

if(!function_exists('string_create_slug')){
	function string_create_slug($text)
	{	  
	  if (empty($text))
	  {
		return '';
	  }else{
	  	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	  	$text = trim($text, '-');
	  	//$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  	$text = strtolower($text);
	  	$text = preg_replace('~[^-\w]+~', '', $text);
	  	return $text;
	  }
	  
	}
}

if(!function_exists('string_word_limit')){
	function string_word_limit($str,$limit=20,$comaDelimiter=FALSE){
		$CI=& get_instance();
		$CI->load->helper('text');
		$item="";
		if($comaDelimiter==TRUE)
		{
			$item=word_limiter($str,$limit);
		}else{
			$item=word_limiter($str,$limit,"");
		}
		return $item;
	}
}

if(!function_exists('field_value'))
{
	function field_value($table,$key,$keyval,$output)
	{
		$CI=& get_instance();
		$item=$CI->db->query("select $output from $table where $key='$keyval'")->row($output);
		return $item;
	}
}
if(!function_exists('count_data'))
{
	function count_data($table,$where=array())
	{
		$CI=& get_instance();
		if(!empty($where)){
			$CI->db->where($where);
		}
		$sql = $CI->db->get($table);
		$count=$sql->num_rows(); 
		return $count;
		$this->db->close();
        $this->db->initialize(); 
	}
}

if(!function_exists('sum_data'))
{
	function sum_data($table,$where=array(),$field)
	{
		$CI=& get_instance();
		if(!empty($where)){
			$CI->db->where($where);
		}
		$CI->db->select_sum($field);
		$sql = $CI->db->get($table);
		if($sql->num_rows() > 0){
			return $sql->row()->$field;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists('string_implode_array'))
{
	function string_implode_array($attributes)
	{
		if (empty($attributes))
		{
			return '';
		}

		if (is_object($attributes))
		{
			$attributes = (array) $attributes;
		}

		if (is_array($attributes))
		{
			$atts = '';

			foreach ($attributes as $key => $val)
			{
				$atts .= ' '.$key.'="'.$val.'"';
			}

			return $atts;
		}

		if (is_string($attributes))
		{
			return ' '.$attributes;
		}

		return FALSE;
	}
}

if(!function_exists('com_select_bulan'))
{
	function com_select_bulan($name,$firstvalue='',$att=array())
	{
		$arr=array(
		'1'=>'Januari',
		'2'=>'Februari',
		'3'=>'Maret',
		'4'=>'April',
		'5'=>'Mei',
		'6'=>'Juni',
		'7'=>'Juli',
		'8'=>'Agustus',
		'9'=>'September',
		'10'=>'Oktober',
		'11'=>'November',
		'12'=>'Desember',
		);
		$o='';
		$attribute="";
		if(!empty($att))
		{
			$attribute=string_implode_array($att);
		}
		$o.='<select name="'.$name.'" '.$attribute.'>';
		foreach($arr as $k=>$v)
		{
			$js='';
			if($firstvalue==$k)
			{
				$js=' selected="selected"';
			}
			$o.='<option value="'.$k.'"'.$js.'>'.$v.'</option>';
		}
		$o.='</select>';
		return $o;
	}
}

if(!function_exists('date_month_name')){
	function date_month_name($bulan)
	{
		$mons = array(1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember");

		$ft= strtr($bulan, $mons);
		return $ft;
	}
}

if(!function_exists('bulan_indo')){
	function bulan_indo($bulan)
	{
		$mons = array("1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");

		$ft= strtr($bulan, $mons);
		return $ft;
	}
}

if(!function_exists('timeAgo')){
	function timeAgo($timestamp){
	    $time = time() - $timestamp;

	    if ($time < 60)
	    return ( $time > 1 ) ? $time . ' detik yang lalu' : 'satu detik';
	    elseif ($time < 3600) {
	    $tmp = floor($time / 60);
	    return ($tmp > 1) ? $tmp . ' menit yang lalu' : ' satu menit yang lalu';
	    }
	    elseif ($time < 86400) {
	    $tmp = floor($time / 3600);
	    return ($tmp > 1) ? $tmp . ' jam yang lalu' : ' satu jam yang lalu';
	    }
	    elseif ($time < 2592000) {
	    $tmp = floor($time / 86400);
	    return ($tmp > 1) ? $tmp . ' hari lalu' : ' satu hari lalu';
	    }
	    elseif ($time < 946080000) {
	    $tmp = floor($time / 2592000);
	    return ($tmp > 1) ? $tmp . ' bulan lalu' : ' satu bulan lalu';
	    }
	    else {
	    $tmp = floor($time / 946080000);
	    return ($tmp > 1) ? $tmp . ' years' : ' a year';
	    }
    }
}

if(!function_exists('url_encode')){
	function url_encode($input){
		return strtr(base64_encode($input), '+/=', '-_;?>');
	}
}

if(!function_exists('url_decode')){
	function url_decode($input){
		return base64_decode(strtr($input, '-_;?>', '+/='));
	}
}

if(!function_exists('notif_sms')){
	function notif_sms($no_tlp,$isi_pesan){
		if(sisa_kredit() > 3){
			$CI=& get_instance();
			$no_hp = format_hp($no_tlp);
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'http://api.nusasms.com/api/v3/sendsms/plain',
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => array(
					'user' => 'magaugroup_api',
					'password' => '3N7G8f8',
					'SMSText' => $isi_pesan,
					'GSM' => $no_hp,
					'output'=> 'json'
				)
			));

			$resp = curl_exec($curl);

			if (!$resp) {
				die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
			} else {
				$data = json_decode($resp, true);
				$sms_stat = $data['results'][0]['status'];
				
				$sms_char 	= strlen($isi_pesan);
				$sms_bagi	= $sms_char / 150;
				$sms_kredit	= ceil($sms_bagi);
				$data_sms	= array(
					'tujuan'	=> $no_tlp,
					'pesan'		=> rawurldecode($isi_pesan),
					'kredit'	=> $sms_kredit,
					'status'	=> $sms_stat,
					'tanggal'	=> date('Y-m-d H:i:s'),
				);
				$CI->db->insert('tbl_sms',$data_sms);
				
				return $sms_stat;
			}
			curl_close($curl);
		}else{
			$stat = '-2';
			return $stat;
		}
    }
}
// xss
function cetak($str){
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

/* make a URL small */
function make_bitly_url($url,$format = 'xml',$version = '3'){
	$bitly = 'https://api-ssl.bitly.com/shorten?v'.$version.'&longUrl='.urlencode($url).'&access_token=f4635aacbaad10bc9d93ad7206268a16c4ea3f69&format='.$format;
	$response = file_get_contents($bitly);
	if(strtolower($format) == 'json')
	{
		$json = @json_decode($response,true);
		return $json['results'][$url]['shortUrl'];
	}
	else //xml
	{
		$xml = simplexml_load_string($response);
		return 'https://bit.ly/'.$xml->results->nodeKeyVal->hash;
	}
}

function getStartAndEndDate($week, $year) {
  $dto = new DateTime();
  $dto->setISODate($year, $week);
  $ret['week_start'] = $dto->format('Y-m-d');
  $dto->modify('+6 days');
  $ret['week_end'] = $dto->format('Y-m-d');
  return $ret;
}

function strip_tags_content($text, $tags = '', $invert = FALSE) { 

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
  $tags = array_unique($tags[1]); 
    
  if(is_array($tags) AND count($tags) > 0) { 
    if($invert == FALSE) { 
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text); 
    } 
    else { 
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text); 
    } 
  } 
  elseif($invert == FALSE) { 
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); 
  } 
  return $text; 
} 

function format_hp($nohp) {
	// kadang ada penulisan no hp 0811 239 345
	$nohp = str_replace(" ","",$nohp);
	// kadang ada penulisan no hp (0274) 778787
	$nohp = str_replace("(","",$nohp);
	// kadang ada penulisan no hp (0274) 778787
	$nohp = str_replace(")","",$nohp);
	// kadang ada penulisan no hp 0811.239.345
	$nohp = str_replace(".","",$nohp);
	// kadang ada penulisan no hp 0811-239-345
	$nohp = str_replace("-","",$nohp);
	// Hilangkan tanda + di depan
	$nohp = str_replace("+","",$nohp);

	// cek apakah no hp mengandung karakter + dan 0-9
	if(!preg_match('/[^+0-9]/',trim($nohp))){
		// cek apakah no hp karakter 1-2 adalah 62
		if(substr(trim($nohp), 0, 2)=='62'){
			$hp = trim($nohp);
		}
		// cek apakah no hp karakter 1 adalah 0
		elseif(substr(trim($nohp), 0, 1)=='0'){
			$hp = '62'.substr(trim($nohp), 1);
		}else{
			$hp = '62'.trim($nohp);
		}
	}else{
		$hp = $nohp;
	}
	return $hp;
}

if(!function_exists('base64_url_encode')){
	function base64_url_encode($input){
		$base_64 = base64_encode($input);
		return rtrim($base_64, '=');
	}
}

if(!function_exists('base64_url_decode')){
	function base64_url_decode($input){
		$base_64 = $input . str_repeat('=', strlen($input) % 4);
		return base64_decode($base_64);
	}
}

if(!function_exists('wa_rawurlencode')){
	function wa_rawurlencode($input){
		return rawurlencode($input);
	}
}

if(!function_exists('sisa_kredit')){
	function sisa_kredit(){
		$CI=& get_instance();
		$kredit = $CI->db->query('select kredit from tbl_smskredit')->row('kredit');
		$pakai = $CI->db->query('select sum(kredit) as pakai from tbl_sms')->row('pakai');
		return $kredit - $pakai;
	}
}

function tambah_jam_sql($menit) {
	$str = "";
	if ($menit < 60) {
		$str = "00:".str_pad($menit, 2, "0", STR_PAD_LEFT).":00";
	} else if ($menit >= 60) {
		$mod = $menit % 60;
		$bg = floor($menit / 60);
		$str = str_pad($bg, 2, "0", STR_PAD_LEFT).":".str_pad($mod, 2, "0", STR_PAD_LEFT).":00";
	} 
	return $str;
}

function tampil_media($file,$width="320px",$height="240px") {
	$ret = '';

	$pc_file = explode(".", $file);
	$eks = end($pc_file);

	$eks_video = array("mp4","flv","mpeg");
	$eks_audio = array("mp3","acc");
	$eks_image = array("jpeg","jpg","gif","bmp","png");


	if (!in_array($eks, $eks_video) && !in_array($eks, $eks_audio) && !in_array($eks, $eks_image)) {
		$ret .= '';
	} else {
		if (in_array($eks, $eks_video)) {
			if (is_file("./".$file)) {
				$ret .= '<p><video width="'.$width.'" height="'.$height.'" controls>
				  <source src="'.base_url().$file.'" type="video/mp4">
				  <source src="'.base_url().$file.'" type="application/octet-stream">Browser tidak support</video></p>';
			} else {
				$ret .= '';
			}
		} 

		if (in_array($eks, $eks_audio)) {
			if (is_file("./".$file)) {
				$ret .= '<p><audio width="'.$width.'" height="'.$height.'" controls>
				<source src="'.base_url().$file.'" type="audio/mpeg">
				<source src="'.base_url().$file.'" type="audio/wav">Browser tidak support</audio></p>';
			} else {
				$ret .= '';
			}
		}

		if (in_array($eks, $eks_image)) {
			if (is_file("./".$file)) {
				$ret .= '<div class="gambar"><img src="'.base_url().$file.'" style="width: '.$width.'; height: '.$height.'; display: inline; float: left"></div>';
			} else {
				$ret .= '';
			}
		}
	}
	

	return $ret;
}

function j($data) {
	header('Content-Type: application/json');
	echo json_encode($data);
}

function tjs ($tgl, $tipe) {
	if ($tgl != "0000-00-00 00:00:00") {
		$pc_satu	= explode(" ", $tgl);
		if (count($pc_satu) < 2) {	
			$tgl1		= $pc_satu[0];
			$jam1		= "";
		} else {
			$jam1		= $pc_satu[1];
			$tgl1		= $pc_satu[0];
		}

		$pc_dua		= explode("-", $tgl1);
		$tgl		= $pc_dua[2];
		$bln		= $pc_dua[1];
		$thn		= $pc_dua[0];

		$bln_pendek		= array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");
		$bln_panjang	= array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$bln_angka		= intval($bln) - 1;

		if ($tipe == "l") {
			$bln_txt = $bln_panjang[$bln_angka];
		} else if ($tipe == "s") {
			$bln_txt = $bln_pendek[$bln_angka];
		}

		return $tgl." ".$bln_txt." ".$thn."  ".$jam1;
	} else {
		return "Tgl Salah";
	}
}

function tji ($tgl, $tipe) {
	if ($tgl != "0000-00-00 00:00:00") {
		$pc_satu	= explode(" ", $tgl);
		if (count($pc_satu) < 2) {	
			$tgl1		= $pc_satu[0];
			$jam1		= "";
		} else {
			$jam1		= $pc_satu[1];
			$tgl1		= $pc_satu[0];
		}

		$pc_dua		= explode("-", $tgl1);
		$tgl		= $pc_dua[2];
		$bln		= $pc_dua[1];
		$thn		= $pc_dua[0];

		$bln_pendek		= array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");
		$bln_panjang	= array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$bln_angka		= intval($bln) - 1;

		if ($tipe == "l") {
			$bln_txt = $bln_panjang[$bln_angka];
		} else if ($tipe == "s") {
			$bln_txt = $bln_pendek[$bln_angka];
		}

		return $tgl." ".$bln_txt." ".$thn;
	} else {
		return "Tgl Salah";
	}
}

function hari($wekday) {
	$hari	= array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu","Minggu");
	return $hari[$wekday];
}

function terbilang($bilangan){
	$bilangan = abs($bilangan);

	$angka 	= array("Nol","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
	$temp 	= "";

	if($bilangan < 12){
		$temp = " ".$angka[$bilangan];
	}else if($bilangan < 20){
		$temp = terbilang($bilangan - 10)." belas";
	}else if($bilangan < 100){
		$temp = terbilang($bilangan/10)." puluh".terbilang($bilangan%10);
	}else if ($bilangan < 200) {
		$temp = " seratus".terbilang($bilangan - 100);
	}else if ($bilangan < 1000) {
		$temp = terbilang($bilangan/100). " ratus". terbilang($bilangan % 100);
	}else if ($bilangan < 2000) {
		$temp = " seribu". terbilang($bilangan - 1000);
	}else if ($bilangan < 1000000) {
		$temp = terbilang($bilangan/1000)." ribu". terbilang($bilangan % 1000);
	}else if ($bilangan < 1000000000) {
		$temp = terbilang($bilangan/1000000)." juta". terbilang($bilangan % 1000000);
	}

	return $temp;
}

function obj_to_array($obj, $pilih) {
	$pilihpc	= explode(",", $pilih);
	$array 		= array(""=>"-");

	foreach ($obj as $o) {
		$xx = $pilihpc[0];
		$x = $o->$xx;
		$y = $pilihpc[1];

		$array[$x] = $o->$y; 
	}

	return $array;
}
