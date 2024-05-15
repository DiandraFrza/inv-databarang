<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Tambah Barang</h1>
        <!-- Tombol kembali -->
        <a href="<?= base_url('/barang/create/') ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah
            Barang</a>
    </div>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th scope="col">Merk</th>
                <th scope="col">Type</th>
                <th scope="col">Serial Number</th>
                <th scope="col">Tanggal Pembelian</th>
                <th scope="col">Tanggal Kalibrasi</th>
                <th scope="col">Kondisi Alat</th>
                <th scope="col">Lokasi Alat</th>
                <th scope="col">Action</th>
            </tr>
            <?php foreach ($barang as $item) : ?>
            <tr>
                <td class="filterhead"><?= $item['merk'] ?></td>
                <td class="filterhead"><?= $item['type'] ?></td>
                <td class="filterhead"><?= $item['sn'] ?></td>
                <td class="filterhead"><?= $item['tgl_pembelian'] ?></td>
                <td class="filterhead"><?= $item['tgl_kalibarasi'] ?></td>
                <td class="filterhead"><?= $item['kondisi_alat'] ?></td>
                <td class="filterhead"><?= $item['lokasi'] ?></td>
                <td>
                    <a href="/barang/edit/<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger"
                        onclick="showDeleteConfirmation(<?= $item['id'] ?>)">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </thead>
    </table>
    <script>
    function showDeleteConfirmation(id) {
        Swal.fire({
            title: 'Delete',
            text: "Yakin ingin menghapus?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete action if confirmed
                window.location.href = '/barang/delete/' + id;
            }
        });
    }
    </script>
</div>
<?= $this->endSection(); ?>