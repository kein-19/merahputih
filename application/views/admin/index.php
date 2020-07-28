<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-sm-12">
            <div class="header d-block p-2 bg-primary text-white">
                <h3>Informasi</h3>
            </div>
            <div class="d-block p-2 bg-light">
                <div class="porlets-content mt-sm-3">
                    <h1 class="h4 mb-sm-3">Yth Saudara/i.
                        <?php echo strtoupper($tbl_user['nama_lengkap']); ?>
                    </h1>

                    <!-- Daftar Calon Siswa -->

                    <p style="text-indent: 60px;" class="mb-sm-3 text-justify">Selamat datang <?= ucwords($tbl_user['nama_lengkap']); ?>, Anda telah berhasil login sebagia Admin. Berikut data calon siswa yang sudah terdaftar. Calon siswa yang telah terdaftar bisa mencetak Formulir dan menyerahkan ke SMK MERAH PUTIH untuk divalidasi agar menjadi Siswa Baru SMK MERAH PUTIH.</p>

                </div>
            </div>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->