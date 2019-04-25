<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data extends CI_Model {

    public $table = "t_mod";
	// public $tbl_chapter = "tbl_chapter";
	// public $tbl_chapter_detil = "tbl_chapter_detil";

	public function __construct()
    {
        parent::__construct();
	}
	
	function beda(){
		echo "hello";
	}

	function tiga(){
		
	}

	function data_modal(){ 
		$hasil=$this->db->query("SELECT * FROM t_mod order by mod_id desc");
		return $hasil->result();
    }
	// komik disini
	function tampil_ac(){ 
		$hasil=$this->db->query("SELECT * FROM v_kua6 limit 400");
		// $hasil=$this->db->query("SELECT * FROM perkara_akta_cerai where nomor_akta_cerai is not null order by no_seri_akta_cerai desc limit 500");
		// $hasil=$this->db->query("SELECT * FROM perkara_akta_cerai limit 500");
		return $hasil->result();
	}
	
	function data_ac(){
		$query = $this->db->query("SELECT * FROM v_kua6");
		return $query; 
} 

	function data_ac_paging($halaman, $offset){
		return $this->db->query("SELECT * FROM v_kua6 limit $halaman, $offset");
	}

	function cari($keyword){
		$this->db->select ('*');
		$this->db->from('v_kua6');
		$this->db->like('perkara_id',$keyword);
		$this->db->or_like('nomor_perkara',$keyword);
		$this->db->or_like('tgl_daftar',$keyword);
		$this->db->or_like('tgl_putus',$keyword);
		$this->db->or_like('pihak_p',$keyword);
		$this->db->or_like('pihak_t',$keyword);
		$this->db->or_like('jenis_perkara',$keyword);
		$this->db->or_like('nomor_akta_cerai',$keyword);
		$this->db->or_like('no_seri_akta_cerai',$keyword);
		$this->db->or_like('tgl_ac',$keyword);
		$this->db->or_like('faktor_perceraian_id',$keyword);
		return $this->db->get()->result();
	}
	// end komik
	function dashboard(){
		return $dash = $this->db->query("SELECT MONTH(tgl_akta_cerai) tanggal,
        CASE MONTH(tgl_akta_cerai) 
        WHEN 1 THEN 'Januari'
        WHEN 2 THEN 'Februari'
        WHEN 3 THEN 'Maret'
        WHEN 4 THEN 'April'
        WHEN 5 THEN 'Mei'
        WHEN 6 THEN 'Juni'
        WHEN 7 THEN 'Juli'      
        WHEN 8 THEN 'Agustus'  
        WHEN 9 THEN 'September'        
        WHEN 10 THEN 'Oktober'  
        WHEN 11 THEN 'November'        
        WHEN 12 THEN 'Desember'    
        END bulan
        , COUNT(*) jml
        FROM perkara_akta_cerai
        WHERE YEAR(tgl_akta_cerai) = YEAR(CURRENT_DATE)
		GROUP BY MONTH(tgl_akta_cerai);");
		
		// return $dash;
	}
}