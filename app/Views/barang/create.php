<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Tambah Barang</h1>
        <!-- Tombol kembali -->
        <a href="<?= base_url('barang') ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i>
            Kembali</a>
    </div>
    <form action="/barang/store" method="post">
        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="form-group">
            <label for="sn">Serial Number</label>
            <input type="text" class="form-control" id="sn" name="sn" required>
        </div>
        <div class="form-group">
            <label for="tgl_pembelian">Tanggal Pembelian</label>
            <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian" required>
        </div>
        <div class="form-group">
            <label for="tgl_kalibarasi">Tanggal Kalibrasi</label>
            <input type="date" class="form-control" id="tgl_kalibarasi" name="tgl_kalibarasi">
        </div>
        <div class="form-group">
            <label>Kondisi Alat : </label>
            <div class="ml-2 mt-2 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kondisi_alat" id="kondisi_baik" value="Baik">
                <label class="form-check-label" for="inlineRadio2">Baik</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kondisi_alat" id="kondisi_tidak_baik" value="Tidak Baik">
                <label class="form-check-label" for="inlineRadio3">Tidak Baik</label>
            </div>
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Simpan</button>
    </form>

</div>
<?= $this->endSection(); ?>