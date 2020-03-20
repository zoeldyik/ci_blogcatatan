<?php

class Home_model extends CI_Model
{
    public function getDatas($keyword = FALSE, $limit, $offset)
    {
        if ($keyword !== FALSE) {
            $this->db->like('judul', $keyword);
        }
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('data')->result_array();
    }


    public function getTotalRows($keyword = FALSE)
    {
        if ($keyword !== FALSE) {
            $this->db->like('judul', $keyword);
        }
        return $this->db->get('data')->num_rows();
    }

    public function getUniquekategori()
    {
        $this->db->select('kategori');
        $this->db->distinct();
        $this->db->order_by('judul', 'ASC');
        return $this->db->get('data')->result_array();
    }

    public function tambahData()
    {
        // remove space, tab , new line
        $kategori = trim(strtolower($this->input->post('kategori')), " \t\n\r\0\x0B");
        if ($kategori === '') {
            $kategori = 'all';
        }

        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', TRUE)),
            'teks' => $this->input->post('teks', TRUE),
            // tambah dash jika kategorinya beberapa kata
            'kategori' => url_title($kategori)
        ];

        $this->db->insert('data', $data);
    }

    public function getDataByKategori($kategori, $limit = FALSE, $offset = FALSE)
    {
        if ($limit !== FALSE) {
            $this->db->limit($limit, $offset);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->where('kategori', $kategori);
        return $this->db->get('data')->result_array();
    }


    public function getKategoriRows($keyword)
    {
        $this->db->where('kategori', $keyword);
        return $this->db->get('data')->num_rows();
    }


    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data');
    }

    public function getDataById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('data')->row_array();
    }

    public function updateData($id)
    {
        $id = $this->input->post('id');
        $kategori = trim(strtolower($this->input->post('kategori')), " \t\n\r\0\x0B");

        if ($kategori === '') {
            $kategori = 'all';
        }

        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', TRUE)),
            'teks' => $this->input->post('teks', TRUE),
            'kategori' => url_title($kategori)
        ];

        $this->db->where('id', $id);
        return $this->db->update('data', $data);
    }

    public function getDatasByJudul()
    {
        $judul = $this->input->post('cari');
        $this->db->like('judul', $judul, 'both');
        return $this->db->get('data')->result_array();
    }

    public function cekUser()
    {
        $nama = htmlspecialchars($this->input->post('nama', TRUE));
        $password =  htmlspecialchars($this->input->post('password', TRUE));

        $this->db->where('nama', $nama);
        $user = $this->db->get('admin')->row_array();
        // cek username
        if ($user) {
            //  cek password
            if (password_verify($password, $user['password'])) {
                return TRUE;
            } else {
                return FAlSE;
            }
        } else {
            return FALSE;
        }
    }
}