<div class="row g-3 mb-4 align-items-center justify-content-between">
	<div class="col-auto">
		<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
	</div>
	<div class="col-auto">
		<div class="page-utilities">
			<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
			</div><!--//row-->
		</div><!--//table-utilities-->
	</div><!--//col-auto-->
</div><!--//row-->
<?php if ($this->session->flashdata('alert')): ?>
	<?= $this->session->flashdata('alert'); ?>
<?php endif ?>
<div class="row g-4 settings-section">
	<?php $error = $this->session->flashdata('error') ?>

    <div class="col-12">
        <div class="app-card app-card-settings shadow-sm p-4">
		    
		    <div class="app-card-body">
			    <form class="settings-form" method="post" enctype="multipart/form-data" action="<?= base_url('settings/save') ?>">
			    	<h5>Informasi Website</h5>
			    	<hr>
			    	<div class="row">
			    		<div class="col-lg-6 col-12">
						    <div class="mb-3">
						    	<label for="icon" class="form-label">Icon</label>
						    	<div id="show-icon">
						    		<img src="<?= base_url($setting->icon) ?>" width="20%" alt="Icon">
						    	</div>
						    	<input type="hidden" name="id" id="id" value="<?= encrypt_decrypt("encrypt",$setting->id) ?>">
						    	<input type="file" name="icon" id="icon" class="form-control">
							    <?= isset($error['icon']) ? $error['icon'] : ''  ?>
						    </div>

						    <div class="mb-3">
						    	<label for="logo" class="form-label">Logo</label>
						    	<div id="show-logo">
						    		<img src="<?= base_url($setting->logo) ?>" width="50%" alt="Logo">
						    	</div>
						    	<input type="file" name="logo" id="logo" class="form-control">
							    <?= isset($error['logo']) ? $error['logo'] : ''  ?>

						    </div>
			    		</div>
			    		<div class="col-lg-6 col-12">
						    <div class="mb-3">
							    <label for="name" class="form-label">Nama Website</label>
							    <input type="text" class="form-control" id="name" value="<?= set_value('name', $setting->name) ?>" name="name" required>
							    <?= isset($error['name']) ? $error['name'] : ''  ?>
							</div>
							<div class="row">
								<div class="mb-3 col-lg-6 col-12">
								    <label for="email" class="form-label">Email</label>
								    <input type="text" class="form-control" id="email" value="<?= set_value('email', $setting->email) ?>" name="email" required>
								    <?= isset($error['email']) ? $error['email'] : ''  ?>
								</div>
								<div class="mb-3 col-lg-6 col-12">
								    <label for="phone" class="form-label">No. Telepon</label>
								    <input type="text" class="form-control" id="phone" value="<?= set_value('phone', $setting->phone) ?>" name="phone" required>
								    <?= isset($error['phone']) ? $error['phone'] : ''  ?>
								</div>
							</div>
							<div class="mb-3">
							    <label for="address" class="form-label">Alamat</label>
							    <textarea class="form-control" id="address" name="address"><?= set_value('address', $setting->address) ?></textarea>
							    <br>
							    <?= $setting->address_link ?>
							    <?= isset($error['address']) ? $error['address'] : ''  ?>
							    <br>
							    <label for="address_link" class="form-label">Link Alamat</label>
							    <textarea class="form-control" id="address_link" name="address_link"><?= set_value('address_link', $setting->address_link) ?></textarea>
							</div>
			    		</div>
			    	</div>
			    	<h5>Sosial Media Website</h5>
			    	<hr>
			    	<div class="row">
			    		<div class="col-lg-6 col-12">
			    			<div class="mb-3">
							    <label for="ig_name" class="form-label">Nama Instagram</label>
							    <input type="text" class="form-control" id="ig_name" value="<?= set_value('ig_name', $setting->ig_name) ?>" name="ig_name" required>
							    <?= isset($error['ig_name']) ? $error['ig_name'] : ''  ?>
							</div>
			    		</div>
			    		<div class="col-lg-6 col-12">
			    			<div class="mb-3">
							    <label for="ig_link" class="form-label">Link Instagram 
							    	<?php if ($setting->ig_link): ?>
								    	<a href="<?= $setting->ig_link ?>" title="Kunjungi Link"><i class="bi bi-instagram"></i></a>
							    	<?php endif ?>
							    </label>
							    <input type="text" class="form-control" id="ig_link" value="<?= set_value('ig_link', $setting->ig_link) ?>" name="ig_link" required>
							    <?= isset($error['ig_link']) ? $error['ig_link'] : ''  ?>
							</div>
			    		</div>
			    	</div>
			    	<div class="row">
			    		<div class="col-lg-6 col-12">
			    			<div class="mb-3">
							    <label for="fb_name" class="form-label">Nama Facebook
							    	<?php if ($setting->fb_link): ?>
								    	<a href="<?= $setting->fb_link ?>" title="Kunjungi Link"><i class="bi bi-instagram"></i></a>
							    	<?php endif ?>
							    </label>
							    <input type="text" class="form-control" id="fb_name" value="<?= set_value('fb_name', $setting->fb_name) ?>" name="fb_name">
							    <?= isset($error['fb_name']) ? $error['fb_name'] : ''  ?>
							</div>
			    		</div>
			    		<div class="col-lg-6 col-12">
			    			<div class="mb-3">
							    <label for="fb_link" class="form-label">Link Facebook</label>
							    <input type="text" class="form-control" id="fb_link" value="<?= set_value('fb_link', $setting->fb_link) ?>" name="fb_link">
							    <?= isset($error['fb_link']) ? $error['fb_link'] : ''  ?>
							</div>
			    		</div>
			    	</div>
			    	<h5>SEO Website</h5>
			    	<hr>
			    	<div class="row">
			    		<div class="col-lg-6 col-12">
			    			<div class="mb-3">
							    <label for="seo_tag" class="form-label">Tags</label>
							    <select required name="seo_tag[]" id="seo_tag" class="form-control" multiple>
							    </select>
							    <?= isset($error['seo_tag']) ? $error['seo_tag'] : ''  ?>
							</div>
			    		</div>
			    		<div class="col-lg-6 col-12">
			    			<div class="mb-3">
							    <label for="seo_description" class="form-label">Deskripsi</label>
							    <textarea name="seo_description" id="seo_description" class="form-control"><?= set_value('seo_description', $setting->seo_description) ?></textarea>
							    <?= isset($error['seo_description']) ? $error['seo_description'] : ''  ?>
							</div>
			    		</div>
			    	</div>
			    	<h5>Landing Page</h5>
			    	<hr>
			    	<div class="row">
			    		<div class="col-lg-6 col-12">
			    			<div class="mb-3">
			    			    <label for="text_home" class="form-label">Text Home</label>
			    			    <textarea class="form-control" id="text_home" name="text_home"><?= set_value('text_home', $setting->text_home) ?></textarea>
			    			    
			    			    <?= isset($error['text_home']) ? $error['text_home'] : ''  ?>
			    			</div>
			    		</div>
			    		<div class="col-lg-6 col-12">
			    			<div class="mb-3">
			    			    <label for="text_profile" class="form-label">Text Profile</label>
			    			    <textarea class="form-control" id="text_profile" name="text_profile"><?= set_value('text_profile', $setting->text_profile) ?></textarea>
			    			    
			    			    <?= isset($error['text_profile']) ? $error['text_profile'] : ''  ?>
			    			</div>
			    		</div>
			    	</div>
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
	$("#seo_tag").select2({
		data:<?= json_encode(explode(",", $setting->seo_tag)) ?>,
		tags:true,
		theme:'bootstrap-5'
	}).val(<?= json_encode(explode(",", $setting->seo_tag)) ?>).trigger('change')
</script>