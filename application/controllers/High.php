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
       $this->load->model('M_data');
    } 
  
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        echo "ngohahahaha";
        $query = $this->M_data->dashboard(); 
        // echo "<pre>";
        // var_dump($query->result());
        // exit();

        $data['click'] = json_encode(array_column($query->result(), 'jml'),JSON_NUMERIC_CHECK);
   
   
        print_r ($data);
   
        $this->load->view('hi', $data);
    }

    public function data(){
        $this->load->view ('data');
    }
}