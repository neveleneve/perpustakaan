<?php
require($_SERVER['DOCUMENT_ROOT']
    // . '/perpustakaan'
    . '/controller/AuthController.php');
require($_SERVER['DOCUMENT_ROOT']
    // . '/perpustakaan'
    . '/configuration/pagename.php');
require($_SERVER['DOCUMENT_ROOT']
    // . '/perpustakaan'
    . '/controller/AdminController.php');
require($_SERVER['DOCUMENT_ROOT']
    // . '/perpustakaan'
    . '/configuration/session.php');

$auth = new AuthController();
$admin = new AdminController();
$auth->AuthCheck('location:../login', null);

$id = $_GET['id'];
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];

$data = $admin->cetakLaporan($id, $bulan, $tahun);
function namabulan($nomor)
{
    switch ($nomor) {
        case 1:
            return 'Januari';
            break;
        case 2:
            return 'Februari';
            break;
        case 3:
            return 'Maret';
            break;
        case 4:
            return 'April';
            break;
        case 5:
            return 'Mei';
            break;
        case 6:
            return 'Juni';
            break;
        case 7:
            return 'Juli';
            break;
        case 8:
            return 'Agustus';
            break;
        case 9:
            return 'September';
            break;
        case 10:
            return 'Oktober';
            break;
        case 11:
            return 'November';
            break;
        case 12:
            return 'Desember';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan <?= $data['namaLaporan'] ?></title>
    <link href="http://<?= $_SERVER['HTTP_HOST']
                        // . '/perpustakaan' 
                        ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="http://<?= $_SERVER['HTTP_HOST']
                        // . '/perpustakaan' 
                        ?>/template/css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <div class="row my-5">
                <div class="col-12">
                    <h1 class="h2 text-center text-gray-900 font-weight-bold">
                        Laporan <?= $data['namaLaporan'] ?>
                    </h1>
                    <h1 class="h4 text-center text-gray-900 font-weight-bold">
                        Bulan <?= namabulan(date('m', strtotime($bulan))) . ' ' . date('Y', strtotime($tahun)) ?>
                    </h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <table class="table table-bordered">
                        <thead>
                            <?php switch ($id) {
                                case 1: ?>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>ID Peminjaman</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal Peminjaman</th>
                                    </tr>
                                <?php break;
                                case 2: ?>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>ID Peminjaman</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                    </tr>
                                <?php break;
                                case 3: ?>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>ID Buku</th>
                                        <th>Nama Buku</th>
                                        <th>Penerbit</th>
                                        <th class="text-right">Jumlah</th>
                                    </tr>
                            <?php break;
                            } ?>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if (count($data['dataLaporan']) > 0) {
                                switch ($id) {
                                    case 1:
                                        foreach ($data['dataLaporan'] as $key) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $key[1] ?></td>
                                                <td><?= ucwords($key[2]) ?></td>
                                                <td><?= date('d', strtotime($key[5])) . ' ' . namabulan(date('m', strtotime($key[5]))) . ' ' . date('Y', strtotime($key[5])) ?></td>
                                            </tr>
                                        <?php }
                                        break;
                                    case 2:
                                        foreach ($data['dataLaporan'] as $key) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $key[1] ?></td>
                                                <td><?= ucwords($key[2]) ?></td>
                                                <td><?= date('d', strtotime($key[5])) . ' ' . namabulan(date('m', strtotime($key[5]))) . ' ' . date('Y', strtotime($key[5])) ?></td>
                                                <td><?= date('d', strtotime($key[6])) . ' ' . namabulan(date('m', strtotime($key[6]))) . ' ' . date('Y', strtotime($key[6])) ?></td>
                                            </tr>
                                        <?php }
                                        break;
                                    case 3:
                                        foreach ($data['dataLaporan'] as $key) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $key[1] ?></td>
                                                <td><?= $key[3] ?></td>
                                                <td><?= $key[2] ?></td>
                                                <td class="text-right"><?= $key[4] ?></td>
                                            </tr>
                                <?php }
                                        break;
                                }
                            } else { ?>
                                <tr>
                                    <?php
                                    switch ($id) {
                                        case 1: ?>
                                            <td colspan="4" class="text-center">Data Laporan <?= $data['namaLaporan'] ?> Kosong</td>
                                        <?php break;
                                        case 2: ?>
                                            <td colspan="5" class="text-center">Data Laporan <?= $data['namaLaporan'] ?> Kosong</td>
                                        <?php break;
                                        case 3: ?>
                                            <td colspan="5" class="text-center">Data Laporan <?= $data['namaLaporan'] ?> Kosong</td>
                                    <?php break;
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="http://<?= $_SERVER['HTTP_HOST']
                        // . '/perpustakaan' 
                        ?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST']
                        // . '/perpustakaan' 
                        ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST']
                        // . '/perpustakaan' 
                        ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST']
                        // . '/perpustakaan' 
                        ?>/template/js/sb-admin-2.min.js"></script>

</body>

</html>