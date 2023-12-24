<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Makanan</h1>
    <button type="button" class="btn btn-primary btn-icon-split mb-2" data-bs-toggle="modal" data-bs-target="#tambah-data-makanan">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span> <span class="text">Tambah Data Makanan</span>
    </button>
    <div class="modal fade" id="tambah-data-makanan" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Makanan</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('tambah-data-makanan'); ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-2">
                            <label for="gambar" class="form-label">Gambar Makanan</label>
                            <input type="file" class="form-control" style="padding-top: 3px;" name="gambar" id="gambar" required>
                        </div>
                        <div class="mb-2">
                            <label for="nama" class="form-label">Nama Makanan</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="mb-2">
                            <label for="kalori" class="form-label">Kalori</label>
                            <input type="number" class="form-control" name="kalori" id="kalori" required>
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
                            <th style="border-bottom: 1px solid #000">Gambar</th>
                            <th style="border-bottom: 1px solid #000">Nama</th>
                            <th style="border-bottom: 1px solid #000">Kalori</th>
                            <th style="border-bottom: 1px solid #000">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        foreach ($makanan as $m) : ?>
                            <tr>
                                <td><?= $counter; ?></td>
                                <td><?= $m['gambar']; ?></td>
                                <td><?= $m['nama']; ?></td>
                                <td><?= $m['kalori']; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-<?= $m['id_makanan'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button id="button-<?= $m['id_makanan'] ?>" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-<?= $m['id_makanan'] ?>" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalLabel-<?= $m['id_makanan'] ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel-<?= $m['id_makanan'] ?>">Update Data Makanan</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url('update-data-makanan'); ?>" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <input name="id_makanan" value="<?= $m['id_makanan']; ?>" hidden>
                                                <div class="mb-2">
                                                    <label for="gambar" class="form-label">Gambar Makanan</label>
                                                    <input type="file" class="form-control" style="padding-top: 3px;" name="gambar_makanan_<?= $m['id_makanan'] ?>" id="gambar_makanan">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="nama" class="form-label">Nama Makanan</label>
                                                    <input type="text" class="form-control" style="padding-top: 3px;" name="nama" id="nama" value="<?= $m['nama'] ?>" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="kalori" class="form-label">Kalori</label>
                                                    <input type="number" class="form-control" style="padding-top: 3px;" name="kalori" id="kalori" value="<?= $m['kalori'] ?>" required>
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
    <script>
        <?php foreach ($makanan as $m) : ?>
            const myButton<?= $m['id_makanan'] ?> = document.getElementById('button-<?= $m['id_makanan'] ?>');
            myButton<?= $m['id_makanan'] ?>.addEventListener('click', function() {
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
                        window.location.href = "<?= base_url('delete-makanan/') . $m['id_makanan'] ?>";
                    }
                });
            });
        <?php endforeach; ?>
    </script>
    <?= $this->endSection(); ?>