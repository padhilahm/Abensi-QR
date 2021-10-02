<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$patch1 = $this->uri->segment(1);
		$patch2 = $this->uri->segment(2);

		if ($this->session->login == NULL) {
			redirect("?patch1=$patch1&patch2=$patch2",'refresh');
		}else{
			if ($this->session->login['role'] == 'siswa') {
				redirect('siswa','refresh');
			}	
		}

		$this->load->model('m_admin');


	}

	public function index()
	{
		$kehadiran_tanggal = $this->m_admin->kehadiran_tanggal(date('Y-m-d'));
		$absen_aktivitas = $this->m_admin->absen_aktivitas(date('Y-m-d'));

		$data = array(
			'title' => 'beranda',
			'kehadiran' => $kehadiran_tanggal,
			'aktivitas' => $absen_aktivitas
		);
		
		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_admin');
	}

	public function siswa($id_kelas = '')
	{
		if ($id_kelas != '') {
			$siswa_lihat = $this->m_admin->siswa_lihat($id_kelas);
		}else{
			$siswa_lihat = $this->m_admin->siswa_lihat();
		}
		
		$data = array(
			'title' => 'siswa', 
			'siswa_lihat' => $siswa_lihat
		);

		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_siswa');
		$this->load->view('partial/v_footer_admin');
	}

	public function siswa_tambah()
	{
		if (isset($_POST['tambah'])) {
			$username = $this->input->post('username');
			$username_cek = $this->m_admin->username_cek($username);
			if ($username_cek == 0) {
				$password = $this->input->post('password');
				$role = 'siswa';
				$data = array(
					'username' => $username,
					'password' => $password,
					'role' => $role 
				);

				if (isset($_POST['nama_siswa']) && isset($_POST['nis_siswa']) && isset($_POST['id_kelas']) && isset($_POST['tanggal_lahir'])) {
					$nama_siswa = $this->input->post('nama_siswa');
					$nis_siswa = $this->input->post('nis_siswa');
					$id_kelas = $this->input->post('id_kelas');
					$tanggal_lahir = $this->input->post('tanggal_lahir');

					$data_siswa = array(
						'nama_siswa' => $nama_siswa,
						'nis_siswa' => $nis_siswa,
						'tanggal_lahir' => $tanggal_lahir,
						'username' => $username,
						'id_kelas' => $id_kelas 
					);
					$cek = $this->m_admin->akun_tambah($data, $data_siswa);
					if ($cek) {
						redirect('admin/siswa?status=sukses&data=tambah','refresh');
					}else{
						redirect('admin/siswa?status=gagal&data=tambah','refresh');
					}
				}else{
					$cek = $this->m_admin->akun_tambah_admin($data);
					if ($cek) {
						redirect('admin/siswa?status=sukses&data=tambah','refresh');
					}else{
						redirect('admin/siswa?status=gagal&data=tambah','refresh');
					}

				}
			}else{
				redirect('admin/siswa_tambah?status=gagal&data=username','refresh');
			}
		}else{
			$kelas_lihat = $this->m_admin->kelas_lihat();
			$data = array(
				'title' => 'siswa', 
				'kelas_lihat' => $kelas_lihat
			);
			$this->load->view('partial/v_header_admin', $data);
			$this->load->view('partial/v_sidebar_admin');
			$this->load->view('admin/v_siswa_tambah');
			$this->load->view('partial/v_footer_admin');
		}
		
	}

	public function siswa_edit($id_siswa)
	{
		if (isset($_POST['edit'])) {
			$id_akun = $this->input->post('id_akun');
			$username = $this->input->post('username');
			$username_asli = $this->m_admin->username_ambil($id_akun)->username;
			$username_cek = $this->m_admin->username_cek($username);
			if ($username == $username_asli) {
				$password = $this->input->post('password');
				$role = 'siswa';
				if ($password != '') {
					$data = array(
						'password' => $password,
						'role' => $role,
						'username' => $username
					);
				}else{
					$data = array(
						'role' => $role,
						'username' => $username
					);
				}

				if (isset($_POST['nama_siswa']) && isset($_POST['nis_siswa']) && isset($_POST['id_kelas']) && isset($_POST['tanggal_lahir'])) {
					$nama_siswa = $this->input->post('nama_siswa');
					$nis_siswa = $this->input->post('nis_siswa');
					$id_kelas = $this->input->post('id_kelas');
					$tanggal_lahir = $this->input->post('tanggal_lahir');

					$data_siswa = array(
						'nama_siswa' => $nama_siswa,
						'nis_siswa' => $nis_siswa,
						'tanggal_lahir' => $tanggal_lahir,
						'id_kelas' => $id_kelas
					);
					$cek = $this->m_admin->akun_edit($data, $data_siswa, $id_akun, $username_asli);
					if ($cek) {
						redirect('admin/siswa_edit/'.$id_siswa.'?status=sukses&data=edit','refresh');
					}else{
						redirect('admin/siswa_edit/'.$id_siswa.'?status=gagal&data=edit','refresh');
					}
				}
			}elseif ($username_cek == 0) {
				$password = $this->input->post('password');
				$role = 'siswa';
				if ($password != '') {
					$data = array(
						'username' => $username,
						'password' => $password,
						'role' => $role 
					);
				}else{
					$data = array(
						'username' => $username,
						'role' => $role 
					);
				}

				if (isset($_POST['nama_siswa']) && isset($_POST['nis_siswa']) && isset($_POST['id_kelas']) && isset($_POST['tanggal_lahir'])) {
					$nama_siswa = $this->input->post('nama_siswa');
					$nis_siswa = $this->input->post('nis_siswa');
					$id_kelas = $this->input->post('id_kelas');
					$tanggal_lahir = $this->input->post('tanggal_lahir');

					$data_siswa = array(
						'nama_siswa' => $nama_siswa,
						'nis_siswa' => $nis_siswa,
						'tanggal_lahir' => $tanggal_lahir,
						'id_kelas' => $id_kelas 
					);
					$cek = $this->m_admin->akun_edit($data, $data_siswa, $id_akun, $username_asli);
					if ($cek) {
						redirect('admin/siswa_edit/'.$id_siswa.'?status=sukses&data=edit','refresh');
					}else{
						redirect('admin/siswa_edit/'.$id_siswa.'?status=gagal&data=edit','refresh');
					}
				}
			}else{
				redirect('admin/siswa_edit/'.$id_siswa.'?status=gagal&data=username','refresh');
			}

		}else{
			$kelas_lihat = $this->m_admin->kelas_lihat();
			$siswa_lihat = $this->m_admin->siswa_lihat_dari($id_siswa);
			$data = array(
				'title' => 'siswa',
				'siswa_lihat' => $siswa_lihat,
				'kelas_lihat' => $kelas_lihat
			);
			$this->load->view('partial/v_header_admin', $data);
			$this->load->view('partial/v_sidebar_admin');
			$this->load->view('admin/v_siswa_edit');
			$this->load->view('partial/v_footer_admin');
		}
	}

	public function siswa_hapus($username)
	{
		$cek = $this->m_admin->siswa_hapus($username);
		if ($cek) {
			redirect('admin/siswa?status=sukses&data=hapus','refresh');
		}else{
			redirect('admin/siswa?status=gagal&data=hapus','refresh');
		}
	}

	public function siswa_info($id_siswa)
	{
		$siswa_info = $this->m_admin->siswa_info($id_siswa);
		$absen_dibuka_lihat = $this->m_admin->absen_lihat();
		$username = $this->m_admin->username_siswa($id_siswa)->username;
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

		$data = array(
			'title' => 'siswa', 
			'siswa_info' => $siswa_info,
			'absen_lihat' => $absen_lihat
		);
		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_siswa_info');
		$this->load->view('partial/v_footer_admin');
	}

	public function absen()
	{
		$absen_lihat = $this->m_admin->absen_lihat();

		$i = 0;
		foreach ($absen_lihat as $absen) {
			$array_absen[$i] = (object)[
				'tanggal_absen_dibuka' => tanggal($absen->tanggal_absen_dibuka), 
				'id_absen_dibuka' => $absen->id_absen_dibuka
			];
			$i++;
		}

		$data = array(
			'title' => 'absen',
			'absen_lihat' => $array_absen
		);


		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_absen');
		$this->load->view('partial/v_footer_admin');
	}

	public function absen_info($id_absen_dibuka)
	{
		$tanggal_absen_dibuka = $this->m_admin->tanggal_absen_dibuka($id_absen_dibuka);
		$absen = $this->m_admin->absen_info($id_absen_dibuka);
		$data = array(
			'title' => 'absen', 
			'absen' => $absen,
			'tanggal_absen' => tanggal($tanggal_absen_dibuka->tanggal_absen_dibuka)
		);

		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_absen_info');
		$this->load->view('partial/v_footer_admin');
	}

	public function absen_tambah()
	{
		if (isset($_POST['tambah'])) {
			$tanggal_absen = $this->input->post('tanggal_absen');
			$data['tanggal_absen_dibuka'] = $tanggal_absen;
			$cek = $this->m_admin->absen_tambah($data);
			if ($cek) {
				redirect('admin/absen?status=sukses&data=tambah','refresh');
			}else{
				redirect('admin/absen?status=gagal&data=tambah','refresh');
			}
			
		}
	}

	public function absen_hapus($id_absen_dibuka)
	{
		$cek = $this->m_admin->absen_hapus($id_absen_dibuka);
		if ($cek) {
			redirect('admin/absen?status=sukses&data=hapus','refresh');
		}else{
			redirect('admin/absen?status=sukses&data=hapus','refresh');
		}
	}

	public function akun()
	{
		$akun_lihat = $this->m_admin->akun_lihat();
		$data = array(
			'title' => 'akun',
			'akun_lihat' => $akun_lihat 
		);
		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_akun');
		$this->load->view('partial/v_footer_admin');
	}

	public function akun_tambah()
	{
		if (isset($_POST['tambah'])) {
			$username = $this->input->post('username');
			$username_cek = $this->m_admin->username_cek($username);
			if ($username_cek == 0) {
				$password = $this->input->post('password');
				$role = $this->input->post('role');
				$data = array(
					'username' => $username,
					'password' => $password,
					'role' => $role 
				);

				if (isset($_POST['nama_siswa']) && isset($_POST['nis_siswa']) && isset($_POST['id_kelas']) && isset($_POST['tanggal_lahir'])) {
					$nama_siswa = $this->input->post('nama_siswa');
					$nis_siswa = $this->input->post('nis_siswa');
					$id_kelas = $this->input->post('id_kelas');
					$tanggal_lahir = $this->input->post('tanggal_lahir');

					$data_siswa = array(
						'nama_siswa' => $nama_siswa,
						'nis_siswa' => $nis_siswa,
						'tanggal_lahir' => $tanggal_lahir,
						'username' => $username,
						'id_kelas' => $id_kelas 
					);
					$cek = $this->m_admin->akun_tambah($data, $data_siswa);
					if ($cek) {
						redirect('admin/akun?status=sukses&data=tambah','refresh');
					}else{
						redirect('admin/akun?status=gagal&data=tambah','refresh');
					}
				}else{
					$cek = $this->m_admin->akun_tambah_admin($data);
					if ($cek) {
						redirect('admin/akun?status=sukses&data=tambah','refresh');
					}else{
						redirect('admin/akun?status=gagal&data=tambah','refresh');
					}

				}
			}else{
				redirect('admin/akun_tambah?status=gagal&data=username','refresh');
			}
		}else{
			$kelas_lihat = $this->m_admin->kelas_lihat();
			$data = array(
				'title' => 'akun', 
				'kelas_lihat' => $kelas_lihat
			);
			$this->load->view('partial/v_header_admin', $data);
			$this->load->view('partial/v_sidebar_admin');
			$this->load->view('admin/v_akun_tambah');
			
		}
		
	}

	public function akun_hapus($id_akun)
	{
		$cek = $this->m_admin->akun_hapus($id_akun);
		if ($cek) {
			redirect('admin/akun?status=sukses&data=hapus','refresh');
		}else{
			redirect('admin/akun?status=gagal&data=hapus','refresh');
		}
	}

	public function akun_edit($id_akun)
	{
		if (isset($_POST['edit'])) {
			$username = $this->input->post('username');
			$username_asli = $this->m_admin->username_ambil($id_akun)->username;
			$username_cek = $this->m_admin->username_cek($username);
			if ($username == $username_asli) {
				$password = $this->input->post('password');
				$role = $this->input->post('role');
				if ($password != '') {
					$data = array(
						'password' => $password,
						'role' => $role,
						'username' => $username
					);
				}else{
					$data = array(
						'role' => $role,
						'username' => $username
					);
				}

				if (isset($_POST['nama_siswa']) && isset($_POST['nis_siswa']) && isset($_POST['id_kelas']) && isset($_POST['tanggal_lahir'])) {
					$nama_siswa = $this->input->post('nama_siswa');
					$nis_siswa = $this->input->post('nis_siswa');
					$id_kelas = $this->input->post('id_kelas');
					$tanggal_lahir = $this->input->post('tanggal_lahir');

					$data_siswa = array(
						'nama_siswa' => $nama_siswa,
						'nis_siswa' => $nis_siswa,
						'tanggal_lahir' => $tanggal_lahir,
						'id_kelas' => $id_kelas,
						'username' => $username_asli
					);
					$cek = $this->m_admin->akun_edit($data, $data_siswa, $id_akun, $username_asli);
					if ($cek) {
						redirect('admin/akun_edit/'.$id_akun.'?status=sukses&data=edit','refresh');
					}else{
						redirect('admin/akun_edit/'.$id_akun.'?status=gagal&data=edit','refresh');
					}
				}else{
					$cek = $this->m_admin->akun_edit_admin($data, $id_akun);
					if ($cek) {
						redirect('admin/akun_edit/'.$id_akun.'?status=sukses&data=edit','refresh');
					}else{
						redirect('admin/akun_edit/'.$id_akun.'?status=gagal&data=edit','refresh');
					}

				}
			}elseif ($username_cek == 0) {
				$password = $this->input->post('password');
				$role = $this->input->post('role');
				if ($password != '') {
					$data = array(
						'username' => $username,
						'password' => $password,
						'role' => $role 
					);
				}else{
					$data = array(
						'username' => $username,
						'role' => $role 
					);
				}

				if (isset($_POST['nama_siswa']) && isset($_POST['nis_siswa']) && isset($_POST['id_kelas']) && isset($_POST['tanggal_lahir'])) {
					$nama_siswa = $this->input->post('nama_siswa');
					$nis_siswa = $this->input->post('nis_siswa');
					$id_kelas = $this->input->post('id_kelas');
					$tanggal_lahir = $this->input->post('tanggal_lahir');

					$data_siswa = array(
						'nama_siswa' => $nama_siswa,
						'nis_siswa' => $nis_siswa,
						'tanggal_lahir' => $tanggal_lahir,
						'username' => $username_asli,
						'id_kelas' => $id_kelas 
					);
					$cek = $this->m_admin->akun_edit($data, $data_siswa, $id_akun, $username_asli);
					if ($cek) {
						redirect('admin/akun_edit/'.$id_akun.'?status=sukses&data=edit','refresh');
					}else{
						redirect('admin/akun_edit/'.$id_akun.'?status=gagal&data=edit','refresh');
					}
				}else{
					$cek = $this->m_admin->akun_edit_admin($data, $id_akun);
					if ($cek) {
						redirect('admin/akun_edit/'.$id_akun.'?status=sukses&data=edit','refresh');
					}else{
						redirect('admin/akun_edit/'.$id_akun.'?status=gagal&data=edit','refresh');
					}

				}
			}else{
				redirect('admin/akun_edit/'.$id_akun.'?status=gagal&data=username','refresh');
			}

		}else{
			$kelas_lihat = $this->m_admin->kelas_lihat();
			$akun_lihat = $this->m_admin->akun_lihat_dari($id_akun);
			$data = array(
				'title' => 'akun',
				'role_form' => $akun_lihat->role,
				'kelas_lihat' => $kelas_lihat,
				'akun_lihat' => $akun_lihat
			);
			$this->load->view('partial/v_header_admin', $data);
			$this->load->view('partial/v_sidebar_admin');
			$this->load->view('admin/v_akun_edit');
		}
	}

	public function kelas()
	{
		$kelas_lihat = $this->m_admin->kelas_lihat();
		$data = array(
			'title' => 'kelas', 
			'kelas_lihat' => $kelas_lihat
		);
		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_kelas');
		$this->load->view('partial/v_footer_admin');
	}

	public function kelas_tambah()
	{
		if (isset($_POST['tambah'])) {
			$nama_kelas = $this->input->post('nama_kelas');
			$data = array(
				'nama_kelas' => $nama_kelas, 
			);

			$cek = $this->m_admin->kelas_tambah($data);
			if ($cek) {
				redirect('admin/kelas?status=sukses&data=tambah','refresh');
			}else{
				redirect('admin/kelas?status=gagal&data=tambah','refresh');
			}
		}else{
			redirect('admin/kelas','refresh');
		}
	}

	public function kelas_absen($id_kelas = '')
	{
		$absen_lihat = $this->m_admin->absen_lihat();

		$i = 0;
		foreach ($absen_lihat as $absen) {
			$array_absen[$i] = (object)[
				'tanggal_absen_dibuka' => tanggal($absen->tanggal_absen_dibuka), 
				'id_absen_dibuka' => $absen->id_absen_dibuka
			];
			$i++;
		}

		$data = array(
			'title' => 'kelas',
			'absen_lihat' => $array_absen
		);


		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_kelas_absen');
		$this->load->view('partial/v_footer_admin');
	}

	public function kelas_absen_info($id_absen_dibuka = '', $id_kelas = '')
	{
		$absen_lihat = $this->m_admin->kelas_absen_info($id_absen_dibuka, $id_kelas);

		$i = 0;

		$data = array(
			'title' => 'kelas',
			'absen_lihat' => $absen_lihat
		);


		$this->load->view('partial/v_header_admin', $data);
		$this->load->view('partial/v_sidebar_admin');
		$this->load->view('admin/v_kelas_absen_info');
		$this->load->view('partial/v_footer_admin');
	}

	public function kelas_hapus($id_kelas)
	{
		$cek = $this->m_admin->kelas_hapus($id_kelas);
		if ($cek) {
			redirect('admin/kelas?status=sukses&data=hapus','refresh');
		}else{
			redirect('admin/kelas?status=gagal&data=hapus','refresh');
		}
	}

	function format_tang1gal($tanggal = '')
	{
		$array_tanggal = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);

		$bulan = $array_tanggal[date('m', strtotime($tanggal))];
		$tahun = date('Y', strtotime($tanggal));
		$tanggal_s = date('d', strtotime($tanggal));

		return $tanggal_s.' '.$bulan.' '.$tahun;
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */