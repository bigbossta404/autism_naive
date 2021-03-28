<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/styles.css') ?>">
    <link href="<?= base_url('asset/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-user">
        <div class="container-fluid content-nav">
            <a class="navbar-brand text-white" href="<?= base_url('/') ?>"><i class="fas fa-brain"></i> ASD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white active" aria-current="page" href="#">Beranda</a>
                    <a class="nav-link text-white" href="#">Kontak</a>
                    <a class="nav-link text-white" href="#">Tentang</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- <content> -->
    <div class="container-fluid container-hitung">
        <div class="card bg-card-user">
            <div class="card-body mb-4">
                <div class="card shadow boxquestion">
                    <div class="card-body">
                        <?php echo form_open_multipart('pengguna/hitung', 'id="hitung"'); ?>
                        <div class="row no-gutters justify-content-center">
                            <div class="col-md-6.5 mr-3">
                                <div class=" row mb-4">
                                    <div class="col-xl myquestion" style="display: none; ">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-4 colone">
                                                <div class="form-group mb-3">
                                                    <label class="mb-2" for="">Umur Adik</label>
                                                    <select type="number" class="form-control border-primary" name="age" placeholder="Age">
                                                        <option value="">-- Umur --</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-2" for="">Jenis Kelamin</label>
                                                    <select class="form-control border-primary" name="gender" id="">
                                                        <option value="">-- Gender --</option>
                                                        <option value="m">Laki-laki</option>
                                                        <option value="f">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label class="mb-2" for="">Riwayat Penyakit Kuning</label>
                                                    <select class="form-control border-primary" name="jundice" id="">
                                                        <option value="">-- Jundice --</option>
                                                        <option value="yes">Ada</option>
                                                        <option value="no">Tidak Ada</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-2" for="">Keluarga </label>
                                                    <select class="form-control border-primary" name="autism" id="">
                                                        <option value="">-- Turunan --</option>
                                                        <option value="yes">Ada</option>
                                                        <option value="no">Tidak Ada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-xl-5"> -->
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">Apakah si Adik sering memperhatikan suara-suara kecil sementara anak-anak pada umumnya tidak?</label>
                                        <div class="form-group">
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="radio" name="pilih1" id="flexRadioDefault" value="1">
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    Iya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih1" id="flexRadioDefault" value="0" checked>
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">dia biasanya lebih berkonsentrasi pada keseluruhan gambar, daripada detail-detail kecil</label>
                                        <div class="form-group mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih2" value="1" id="flexRadioDefault">
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih2" value="0" id="flexRadioDefault" checked>
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">dalam kelompok sosial, dia dapat dengan mudah melacak percakapan beberapa orang yang berbeda</label>
                                        <div class="form-grup mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih3" value="1" id="flexRadioDefault">
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih3" value="0" id="flexRadioDefault" checked>
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">dia merasa mudah untuk bolak-balik di antara aktivitas yang berbeda</label>
                                        <div class="form-grup mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih4" value="1" id="flexRadioDefault">
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih4" value="0" id="flexRadioDefault" checked>
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">dia tidak tahu bagaimana menjaga percakapan tetap berjalan dengan teman-temannya</label>
                                        <div class="form-grup mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih5" value="1" id="flexRadioDefault">
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih5" value="0" id="flexRadioDefault" checked>
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">Si kecil pandai mengobrol?</label>
                                        <div class="form-grup mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih6" value="1" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih6" value="0" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">ketika dia membaca sebuah cerita, dia merasa sulit untuk mengetahui maksud atau perasaan karakter tersebut</label>
                                        <div class="form-grup mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih7" value="1" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih7" value="0" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">Ketika dia masih di prasekolah, dia biasa menikmati permainan yang melibatkan berpura-pura dengan anak-anak lain</label>
                                        <div class="form-grup mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih8" value="1" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih8" value="0" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">dia merasa mudah untuk mengetahui apa yang dipikirkan atau dirasakan seseorang hanya dengan melihat wajah mereka</label>
                                        <div class="form-grup mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih9" value="1" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih9" value="0" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-5 myquestion" style="display: none; ">
                                        <label for="">dia merasa sulit untuk mendapatkan teman baru</label>
                                        <div class="form-grup mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih10" value="1" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilih10" value="0" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="btn-toogle d-flex justify-content-center">
                <a href="#" class="btn btn-success qback">Kembali</a>
                <a href="#" class="btn btn-success qnext">Lanjutkan</a>
            </div>
        </div>
    </div>
    <!-- </content> -->
    <script src="<?= base_url('asset/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/hitung.js') ?>"></script>
    <!-- <script src="<?= base_url('asset/vendor/fontawesome-free/js/fontawesome.min.js') ?>"></script> -->

</body>

</html>