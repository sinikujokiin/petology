<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
<div class="row g-4 settings-section">
	<?php $error = $this->session->flashdata('error') ?>

    <div class="col-lg-8 col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    <div class="app-card-body">
		    	<div class="row">
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Username</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $user->username ?></p>
		    		</div>

		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Nama Lengkap</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $user->fullname ?></p>
		    		</div>
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Status</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $user->status ?></p>
		    		</div>
		    	</div>
		    	</div>
		    </div><!--//app-card-body-->
				<a href="<?= base_url('users') ?>" class="btn app-btn-secondary" >Kembali</a>
		</div><!--//app-card-->
    </div>
</div><!--//row-->
