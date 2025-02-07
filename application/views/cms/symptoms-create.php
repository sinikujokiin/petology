<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
<div class="row g-4 settings-section">
	<?php $error = $this->session->flashdata('error') ?>

    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    
		    <div class="app-card-body">
			    <form class="settings-form" method="post" action="<?= base_url('symptoms/store') ?>">
				    <div class="mb-3">
					    <label for="code" class="form-label">Kode Gejala</label>
					    <input type="text" class="form-control" id="code" value="<?= set_value('code') ?>" name="code" required placeholder="G0001">
					    <?= isset($error['code']) ? $error['code'] : ''  ?>
					</div>
					<div class="mb-3">
					    <label for="name" class="form-label">Nama Gejala</label>
					    <input type="text" class="form-control" id="name" value="<?= set_value('name') ?>" name="name" required placeholder="">
					    <?= isset($error['name']) ? $error['name'] : ''  ?>
					</div>
					<div class="mb-3">
					    <label for="question" class="form-label">Pertanyaan</label>
					    <textarea class="form-control" id="question" name="question" required><?= set_value('question') ?></textarea>
					    <?= isset($error['question']) ? $error['question'] : ''  ?>
					</div>
					<a href="<?= base_url('symptoms') ?>" class="btn app-btn-secondary" >Kembali</a>
					<button type="submit" class="btn app-btn-primary" >Simpan</button>
			    </form>
		    </div><!--//app-card-body-->
		    
		</div><!--//app-card-->
    </div>
</div><!--//row-->