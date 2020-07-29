<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sekolah extends CI_Model
{

    public function getSekolah()
    {
        return $this->db->get('tbl_profile')->row();
    }

    public function getSekolahId()
    {
        $id = 1;
        return $this->db->get_where('tbl_profile', ['id' => $id])->row_array();
    }

    public function tambahDataSekolah($fixkode)
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);

        $data = [
            'nis'      => ($fixkode),
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

            // data orang tua siswa
            'nama_ot'               => htmlspecialchars($this->input->post('nama_ot', TRUE)),
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
        $this->db->insert('tbl_profile', $data);
    }

    public function editDataSekolah()
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);
        $fixkode = $this->input->post('nis', true);

        $data = [
            'nis'      => ($fixkode),
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

            // data orang tua siswa
            'nama_ot'               => htmlspecialchars($this->input->post('nama_ot', TRUE)),
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
                $old_image = $data['tbl_profile']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_ppdb->editDataSekolah($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }


        // $this->db->set('name', $data);

        // $this->db->set('image', $new_image);
        $this->db->where('nis', $fixkode);
        $this->db->update('tbl_profile', $data);
    }
}
