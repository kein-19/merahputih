<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Model_user');
        $this->load->model('Model_gallery');
        // $this->load->model('Menu_model');
    }

    public function index()
    {
        is_logged_in();

        $data['title'] = 'List Image';
        // $data['tbl_datappdb'] = $this->db->get_where('tbl_datappdb', ['email' => $this->session->userdata('email')])->row_array();

        // $this->db->where('id !=', 3);
        // $data['tbl_profile'] = $this->db->get('tbl_profile')->result_array();

        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['tbl_profile'] = $this->Model_gallery->getSekolah();
        // $data['tbl_profile'] = $this->Model_sekolah->getSekolahId();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('gallery/index', $data);
        $this->load->view('templates/admin/footer');
    }

    // profile sekolah pada halaman home
    public function editimage()
    {
        $data['title'] = 'Profile Sekolah';
        $data['sekolah'] = 'SMK MERAH PUTIH';
        $data['visi_misi'] = 'Visi dan Misi SMK Merah Putih';

        // $data['tbl_datappdb'] = $this->db->get_where('tbl_datappdb', ['email' => $this->session->userdata('email')])->row_array();

        // $this->db->where('id !=', 3);
        // $data['tbl_profile'] = $this->db->get('tbl_profile')->result_array();

        $data['tbl_profile'] = $this->Model_sekolah->getSekolah();
        // $data['tbl_profile'] = $this->Model_sekolah->getSekolahId();
        $this->load->view('templates/header', $data);
        $this->load->view('gallery/editimage', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editprofilesekolah($id)
    {
        is_logged_in();

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('kenapa_kami', 'Kenapa memilih kami ?', 'required|trim');
        // $this->form_validation->set_rules('logo', 'Logo', 'required|trim');
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim');
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim');
        $this->form_validation->set_rules('motto', 'MOTTO', 'required|trim');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim');
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required|trim');
        $this->form_validation->set_rules('nomor_ijin', 'Nomor Ijin', 'required|trim');
        $this->form_validation->set_rules('tgl_berdiri', 'Tanggal Berdiri', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telephone', 'required|trim');
        $this->form_validation->set_rules('fax', 'Fax', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('status_sekolah', 'Sekolah', 'required|trim');
        $this->form_validation->set_rules('yayasan', 'Yayasan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['title'] = 'Edit Profile Sekolah';
            // $data['tbl_profile'] = $this->Model_sekolah->getSekolah();
            $data['tbl_profile'] = $this->Model_sekolah->getSekolahId($id);

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('sekolah/editprofilesekolah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Model_sekolah->editProfileSekolah();
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('sekolah');
        }
    }
}
