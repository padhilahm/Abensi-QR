<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	function absen_lihat($username = '')
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('absen_dibuka', 'absen.id_absen_dibuka = absen_dibuka.id_absen_dibuka', 'inner');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->result();
	}

	function absen_dibuka_cek($id_absen_dibuka = '')
	{
		$this->db->where('id_absen_dibuka', $id_absen_dibuka);
		$query = $this->db->get('absen_dibuka');
		return $query->num_rows();
	}

	function absen_cek($id_absen_dibuka = '', $username = '')
	{
		$this->db->where('username', $username);
		$this->db->where('id_absen_dibuka', $id_absen_dibuka);
		$query = $this->db->get('absen');
		return $query->num_rows();
	}

	function absen_cek_tanggal($tanggal = '', $username = '')
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('absen_dibuka', 'absen.id_absen_dibuka = absen_dibuka.id_absen_dibuka', 'inner');
		$this->db->where('username', $username);
		$this->db->where('tanggal_absen_dibuka', $tanggal);

		$query = $this->db->get();
		return $query->num_rows();
	}

	function absen_ambil($id_absen_dibuka = '')
	{
		$this->db->where('id_absen_dibuka', $id_absen_dibuka);
		$query = $this->db->get('absen_dibuka');
		return $query->row();
	}

	function absen_tambah($data = '')
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$this->db->insert('absen', $data);

		$this->db->trans_complete();

		if ($this->db->trans_status() ===  FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	function siswa_info($id_siswa)
	{
		$query = $this->db->query("SELECT akun.`username`, siswa.`nama_siswa`, siswa.`tanggal_lahir`,siswa.`nis_siswa`, siswa.`id_siswa`, kelas.`nama_kelas`,
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

	function siswa_id_siswa($username = '')
	{
		$this->db->where('username', $username);
		$query = $this->db->get('siswa');
		return $query->row();
	}

	function profile_edit($username = '', $data = '', $data_siswa = '')
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		if ($data != '') {
			$this->db->where('username', $username);
			$this->db->update('akun', $data);
		}

		$this->db->where('username', $username);
		$this->db->update('siswa', $data_siswa);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}

	}


}

/* End of file M_siswa.php */
/* Location: ./application/models/M_siswa.php */