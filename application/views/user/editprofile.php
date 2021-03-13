<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <h1 class="col-md-10 ml-md-4 font-weight-bold text-primary align-self-md-center p-2"><?= $title; ?></h1>
            </div>
        </div>
        <div class="card-body ml-md-4">

            <div class="row">
                <div class="col-lg-12">

                    <?= form_open_multipart('user/editprofile'); ?>

                    <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Pribadi Siswa</h3>

                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="kode_pendaftaran">
                                    Nomor Formulir
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm" id="kode_pendaftaran" name="kode_pendaftaran" value="<?= $tbl_datappdb['kode_pendaftaran']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="nik">
                                    NIK
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="nik" placeholder="Masukkan NIK" id="nik" class="form-control form-control-sm" value="<?= $tbl_datappdb['nik']; ?>">
                                </div>
                                <?= form_error('nik', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="nama">
                                    Nama Lengkap
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" id="nama" class="form-control form-control-sm" value="<?= $tbl_datappdb['nama']; ?>">
                                </div>
                                <?= form_error('nama', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="tempat_lahir">
                                    Tempat Tanggal Lahir
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" id="tempat_lahir" class="form-control form-control-sm" value="<?= $tbl_datappdb['tempat_lahir']; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" id="tanggal_lahir" class="form-control form-control-sm" value="<?= $tbl_datappdb['tanggal_lahir']; ?>">
                                </div>
                                <?= form_error('tempat_lahir', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-4">', '</small>'); ?>
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-3 col-sm-3 align-items-sm-end">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="gender">
                                    Jenis Kelamin
                                </label>
                                <div class="col-sm-4">
                                    <?php
                                    $jenis_kelamin = array(
                                        null => '- Silahkan Pilih -',
                                        'L' => 'Laki-laki',
                                        'P' => 'Perempuan'
                                    );
                                    $pilih = $tbl_datappdb['jenis_kelamin'];
                                    echo form_dropdown(
                                        'jenis_kelamin',
                                        $jenis_kelamin,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('jenis_kelamin', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="agama">
                                    Agama
                                </label>
                                <div class="col-sm-4">
                                    <?php
                                    $agama = array(
                                        null => '- Silahkan Pilih -',
                                        '01' => 'Islam',
                                        '02' => 'Kristen Protestan',
                                        '03' => 'Katholik',
                                        '04' => 'Hindu',
                                        '05' => 'Budha',
                                        '06' => 'Konghucu',
                                        '99' => 'Lain-lain'
                                    );
                                    $pilih = $tbl_datappdb['kd_agama'];
                                    echo form_dropdown(
                                        'agama',
                                        $agama,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('agama', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>

                            <!-- tambahan dari yang ada -->
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="warganegara">
                                    Kewarganegaraan
                                </label>
                                <div class="col-sm-4">
                                    <?php
                                    $warganegara = array(
                                        null => '- Silahkan Pilih -',
                                        'WNI' => 'Warga Negara Indonesia',
                                        'WNA' => 'Warga Negara Asing'
                                    );
                                    $pilih = $tbl_datappdb['warganegara'];;
                                    echo form_dropdown(
                                        'warganegara',
                                        $warganegara,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('warganegara', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="statussiswa">
                                    Status Siswa
                                </label>
                                <div class="col-sm-4">
                                    <?php
                                    $statussiswa = array(
                                        null => '- Silahkan Pilih -',
                                        'Kandung' => 'Kandung',
                                        'Yatim' => 'Yatim',
                                        'Piatu' => 'Piatu',
                                        'Yatim Piatu' => 'Yatim Piatu',
                                        'Tiri' => 'Tiri',
                                        'Angkat' => 'Angkat'
                                    );
                                    $pilih = $tbl_datappdb['statussiswa'];
                                    echo form_dropdown(
                                        'statussiswa',
                                        $statussiswa,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('statussiswa', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="anak_ke">
                                    Anak ke
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="anak_ke" id="anak_ke" class="form-control form-control-sm" value="<?= $tbl_datappdb['anak_ke']; ?>">
                                </div>
                                <label class="col-sm-2 col-form-label col-form-label-sm" for="anak_ke">
                                    dari
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="dari__bersaudara" id="dari__bersaudara" class="form-control form-control-sm" value="<?= $tbl_datappdb['dari__bersaudara']; ?>">
                                </div>
                                <label class="col-sm-3 col-form-label col-form-label-sm" for="dari__bersaudara">
                                    saudara
                                </label>
                                <?= form_error('anak_ke', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-3">', '</small>'); ?>
                                <?= form_error('dari__bersaudara', '<small class="text-danger pl-3 col-sm-4 align-items-sm-end">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="jumlah_saudara">
                                    Jumlah Saudara
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="jumlah_saudara" id="jumlah_saudara" class="form-control form-control-sm" value="<?= $tbl_datappdb['jumlah_saudara']; ?>">
                                </div>
                                <label class="col-sm-6 col-form-label col-form-label-sm" for="jumlah_saudara">
                                    orang
                                </label>
                                <?= form_error('jumlah_saudara', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="email">
                                    E-mail
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm" id="email" name="email" placeholder="E-mail" value="<?= $tbl_datappdb['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="kartu_kip">
                                    Kartu KIP/PKH/KKS 
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm" id="kartu_kip" name="kartu_kip" placeholder="Isi Nomor Kartu KIP/PKH/KKS" value="<?= $tbl_datappdb['kartu_kip']; ?>">
                                </div>
                                <?= form_error('kartu_kip', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="cita_cita">
                                    Cita-cita
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm" id="cita_cita" name="cita_cita" placeholder="Cita-cita" value="<?= $tbl_datappdb['cita_cita']; ?>">
                                </div>
                                <?= form_error('cita_cita', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="hobi">
                                    Hobi
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm" id="hobi" name="hobi" placeholder="Hobi" value="<?= $tbl_datappdb['hobi']; ?>">
                                </div>
                                <?= form_error('hobi', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                        </div>

                        <!-- Image -->
                        <div class="col-sm-3">
                            <!-- <div class="card float-md-right p-md-2">
                                <img src="<?= base_url('assets/img/profile/') . $tbl_datappdb['image']; ?>" class="card-img rounded mx-auto d-block" style="width: 100px">
                            </div> -->
                            <div class="row">
                                <img src="<?= base_url('assets/img/profile/') . $tbl_datappdb['image']; ?>" class="img-thumbnail mb-sm-3 p-sm-2">
                                <div class="custom-file col-form-label col-form-label-sm">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Tempat Tinggal Siswa</h3>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="alamat">
                            Alamat
                        </label>
                        <div class="col-sm-7">
                            <input name="alamat" id="alamat" class="form-control form-control-sm" value="<?= $tbl_datappdb['alamat']; ?>"></input>
                        </div>
                        <?= form_error('alamat', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="rt">
                            RT / RW
                        </label>
                        <div class="col-sm-3">
                            <input type="text" name="rt" placeholder="RT" id="rt" class="form-control form-control-sm" value="<?= $tbl_datappdb['rt']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="rw" placeholder="RW" id="rw" class="form-control form-control-sm" value="<?= $tbl_datappdb['rw']; ?>">
                        </div>
                        <?= form_error('rt', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-3">', '</small>'); ?>
                        <?= form_error('rw', '<small class="text-danger pl-3 col-sm-3 align-items-sm-end">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="kelurahan">
                            Kelurahan / Desa
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="kelurahan" placeholder="Kelurahan / Desa" id="kelurahan" class="form-control form-control-sm" value="<?= $tbl_datappdb['kelurahan']; ?>">
                        </div>
                        <?= form_error('kelurahan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="kecamatan">
                            Kecamatan
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="kecamatan" placeholder="Kecamatan" id="kecamatan" class="form-control form-control-sm" value="<?= $tbl_datappdb['kecamatan']; ?>">
                        </div>
                        <?= form_error('kecamatan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="no_hp">
                            No. HP
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="no_hp" placeholder="Nomor HP" id="no_hp" class="form-control form-control-sm" value="<?= $tbl_datappdb['no_hp']; ?>">
                        </div>
                        <?= form_error('no_hp', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="tinggalbersama">
                            Tinggal Bersama dengan
                        </label>
                        <div class="col-sm-5">
                            <?php
                            $tinggalbersama = array(
                                null => '- Silahkan Pilih -',
                                'Orang tua' => 'Orang tua',
                                'Saudara' => 'Saudara',
                                'Orang lain' => 'Orang lain',
                                'Asrama' => 'Asrama'
                            );
                            $pilih = $tbl_datappdb['tinggalbersama'];;
                            echo form_dropdown(
                                'tinggalbersama',
                                $tinggalbersama,
                                $pilih,
                                "class='form-control form-control-sm'"
                            );
                            ?>
                        </div>
                        <?= form_error('tinggalbersama', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="jarak">
                            Jarak Rumah ke Sekolah
                        </label>
                        <div class="col-sm-1">
                            <input type="text" name="jarak" id="jarak" class="form-control form-control-sm" value="<?= $tbl_datappdb['jarak']; ?>">
                        </div>
                        <label class="col-sm-2 col-form-label col-form-label-sm" for="jarak">
                            km
                        </label>
                        <?= form_error('jarak', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                    </div>
                    <div class="form-group row mb-lg-5">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="transport">
                            Ke Sekolah dengan
                        </label>
                        <div class="col-sm-5">
                            <?php
                            $transport = array(
                                null => '- Silahkan Pilih -',
                                'Kendaraan Umum' => 'Kendaraan Umum',
                                'Kendaraan Pribadi' => 'Kendaraan Pribadi',
                                'Jalan Kaki' => 'Jalan Kaki'
                            );
                            $pilih = $tbl_datappdb['transport'];;
                            echo form_dropdown(
                                'transport',
                                $transport,
                                $pilih,
                                "class='form-control form-control-sm'"
                            );
                            ?>
                        </div>
                        <?= form_error('transport', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                    </div>
                    <hr>

                    <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Pilihan Kompetensi Keahlian</h3>
                    <div class="form-group row mb-lg-5">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="jurusan">
                            Kompetensi Keahlian
                        </label>
                        <div class="col-sm-5">
                            <?php
                            $jurusan = array(
                                null => '- Silahkan Pilih -',
                                'AP' => 'Administrasi Perkantoran',
                                'TKJ' => 'Teknik Komputer dan Jaringan'
                            );
                            $pilih = $tbl_datappdb['jurusan'];
                            echo form_dropdown(
                                'jurusan',
                                $jurusan,
                                $pilih,
                                "class='form-control form-control-sm'"
                            );
                            ?> </div>
                        <?= form_error('jurusan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                    </div>
                    <hr>

                    <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Pendidikan Siswa Sebelumnya</h3>
                    <h4 class="h6 text-gray-900 mt-sm-4 mb-sm-3">Asal Sekolah <span class="text-danger">(Wajib diisi)</span></h4>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="asal_sekolah">
                            SMP/MTs
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="asal_sekolah" placeholder="SMP/MTs" id="asal_sekolah" class="form-control form-control-sm" value="<?= $tbl_datappdb['asal_sekolah']; ?>">
                        </div>
                        <?= form_error('asal_sekolah', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="nisn">
                            Nomor Induk Siswa Nasional (NISN)
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional (NISN)" id="nisn" class="form-control form-control-sm" value="<?= $tbl_datappdb['nisn']; ?>">
                        </div>
                        <?= form_error('nisn', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="no_sttb">
                            Tanggal/Tahun/No.STTB
                        </label>
                        <div class="col-sm-5">
                            <input type="text" name="no_sttb" placeholder="Tanggal/Tahun/No.STTB" id="no_sttb" class="form-control form-control-sm" value="<?= $tbl_datappdb['no_sttb']; ?>">
                        </div>
                        <label class="col-sm-2 col-form-label col-form-label-sm" for="no_sttb">
                            tahun
                        </label>
                        <?= form_error('no_sttb', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                    </div>
                    <h4 class="h6 text-gray-900 mt-sm-4 mb-sm-3">Pindahan <span class="text-danger font-italic">(Hanya diisi oleh siswa pindahan)</span></h4>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="pindahan">
                            Dari Sekolah
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="pindahan" placeholder="Asal Sekolah" id="pindahan" class="form-control form-control-sm" value="<?= $tbl_datappdb['pindahan']; ?>">
                        </div>
                        <?= form_error('pindahan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="suratpindah">
                            Surat Pindah + Raport
                        </label>
                        <div class="col-sm-5">
                            <?php
                            $suratpindah = array(
                                null => '- Silahkan Pilih -',
                                'Ada' => 'Ada',
                                'Tidak' => 'Tidak'
                            );
                            $pilih = $tbl_datappdb['suratpindah'];
                            echo form_dropdown(
                                'suratpindah',
                                $suratpindah,
                                $pilih,
                                "class='form-control form-control-sm'"
                            );
                            ?>
                        </div>
                    </div>
                    <div class="form-group row mb-lg-5">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="alasan">
                            Alasan Pindah
                        </label>
                        <div class="col-sm-5">
                            <input type="text" name="alasan" placeholder="Alasan Pindah" id="alasan" class="form-control form-control-sm" value="<?= $tbl_datappdb['alasan']; ?>">
                            <?= form_error('alasan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <hr>

                    <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Data Orang Tua Siswa</h3>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="nama_ayah">
                            Nama Lengkap Ayah
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="nama_ayah" placeholder="Masukkan Nama Lengkap Ayah" id="nama_ayah" class="form-control form-control-sm" value="<?= $tbl_datappdb['nama_ayah']; ?>">
                        </div>
                        <?= form_error('nama_ayah', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="nama_ibu">
                            Nama Lengkap Ibu
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="nama_ibu" placeholder="Masukkan Nama Lengkap Ibu" id="nama_ibu" class="form-control form-control-sm" value="<?= $tbl_datappdb['nama_ibu']; ?>">
                        </div>
                        <?= form_error('nama_ibu', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="alamat_ot">
                            Alamat Orang Tua/Wali
                        </label>
                        <div class="col-sm-7">
                            <input name="alamat_ot" id="alamat_ot" class="form-control form-control-sm" value="<?= $tbl_datappdb['alamat_ot']; ?>"></input>
                        </div>
                        <?= form_error('alamat_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="no_hp_ot">
                            No. HP
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="no_hp_ot" placeholder="Nomor HP" id="no_hp_ot" class="form-control form-control-sm" value="<?= $tbl_datappdb['no_hp_ot']; ?>">
                        </div>
                        <?= form_error('no_hp_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="pendidikan_ot">
                            Pendidikan Terakhir
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="pendidikan_ot" placeholder="Pendidikan Terakhir" id="pendidikan_ot" class="form-control form-control-sm" value="<?= $tbl_datappdb['pendidikan_ot']; ?>">
                        </div>
                        <?= form_error('pendidikan_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="pekerjaan_ot">
                            Pekerjaan
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="pekerjaan_ot" placeholder="Pekerjaan" id="pekerjaan_ot" class="form-control form-control-sm" value="<?= $tbl_datappdb['pekerjaan_ot']; ?>">
                        </div>
                        <?= form_error('pekerjaan_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="penghasilan_ot">
                            Penghasilan
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="penghasilan_ot" placeholder="Penghasilan" id="penghasilan_ot" class="form-control form-control-sm" value="<?= $tbl_datappdb['penghasilan_ot']; ?>">
                        </div>
                        <?= form_error('penghasilan_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>



                    <!-- <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div> -->
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </div>


                    </form>


                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->