<?php include 'header.php'; ?>

<h2 class="text-center"><?= isset($data) ? 'Edit Data' : 'Tambah Data' ?></h2>
<form method="POST" action="index.php?action=save" class="mx-auto">
    <input type="hidden" name="id" value="<?= isset($data) ? $data['id'] : '' ?>">
    
    <div class="form-group mb-3">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" value="<?= isset($data) ? $data['nama'] : '' ?>" required>
    </div>
    
    <div class="form-group mb-3">
        <label for="posisi">Posisi</label>
        <input type="text" class="form-control" name="posisi" value="<?= isset($data) ? $data['posisi'] : '' ?>" required>
    </div>
    
    <div class="form-group mb-3">
        <label for="usia">Usia</label>
        <input type="number" class="form-control" name="usia" value="<?= isset($data) ? $data['usia'] : '' ?>" required>
    </div>
    
    <div class="form-group mb-3">
        <label for="tanggal_mulai">Tanggal Mulai</label>
        <input type="date" class="form-control" name="tanggal_mulai" value="<?= isset($data) ? $data['tanggal_mulai'] : '' ?>" required>
    </div>
    
    <div class="form-group mb-3">
        <label for="gaji">Gaji</label>
        <input type="text" class="form-control" name="gaji" value="<?= isset($data) ? $data['gaji'] : '' ?>" required>
    </div>
    
    <button type="submit" class="btn btn-primary"><?= isset($data) ? 'Update Data' : 'Tambah Data' ?></button>
</form>

<?php include 'footer.php'; ?>
