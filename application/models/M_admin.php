<?php
class M_admin extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
//=============================== UKM ===============================
public function dt_ukm()
{
    $this->db->select('p.id_ukm, p.nama_ukm, p.deskripsi');
    $this->db->from('ukm p');
    $this->db->order_by('id_ukm', 'desc');
    $query = $this->db->get();
    return $query->result_array();        
}

//=============================== UKM TAMBAH ===============================

public function dt_ukm_tambah()
    {
        $data = array(
            'nama_ukm' => $this->input->post('nama_ukm'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        return $this->db->insert('ukm', $data);
    }

    //=============================== UKM EDIT ===============================
    public function dt_ukm_edit($id)
    {
        $data = array(
            'nama_ukm' => $this->input->post('nama_ukm'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->db->where('id_ukm', $id);
        return $this->db->update('ukm', $data);
    }

//=============================== MAHASISWA ===============================
    public function dt_mahasiswa()
    {
        $this->db->select('m.id_mahasiswa, m.nim, m.nama, m.tgl, m.alamat');
        $this->db->from('mahasiswa m');
        $this->db->order_by('id_mahasiswa', 'desc');
        $query = $this->db->get();
        return $query->result_array();        
    }

//=============================== MAHASISWA TAMBAH ===============================

    public function dt_mahasiswa_tambah()
        {
            $data = array(
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'tgl' => $this->input->post('tgl'),
                'alamat' => $this->input->post('alamat'),
            );
            return $this->db->insert('mahasiswa', $data);
        }

//=============================== MAHASISWA EDIT ===============================
    public function dt_mahasiswa_edit($id)
    {
        $data = array(
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'tgl' => $this->input->post('tgl'),
                'alamat' => $this->input->post('alamat'),
        );
        $this->db->where('id_mahasiswa', $id);
        return $this->db->update('mahasiswa', $data);
    }

    //=============================== ANGGOTA ===============================
    public function dt_anggota()
    {
        $this->db->select('a.id_anggota, m.nim, m.nama, u.nama_ukm');
        $this->db->from('anggota a');
        $this->db->join('mahasiswa m', 'a.id_mahasiswa = m.id_mahasiswa', 'left');
        $this->db->join('ukm u', 'a.id_ukm = u.id_ukm', 'left');
        $this->db->order_by('id_anggota', 'DESC');
        $query = $this->db->get();
        return $query->result_array();        
    }

    //=============================== ANGGOTA TAMBAH ===============================

    public function dt_anggota_tambah()
    {
        $data = array(
            'id_anggota' => $this->input->post('id_anggota'),
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'id_ukm' => $this->input->post('id_ukm'),
        );
        return $this->db->insert('anggota', $data);
    }

    public function dropdown_mahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        $result = $query->result();

        $id_mahasiswa = array('-Pilih-');
        $nama = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_mahasiswa, $result[$i]->id_mahasiswa);
            array_push($nama, $result[$i]->nama);
        }
        return array_combine($id_mahasiswa, $nama);
    }

    public function dropdown_ukm()
    {
        $query = $this->db->get('ukm');
        $result = $query->result();

        $id_ukm = array('-Pilih-');
        $nama_ukm = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_ukm, $result[$i]->id_ukm);
            array_push($nama_ukm, $result[$i]->nama_ukm);
        }
        return array_combine($id_ukm, $nama_ukm);
    }

}
