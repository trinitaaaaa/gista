<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?><div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <a href="#" class="btn btn-primary btn-icon-split mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data User</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th style="border-bottom: 1px solid #000">No</th>
                    <th style="border-bottom: 1px solid #000">Nama</th>
                    <th style="border-bottom: 1px solid #000">Email</th>
                    <th style="border-bottom: 1px solid #000">Username</th>
                    <th style="border-bottom: 1px solid #000">Password</th>
                    <th style="border-bottom: 1px solid #000">Role</th>
                    <th style="border-bottom: 1px solid #000">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; 
                    foreach ($user as $u) :?>
                    <tr>
                    <td><?= $counter; ?></td>
                    <td><?= $u['nama']; ?></td>
                    <td><?= $u['email']; ?></td>
                    <td><?= $u['username']; ?></td>
                    <td><?= $u['password']; ?></td>
                    <td><?= $u['role']; ?></td>
                    <td><a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> </a></td>
                    </tr>
                    <?php $counter++;
                    endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>

