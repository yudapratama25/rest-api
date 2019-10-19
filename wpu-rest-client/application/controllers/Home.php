<?php 

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');

		//cek user login
		if($_SESSION['status'] == FALSE) {
			$this->session->set_flashdata("error", "SILAHKAN LOGIN TERLEBIH DAHULU");
			redirect('Login');
		}
	}

    public function index($nama = '')
    {
        $data['judul'] = 'Halaman Home';
        $data['nama'] = $nama;
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    function logout() {
    	$user_data = $this->session->all_userdata();
		$this->session->unset_userdata($user_data);
		$this->session->sess_destroy();
		redirect('Login');
		exit();
    }

}