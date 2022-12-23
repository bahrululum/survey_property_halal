<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function notfound(){
        $this->load->view('404');
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('modeldata');

    }
    public function index(){
            $this->db->initialize(); 
            $cek_referral   = $this->input->get('share');
            if ($cek_referral == '') {
                $referral   = 'default';
            }else{
                $referral   = $this->input->get('share');
            }
            $a['referral']     = $referral;
            $this->load->view('index',$a);
            $this->db->close(); 
    }
    public function error_halaman(){
            $this->db->initialize();
             $cek_referral   = $this->input->get('share');
            if ($cek_referral == '') {
                $referral   = 'default';
            }else{
                $referral   = $this->input->get('share');
            }
            $a['referral']     = $referral; 
            $this->load->view('error-halaman',$a);
            $this->db->close(); 
    }
    public function pertanyaan(){
            $this->db->initialize();
             $cek_referral   = $this->input->get('share');
            if ($cek_referral == '') {
                $referral   = 'default';
            }else{
                $referral   = $this->input->get('share');
            }
            $a['referral']     = $referral; 
            $a['id_survei']     = $this->uri->segment(2);
            $a['pertanyaan']    = $this->db->query("SELECT id,pertanyaan,status_p FROM m_pertanyaan WHERE status_p = 'aktif' ORDER BY id ASC");
            $this->load->view('pertanyaan',$a);
            $this->db->close(); 
    }
    public function terimakasih(){
            $this->db->initialize();
             $cek_referral   = $this->input->get('share');
            if ($cek_referral == '') {
                $referral   = 'default';
            }else{
                $referral   = $this->input->get('share');
            }
            $a['referral']     = $referral; 
            $kode_survei        = $this->uri->segment(2);
            $a['id_survei']     = $this->uri->segment(2);
            $a['user']    = $this->db->query("SELECT * FROM tbl_user_survei WHERE kode_survei = ".$kode_survei." ORDER BY id ");
            $this->load->view('terimakasih',$a);
            $this->db->close(); 
    }
    public function isi_data(){
            $this->db->initialize(); 
             $cek_referral   = $this->input->get('share');
            if ($cek_referral == '') {
                $referral   = 'default';
            }else{
                $referral   = $this->input->get('share');
            }
            $a['referral']     = $referral;
            $a['id_survei']     = $this->uri->segment(2);
            $this->load->view('isi-data',$a);
            $this->db->close(); 
    }   

    public function referral_informasi(){
            $this->db->initialize();
             $cek_referral   = $this->input->get('share');
            if ($cek_referral == '') {
                $referral   = 'default';
            }else{
                $referral   = $this->input->get('share');
            }
            $a['referral']      = $referral; 
            $kode_survei        = $this->uri->segment(2);
            $a['id_survei']     = $this->uri->segment(2);
            $a['user']    = $this->db->query("SELECT * FROM tbl_user_survei WHERE kode_survei = ".$kode_survei." ORDER BY id ");
            $a['aturan']    = $this->db->query("SELECT * FROM tbl_aturan_referral")->row('isi');
            $this->load->view('pengaturan-referral',$a);
            $this->db->close(); 
    }              
       
}



