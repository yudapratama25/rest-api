<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Login extends CI_Controller {

	private $_client;

	public function __construct() {

		$this->_client = new Client([
			'base_uri' => 'http://localhost/rest-api/wpu-rest-server/api/'
		]);

		parent::__construct();
		$this->load->library('session');

		if(isset($_SESSION['status']) == TRUE) {
			redirect('Home');
		}
		else  {
			return TRUE;
		}
	}

	public function index()
	{
		$this->load->view('login');
	}

	function masuk() {
		
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
			//cek user di database
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where(array('username' => $username, 'password' => $password));
		$this->db->limit(1);
		$query = $this->db->get();

		$user = $query->row();

		if($user) {
			$this->session->set_flashdata("Berhasil", "Anda berhasil login");

				//atur session
			$_SESSION['status'] = TRUE;
			$_SESSION['username'] = $user->username;
			$_SESSION['id_user'] = $user->id;
			$_SESSION['token'] = $user->token;

			redirect('Home','refresh');

		} else {
			$this->session->set_flashdata("error", "USERNAME ATAU PASSWORD SALAH");
			redirect('Login', 'refresh');
		}		
	}

	function daftar() {
		$this->load->view('signup');
	}

	function registrasi() {

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$this->db->insert('tb_user', ['username' => $username, 'password' => $password, 'token' => 'testing']);
		$id_baru = $this->db->insert_id(); 

		$data_api = [
			"user_id"        => $id_baru,
			"wpu-key"        => 'admin_login'
		];

		$response = $this->_client->request('POST', 'akun_user', [
			'form_params' => $data_api
		]);

		$this->session->set_flashdata("sukses", "REGISTRASI BERHASIL");
		redirect('Login', 'refresh');

	}

}
