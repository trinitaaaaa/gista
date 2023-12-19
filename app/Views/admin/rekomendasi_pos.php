<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Rekomendasi Data Pos</h1>
    
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
                        <th style="border-bottom: 1px solid #000">Ketinggian</th>
                        <th style="border-bottom: 1px solid #000">Waktu Tempuh</th>
                        <th style="border-bottom: 1px solid #000">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;
                    foreach ($request as $r) :?>
                    <tr>
                        <td><?= $counter; ?></td>
                        <td><?= $r['pos']; ?></td>
                        <td><?= $r['gambar_pos']; ?></td>
                        <td><?= $r['kebutuhan_kalori']; ?></td>
                        <td><?= $r['sumber_mata_air']; ?></td>
                        <td><?= $r['flora_fauna']; ?></td>
                        <td><?= $r['ketinggian_pos']; ?></td>
                        <td><?= $r['waktu']; ?></td>
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

