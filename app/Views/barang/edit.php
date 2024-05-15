<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Edit Barang</h1>
        <!-- Tombol Kembali -->
        <a href="<?= base_url('barang') ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i>
            Kembali</a>
    </div>
    <form action="/barang/update/<?= $barang['id'] ?>" method="post">
        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" value="<?= $barang['merk'] ?>" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="<?= $barang['type'] ?>" required>
        </div>
        <div class="form-group">
            <label for="sn">Serial Number</label>
            <input type="text" class="form-control" id="sn" name="sn" value="<?= $barang['sn'] ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_pembelian">Tanggal Pembelian</label>
            <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian" value="<?= $barang['tgl_pembelian'] ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_kalibarasi">Tanggal Kalibrasi</label>
            <input type="date" class="form-control" id="tgl_kalibarasi" name="tgl_kalibarasi" value="<?= $barang['tgl_kalibarasi'] ?>">
        </div>
        <div class="form-group">
            <label for="kondisi_alat">Kondisi Alat</label>
            <input type="text" class="form-control" id="kondisi_alat" name="kondisi_alat" value="<?= $barang['kondisi_alat'] ?>" required>
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $barang['lokasi'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Simpan</button>
    </form>
</div>
<?= $this->endSection(); ?>