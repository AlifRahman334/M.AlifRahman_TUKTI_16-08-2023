<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('m_admin');
			$this->login_kah();	//Memastikan hanya yang sudah login dapat akses fungsi ini
	    }


		public function login_kah()
		{
			if ($this->session->has_userdata('username') && $this->session->userdata('nama'))
				return TRUE;
			else
				redirect(base_url('logout'));
		}


	public function index()
	{
		$data['judul']	='Selamat Datang di Politeknik Negeri Banjarmasin';
		$data['page']	='home';
		$data['jml_mahasiswa']	=$this->m_umum->jumlah_record_tabel('mahasiswa');
		$data['jml_ukm']	=$this->m_umum->jumlah_record_tabel('ukm');
		$this->tampil($data);
	}

//============================== UKM ==============================
	
	public function ukm()
	{
		$data['judul'] = 'Halaman Unit Kegiatan Mahasiswa';
		$data['page'] = 'ukm';
		$data['ukm'] = $this->m_admin->dt_ukm();
		$this->tampil($data);
	}

//============================== UKM TAMBAH ==============================

public function ukm_tambah()
	{
		$data['judul'] = 'Tambah Data Unit Kegiatan Mahasiswa';
		$data['page'] = 'ukm_tambah';	
		
		$this->form_validation->set_rules('nama_ukm','Nama UKM','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('deskripsi','Deskripsi UKM','required',array('required' => '%s harus diisi.'));

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_ukm_tambah();
			redirect(base_url('admin/ukm'));
		}
	}

//============================== UKM EDIT ==============================

public function ukm_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Data UKM';
		$data['page'] = 'ukm_edit';

		$this->form_validation->set_rules('nama_ukm','Nama UKM','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('deskripsi','Deskripsi UKM','required',array('required' => '%s harus diisi.'));

		$data['d'] = $this->m_umum->cari_data('ukm', 'id_ukm', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_ukm_edit($id);
			redirect(base_url('admin/ukm'));
		}
	}

	public function ukm_hapus($id)
	{
		$this->m_umum->hapus_data('ukm', 'id_ukm', $id);
		redirect(base_url('admin/ukm'));
	}

	//============ MAHASISWA ===============

	public function mahasiswa()
	{
		$data['judul'] = 'Halaman Mahasiswa';
		$data['page'] = 'mahasiswa';
		$data['mahasiswa'] = $this->m_admin->dt_mahasiswa();
		$this->tampil($data);
	}

	//============================== MAHASISWA TAMBAH ==============================

	public function mahasiswa_tambah()
	{
		$data['judul'] = 'Tambah Data Mahasiswa';
		$data['page'] = 'mahasiswa_tambah';	
		
		$this->form_validation->set_rules('nim','NIM mahasiswa','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('nama','Nama mahasiswa','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('tgl','Tanggal Lahrir Mahasiswa','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('alamat','Alamat mahasiswa','required',array('required' => '%s harus diisi.'));

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_mahasiswa_tambah();
			redirect(base_url('admin/mahasiswa'));
		}
	}

	//============================== MAHASISWA EDIT ==============================

	public function mahasiswa_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Data MAHASISWA';
		$data['page'] = 'mahasiswa_edit';

		$this->form_validation->set_rules('nim','NIM mahasiswa','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('nama','Nama mahasiswa','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('tgl','Tanggal Lahrir Mahasiswa','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('alamat','Alamat mahasiswa','required',array('required' => '%s harus diisi.'));

		$data['d'] = $this->m_umum->cari_data('mahasiswa', 'id_mahasiswa', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_mahasiswa_edit($id);
			redirect(base_url('admin/mahasiswa'));
		}
	}
	
	public function mahasiswa_hapus($id)
	{
		$this->m_umum->hapus_data('mahasiswa', 'id_mahasiswa', $id);
		redirect(base_url('admin/mahasiswa'));
	}


	//============ ANGGOTA ===============

	public function anggota()
	{
		$data['judul'] = 'Halaman Anggota UKM';
		$data['page'] = 'anggota';
		$data['anggota'] = $this->m_admin->dt_anggota();
		$this->tampil($data);
	}

	//============================== ANGGOTA TAMBAH ==============================

	public function anggota_tambah()
	{
		$data['judul'] = 'Tambah Data Anggota UKM';
		$data['page'] = 'anggota_tambah';	
		$data['anggota'] = $this->m_admin->dt_anggota();

		$this->form_validation->set_rules('id_mahasiswa', 'Pilih id mahasiswa', 'callback_dd_cek');
		$this->form_validation->set_rules('id_ukm', 'Pilih id ukm', 'callback_dd_cek');

		$data['ddmahasiswa'] = $this->m_admin->dropdown_mahasiswa();
		$data['ddukm'] = $this->m_admin->dropdown_ukm();
		
		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_anggota_tambah();
			redirect(base_url('admin/anggota'));
		}
	}

	public function anggota_hapus($id)
	{
		$this->m_umum->hapus_data('anggota', 'id_anggota', $id);
		redirect(base_url('admin/anggota'));
	}


	//============ Tools ===============
	function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
	{
	    if ($str == '-Pilih-') {
	      $this->form_validation->set_message('dd_cek', 'Harus dipilih');
	      return FALSE;
	    } else
	      return TRUE;
	}

	function tampil($data)
	{
		$this->load->view('admin/header',$data);
		$this->load->view('admin/isi');
		$this->load->view('admin/footer');
	}

}



