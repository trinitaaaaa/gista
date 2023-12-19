<div class="site-nav" style="position: fixed;">
<div class="container">
  <div class="row align-items-center justify-content-center text-center pt-5">
    <div class="col-lg-6 ">
      <h1 class="heading text-white mb-3 mt-4" data-aos="fade-up"><?= $nama_gunung; ?></h1>
    </div>
  </div>
</div>
</div>

<div class="section search-result-wrap" style="padding-top: 12rem; ">
  <div class="container" >
    <div class="row posts-entry">
      <div class="col-lg-12">
        <div class="row">
        <?php if (empty($jalur)) : ?>
            <div class="col-12">            
            <h3 style="text-align: center;">Data masih kosong</h3>
          </div>
          <?php else: ?>
        <?php foreach ($jalur as $j) : ?>
          <div class="col-6" style="padding-bottom: 4rem;">            
              <img src="<?= base_url('/');?>assets/images/<?= $j['data_peta']; ?>.jpg" alt="Image" class="img-fluid">  
          </div>          
          <div class="col-6" style="text-align: center; padding-bottom: 4rem;">
            <h2><a href="single.html"><?= $j['nama_jalur']; ?></a></h2>
            <span class="date" style="text-align: center;"><?= $j['alamat']; ?></span>
            <p style="text-align: justify;"><?= $j['detail']; ?></p>
            <p><a href="single.html" class="btn btn-sm btn-outline-primary">Informasi Porter</a></p>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>