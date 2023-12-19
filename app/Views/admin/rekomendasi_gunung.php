<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Rekomendasi Data Gunung</h1>
    
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
                    foreach ($request as $r) :?>
                    <tr>
                        <td><?= $counter; ?></td>
                        <td><?= $r['gambar_gunung']; ?></td>
                        <td><?= $r['nama_gunung']; ?></td>
                        <td><?= $r['ketinggian_mdpl']; ?></td>
                        <td><?= $r['ketinggian_ft']; ?></td>
                        <td><?= $r['pulau']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?=base_url('setujui-gunung/').$r['id_request']?>" class="btn btn-success">setujui</a>
                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#tolakgunungModal<?= $r['id_request'] ?>">tolak</a>
                            
                        </td>
                        
                        <!-- <td><a href="<?=base_url('setujui-gunung/').$r['id_request']?>" class="btn btn-success">setujui</a></td> -->
                        <!-- <td><button type="submit" class="btn btn-success">setujui</button><br>
                        <button type="submit" class="btn btn-danger">tolak</button></td> -->
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

<?= $this->section('footer'); ?>
<?php foreach ($request as $r) :?>
<div class="modal fade" id="tolakgunungModal<?= $r['id_request'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alasan Ditolak</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?=base_url('tolak-gunung/').$r['id_request']?>" method="post">
            <?= csrf_field(); ?>
            <input type="text" class="form-control" id="alasan_gunung" name="alasan_gunung">
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?= $this->endSection(); ?>

