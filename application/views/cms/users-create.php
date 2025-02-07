<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
<div class="row g-4 settings-section">
	<?php $error = $this->session->flashdata('error') ?>

    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    
		    <div class="app-card-body">
			    <form class="settings-form" method="post" action="<?= base_url('users/store') ?>">
				    <div class="mb-3">
					    <label for="fullname" class="form-label">Nama Lengkap</label>
					    <input type="text" class="form-control" id="fullname" value="<?= set_value('fullname') ?>" name="fullname" required placeholder="John Doe">
					    <?= isset($error['fullname']) ? $error['fullname'] : ''  ?>
					</div>
					<div class="mb-3">
					    <label for="username" class="form-label">Username</label>
					    <input type="text" class="form-control" id="username" value="<?= set_value('username') ?>" name="username" required placeholder="username">
					    <?= isset($error['username']) ? $error['username'] : ''  ?>
					</div>
					<div class="mb-3">
					    <label for="password" class="form-label">Password</label>
					    <input type="password" class="form-control" id="password" value="<?= set_value('') ?>" name="password" required placeholder="********">
					    <?= isset($error['password']) ? $error['password'] : ''  ?>
					</div>
					<div class="mb-3">
					    <label for="conf_password" class="form-label">Konfirmasi Password</label>
					    <input type="password" class="form-control" id="conf_password" value="<?= set_value('') ?>" name="conf_password" required placeholder="********">
					    <?= isset($error['conf_password']) ? $error['conf_password'] : ''  ?>
					</div>
					<a href="<?= base_url('users') ?>" class="btn app-btn-secondary" >Kembali</a>
					<button type="submit" class="btn app-btn-primary" >Simpan</button>
			    </form>
		    </div><!--//app-card-body-->
		    
		</div><!--//app-card-->
    </div>
</div><!--//row-->