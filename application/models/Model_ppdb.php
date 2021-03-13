<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ppdb extends CI_Model
{
    // get data seluruh siswa baru
    public function getAllPPDB()
    {
        return $this->db->get('tbl_datappdb')->result_array();
    }

    public function getPPDB()
    {
        return $this->db->get_where('tbl_datappdb', ['kode_pendaftaran' => $this->session->userdata('kode_pendaftaran')])->row_array();
    }

    // fitur untuk pagination
    public function getPPDBLimit($limit, $start, $keyword = null)
    // public function getPPDBLimit($limit, $start)
    {
        // untuk pencarian
        if ($keyword) {
            $this->db->like('kode_pendaftaran', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('asal_sekolah', $keyword);
            $this->db->or_like('kelurahan', $keyword);
            $this->db->or_like('validasi', $keyword);
        }

        return $this->db->get('tbl_datappdb', $limit, $start)->result_array();
    }

    public function countAllPPDB()
    {
        return $this->db->get('tbl_datappdb')->num_rows();
    }

    public function getPPDBId($kode_pendaftaran)
    {
        return $this->db->get_where('tbl_datappdb', ['kode_pendaftaran' => $kode_pendaftaran])->row_array();
    }

    public function checkLogin()
    {
        $kp = htmlspecialchars($this->input->post('kode_pendaftaran', TRUE));
        $password = htmlspecialchars($this->input->post('password', TRUE));

        $siswa_baru = $this->db->get_where('tbl_datappdb', ['kode_pendaftaran' => $kp])->row_array();

        // var_dump($password);

        // jika usernya ada
        if ($siswa_baru) {
            // jika usernya aktif
            // if ($siswa_baru['is_active'] == 0) {
            // cek password
            if ($password == $siswa_baru['tanggal_lahir']) {
                $data = [
                    'kode_pendaftaran' => $siswa_baru['kode_pendaftaran'],
                    'role_id' => $siswa_baru['role_id']
                ];

                $this->session->set_userdata($data);
                // if ($siswa_baru['role_id'] == 1) {
                //     redirect('user');
                // } else {
                redirect('user');
                // }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah!</div>');
                redirect('ppdb/login');
            }
            // } else {
            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon maaf akun anda belum diaktivasi!</div>');
            //     redirect('ppdb/login');
            // }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor Formulir belum terdaftar</div>');
            redirect('ppdb/login');
        }
    }

    public function tambahDataPPDB($fixkode)
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);

        $data = [
            'kode_pendaftaran'      => ($fixkode),
            'nik'                   => htmlspecialchars($this->input->post('nik', TRUE)),
            'nama'                  => htmlspecialchars($nama),
            'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
            'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
            'kd_agama'              => $this->input->post('agama', TRUE),
            'warganegara'           => $this->input->post('warganegara', TRUE),
            'statussiswa'           => $this->input->post('statussiswa', TRUE),
            'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
            'dari__bersaudara'      => htmlspecialchars($this->input->post('dari__bersaudara', TRUE)),
            'jumlah_saudara'        => htmlspecialchars($this->input->post('jumlah_saudara', TRUE)),
            'alamat'                => htmlspecialchars($this->input->post('alamat', TRUE)),
            'rt'                    => htmlspecialchars($this->input->post('rt', TRUE)),
            'rw'                    => htmlspecialchars($this->input->post('rw', TRUE)),
            'kelurahan'             => htmlspecialchars($this->input->post('kelurahan', TRUE)),
            'kecamatan'             => htmlspecialchars($this->input->post('kecamatan', TRUE)),
            'no_hp'                 => htmlspecialchars($this->input->post('no_hp', TRUE)),
            'tinggalbersama'        => $this->input->post('tinggalbersama', TRUE),
            'jarak'                 => htmlspecialchars($this->input->post('jarak', TRUE)),
            'transport'             => $this->input->post('transport', TRUE),
            'jurusan'               => $this->input->post('jurusan', TRUE),
            'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
            'nisn'                  => htmlspecialchars($this->input->post('nisn', TRUE)),
            'no_sttb'               => htmlspecialchars($this->input->post('no_sttb', TRUE)),
            'pindahan'              => htmlspecialchars($this->input->post('pindahan', TRUE)),
            'suratpindah'           => $this->input->post('suratpindah', TRUE),
            'alasan'                => htmlspecialchars($this->input->post('alasan', TRUE)),
            'kartu_kip'             => htmlspecialchars($this->input->post('kartu_kip', TRUE)),
            'cita_cita'             => htmlspecialchars($this->input->post('cita_cita', TRUE)),
            'hobi'                  => htmlspecialchars($this->input->post('hobi', TRUE)),

            // data orang tua siswa
            'nama_ayah'             => htmlspecialchars($this->input->post('nama_ayah', TRUE)),
            'nama_ibu'              => htmlspecialchars($this->input->post('nama_ibu', TRUE)),
            'alamat_ot'             => htmlspecialchars($this->input->post('alamat_ot', TRUE)),
            'no_hp_ot'              => htmlspecialchars($this->input->post('no_hp_ot', TRUE)),
            'pendidikan_ot'         => htmlspecialchars($this->input->post('pendidikan_ot', TRUE)),
            'pekerjaan_ot'          => htmlspecialchars($this->input->post('pekerjaan_ot', TRUE)),
            'penghasilan_ot'        => htmlspecialchars($this->input->post('penghasilan_ot', TRUE)),

            // 'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.png',
            'password' => password_hash($this->input->post('tanggal_lahir'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'validasi' => 'Belum',
            'date_created' => time()
        ];
        $this->db->insert('tbl_datappdb', $data);
    }

    // Untuk seluruh data ppdb yang ada dimenu admin
    public function editPPDB()
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);
        // $fixkode = $this->input->post('kode_pendaftaran');

        $is_active = $this->input->post('is_active', TRUE);
        if ($is_active == 1) {
            $validasi = 'Sudah';
        } elseif ($is_active == 0) {
            $validasi = 'Belum';
        }

        $data = [
            // 'kode_pendaftaran'      => ($fixkode),
            'nik'                   => htmlspecialchars($this->input->post('nik', TRUE)),
            'nama'                  => htmlspecialchars($nama),
            'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
            'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
            'kd_agama'              => $this->input->post('agama', TRUE),
            'warganegara'           => $this->input->post('warganegara', TRUE),
            'statussiswa'           => $this->input->post('statussiswa', TRUE),
            'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
            'dari__bersaudara'      => htmlspecialchars($this->input->post('dari__bersaudara', TRUE)),
            'jumlah_saudara'        => htmlspecialchars($this->input->post('jumlah_saudara', TRUE)),
            'alamat'                => htmlspecialchars($this->input->post('alamat', TRUE)),
            'rt'                    => htmlspecialchars($this->input->post('rt', TRUE)),
            'rw'                    => htmlspecialchars($this->input->post('rw', TRUE)),
            'kelurahan'             => htmlspecialchars($this->input->post('kelurahan', TRUE)),
            'kecamatan'             => htmlspecialchars($this->input->post('kecamatan', TRUE)),
            'no_hp'                 => htmlspecialchars($this->input->post('no_hp', TRUE)),
            'tinggalbersama'        => $this->input->post('tinggalbersama', TRUE),
            'jarak'                 => htmlspecialchars($this->input->post('jarak', TRUE)),
            'transport'             => $this->input->post('transport', TRUE),
            'jurusan'               => $this->input->post('jurusan', TRUE),
            'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
            'nisn'                  => htmlspecialchars($this->input->post('nisn', TRUE)),
            'no_sttb'               => htmlspecialchars($this->input->post('no_sttb', TRUE)),
            'pindahan'              => htmlspecialchars($this->input->post('pindahan', TRUE)),
            'suratpindah'           => $this->input->post('suratpindah', TRUE),
            'alasan'                => htmlspecialchars($this->input->post('alasan', TRUE)),
            'kartu_kip'             => htmlspecialchars($this->input->post('kartu_kip', TRUE)),
            'cita_cita'             => htmlspecialchars($this->input->post('cita_cita', TRUE)),
            'hobi'                  => htmlspecialchars($this->input->post('hobi', TRUE)),

            // data orang tua siswa
            'nama_ayah'             => htmlspecialchars($this->input->post('nama_ayah', TRUE)),
            'nama_ibu'              => htmlspecialchars($this->input->post('nama_ibu', TRUE)),
            'alamat_ot'             => htmlspecialchars($this->input->post('alamat_ot', TRUE)),
            'no_hp_ot'              => htmlspecialchars($this->input->post('no_hp_ot', TRUE)),
            'pendidikan_ot'         => htmlspecialchars($this->input->post('pendidikan_ot', TRUE)),
            'pekerjaan_ot'          => htmlspecialchars($this->input->post('pekerjaan_ot', TRUE)),
            'penghasilan_ot'        => htmlspecialchars($this->input->post('penghasilan_ot', TRUE)),

            // 'name' => htmlspecialchars($this->input->post('name', true)),
            'email'                 => htmlspecialchars($email),
            'password'              => password_hash($this->input->post('tanggal_lahir'), PASSWORD_DEFAULT),
            'role_id'               => 2,
            'is_active'             => $is_active,
            'validasi'              => $validasi
            // 'validasi'              => $this->input->post('validasi', TRUE),
        ];

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_datappdb']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_ppdb->editDataPPDB($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }

        // $this->db->set('name', $data);

        // $this->db->set('image', $new_image);
        $this->db->where('kode_pendaftaran', $this->input->post('kode_pendaftaran'));
        $this->db->update(
            'tbl_datappdb',
            $data
        );
    }

    // Untuk data diri masing-masing user/ppdb
    public function editDataPPDB()
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);
        $fixkode = $this->input->post('kode_pendaftaran', true);

        $data = [
            'kode_pendaftaran'      => ($fixkode),
            'nik'                   => htmlspecialchars($this->input->post('nik', TRUE)),
            'nama'                  => htmlspecialchars($nama),
            'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
            'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
            'kd_agama'              => $this->input->post('agama', TRUE),
            'warganegara'           => $this->input->post('warganegara', TRUE),
            'statussiswa'           => $this->input->post('statussiswa', TRUE),
            'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
            'dari__bersaudara'      => htmlspecialchars($this->input->post('dari__bersaudara', TRUE)),
            'jumlah_saudara'        => htmlspecialchars($this->input->post('jumlah_saudara', TRUE)),
            'alamat'                => htmlspecialchars($this->input->post('alamat', TRUE)),
            'rt'                    => htmlspecialchars($this->input->post('rt', TRUE)),
            'rw'                    => htmlspecialchars($this->input->post('rw', TRUE)),
            'kelurahan'             => htmlspecialchars($this->input->post('kelurahan', TRUE)),
            'kecamatan'             => htmlspecialchars($this->input->post('kecamatan', TRUE)),
            'no_hp'                 => htmlspecialchars($this->input->post('no_hp', TRUE)),
            'tinggalbersama'        => $this->input->post('tinggalbersama', TRUE),
            'jarak'                 => htmlspecialchars($this->input->post('jarak', TRUE)),
            'transport'             => $this->input->post('transport', TRUE),
            'jurusan'               => $this->input->post('jurusan', TRUE),
            'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
            'nisn'                  => htmlspecialchars($this->input->post('nisn', TRUE)),
            'no_sttb'               => htmlspecialchars($this->input->post('no_sttb', TRUE)),
            'pindahan'              => htmlspecialchars($this->input->post('pindahan', TRUE)),
            'suratpindah'           => $this->input->post('suratpindah', TRUE),
            'alasan'                => htmlspecialchars($this->input->post('alasan', TRUE)),
            'kartu_kip'             => htmlspecialchars($this->input->post('kartu_kip', TRUE)),
            'cita_cita'             => htmlspecialchars($this->input->post('cita_cita', TRUE)),
            'hobi'                  => htmlspecialchars($this->input->post('hobi', TRUE)),

            // data orang tua siswa
            'nama_ayah'             => htmlspecialchars($this->input->post('nama_ayah', TRUE)),
            'nama_ibu'              => htmlspecialchars($this->input->post('nama_ibu', TRUE)),
            'alamat_ot'             => htmlspecialchars($this->input->post('alamat_ot', TRUE)),
            'no_hp_ot'              => htmlspecialchars($this->input->post('no_hp_ot', TRUE)),
            'pendidikan_ot'         => htmlspecialchars($this->input->post('pendidikan_ot', TRUE)),
            'pekerjaan_ot'          => htmlspecialchars($this->input->post('pekerjaan_ot', TRUE)),
            'penghasilan_ot'        => htmlspecialchars($this->input->post('penghasilan_ot', TRUE)),

            // 'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('tanggal_lahir'), PASSWORD_DEFAULT),
            'role_id' => 2
        ];

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_datappdb']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_ppdb->editDataPPDB($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }


        // $this->db->set('name', $data);

        // $this->db->set('image', $new_image);
        $this->db->where('kode_pendaftaran', $fixkode);
        $this->db->update('tbl_datappdb', $data);
    }

    // public function deletePPDB($fixkode)
    // {
    //     $this->db->delete('t_user_sub_menu', ['id' => $id]);
    // }

    public function deletePPDB($kode_pendaftaran)
    {
        $this->db->delete(
            'tbl_datappdb',
            ['kode_pendaftaran' => $kode_pendaftaran]
        );
    }
}
