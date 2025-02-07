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
<div class="tab-content" id="orders-table-tab-content">
	<div class="card shadow-sm mb-5">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th class="cell">No</th>
							<th class="cell">Kode</th>
							<th class="cell">Nama</th>
							<th class="cell">#</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($rules as $value): ?>
							<tr>
								<td class="cell"><?= $no++ ?>.</td>
								<td class="cell"><?= $value->name ?></td>
								<td class="cell">
									<ul>
										<?php foreach ($value['symptoms'] as $symptom): ?>
											<li><?= $symptom->name ?></li>
										<?php endforeach ?>
									</ul>
								</td>
								<td class="cell">
									<div class="dropdown">
										<a class="btn app-btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
											Aksi
										</a>

										<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="z-index: 99999;">
											<li>
												<a class="dropdown-item" href="<?= base_url('rules/show/'.encrypt_decrypt('encrypt', $value->id)) ?>"><i class="fa fa-eye"></i> Detail
												</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
						<?php endforeach ?>

					</tbody>
				</table>
			</div><!--//table-responsive-->

		</div><!--//app-card-body-->		

	</div><!--//app-card-->
</div><!--//tab-content-->

<script>
	$(document).ready(function () {
		$('#example').DataTable();
	});
</script>