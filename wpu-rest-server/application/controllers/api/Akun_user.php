<?php 
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Akun_user extends CI_Controller {

	use REST_Controller {
		REST_Controller::__construct as private __resTraitConstruct;
	}

	public function __construct() {
		parent::__construct();
		$this->__resTraitConstruct();
		$this->load->model('Mahasiswa_model', 'mahasiswa');
		$this->methods['index_get']['limit'] = 100;
	}


	public function index_post() {
		
		$data = [
			'user_id'        => $this->post('user_id'),
			'key'            => 'testing',
			'level'          => 1,
			'ignore_limits'  => 0,
			'is_private_key' => 0,
			'ip_addresses'   => NULL,
			'data_created'   => 1
		];

		if ($this->mahasiswa->createAkunUser($data) > 0) {
			// OK
				$this->response([
				'status'  => true,
				'message' => 'Data Akun Berhasil Ditambah'
			], 200);
		} else {
				$this->response([
				'status'  => false,
				'message' => 'Gagal Tambah Data'
			], 400);
		}
	}

}
?>