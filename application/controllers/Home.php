<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function homepage()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url());
    }

    public function index()
    {
        // echo password_hash('rahasiadong', PASSWORD_DEFAULT);
        // jika user mencari file
        $keyword = $this->input->post('cari');
        if (isset($keyword)) {
            $keyword = $this->input->post('cari');
            // session akan di jadikan value di input cari 
            // agar pagination berjalan normal saat tombol next di tekan
            $this->session->set_userdata('keyword', $keyword);
        } else {
            // jika user tidak mencari data
            $keyword = $this->session->userdata('keyword');
        }

        // get total rows
        $totalRows = $this->Home_model->getTotalRows($keyword);
        // var_dump($totalRows);

        // pagination
        $this->load->library('pagination');

        $config['base_url'] = base_url('home/index');
        $config['total_rows'] = $totalRows;
        $config['per_page'] = 7;

        $this->pagination->initialize($config);
        // akhir pagination

        $data['datas'] = $this->Home_model->getDatas($keyword, $config['per_page'], $this->uri->segment(3));
        $data['kategori'] = $this->Home_model->getUniquekategori();
        $this->load->view('templates/header');
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // cek apakah sudah login
        $this->cekAdmin();

        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[data.judul]', [
            'required' => '*field tidak boleh kosong',
            'is_unique' => '*nama judul sudah ada'
        ]);

        $this->form_validation->set_rules('teks', 'Teks', 'required', [
            'required' => '*field tidak boleh kosong'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Catatan Baru';
            $this->load->view('templates/header');
            $this->load->view('pages/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Home_model->tambahData();
            redirect('home');
        }
    }


    public function sortByKategori($kategori)
    {
        // hilangkan session dari pencarian
        $this->session->unset_userdata('keyword');

        $totalRows = $this->Home_model->getKategoriRows($kategori);

        // set session agar pagination berjalan normal saat tombol next di tekan
        $this->session->set_userdata('kategori', $kategori);


        // pagination
        $this->load->library('pagination');

        $config['base_url'] = base_url("kategori/$kategori");
        $config['total_rows'] = $totalRows;
        $config['per_page'] = 7;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        // akhir pagination

        $data['thispage'] = $kategori;

        $data['datas'] = $this->Home_model->getDataByKategori($this->session->userdata('kategori'), $config['per_page'], $this->uri->segment(3));

        $data['kategori'] = $this->Home_model->getUniquekategori();
        $this->load->view('templates/header');
        $this->load->view('pages/kategori', $data);
        $this->load->view('templates/footer');
    }



    public function hapus($id)
    {
        // cek apakah sudah login
        $this->cekAdmin();

        $this->Home_model->hapusData($id);
        redirect('home');
    }



    public function edit($id)
    {
        // cek apakah sudah login
        $this->cekAdmin();

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => '*field tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('teks', 'Teks', 'required', [
            'required' => '*field tidak boleh kosong'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Catatan';
            $data['editdata'] = $this->Home_model->getDataById($id);
            $this->load->view('templates/header');
            $this->load->view('pages/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $update = $this->Home_model->updateData($id);
            if ($update) {
                $this->session->unset_userdata('keyword');
                $this->session->unset_userdata('kategori');
                redirect('home');
            } else {
                die('gagal update data');
            }
        }
    }

    public function login()
    {
        $this->session->unset_userdata('keyword');
        $this->session->unset_userdata('kategori');


        // form validation
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'nama belum di isi'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'password belum di isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/login');
        } else {
            // cek usernam dan password
            $cek = $this->Home_model->cekUser();
            // jika gagal redirect ke halamanlogin
            if (!$cek) {
                $this->session->set_flashdata('error', 'email atau password salah');
                redirect('login');
            } else {
                $this->session->set_userdata('isAdmin', TRUE);
                redirect(base_url());
            }
        }
    }


    public function logout()
    {
        // cek apakah sudah login
        $this->cekAdmin();

        $this->session->unset_userdata('isAdmin');
        redirect(base_url());
    }


    private function cekAdmin()
    {
        if (!$this->session->userdata('isAdmin')) {
            redirect(base_url());
        }
    }
}