<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
<div class="row g-4 settings-section">
	<?php $error = $this->session->flashdata('error') ?>

    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    <div class="app-card-body">
		    	<div class="row">
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Kode Gejala</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $symptoms->code ?></p>
		    		</div>

		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Nama Gejala</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $symptoms->name ?></p>
		    		</div>
		    	</div>
		    	<hr>
		    	<div class="row justify-content-between">
		    		<div class="col">
				    	<label class="form-label">Penyakit : 
				    	</label>
		    		</div>
		    		<div class="col text-end">
		    		</div>
		    	</div>
		    	<ul>
		    	<?php foreach ($symptoms->rules as $value):?>
		    		<li><?= $value->diseases->code.' - '.$value->diseases->name ?> 
			    	</li>
		    	<?php endforeach ?>
		    	</ul>
		    </div><!--//app-card-body-->
				<a href="<?= base_url('symptoms') ?>" class="btn app-btn-secondary" >Kembali</a>
		</div><!--//app-card-->
    </div>
</div><!--//row-->
