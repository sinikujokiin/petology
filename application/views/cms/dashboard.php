
<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>

<div class="alert alert-success d-flex align-items-center" role="alert">
	<i class="bi bi-info-circle-fill"></i> 
	  <div >
	    Selamat Datang Pada Halaman Administrator Website Sistem Pakar Diagnosa Penyakit Kulit Pada Hewan Anjing
	  </div>
</div>

<div class="row g-4 mb-4 justify-content-center">
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1">Jumlah Penyakit</h4>
				<div class="stats-figure"><?= $disease ?></div>
			</div><!--//app-card-body-->
			<a class="app-card-link-mask" href="<?= base_url('diseases') ?>"></a>
		</div><!--//app-card-->
	</div><!--//col-->
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1">Jumlah Gejala</h4>
				<div class="stats-figure"><?= $symptom ?></div>
			</div><!--//app-card-body-->
			<a class="app-card-link-mask" href="<?= base_url('symptoms') ?>"></a>
		</div><!--//app-card-->
	</div><!--//col-->
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1">Jumlah Aturan</h4>
				<div class="stats-figure"><?= $rule ?></div>
			</div><!--//app-card-body-->
			<a class="app-card-link-mask" href="<?= base_url('rules') ?>"></a>
		</div><!--//app-card-->
	</div><!--//col-->
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1">Jumlah Pengguna</h4>
				<div class="stats-figure"><?= $user ?></div>
			</div><!--//app-card-body-->
			<a class="app-card-link-mask" href="<?= base_url('users') ?>"></a>
		</div><!--//app-card-->
	</div><!--//col-->
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1">Jumlah Kritik & Saran</h4>
				<div class="stats-figure"><?= $suggestion ?></div>
			</div><!--//app-card-body-->
			<a class="app-card-link-mask" href="<?= base_url('suggestions') ?>"></a>
		</div><!--//app-card-->
	</div><!--//col-->
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1">Jumlah Riwayat</h4>
				<div class="stats-figure"><?= $history ?></div>
			</div><!--//app-card-body-->
			<a class="app-card-link-mask" href="<?= base_url('histories') ?>"></a>
		</div><!--//app-card-->
	</div><!--//col-->

</div><!--//row-->