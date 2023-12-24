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
                            <th style="border-bottom: 1px solid #000" width="12%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        foreach ($request as $r) : ?>
                            <tr>
                                <td><?= $counter; ?></td>
                                <td><?= $r['gambar_gunung']; ?></td>
                                <td><?= $r['nama_gunung']; ?></td>
                                <td><?= $r['ketinggian_mdpl']; ?></td>
                                <td><?= $r['ketinggian_ft']; ?></td>
                                <td><?= $r['pulau']; ?></td>
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
        if ('<?=$r['status_gunung']?>'=='ditolak'){
            document.getElementById('button<?= $r['id_request'] ?>').style.display = 'none';
            document.getElementById('status-<?= $r['id_request'] ?>').innerHTML = "<span class='btn-danger' style='color: white; padding: 4px 8px; text-align: center; border-radius: 30px;'><?= $r['status_gunung'] ?></span><br><p class='mb-0 mt-2' style='font-size:12px'>Alasan: <?= $r['alasan_gunung'] ?></p>";
        }else if('<?=$r['status_gunung']?>'=='disetujui'){
            document.getElementById('button<?= $r['id_request'] ?>').style.display = 'none';
            document.getElementById('status-<?= $r['id_request'] ?>').innerHTML = "<span class='btn-success' style='color: white; padding: 4px 8px; text-align: center; border-radius: 30px;'><?= $r['status_gunung'] ?></span>";
        }
        else{
        const myButton<?= $r['id_request'] ?> = document.getElementById('setuju-<?= $r['id_request'] ?>');
        myButton<?= $r['id_request'] ?>.addEventListener('click', function() {
            Swal.fire({
                title: "Data akan disetujui?",
                text: "Data rekomendasi gunung akan masuk ke data gunung",
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
                    window.location.href = "<?= base_url('setujui-gunung/') . $r['id_request'] ?>";
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
                        fetch("<?= base_url('tolak-gunung/') . $r['id_request'] ?>", {
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
                                    window.location.href = "<?= base_url('tolak-gunung/') . $r['id_request'] ?>";
                                });
                            })
                }
            });
        });
    }
    <?php endforeach; ?>
</script>
<?= $this->endSection(); ?>
<?= $this->section('footer'); ?>
<?= $this->endSection(); ?>