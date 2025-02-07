<h1 class="app-page-title"><?= isset($breadcrumb) ? $breadcrumb : $title  ?></h1>

<form action="" method="post">
<?php foreach ($flow as $value): ?>
	<div class="mb-3">
		<label for="" class="form-label"><?= $value->symptom->code ?> - <?= $value->symptom->question ? $value->symptom->question : $value->symptom->name ?></label> <br>
		<input type="hidden" name="id" value="<?= $value->id ?>">
		<label for="yes">
			<input type="radio" name="next" id="yes" required  value="yes-<?= $value->yes ?>">Ya
		</label>
		<label for="no">
			<input type="radio" name="next" id="no" value="no-<?= $value->no ?>">Tidak
		</label>

		<?php if ($value->disease_id): ?>
			<input type="hidden" name="disease_id" value="<?= $value->disease_id ?>">
		<?php endif ?>
	</div>
<?php endforeach ?>
	<button type="submit" class="btn app-btn-primary">Selanjutnya</button>
</form>


