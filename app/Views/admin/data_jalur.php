<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Jalur</h1>
    <a href="#" class="btn btn-primary btn-icon-split mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data Jalur</span>
    </a>
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
                    <th style="border-bottom: 1px solid #000">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; 
                    foreach ($jalur as $j) :?>
                    <tr>
                    <td><?= $counter; ?></td>
                    <td><?= $j['data_peta']; ?></td>
                    <td><?= $j['nama_jalur']; ?></td>
                    <td><?= $j['alamat']; ?></td>
                    <td><?= $j['detail']; ?></td>
                    <td ><a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> </a> <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> </a></td>
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

