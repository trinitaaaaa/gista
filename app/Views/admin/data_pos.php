<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pos</h1>
    <button type="button" class="btn btn-primary btn-icon-split mb-2" data-bs-toggle="modal" data-bs-target="#tambah-data-pos">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span> <span class="text">Tambah Data Pos</span>
    </button>
    <div class="modal fade" id="tambah-data-pos" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data pos</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('tambah-data-pos'); ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-2">
                            <label class="form-check-label" for="pulau">Nama Jalur</label>
                            <select class="form-control" id="id_jalur" name="id_jalur" required>
                                <option value="">Pilih Jalur</option>
                                <?php foreach ($jalur as $j) : ?>
                                    <option value="<?= $j['id_jalur'] ?>"><?= $j['nama_jalur'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="gambar_pos" class="form-label">Gambar Pos</label>
                            <input type="file" class="form-control" style="padding-top: 3px;" name="gambar_pos" id="gambar_pos" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label" for="kebutuhan_kalori">Kebutuhan Kalori</label>
                                <input type="number" class="form-control" name="kebutuhan_kalori" id="kebutuhan_kalori" required>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="pos" class="form-label">Pos</label>
                                <input type="number" class="form-control" name="pos" id="pos" required>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label" for="sumber_mata_air">Sumber Mata Air</label>
                                <input type="text" class="form-control" name="sumber_mata_air" id="sumber_mata_air" required>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label" for="flora_fauna">flora Fauna</label>
                                <input type="text" class="form-control" name="flora_fauna" id="flora_fauna" required>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label" for="ketinggian_pos">Ketinggian pos</label>
                                <input type="number" class="form-control" name="ketinggian_pos" id="ketinggian_pos" required>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label" for="waktu">Waktu</label>
                                <input type="number" class="form-control" name="waktu" id="waktu" required>
                            </div>
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
                            <th style="border-bottom: 1px solid #000">Pos</th>
                            <th style="border-bottom: 1px solid #000">Gambar Pos</th>
                            <th style="border-bottom: 1px solid #000">Kebutuhan Kalori</th>
                            <th style="border-bottom: 1px solid #000">Sumber Mata Air</th>
                            <th style="border-bottom: 1px solid #000">Flora Fauna</th>
                            <th style="border-bottom: 1px solid #000">Ketinggian Pos</th>
                            <th style="border-bottom: 1px solid #000">Waktu</th>
                            <th style="border-bottom: 1px solid #000" width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        foreach ($pos as $p) : ?>
                            <tr>
                                <td><?= $counter; ?></td>
                                <td><?= $p['pos']; ?></td>
                                <td><?= $p['gambar_pos']; ?></td>
                                <td><?= $p['kebutuhan_kalori']; ?></td>
                                <td><?= $p['sumber_mata_air']; ?></td>
                                <td><?= $p['flora_fauna']; ?></td>
                                <td><?= $p['ketinggian_pos']; ?></td>
                                <td><?= $p['waktu']; ?></td>
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-<?= $p['id_pos'] ?>"><i class="fas fa-edit"></i> </button> <button id="button-<?= $p['id_pos'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> </button></td>
                            </tr>
                            <div class="modal fade" id="modal-<?= $p['id_pos'] ?>" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalLabel-<?= $p['id_pos'] ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel-<?= $p['id_pos'] ?>">Update Data Pos</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url('update-data-pos'); ?>" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <input name="id_pos" value="<?= $p['id_pos']; ?>" hidden>
                                                <div class="mb-2">
                                                    <label class="form-check-label" for="pulau">Nama Jalur</label>
                                                    <select class="form-control" id="id_jalur<?= $p['id_pos'] ?>" name="id_jalur" required>
                                                        <option value="">Pilih Jalur</option>
                                                        <?php foreach ($jalur as $j) : ?>
                                                            <option value="<?= $j['id_jalur'] ?>"><?= $j['nama_jalur'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                        <label for="gambar_pos" class="form-label">Gambar Pos</label>
                                                        <input type="file" class="form-control" style="padding-top: 3px;" name="gambar_pos_<?= $p['id_pos'] ?>" id="gambar_pos">
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 mb-2">
                                                        <label class="form-label" for="kebutuhan_kalori">Kebutuhan Kalori</label>
                                                        <input type="number" class="form-control" name="kebutuhan_kalori" id="kebutuhan_kalori" value="<?= $p['kebutuhan_kalori'] ?>" required>
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <label for="pos" class="form-label">Pos</label>
                                                        <input type="number" class="form-control" name="pos" id="pos" value="<?= $p['pos'] ?>" required>
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <label class="form-label" for="sumber_mata_air">Sumber Mata Air</label>
                                                        <input type="text" class="form-control" name="sumber_mata_air" id="sumber_mata_air" value="<?= $p['sumber_mata_air'] ?>" required>
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <label class="form-label" for="flora_fauna">flora Fauna</label>
                                                        <input type="text" class="form-control" name="flora_fauna" id="flora_fauna" value="<?= $p['flora_fauna'] ?>" required>
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <label class="form-label" for="ketinggian_pos">Ketinggian pos</label>
                                                        <input type="number" class="form-control" name="ketinggian_pos" id="ketinggian_pos" value="<?= $p['ketinggian_pos'] ?>" required>
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <label class="form-label" for="waktu">Waktu</label>
                                                        <input type="number" class="form-control" name="waktu" id="waktu" value="<?= $p['waktu'] ?>" required>
                                                    </div>
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
        <?php foreach ($pos as $p) : ?>
            const myButton<?= $p['id_pos'] ?> = document.getElementById('button-<?= $p['id_pos'] ?>');
            myButton<?= $p['id_pos'] ?>.addEventListener('click', function() {
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
                        window.location.href = "<?= base_url('delete-pos/') . $p['id_pos'] ?>";
                    }
                });
            });
            document.getElementById('id_jalur<?= $p['id_pos'] ?>').value = <?= $p['id_jalur'] ?>;
        <?php endforeach; ?>
    </script>
    <?= $this->endSection(); ?>