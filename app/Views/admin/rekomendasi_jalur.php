<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rekomendasi Data Jalur</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $session = session();
                $message = $session->getFlashdata('message');
                if(!empty($message)){
                    echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
                }
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="border-bottom: 1px solid #000">No</th>
                            <th style="border-bottom: 1px solid #000">Nama Gunung</th>
                            <th style="border-bottom: 1px solid #000">Data Peta</th>
                            <th style="border-bottom: 1px solid #000">Nama Jalur</th>
                            <th style="border-bottom: 1px solid #000">Alamat</th>
                            <th style="border-bottom: 1px solid #000">Detail</th>
                            <th style="border-bottom: 1px solid #000">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        foreach ($request as $r) : ?>
                            <tr>
                                <td><?= $counter; ?></td>
                                <td><?= $r['nama_gunung']; ?></td>
                                <td><?= $r['data_peta']; ?></td>
                                <td><?= $r['nama_jalur']; ?></td>
                                <td><?= $r['alamat']; ?></td>
                                <td><?= $r['detail']; ?></td>
                                <td id="status-<?= $r['id_request'] ?>">
                                    <div class="btn-group" role="group" aria-label="Basic example" id="button<?= $r['id_request'] ?>">
                                        <button class="btn btn-success" id="setuju-<?= $r['id_request'] ?>">setujui</button>
                                        <button class="btn btn-danger" id="tolak-<?= $r['id_request'] ?>">tolak</button>
                                    </div>
                                </td>
                            </tr>
                        <?php $counter++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    <?php foreach ($request as $r) : ?>

        if ('<?= $r['status_jalur'] ?>' == 'ditolak') {
            document.getElementById('button<?= $r['id_request'] ?>').style.display = 'none';
            document.getElementById('status-<?= $r['id_request'] ?>').innerHTML = "<span class='btn-danger' style='color: white; padding: 4px 8px; text-align: center; border-radius: 30px;'><?= $r['status_jalur'] ?></span><br><p class='mb-0 mt-2' style='font-size:12px'>Alasan: <?= $r['alasan_jalur'] ?></p>";
        } else if ('<?= $r['status_jalur'] ?>' == 'disetujui') {
            document.getElementById('button<?= $r['id_request'] ?>').style.display = 'none';
            document.getElementById('status-<?= $r['id_request'] ?>').innerHTML = "<span class='btn-success' style='color: white; padding: 4px 8px; text-align: center; border-radius: 30px;'><?= $r['status_jalur'] ?></span>";
        } else {
            const myButton<?= $r['id_request'] ?> = document.getElementById('setuju-<?= $r['id_request'] ?>');
            myButton<?= $r['id_request'] ?>.addEventListener('click', function() {
                Swal.fire({
                    title: "Data akan disetujui?",
                    text: "Data rekomendasi jalur akan masuk ke data jalur",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#1cc88a",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Setujui!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Disetujui!",
                            text: "Data berhasil disetujui.",
                            icon: "success"
                        });
                        window.location.href = "<?= base_url('setujui-jalur/') . $r['id_request'] ?>";
                    }
                });
            });
            const ButtonTolak<?= $r['id_request'] ?> = document.getElementById('tolak-<?= $r['id_request'] ?>');
            ButtonTolak<?= $r['id_request'] ?>.addEventListener('click', function() {
                Swal.fire({
                    title: "Data akan ditolak?",
                    text: "Berikan alasan untuk menolak data ini!",
                    icon: "warning",
                    input: "textarea",
                    confirmButtonColor: "#e74a3b",
                    confirmButtonText: "Ya, Tolak!",
                    inputPlaceholder: "Type your message here...",
                    inputAttributes: {
                        "aria-label": "Type your message here",
                        "required": "true"
                    },
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        const userInput = result.value;
                        fetch("<?= base_url('tolak-jalur/') . $r['id_request'] ?>", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify({
                                    message: userInput
                                }),
                            })
                            .then(data => {
                                Swal.fire({
                                    title: "Ditolak!",
                                    text: "Data berhasil ditolak",
                                    icon: "success"
                                }).then(() => {
                                    window.location.href = "<?= base_url('tolak-jalur/') . $r['id_request'] ?>";
                                });
                            })
                            window.location.href = "<?= base_url('rekomendasi-jalur') ?>";
                    }
                });
            });
        }
    <?php endforeach; ?>
</script>
<?= $this->endSection(); ?>
<?= $this->section('footer'); ?>
<?= $this->endSection(); ?>