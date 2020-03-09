<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Alumagubi_model extends CI_Model{
   function __construct(){
    parent::__construct();
    $this->load->model("api_model");
	}
   
   public function getAll( $table, $where ){
      return $this->db->get_where($table, $where)->row();
   }

   public function save( $data, $table ){
      $this->db->insert( $table, $data );
   }
  
}