<div class="row g-3 mb-4 align-items-center justify-content-between">
	<div class="col-auto">
		<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>
	</div>
	<div class="col-auto">
		<div class="page-utilities">
			<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
				<div class="col-auto">						    
					<a class="btn app-btn-secondary" href="<?= base_url('rule_flows/create') ?>">
						<i class="fa fa-plus"></i>
						Tambah Alur
					</a>
				</div>
			</div><!--//row-->
		</div><!--//table-utilities-->
	</div><!--//col-auto-->
</div><!--//row-->
<?php if ($this->session->flashdata('alert')): ?>
	<?= $this->session->flashdata('alert'); ?>
<?php endif ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="true">List</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="structure-tab" data-bs-toggle="tab" data-bs-target="#structure" type="button" role="tab" aria-controls="structure" aria-selected="false">Struktur</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
  	<div class="card shadow-sm mb-5">
	    <div class="card-body">
	    	<div class="table-responsive">
		        <table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th class="cell">No</th>
							<th class="cell">Parent</th>
							<th class="cell">Pertanyaan</th>
							<th class="cell">Yes</th>
							<th class="cell">No</th>
							<th class="cell">Penyakit</th>
							<th class="cell">#</th>
						</tr>
					</thead>
					<tbody>

						<?php $no =1; foreach ($flows as $value): ?>
							<tr>
								<td><?= $no++ ?></td>
								<td>
									<?= $value->parent ? '['.$value->parent_id.'] '. $value->parent->symptom->code.' - '.$value->parent->symptom->name : '-' ?>
								</td>
								<td>
									<?= $value->symptom ? $value->symptom->code.' - '.$value->symptom->name : '-' ?>
								</td>
								<td>
									<?= $value->next_yes ? $value->next_yes->code.' - '.$value->next_yes->name : '-' ?>
								</td>
								<td>
									<?= $value->next_no ? $value->next_no->code.' - '.$value->next_no->name : '-' ?>
								</td>
								<td>
									<?= $value->disease ? $value->disease->code.' - '.$value->disease->name : '-' ?>
								</td>
								<td class="cell">
										<div class="dropdown">
										  <a class="btn app-btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
										    Aksi
										  </a>

										  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="z-index: 99999;">
											<li>
										    	<a class="dropdown-item" href="<?= base_url('rule_flows/edit/'.encrypt_decrypt('encrypt', $value->id)) ?>"><i class="fa fa-pencil"></i> Ubah
											    </a>
											</li>
											<li>
										    	<a class="dropdown-item" href="javascript:;" onclick="showModalDelete(this)" data-href="<?= base_url('rule_flows/destroy/'.encrypt_decrypt('encrypt', $value->id)) ?>"><i class="fa fa-trash"></i> Hapus
											    </a>
											</li>
										  </ul>
										</div>
									</td>
								</td>
							</tr>
						<?php endforeach ?>

					</tbody>
				</table>
	        </div><!--//table-responsive-->
	       
	    </div><!--//app-card-body-->
	</div><!--//app-card-->
  </div>
  <div class="tab-pane fade" id="structure" role="tabpanel" aria-labelledby="structure-tab">
		<link type="text/css" rel="stylesheet" href="<?= base_url('assets/tree.structure.css') ?>">
	<div class="card shadow-sm mb-5">
	    <div class="card-body table-responsive">
	    	<figure>
	    	  <!-- <figcaption>Example DOM structure diagram</figcaption> -->
	    	  <ul class="tree">
	    	  	<?php foreach ($structure as $lv1): ?>
	    	  		<li><code><?= $lv1->symptom->code ?></code>
	    		  		<ul>
	    			  		<?php foreach ($lv1->child as $lv2): ?>
	    			  			<li><code><?= $lv2->symptom->code ?></code>
	    			  				<ul>
	    			  					<?php if ($lv2->disease): ?>
	    			  						<li><code><?= $lv2->disease->code ?></code></li>
	    			  					<?php endif ?>
	    			  					<?php foreach ($lv2->child as $lv3): ?>
	    						  			<li><code><?= $lv3->symptom->code ?></code>
	    			  							<ul>
	    			  								<?php if ($lv3->disease): ?>
	    			  									<li><code><?= $lv3->disease->code ?></code></li>
	    			  								<?php endif ?>
	    			  								<?php foreach ($lv3->child as $lv4): ?>
	    									  			<li><code><?= $lv4->symptom->code ?></code>
	    			  										<ul>
	    			  											<?php if ($lv4->disease): ?>
	    			  												<li><code><?= $lv4->disease->code ?></code></li>
	    			  											<?php endif ?>
	    			  											<?php foreach ($lv4->child as $lv5): ?>
	    			  												<li><code><?= $lv5->symptom->code ?></code>
	    			  													<ul>
	    			  														<?php if ($lv5->disease): ?>
	    			  															<li><code><?= $lv5->disease->code ?></code></li>
	    			  														<?php endif ?>
	    			  														<?php foreach ($lv5->child as $lv6): ?>
	    															  			<li><code><?= $lv6->symptom->code ?></code>
	    			  																<ul>
	    			  																	<?php if ($lv6->disease): ?>
	    			  																		<li><code><?= $lv6->disease->code ?></code></li>
	    			  																	<?php endif ?>
	    			  																	<?php foreach ($lv6->child as $lv7): ?>
	    																		  			<li><code><?= $lv7->symptom->code ?></code>
	    		  				  																<ul>
	    		  				  																	<?php if ($lv7->disease): ?>
	    		  				  																		<li><code><?= $lv7->disease->code ?></code></li>
	    		  				  																	<?php endif ?>
	    		  				  																	<?php foreach ($lv7->child as $lv8): ?>
	    		  																			  			<li><code><?= $lv8->symptom->code ?></code>
	    		  																			  				<ul>
	    		  																			  					<?php if ($lv8->disease): ?>
	    		  																			  						<li><code><?= $lv8->disease->code ?></code></li>
	    		  																			  					<?php endif ?>
	    					  				  																	<?php foreach ($lv8->child as $lv9): ?>
	    					  																			  			<li><code><?= $lv9->symptom->code ?></code>
	    					  																			  				<ul>
	    					  																			  					<?php if ($lv9->disease): ?>
	    					  																			  						<li><code><?= $lv9->disease->code ?></code></li>
	    					  																			  					<?php endif ?>
	    								  				  																	<?php foreach ($lv9->child as $lv10): ?>
	    								  																			  			<li><code><?= $lv10->symptom->code ?></code>
	    								  																			  				<ul>
	    								  																			  					<?php if ($lv10->disease): ?>
	    								  																			  						<li><code><?= $lv10->disease->code ?></code></li>
	    								  																			  					<?php endif ?>
	    											  				  																	<?php foreach ($lv10->child as $lv11): ?>
	    											  																			  			<li><code><?= $lv11->symptom->code ?></code>
	    											  																			  				<ul>
	    											  																			  					<?php if ($lv11->disease): ?>
	    											  																			  						<li><code><?= $lv11->disease->code ?></code></li>
	    											  																			  					<?php endif ?>
	    														  				  																	<?php foreach ($lv11->child as $lv12): ?>
	    														  																			  			<li><code><?= $lv12->symptom->code ?></code>
	    														  																			  				<ul>
	    														  																			  					<?php if ($lv12->disease): ?>
	    														  																			  						<li><code><?= $lv12->disease->code ?></code></li>
	    														  																			  					<?php endif ?>
	    														  																			  					<?php foreach ($lv12->child as $lv13): ?>
	    																	  																			  			<li><code><?= $lv13->symptom->code ?></code>
	    																	  																			  				<ul>
	    																	  																			  					<?php if ($lv13->disease): ?>
	    																	  																			  						<li><code><?= $lv13->disease->code ?></code></li>
	    																	  																			  					<?php endif ?>
	    																	  																			  					<?php foreach ($lv13->child as $lv14): ?>
	    																	  																			  						<li><code><?= $lv14->symptom->code ?></code>
	    																	  																			  							<ul>
	    																	  																			  								<?php if ($lv14->disease): ?>
	    																				  																			  						<li><code><?= $lv14->disease->code ?></code></li>
	    																				  																			  					<?php endif ?>
	    																				  																			  					<?php foreach ($lv14->child as $lv15): ?>
	    																				  																			  						<li><code><?= $lv15->symptom->code ?></code>
	    																				  																			  							<ul>
	    																				  																			  								<?php if ($lv15->disease): ?>
	    																							  																			  						<li><code><?= $lv15->disease->code ?></code></li>
	    																							  																			  					<?php endif ?>
	    																							  																			  					<?php foreach ($lv15->child as $lv16): ?>
	    																							  																			  						<li><code><?= $lv16->symptom->code ?></code>
	    																							  																			  							<ul>
	    																										  																			  					<?php if ($lv16->disease): ?>
	    																										  																			  						<li><code><?= $lv16->disease->code ?></code></li>
	    																										  																			  					<?php endif ?>
	    																							  																			  							</ul>
	    																							  																			  						</li>
	    																							  																			  					<?php endforeach ?>
	    																				  																			  							</ul>
	    																				  																			  						</li>
	    																				  																			  					<?php endforeach ?>
	    																	  																			  							</ul>
	    																	  																			  						</li>
	    																	  																			  					<?php endforeach ?>
	    																	  																			  				</ul>
	    																	  																			  			</li>
	    														  																			  					<?php endforeach ?>
	    														  																			  				</ul>
	    														  																			  			</li>
	    														  				  																	<?php endforeach ?>
	    														  				  																</ul>
	    											  																			  			</li>
	    											  				  																	<?php endforeach ?>
	    											  				  																</ul>
	    								  																			  			</li>
	    								  				  																	<?php endforeach ?>
	    								  				  																</ul>
	    					  																			  			</li>
	    					  				  																	<?php endforeach ?>
	    					  				  																</ul>
	    		  																			  			</li>
	    		  				  																	<?php endforeach ?>
	    		  				  																</ul>
	    																		  			</li>
	    			  																	<?php endforeach ?>
	    			  																</ul>
	    			  															</li>
	    			  														<?php endforeach ?>
	    			  													</ul>
	    			  												</li>
	    			  											<?php endforeach ?>
	    			  										</ul>
	    			  									</li>
	    			  								<?php endforeach ?>
	    			  							</ul>
	    			  						</li>
	    			  					<?php endforeach ?>
	    			  				</ul>
	    			  			</li>
	    			  		<?php endforeach ?>
	    		  		</ul>
	    	  		</li>
	    	  	<?php endforeach ?>
	    	  </ul>
	    	</figure>
	    </div>
	</div>
  	
  </div>
</div>

<script>
	$(document).ready(function () {
		$('#example').DataTable();
	});
</script>