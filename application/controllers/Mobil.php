<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {
		public function __construct(){
				parent::__construct();				
				$this->url = 'http://192.168.43.179:8004/api/mobil'; // sesuaikan dgn IP ADDRESS API
		}

		public function index(){
				$data['judul'] = "Data Kendaraan";
				$data['mobil'] = $this->do_curl('GET', false, $this->url);
				$data['mobil'] = json_decode($data['mobil']['message']);
				
				$this->load->view('v_header', $data);
				$this->load->view('v_mobil_list', $data);
		}

		public function create(){
    		if( isset($_POST['submit']) && $_POST['submit'] == 'Simpan' ){
						$post = $this->input->post();	
						$data = array(
														'NO_RANGKA' => $post['txtNoKerangka'],
														'NO_POLISI' => $post['txtNoPolisi'],
														'MEREK' => $post['txtMerek'],
														'TIPE' => $post['txtTipe'],
														'TAHUN' => $post['txtTahun']
												);
						
						$insert = $this->do_curl('POST', json_encode($data), $this->url);

						if( $insert['code'] == '200' ){
								$this->session->set_flashdata('action_mode', 'Data berhasil ditambahkan');
						}else{
								$this->session->set_flashdata('action_mode', 'Data gagal ditambahkan');
						}

						redirect('mobil');
				}else{
						$data['judul'] = "Tambah Data Kendaraan";
						$this->load->view('v_header', $data);
						$this->load->view('v_mobil_add', $data);
				}
		}

		public function update(){
    		if( isset($_POST['submit']) && $_POST['submit'] == 'Update' ){
						$post = $this->input->post();	
						$data = array(
														'IDX' => $post['txtIdx'],							
														'NO_RANGKA' => $post['txtNoKerangka'],
														'NO_POLISI' => $post['txtNoPolisi'],
														'MEREK' => $post['txtMerek'],
														'TIPE' => $post['txtTipe'],
														'TAHUN' => $post['txtTahun']
												);
						
						$update = $this->do_curl('PUT', json_encode($data), $this->url);
						
						if( $update['code'] =='200' ){
								$this->session->set_flashdata('action_mode', 'Update data berhasil');
						}else{
								$this->session->set_flashdata('action_mode', 'Update data gagal');
						}

						redirect('mobil');
				}else{
						$data['judul'] = "Update Data Kendaraan";
						$idx = $this->uri->segment(3);
						$params = array('IDX' => $idx);
						$url = $this->url.'/'.$idx;
						$data['mobil'] = $this->do_curl('GET', $params, $url);
						$data['mobil'] = json_decode( $data['mobil']['message'] );
						
						$this->load->view('v_header', $data);
						$this->load->view('v_mobil_add', $data);
				}
		}

		public function delete(){
				$idx = $this->uri->segment(3);

				if( $idx != '' ){
						$data = 'IDX='.$idx;
						$delete = $this->do_curl('DELETE', $data, $this->url);
						
						if( $delete['code'] == '201' ){
								$this->session->set_flashdata('action_mode', 'Data berhasil dihapus');
						}else{
								$this->session->set_flashdata('action_mode', 'Data gagal dihapus');
						}

						redirect('mobil');
				}
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
