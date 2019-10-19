<?php 
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller {

	use REST_Controller {
		REST_Controller::__construct as private __resTraitConstruct;
	}

	public function __construct() {
		parent::__construct();
		$this->__resTraitConstruct();
		$this->load->model('Mahasiswa_model', 'mahasiswa');
		$this->methods['index_get']['limit'] = 100;
	}

	public function index_get() {
		$id = $this->get('id');
		$nama = $this->get('nama');
		if (isset($id)) {
			$mahasiswa = $this->mahasiswa->getMahasiswa($id);
		} elseif (isset($nama)) {
			$mahasiswa = $this->mahasiswa->getMahasiswaByName($nama);
		} else {
			$mahasiswa = $this->mahasiswa->getMahasiswa();
		}
		if ($mahasiswa) {
			$this->response([
				'status' => true,
				'data' => $mahasiswa
			], 200);
		} else {
			$this->response([
				'status' => false,
				'message' => 'id not found'
			], 404);
		}
	}

	public function index_delete() {
		$id = $this->delete('id');

		if ($id === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id !'
			], 400);
		} else {
			if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
				// OK
				$this->response([
				'status' => true,
				'id' => $id,
				'message' => 'Berhasil Dihapus'
			], 200);
			} else {
				// ID NOT FOUND
				$this->response([
				'status' => false,
				'message' => 'id not found'
			], 404);
			}
		}
	}

	public function index_post() {
		$data = [
			'nrp'     => $this->post('nrp'),
			'nama'    => $this->post('nama'),
			'email'   => $this->post('email'),
			'jurusan' => $this->post('jurusan')
		];

		if ($this->mahasiswa->createMahasiswa($data) > 0) {
			// OK
				$this->response([
				'status'  => true,
				'message' => 'Data Mahasiswa Berhasil Ditambah'
			], 200);
		} else {
				$this->response([
				'status'  => false,
				'message' => 'Gagal Tambah Data'
			], 400);
		}
	}

	public function index_put() {
		$id = $this->put('id');
		$data = [
			'nrp'     => $this->put('nrp'),
			'nama'    => $this->put('nama'),
			'email'   => $this->put('email'),
			'jurusan' => $this->put('jurusan')
		];

		if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {
			// OK
				$this->response([
				'status'  => true,
				'message' => 'Data Mahasiswa Berhasil Diubah'
			], 200);
		} else {
				$this->response([
				'status'  => false,
				'message' => 'Gagal Ubah Data'
			], 400);
		}
	}

}

?>