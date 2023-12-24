<section class="section posts-entry pb-0">
	<div class="container">
		<br><br>
		<div class="row mb-4" style="justify-content: center">
			<div class="col-sm-6" style="text-align: center">
				<h2 class="posts-entry-title">w e l c o m e  <?= session()->get('username'); ?> !</h2>
			</div>
		</div>
	</div>
</section>

<!-- Start retroy layout blog posts -->
<section class="section bg-light" id="sec-gunung">
	<div class="container">
		<div class="row mb-4">
			<div class="col-sm-6">
				<h2 class="posts-entry-title">Informasi Gunung</h2>
			</div>
		</div>
		<form class="col-sm-12 text-sm-end">
			<div class="input-group" style="font-size: 40px">
				<input type="text" class="form-control" placeholder="Search for..." style="height: 40px; border-radius: 27rem ">
			</div>
		</form>
		<ul class="row mb-4 portfolio-filters isotope-filters aos-init aos-animate" style="justify-content: center;">
			<li class="btn col-2"><a href="<?=base_url('?region=sumatra#sec-gunung')?>" class="btn btn-sm btn-outline-primary rounded" style="width: 150px;border-color: #FFFFFF;"id="sumatra">Sumatra</a></li>
			<li class="btn col-2"><a href="<?=base_url('?region=sulawesi#sec-gunung')?>" class="btn btn-sm btn-outline-primary rounded" style="margin-right: 1px; width: 150px;border-color: #FFFFFF;"id="sulawesi">Sulawesi</a></li>
			<li class="btn col-2"><a href="<?=base_url('?region=papua#sec-gunung')?>" class="btn btn-sm btn-outline-primary rounded" style="margin-right: 1px; width: 150px;border-color: #FFFFFF;"id="papua">Papua</a></li>
			<li class="btn col-2"><a href="<?=base_url('?region=kalimantan#sec-gunung')?>" class="btn btn-sm btn-outline-primary rounded" style="margin-right: 1px; width: 150px;border-color: #FFFFFF;" id="kalimantan">Kalimantan</a></li>
			<li class="btn col-2"><a href="<?=base_url('?region=bali#sec-gunung')?>" class="btn btn-sm btn-outline-primary rounded" style="margin-right: 1px; width: 150px;border-color: #FFFFFF;" id="bali">Bali</a></li>
			<li class="btn col-2"><a href="<?=base_url('?region=jawa#sec-gunung')?>" class="btn btn-sm btn-outline-primary rounded" style="margin-right: px; width: 150px;border-color: #FFFFFF;" id="jawa">Jawa</a></li>
		</ul>
		<div class="row align-items-stretch retro-layout">
			<?php foreach ($gunung as $g) : ?>
				<div class="col-md-4 gunung-container">
					<a href="<?= base_url('jalur/') . $g['id_gunung']; ?>" class="h-entry mb-30 v-height gradient">
						<div class="featured-img" style="background-image: url('assets/images/<?= $g['gambar_gunung']; ?>');"></div>
						<div class="text">
							<span class="date"><?= $g['ketinggian_mdpl']; ?>Mdpl (<?= $g['ketinggian_ft']; ?>ft)</span>
							<h2><?= $g['nama_gunung']; ?></h2>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
		<br>
		<p><a href="login" class="btn btn-sm btn-outline-primary">Request Tambah Data</a></p>
		<p><a href="login" class="btn btn-sm btn-outline-primary">Tambah Data</a></p>
	</div>
</section>
<!-- End retroy layout blog posts -->

<!-- Start posts-entry -->
<section class="section posts-entry" id="sec-kalori">
	<div class="container">
		<div class="row mb-4">
			<div class="col-sm-6">
				<h2 class="posts-entry-title">Perhitungan Kalori</h2>
			</div>
		</div>
		<form class="col-sm-10" action="<?= base_url(); ?>/#sec-kalori" method="get">
			<div class="row mb-1">
				<label for="usia" class="col-sm-4 col-form-label text-dark" style="font-size: medium; ">Usia :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="usia" name="usia" placeholder="Masukkan usia anda (tahun)" value="" style="height: 38px; margin-bottom: 1rem; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="berat_badan" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Berat badan :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="berat_badan" name="berat_badan" placeholder="Masukkan berat badan anda (kg)" value="" style="height: 38px; margin-bottom: 1rem; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="jenis_kelamin" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Jenis kelamin :</label>
				<div class="col-sm-8">
					<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="" style="height: 38px; margin-bottom: 1rem; border-radius: 27rem">
						<option>Pilih Jenis kelamin</option>
						<option value="1">Laki-laki</option>
						<option value="0">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="row mb-1">
				<label for="ketinggian" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Ketinggian yang akan ditempuh :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-mutted" id="ketinggian" name="ketinggian" placeholder="Masukkan perkiraan ketinggian yang akan ditempuh (mdpl)" value="" style="height: 38px; margin-bottom: 1rem; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="waktu" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Perkiraan waktu tempuh :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="waktu" name="waktu" placeholder="Masukkan perkiraan waktu yang akan ditempuh (menit)" value="" style="height: 38px; margin-bottom: 1rem; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="berat_bawaan" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Perkiraan berat barang bawaan :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="berat_bawaan" name="berat_bawaan" placeholder="Masukkan perkiraan berat barang yang akan dibawa (kg)" value="" style="height: 38px; margin-bottom: 1rem; border-radius: 27rem">
				</div>
			</div>
			<br>
			<button type="submit" class="btn btn-sm btn-outline-primary" id="submitButton">Hitung
			</button>

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Hitung</button>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>


			<?php if (!($kalori_atas == "")) : ?>
				<div class="card mt-5" style="background-color: #458bad;">
					<div class="card-body">
						<h5 class="card-title" style="color: white;">Kalori Atas : <?= $kalori_atas; ?></h5>
						<h5 class="card-title" style="color: white;">Kalori Bawah : <?= $kalori_bawah; ?></h5>
					</div>
				</div>
			<?php endif; ?>
		</form>
	</div>
	</div>
</section>
<script>
	<?php if (!($kalori_atas == "")) : ?>
		document.getElementById("usia").value = <?= $usia; ?>;
		document.getElementById("berat_badan").value = <?= $berat_badan; ?>;
		document.getElementById("jenis_kelamin").value = <?= $jenis_kelamin; ?>;
		document.getElementById("ketinggian").value = <?= $ketinggian; ?>;
		document.getElementById("waktu").value = <?= $waktu; ?>;
		document.getElementById("berat_bawaan").value = <?= $berat_bawaan; ?>;
	<?php endif; ?>
</script>
<!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light" id="sec-makanan">
	<div class="container">
		<div class="row mb-4">
			<div class="col-sm-6">
				<h2 class="posts-entry-title">Saran Logistik Makanan</h2>
			</div>
			<!-- <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div> -->
		</div>
		<div class="row">
			<?php foreach ($makanan as $m) : ?>
				<div class="col-md-6 col-lg-2 mb-4">
					<div class="blog-entry">
						<div class="img-link">
							<img src="assets/images/<?= $m['gambar']; ?>" alt="Image" class="img-fluid" style="height: 100px;">
						</div>
						<p class="date mb-0"><?= $m['kalori']; ?> kkal/pcs</p>
						<h2><a><?= $m['nama']; ?></a></h2>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<script>
	url = window.location.href.split("/")[5]
	nama_pulau = url.split('#')[0].split("=").pop();
	var elementToStyle = document.getElementById(nama_pulau);
	elementToStyle.style.backgroundColor = '#458bad';
	elementToStyle.style.color = '#FFFFFF';
    </script>