<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestServer/RestController.php';
require APPPATH . 'libraries/RestServer/Format.php';
use chriskacerguis\RestServer\RestController;

class Alumagubi extends RestController {

    function __construct() {
        parent::__construct();
    }

    function index_get(){
        $data = $this->uri->segment(3);
        $idx = $this->uri->segment(4);
        
        if( !empty($data) ){
            $this->db->select('*');
            
            if( $data == 'product' ){
                $table = 'test_1_product';

                $this->db->join('test_1_category', 'test_1_product.category_id = test_1_category.category_id');

                if( !empty($idx) ){
                    $this->db->where(array('id' => $idx));
                }
            }else if( $data == 'cat' ){
                $table = 'test_1_category';

                if( !empty($idx) ){
                    $this->db->where(array('category_id' => $idx));
                }
            }

            $this->db->from($table);

            $items = $this->db->get()->result();
        
            $this->response($items, 200);
        }
    }

    function index_post() {
        
    }

    function index_put() {

    }

    function index_delete() {

    }
}
