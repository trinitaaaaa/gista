<div class="site-nav" style="position: fixed; z-index: 100;">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center pt-5">
        <div class="col-lg-6">
          <h1 class="heading text-white mb-3 mt-4" data-aos="fade-up">Status Jalur</h1>
        </div>
      </div>
    </div>
  </div>

<section class="section posts-entry" style="padding-top: 12rem;">
	<div class="container">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                            <th style="border-bottom: 1px solid #000">No</th>
                                            <th style="border-bottom: 1px solid #000">Data Peta</th>
                                            <th style="border-bottom: 1px solid #000">Nama Jalur</th>
                                            <th style="border-bottom: 1px solid #000">Alamat</th>
                                            <th style="border-bottom: 1px solid #000">Detail</th>
                                            <th style="border-bottom: 1px solid #000">Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter=1;
                                        foreach ($request as $r) :?>
                                        <tr>
                                            <td><?= $counter; ?></td>
                                            <td><?= $r['data_peta']; ?></td>
                                            <td><?= $r['nama_jalur']; ?></td>
                                            <td><?= $r['alamat']; ?></td>
                                            <td><?= $r['detail']; ?></td>
                                            <td><span class="badge rounded-pill bg-secondary"><?= $r['status_jalur']; ?></span></td>
                                        </tr>
                                        <?php $counter++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
        </div>                 
    </div>
</section>