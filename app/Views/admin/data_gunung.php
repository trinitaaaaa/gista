<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Gunung</h1>
    <a href="#" class="btn btn-primary btn-icon-split mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data Gunung</span>
    </a>
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
                    foreach ($gunung as $g) :?>
                    <tr>
                    <td><?= $counter; ?></td>
                    <td><?= $g['gambar_gunung']; ?></td>
                    <td><?= $g['nama_gunung']; ?></td>
                    <td><?= $g['ketinggian_mdpl']; ?></td>
                    <td><?= $g['ketinggian_ft']; ?></td>
                    <td><?= $g['pulau']; ?></td>
                    <td><a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> </a>. <a href="<?= base_url('delete-gunung/').$g['id_gunung'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> </a></td>
                    </tr>
                    <?php $counter++;
                    endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

