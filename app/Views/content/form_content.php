<div class="site-nav" style="position: fixed;">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center pt-5">
        <div class="col-lg-6">
          <h1 class="heading text-white mb-3 mt-4" data-aos="fade-up">Form Tambah Data</h1>
        </div>
      </div>
    </div>
  </div>

<section class="section posts-entry" style="padding-top: 12rem;">
	<div class="container">
		<div class="row mb-3">
			<div class="col-sm-6">
				<h2 class="posts-entry-title" style="text-decoration: underline;">Data Gunung</h2>
			</div>
		</div>
		<form class="col-sm-10" method="post" action="<?= base_url('form-tambah-data');?>" enctype="multipart/form-data">
			<?= csrf_field(); ?>
			<input type="number" hidden name="id_user" value="<?= session()->get('id_user') ?>">

			<div class="row mb-1">
				<label for="gambar_gunung" class="col-sm-4 col-form-label text-dark" style="font-size: medium;">Upload foto gunung</label>
				<div class="col-sm-8">
					<input type="file" class="form-control" id="gambar_gunung" name="gambar_gunung" value="" style="height: 38px; border-radius: 27rem" required>
				</div>
			</div>
			<div class="row mb-1">
			<label class="col-sm-4 col-form-label text-dark" style="font-size: medium;">Nama gunung</label>
				<div class="col-sm-8">
					<input class="form-control" list="gunung" id="nama_gunung" name="nama_gunung" style="height: 38px; border-radius: 27rem" autocomplete="off" required></label>
					<datalist id="gunung">
					<?php foreach ($gunung as $g) : ?>
					<option value="<?= $g['nama_gunung']; ?>">
						<?php endforeach; ?>
					</datalist>
				</div>
			</div>
			<div class="row mb-1">
				<label for="ketinggian_mdpl" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Ketinggian (mdpl)</label>
				<div class="col-sm-8">
				<input type="number" class="form-control" id="ketinggian_mdpl" name="ketinggian_mdpl" placeholder="Masukkan ketinggian gunung mdpl (mdpl)" style="height: 38px; border-radius: 27rem" required>
				</div>
			</div>
			<div class="row mb-1">
				<label for="ketinggian_ft" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Ketinggian (ft)</label>
				<div class="col-sm-8">
				<input type="number" class="form-control" id="ketinggian_ft" name="ketinggian_ft" placeholder="Masukkan ketinggian gunung mdpl (ft)" style="height: 38px; border-radius: 27rem" required>
				</div>
			</div>
			<div class="row mb-1">
					<label for="pulau" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Pulau</label>
					<div class="col-sm-8">
					<select class="form-control" id="pulau" name="pulau" style="height: 38px; border-radius: 27rem" required>
						<option>Pilih pulau</option>
						<option value="Jawa">Jawa</option>
						<option value="Sumatra">Sumatra</option>
						<option value="Sulawesi">Sulawesi</option>
						<option value="Papua">Papua</option>
						<option value="Kalimantan">Kalimantan</option>
						<option value="Bali">Bali</option>
					</select>
					</div>
			</div>
	</div>
	<br>
	<div class="container" style="padding-top: 3rem;">
		<div class="row mb-3">
			<div class="col-sm-6">
				<h2 class="posts-entry-title" style="text-decoration: underline;">Jalur Gunung</h2>
			</div>
		</div>
		<div class="col-sm-10">
			<div class="row mb-1">
				<label for="data_peta" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Upload data peta jalur gunung</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="data_peta" name="data_peta" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="nama_jalur" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Nama jalur</label>
				<div class="col-sm-8">
				<input class="form-control" list="jalur" id="nama_jalur" name="nama_jalur" style="height: 38px; border-radius: 27rem" autocomplete="off"></label>
					<datalist id="jalur">
					<?php foreach ($jalur as $j) : ?>
					<option value="<?= $j['nama_jalur']; ?>">
						<?php endforeach; ?>
					</datalist>
				</div>
			</div>
			<div class="row mb-1">
				<label for="alamat" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Alamat jalur gunung</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat jalur gunung" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="detail" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Deskripsi jalur</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="detail" name="detail" placeholder="Masukkan deskripsi gunung" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="container" style="padding-top: 3rem;">
		<div class="row mb-3">
			<div class="col-sm-6">
				<h2 class="posts-entry-title" style="text-decoration: underline;">Informasi Peta Gunung</h2>
			</div>
		</div>
		<div class="col-sm-10">
			<div class="row mb-1">
				<label for="pos" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Pos</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="pos" name="pos" placeholder="Masukkan informasi pos berapa yang mau ditambahkan" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="gambar_pos" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Upload foto/video</label>
				<div class="col-sm-8">
				<input type="text" class="form-control text-mutted" id="gambar_pos" name="gambar_pos" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="kebutuhan_kalori" class="col-sm-4 col-form-label text-dark" style="font-size: medium"> Perkiraan kebutuhan kalori </label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="kebutuhan_kalori" name="kebutuhan_kalori" placeholder="Masukkan informasi kebutuhan kalori secara umum" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="sumber_mata_air" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Sumber mata air</label>
				<div class="col-sm-8">
					<div class="form-check">
					<input class="form-check-input" type="radio" name="sumber_mata_air" id="ada">
					<label class="form-check-label" for="ada" style="height: 38px; border-radius: 27rem"> Ada
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" type="radio" name="sumber_mata_air" id="tidak_ada" checked>
					<label class="form-check-label" for="tidak_ada" style="height: 38px; border-radius: 27rem">
						Tidak Ada
					</label>
					</div>
				</div>
			</div>
			<div class="row mb-1">
				<label for="flora_fauna" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Flora/Fauna</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="flora_fauna" name="flora_fauna" placeholder="Masukkan jenis flora/fauna yang ditemui di pos ini" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="ketinggian_pos" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Ketinggian Pos</label>
				<div class="col-sm-8">
				<input type="number" class="form-control" id="ketinggian_pos" name="ketinggian_pos" placeholder="Masukkan ketinggian (mdpl) pos ini" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
			<div class="row mb-1">
				<label for="waktu" class="col-sm-4 col-form-label text-dark" style="font-size: medium">Waktu tempuh</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="waktu" name="waktu" placeholder="Masukkan perkiraan waktu secara umum untuk mencapai pos ini" value="" style="height: 38px; border-radius: 27rem">
				</div>
			</div>
			<br>
			<p><button type="submit" class="btn btn-sm btn-outline-primary">Input</button></p>
		</div>
		</form>

	</div>
</section>