<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $notelp = isset($_POST['notelp']) ? $_POST['notelp'] : '';
    $pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';
    $nik = isset($_POST['nik']) ? $_POST['nik'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $pinjaman = isset($_POST['pinjaman']) ? $_POST['pinjaman'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO kontak VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $email, $notelp, $pekerjaan, $nik, $alamat, $pinjaman]);
    // Output message
    $msg = 'Berhasil Ditambahkan !';
}
?>


<?= template_header('Create') ?>

<div class="content update">
    <h2>Tambahkan Pinjaman</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="nama" id="nama">
        <label for="email">Email</label>
        <label for="notelp">No. Telp</label>
        <input type="text" name="email" id="email">
        <input type="text" name="notelp" id="notelp">
        <label for="pekerjaan">Pekerjaan</label>
        <label for="nik">NIK</label>
        <input type="text" name="pekerjaan" id="pekerjaan">
        <input type="text" name="nik" id="nik">
        <label for="alamat">Alamat</label>
        <label for="pinjaman">Jumlah Pinjaman</label>
        <input type="text" name="alamat" id="alamat">
        <input type="number" name="pinjaman" id="pinjaman">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>

<?= template_footer() ?>