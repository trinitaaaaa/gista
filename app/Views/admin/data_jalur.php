<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Jalur</h1>
    <button type="button" class="btn btn-primary btn-icon-split mb-2" data-bs-toggle="modal" data-bs-target="#tambah-data-jalur">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span> <span class="text">Tambah Data Jalur</span>
    </button>
    <div class="modal fade" id="tambah-data-jalur" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Jalur</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('tambah-data-jalur'); ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-2">
                            <label class="form-check-label" for="pulau">Nama Gunung</label>
                            <select class="form-control" id="id_gunung" name="id_gunung" required>
                                <option value="">Pilih Gunung</option>
                                <?php foreach ($gunung as $g) : ?>
                                    <option value="<?= $g['id_gunung'] ?>"><?= $g['nama_gunung'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="gambar_gunung" class="form-label">Data Peta</label>
                            <input type="text" class="form-control" name="data_peta" id="data_peta" required>
                        </div>
                        <div class="mb-2">
                            <label for="nama_jalur" class="form-label">Nama Jalur</label>
                            <input type="text" class="form-control" name="nama_jalur" id="nama_jalur" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-check-label" for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2" required></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-check-label" for="detail">Detail</label>
                            <textarea class="form-control" name="detail" id="detail" cols="30" rows="2" required></textarea>
                        </div>
                        <div class="modal-footer"><button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button><button class="btn btn-success" type="submit">Kirim</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="border-bottom: 1px solid #000">No</th>
                            <th style="border-bottom: 1px solid #000">Data peta</th>
                            <th style="border-bottom: 1px solid #000">Nama Jalur</th>
                            <th style="border-bottom: 1px solid #000">Alamat</th>
                            <th style="border-bottom: 1px solid #000">Detail</th>
                            <th style="border-bottom: 1px solid #000" width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        foreach ($jalur as $j) : ?>
                            <tr>
                                <td><?= $counter; ?></td>
                                <td><?= $j['data_peta']; ?></td>
                                <td><?= $j['nama_jalur']; ?></td>
                                <td><?= $j['alamat']; ?></td>
                                <td><?= $j['detail']; ?></td>
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-<?= $j['id_jalur'] ?>"><i class="fas fa-edit"></i> </button> <button id="button-<?= $j['id_jalur'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> </button></td>
                            </tr>
                            <div class="modal fade" id="modal-<?= $j['id_jalur'] ?>" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalLabel-<?= $j['id_jalur'] ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel-<?= $j['id_jalur'] ?>">Update Data Jalur</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url('update-data-jalur'); ?>" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <div class="mb-2">
                                                <input name="id_jalur" value="<?= $j['id_jalur']; ?>" hidden>
                                                    <label class="form-check-label" for="pulau">Nama Gunung</label>
                                                    <select class="form-control" id="id_jalur<?= $j['id_jalur'] ?>" name="id_gunung" required>
                                                        <option value="">Pilih Gunung</option>
                                                        <?php foreach ($gunung as $g) : ?>
                                                            <option value="<?= $g['id_gunung'] ?>"><?= $g['nama_gunung'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="gambar_gunung" class="form-label">Data Peta</label>
                                                    <input type="text" class="form-control" name="data_peta" id="data_peta" required value="<?= $j['data_peta'] ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="nama_jalur" class="form-label">Nama Jalur</label>
                                                    <input type="text" class="form-control" name="nama_jalur" id="nama_jalur" required value="<?= $j['nama_jalur'] ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-check-label" for="alamat">Alamat</label>
                                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2" required><?= $j['alamat'] ?></textarea>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-check-label" for="detail">Detail</label>
                                                    <textarea class="form-control" name="detail" id="detail" cols="30" rows="2" required><?= $j['detail'] ?></textarea>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button><button class="btn btn-success" type="submit">Kirim</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $counter++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    <?php foreach ($jalur as $j) : ?>
        const myButton<?= $j['id_jalur'] ?> = document.getElementById('button-<?= $j['id_jalur'] ?>');
        myButton<?= $j['id_jalur'] ?>.addEventListener('click', function() {
            Swal.fire({
                title: "Yakin ingin menghapus data?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Hapus!",
                        text: "Data berhasil dihapus.",
                        icon: "success"
                    });
                    window.location.href = "<?= base_url('delete-jalur/') . $j['id_jalur'] ?>";
                }
            });
        });
    document.getElementById('id_jalur<?= $j['id_jalur'] ?>').value=<?= $j['id_gunung'] ?>;
    <?php endforeach; ?>
</script>
<?= $this->endSection(); ?>