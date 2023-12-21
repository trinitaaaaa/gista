<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Gunung</h1>
    <button type="button" class="btn btn-primary btn-icon-split mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span> <span class="text">Tambah Data Gunung</span>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Gunung</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('tambah-data-gunung'); ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="gambar_gunung" class="form-label">Gambar Gunung</label>
                            <input type="file" class="form-control" style="padding-bottom: 2.25rem;" name="gambar_gunung" id="gambar_gunung" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_gunung" class="form-label">Nama Gunung</label>
                            <input type="text" class="form-control" name="nama_gunung" id="nama_gunung" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="ketinggian_mdpl">Ketinggian Mdpl</label>
                            <input type="number" class="form-control" name="ketinggian_mdpl" id="ketinggian_mdpl" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="ketinggian_mdpl">ketinggian_ft</label>
                            <input type="number" class="form-control" name="ketinggian_ft" id="ketinggian_ft" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="pulau">Pulau</label>
                            <input type="text" class="form-control" name="pulau" id="pulau" required>
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
                            <th style="border-bottom: 1px solid #000">Gambar Gunung</th>
                            <th style="border-bottom: 1px solid #000">Nama Gunung</th>
                            <th style="border-bottom: 1px solid #000">Ketinggian(Mdpl)</th>
                            <th style="border-bottom: 1px solid #000">Ketinggian(ft)</th>
                            <th style="border-bottom: 1px solid #000">Pulau</th>
                            <th style="border-bottom: 1px solid #000">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        foreach ($gunung as $g) : ?>
                            <tr>
                                <td><?= $counter; ?></td>
                                <td><?= $g['gambar_gunung']; ?></td>
                                <td><?= $g['nama_gunung']; ?></td>
                                <td><?= $g['ketinggian_mdpl']; ?></td>
                                <td><?= $g['ketinggian_ft']; ?></td>
                                <td><?= $g['pulau']; ?></td>
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-<?= $g['id_gunung'] ?>"><i class="fas fa-edit"></i> </button> <button id="button-<?= $g['id_gunung'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> </button></td>
                            </tr>
                            <div class="modal fade" id="modal-<?= $g['id_gunung'] ?>" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalLabel-<?= $g['id_gunung'] ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel-<?= $g['id_gunung'] ?>">Update Data Gunung</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url('update-data-gunung'); ?>" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <input name="id_gunung" value="<?= $g['id_gunung']; ?>" hidden>
                                                <div class="mb-3">
                                                    <label for="gambar_gunung_update" class="form-label">Gambar Gunung</label>
                                                    <input type="file" class="form-control" style="padding-bottom: 2.25rem;" name="gambar_gunung_<?= $g['id_gunung'] ?>" value="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_gunung" class="form-label">Nama Gunung</label>
                                                    <input type="text" class="form-control" name="nama_gunung" id="nama_gunung" value="<?= $g['nama_gunung']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-check-label" for="ketinggian_mdpl">Ketinggian Mdpl</label>
                                                    <input type="number" class="form-control" name="ketinggian_mdpl" id="ketinggian_mdpl" value="<?= $g['ketinggian_mdpl']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-check-label" for="ketinggian_mdpl">ketinggian_ft</label>
                                                    <input type="number" class="form-control" name="ketinggian_ft" id="ketinggian_ft" value="<?= $g['ketinggian_ft']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-check-label" for="pulau">Pulau</label>
                                                    <input type="text" class="form-control" name="pulau" id="pulau" value="<?= $g['pulau']; ?>" required>
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
    <?php foreach ($gunung as $g) : ?>
        const myButton<?= $g['id_gunung'] ?> = document.getElementById('button-<?= $g['id_gunung'] ?>');
        myButton<?= $g['id_gunung'] ?>.addEventListener('click', function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    window.location.href = "<?= base_url('delete-gunung/') . $g['id_gunung'] ?>";
                }
            });
        });
    <?php endforeach; ?>
</script>
<?= $this->endSection(); ?>