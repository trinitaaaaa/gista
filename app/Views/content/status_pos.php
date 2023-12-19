<div class="site-nav" style="position: fixed; z-index: 100;">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center pt-5">
        <div class="col-lg-6">
          <h1 class="heading text-white mb-3 mt-4" data-aos="fade-up">Status Pos</h1>
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
                                            <th style="border-bottom: 1px solid #000">Pos</th>
                                            <th style="border-bottom: 1px solid #000">Gambar Pos</th>
                                            <th style="border-bottom: 1px solid #000">Kebutuhan Kalori</th>
                                            <th style="border-bottom: 1px solid #000">Sumber Mata Air</th>
                                            <th style="border-bottom: 1px solid #000">Flora Fauna</th>
                                            <th style="border-bottom: 1px solid #000">Ketinggian</th>
                                            <th style="border-bottom: 1px solid #000">Waktu Tempuh</th>
                                            <th style="border-bottom: 1px solid #000">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter =1;
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
                                            <td><span class="badge rounded-pill bg-secondary"><?= $r['status_pos']; ?></span></td>
                                        </tr>
                                        <?php $counter++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
        </div>                 
    </div>
</section>