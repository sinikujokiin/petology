
<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
<div class="row g-4 settings-section">
	<?php $error = $this->session->flashdata('error') ?>

    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    
		    <div class="app-card-body">
			    <form class="settings-form" method="post" action="<?= base_url('diseases/update/'.encrypt_decrypt('encrypt',$disease->id)) ?>">
				    <div class="mb-3">
					    <label for="code" class="form-label">Kode Penyakit</label>
					    <input type="text" class="form-control" id="code" value="<?= set_value('code', $disease->code) ?>" name="code" required placeholder="P0001">
					    <?= isset($error['code']) ? $error['code'] : ''  ?>
					</div>
					<div class="mb-3">
					    <label for="name" class="form-label">Nama Penyakit</label>
					    <input type="text" class="form-control" id="name" value="<?= set_value('name', $disease->name) ?>" name="name" required placeholder="">
					    <?= isset($error['name']) ? $error['name'] : ''  ?>
					</div>
					<div class="mb-3">
					    <label for="solution" class="form-label">Solusi</label>
					    <textarea class="form-control" id="solution" name="solution" required placeholder="" rows="20"><?= set_value('solution', $disease->solution) ?></textarea>
					    <?= isset($error['solution']) ? $error['solution'] : ''  ?>
					</div>
					<div class="mb-3">
					    <label for="reason" class="form-label">Penyebab</label>
					    <textarea class="form-control" id="reason" name="reason" required placeholder="" rows="20"><?= set_value('reason', $disease->reason) ?></textarea>
					    <?= isset($error['reason']) ? $error['reason'] : ''  ?>
					</div>
					<a href="<?= base_url('diseases') ?>" class="btn app-btn-secondary" >Kembali</a>
					<button type="submit" class="btn app-btn-primary" >Simpan</button>
			    </form>
		    </div><!--//app-card-body-->
		    
		</div><!--//app-card-->
    </div>
</div><!--//row-->