<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$patch1 = $this->uri->segment(1);
		$patch2 = $this->uri->segment(2);

		if ($this->session->login == NULL) {
			redirect("?patch1=$patch1&patch2=$patch2",'refresh');
		}else{
			if ($this->session->login['role'] == 'admin') {
				redirect('admin','refresh');
			}	
		}

		$this->load->model('m_admin');
		$this->load->model('m_siswa');
	}

	public function index()
	{
		$username = $this->session->login['username'];
		$nama_siswa = $this->m_siswa->siswa_id_siswa($username)->nama_siswa
		;
		$absen_dibuka_lihat = $this->m_admin->absen_lihat();
		$absen_lihat_ = $this->m_siswa->absen_lihat($username);
		$tanggal = date('Y-m-d');
		$cek_absen = $this->m_siswa->absen_cek_tanggal($tanggal, $username);
		$i = 0;
		foreach ($absen_dibuka_lihat as $absen_dibuka) {
			if ( $absen_dibuka->id_absen_dibuka == $this->m_admin->absen_cek($username, $absen_dibuka->id_absen_dibuka) ) {
				$absen_lihat[$i] = (object)[
					'id_absen_dibuka' => $absen_dibuka->id_absen_dibuka, 
					'tanggal_absen_dibuka' => tanggal($absen_dibuka->tanggal_absen_dibuka),
					'kehadiran' => 'Hadir'
				];
			}else{
				$absen_lihat[$i] = (object)[
					'id_absen_dibuka' => $absen_dibuka->id_absen_dibuka, 
					'tanggal_absen_dibuka' => tanggal($absen_dibuka->tanggal_absen_dibuka),
					'kehadiran' => 'Tidak hadir'
				];
			}
			$i++;
		}

		if ($cek_absen > 0) {
			$data = array(
				'absen_lihat' => $absen_lihat, 
				'status_absen' => 'sudah', 
				'nama_siswa' => $nama_siswa,
				'username' => $username
			);
		}else{
			$data = array(
				'absen_lihat' => $absen_lihat, 
				'status_absen' => 'belum', 
				'nama_siswa' => $nama_siswa,
				'username' => $username
			);
		}

		$this->load->view('partial/v_header_siswa', $data);
		$this->load->view('partial/v_sidebar_siswa');
		$this->load->view('siswa/v_siswa');
		$this->load->view('partial/v_footer_siswa');
	}

	public function absen($id_absen_dibuka = '')
	{
		
		$username = $this->session->login['username'];
		$cek_absen_dibuka = $this->m_siswa->absen_dibuka_cek(decrypt_url($id_absen_dibuka));
		if ($cek_absen_dibuka > 0) {
			$cek_absen = $this->m_siswa->absen_cek(decrypt_url($id_absen_dibuka), $username);

			if ($cek_absen == 0) {
				$data = array(
					'username' => $username,
					'id_absen_dibuka' => decrypt_url($id_absen_dibuka)
				);
				$cek = $this->m_siswa->absen_tambah($data);
			}
			
		}
		redirect('siswa','refresh');
	}

	public function profile()
	{
		if (isset($_POST['simpan'])) {
			$username = $this->session->login['username'];
			$password = $this->input->post('password');
			$nama_siswa = $this->input->post('nama_siswa');
			$nis_siswa = $this->input->post('nis_siswa');
			$tanggal_lahir = $this->input->post('tanggal_lahir');

			if ($password != '') {
				$data = array(
					'password' => $password
				);

				$data_siswa = array(
					'nama_siswa' => $nama_siswa,
					'nis_siswa' => $nis_siswa,
					'tanggal_lahir' => $tanggal_lahir 
				);

				$cek = $this->m_siswa->profile_edit($username, $data, $data_siswa);
				if ($cek) {
					redirect('siswa/profile?status=sukses&data=edit','refresh');
				}else{
					redirect('siswa/profile?status=gagal&data=edit','refresh');
				}

			}else{
				$data = '';
				$data_siswa = array(
					'nama_siswa' => $nama_siswa,
					'nis_siswa' => $nis_siswa,
					'tanggal_lahir' => $tanggal_lahir 
				);

				$cek = $this->m_siswa->profile_edit($username, $data, $data_siswa);
				if ($cek) {
					redirect('siswa/profile?status=sukses&data=edit','refresh');
				}else{
					redirect('siswa/profile?status=gagal&data=edit','refresh');
				}
			}
		}else{
			$username = $this->session->login['username'];
			$nama_siswa = $this->m_siswa->siswa_id_siswa($username)->nama_siswa
			;
			$id_siswa = $this->m_siswa->siswa_id_siswa($username)->id_siswa;
			$siswa_info = $this->m_siswa->siswa_info($id_siswa);


			$data = array(
				'siswa_info' => $siswa_info, 
				'nama_siswa' => $nama_siswa,
				'username' => $username
			);
			$this->load->view('partial/v_header_siswa', $data);
			$this->load->view('partial/v_sidebar_siswa');
			$this->load->view('siswa/v_profile');
			$this->load->view('partial/v_footer_siswa');
		}
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */