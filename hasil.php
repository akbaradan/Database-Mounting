<?php require_once('db_connect.php'); ?>
<html>

<head>
    <title>PBP Variasi 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Daftar <br> Rachmad Akbar Ramadan</br>
                <br>24060120140137</br>
                <br>Ganjil</br>
            </div>

            <div class="card-body">
                <?php
                if (isset($_POST['submit'])) {
                    $nama = test_input($_POST['nama']);
                    $nim = test_input($_POST['nim']);
                    $email = test_input($_POST['email']);
                    $jenis_kelamin = test_input($_POST['jenis_kelamin']);
                    $alamat = test_input($_POST['alamat']);
                    $departemen = test_input($_POST['departemen']);
                    $jurusan = test_input($_POST['jurusan']);

                    $result = $db->query("INSERT INTO mahasiswa(nama, nim, email, jenis_kelamin, alamat, id_departemen, id_jurusan) VALUES('$nama', '$nim', '$email', '$jenis_kelamin', '$alamat', '$departemen', '$jurusan')");

                    if ($result) :
                ?>
                        <div class="alert alert-success">Data berhasil disimpan</div>
                    <?php else : ?>
                        <div class="alert alert-error">Data gagal disimpan <?php echo $db->error ?></div>
                        }
                <?php
                    endif;
                }
                ?>
                <form method="POST" onsubmit="return submitForm()" name="form">
                    <div class="form-group">
                        <label for="naam">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                        <small class="form-text text-danger" id="nama_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="naam">NIM</label>
                        <input type="text" class="form-control" name="nim" id="nim">
                        <small class="form-text text-danger" id="nim_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="naam">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                        <small class="form-text text-danger" id="email_error"></small>
                        <small class="form-text text-success" id="email_success" style="display: none">Email tersedia</small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki">
                        <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan">
                        <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                        <small class="form-text text-danger" id="jenis_kelamin_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        <small class="form-text text-danger" id="alamat_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Departemen</label>
                        <select class="form-control" id="departemen" name="departemen">
                            <option value="0">Pilih Departemen</option>
                            <?php
                            $result = $db->query('select * from departemen');

                            while ($data = $result->fetch_object()) :
                            ?>
                                <option value="<?php echo $data->id ?>"><?php echo $data->nama ?></option>
                            <?php endwhile ?>
                        </select>
                        <small class="form-text text-danger" id="departemen_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="0">Pilih jurusan</option>
                        </select>
                        <small class="form-text text-danger" id="jurusan_error"></small>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>