<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
<div class="row g-4 settings-section">
	<?php $error = $this->session->flashdata('error') ?>

    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    
		    <div class="app-card-body">
			    <form class="settings-form" method="post" action="<?= base_url('rule_flows/update/'.encrypt_decrypt('encrypt', $flow->id)) ?>">
				    <div class="mb-3">
				    	<label for="parent_id" class="form-label">Parent</label>
					    <select name="parent_id" id="parent_id" class="form-control select2" multiple data-placeholder="Pilih Parent">
					    	<option ></option>
					    	<?php foreach ($parents as $key => $value): ?>
					    		<option <?= $flow->parent_id == $value->id ? 'selected' : ''  ?> value="<?= $value->id ?>">(<?= $value->id ?>) <?= $value->symptom->code.' - '.$value->symptom->name ?></option>
					    	<?php endforeach ?>
					    </select>
			    	</div>
			    	<div class="mb-3">
				    	<label for="symptom_id" class="form-label">Pertanyaan</label>
					    <select name="symptom_id" id="symptom_id" class="form-control select2" multiple data-placeholder="Pilih Gejala">
					    	<option ></option>
					    	<?php foreach ($symptoms as $key => $value): ?>
					    		<option <?= $flow->symptom_id == $value->id ? 'selected' : ''  ?> value="<?= $value->id ?>"><?= $value->code.' - '.$value->name ?></option>
					    	<?php endforeach ?>
					    </select>
			    	</div>
			    	<div class="mb-3">
				    	<label for="yes" class="form-label">Pertanyaan Selanjutnya (Jika Ya)</label>
					    <select name="yes" id="yes" class="form-control select2" multiple data-placeholder="Pilih Gejala">
					    	<option ></option>
					    	<?php foreach ($symptoms as $key => $value): ?>
					    		<option <?= $flow->yes == $value->id ? 'selected' : ''  ?> value="<?= $value->id ?>"><?= $value->code.' - '.$value->name ?></option>
					    	<?php endforeach ?>
					    </select>
			    	</div>
			    	<div class="mb-3">
				    	<label for="no" class="form-label">Pertanyaan Selanjutnya (Jika Tidak)</label>
					    <select name="no" id="no" class="form-control select2" multiple data-placeholder="Pilih Gejala">
					    	<option ></option>
					    	<?php foreach ($symptoms as $key => $value): ?>
					    		<option <?= $flow->no == $value->id ? 'selected' : ''  ?> value="<?= $value->id ?>"><?= $value->code.' - '.$value->name ?></option>
					    	<?php endforeach ?>
					    </select>
			    	</div>
			    	<div class="mb-3">
				    	<label for="disease_id" class="form-label">Hasil</label>
					    <select name="disease_id" id="disease_id" class="form-control select2" multiple data-placeholder="Pilih Penyakit">
					    	<option ></option>
					    	<?php foreach ($diseases as $key => $value): ?>
					    		<option <?= $flow->disease_id == $value->id ? 'selected' : ''  ?> value="<?= $value->id ?>"><?= $value->code.' - '.$value->name ?></option>
					    	<?php endforeach ?>
					    </select>
			    	</div>
					<a href="<?= base_url('rule_flows') ?>" class="btn app-btn-secondary" >Kembali</a>
					<button type="submit" class="btn app-btn-primary" >Simpan</button>
			    </form>
		    </div><!--//app-card-body-->
		    
		</div><!--//app-card-->
    </div>
</div><!--//row-->

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

	$(".select2").select2({
		theme:'bootstrap-5',
		maximumSelectionLength: 1,
		placeholder: function(){
	        $(this).data('placeholder');
	    }
	});
</script>