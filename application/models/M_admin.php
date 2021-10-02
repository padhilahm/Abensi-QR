<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	function absen_lihat($id_absen_dibuka = '')
	{
		
		$this->db->order_by('tanggal_absen_dibuka', 'desc');
		$query = $this->db->get('absen_dibuka');
		
		return $query->result();
	}

	function absen_tambah($data)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$this->db->insert('absen_dibuka', $data);

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function absen_hapus($id_absen_dibuka)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$this->db->where('id_absen_dibuka', $id_absen_dibuka);
		$this->db->delete('absen_dibuka');
		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function absen_info($id_absen_dibuka)
	{
		// $query = $this->db->query("SELECT nis_siswa, nama_siswa, nama_kelas FROM siswa JOIN kelas ON siswa.`id_kelas` = kelas.`id_kelas`
		// 	WHERE siswa.username IN(SELECT username FROM absen WHERE id_absen_dibuka = $id_absen_dibuka);");
		$this->db->select('nis_siswa, nama_siswa, nama_kelas');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'inner');
		$this->db->where("siswa.username IN (SELECT username FROM absen WHERE id_absen_dibuka = $id_absen_dibuka)");
		$query = $this->db->get();
		return $query->result();

	}

	function absen_dibuka_id($id_absen_dibuka='')
	{
		$this->db->where('id_absen_dibuka', $id_absen_dibuka);
		$query = $this->db->get('absen_dibuka');
		return $query->row();
	}

	function tanggal_absen_dibuka($id_absen_dibuka)
	{
		$this->db->where('id_absen_dibuka', $id_absen_dibuka);
		$query = $this->db->get('absen_dibuka');
		return $query->row();
	}

	function akun_lihat()
	{
		$query = $this->db->get('akun');
		return $query->result();
	}

	function akun_tambah($data, $data_siswa)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$this->db->insert('akun', $data);

		$this->db->insert('siswa', $data_siswa);
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function akun_tambah_admin($data)
	{
		$this->db->trans_start();
		$this->db->insert('akun', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function akun_hapus($id_akun)
	{
		$this->db->trans_start();

		$this->db->where('id_akun', $id_akun);
		$this->db->delete('akun');

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	

	function akun_lihat_dari($id_akun)
	{
		$this->db->select('akun.username, akun.id_akun, akun.role, siswa.nama_siswa, siswa.nis_siswa, kelas.nama_kelas, kelas.id_kelas, siswa.tanggal_lahir');
		$this->db->from('akun');
		$this->db->join('siswa', 'akun.username = siswa.username', 'left');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
		$this->db->where('akun.id_akun', $id_akun);
		$query = $this->db->get();
		return $query->row();
	}

	function akun_edit($data, $data_siswa, $id_akun, $username)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		if ($this->siswa_cek($username) > 0) {
			$this->db->where('username', $username);
			$this->db->update('siswa', $data_siswa);
		}else{
			$this->db->insert('siswa', $data_siswa);
		}

		$this->db->where('id_akun', $id_akun);
		$this->db->update('akun', $data);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function siswa_cek($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('siswa');
		return $query->num_rows();
	}

	function akun_edit_admin($data, $id_akun)
	{
		$this->db->trans_start();

		$this->db->where('id_akun', $id_akun);
		$this->db->update('akun', $data);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function siswa_lihat($id_kelas = '')
	{
		if ($id_kelas != '') {
			$this->db->select('siswa.id_siswa, siswa.nama_siswa, siswa.nis_siswa, siswa.username, kelas.nama_kelas');
			$this->db->from('siswa');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'inner');
			$this->db->where('kelas.id_kelas', $id_kelas);
			$query = $this->db->get();
		}else{
			$this->db->select('siswa.id_siswa, siswa.nama_siswa, siswa.nis_siswa, siswa.username, kelas.nama_kelas');
			$this->db->from('siswa');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'inner');
			$query = $this->db->get();
		}
		
		return $query->result();
	}

	function siswa_hapus($username)
	{
		$this->db->trans_start();

		$this->db->where('username', $username);
		$this->db->delete('akun');

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function username_cek($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('akun');
		return $query->num_rows();
	}

	function username_ambil($id_akun)
	{
		$this->db->where('id_akun', $id_akun);
		$query = $this->db->get('akun');
		return $query->row();
	}

	function username_siswa($id_siswa)
	{
		$this->db->where('id_siswa', $id_siswa);
		$query = $this->db->get('siswa');
		return $query->row();
	}

	function siswa_lihat_dari($id_siswa)
	{
		$this->db->select('akun.username, akun.id_akun, akun.role, siswa.nama_siswa, siswa.id_siswa, siswa.nis_siswa, kelas.nama_kelas, kelas.id_kelas, siswa.tanggal_lahir');
		$this->db->from('akun');
		$this->db->join('siswa', 'akun.username = siswa.username', 'inner');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'inner');
		$this->db->where('siswa.id_siswa', $id_siswa);
		$query = $this->db->get();
		return $query->row();
	}

	function siswa_info($id_siswa)
	{
		$query = $this->db->query("SELECT akun.`username`, siswa.`nama_siswa`, siswa.`nis_siswa`, siswa.`id_siswa`, kelas.`nama_kelas`,
			COUNT(absen.`id_absen`) AS kehadiran, 
			(SELECT COUNT(absen_dibuka.`id_absen_dibuka`) FROM absen_dibuka) AS jumlah_absen,
			(SELECT COUNT(absen_dibuka.`id_absen_dibuka`) FROM absen_dibuka) - COUNT(absen.`id_absen`) AS tidak_hadir
			FROM siswa 
			JOIN akun ON siswa.`username` = akun.`username` 
			JOIN absen ON akun.`username` = absen.`username`
			JOIN kelas ON siswa.`id_kelas` = kelas.`id_kelas`
			WHERE id_siswa = $id_siswa");
		return $query->row();
	}

	function absen_cek($username, $id_absen_dibuka)
	{
		$this->db->where('username', $username);
		$this->db->where('id_absen_dibuka', $id_absen_dibuka);
		$query = $this->db->get('absen');
		if ($query->num_rows() > 0) {
			return $query->row()->id_absen_dibuka;
		}else{
			return FALSE;
		}
		
	}

	function kelas_lihat()
	{
		$query = $this->db->get('kelas');
		return $query->result();
	}

	function kelas_tambah($data)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$this->db->insert('kelas', $data);

		$this->db->trans_complete();
		if ($this->db->trans_status() ===  FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	public function kelas_absen_info($id_absen_dibuka='', $id_kelas = '')
	{
		$this->db->select('siswa.nama_siswa, siswa.nis_siswa, siswa.id_siswa');
		$this->db->from('kelas');
		$this->db->join('siswa', 'kelas.id_kelas = siswa.id_kelas', 'inner');
		$this->db->join('akun', 'siswa.username = akun.username', 'inner');
		$this->db->join('absen', 'akun.username = absen.username', 'inner');
		$this->db->where('absen.id_absen_dibuka', $id_absen_dibuka);
		$this->db->where('kelas.id_kelas', $id_kelas);
		$this->db->order_by('absen.id_absen_dibuka', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function kelas_hapus($id_kelas)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$this->db->where("username IN(SELECT username FROM siswa WHERE id_kelas = $id_kelas)");
		$this->db->delete('akun');

		$this->db->where('id_kelas', $id_kelas);
		$this->db->delete('kelas');
		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function kehadiran_tanggal($tanggal = '')
	{
		$query = $this->db->query("SELECT COUNT(absen.`id_absen`) AS hadir, (SELECT COUNT(id_siswa) FROM siswa) AS total,
			((SELECT COUNT(id_siswa) FROM siswa) - COUNT(absen.`id_absen`)) AS tidak_hadir FROM absen 
			JOIN absen_dibuka ON absen.`id_absen_dibuka` = absen_dibuka.`id_absen_dibuka`
			WHERE absen_dibuka.`tanggal_absen_dibuka` = '$tanggal';");
		return $query->row();
	}

	function absen_aktivitas($tanggal = '')
	{
		$query = $this->db->query("SELECT siswa.`nama_siswa`, kelas.`nama_kelas`, absen.`tanggal_dibuat`, 
			CONCAT(HOUR(absen.`tanggal_dibuat`), ':', MINUTE(absen.`tanggal_dibuat`), ':', SECOND(absen.`tanggal_dibuat`)) AS waktu 
			FROM siswa 
			JOIN akun ON siswa.`username` = akun.`username`
			JOIN absen ON siswa.`username` = absen.`username`
			JOIN kelas ON siswa.`id_kelas` = kelas.`id_kelas`
			JOIN absen_dibuka ON absen.`id_absen_dibuka` = absen_dibuka.`id_absen_dibuka`
			WHERE absen_dibuka.`tanggal_absen_dibuka` = '$tanggal'
			ORDER BY absen.`tanggal_dibuat` DESC
			LIMIT 6;");
		return $query->result();
	}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */