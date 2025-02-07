<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
<div class="row g-4 settings-section">
	<?php if ($this->session->flashdata('alert')): ?>
		<?= $this->session->flashdata('alert'); ?>
	<?php endif ?>

    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    <div class="app-card-header text-center">
		    	<h5>Hasil Diagnosis Penyakit</h5>
		    </div>
		    <div class="row px-4 py-2 mb-3">
		            
		            <div class="col-12">
		                <h6>Data Pasien</h6>
		            </div>
		            <div class="col-4">Nama Pemilik</div>
		            <div class="col-8"><?= $history->owner ?></div>
		            <div class="col-4">Nama Hewan</div>
		            <div class="col-8"><?= $history->pet_name ?></div>
		            <div class="col-4">Jenis Kelamin Hewan</div>
		            <div class="col-8"><?= $history->pet_gender ?></div>
		            <div class="col-4">Alamat</div>
		            <div class="col-8"><?= $history->address ?></div>

		            <div class="col-12 mt-2">
		                <hr>
		                <h6>Hasil Diagnosis </h6>
		            </div>

		            <?php if ($history->disease_id): ?>
		                <div class="col-4">Penyakit</div>
		                <div class="col-8"><?= $history->disease->name ?></div>
		                <div class="col-4">Gejala</div>
		                <div class="col-8">
		                    <ol>
		                        <?php foreach ($symptoms as $value):?>
		                            <li><?= $value->code. ' - ' .$value->name ?></li>
		                        <?php endforeach ?>
		                    </ol>
		                </div>
		                <div class="col-4">Penyebab</div>
		                <div class="col-8"><?= $history->disease->reason ?></div>
		                <div class="col-4">Solusi</div>
		                <div class="col-8"><?= $history->disease->solution ?></div>
		            <?php else: ?>
		                <div class="col-12">
		                    Mohon Maaf, sistem tidak dapat mendiagnosis penyakit hewan peliharaan Anda. Silahkan kirim pesan melalui kritik dan saran.
		                </div>
		            <?php endif ?>

		    </div>
				<a href="<?= base_url('histories') ?>" class="btn app-btn-secondary" >Kembali</a>
		    <a href="<?= base_url('histories/pdf/'.encrypt_decrypt('encrypt', $history->id)) ?>" target="_BLANK" title="Cetak Hasil Diagnosis" class="btn app-btn-primary btn-sm">Cetak Hasil</a>
		</div><!--//app-card-->
    </div>
</div><!--//row-->


<div class="modal fade" id="form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formLabel">Tambah gejala dari penyakit <?= $history->name ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('rules/store/'.encrypt_decrypt('encrypt', $history->id)) ?>" method="post" accept-charset="utf-8">
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