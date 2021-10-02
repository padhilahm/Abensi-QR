<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_admin');
	}

	public function index()
	{
		if ($this->session->login != NULL) {
			if ($this->session->login['role'] == 'admin') {
				redirect('admin','refresh');
			}else{
				redirect('siswa','refresh');
			}
		}
		
		$this->load->view('partial/v_header_login');
		$this->load->view('home/v_home');
		$this->load->view('partial/v_footer_siswa');

	}

	public function login($patch1 = '', $patch2 = '')
	{
		if (isset($_POST['masuk'])) {
			$username  = $this->input->post('username');
			$password  = $this->input->post('password');

			$kondisi = array(
				'username' => $username,
				'password' => $password 
			);

			$hasil = $this->m_home->login($kondisi);

			if ($hasil) {
				$data = array(
					'id_akun' => $hasil->id_akun,
					'username' => $hasil->username,
					'role' => $hasil->role
				);
				$this->session->set_userdata('login', $data);

				if ($patch1 != '' && $patch2 != '') {
					if ($hasil->role == 'admin') {
						redirect($patch1.'/'.$patch2,'refresh');
					}else{
						redirect($patch1.'/'.$patch2,'refresh');
					}
				}else{
					if ($hasil->role == 'admin') {
						redirect('admin','refresh');
					}else{
						redirect('siswa','refresh');
					}
				}

				
			}else{
				redirect('?gagal','refresh');
			}

			// echo $this->session->login['username'];


		}
	}

	public function absen($id_absen_dibuka = '')
	{
		$id_absen_dibuka = decrypt_url($id_absen_dibuka);
		$data['absen_dikuka'] = $this->m_admin->absen_dibuka_id($id_absen_dibuka);
		$this->load->view('partial/v_header_login', $data);
		$this->load->view('home/v_absen');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('','refresh');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */