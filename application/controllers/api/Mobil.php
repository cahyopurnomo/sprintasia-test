<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestServer/RestController.php';
require APPPATH . 'libraries/RestServer/Format.php';
use chriskacerguis\RestServer\RestController;

class Mobil extends RestController {

    function __construct() {
        parent::__construct();
    }

    function index_get(){
        $idx = $this->uri->segment(3);
        
        if( $idx != '' && $idx > 0 ){
            $this->db->where(array('IDX' => $idx));
        }

        $mobil = $this->db->get('tblKendaraan')->result();
        
        $this->response($mobil, 200);
    }

    function index_post() {
        $data = array(
                        'NO_RANGKA'     => $this->post('NO_RANGKA'),
                        'NO_POLISI'     => $this->post('NO_POLISI'),
                        'MEREK'         => $this->post('MEREK'),
                        'TIPE'          => $this->post('TIPE'),
                        'TAHUN'         => $this->post('TAHUN')
                    );

        $insert = $this->db->insert('tblKendaraan', $data);

        if( $insert ) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'Insert Failed', 502));
        }
    }

    function index_put() {
        $idx = $this->put('IDX');
        $data = array(
                        'NO_RANGKA'     => $this->put('NO_RANGKA'),
                        'NO_POLISI'     => $this->put('NO_POLISI'),
                        'MEREK'         => $this->put('MEREK'),
                        'TIPE'          => $this->put('TIPE'),
                        'TAHUN'         => $this->put('TAHUN')
                    );

        $this->db->where('IDX', $idx);
        $update = $this->db->update('tblKendaraan', $data);

        if( $update ){
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'Update Failed', 502));
        }
    }

    function index_delete() {
        $idx = $this->delete('IDX');
        
        $this->db->where('IDX', $idx);
        $delete = $this->db->delete('tblKendaraan');

        if( $delete ){
            $this->response(array('status' => 'Delete Succeed'), 201);
        } else {
            $this->response(array('status' => 'Delete Failed', 502));
        }
    }
}
