<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_user');
        $this->load->model('Model_sekolah');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['title'] = 'Profile Sekolah';
        // $data['tbl_datappdb'] = $this->db->get_where('tbl_datappdb', ['email' => $this->session->userdata('email')])->row_array();

        // $this->db->where('id !=', 3);
        // $data['tbl_profile'] = $this->db->get('tbl_profile')->result_array();

        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['tbl_profile'] = $this->Model_sekolah->getSekolah();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('sekolah/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function gedit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Menu_model->getMenuId($id));
    }

    public function edit()
    {
        $data['title'] = 'Menu Management';
        $data['tbl_datappdb'] = $this->db->get_where('tbl_datappdb', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('tbl_profile')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            // $this->db->insert('tbl_profile', ['menu' => $this->input->post('menu')]);
            $data = [
                'menu'      => $this->input->post('menu'),
                'menu_icon' => $this->input->post('menu_icon')

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_profile', $data);
            $this->session->set_flashdata('flash', 'diubah');

            redirect('menu');
        }
    }

    public function delete($id)
    {
        $this->Menu_model->deleteMenu($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('menu');
    }



    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['tbl_datappdb'] = $this->db->get_where('tbl_datappdb', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('tbl_profile')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('t_user_sub_menu', $data);
            $this->session->set_flashdata('flash', 'ditambahkan');

            // $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }


    public function getedit()
    {
        $id = $this->input->post('id');
        // echo $id;
        // $this->Menu_model->getSubMenuId($id);
        echo json_encode($this->Menu_model->getSubMenuId($id));
        // echo json_encode($this->Menu_model->getSubMenu($id));
    }

    public function editsubmenu()
    {
        $data['title'] = 'Submenu Management';
        $data['tbl_datappdb'] = $this->db->get_where('tbl_datappdb', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('tbl_profile')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('t_user_sub_menu', $data);
            $this->session->set_flashdata('flash', 'diubah');

            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu edited!</div>');
            redirect('menu/submenu');
        }
    }

    public function deletesubmenu($id)
    {
        $this->Menu_model->deleteSubMenu($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('menu/submenu');
    }
}
