<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pos</h1>
    <a href="#" class="btn btn-primary btn-icon-split mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data Pos</span>
    </a>
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
                    <th style="border-bottom: 1px solid #000">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; 
                    foreach ($pos as $p) :?>
                    <tr>
                    <td><?= $counter; ?></td>
                    <td><?= $p['pos']; ?></td>
                    <td><?= $p['gambar_pos']; ?></td>
                    <td><?= $p['kebutuhan_kalori']; ?></td>
                    <td><?= $p['sumber_mata_air']; ?></td>
                    <td><?= $p['flora_fauna']; ?></td>
                    <td><?= $p['ketinggian_pos']; ?></td>
                    <td><?= $p['waktu']; ?></td>
                    <td><a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> &nbsp; </a> <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> </a></td>
                    </tr>
                    <?php $counter++;
                    endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>

