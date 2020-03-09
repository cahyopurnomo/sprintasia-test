<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumagubi extends CI_Controller {
		public function __construct(){
				parent::__construct();				
				$this->url = 'http://192.168.2.224:8004/api/alumagubi'; // sesuaikan dgn IP ADDRESS API
		}

		public function index(){
				$data['judul'] = "Product List";
				$items = $this->do_curl('GET', false, $this->url.'/product');
				$data['items'] = json_decode($items['message']);
				
				$this->load->view('v_header', $data);
				$this->load->view('v_alumagubi_list', $data);
		}

		public function create(){
    
		}

		public function update(){
    
		}

		public function delete(){
		
		}

		function do_curl($method, $data, $url){
				$ch = curl_init();

				switch($method){
						case "POST":
								curl_setopt($ch, CURLOPT_POST, true);
								if ($data){
										curl_setopt($ch, CURLOPT_HEADER, true);
										curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
										curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data)));
								}
								break;
						case "PUT":
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
								if ($data){
										curl_setopt($ch, CURLOPT_HEADER, true);
										curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
										curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data)));
								}
								break;
						case "DELETE":
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
								if ($data){
										curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
								}
								break;
						default:
								if ($data)
										$url = sprintf("%s?%s", $url, http_build_query($data));
				}

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
				// $result = curl_exec($ch);
				$result['message'] = curl_exec($ch);
				$result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
				if( $result ){
						return $result;
				}else{
					echo "cURL Error (curl_errno($ch)): curl_error($ch)";
				}

				curl_close($ch);
		}
}
