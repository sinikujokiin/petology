<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
<div class="row g-4 settings-section">
	<?php if ($this->session->flashdata('alert')): ?>
		<?= $this->session->flashdata('alert'); ?>
	<?php endif ?>

    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    <div class="app-card-body">
		    	<div class="row">
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Kode Penyakit</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $rules->code ?></p>
		    		</div>

		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Nama Penyakit</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $rules->name ?></p>
		    		</div>

		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Solusi</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $rules->solution ?></p>
		    		</div>

		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Penyebab</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $rules->reason ?></p>
		    		</div>
		    	</div>
		    	<hr>
		    	<div class="row justify-content-between">
		    		<div class="col">
				    	<label class="form-label">Gejala : 
				    	</label>
		    		</div>
		    		<div class="col text-end">
			    		<a href="javascript:;" id="add" title="Tambah gejala dari penyakit <?= $rules->name ?>"><i class="fa fa-plus"></i></a>
		    		</div>
		    	</div>
		    	<ul>
		    	<?php foreach ($rules['symptoms'] as $value): ?>
		    		<li><?= $value->code.' - '.$value->name ?> 
		    			<a href="<?= base_url('rules/destroy/'.encrypt_decrypt('encrypt',$value->id)) ?>" class="text-danger fw-bold" title="Hapus gejala dari penyakit <?= $rules->name ?>">
		    				<i class="fa fa-times"></i>
		    			</a>
			    	</li>
		    	<?php endforeach ?>
		    	</ul>
		    </div><!--//app-card-body-->
				<a href="<?= base_url('rules') ?>" class="btn app-btn-secondary" >Kembali</a>
		</div><!--//app-card-->
    </div>
</div><!--//row-->


<div class="modal fade" id="form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formLabel">Tambah gejala dari penyakit <?= $rules->name ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('rules/store/'.encrypt_decrypt('encrypt', $rules->id)) ?>" method="post" accept-charset="utf-8">
	      <div class="modal-body">
	      	<select name="symptom_id[]" id="symptom_id" required multiple class="form-control">
	      		<?php foreach ($symptom as $value): ?>
		      		<option value="<?= $value->id ?>"><?= $value->code.' - '.$value->name ?></option>
	      		<?php endforeach ?>
	      	</select>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" class="btn app-btn-primary">Tambahkan</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$("#add").click(function(){
		$("#form").modal('show')
	})

	$("#symptom_id").select2({
		theme:'bootstrap-5'
	});


	$("select").on('select2:select', function(evt){
		var element = evt.params.data.element;
		var $element = $(element);

		$element.detach();
		$(this).append($element);
		$(this).trigger('change');
	})
</script>