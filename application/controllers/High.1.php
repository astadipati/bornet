<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class High extends CI_Controller {
   
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    } 
  
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $query = $this->db->query("SELECT MONTH(tgl_akta_cerai) tanggal,
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
        $data['click'] = json_encode(array_column($query->result(), 'jml'),JSON_NUMERIC_CHECK);
   
        // $query = $this->db->query("SELECT SUM(numberofview) as count FROM demo_viewer 
        //     GROUP BY YEAR(created_at) ORDER BY created_at"); 
        // $data['viewer'] = json_encode(array_column($query->result(), 'count'),JSON_NUMERIC_CHECK);
   
        $this->load->view('hi', $data);
    }

    public function data(){
        $this->load->view ('data');
    }
}