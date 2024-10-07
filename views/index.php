<?php include 'header.php'; ?>

<h2 class="text-center">Data Report</h2>
<a href="index.php?action=add" class="btn btn-success mb-3">Tambah Data</a>

<table id="reportTable" class="table table-striped table-bordered mx-auto" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Usia</th>
            <th>Tanggal Mulai</th>
            <th>Gaji</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datasetkaryawan as $index => $data): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['posisi'] ?></td>
            <td><?= $data['usia'] ?></td>
            <td><?= $data['tanggal_mulai'] ?></td>
            <td><?= $data['gaji'] ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $data['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="index.php?action=delete&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#reportTable').DataTable();
    });
</script>

<?php include 'footer.php'; ?>
