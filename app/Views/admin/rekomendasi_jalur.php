<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Rekomendasi Data Jalur</h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #000">No</th>
                        <th style="border-bottom: 1px solid #000">Data Peta</th>
                        <th style="border-bottom: 1px solid #000">Nama Jalur</th>
                        <th style="border-bottom: 1px solid #000">Alamat</th>
                        <th style="border-bottom: 1px solid #000">Detail</th>
                        <th style="border-bottom: 1px solid #000">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;
                    foreach ($request as $r) :?>
                    <tr>
                        <td><?= $counter; ?></td>
                        <td><?= $r['data_peta']; ?></td>
                        <td><?= $r['nama_jalur']; ?></td>
                        <td><?= $r['alamat']; ?></td>
                        <td><?= $r['detail']; ?></td>
                        <td><button type="submit" class="btn btn-success">setujui</button><br>
                        <button type="submit" class="btn btn-danger">tolak</button></td>
                    </tr>
                    <?php $counter++;
                    endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>

